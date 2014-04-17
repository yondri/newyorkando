<?php // Do not delete these lines


if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php
	return;
}

function quentin_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<cite class="comment-meta commentmetadata">
			<?php
				printf( __( 'On %1$s at %2$s %3$s said: ' ),
				get_comment_date(),
				get_comment_time(),
				'<span class="fn">' . get_comment_author_link() . '</span>'
				);
			?>
			<?php edit_comment_link(__("Edit This"), ' |'); ?>
		 </cite>
	 </div>
	 <?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	<?php endif; ?>

	<?php comment_text(); ?>
	
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}

?>
<?php if ( pings_open() || have_comments() || comments_open() ) { ?>
<div id="trackback">
<?php if (pings_open()) { ?>
<p><?php _e("The <acronym title=\"Uniform Resource Identifier\">URI</acronym> to TrackBack this entry is:"); ?> <em><?php trackback_url() ?></em></p>
<?php } ?>
<?php if ( have_comments() || comments_open() ) { ?>
<p><?php post_comments_feed_link( __( "<abbr title=\"Really Simple Syndication\">RSS</abbr> feed for comments on this post." ) ); ?></p>
<?php } ?>
</div>
<?php } ?>


<?php if (have_comments()) : ?>
	<h2 id="comments"><?php comments_number(__("Comments"), __("One Comment"), __("% Comments")); ?> 
<?php if (comments_open()) { ?>
<a href="#postcomment" title="<?php _e("Leave a comment"); ?>"><span><?php _e("Leave a comment"); ?></span></a>
<?php } ?></h2> 


	<ol id="commentlist">
	<?php wp_list_comments(array('callback'=>'quentin_comment')); ?>
	</ol>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />

  <?php if (!comments_open()) : ?> 
	<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
  <?php endif; ?>
<?php endif; ?>


<?php comment_form(); ?>
