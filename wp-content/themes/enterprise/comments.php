<?php
/**
 * @package WordPress
 * @subpackage Enterprise
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<div class="nopassword">
		<?php _e( 'This post is password protected. Enter the password to view any comments.', 'enterprise' ); ?>
	</div>
</div><!-- .comments -->
<?php
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments-title"><?php comments_number(
		sprintf( __( 'No Responses to %s', 'enterprise' ), '<em>' . get_the_title() . '</em>' ),
		sprintf( __( 'One Response to %s', 'enterprise' ), '<em>' . get_the_title() . '</em>' ),
		sprintf( __( '%% Responses to %s', 'enterprise' ), '<em>' . get_the_title() . '</em>' )
		); ?> 
	</h3>

<?php if ( get_comment_pages_count() > 1 ) : // are there comments to navigate through ?>
	<div class="navigation">
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'enterprise' ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'enterprise' ) ); ?>
		</div>
	</div>
<?php endif; // check for comment navigation ?>
	<ol class="commentlist snap_preview">
		<?php wp_list_comments( array( 'callback' => 'studiopress_comment' ) ); ?>
	</ol>
<?php if ( get_comment_pages_count() > 1 ) : // are there comments to navigate through ?>
	<div class="navigation">
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'enterprise' ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'enterprise' ) ); ?>
		</div>
	</div>
<?php endif; // check for comment navigation ?>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>

<?php else : // if comments are closed ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'enterprise' ); ?></p>
<?php endif; ?>
<?php endif; ?>

<?php comment_form(); ?>

</div><!-- #comments -->