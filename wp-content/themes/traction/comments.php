<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'traction' ); ?></p>
<?php
	return;
}
?>

<div id="comments">
<?php if ( have_comments() ) : ?>
	<div class="comment-number clear">
		<span><?php comments_number( __( 'Leave a Comment', 'traction' ), __( '1 Comment', 'traction' ), __( '% Comments', 'traction' ) ); ?></span>
		<?php if ( 'open' == $post->comment_status) : ?>
			<a id="leavecomment" href="#respond" title="<?php _e( 'Post a comment', 'traction' ); ?>"> <?php _e( 'Post a comment', 'traction' ); ?></a>
		<?php endif; ?>
	</div><!--end comment-number-->
	<ol class="commentlist">
		<?php wp_list_comments( 'type=comment&callback=custom_comment' ); ?>
	</ol>
	<div class="navigation comments">
		<div class="alignleft"><?php previous_comments_link( __( '&laquo; Older Comments', 'traction' ) ); ?></div>
		<div class="alignright"><?php next_comments_link( __( 'Newer Comments &raquo;', 'traction' ) ); ?></div>
	</div>
	<?php if ( ! empty($comments_by_type['pings'] ) ) : ?>
		<h3 class="pinghead"><?php _e( 'Trackbacks &amp; Pingbacks', 'traction' ); ?></h3>
		<ol class="pinglist">
			<?php wp_list_comments( 'type=pings&callback=list_pings' ); ?>
		</ol>
	<?php endif; ?>
	<?php if ( 'closed' == $post->comment_status ) : ?>
		<p class="note"><?php _e( 'Comments are closed.', 'traction' ); ?></p>
	<?php endif; ?>
	<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( 'closed' == $post->comment_status) : ?>
		<?php if ( !is_page() ) : ?>
			<p class="note"><?php _e( 'Comments are closed.', 'traction' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
</div><!--end comments-->

<?php if ( 'open' == $post->comment_status) : ?>
	<?php comment_form(); ?>
<?php endif; // if you delete this the sky will fall on your head ?>