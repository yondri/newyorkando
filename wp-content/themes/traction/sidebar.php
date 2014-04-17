<?php
/**
 * @package WordPress
 * @subpackage Traction
 */
?>
<div id="sidebar">
	<ul>
	<?php if ( ! dynamic_sidebar( 'normal_sidebar' ) ) : ?>
		<li class="widget widget_search">
			<?php get_search_form(); ?>
		</li>
		<li class="widget widget_categories">
			<h2 class="widgettitle"><?php _e( 'Categories', 'traction' ); ?></h2>
			<ul>
				<?php wp_list_categories( ); ?>
			</ul>
		</li>
		<li class="widget widget_archives">
			<h2 class="widgettitle"><?php _e( 'Archives', 'traction' ); ?></h2>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
		</li>
	<?php endif; ?>
	</ul>
</div><!--end sidebar-->