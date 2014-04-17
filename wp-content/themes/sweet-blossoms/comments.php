<?php // Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php
	return;
}

global $commentcount;
$commentcount = 1;

function sweet_blossoms_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount, $comment_alt;
	extract($args, EXTR_SKIP);
?>

	<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<p class="header<?php if ($comment_alt % 2 ) echo 'alt'; ?>"><strong><?php echo $commentcount ?>.</strong>
	<span class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<span class="fn"><?php if (get_comment_type() == "comment") comment_author_link();
		  else {
		  		strlen($comment->comment_author)?$author=substr($comment->comment_author,0,25)."&hellip":$author=substr($comment->comment_author,0,25);
		  		echo '<a href="'.$comment->comment_author_url.'">'.$author.'</a>';

		  }
	?></span></span> &nbsp;|&nbsp; <?php comment_date() ?> at <?php comment_time() ?></p>
	<?php if ($comment->comment_approved == '0') : ?><p><em>Your comment is awaiting moderation.</em></p><?php endif; ?>
	<?php comment_text() ?>
	<?php edit_comment_link('Edit Comment','<span class="editlink">','</span>'); ?>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
	$commentcount++;
}

?>

<?php if (have_comments()) : ?>

		<div style="padding:20px 0px 0px 0px;"></div>
		
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/divider.gif" alt="" />
		
		<div style="padding:20px 0px 0px 0px;"></div>


	<h2><?php comments_number('Leave a Comment', '1 Comment', '% Comments' ); if($post->comment_status == "open") { ?> <a href="#commentform" class="more">Add your own</a><?php } ?></h2>

	<ul class="commentlist">
	<?php wp_list_comments(array('callback'=>'sweet_blossoms_comment', 'avatar_size'=>16)); ?>
	</ul>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />

<?php endif; ?>

<?php comment_form(); ?>

<?php if (comments_open() && pings_open()) { ?>
	<p><a href="<?php trackback_url(display); ?>">Trackback this post</a> &nbsp;|&nbsp; <?php post_comments_feed_link( 'Subscribe to comments via RSS Feed' ); ?></p>
<?php } elseif (comments_open()) {?>
	<p><?php post_comments_feed_link( 'Subscribe to comments via RSS Feed' ); ?></p>
<?php } elseif (pings_open()) {?>
	<p><a href="<?php trackback_url(display); ?>">Trackback</a></p>
<?php } ?>

		<div style="padding:20px 0px 0px 0px;"></div>
		
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/divider.gif" alt="" />
