<?php if ('open' == $post->comment_status || $comments) : ?>

<div class="narrowcolumnwrapper"><div class="narrowcolumn">
	<div class="content">
	<div <?php post_class('post'); ?>>

<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'digg3'); ?></p></div></div></div></div>
<?php
	return;
}


function digg3_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>

<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-meta commentmetadata">
		<?php if ($args['avatar_size'] != 0) { ?><div class="avatar"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div><?php } ?>
		<?php
		printf( __('%1$s, on %2$s at %3$s said:', 'digg3'),
		'<span class="comment-author vcard"><strong class="fn">' . get_comment_author_link() . '</strong>',
		'<a href="#comment-' . get_comment_ID() . '" title="">'. get_comment_date(),
		get_comment_time() . '</a>' ); ?>
		<?php edit_comment_link( __('Edit Comment', 'digg3'), ' ' ); ?></span>
		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.', 'digg3'); ?></em>
		<?php endif; ?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
</div>
<?php
}

if (have_comments()) :
?>
	<h3 id="comments"><?php comments_number(__('No Responses Yet', 'digg3'), __('One Response', 'digg3'), __('% Responses', 'digg3') );?></h3>

	<ol class="commentlist">
	<?php wp_list_comments(array('callback'=>'digg3_comment')); ?>
	</ol>

	<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<?php if (!comments_open()) : ?>
	<p class="nocomments"><?php _e('Comments are closed.', 'digg3'); ?></p>
	<?php endif; ?>

<?php endif; ?>


<?php if (comments_open()) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>
	</div>
	</div>
</div></div>

<?php endif;