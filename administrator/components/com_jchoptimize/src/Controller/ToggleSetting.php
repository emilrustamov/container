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

namespace JchOptimize\Controller;

use JchOptimize\Core\Admin\Icons;
use JchOptimize\Core\Exception\ExceptionInterface;
use JchOptimize\Core\Mvc\Controller;
use JchOptimize\Model\Configure;
use JchOptimize\Model\ModeSwitcher;
use JchOptimize\Platform\Cache;
use Joomla\Application\AbstractApplication;
use Joomla\CMS\Application\AdministratorApplication;
use Joomla\CMS\Language\Text;
use Joomla\Input\Input;

use function defined;
use function json_encode;

defined('_JEXEC') or die('Restricted Access');

class ToggleSetting extends Controller
{
    /**
     * @var Configure
     */
    private Configure $model;

    public function __construct(Configure $model, ?Input $input = null, ?AbstractApplication $application = null)
    {
        $this->model = $model;

        parent::__construct($input, $application);
    }

    public function execute(): bool
    {
        /** @var Input $input */
        $input = $this->getInput();
        /** @var string $setting */
        $setting = $input->get('setting');

        try {
            $this->model->toggleSetting($setting);
        } catch (ExceptionInterface $e) {
        }

        $currentSettingValue = (string)$this->model->getState()->get($setting);

        if ($setting == 'integrated_page_cache_enable') {
            $currentSettingValue = Cache::isPageCacheEnabled($this->model->getState());
        }

        $class = $currentSettingValue ? 'enabled' : 'disabled';
        $class2 = '';
        $auto = false;
        $pageCacheStatus = '';
        $statusClass = '';

        if ($setting == 'pro_reduce_unused_css') {
            $class2 = $this->model->getState()->get('optimizeCssDelivery_enable') ? 'enabled' : 'disabled';
        }

        if ($setting == 'optimizeCssDelivery_enable') {
            $class2 = $this->model->getState()->get('pro_reduce_unused_css') ? 'enabled' : 'disabled';
        }

        if ($setting == 'combine_files_enable' && $currentSettingValue) {
            $auto = $this->getEnabledAutoSetting();
        }

        if (JCH_PRO && $setting == 'integrated_page_cache_enable') {
            /** @var ModeSwitcher $modeSwitcher */
            $modeSwitcher = $this->getContainer()->get(ModeSwitcher::class);
            [, , $pageCacheStatus, $statusClass] = $modeSwitcher->getIndicators();
            $pageCacheStatus = Text::sprintf('MOD_JCHMODESWITCHER_PAGECACHE_STATUS', $pageCacheStatus);
        }

        $body = json_encode(
            [
                'class' => $class,
                'class2' => $class2,
                'auto' => $auto,
                'page_cache_status' => $pageCacheStatus,
                'status_class' => $statusClass
            ]
        );

        /** @var AdministratorApplication $app */
        $app = $this->getApplication();
        $app->clearHeaders();
        $app->setHeader('Content-Type', 'application/json');
        $app->setHeader('Content-Length', (string)strlen($body));
        $app->setBody($body);
        $app->allowCache(false);

        echo $app->toString();

        $app->close();

        return true;
    }

    /**
     * @return false|string
     */
    private function getEnabledAutoSetting()
    {
        $autoSettingsMap = Icons::autoSettingsArrayMap();

        $autoSettingsInitialized = array_map(function ($a) {
            return '0';
        }, $autoSettingsMap);

        $currentAutoSettings = array_intersect_key($this->model->getState()->toArray(), $autoSettingsInitialized);
        //order array
        $orderedCurrentAutoSettings = array_merge($autoSettingsInitialized, $currentAutoSettings);

        $autoSettings = ['minimum', 'intermediate', 'average', 'deluxe', 'premium', 'optimum'];

        for ($j = 0; $j < 6; $j++) {
            if (array_values($orderedCurrentAutoSettings) === array_column($autoSettingsMap, 's' . ($j + 1))) {
                return $autoSettings[$j];
            }
        }

        //No auto setting configured
        return false;
    }
}
