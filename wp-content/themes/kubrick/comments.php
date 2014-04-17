<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
	<?php
		return;
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<?php
function kubrick_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
			<li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
			<?php echo avatar_by_id( $comment->user_id, 32 ); ?>
			<?php printf(__('<cite>%s</cite> Says:', 'kubrick'), get_comment_author_link()); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'kubrick'); ?></em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php printf(__('%1$s at %2$s', 'kubrick'), get_comment_date(), get_comment_time()); ?></a><?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' | ')) ?> <?php edit_comment_link(__('edit', 'kubrick'),'&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>
<?php } ?>
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses', 'kubrick'), __('One Response', 'kubrick'), __('% Responses', 'kubrick'));?> <?php printf(__('to &#8220;%s&#8221;', 'kubrick'), the_title('', '', false)); ?></h3>

	<ol class="commentlist">
		<?php wp_list_comments(array('callback' => 'kubrick_comment')); ?>	
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php endif; ?>

<?php if ( have_comments() && !comments_open() ) { ?>
<p class="nocomments"><?php _e('Comments are closed.', 'kubrick'); ?></p>
<?php } ?> 

<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>