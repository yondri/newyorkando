<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','greenmarinee'); ?></p>
<?php
	return;
}


function green_marinee_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment_author">
			<span class="fn"><?php comment_author_link() ?></span> <?php _e('said','greenmarinee'); ?>,
		</div>
	</div>
	
	<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.','greenmarinee'); ?></em>
	<?php endif; ?>
	<br />

	<p class="metadate comment-meta commentmetadata"><?php _e('on','greenmarinee'); ?> <?php comment_date() ?> <?php _e('on','greenmarinee'); ?> <?php comment_time() ?></p>

	<?php comment_text() ?>

	<p class="replylink">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</p>
	</div>
<?php
}

if (have_comments()) : ?>
	<h3 class="reply"><?php comments_number(__('No Responses Yet','greenmarinee'),__('One Response','greenmarinee'),__('% Responses','greenmarinee'));?> <?php _e('to','greenmarinee'); ?> '<?php the_title(); ?>'</h3> 
<p class="comment_meta"><?php _e('Subscribe to comments with','greenmarinee'); ?> <?php post_comments_feed_link( __( '<abbr title="Really Simple Syndication">RSS</abbr>' ) ); ?>
<?php if ( pings_open() ) : ?>
	<?php _e('or','greenmarinee'); ?> <a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack','greenmarinee');?></a> <?php _e('to','greenmarinee'); ?> '<?php the_title(); ?>'.
<?php endif; ?>
</p>
	<ol class="commentlist">

	<?php wp_list_comments(array('callback'=>'green_marinee_comment', 'avatar_size'=>48)); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />
<?php endif; ?>


<?php if (comments_open()) : ?>

<?php comment_form(); ?>

<?php elseif ( have_comments() ) : ?>
	<p class="nocomments"><?php _e('Comments are closed.','greenmarinee'); ?></p>
<?php endif; // if you delete this the sky will fall on your head ?>
