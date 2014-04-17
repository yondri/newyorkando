<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','andreas09'); ?><p>
<?php
	return;
}


function andreas09_callback($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
	<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<h3 class="commenttitle"><cite class="fn"><?php comment_author_link(); ?></cite> <span class="says"><?php _e('said','almost-spring'); ?></span></h3>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.','andreas09'); ?></em>
	<br />
<?php endif; ?>
	
	<small class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
	<?php comment_date() ?> <?php _e('at','andreas09'); ?> <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>
	
	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
<?php 
}


if ( have_comments() ) : ?>
<h3 id="comments"><?php comments_number(__('No Responses Yet','andreas09'), __('One Response','andreas09'), __('% Responses','andreas09') );?> <?php _e('to','andreas09'); ?> &#8220;<?php the_title(); ?>&#8221;</h3> 
 
<ol class="commentlist">
<?php wp_list_comments(array('callback'=>'andreas09_callback')); ?>
</ol>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if (comments_open()) :
		// If comments are open, but there are no comments.
	else : // comments are closed
	endif;
endif;
?>

<?php if ( comments_open() ) : ?>
	<?php comment_form( array( 'title_reply' => __( 'Leave a Comment', 'andreas09' ) ) ); ?>
<?php else: ?>
	<?php if ( ! is_page() ) : ?>
	<p><?php _e( 'Sorry, the comment form is closed at this time.', 'andreas09' ); ?></p>
	<?php endif; ?>
<?php endif; ?>