<?php 

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '444444',
	'link' => '2277dd'
);

$content_width = 500;

add_theme_support( 'automatic-feed-links' );

add_custom_background();

/* Current version of K2 */
$current = '0.9.1';

// Sidebar registration for dynamic sidebars
if(function_exists('register_sidebar')) {
	register_sidebar(array('before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>'));
}

define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/images/k2-header.png'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 780);
define('HEADER_IMAGE_HEIGHT', 200);

function k2_admin_header_style() {
?>
<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	background-color: rgb(51, 113, 163);
}
#headimg h1
{
font-family: 'Trebuchet MS',Verdana,Sans-Serif;
font-size: 30px;
font-weight: bold;
letter-spacing: -1px;
padding-left: 40px;
padding-right: 40px;
padding-top: 75px;
margin: 0;
}
#headimg h1 a {
	color:#<?php header_textcolor() ?>;
	border: none;
	text-decoration: none;
}
#headimg a:hover
{
	text-decoration:underline;
}
#headimg #desc
{
	font-weight:normal;
	font-size:10px;
	color:#<?php header_textcolor() ?>;
	margin:0;
	padding:0 40px;
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>
#headerimg h1, #headerimg #desc {
	display: none;
}
#headimg h1 a, #headimg #desc {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
<?php } ?>

</style>
<?php
}

function header_style() {
?>
<style type="text/css">
#header {
	background:#3371a3 url(<?php header_image() ?>) center repeat-y;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header h1 a, #header .description {
	display: none;
}
<?php } else { ?>
#header h1 a, #header h1 a:hover, #header .description {
	color: #<?php header_textcolor() ?>;
}	
<?php } ?>
</style>
<?php
}

add_custom_image_header('header_style', 'k2_admin_header_style');

// Register nav menu locations
register_nav_menus( array(
	'primary' => __( 'Primary Navigation' ),
) );

// Add a home link to the default menu fallback wp_page_menu
function k2_page_menu_args( $args ) {
	$args['show_home'] = 'Blog';
	$args['depth'] = 1;
	return $args;
}
add_filter( 'wp_page_menu_args', 'k2_page_menu_args' );

// Add CLASS attribute of "menu" to the first <ul> occurence in wp_page_menu( )
function k2_add_menu_class( $menu ) {
	return preg_replace( '/<ul>/', '<ul id="nav" class="menu">', $menu, 1 );
}
add_filter( 'wp_page_menu', 'k2_add_menu_class' );


