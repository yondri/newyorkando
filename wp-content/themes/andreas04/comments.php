<?php 
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p><?php _e('Enter your password to view comments.','andreas04'); ?></p>
<?php
	return;
}

function andreas04_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<?php comment_text() ?>
	<p class="vcard"><cite>
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php comment_type(__('Comment','andreas04'), __('Trackback','andreas04'), __('Pingback','andreas04')); ?> 
	<?php _e('by','andreas04'); ?> 
	<span class="fn"><?php comment_author_link() ?></span> | 
	<?php comment_date() ?> <!-- @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> --> 
	<?php edit_comment_link(__('Edit','andreas04'), ' | '); ?>
	<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'before'=>' | ', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
	</cite></p>
	</div>
<?php
}

if ( have_comments() ) : ?>
<h2 id="comments"><?php comments_number(__('Leave a Comment','andreas04'), __('1 Comment','andreas04'), __('% Comments','andreas04')); ?> 
<?php if ( comments_open() ) : ?>
	<a href="#postcomment" title="<?php _e('Leave a comment','andreas04'); ?>">&raquo;</a>
<?php endif; ?>
</h2>

<ol id="commentlist">
<?php wp_list_comments(array('callback'=>'andreas04_comment', 'avatar_size'=>16)); ?>
</ol>

<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
</div>
<br />

<?php else: ?>

<?php if ( comments_open() ) : // If there are no comments yet ?>
	<p><?php _e( 'No comments yet.', 'andreas04' ); ?></p>
<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<?php comment_form( array( 'title_reply' => __( 'Leave a Comment', 'andreas04' ) ) ); ?>
<?php else: ?>
	<?php if ( ! is_page() ) : ?>
	<p><?php _e( 'Sorry, the comment form is closed at this time.', 'andreas04' ); ?></p>
	<?php endif; ?>
<?php endif; ?>
