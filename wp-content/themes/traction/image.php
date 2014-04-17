<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

get_header(); ?>
	<?php if (have_posts()) : ?>
		<div id="main-top">
			<div class="main-top-left">
				<h4><?php the_time( get_option( 'date_format' ) ); ?></h4>
				<div class="single-comments">
					<a href="#comments"><?php comments_number( '', '1', '%' ); ?></a>
				</div>
			</div>
			<?php get_template_part( 'subscribe' ); ?>
		</div>
		<div id="main" class="clear">
			<div id="content">
				<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'clear single' ); ?>>
						<h1 class="title"><a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ); ?></a> &raquo; <?php the_title(); ?></h1>
						<div class="entry single">
							<p class="attachment"><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'auto' ); ?></a></p>
							<?php the_content(); ?>
							<div class="navigation image clear">
								<div class="alignleft"><?php previous_image_link(); ?></div>
								<div class="alignright"><?php next_image_link(); ?></div>
							</div>
							<?php edit_post_link( __( 'Edit', 'traction' ) ); ?>
							<?php wp_link_pages(); ?>
						</div><!--end entry-->
					</div><!--end post-->
				<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
					<?php comments_template( '', true); ?>
				<?php else : ?>
				<?php endif; ?>
			</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>