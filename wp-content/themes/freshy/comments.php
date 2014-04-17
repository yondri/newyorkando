<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments',TEMPLATE_DOMAIN); ?><p>
<?php
	return;
}


function freshy_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>

<?php
	$author_comment_class=' none';
	if($comment->comment_author_email == get_the_author_email()) $author_comment_class=' author_comment';
	?>
	<dt class="<?php echo $author_comment_class; ?>">
		<small class="date">
			<span class="date_day"><?php comment_time('j') ?></span>
			<span class="date_month"><?php comment_time('m') ?></span>
			<span class="date_year"><?php comment_time('Y') ?></span>
		</small>
	</dt>

	<dd <?php comment_class(empty( $args['has_children'] ) ? 'commentlist_item' : 'commentlist_item parent') ?> id="comment-<?php comment_ID() ?>">			

		<div class="comment" id="div-comment-<?php comment_ID() ?>">
			<strong class="comment-author vcard author" style="height:32px;line-height:32px;">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			
			<span class="fn"><?php comment_author_link() ?></span></strong> <span class="comment-meta commentmetadata"><small>(<?php comment_time('H:i:s'); ?>)</small> : <?php edit_comment_link(__('edit',TEMPLATE_DOMAIN),'',''); ?></span>
			<?php if ($comment->comment_approved == '0') : ?>
			<small><?php _e('Your comment is awaiting moderation',TEMPLATE_DOMAIN); ?></small>
			<?php endif; ?>
			
			<br style="display:none;"/>
		
			<div class="comment_text">				
			<?php comment_text(); ?>
			</div>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
	</dd>
<?php
}

function freshy_end_comment($comment, $args, $depth) {
// null function here, to prevent extra div stuff at end of comment
}


if (have_comments()) : ?>
	<h3 id="comments"><?php comments_number(__('No responses yet',TEMPLATE_DOMAIN), __('One response',TEMPLATE_DOMAIN), __('% responses',TEMPLATE_DOMAIN));?></h3>

	<dl class="commentlist">
	<?php wp_list_comments(array('callback'=>'freshy_comment', 'end-callback'=>'freshy_end_comment', 'style'=>'div')); ?>
	</dl>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php endif; ?>

<?php comment_form(); ?>