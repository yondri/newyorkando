<?php
/**
 * @package WordPress
 * @subpackage Neutra
 */
get_header(); ?>

<div id="page">

	<div id="left">
		<?php if ( have_posts() ) : ?>

		<?php /* If category archive */ if ( is_category() ) { ?>
		<h2 class="title">Category: <strong><?php single_cat_title(); ?></strong></h2>
		<?php /* If tag archive */ } elseif ( is_tag() ) { ?>
		<h2 class="title">Tag browsing: <strong><?php single_tag_title(); ?></strong></h2>
		<?php /* If daily archive */ } elseif ( is_day() ) { ?>
		<h2 class="title">Archive for <strong><?php the_time( 'F jS, Y' ); ?></strong></h2>
		<?php /* If monthly archive */ } elseif (is_month()) { ?>
		<h2 class="title">Archive for <strong><?php the_time( 'F Y' ); ?></strong></h2>
		<?php /* If yearly archive */ } elseif ( is_year() ) { ?>
		<h2 class="title">Archive for <strong><?php the_time( 'Y' ); ?></strong></h2>
		<?php /* If paged archive */ } elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged']) ) { ?>
		<h2 class="title">Blog Archive</h2>
		<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="results">
				<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			</div>

			<?php endwhile; ?>

			<div class="navigation">
				<div class="old-posts alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
				<div class="new-posts alignright"><?php previous_posts_link( 'Newer posts &laquo;' ); ?></div>
			</div><!-- /navigation -->

			<?php else : ?>

			<div class="post">
				<h2 class="title">I'm sorry, there's no archive!</h2>
				<div class="postcontent">
					<p>Don't worry, you can always <strong>search the blog</strong> or browse the <strong>categories</strong>.</p>
				</div>
			</div><!-- /post -->

		<?php endif; ?>

	</div><!-- /left -->

	<div id="right">
		<?php get_sidebar(); ?>
	</div><!-- /right -->

</div><!-- /page -->

<?php get_footer(); ?>
