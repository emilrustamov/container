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
 defined( '_JEXEC' ) or die(); jimport( 'joomla.session.session' ); require_once( JPATH_COMPONENT . '/helpers/rights.php' ); require_once( JPATH_COMPONENT . '/helpers/config.php' ); require_once( JPATH_COMPONENT . '/Crawler.php' ); class AimySitemapControllerCrawl extends JControllerAdmin { public function crawl_init_ajax() { JSession::checkToken() or jexit( JText::_( 'INVALID TOKEN' ) ); $rights = AimySitemapRightsHelper::getRights(); if ( ! $rights->get( 'aimysitemap.crawl' ) ) { jexit( JText::_( 'JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN' ) ); } require_once( JPATH_COMPONENT . '/helpers/kvstore.php' ); AimySitemapKVStore::delete( 'rebuilding' ); header( 'Content-Type: application/json; charset=UTF-8' ); $crawler = new AimySitemapCrawler(); $res = null; $jin = JFactory::getApplication()->input; $resume = ( $jin->getWord( 'resume', '' ) == 'true' ); if ( $resume ) { AimySitemapLogger::debug( 'Crawl-Init-Ctrl: Resuming previous crawl' ); $res = array( 'ok' => true, 'url' => JUri::root( true ), 'msg' => JText::_( 'AIMY_SM_RESUMING_CRAWL' ) ); } else { try { $res = $crawler->initialize(); } catch ( Exception $e ) { AimySitemapLogger::error( "Crawl-Init-Ctrl: Exception: $e" ); error_log( "$e" ); $res = array( 'ok' => false, 'msg' => $e->getMessage() ); } if ( is_array( $res ) && isset( $res[ 'msg' ] ) ) { AimySitemapLogger::debug( 'Crawl-Init-Ctrl: ' . $res[ 'msg' ] ); } } $res[ 'progress' ] = AimySitemapCrawler::get_progress_data(); echo json_encode( $res ), "\n"; JFactory::getApplication()->close(); } public function crawl_ajax() { JSession::checkToken() or jexit( JText::_( 'INVALID TOKEN' ) ); $rights = AimySitemapRightsHelper::getRights(); if ( ! $rights->get( 'aimysitemap.crawl' ) ) { jexit( JText::_( 'JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN' ) ); } header( 'Content-Type: application/json; charset=UTF-8' ); $crawler = new AimySitemapCrawler(); $res = null; try { $res = $crawler->crawl(); } catch ( Exception $e ) { AimySitemapLogger::error( "Crawl-Ctrl: Exception: $e" ); error_log( "$e" ); echo json_encode(array( 'ok' => false, 'msg' => $e->getMessage() )), "\n"; return JFactory::getApplication()->close(); } if ( isset( $res[ 'url' ] ) or isset( $res[ 'msg' ] ) ) { AimySitemapLogger::debug( 'Crawl-Ctrl: done' . ( isset( $res[ 'msg' ] ) ? ( ' (' . $res[ 'msg' ] . ')' ) : '' ) ); } if ( isset( $res[ 'abort' ] ) && $res[ 'abort' ] ) { AimySitemapLogger::debug( 'Crawl-Ctrl: ' . ( ( isset( $res[ 'ok' ] ) && $res[ 'ok' ] ) ? 'finished' : 'aborted' ) ); if ( isset( $res[ 'ok' ] ) && $res[ 'ok' ] ) { if ( defined( 'JDEBUG' ) && JDEBUG ) { $res = array( 'ok' => 1, 'abort' => 1, 'msg' => JText::_( 'AIMY_SM_MSG_VIEW_LOG' ), 'stats' => array() ); } else { require_once( JPATH_COMPONENT . '/helpers/kvstore.php' ); if ( AimySitemapKVStore::get( 'rebuilding' ) ) { $res = array( 'ok' => 1, 'msg' => JText::_( 'AIMY_SM_MSG_REBUILDING' ), 'rebuilding' => 1 ); } else { AimySitemapKVStore::set( 'rebuilding', 1 ); require_once( JPATH_COMPONENT . '/Sitemap.php' ); $sm = new AimySitemapSitemap(); $res[ 'stats' ] = $sm->rebuild(); $cfg = new AimySitemapConfigHelper(); if ( $cfg->get( 'linkcheck_enable', true ) ) { require_once( JPATH_COMPONENT . '/LinkCheck.php' ); $lc = new AimySitemapLinkCheck(); $res[ 'brokenLinks' ] = $lc->rebuild(); } AimySitemapCrawler::delete_crawl_data(); AimySitemapKVStore::delete( 'rebuilding' ); } } } } $res[ 'progress' ] = AimySitemapCrawler::get_progress_data(); echo json_encode( $res ), "\n"; JFactory::getApplication()->close(); } public function get_log() { JSession::checkToken( 'get' ) or jexit( JText::_( 'INVALID TOKEN' ) ); $rights = AimySitemapRightsHelper::getRights(); if ( ! $rights->get( 'aimysitemap.crawl' ) ) { jexit( JText::_( 'JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN' ) ); } if ( ! defined( 'JDEBUG' ) or ! JDEBUG ) { jexit( 'This functionality is available in debugging mode only' ); } $path = AimySitemapLogger::get_path(); if ( ! is_readable( $path ) ) { jexit( 'Log file not found' ); } $fn = basename( $path ) . '.txt'; header( 'Content-Type: text/plain' ); header( 'Content-Disposition: attachment; filename=' . $fn ); readfile( $path ); JFactory::getApplication()->close(); } } 
