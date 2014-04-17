<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>


<div <?php post_class(); ?>>
<h2 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link: %s' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>


<div class="storycontent">
<?php the_content(); ?>
<?php wp_link_pages(); ?>
</div>
<div class="meta">
	<?php if ( ! is_page() ) : ?>
		<?php _e("Published in:"); ?> <?php the_category() ?>
	<?php else : ?>
		<?php _e("Published"); ?>
	<?php endif; ?>
	
	<?php
		printf( __( ' on %1$s at %2$s' ),
		get_the_time( get_option( 'date_format' ) ),
		get_the_time()
		);
	?>
	
	&nbsp;<?php comments_popup_link(__('Leave a Comment'), __('Comments (1)'), __('Comments (%)')); ?>
	&nbsp;<?php edit_post_link(__('Edit This')); ?>
	<br />
	<?php the_tags('Tags: ', ', ', '<br />'); ?>
</div>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/printer.gif" width="102" height="27" class="pmark" alt=" " />

<?php comments_template (); ?>
</div>

<?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&laquo; Older Entries' ) ) ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer Entries &raquo;' ) ) ?></div>
	</div>

<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>



<div id="menu">

<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<li id="calendar">
	<?php get_calendar(); ?>
</li>
<li id="search">
<form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
<input type="text" name="s" id="s" size="8" /> <input type="submit" name="submit" value="<?php _e('Search'); ?>" id="sub" />
</form>
</li>




<li id="categories"><?php _e('Categories:'); ?>
	<ul>
	<?php wp_list_cats(); ?>
	</ul>
</li>



<li id="archives"><?php _e('Archives:'); ?>
 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>
</li>


<?php wp_list_bookmarks(); ?>


<?php endif; ?>
</ul>

</div>

<?php get_footer(); ?>

</body>
</html>