<?php 
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php
	return;
}

function neo_sapien_05_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard comment-meta commentmetadata">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<cite><?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?> <span class="fn"><?php comment_author_link() ?></span> on <?php comment_date() ?> <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite>
	</div>
	<?php comment_text() ?>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}

?>

<?php if ( have_comments() || comments_open() ) : ?>
<p>
<strong>
<?php comments_number(__('Leave a Comment'), __('1 Comment(s)'), __('% Comments')); ?>
</strong>
</p>
<?php endif; ?>

<?php if ( have_comments() ) : ?>

<div class="commentlist">
<ol>
<?php wp_list_comments(array('callback'=>'neo_sapien_05_comment', 'avatar_size'=>48)); ?>
</ol>
	<div class="comment-navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
</div>
<br />
	<?php if ( !comments_open() ) { ?>
		<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
	<?php } ?>
<?php elseif ( comments_open() ) : ?>
<p><?php _e('No comments yet.'); ?></p>
<?php endif; ?>

<p>
<?php if ( have_comments() || comments_open() ) :
	post_comments_feed_link( __( 'Comments RSS' ) );
endif;
if ( pings_open() ) : ?>

<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack Identifier URI'); ?></a>

<?php endif; ?>
</p>

<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; ?>