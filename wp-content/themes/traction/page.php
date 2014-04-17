<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

get_header(); ?>
	<?php if (have_posts()) : ?>
		<div id="main-top">
			<div class="main-top-left">
				<div class="single-comments">
					<a href="#comments"><?php comments_number( '', '1', '%' ); ?></a>
				</div>
			</div>
			<?php get_template_part( 'subscribe' ); ?>
		</div>
		<div id="main" class="clear">
			<div id="content">
				<?php while (have_posts()) : the_post(); ?>
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="entry page">
						<?php the_post_thumbnail( 'index-thumb', array( 'class' => 'single-post-thm alignright border' ) ); ?>
						<?php the_content(); ?>
						<?php edit_post_link( __( 'Edit', 'traction' ) ); ?>
						<?php wp_link_pages(); ?>
					</div><!--end entry-->
	<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
		<?php comments_template( '', true); ?>
	<?php else : ?>
	<?php endif; ?>
			</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>