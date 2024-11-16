<?php
/*
 * Copyright (c) 2017-2024 Aimy Extensions, Netzum Sorglos Software GmbH
 * Copyright (c) 2014-2017 Aimy Extensions, Lingua-Systems Software GmbH
 *
 * https://www.aimy-extensions.com/
 *
 * License: GNU GPLv2, see LICENSE.txt within distribution and/or
 *          https://www.aimy-extensions.com/software-license.html
 */
 defined( '_JEXEC' ) or die(); require_once( JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'rights.php' ); require_once( JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'kvstore.php' ); class AimySitemapViewPeriodic extends JViewLegacy { protected $allow_config = false; protected $report = null; public function display( $tpl = null ) { $errors = $this->get( 'Errors' ); if ( is_array( $errors ) && count( $errors ) ) { throw new Exception( implode( "\n", $errors ), 500 ); return false; } $rights = AimySitemapRightsHelper::getRights(); $this->allow_config = $rights->get( 'core.admin' ); $report = AimySitemapKVStore::get( 'periodic_report' ); if ( $report === false ) { throw new Exception( 'Failed to unserialize report data', 500 ); return false; } if ( ! empty( $report ) ) { $this->report = unserialize( $report ); } $base_url = AimySitemapKVStore::get( 'base-url' ); if ( $base_url !== JURI::root() ) { AimySitemapKVStore::set( 'base-url', JURI::root() ); } $this->addToolbar(); parent::display( $tpl ); } protected function addToolbar() { $bar = JToolBar::getInstance( 'toolbar' ); JToolBarHelper::title( JText::_( 'AIMY_SM_PERIODIC' ), '' ); JToolBarHelper::custom( 'show_report', 'archive', '', JText::_( 'AIMY_SM_PERIODIC_SHOW_REPORT' ), false ); JToolBarHelper::custom( 'show_output', 'file', '', JText::_( 'AIMY_SM_PERIODIC_SHOW_OUTPUT' ), false ); if ( $this->allow_config ) { JToolBarHelper::preferences( 'com_aimysitemap' ); } } } 
