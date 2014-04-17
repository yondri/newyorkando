<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php
	return;
}


function light_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>

<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
<div id="div-comment-<?php comment_ID() ?>">
      <div class="commentname comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <span class="fn"><?php comment_author_link()?></span>
        on
        <span class="comment-meta commentmetadata">
        <?php comment_date() ?>
        <?php edit_comment_link(__("Edit This"), ''); ?>
        </span>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.'); ?></em>
      <?php endif; ?>
      <div class='commenttext'>
        <div class="commentp">
          <?php comment_text();?>
        </div>
      </div>
      <div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
</div>
<?php
}

?>
<div id="commentblock">
  <!--comments area-->
  <?php if ( have_comments() || comments_open() ) { ?>
  <h2 id="comments">
    <?php comments_number(__('No comments yet'), __('1 comment so far'), __('% comments so far')); ?>
  </h2>
  <?php } ?>

  <?php if ( have_comments() ) : ?>
	  <ol class="commentlist" id='commentlist'>
	  <?php wp_list_comments(array('callback'=>'light_comment', 'avatar_size'=>16)); ?>
	  </ol>
	  <div class="commentnav">
	    	<div class="alignleft"><?php previous_comments_link() ?></div>
    		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>
  	<br />
	<?php if ( !comments_open() ) { ?>
		<p><?php _e('Comments are closed.'); ?></p>
	<?php } ?>
  <?php endif; ?>

  <div id="loading" style="display: none;"><?php _e('Posting your comment.'); ?></div>
  <div id="errors"></div>
  <?php if (comments_open()) : ?>

	<?php comment_form(); ?>

  <?php endif; // if you delete this the sky will fall on your head ?>
</div>
