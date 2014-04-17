<?php

$themecolors = array(
	'bg' => 'e6e6e6',
	'text' => '000000',
	'link' => '226699',
	'border' => 'e6e6e6',
	'url' => '226699'
);

if ( function_exists('register_sidebars') )
	register_sidebars(2);

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();

function andreas04_custom_background() {
	if ( '' != get_background_color() && '' == get_background_image() ) { ?>
	<style type="text/css">
		body { background: #<?php echo get_background_color(); ?>; }
	</style>
	<?php }
	if ( '' != get_background_color() || '' != get_background_image() ) { ?>
	<style type="text/css">
		#container { background: none; border: none; }
	</style>
	<?php }
}
add_action( 'wp_head', 'andreas04_custom_background' );

add_theme_support( 'automatic-feed-links' );

// Navigation menu
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'andreas04' )
) );

// Fallback for primary navigation
function andreas04_page_menu() { ?>
<ul>
	<li><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'andreas04' ); ?></a></li>
	<?php wp_list_pages( 'title_li=&depth=1' ); ?>
</ul>
<?php } ?>