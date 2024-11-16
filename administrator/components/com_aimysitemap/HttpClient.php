<?php
/*
 * Copyright (c) 2017-2024 Aimy Extensions, Netzum Sorglos Software GmbH
 * Copyright (c) 2015-2017 Aimy Extensions, Lingua-Systems Software GmbH
 *
 * https://www.aimy-extensions.com/
 *
 * License: GNU GPLv2, see LICENSE.txt within distribution and/or
 *          https://www.aimy-extensions.com/software-license.html
 */
 defined( '_JEXEC' ) or die(); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/Uri.php' ); abstract class AimySitemapHttpClient { static private $socket_errstr = null; static private $name = 'AimySitemapCrawler/33.1'; static private $ua = 'Mozilla/5.0 (compatible; %s)'; static private $disguise = false; static private $cookie = false; static private $http_auth = false; const MSG_PARSE_HTTP = 255; const MSG_SOCKET = 256; static public function head_url( &$uo, $timeout = 10 ) { $resp = self::http_sndrcv( $uo, 'HEAD ' . $uo->getResourceHTTP() . ' HTTP/1.0', $timeout ); return array( 'head' => self::parse_head( $resp ) ); } static public function get_url( &$uo, $timeout = 10 ) { $data = self::http_sndrcv( $uo, 'GET ' . $uo->getResourceHTTP() . ' HTTP/1.0', $timeout ); @list( $head, $body ) = @explode( "\r\n\r\n", $data, 2 ); $r = array( 'head' => self::parse_head( $head ), 'body' => $body ); if ( is_array( $r[ 'head' ] ) && isset( $r[ 'head' ][ 'content-encoding' ] ) && is_string( $r[ 'head' ][ 'content-encoding' ] ) && strtolower( $r[ 'head' ][ 'content-encoding' ] ) === 'gzip' && function_exists( 'gzdecode' ) ) { $dec = @gzdecode( $r[ 'body' ] ); if ( $dec !== false ) { $r[ 'body' ] = $dec; unset( $r[ 'head' ][ 'content-encoding' ] ); } } if ( ! self::$cookie && is_array( $r[ 'head' ] ) && isset( $r[ 'head' ][ 'set-cookie' ] ) && is_string( $r[ 'head' ][ 'set-cookie' ] ) ) { if ( preg_match( '#^([A-F0-9]{32}=[A-Z0-9]+);#i', $r[ 'head' ][ 'set-cookie' ], $m ) ) { AimySitemapLogger::debug( 'Crawl: Cookie: [' . $m[ 1 ] . ']' ); self::$cookie = $m[ 1 ]; } } return $r; } static public function php_supports_ssl() { $tls = stream_get_transports(); return in_array( 'ssl', $tls ); } static public function get_cookie() { return self::$cookie; } static public function set_cookie( $v ) { self::$cookie = $v; } static private function http_sndrcv( &$uo, $q, $timeout = 10 ) { $host = $uo->getHost(); $port = $uo->getPort() ? $uo->getPort() : 80; $proto = $uo->getScheme() ? strtolower( $uo->getScheme() ) : 'http'; $trans = ''; $ctx_opt = array( 'ssl' => array( 'verify_host' => false, 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); if ( $proto == 'https' ) { $port = $port == 80 ? 443 : $port; $trans = 'ssl://'; } $ctx = stream_context_create( $ctx_opt ); set_error_handler( array( __CLASS__, 'socket_error_handler' ) ); $fp = stream_socket_client( "$trans$host:$port", $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT, $ctx ); restore_error_handler(); if ( $fp === false or ! empty( $errstr ) ) { if ( empty( $errstr ) ) { $errstr = self::$socket_errstr; self::$socket_errstr = null; } throw new RuntimeException( sprintf( 'Failed to open connection to ' . '%s%s:%d, req: %s, ctx: %s: %s', $trans, $host, $port, $q, ( is_resource( $ctx ) ? get_resource_type( $ctx ) : 'invalid' ), $errstr ), self::MSG_SOCKET ); } fwrite( $fp, $q . "\r\n" . 'Host: ' . $host . "\r\n" . 'User-Agent: ' . self::get_ua() . "\r\n" . 'Accept: ' . '*/*' . "\r\n" . ( self::$cookie ? 'Cookie: ' . self::$cookie . "\r\n" : '' ) . ( self::$http_auth ? 'Authorization: Basic ' . self::$http_auth . "\r\n" : '' ) . 'Connection: ' . 'close' . "\r\n" . "\r\n" ); fflush( $fp ); $resp = stream_get_contents( $fp ); if ( $resp === false ) { $err = error_get_last(); throw new RuntimeException( 'Failed to read stream data: ' . ( is_array( $err ) ? $err[ 'message' ] : 'no error' ) ); } return $resp; } static public function get_ua() { if ( self::$disguise ) { return 'Mozilla/5.0 (X11; Linux x86_64; rv:86.0) ' . 'Gecko/20100101 Firefox/86.0'; } return sprintf( self::$ua, self::$name ); } static public function set_ua_name( $n ) { self::$name = trim( $n ); } static public function set_disguise( $v = true ) { self::$disguise = (bool) $v; } static public function set_http_auth_credentials( $user, $pass ) { self::$http_auth = base64_encode( $user . ':' . $pass ); } static private function parse_head( $s ) { $a = explode( "\r\n", trim( $s ) ); $h = array_shift( $a ); $r = array(); preg_match( '#^HTTP/1.\d (\d{3}) #', $h, $m ); if ( count( $m ) != 2 ) { AimySitemapLogger::debug( "Crawl: HTTP HEAD response: [$s]" ); AimySitemapLogger::debug( "Crawl: parse_head failed: [$h]" ); throw new RuntimeException( 'Failed to parse head: status code not found', self::MSG_PARSE_HTTP ); } $r[ 'code' ] = $m[ 1 ]; while ( ! empty( $a ) ) { $l = array_pop( $a ); $p = explode( ':', $l, 2 ); if ( count( $p ) != 2 ) { throw new RuntimeException( 'Failed to parse head: failed to split fields', self::MSG_PARSE_HTTP ); } $r[ strtolower( $p[0] ) ] = trim( $p[1] ); } return $r; } static private function socket_error_handler( $code, $text, $f, $l ) { self::$socket_errstr = $text; } } 
