<?php get_header(); ?>


<div id="content" class="full-width">
<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>

	
<div <?php post_class(); ?>>
<h2 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
	
<div class="storycontent">
	
	<?php
		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
		 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
		 */
		$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
		foreach ( $attachments as $k => $attachment ) {
			if ( $attachment->ID == $post->ID )
				break;
		}
		$k++;
		// If there is more than 1 attachment in a gallery
		if ( count( $attachments ) > 1 ) {
			if ( isset( $attachments[ $k ] ) )
				// get the URL of the next image attachment
				$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
			else
				// or get the URL of the first image attachment
				$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
		} else {
			// or, if there's only 1 image, get the URL of the image
			$next_attachment_url = wp_get_attachment_url();
		}
	?>
	
	
	<p class="attachment">
		<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
			<?php echo wp_get_attachment_image( $post->ID, array( 700, 9999 ) ); ?>
		</a>
	</p>
	<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?></div>
	<div class="image-description"><?php if ( !empty($post->post_content) ) the_content(); ?></div>

	<div class="navigation">
		<div class="alignleft"><?php previous_image_link() ?></div>
		<div class="alignright"><?php next_image_link() ?></div>
	</div>
</div>
<div class="meta"><?php comments_popup_link(__('Leave a Comment'), __('Comments (1)'), __('Comments (%)')); ?></div>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/printer.gif" width="102" height="27" class="pmark" alt=" " />

<?php comments_template (); ?> 
</div>

<?php endwhile; ?>

<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>

<?php get_footer(); ?>