<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81d9867808db043880b653b61c12bc55
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JchOptimize\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JchOptimize\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'JchOptimize\\Command\\ReCache' => __DIR__ . '/../..' . '/src/Command/ReCache.php',
        'JchOptimize\\ContainerFactory' => __DIR__ . '/../..' . '/src/ContainerFactory.php',
        'JchOptimize\\ControllerResolver' => __DIR__ . '/../..' . '/src/ControllerResolver.php',
        'JchOptimize\\Controller\\Ajax' => __DIR__ . '/../..' . '/src/Controller/Ajax.php',
        'JchOptimize\\Controller\\ApplyAutoSetting' => __DIR__ . '/../..' . '/src/Controller/ApplyAutoSetting.php',
        'JchOptimize\\Controller\\CacheInfo' => __DIR__ . '/../..' . '/src/Controller/CacheInfo.php',
        'JchOptimize\\Controller\\ControlPanel' => __DIR__ . '/../..' . '/src/Controller/ControlPanel.php',
        'JchOptimize\\Controller\\ModeSwitcher' => __DIR__ . '/../..' . '/src/Controller/ModeSwitcher.php',
        'JchOptimize\\Controller\\OptimizeImage' => __DIR__ . '/../..' . '/src/Controller/OptimizeImage.php',
        'JchOptimize\\Controller\\OptimizeImages' => __DIR__ . '/../..' . '/src/Controller/OptimizeImages.php',
        'JchOptimize\\Controller\\PageCache' => __DIR__ . '/../..' . '/src/Controller/PageCache.php',
        'JchOptimize\\Controller\\ToggleSetting' => __DIR__ . '/../..' . '/src/Controller/ToggleSetting.php',
        'JchOptimize\\Controller\\Utility' => __DIR__ . '/../..' . '/src/Controller/Utility.php',
        'JchOptimize\\Crawlers\\ReCacheCli' => __DIR__ . '/../..' . '/src/Crawlers/ReCacheCli.php',
        'JchOptimize\\Crawlers\\ReCacheCliJ3' => __DIR__ . '/../..' . '/src/Crawlers/ReCacheCliJ3.php',
        'JchOptimize\\Crawlers\\ReCacheWithRedirect' => __DIR__ . '/../..' . '/src/Crawlers/ReCacheWithRedirect.php',
        'JchOptimize\\GetApplicationTrait' => __DIR__ . '/../..' . '/src/GetApplicationTrait.php',
        'JchOptimize\\Helper\\CacheCleaner' => __DIR__ . '/../..' . '/src/Helper/CacheCleaner.php',
        'JchOptimize\\Helper\\OptimizeImage' => __DIR__ . '/../..' . '/src/Helper/OptimizeImage.php',
        'JchOptimize\\Joomla\\Database\\Database' => __DIR__ . '/../..' . '/src/Joomla/Database/Database.php',
        'JchOptimize\\Joomla\\Plugin\\PluginHelper' => __DIR__ . '/../..' . '/src/Joomla/Plugin/PluginHelper.php',
        'JchOptimize\\Log\\JoomlaLogger' => __DIR__ . '/../..' . '/src/Log/JoomlaLogger.php',
        'JchOptimize\\Model\\ApiParams' => __DIR__ . '/../..' . '/src/Model/ApiParams.php',
        'JchOptimize\\Model\\BulkSettings' => __DIR__ . '/../..' . '/src/Model/BulkSettings.php',
        'JchOptimize\\Model\\Cache' => __DIR__ . '/../..' . '/src/Model/Cache.php',
        'JchOptimize\\Model\\Configure' => __DIR__ . '/../..' . '/src/Model/Configure.php',
        'JchOptimize\\Model\\ModeSwitcher' => __DIR__ . '/../..' . '/src/Model/ModeSwitcher.php',
        'JchOptimize\\Model\\OrderPlugins' => __DIR__ . '/../..' . '/src/Model/OrderPlugins.php',
        'JchOptimize\\Model\\PageCache' => __DIR__ . '/../..' . '/src/Model/PageCache.php',
        'JchOptimize\\Model\\ReCache' => __DIR__ . '/../..' . '/src/Model/ReCache.php',
        'JchOptimize\\Model\\SaveSettingsTrait' => __DIR__ . '/../..' . '/src/Model/SaveSettingsTrait.php',
        'JchOptimize\\Model\\TogglePlugins' => __DIR__ . '/../..' . '/src/Model/TogglePlugins.php',
        'JchOptimize\\Model\\Updates' => __DIR__ . '/../..' . '/src/Model/Updates.php',
        'JchOptimize\\Platform\\Cache' => __DIR__ . '/../..' . '/src/Platform/Cache.php',
        'JchOptimize\\Platform\\Excludes' => __DIR__ . '/../..' . '/src/Platform/Excludes.php',
        'JchOptimize\\Platform\\Hooks' => __DIR__ . '/../..' . '/src/Platform/Hooks.php',
        'JchOptimize\\Platform\\Html' => __DIR__ . '/../..' . '/src/Platform/Html.php',
        'JchOptimize\\Platform\\Paths' => __DIR__ . '/../..' . '/src/Platform/Paths.php',
        'JchOptimize\\Platform\\Plugin' => __DIR__ . '/../..' . '/src/Platform/Plugin.php',
        'JchOptimize\\Platform\\Profiler' => __DIR__ . '/../..' . '/src/Platform/Profiler.php',
        'JchOptimize\\Platform\\Utility' => __DIR__ . '/../..' . '/src/Platform/Utility.php',
        'JchOptimize\\Service\\ConfigurationProvider' => __DIR__ . '/../..' . '/src/Service/ConfigurationProvider.php',
        'JchOptimize\\Service\\DatabaseProvider' => __DIR__ . '/../..' . '/src/Service/DatabaseProvider.php',
        'JchOptimize\\Service\\LoggerProvider' => __DIR__ . '/../..' . '/src/Service/LoggerProvider.php',
        'JchOptimize\\Service\\ModeSwitcherProvider' => __DIR__ . '/../..' . '/src/Service/ModeSwitcherProvider.php',
        'JchOptimize\\Service\\MvcProvider' => __DIR__ . '/../..' . '/src/Service/MvcProvider.php',
        'JchOptimize\\Service\\ReCacheProvider' => __DIR__ . '/../..' . '/src/Service/ReCacheProvider.php',
        'JchOptimize\\View\\ControlPanelHtml' => __DIR__ . '/../..' . '/src/View/ControlPanelHtml.php',
        'JchOptimize\\View\\OptimizeImagesHtml' => __DIR__ . '/../..' . '/src/View/OptimizeImagesHtml.php',
        'JchOptimize\\View\\PageCacheHtml' => __DIR__ . '/../..' . '/src/View/PageCacheHtml.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81d9867808db043880b653b61c12bc55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81d9867808db043880b653b61c12bc55::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81d9867808db043880b653b61c12bc55::$classMap;

        }, null, ClassLoader::class);
    }
}