<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '557799'
);

$content_width = 480;

if ( function_exists('register_sidebars') )
	register_sidebars(1);

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();

function simpla_custom_background() {
	if ( '' != get_background_color() && '' == get_background_image() ) { ?>
	<style type="text/css">
		body { background-image: none; }
	</style>
	<?php }
}
add_action( 'wp_head', 'simpla_custom_background' );