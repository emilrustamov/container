<?php

namespace YOOtheme\Joomla;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Document\Document;
use Joomla\CMS\Document\HtmlDocument;
use Joomla\Input\Input;
use YOOtheme\Application;
use YOOtheme\Arr;
use YOOtheme\Http\Exception;
use YOOtheme\Http\Request;
use YOOtheme\Http\Response;
use YOOtheme\Metadata;
use YOOtheme\Url;

class Platform
{
    /**
     * Handle application routes.
     */
    public static function handleRoute(Application $app, CMSApplication $joomla, Input $input)
    {
        $response = null;

        if ($input->getCmd('option') === 'com_ajax' && $input->get('p')) {
            // disable cache
            $joomla->set('caching', 0);

            // default format
            $input->def('format', 'raw');

            // get response
            $joomla->registerEvent('onAfterDispatch', function () use ($app, &$response, $input) {
                // On administrator routes com_login is rendered for guest users
                if ($input->getCmd('option') !== 'com_ajax') {
                    return;
                }

                $response = $app->run(false);
            });

            // send response
            $joomla->registerEvent('onAfterRender', function () use ($joomla, &$response) {
                if (!$response) {
                    return;
                }

                $isHtml = strpos($response->getContentType(), 'html');

                if (!$isHtml) {
                    // disable gzip for none html responses like binary images
                    $joomla->set('gzip', false);
                }

                if (version_compare(JVERSION, '4.0', '>')) {
                    $joomla->allowCache(true);
                    $joomla->setResponse(
                        $isHtml ? $response->write($joomla->getBody()) : $response,
                    );
                    return;
                }

                // send headers
                if (!headers_sent()) {
                    $response->sendHeaders();
                }

                // set body for none html responses
                if (!$isHtml) {
                    $joomla->setBody($response->getBody());
                }

                // set cms headers (fix issue when headers_sent() is still false)
                if (!headers_sent()) {
                    $joomla->allowCache(true);
                    $joomla->setHeader('Cache-Control', $response->getHeaderLine('Cache-Control'));
                    $joomla->setHeader('Content-Type', $response->getContentType());
                }
            });
        }
    }

    /**
     * Handle application errors.
     *
     * @param Request    $request
     * @param Response   $response
     * @param \Exception $exception
     *
     * @throws \Exception
     *
     * @return Response
     */
    public static function handleError(Request $request, $response, $exception)
    {
        if ($exception instanceof Exception) {
            if (str_starts_with($request->getHeaderLine('Content-Type'), 'application/json')) {
                return $response->withJson($exception->getMessage());
            }

            return $response
                ->write($exception->getMessage())
                ->withHeader('Content-Type', 'text/plain');
        }

        throw $exception;
    }

    /**
     * Callback to register assets.
     *
     * @param Metadata $metadata
     * @param Document $document
     */
    public static function registerAssets(Metadata $metadata, Document $document)
    {
        foreach ($metadata->all('style:*') as $style) {
            if ($style->href) {
                $attrs = Arr::omit($style->getAttributes(), ['version', 'href', 'rel', 'defer']);

                if ($style->defer && $document instanceof HtmlDocument) {
                    $href = Url::to($style->href, ['ver' => $style->version]);
                    if (version_compare(JVERSION, '4.0', '<')) {
                        $href = htmlentities($href);
                    }
                    $document->addHeadLink(
                        $href,
                        'preload',
                        'rel',
                        [
                            'as' => 'style',
                            'onload' => "this.onload=null;this.rel='stylesheet'",
                        ] + $attrs,
                    );
                } else {
                    $href = Url::to($style->href);
                    if (version_compare(JVERSION, '4.0', '<')) {
                        $href = htmlentities($href);
                    }
                    $document->addStyleSheet($href, ['version' => $style->version], $attrs);
                }
            } elseif ($value = $style->getValue()) {
                $document->addStyleDeclaration($value);
            }
        }

        foreach ($metadata->all('script:*') as $script) {
            if ($script->src) {
                $src = Url::to($script->src);
                if (version_compare(JVERSION, '4.0', '<')) {
                    $src = htmlentities($src);
                }
                $document->addScript(
                    $src,
                    ['version' => $script->version],
                    Arr::omit($script->getAttributes(), ['version', 'src']),
                );
            } elseif ($script->getValue()) {
                if ($document instanceof HtmlDocument) {
                    $document->addCustomTag((string) $script->withAttribute('version', ''));
                } else {
                    $document->addScriptDeclaration((string) $script->withAttribute('version', ''));
                }
            }
        }
    }
}
