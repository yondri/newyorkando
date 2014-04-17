<?php // Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php
	return;
}

function rounded_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>

<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<cite class="fn"><?php comment_author_link() ?></cite> <?php _e( 'Says:' ); ?>
	</div>
	<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	<?php endif; ?>

	<span class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" title=""><?php comment_date() ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></span>

	<?php comment_text() ?>

	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}


?>
<div id="comments-post">
<?php if (have_comments()) : ?>
	<h3 id="comments">
		<?php printf( _n( 'One Response to  &#8220;%2$s&#8221;', '%1$s Responses to  &#8220;%2$s&#8221;', get_comments_number() ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
	</h3> 

	<ol class="commentlist">
	<?php wp_list_comments(array('callback'=>'rounded_comment', 'avatar_size'=>48)); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />

  <?php if ( !comments_open() ) : ?> 
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
  <?php endif; ?>
<?php endif; ?>


<?php comment_form(); ?>
