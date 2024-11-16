<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 *  @package   jchoptimize/core
 *  @author    Samuel Marshall <samuel@jch-optimize.net>
 *  @copyright Copyright (c) 2023 Samuel Marshall / JCH Optimize
 *  @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Core\Service;

use JchOptimize\Platform\Paths;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use _JchOptimizeVendor\Laminas\Log\Logger;
use _JchOptimizeVendor\Laminas\Log\Processor\Backtrace;
use _JchOptimizeVendor\Laminas\Log\PsrLoggerAdapter;
use _JchOptimizeVendor\Laminas\Log\Writer\Stream;
use Psr\Log\LoggerInterface;

class LoggerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->share('logger', function (Container $container): LoggerInterface {
            $logger = new Logger();
            $writer = new Stream(Paths::getLogsPath() . '/jch-optimize.log');
            $logger->addWriter($writer);
            $logger->addProcessor(new Backtrace(['ignoredNamespaces' => ['Psr\\Log\\AbstractLogger']]));
            return new PsrLoggerAdapter($logger);
        });
    }
}
