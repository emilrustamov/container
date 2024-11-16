<?php

namespace YOOtheme\Theme\Joomla\Listener;

use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\User\User;
use YOOtheme\Config;
use YOOtheme\Path;
use YOOtheme\Theme\Joomla\ModuleConfig;

class LoadModuleData
{
    public User $user;
    public Config $config;
    public ModuleConfig $module;

    public function __construct(User $user, Config $config, ModuleConfig $module)
    {
        $this->user = $user;
        $this->config = $config;
        $this->module = $module;
    }

    public function handle(): void
    {
        $this->config->add('customizer', ['module' => $this->module->getArrayCopy()]);
        $this->config->addFile('customizer.panels.module', Path::get('../../config/modules.json'));

        if ($this->user->authorise('core.manage', 'com_modules')) {
            $component = PluginHelper::isEnabled('system', 'advancedmodules')
                ? 'com_advancedmodules'
                : 'com_modules';

            $this->config->set(
                'customizer.sections.joomla-modules.url',
                "administrator/index.php?option={$component}",
            );

            $this->config->addFile(
                'customizer',
                Path::get('../../config/customizer.json', __DIR__),
            );
        }
    }
}
