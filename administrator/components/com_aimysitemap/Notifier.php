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
 defined( '_JEXEC' ) or die(); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/Uri.php' ); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/config.php' ); jimport( 'joomla.filesystem.file' ); abstract class AimySitemapNotifier { static public function is_enabled( $se ) { $cfg = new AimySitemapConfigHelper(); return $cfg->get( 'notify_' . strtolower( $se ), false ); } static public function ping_all_enabled() { if ( self::is_enabled( 'indexnow' ) ) { return self::ping_indexnow(); } return true; } static public function ping( $se ) { $m = 'ping_' . strtolower( $se ); if ( method_exists( __CLASS__, $m ) ) { return self::$m(); } return false; } static public function ping_indexnow() { require_once( __DIR__ . '/IndexNow.php' ); $count = 0; try { $count = AimySitemapIndexNow::submit_recent_changes(); } catch ( Exception $e ) { AimySitemapLogger::error( $e->getMessage() ); return false; } $res = array( 'ok' => true ); if ( $count == 0 ) { $res[ 'msg' ] = JText::_( 'AIMY_SM_MSG_INDEXNOW_NO_RECENT_CHANGES' ); } else { $res[ 'msg' ] = JText::sprintf( 'AIMY_SM_MSG_INDEXNOW_NOTIFIED_X', $count ); } return $res; } } 
