<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/joomla-platform
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2022 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Crawlers;

use JchOptimize\Core\Exception\RequestException;
use JchOptimize\Core\Psr\Log\LoggerAwareInterface;
use JchOptimize\Core\Psr\Log\LoggerAwareTrait;
use JchOptimize\Core\Psr\Log\LoggerInterface;
use JchOptimize\Core\Spatie\CrawlObserver;
use JchOptimize\Core\SystemUri;
use JchOptimize\Core\Uri\ResponseInterface;
use JchOptimize\GetApplicationTrait;
use JchOptimize\Psr\Uri\UriInterface;
use Joomla\Application\Web\WebClient;
use Joomla\CMS\Application\AdministratorApplication;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

use function count;
use function fastcgi_finish_request;
use function headers_sent;
use function ignore_user_abort;
use function ob_end_clean;
use function ob_end_flush;
use function strlen;

class ReCacheWithRedirect extends CrawlObserver implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    use GetApplicationTrait;

    /**
     * @var string $url Url to redirect to
     */
    protected string $redirectUrl;

    protected bool $redirected = false;

    public function __construct(LoggerInterface $logger, string $redirectUrl = '')
    {
        $this->redirectUrl = $redirectUrl;
        $this->setLogger($logger);
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null)
    {
        if (!$this->redirected) {
            $app = self::getApplication();
            $app->enqueueMessage(
                Text::_('COM_JCHOPTIMIZE_RECACHE_STARTED'),
                'success'
            );//Redirect without closing to allow recache to continue asynchronously.
            $this->redirect();

            $this->redirected = true;
        }
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {
        $message = '';
        //Build error msg
        if ($requestException->hasResponse()) {
            $response = $requestException->getResponse();

            if ($response) {
                $message = 'Status code: ' . $response->getStatusCode();
                if ($response->getReasonPhrase()) {
                    $message .= ' - ' . $response->getReasonPhrase();
                }
            }
        } else {
            $message = 'Connection issues.';
        }
        /** @var AdministratorApplication $app */
        $app = self::getApplication();

        if ((string)$url == SystemUri::currentBaseFull() && $app instanceof CMSApplication) {
            $app->enqueueMessage(Text::_('COM_JCHOPTIMIZE_RECACHE_FAILED') . ' ' . $message, 'error');
            $app->redirect(Route::_('index.php?option=com_jchoptimize&view=PageCache', false));
        }

        $this->logger->error($message . ': ' . $url);
    }

    private function redirect(): void
    {
        ignore_user_abort(true);
        $app = self::getApplication();

        if (!$app instanceof CMSApplication) {
            return;
        }

        //persist messages if they exist
        $messageQueue = $app->getMessageQueue();

        if (count($messageQueue)) {
            $app->getSession()->set('application.queue', $messageQueue);
        }

        if (headers_sent()) {
            echo '<script>document.location.href=' . json_encode($this->redirectUrl) . ";</script>\n";
        } elseif ($app->client->engine == WebClient::TRIDENT
            && !$app::isAscii($this->redirectUrl)) {
            $html = '<html><head>';
            $html .= '<meta http-equiv="content-type" content="text/html; charset=' . $app->charSet . '" />';
            $html .= '<script>document.location.href=' . json_encode($this->redirectUrl) . ';</script>';
            $html .= '</head><body></body></html>';

            echo $html;
        } else {
            ob_end_clean();
            $app->setBody('Redirecting...');
            $app->setHeader('Status', '303', true);
            $app->setHeader('Location', $this->redirectUrl, true);
            //Set no cache header
            $app->setHeader('Expires', 'Wed, 17 Aug 2005 00:00:00 GMT', true);
            // Always modified.
            $app->setHeader('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT', true);
            $app->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0', false);
            // HTTP 1.0
            $app->setHeader('Pragma', 'no-cache');
            $app->setHeader('Connection', 'close');
            $app->setHeader('Content-Length', (string)strlen($app->getBody()));

            $app->sendHeaders();

            echo $app->getBody();

            $app->getSession()->close();
            Factory::getDbo()->disconnect();

            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();
            } else {
                ob_end_flush();
                flush();
            }
        }
    }
}
