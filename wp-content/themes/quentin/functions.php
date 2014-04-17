<?php

$themecolors = array(
	'bg' => 'f2e2c1',
	'border' => 'f2e2c1',
	'text' => '000000',
	'link' => '5b211a'
);

$content_width = 470;

function quentin_widgets_init() {
	register_sidebars(1);
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Calendar');
	wp_register_sidebar_widget('calendar', __('Calendar'), 'widget_quentin_calendar');
	wp_register_sidebar_widget('search', __('Search'), 'widget_quentin_search');
}
add_action('widgets_init', 'quentin_widgets_init');

function widget_quentin_calendar() {
?>
<li id="calendar">
	<?php get_calendar(); ?>
</li>
<?php
}

function widget_quentin_search() {
?>
<li id="search">
<form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
<input type="text" name="s" id="s" size="8" /> <input type="submit" name="submit" value="<?php _e('Search'); ?>" id="sub" />
</form>
</li>
<?php
}

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();

function quentin_custom_background() {
	if ( '' != get_background_color() && '' == get_background_image() ) { ?>
	<style type="text/css">
		body { background-image: none; }
	</style>
	<?php }
}
add_action( 'wp_head', 'quentin_custom_background' );