<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

$themecolors = array(
	'bg' => 'bebcad',
	'border' => 'bebcad',
	'text' => '000000',
	'link' => '5785a4',
	'url' => '5785a4'
);
$content_width = 618;

add_theme_support( 'automatic-feed-links' );

/*Required functions
------------------------------------------------------------ */
require_once( get_template_directory() . '/functions/comments.php' );

/*Sidebars
------------------------------------------------------------ */
register_sidebar( array(
	'name'=> __( 'Sidebar', 'traction' ),
	'id' => 'normal_sidebar',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name'=> __( 'Footer Left', 'traction' ),
	'id' => 'footer_sidebar',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name'=> __( 'Footer Center', 'traction' ),
	'id' => 'footer_sidebar_2',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name'=> __( 'Footer Right', 'traction' ),
	'id' => 'footer_sidebar_3',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );

/*Custom thumbnails
------------------------------------------------------------ */
add_theme_support( 'post-thumbnails' );
add_image_size( 'index-thumb', 175, 150, true );

/*Header navigation menu
------------------------------------------------------------ */
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'traction' ),
	'secondary' => __( 'Secondary Navigation', 'traction' ),
) );

function traction_primary_menu() { // fallback for primary navigation ?>
	<ul class="nav">
		<li class="page_item <?php if ( is_front_page() ) echo( 'current_page_item' );?>"><a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'traction' ); ?></a></li>
		<?php wp_list_pages( 'title_li=' ); ?>
	</ul>
<?php }

function traction_category_menu() { // fallback for secondary navigation ?>
	<ul class="nav">
		<?php wp_list_categories( 'title_li=' ); ?>
	</ul>
<?php }

/* Create Traction read more link for archive, search, and index
------------------------------------------------------------ */
function traction_read_more() {
	$out = __( 'Read more', 'traction' ) . '<img src="' . get_bloginfo( 'template_url' ) . '/images/entry-more.png" alt="" />';
	return $out;
}

/* Custom Background
------------------------------------------------------------ */
add_custom_background();

function traction_custom_background() {
	if ( '' != get_background_color() || '' != get_background_image() ) { ?>
		<style type="text/css">
			.wrapper.big, #pg-nav-bg { background: none; }
		<?php if ( '' != get_background_color() && '' == get_background_image() ) { ?>
			body { background-image: none; }
		<?php } ?>
		</style>
	<?php }
}
add_action( 'wp_head', 'traction_custom_background' );