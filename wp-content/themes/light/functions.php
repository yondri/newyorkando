<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => 'e5e5e5',
	'link' => 'aac8e0'
);

// actually 483px
$content_width = 480;

if ( function_exists( 'register_sidebars' ) )
	register_sidebars( 1 );

add_theme_support( 'automatic-feed-links' );

add_custom_background();

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'light' ),
) );

function light_page_menu() { // fallback for primary navigation ?>
<ul class="navigation">
	<?php if ( is_home() || is_front_page() ) { $pg_li .="current_page_item"; } ?>
	<li class="<?php echo $pg_li; ?>"><a href="<?php bloginfo( 'url' ); ?>" title="Blog"><span><?php _e( 'Blog' ); ?></span></a></li>
	<?php wp_list_pages( 'depth=1&title_li=&link_before=<span>&link_after=</span>' ); ?>
</ul>
<?php }