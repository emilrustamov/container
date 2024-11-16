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
 defined( '_JEXEC' ) or die(); try { JHtml::_( version_compare( JVERSION, '3.3.0', 'lt' ) ? 'behavior.framework' : 'behavior.core' ); } catch ( Exception $e ) { } $script_path = JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_aimysitemap' . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'crawl-website.php'; $rep = & $this->report; if ( empty( $rep ) or ! is_array( $rep ) ) { AimySitemapCompatHelper::addInlineJavascript( 'jQuery(document).ready(function()' . '{' . 'jQuery( "#toolbar-file,#toolbar-archive" )' . '.find( "button" )' . '.prop( "disabled", true );' . '});' ); } else { if ( ! isset( $rep[ 'time_end' ] ) ) { AimySitemapCompatHelper::addInlineJavascript( 'jQuery(document).ready(function()' . '{' . 'jQuery( "#toolbar-archive" )' . '.find( "button" )' . '.prop( "disabled", true );' . '});' ); } } AimySitemapCompatHelper::addInlineJavascript( 'jQuery(document).ready(function()' . '{' . 'var show_id = function( cnt, btn )' . '{' . 'jQuery( "#last,#errors,#output,#report,#shorthelp" )' . '.not( cnt )' . '.slideUp(' . '"fast",' . 'function(){ jQuery( cnt ).slideDown( "slow" ); }' . ');' . 'jQuery( "#toolbar-file,#toolbar-archive" )' . '.find( "button" )' . '.prop( "disabled", false );' . 'jQuery( btn )' . '.find( "button" )' . '.prop( "disabled", true );' . 'return false;' . '};' . 'Joomla.submitbutton = function( task )' . '{' . 'if ( task == "show_report" )' . '{' . 'return show_id( "#report", "#toolbar-archive" );' . '}' . 'else if ( task == "show_output" )' . '{' . 'return show_id( "#output", "#toolbar-file" );' . '}' . 'return false;' . '};' . '});' ); ?>

<div id="j-main-container" class="j-main-container aimy-main clearfix">

<div id="last">

<h1><?php echo JText::_( 'AIMY_SM_PERIODIC_LAST_RUN' ); ?></h1>

<?php if ( empty( $rep ) or ! is_array( $rep ) ) : ?>

<p>
    <?php echo JText::_( 'AIMY_SM_PERIODIC_NOT_RUN' ); ?>
</p>

<?php endif; ?>

<p>
    <?php
 if ( isset( $rep[ 'time_start' ] ) ) { $h = $m = $s = $tdiff = 0; if ( isset( $rep[ 'time_end' ] ) ) { $tdiff = intval( $rep[ 'time_end' ] ) - intval( $rep[ 'time_start' ] ); $h = intval( $tdiff / ( 60 * 60 ) ); $m = intval( ( $tdiff - $h * 60 * 60 ) / 60 ); $s = intval( $tdiff % 60 ); echo JText::sprintf( 'AIMY_SM_PERIODIC_TIME_RUN', date( JText::_( 'AIMY_SM_DATE_FMT' ), $rep[ 'time_start' ] ), $h, $m, $s ); } else if ( isset( $rep[ 'time_last_save' ] ) ) { echo JText::sprintf( 'AIMY_SM_PERIODIC_RUNNING', date( JText::_( 'AIMY_SM_DATE_FMT' ), $rep[ 'time_start' ] ), date( JText::_( 'AIMY_SM_DATE_FMT' ), $rep[ 'time_last_save' ] ) ); $diff = ( $rep[ 'time_last_save' ] - $rep[ 'time_start' ] ); if ( $diff > 30 * 60 ) { echo '<div class="alert alert-danger">', JText::_( 'AIMY_SM_PERIODIC_RUNNING_TIMEOUT' ), '</div>'; } } } ?>
</p>

<?php if ( isset( $rep[ 'change_count' ] ) && $rep[ 'change_count' ] ) : ?>
<p>
    <?php
 echo JText::sprintf( 'AIMY_SM_PERIODIC_SHORTSTAT', $rep[ 'url_count' ], $rep[ 'change_count' ], count( $rep[ 'stats' ][ 'added' ] ), count( $rep[ 'stats' ][ 'deleted' ] ), count( $rep[ 'stats' ][ 'updated' ] ) ); ?>
