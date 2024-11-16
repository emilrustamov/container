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
 defined( '_JEXEC' ) or die(); require_once( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/LinkCheck.php' ); $lnkchk = new AimySitemapLinkCheck(); if ( ! $this->enabled || ! $this->check_done || ! count( $this->items ) ) { AimySitemapCompatHelper::addInlineJavascript( 'jQuery(document).ready(function(){' . 'jQuery( "#toolbar-download > button" )' . '.attr( "disabled", "disabled" );' . '});' ); } function AimySitemap_render_source_link( $link, $srcs, &$edit_set ) { $use_list = ( count( $srcs ) > 1 ); if ( $use_list ) { echo '<ol>'; } foreach ( $srcs as $i => $srcObj ) { $edit_set[ $link ][] = $srcObj->url; $is_redir = ( isset( $srcObj->is_redirect ) && $srcObj->is_redirect ); if ( $use_list ) { echo '<li>'; } if ( $is_redir ) { echo '<div class="redirect-found-on">'; } echo '<a href="', htmlspecialchars( $srcObj->url ), '" target="_blank">', htmlspecialchars( $srcObj->url ), '</a>'; if ( $is_redir ) { echo ' &rarr; ', JText::sprintf( 'AIMY_SM_LINKCHECK_REDIRECT_X', $srcObj->code ); if ( isset( $srcObj->found_on ) && is_array( $srcObj->found_on ) ) { echo ', ', JText::_( 'AIMY_SM_LINKCHECK_FOUND_ON' ), ':<br/>'; AimySitemap_render_source_link( $srcObj->url, $srcObj->found_on, $edit_set ); } echo '</div>'; } if ( $use_list ) { echo '</li>'; } } if ( $use_list ) { echo '</ol>'; } } ?>
<div id="j-main-container" class="j-main-container aimy-main clearfix">

<div class="row-fluid" id="aimy-linkcheck-container">

<h1><?php echo JText::_( 'AIMY_SM_LINK_LINKCHECK' ); ?></h1>

<?php if ( ! $this->enabled ) : ?>

<div class="alert alert-warning">
<?php echo JText::_( 'AIMY_SM_LINKCHECK_DISABLED_HINT' ); ?>
</div>

<?php elseif ( ! $this->check_done ) : ?>

<div class="alert alert-warning">
<?php echo JText::_( 'AIMY_SM_LINKCHECK_NOT_DONE_HINT' ); ?>
</div>

<?php else : ?>

<?php  if ( count( $this->items ) > 0 ) : ?>

<table class="table table-striped" id="broken_link_list">
<thead>
<tr>
    <th style="width:32px;">#</th>
    <th><?php echo JText::_( 'AIMY_SM_LINKCHECK_BROKEN_LINK' ); ?></th>
    <th><?php echo JText::_( 'AIMY_SM_LINKCHECK_SOURCES' ); ?></th>
    <th><?php echo JText::_( 'AIMY_SM_LINKCHECK_ACTIONS' ); ?></th>
</tr>
</thead>
<tbody>
<?php  foreach ( $this->items as $i => $item ) : ?>
<tr class="row<?php echo $i % 2; ?>">
    <td><?php echo $i + 1; ?></td>
    <td><?php
 echo htmlspecialchars( $item->url ); ?></td>
    <td>
    <?php
 $edit_links_set = array(); AimySitemap_render_source_link( $item->url, $item->srcs, $edit_links_set ); ?>
    </td>
    <td>
    <?php foreach ( $edit_links_set as $link => $srcs ) : ?>
    <?php $link_edit_links = $lnkchk->get_edit_links( $link, $srcs ); ?>
    <?php  foreach ( $link_edit_links as $item ) : ?>
        <a href="<?php
 echo htmlspecialchars( $item->link ); ?>" target="_blank"><?php
 switch( $item->type ) { case 'module': echo JText::_( 'AIMY_SM_EDIT_MODULE' ); break; case 'category': echo JText::_( 'AIMY_SM_EDIT_CATEGORY' ); break; case 'article': default: echo JText::_( 'AIMY_SM_EDIT_ARTICLE' ); } echo ' "' . htmlspecialchars( $item->name ) . '"'; ?></a>
        <br/>
    <?php  endforeach; ?>
    <?php endforeach; ?>
    </td>
</tr>
<?php  endforeach; ?>
</tbody>
</table>

<?php  else : ?>

<p>
    <b><?php
 echo JText::_( 'AIMY_SM_LINKCHECK_NO_BROKEN_LINKS' ); ?></b>
</p>

<?php  endif; ?>
<?php endif; ?>



<form action="<?php
 echo JRoute::_( 'index.php?option=com_aimysitemap&view=linkcheck' ); ?>" method="post" name="adminForm" id="adminForm">
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_( 'form.token' ); ?>
</form>

</div><!-- /.row-fluid -->
</div>

<?php
 include( JPATH_ADMINISTRATOR . '/components/com_aimysitemap/helpers/footer.php' ); 
