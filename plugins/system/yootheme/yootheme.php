<?php

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Table\Table;
use Joomla\Event\DispatcherInterface;

// require classmap
require_once __DIR__ . '/classmap.php';

class plgSystemYOOtheme extends CMSPlugin
{
    /**
     * @var CMSApplication
     */
    public $app;

    /**
     * Constructor.
     *
     * @param DispatcherInterface $subject
     * @param array $config
     */
    public function __construct(&$subject, $config = array())
    {
        parent::__construct($subject, $config);

        $pattern = JPATH_ROOT . '/templates/*/template_bootstrap.php';

        array_map([$this, 'loadFile'], glob($pattern) ?: array());
    }

    /**
     * Loads a file.
     *
     * @param string $file
     * @return void
     */
    public function loadFile($file)
    {
        require $file;
    }

    /**
     * Prevent removal of YOOtheme Installer plugin if other YOOtheme packages are installed.
     *
     * @param int $eid
     */
    public function onExtensionBeforeUninstall($eid)
    {
        $elements = ['pkg_yootheme', 'pkg_zoo', 'pkg_widgetkit'];
        $row = Table::getInstance('extension');

        $row->load($eid);
        $package = $row->get('element');

        // uninstalling a yootheme package?
        if (!in_array($package, $elements, true)) {
            return;
        }

        $elements = array_diff($elements, [$package]);

        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        $query->select($db->quoteName(['extension_id']))
            ->from($db->quoteName('#__extensions'))
            ->where($db->quoteName('element') . ' IN (' . join(',', $db->quote($elements)) . ')');

        $db->setQuery($query);

        // are other yootheme packages installed?
        if (!$db->loadRowList()) {
            return;
        }

        $manifest = JPATH_MANIFESTS . "/packages/{$package}.xml";
        $contents = file_get_contents($manifest);

        // remove installer from package manifest to prevent removal
        $contents = preg_replace('/<file type="plugin" id="yootheme" group="installer">.+\.zip<\/file>/', '', $contents);

        file_put_contents($manifest, $contents);
    }
}
