<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/core
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2023 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Core\Admin\API;

class MessageEventFactory
{
    public static function create(string $evtMsg = ''): \JchOptimize\Core\Admin\API\MessageEventInterface
    {
        if ($evtMsg == 'WebSocket') {
            $messageEventObj = new \JchOptimize\Core\Admin\API\WebSocket();
        } elseif ($evtMsg == 'EventSource') {
            $messageEventObj = new \JchOptimize\Core\Admin\API\EventSource();
        } else {
            $messageEventObj = new \JchOptimize\Core\Admin\API\NullEventMessenger();
        }
        return $messageEventObj;
    }
}