</p>
<?php endif; ?>

</div><!-- /#last -->


<?php if ( isset( $rep[ 'errors' ] ) and is_array( $rep[ 'errors' ] ) and count( $rep[ 'errors' ] ) ) : ?>

<div id="errors">
    <h2>
        <?php echo JText::_( 'AIMY_SM_MSG_ERRORS' ); ?>
    </h2>

    <div class="alert alert-danger">
    <ul>
    <?php foreach ( $rep[ 'errors' ] as $e ) : ?>
        <li><?php echo $e; ?></li>
    <?php endforeach; ?>
    </ul>
    </div>
</div>

<?php endif; ?>


<div id="report" style="display:none;">
<div class="row-fluid">

    <?php if ( ! isset( $rep[ 'change_count' ] ) or ! $rep[ 'change_count' ] ) : ?>
    <div class="span12">
    <p>
        <?php echo JText::_( 'AIMY_SM_MSG_NO_UPDATES' ); ?>
    </p>
    </div>

    <?php else: ?>

    <?php if ( count( $rep[ 'stats' ][ 'added' ] ) ) : ?>
    <div class="span6">
    <div class="alert alert-success">
    <h2>
        <i class="aimy-icon-plus" style="padding-right: 12px;"></i>
        <?php echo JText::_( 'AIMY_SM_MSG_CRAWL_ADDED' ); ?>
    </h2>

    <ol>
    <?php foreach ( $rep[ 'stats' ][ 'added' ] as $u ) : ?>
        <li><code><?php echo htmlspecialchars( $u ); ?></code></li>
    <?php endforeach; ?>
    </ol>
    </div>
    </div>
    <?php endif; ?>


    <?php if ( count( $rep[ 'stats' ][ 'deleted' ] ) ) : ?>
    <div class="span6">
    <div class="alert alert-warning">
    <h2>
        <i class="aimy-icon-minus" style="padding-right: 12px;"></i>
        <?php echo JText::_( 'AIMY_SM_MSG_CRAWL_DELETED' ); ?>
    </h2>

    <ol>
    <?php foreach ( $rep[ 'stats' ][ 'deleted' ] as $u ) : ?>
        <li><code><?php echo htmlspecialchars( $u ); ?></code></li>
    <?php endforeach; ?>
    </ol>
    </div>
    </div>
    <?php endif; ?>


    <?php if ( count( $rep[ 'stats' ][ 'updated' ] ) ) : ?>
    <div class="span6">
    <div class="alert alert-info">
    <h2>
        <i class="aimy-icon-loop" style="padding-right: 12px;"></i>
        <?php echo JText::_( 'AIMY_SM_MSG_CRAWL_UPDATED' ); ?>
    </h2>

    <ol>
    <?php foreach ( $rep[ 'stats' ][ 'updated' ] as $u ) : ?>
        <li><code><?php echo htmlspecialchars( $u ); ?></code></li>
    <?php endforeach; ?>
    </ol>
    </div>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</div>
</div>

<div id="output" style="display:none;">
<?php if ( ! empty( $rep ) && is_array( $rep[ 'out' ] ) ) : ?>
<pre><?php echo implode("\n", $rep[ 'out' ]); ?></pre>
<?php endif; ?>
</div>

<div id="shorthelp">
    <h2>
        <?php echo JText::_( 'JHELP' ); ?>
    </h2>

    <p>
        <?php echo JText::_( 'AIMY_SM_PERIODIC_SCRIPT_PATH' ); ?>:
        <code><?php echo $script_path; ?></code>
    </p>
    <p>
        <?php
 echo JText::sprintf( 'AIMY_SM_PERIODIC_HELP_MSG', 'https://www.aimy-extensions.com/joomla/sitemap.html#user-manual', 'https://www.aimy-extensions.com/news/11-aimy-sitemap/' . '49-periodic-crawls-using-microsofts-task-scheduler.html' ); ?>
    </p>
</div>

</div>
</div>

<?php
 include( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/footer.php' ); 
