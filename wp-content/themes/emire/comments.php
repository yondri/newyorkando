<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'emire'); ?></p>
<?php
	return;
}

function emire_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<cite class="fn"><?php comment_author_link() ?></cite> <?php _e('Says:','emire'); ?>
	</div>
	<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.','emire'); ?></em>
	<?php endif; ?>
	<br />

	<small class="comment-meta commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php printf(__('%1$s at %2$s','emire'), get_comment_date(), get_comment_time()) ?></a> <?php edit_comment_link(__('e','emire'),'',''); ?></small>

	<?php comment_text() ?>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}

if (have_comments()) : ?>
	<h3 id="comments"><?php printf(__('%1$s to &#8220;%2$s&#8221;','emire'), comments_number(__('No Responses Yet','emire'), __('One Response','emire'), __('% Responses','emire')), get_the_title()) ?></h3>

	<ol class="commentlist">
	<?php wp_list_comments(array(
		'callback'=>'emire_comment',
	)); ?>
	</ol>
	
	<div class="comments-navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
		<div class="alignright"><?php next_comments_link(); ?></div>
	</div>
	<br />

	<?php if (!comments_open()) : ?> 
		<p class="nocomments"><?php _e('Comments are closed.','emire'); ?></p>
	<?php endif; ?>
<?php endif; ?>


<?php if (comments_open()) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>