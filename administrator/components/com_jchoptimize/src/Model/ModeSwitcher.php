<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/joomla-platform
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2020 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 * If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Model;

use Exception;
use JchOptimize\Core\Admin\Tasks;
use JchOptimize\Core\Mvc\Model;
use JchOptimize\Core\Registry;
use JchOptimize\Helper\CacheCleaner;
use JchOptimize\Joomla\Plugin\PluginHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

use function array_diff;
use function array_keys;
use function defined;
use function is_null;

use const JPATH_ADMINISTRATOR;

defined('_JEXEC') or die('Restricted Access');

class ModeSwitcher extends Model
{
    protected string $name = 'modeswitcher';

    private Cache $cacheModel;

    private TogglePlugins $togglePluginsModel;

    /**
     * @psalm-var array<string, string>
     */
    public array $pageCachePlugins = [
        'jchoptimizepagecache' => 'COM_JCHOPTIMIZE_SYSTEM_PAGE_CACHE',
        'cache' => 'COM_JCHOPTIMIZE_JOOMLA_SYSTEM_CACHE',
        'lscache' => 'COM_JCHOPTIMIZE_LITESPEED_CACHE',
        'pagecacheextended' => 'COM_JCHOPTIMIZE_PAGE_CACHE_EXTENDED'
    ];

    public function __construct(Registry $params, Cache $cacheModel, TogglePlugins $togglePluginsModel)
    {
        $this->state = $params;
        $this->cacheModel = $cacheModel;
        $this->togglePluginsModel = $togglePluginsModel;
    }

    public function setProduction(): void
    {
        $this->setPluginState('jchoptimize', '1');
        CacheCleaner::clearPluginsCache();
        PluginHelper::reload();

        if ($this->state->get('pro_page_cache_integration_enable', '0')) {
            $this->togglePageCacheState('1');
        }

        Tasks::generateNewCacheKey();
    }

    /**
     * @param null|string $state
     *
     * @psalm-param '0'|'1'|null $state
     */
    public function togglePageCacheState(?string $state = null): bool
    {
        $integratedPlugin = $this->getIntegratedPageCachePlugin();
        //If state was not set then we toggle the existing state
        if (is_null($state)) {
            $state = PluginHelper::isEnabled('system', $integratedPlugin) ? '0' : '1';
        }

        if ($state == '1') {
            //disable other plugins
            $pluginsToDisable = array_diff(array_keys($this->pageCachePlugins), [$integratedPlugin]);

            foreach ($pluginsToDisable as $plugin) {
                $this->setPluginState($plugin, '0');
            }
        } else {
            //Disable all page_cache_plugins
            foreach ($this->pageCachePlugins as $plugin => $title) {
                $this->setPluginState($plugin, '0');
            }
        }

        return $this->togglePluginsModel->togglePageCacheState($integratedPlugin, $state);
    }

    /**
     * @param string $element
     * @param string $state
     * @return bool
     */
    protected function setPluginState(string $element, string $state): bool
    {
        return $this->togglePluginsModel->setPluginState($element, $state);
    }

    public function setDevelopment(): void
    {
        $this->setPluginState('jchoptimize', '0');
        CacheCleaner::clearPluginsCache();
        PluginHelper::reload();

        if ($this->state->get('pro_page_cache_integration_enable', '0')) {
            $this->togglePageCacheState('0');
        }

        $this->cacheModel->cleanCache();
    }

    public function getIntegratedPageCachePlugin(): string
    {
        /** @var string */
        return $this->state->get('pro_page_cache_integration', 'jchoptimizepagecache');
    }

    /**
     * @return (string)[]
     *
     * @psalm-return array<int<0, max>, array-key>
     */
    public function getAvailablePageCachePlugins(): array
    {
        try {
            $query = $this->db->getQuery(true)
                ->select('element')
                ->from('#__extensions')
                ->where($this->db->quoteName('type') . '=' . $this->db->quote('plugin'))
                ->where($this->db->quoteName('folder') . '=' . $this->db->quote('system'));
            $this->db->setQuery($query);
            /** @psalm-var array<array-key, string> $plugins */
            $plugins = $this->db->loadColumn();
        } catch (Exception $e) {
            $plugins = ['jchoptimizepagecache'];
        }

        return array_intersect(array_keys($this->pageCachePlugins), $plugins);
    }

    public function getIndicators(): array
    {
        $app = Factory::getApplication();
        $lang = $app->getLanguage();
        $lang->load('mod_jchmodeswitcher', JPATH_ADMINISTRATOR);


        if (PluginHelper::isEnabled('system', 'jchoptimize')) {
            $mode = Text::_('MOD_JCHMODESWITCHER_PRODUCTION');
            $task = 'setDevelopment';
            $statusClass = 'production';
        } else {
            $mode = Text::_('MOD_JCHMODESWITCHER_DEVELOPMENT');
            $task = 'setProduction';
            $statusClass = 'development';
        }

        if (PluginHelper::isEnabled('system', $this->getIntegratedPageCachePlugin())) {
            $pageCacheStatus = Text::_('MOD_JCHMODESWITCHER_PAGECACHE_ENABLED');

            if ($statusClass == 'development') {
                $statusClass = 'page-cache-only';
            }
        } else {
            $pageCacheStatus = Text::_('MOD_JCHMODESWITCHER_PAGECACHE_DISABLED');

            if ($statusClass == 'production') {
                $statusClass = 'page-cache-disabled';
            }
        }

        return [$mode, $task, $pageCacheStatus, $statusClass];
    }
}
