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
 defined( '_JEXEC' ) or die(); if ( ! JFactory::getUser()->authorise( 'core.manage', 'com_aimysitemap' ) ) { return JFactory::getApplication()->enqueueMessage( JText::_('JERROR_ALERTNOAUTHOR' ), 'warning' ); } require_once( JPATH_COMPONENT . '/helpers/logger.php' ); $ctrl = JControllerLegacy::getInstance( 'aimysitemap' ); $ctrl->execute( JFactory::getApplication()->input->get( 'task' ) ); $ctrl->redirect(); 
