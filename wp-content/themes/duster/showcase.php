<?php
/**
 * Template Name: Showcase Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * @package WordPress
 * @subpackage Duster
 */

get_header(); ?>

		<div id="primary" class="showcase">
			<div id="content" role="main">
				
				<?php the_post(); ?>
							
				<?php
					// If we have content for this page, let's display it.
					if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' );
				?>
				
				<?php
					// See if we have any sticky posts and use the latest to create a featured post
					$sticky = get_option( 'sticky_posts' );
					$featured_args = array(
						'posts_per_page' => 1,
						'post__in'  => $sticky,
					);
					
					$featured = new WP_Query();
					$featured->query( $featured_args );
					
					if ( ! empty( $sticky ) && $sticky[0] ) : ?>
				<section class="featured-post">
					<h1><?php _e( 'The Featured Post', 'duster' ); ?></h1>
					<?php $featured->the_post(); ?>
					
					<?php the_post_thumbnail( array(500,500) ); ?>
					<?php get_template_part( 'content', 'single' ); ?>
				</section>							
				<?php endif; ?>

				<section class="recent-posts">
					<h1><?php _e( 'Recent Posts', 'duster' ); ?></h1>
					
					<?php
					// Display our recent posts, showing full content for the very latest, ignoring Aside posts
					$recent_args = array(
						'order' => 'DESC',
						'ignore_sticky_posts' => 1,
						'tax_query' => array(
							array (
								'taxonomy' => 'post_format',
								'terms' => array( 'post-format-aside' ),
								'field' => 'slug',
								'operator' => 'NOT IN',
							),
						),
					);
					$recent = new WP_Query();
					$recent->query( $recent_args );
					$counter = 0;
					
					while ($recent->have_posts()) : $recent->the_post();
						$counter++;
						if ( 1 == $counter ) :
							get_template_part( 'content' );
							echo '<ol>';
							
						else : ?>
							<li class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'duster' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
							
						<?php endif;
					endwhile;
					?>
					
					</ol>
				</section>

				<section class="ephemera">
					<h1><?php _e( 'Ephemera', 'duster' ); ?></h1>
					
					<?php
						$ephemera_args = array(
							'order' => 'DESC',
							'ignore_sticky_posts' => 1,
							'post_format' => 'post-format-aside',
						);
						$ephemera = new WP_Query();
						$ephemera->query( $ephemera_args );
					?>
					<ol>
					<?php while ($ephemera->have_posts()) : $ephemera->the_post(); ?>
						<li class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'duster' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ol>
				</section>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>