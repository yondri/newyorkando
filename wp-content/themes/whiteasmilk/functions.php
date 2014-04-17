<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '333333',
	'link' => '0066cc'
);

$content_width = 380;

if ( function_exists('register_sidebars') )
	register_sidebars(1);

add_theme_support( 'automatic-feed-links' );

add_custom_background();