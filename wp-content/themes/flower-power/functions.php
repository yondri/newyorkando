<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '1d698f'
);

$content_width = 340;

if ( function_exists('register_sidebars') )
	register_sidebars(1);

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();

function flower_custom_background() {
	if ( '' != get_background_color() || '' != get_background_image() ) { ?>
		<style type="text/css">
			#container, #header { background-image: none; }
		</style>
	<?php }
}
add_action( 'wp_head', 'flower_custom_background' );