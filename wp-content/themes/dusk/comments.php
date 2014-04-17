<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php
	return;
}

function dusk_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<?php if ($args['avatar_size'] != 0) { ?><div class="avatar"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div><?php } ?>
		<h4 class="commentauthor vcard"><span class="fn"><?php comment_author_link() ?></span> <span class="says"><?php _e('said,'); ?></span></h4>
		<p class="comment-meta commentmetadata commentmeta"><?php comment_date() ?> <?php _e('at'); ?> <a href="#comment-<?php comment_ID() ?>" title="<?php _e('Permanent link to this comment'); ?>"><?php comment_time() ?></a> <?php edit_comment_link(__('Edit'),' &#183; ',''); ?></p>
		<div id="div-comment-<?php comment_ID() ?>">
			<?php comment_text() ?>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		</div>
<?php 
}

if (have_comments()) : ?>
	<h3 id="comments"><?php comments_number(__('Comments'), __('1 Comment'), __('% Comments'));?></h3>

	<ol id="commentlist">
	<?php wp_list_comments(array('callback'=>'dusk_comment')); ?>
	</ol>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<?php if (!comments_open()) : ?> 
		<p>Comments are closed.</p>		
	<?php endif; ?>
<?php endif; ?>


<?php if (comments_open()) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>
