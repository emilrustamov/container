<?php

namespace YOOtheme\Joomla;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\Component\Media\Administrator\Provider\ProviderInterface;
use YOOtheme\Path;

class Media
{
    public static function getRoot($root = null): string
    {
        $provider = static::getLocalProvider();
        $path = null;

        if ($provider) {
            $adapters = $provider->getAdapters();
            $adapter = $root ? $adapters[$root] ?? null : current($adapters);

            if ($adapter) {
                $path = $adapter->getAdapterName();
            }
        }

        return Path::join(
            JPATH_ROOT,
            $path ?: ComponentHelper::getParams('com_media')->get('file_path', 'images'),
        );
    }

    public static function getRootPaths(): array
    {
        $provider = static::getLocalProvider();

        if (!$provider) {
            return [];
        }

        return array_values(
            array_map(fn($adapter) => $adapter->getAdapterName(), $provider->getAdapters()),
        );
    }

    protected static function getLocalProvider(): ?ProviderInterface
    {
        $joomla = Factory::getApplication();

        if (!is_callable([$joomla, 'bootComponent'])) {
            return null;
        }

        $model = $joomla
            ->bootComponent('com_media')
            ->getMVCFactory()
            ->createModel('Api', 'Administrator');

        try {
            return $model->getProvider('local');
        } catch (\Exception $e) {
            return null;
        }
    }
}
