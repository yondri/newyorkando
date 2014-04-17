<?php
/**
 * @package WordPress
 * @subpackage Duster
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php duster_content_nav( 'nav-above' ); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php duster_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>