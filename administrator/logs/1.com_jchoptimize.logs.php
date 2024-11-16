#
#<?php die('Forbidden.'); ?>
#Date: 2024-09-24 21:41:55 UTC
#Software: Joomla! 4.4.3 Stable [ Pamoja ] 20-February-2024 16:00 GMT

#Fields: datetime	priority clientip	category	message
2024-09-24T21:41:55+00:00	ERROR 57.180.45.83	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-09-25T14:37:18+00:00	ERROR 205.169.39.21	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-09-26T06:10:51+00:00	ERROR 165.232.165.218	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('f7c0d763e3430c7...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(421): JchOptimize\Core\Html\HtmlManager->buildUrl('f7c0d763e3430c7...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(204): JchOptimize\Core\Html\HtmlManager->addJsLazyLoadAssetsToHtml('f7c0d763e3430c7...', 'body')
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#4 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#5 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#6 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#8 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#9 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#10 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#11 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#12 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#13 {main}
2024-09-28T16:16:11+00:00	ERROR 101.47.17.215	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-09-29T10:20:17+00:00	ERROR 43.156.109.53	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(125): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#5 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#6 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#7 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#8 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#10 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#11 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#12 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#13 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#14 {main}
2024-09-30T18:38:45+00:00	ERROR 91.92.244.110	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-04T23:31:16+00:00	ERROR 34.0.136.142	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-18T18:09:18+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-18T21:37:43+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-19T16:27:28+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-19T17:31:56+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-20T01:40:00+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-20T16:29:03+00:00	ERROR 52.167.144.204	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-20T22:49:53+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-21T12:42:55+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-22T00:01:45+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-22T15:08:37+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-22T19:23:25+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
2024-10-23T10:27:37+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('e3615eff2fc3875...', 'js')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(162): JchOptimize\Core\Html\HtmlManager->buildUrl('e3615eff2fc3875...', 'js')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/FeatureHelpers/DynamicJs.php(116): JchOptimize\Core\FeatureHelpers\DynamicJs->processDynamicScripts(Array)
#3 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(180): JchOptimize\Core\FeatureHelpers\DynamicJs->prepareJsDynamicUrls(Array)
#4 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(198): JchOptimize\Core\Html\HtmlManager->addDeferredJs('body')
#5 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#6 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#7 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#8 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#9 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#10 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#11 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#12 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#13 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#14 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#15 {main}
2024-10-24T05:49:33+00:00	ERROR 23.111.204.42	com_jchoptimize	JchOptimize\Core\Exception\RuntimeException: Error retrieving combined contents in [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php:336
Stack trace:
#0 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/HtmlManager.php(301): JchOptimize\Core\Html\HtmlManager->createStaticFiles('5b2f20145050aee...', 'css')
#1 [ROOT]/administrator/components/com_jchoptimize/lib/src/Html/CacheManager.php(163): JchOptimize\Core\Html\HtmlManager->buildUrl('5b2f20145050aee...', 'css')
#2 [ROOT]/administrator/components/com_jchoptimize/lib/src/Optimize.php(118): JchOptimize\Core\Html\CacheManager->handleCombineJsCss()
#3 [ROOT]/plugins/system/jchoptimize/jchoptimize.php(218): JchOptimize\Core\Optimize->process()
#4 [ROOT]/libraries/src/Plugin/CMSPlugin.php(289): plgSystemJchoptimize->onAfterRender()
#5 [ROOT]/libraries/vendor/joomla/event/src/Dispatcher.php(486): Joomla\CMS\Plugin\CMSPlugin->Joomla\CMS\Plugin\{closure}(Object(Joomla\Event\Event))
#6 [ROOT]/libraries/src/Application/EventAware.php(111): Joomla\Event\Dispatcher->dispatch('onAfterRender', Object(Joomla\Event\Event))
#7 [ROOT]/libraries/src/Application/CMSApplication.php(1031): Joomla\CMS\Application\WebApplication->triggerEvent('onAfterRender')
#8 [ROOT]/libraries/src/Application/SiteApplication.php(724): Joomla\CMS\Application\CMSApplication->render()
#9 [ROOT]/libraries/src/Application/CMSApplication.php(298): Joomla\CMS\Application\SiteApplication->render()
#10 [ROOT]/includes/app.php(61): Joomla\CMS\Application\CMSApplication->execute()
#11 [ROOT]/index.php(32): require_once('/var/www/u25265...')
#12 {main}
