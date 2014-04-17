<div id="comment-template">

<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

	<?php if ( $comments ) : ?>

		<h2><span><?php comments_number(__('No comments'), __('One comment'), __('% comments')); ?></span></h2>
		<p class="do-you-comment"><a href="#respond" title="Comment">Do you want to comment?</a></p>
		<p class="trackback"><?php post_comments_feed_link(__('Comments RSS')); ?> <?php if ( pings_open() ) : ?>and <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('TrackBack URI'); ?></a>	<?php endif; ?>?</p><!-- /trackback -->

		<ol id="commentlist">
			<?php wp_list_comments( 'type=comment&callback=neutra_list_comments' ); ?>
		</ol>

		<div class="navigation">
			<div class="alignleft"><?php next_comments_link( __( '&laquo; Older Comments' ) ); ?></div>
			<div class="alignright"><?php previous_comments_link( __( 'Newer Comments &raquo;' ) ); ?></div>
		</div>

	<?php else : ?>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?><p>You must be <a href="<?php echo site_url(); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p><?php else : ?>

	<?php comment_form( array( 'title_reply' => __( '<span>Leave a Reply</span>' ) ) ); ?>

	<?php endif; // If registration required and not logged in ?>

<?php if ( !empty( $comments_by_type['pings'] ) ) : ?>
<div id="trackbacks">
	<h2><span><?php _e( 'Trackbacks' ); ?></span></h2>
	<ol>
		<?php wp_list_comments( 'type=pings&callback=neutra_list_pings' ); ?>
	</ol>
</div><!-- /trackbacks -->
<?php endif; ?>

<?php else : // Comments are closed ?>
<p class="comments-closed"><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>

</div><!-- /comment-template -->