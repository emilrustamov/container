<?php
/**
 * @package     JchOptimize\Model
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace JchOptimize\Model;

use Exception;
use JchOptimize\Core\Mvc\Model;
use JchOptimize\Helper\CacheCleaner;
use JchOptimize\Joomla\Plugin\PluginHelper;

use function is_null;

class TogglePlugins extends Model
{
    public function togglePageCacheState(string $plugin, ?string $state = null): bool
    {
        //If state was not set then we toggle the existing state
        if (is_null($state)) {
            $state = PluginHelper::isEnabled('system', $plugin) ? '0' : '1';
        }

        $result = $this->setPluginState($plugin, $state);

        CacheCleaner::clearPluginsCache();
        PluginHelper::reload();

        return $result;
    }


    public function setPluginState(string $element, string $state): bool
    {
        try {
            $db = $this->db;
            $query = $db->getQuery(true)
                ->update('#__extensions')
                ->set($db->quoteName('enabled') . ' = ' . $db->quote($state))
                ->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))
                ->where($db->quoteName('folder') . ' = ' . $db->quote('system'))
                ->where($db->quoteName('element') . ' = ' . $db->quote($element));
            $db->setQuery($query);
            $db->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
