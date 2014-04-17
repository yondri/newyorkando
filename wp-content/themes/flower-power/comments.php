<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (__('Please do not load this page directly. Thanks!', 'flower-power'));
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'flower-power'); ?></p>
</div> <!-- /comments -->
<?php
	return;
}

global $commentcount;
$commentcount = 1;

function flower_power_comment($comment, $args, $depth) {
	global $comment_alt, $commentcount;
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php echo $commentcount ?>">
<div id="div-comment-<?php comment_ID() ?>">
<div class="comment-author vcard">
	<div class="avatar"><?php echo get_avatar($comment, 32); ?></div>
	<p class="header<?php if ( $comment_alt % 2 ) { echo 'alt'; } ?>"><strong><?php echo $commentcount ?>.</strong>

	<?php if ($comment->comment_type == "comment") comment_author_link();
		  else {
		  		strlen($comment->comment_author)?$author=substr($comment->comment_author,0,25)."&hellip":$author=substr($comment->comment_author,0,25);
		  		echo '<a href="'.$comment->comment_author_url.'">'.$author.'</a>';

		  }
	?> &nbsp;|&nbsp; <span class="comment-meta commentmetadata"><?php printf(__('%s at %s', 'flower-power'), get_comment_date(), get_comment_time()); ?></span></p>
</div>
	<?php if ($comment->comment_approved == '0') : ?><p><em><?php _e('Your comment is awaiting moderation.', 'flower-power'); ?></em></p><?php endif; ?>
	<?php comment_text(); ?>
	<?php edit_comment_link(__('Edit Comment', 'flower-power'),'<span class="editlink">','</span>'); ?>
	
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
$commentcount++;
}

if (have_comments()) : ?>

	<div class="divider"></div>

	<h2><?php comments_number(__('Leave a Comment'), __('1 Comment'), __('% Comments') ); if($post->comment_status == "open") { ?> <a href="#commentform" class="more">Add your own</a><?php } ?></h2>

	<ul class="commentlist">
	<?php wp_list_comments(array('callback'=>'flower_power_comment')); ?>
	</ul>

	<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
<?php endif; ?>

<?php if (comments_open()) : ?>

	<div class="divider"></div>

	<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>

<?php if (comments_open() && pings_open()) { ?>
	<p><a href="<?php trackback_url('display'); ?>"><?php _e('Trackback this post', 'flower-power'); ?></a> &nbsp;|&nbsp; <?php post_comments_feed_link(__('Subscribe to comments via RSS Feed', 'flower-power')); ?></p>
<?php } elseif (comments_open()) {?>
	<p><?php post_comments_feed_link(__('Subscribe to comments via RSS Feed', 'flower-power')); ?></p>
<?php } elseif (pings_open()) {?>
	<p><a href="<?php trackback_url('display'); ?>"><?php _e('Trackback', 'flower-power'); ?></a></p>
<?php } ?>

<div class="divider"></div>
		
</div> <!-- /comments -->
