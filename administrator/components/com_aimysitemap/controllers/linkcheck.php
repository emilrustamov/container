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
 defined( '_JEXEC' ) or die(); class AimySitemapControllerLinkCheck extends JControllerAdmin { public function getModel( $name = 'LinkCheck', $prefix = 'AimySitemapModel', $config = array( 'ignore_request' => true ) ) { return parent::getModel( $name, $prefix, $config ); } public function export() { JSession::checkToken() or jexit( JText::_( 'INVALID TOKEN' ) ); require_once( JPATH_COMPONENT . '/helpers/rights.php' ); $rights = AimySitemapRightsHelper::getRights(); if ( ! $rights->get( 'core.manage' ) ) { $this->setError( JText::_( 'JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN' ) ); $this->setRedirect( JRoute::_( 'index.php?option=com_aimysitemap&view=linkcheck', false ) ); return false; } $items = $this->getModel()->getItems(); $file = str_replace( ' ', '-', JText::_( 'AIMY_SM_LINK_LINKCHECK' ) ) . '__' . str_replace( '.', '_', JUri::getInstance()->getHost() ) . '.csv'; header( 'Content-Type: text/csv; charset=UTF-8' ); header( 'Content-Disposition: attachment; ' . 'filename="' . $file . '"' ); echo JText::_( 'AIMY_SM_LINKCHECK_BROKEN_LINK' ), ';', JText::_( 'AIMY_SM_LINKCHECK_PAGE_COUNT' ), ';', JText::_( 'AIMY_SM_LINKCHECK_SOURCES' ), "\r\n"; if ( is_array( $items ) ) { foreach ( $items as $item ) { $srcs = json_decode( $item->srcs ); echo $item->url, ';', count( $srcs ), ';'; $this->render_source_links( $srcs ); echo "\r\n"; } } JFactory::getApplication()->close(); } private function render_source_links( $srcs, $sep = ';' ) { foreach ( $srcs as $i => $src ) { echo $src->url; if ( isset( $src->is_redirect ) && $src->is_redirect ) { echo ' (→ ', JText::sprintf( 'AIMY_SM_LINKCHECK_REDIRECT_X', $src->code ), ')'; if ( isset( $src->found_on ) && is_array( $src->found_on ) ) { echo ' - ', JText::_( 'AIMY_SM_LINKCHECK_FOUND_ON' ), ': '; $this->render_source_links( $src->found_on, ' - ' ); } } if ( $i+1 < count( $srcs ) ) { echo $sep; } } } } 
