<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent link to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
				<p class="commentmeta">
					<?php the_time(get_option('date_format')) ?> at <?php the_time() ?> 
					(<?php the_category(', ') ?>)
					<?php the_tags( ' (', ', ', ') '); ?>
					<?php edit_post_link(__('Edit'),' &#183; ',''); ?>
				</p>
				<?php the_content(__('Read the rest of this entry &raquo;')); ?>
				<?php wp_link_pages(); ?>
			</div>
			
			<?php comments_template(); ?>
	
		<?php endwhile; ?>
		
	<?php else : ?>

		<h2 class="pagetitle"><?php _e('Search Results'); ?></h2>
		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
