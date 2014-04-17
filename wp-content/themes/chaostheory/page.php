<?php get_header() ?>

	<div id="container">
		<div id="content" class="hfeed">

<?php the_post() ?>

			<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class() ?>">
				<div class="entry-meta">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent link to %s', 'chaostheory' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title() ?></a></h2>
				</div>
				<div class="entry-content">
<?php the_content() ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'chaostheory'), '</div>', 'number'); ?>

<?php edit_post_link(__('Edit this entry.', 'chaostheory'),'<p class="edit-link">','</p>') ?>

				</div>
			</div><!-- .post -->

<?php comments_template(); ?>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
