<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '78a515'
);

$content_width = 475;

register_sidebar( array(
	'name'          => __('Sidebar'),
	'id'            => 'sidebar',
	'before_widget' => '<span class="widget">',
	'after_widget'  => '</span><div class="line"></div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' )
);

add_theme_support( 'automatic-feed-links' );

add_custom_background();

function greenmarinee_custom_background() {
	if ( '' != get_background_color() || '' != get_background_image() ) { ?>
		<style type="text/css">
			.topline, .container_right, .container_left, #content_bg, #footer { background: none; }
			#container { background: #fff; }
		<?php if ( '' != get_background_color() && '' == get_background_image() ) { ?>
			body { background-image: none; }
		<?php } ?>
		</style>
	<?php }
}
add_action( 'wp_head', 'greenmarinee_custom_background' );