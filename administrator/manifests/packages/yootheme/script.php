<?php

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\Adapter\InstallerAdapter;
use Joomla\Database\DatabaseInterface;

class pkg_yoothemeInstallerScript
{
    /**
     * @var InstallerAdapter
     */
    protected $adapter;

    /**
     * @var DatabaseInterface
     */
    protected $database;

    public function preflight()
    {
        if (!$this->requirePHP('7.4')) {
            return false;
        }
    }

    public function postflight($type, $adapter)
    {
        if (!in_array($type, ['install', 'update'])) {
            return true;
        }

        $this->adapter = $adapter;
        $this->database = version_compare(JVERSION, '4.0', '<')
            ? Factory::getDbo()
            : Factory::getContainer()->get(DatabaseInterface::class);

        $this->patchUpdateSite();
        $this->removeOldUpdateSites();

        return true;
    }

    protected function patchUpdateSite()
    {
        $site = $this->getUpdateSite($this->adapter->currentExtensionId);
        $server = $this->adapter->manifest->updateservers->children()[0];

        if (!$site) {
            return;
        }

        // set name and location
        $site->name = strval($server['name']);
        $site->location = trim(strval($server));

        // set installer api key
        if (!$site->extra_query && ($key = $this->getInstallerApikey())) {
            $site->extra_query = "key={$key}";
        }

        $this->database->updateObject('#__update_sites', $site, 'update_site_id');
    }

    protected function getInstallerApikey()
    {
        $query = fn($db, $query) => $query
            ->select($db->qn('params'))
            ->from('#__extensions')
            ->where("{$db->qn('type')} = {$db->q('plugin')}")
            ->where("{$db->qn('folder')} = {$db->q('installer')}")
            ->where("{$db->qn('element')} = {$db->q('yootheme')}");

        if ($extension = $this->createQuery($query)->loadObject()) {
            $params = json_decode($extension->params);
        }

        return $params->apikey ?? null;
    }

    protected function getUpdateSite($extensionId)
    {
        $query = fn($db, $query) => $query
            ->select('s.*')
            ->from($db->qn('#__update_sites', 's'))
            ->innerJoin(
                sprintf(
                    '%s ON %s = %s',
                    $db->qn('#__update_sites_extensions', 'se'),
                    $db->qn('se.update_site_id'),
                    $db->qn('s.update_site_id'),
                ),
            )
            ->where("{$db->qn('se.extension_id')} = {$extensionId}");

        return $extensionId ? $this->createQuery($query)->loadObject() : null;
    }

    protected function removeUpdateSites(array $siteIds)
    {
        foreach (['#__update_sites', '#__update_sites_extensions'] as $table) {
            $query = fn($db, $query) => $query
                ->delete($table)
                ->where("{$db->qn('update_site_id')} IN (" . implode(',', $siteIds) . ')');

            $this->createQuery($query)->execute();
        }
    }

    protected function removeOldUpdateSites()
    {
        $query = fn($db, $query) => $query
            ->select($db->qn('update_site_id'))
            ->from('#__update_sites')
            ->where(
                "{$db->qn('location')} LIKE {$db->q('%/yootheme.com/api/update/yootheme_j33.xml')}",
            );

        if ($ids = $this->createQuery($query)->loadColumn()) {
            $this->removeUpdateSites($ids);
        }
    }

    protected function requirePHP($version)
    {
        if (version_compare(PHP_VERSION, $version, '>=')) {
            return true;
        }

        Factory::getApplication()->enqueueMessage(
            "<p>You need PHP {$version} or later to install the template.</p>",
            'warning',
        );

        return false;
    }

    protected function createQuery(callable $callback)
    {
        return $this->database->setQuery(
            $callback($this->database, $this->database->getQuery(true)),
        );
    }
}
