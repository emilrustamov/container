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

use JchOptimize\Core\Admin\Helper;
use Joomla\CMS\Form\FormHelper as JFormHelper;
use Joomla\CMS\Form\Field\RadioField as JFormFieldRadio;

defined('_JEXEC') or die;


JFormHelper::loadFieldClass('radio');

class JFormFieldProonlyradio extends JFormFieldRadio
{
    public $type = 'proonlyradio';

    protected function getInput()
    {
        if (!JCH_PRO) {
            return Helper::proOnlyField();
        } else {
            return parent::getInput();
        }
    }
}
