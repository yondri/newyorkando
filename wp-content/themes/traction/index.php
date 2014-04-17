<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

get_header(); ?>
	<div id="main-top">
		<h4><?php _e( 'Recent Articles', 'traction' ); ?></h4>
		<?php get_template_part( 'subscribe' ); ?>
	</div>
	<div id="main" class="clear">
		<div id="content">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php $has_thumb = false; ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
					<div class="date">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<div class="day"><?php the_time( __( 'j' ) ); ?></div>
							<div class="month"><?php the_time( __( 'M', 'traction' ) ); ?></div>
						</a>
					</div>
					<?php if ( has_post_thumbnail() && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'index-thumb' ) ) && $image[1] >= '175' ) : ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'index-thumb', array( 'class' => 'index-post-thm alignleft border' ) ); ?></a>
						<?php $has_thumb = true; ?>
					<?php endif; ?>
					<div class="entry<?php if ( ! $has_thumb ) echo ' nothumb'; ?>">
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content( traction_read_more() ); ?>
						<?php edit_post_link( __( 'Edit', 'traction' ) ); ?>
						<?php wp_link_pages(); ?>
					</div><!--end entry-->
				</div><!--end post-->
			<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
				<div class="navigation index">
					<div class="alignleft"><?php next_posts_link( __( '&laquo; Older Entries', 'traction' ) ); ?></div>
					<div class="alignright"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'traction' ) ); ?></div>
				</div><!--end navigation-->
			<?php else : ?>
			<?php endif; ?>
		</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>