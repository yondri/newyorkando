<?php
/*
Template Name: contact
*/
?><?php get_header(); ?>

<!-- content ................................. -->
<div id="main">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); // no main ?>>

			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php echo do_shortcode( '[contact-form show_subject="yes"]' ); ?>

			<?php wp_link_pages(); ?>

<?php endwhile; ?>

<?php endif; ?>

<?php comments_template(); ?>

</div> <!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
