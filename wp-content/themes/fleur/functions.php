<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => 'aa7d39'
);

$content_width = 500;

if ( function_exists('register_sidebars') )
	register_sidebars(1);

add_theme_support( 'automatic-feed-links' );

add_custom_background();