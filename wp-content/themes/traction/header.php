<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

global $traction; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
<meta name="Copyright" content="Design is copyright <?php echo date( 'Y' ); ?> The Theme Foundry" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" rel="stylesheet" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>/stylesheets/ie.css" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script( 'traction', get_template_directory_uri() . '/javascripts/traction.js', 'jquery' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="skip-content"><a href="#content"><?php _e( 'Skip to content', 'traction' ); ?></a></div>

	<div id="pg-nav-bg">
		<div class="wrapper clear">
			<?php wp_nav_menu( array( 'container_id' => 'pg-nav', 'menu_class' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'traction_primary_menu' ) ); ?>
		</div><!--end wrapper-->
	</div><!--end page-navigation-bg-->

	<div class="wrapper big">
		<div id="header" class="clear">
			<div class="logo">
				<?php if ( is_home()) echo( '<h1 id="title">' ); else echo( '<div id="title">' );?><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a><?php if ( is_home()) echo( '</h1>' ); else echo( '</div>' );?>
				<div id="description">
					<?php bloginfo( 'description' ); ?>
				</div><!--end description-->
			</div><!--end logo-->
			
			<div id="cat-nav" class="clear">
				<?php wp_nav_menu( array( 'container' => false, 'menu_class' => 'nav', 'theme_location' => 'secondary', 'fallback_cb' => 'traction_category_menu' ) ); ?>
			</div>

		</div><!--end header-->