<?php
/**
 * @package WordPress
 * @subpackage Neutra
 */
get_header(); ?>

<div id="page">

	<div id="left">
		<?php if ( have_posts() ) : ?>

		<h2 class="title">Category: <strong><?php the_category(); ?></strong></h2>

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="results">
				<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			</div>

			<?php endwhile; ?>

			<div class="navigation">
				<div class="old-posts alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
				<div class="new-posts alignright"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
			</div><!-- /navigation -->

			<?php else : ?>

			<div class="post">
				<h2 class="title">I'm sorry, there's no category!</h2>
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
