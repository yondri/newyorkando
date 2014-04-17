<?php // Do not delete these lines - borrowed directly from Kubrick
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	?>
	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'black-letterhead'); ?><p>
	<?php
	return;
}


function black_letterhead_callback($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
	<div class="comment-avatar"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
	<cite class="fn"><?php comment_author_link() ?></cite> <span class="says"><?php _e('Says:', 'black-letterhead'); ?></span>
	
	<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.', 'black-letterhead'); ?></em>
	<?php endif; ?>
	<br />

	<small class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" title=""><?php comment_date(); ?> <?php _e('at', 'black-letterhead'); ?> <?php comment_time(); ?></a> <?php edit_comment_link('e','',''); ?></small>
	</div>
	<?php comment_text(); ?>
	
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php 
}

if (have_comments()) :
?>
	<h3 id="comments"><?php comments_number(__('No Responses Yet'), __('One Response'), __('% Responses') );?> <?php _e('to'); ?> &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">
	<?php wp_list_comments(array('callback'=>'black_letterhead_callback')); ?>
	</ol>

	<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<?php comment_form(); ?>

<?php else: ?>

	<?php if ( ! is_page() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'black-letterhead' ); ?></p>
	<?php endif; ?>

<?php endif; ?>