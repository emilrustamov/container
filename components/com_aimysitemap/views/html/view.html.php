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
 defined( '_JEXEC' ) or die(); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/language.php' ); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/compat.php' ); class AimySitemapViewHtml extends JViewLegacy { protected $items = null; protected $data = null; protected $params = null; protected $merge = false; protected $filterlang = false; protected $exclude_img = false; protected $exclude_doc = false; protected $exclude_mm = false; protected $show_credits = true; protected $variant = 'list'; protected $container_style = 'bs2'; static private $container_style_ok = array( 'bs2', 'bs3' ); static private $variants_ok = array( 'list', 'hierarchy', 'priority', 'index' ); static private $locale = false; public function __construct( $options = null ) { $jin = JFactory::getApplication()->input; $v = $jin->get( 'variant', 'list', 'word' ); if ( in_array( $v, self::$variants_ok ) ) { $this->variant = $v; } $cc = $jin->get( 'container_style', 'bs2', 'alnum' ); if ( in_array( $cc, self::$container_style_ok ) ) { $this->container_style = $cc; } $this->merge = $jin->get( 'prevent_duplicate_titles', true, 'bool' ); $this->filterlang = $jin->get( 'filter_by_language', false, 'bool' ); $this->exclude_img = $jin->get( 'exclude_images', false, 'bool' ); $this->exclude_doc = $jin->get( 'exclude_documents', false, 'bool' ); $this->exclude_mm = $jin->get( 'exclude_multimedia', false, 'bool' ); $this->show_credits = $jin->get( 'show_credits', false, 'bool' ); if ( ! self::$locale ) { $locales = JFactory::getLanguage()->getLocale(); if ( is_array( $locales ) && ! empty( $locales ) ) { self::$locale = $locales[ 0 ]; } } parent::__construct( $options ); $this->params = JFactory::getApplication()->getParams(); } public function display( $tpl = null ) { $this->items = $this->get( 'Items' ); $errors = $this->get( 'Errors' ); if ( is_array( $errors ) && count( $errors ) ) { throw new Exception( implode( "\n", $errors ), 500 ); return false; } if ( $this->filterlang ) { $this->_filter_by_language(); } if ( $this->exclude_img or $this->exclude_doc or $this->exclude_mm ) { $this->_exclude_by_type(); } if ( $this->merge ) { $this->_merge_urls_by_title(); } switch ( $this->variant ) { case 'index': $this->data = $this->_build_index(); break; case 'hierarchy': $this->data = $this->_build_hierarchy(); break; case 'priority': $this->data = $this->_build_priority(); break; default: $this->data = $this->_build_list(); break; } $this->_prepare_document(); parent::display( $tpl ); } private function _prepare_document() { $app = JFactory::getApplication(); $doc = JFactory::getDocument(); $menu = $app->getMenu()->getActive(); if ( $menu && $this->params ) { $this->params->def( 'page_heading', $this->params->get( 'page_heading', $menu->title ) ); } $title = ''; if ( $this->params ) { $title = $this->params->get( 'page_title', '' ); } if ( empty( $title ) && ! empty( $menu ) ) { $title = $menu->title; } $title_pos = $this->get_config( 'sitename_pagetitles', 0 ); switch ( $title_pos ) { case 1: $doc->setTitle( JText::sprintf( 'JPAGETITLE', $this->get_config( 'sitename' ), $title ) ); break; case 2: $doc->setTitle( JText::sprintf( 'JPAGETITLE', $title, $this->get_config( 'sitename' ) ) ); } if ( $desc = AimySitemapCompatHelper::getMenuItemParam( $menu, 'menu-meta_description', false ) ) { $doc->setDescription( $desc ); } else if ( $desc = $this->get_config( 'MetaDesc', false ) ) { $doc->setDescription( $desc ); } if ( $kw = AimySitemapCompatHelper::getMenuItemParam( $menu, 'menu-meta_keywords', false ) ) { $doc->setMetadata( 'keywords', $kw ); } else if ( $kw = $this->get_config( 'MetaKeys' ) ) { $doc->setMetadata( 'keywords', $kw ); } if ( $rob = AimySitemapCompatHelper::getMenuItemParam( $menu, 'robots', false ) ) { $doc->setMetadata( 'robots', $rob ); } else if ( $rob = $this->get_config( 'robots', false ) ) { $doc->setMetadata( 'robots', $rob ); } else { $doc->setMetadata( 'robots', 'index, follow' ); } } private function _build_list() { usort( $this->items, array( __CLASS__, 'sort_by_title' ) ); return $this->items; } private function _build_index() { $idx = array(); foreach ( $this->items as $item ) { $fc = AimySitemapLanguageHelper::get_index_character( $item->title ); $idx[ $fc ][] = $item; } uksort( $idx, array( __CLASS__, 'sort_by_string_asc' ) ); foreach ( array_keys( $idx ) as $key ) { uasort( $idx[ $key ], array( __CLASS__, 'sort_by_title' ) ); } return $idx; } private function _merge_urls_by_title() { $map = array(); foreach ( $this->items as $item ) { $t = $item->title; if ( ! isset( $map[ $item->title ] ) ) { $map[ $t ] = $item; } else { if ( strlen( $item->url ) < strlen( $map[ $t ]->url ) ) { $map[ $t ] = $item; } } } $this->items = array_values( $map ); } private function _filter_by_language() { $doclang = JFactory::getLanguage()->getTag(); $nitems = array(); foreach ( $this->items as $item ) { if ( $item->lang == '*' or strcasecmp( $item->lang, $doclang ) == 0 ) { $nitems[] = $item; } } $this->items = $nitems; } private function _exclude_by_type() { $nitems = array(); foreach ( $this->items as $item ) { if ( preg_match( '#\.([^\.]+)$#', $item->url, $m ) ) { $ext = trim( preg_replace( '#[\?\#].*$#', '', $m[ 1 ] ) ); if ( ! empty( $ext ) ) { if ( ( $this->exclude_img && self::_is_img_ext( $ext ) ) or ( $this->exclude_doc && self::_is_doc_ext( $ext ) ) or ( $this->exclude_mm && self::_is_mm_ext( $ext ) ) ) { continue; } } } $nitems[] = $item; } $this->items = $nitems; } static private function _is_img_ext( $ext ) { return preg_match( '#^(?:jpe?g|png|gif|bmp|tiff|svg|webp)$#i', $ext ); } static private function _is_doc_ext( $ext ) { return preg_match( '#^(?:txt|rtf|pdf|ps|docx?|xlsx?|o[dt][st]|odp|pptx?|)$#i', $ext ); } static private function _is_mm_ext( $ext ) { return preg_match( '#^(?:mp[34]|og[gva]|webm|m4[va]|wav|avi|divx|wm[av])$#i', $ext ); } private function _build_hierarchy() { require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/' . 'Hierarchy.php' ); $hier = new AimySitemap\Hierarchy(); foreach ( $this->items as $item ) { $id = preg_replace( '#/\d+-#', '/', preg_replace( '#^/?' . JURI::root( true ) . '/?#', '', preg_replace( '#\.html$#', '', $item->url ) ) ); $hier->add( $id, $item ); } $hier->prune(); $hier->sort( function ( $a, $b ) { $da = $a->get_data(); $db = $b->get_data(); if ( empty( $da ) or ! isset( $da->title ) ) { return -255; } if ( empty( $db ) or ! isset( $db->title ) ) { return 255; } return AimySitemapLanguageHelper::strcasecmp( $da->title, $db->title, self::$locale ); } ); return $hier; } private function _build_priority() { usort( $this->items, array( __CLASS__, 'sort_by_priority' ) ); return $this->items; } static private function sort_by_priority( $a, $b ) { if ( ! is_object( $a ) or ! is_object( $b ) ) { return ( is_object( $a ) ? -255 : 255 ); } $pa = intVal( floatVal( $a->priority ) * 10 ); $pb = intVal( floatVal( $b->priority ) * 10 ); if ( $pa === $pb ) { $cc = AimySitemapLanguageHelper::strcasecmp( $a->title, $b->title, self::$locale ); if ( $cc == 0 ) { return 0; } return ( $cc > 0 ? 1 : -1 ); } return $pb - $pa; } static private function sort_by_title( $a, $b ) { if ( ! is_object( $a ) or ! is_object( $b ) ) { return ( is_object( $a ) ? -255 : 255 ); } return self::sort_by_string_asc( $a->title, $b->title ); } static private function sort_by_string_asc( $a, $b ) { return AimySitemapLanguageHelper::strcasecmp( $a, $b, self::$locale ); } private function get_config( $key, $dflt = null ) { $app = JFactory::getApplication(); if ( version_compare( JVERSION, '3.3.0', '<' ) ) { return $app->getCfg( $key, $dflt ); } else { return $app->get( $key, $dflt ); } } } 