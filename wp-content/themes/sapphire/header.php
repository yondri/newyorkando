<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<style type="text/css" media="screen">
	
		/* BEGIN IMAGE CSS */
			/*	To accomodate differing install paths of WordPress, images are referred only here,
				and not in the wp-layout.css file. If you prefer to use only CSS for colors and what
				not, then go right ahead and delete the following lines, and the image files. */
			
		body	 	{ background: url("<?php bloginfo('stylesheet_directory'); ?>/images/sapphirebg.jpg"); }
		#page		{ background: url("<?php bloginfo('stylesheet_directory'); ?>/images/sapphirebody.jpg") repeat-y top center; border: none; }
		#header 	{ background: url("<?php bloginfo('stylesheet_directory'); ?>/images/sapphirehead.jpg") no-repeat bottom center; }
		#footer 	{ background: url("<?php bloginfo('stylesheet_directory'); ?>/images/sapphirefooter.jpg") no-repeat bottom center; border: none;}
			
			
			/*	Because the template is slightly different, size-wise, with images, this needs to be set here
				If you don't want to use the template's images, you can also delete the following two lines. */
			
			#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 0; height: 180px; width: 760px; }
			#headerimg 	{ margin: 0; height: 180px; width: 740px; } 
		/* END IMAGE CSS */
		
	</style>

	<?php 
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_head(); 
	?>
</head>
<body>

<div id="page">


<div id="header">
	<div id="headerimg" onclick="location.href='<?php echo home_url( '/' ); ?>';" style="cursor: pointer;">
		<h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
</div>
<hr />
