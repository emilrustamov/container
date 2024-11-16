<?php

/**
 * @package         Convert Forms
 * @version         4.3.0 Pro
 * 
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            https://www.tassos.gr
 * @copyright       Copyright © 2023 Tassos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

defined('_JEXEC') or die('Restricted access');

require_once __DIR__ . '/script.install.helper.php';

class PlgConvertFormsToolsExportSubmissionsInstallerScript extends PlgConvertFormsToolsExportSubmissionsInstallerScriptHelper
{
	public $name = 'exportsubmissions';
	public $alias = 'exportsubmissions';
	public $extension_type = 'plugin';
	public $show_message = false;
	public $autopublish = false;
}