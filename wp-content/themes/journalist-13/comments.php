<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (post_password_required()) {
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'journalist-13'); ?><p>
				
				<?php
				return;
        }

function journalist13_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class(tj_comment_class()); ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment_author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf(__('<strong class="fn">%s</strong> said, on %s at <a href="%s">%s</a>','journalist-13'),get_comment_author_link(),get_comment_date(get_option('date_format')),get_comment_link(),get_comment_time(get_option('time_format')));?> <?php edit_comment_link(__('(Edit)', 'journalist-13'), ' ', ''); ?></strong>
	</div>
	<?php if ($comment->comment_approved == '0') : ?>
	<p class="commetn_mod"><em><?php _e('Your comment is awaiting moderation.', 'journalist-13'); ?></em></p>
	<?php endif; ?>

	<?php comment_text() ?>
			
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}

?>

<a name="comments" id="comments"></a>

<?php if (have_comments()): ?>
	<h3 class="reply"><?php comments_number(__('No Responses Yet', 'journalist-13'), __('One Response', 'journalist-13'), __('% Responses', 'journalist-13') );?></h3> 
<p class="comment_meta"><?php printf( __('Subscribe to comments with <a href="%s">RSS</a>.', 'journalist'), get_post_comments_feed_link() ); ?></p>
	<ol class="commentlist">
	<?php wp_list_comments(array('callback'=>'journalist13_comment')); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />
	
	<?php if (!comments_open()) : ?> 
		<p class="nocomments"><?php _e('Comments are closed.','journalist-13'); ?></p>
	<?php endif; ?>
<?php endif; ?>


<?php if (comments_open()) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>