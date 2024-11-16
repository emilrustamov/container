<?php
/*
 * Copyright (c) 2017-2024 Aimy Extensions, Netzum Sorglos Software GmbH
 * Copyright (c) 2016-2017 Aimy Extensions, Lingua-Systems Software GmbH
 *
 * https://www.aimy-extensions.com/
 *
 * License: GNU GPLv2, see LICENSE.txt within distribution and/or
 *          https://www.aimy-extensions.com/software-license.html
 */
 defined( '_JEXEC' ) or die(); require_once( JPATH_COMPONENT . '/helpers/rights.php' ); require_once( JPATH_COMPONENT . '/helpers/config.php' ); require_once( JPATH_COMPONENT . '/helpers/kvstore.php' ); class AimySitemapViewLinkCheck extends JViewLegacy { protected $allow_config = false; protected $allow_export = false; protected $enabled = true; protected $check_done = false; public function display( $tpl = null ) { $this->enabled = AimySitemapConfigHelper::get_once( 'linkcheck_enable', true ); if ( $this->enabled ) { $this->items = $this->get( 'Items' ); foreach ( $this->items as $item ) { $item->srcs = json_decode( $item->srcs ); } } else { $this->items = array(); } $rights = AimySitemapRightsHelper::getRights(); $this->allow_export = $rights->get( 'core.manage' ); $this->allow_config = $rights->get( 'core.admin' ); $this->addToolbar(); $this->check_done = AimySitemapKVStore::get( 'linkcheck-done' ); return parent::display( $tpl ); } protected function addToolbar() { $bar = JToolBar::getInstance( 'toolbar' ); JToolBarHelper::title( JText::_( 'AIMY_SM_LINKCHECK' ), '' ); if ( $this->allow_export ) { JToolBarHelper::custom( 'linkcheck.export', 'download', 'download', JText::_( 'JTOOLBAR_EXPORT' ), false, false ); } if ( $this->allow_config ) { JToolBarHelper::preferences( 'com_aimysitemap' ); } } } 
