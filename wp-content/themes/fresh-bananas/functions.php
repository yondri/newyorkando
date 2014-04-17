<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '637677'
);

$content_width = 490;

if ( function_exists('register_sidebars') )
	register_sidebars(1);

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();