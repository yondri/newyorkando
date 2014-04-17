<?php

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '444444',
	'link' => '1c9bdc'
);

$content_width=500;

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/books.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 770);
define('HEADER_IMAGE_HEIGHT', 200);
define( 'NO_HEADER_TEXT', true );

function pressrow_admin_header_style() {
?>
<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, #headimg #desc {
	display: none;
}
</style>
<?php
}

function header_style() {
?>
<style type="text/css">
#pic { background: url(<?php header_image() ?>) no-repeat; }
</style>
<?php
}

add_custom_image_header('header_style', 'pressrow_admin_header_style');

function widget_pressrow_search($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Search');
?>

		<?php echo $before_widget ?>
			<?php echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title ?>
				<div class="sidebar_section">
					<form id="search_form" method="get" action="<?php bloginfo('url') ?>">
					<input id="s" name="s" class="text_input" type="text" value="<?php the_search_query(); ?>" size="10" />
					<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find &raquo;') ?>" />
					</form>
				</div>
		<?php echo $after_widget ?>

<?php
}

function pressrow_widgets_init() {
	register_sidebars(1);
	unregister_widget('WP_Widget_Search');
	wp_register_sidebar_widget('Search', __('Search'), 'widget_pressrow_search');
}
add_action('widgets_init', 'pressrow_widgets_init');

/**
 * Show a nice admin message saying PressRow is being replaced by Pilcrow
 */
function pressrow_change_notice() {
	$theme_link = admin_url() . 'themes.php?s=pilcrow';
	$theme_recent_link = admin_url() . 'themes.php?order=recent';
	$activate_link = wp_nonce_url( 'themes.php?action=activate&amp;template=pub/pilcrow&amp;stylesheet=pub/pilcrow', 'switch-theme_pub/pilcrow' 
	);
	$custom_css_link = admin_url() . 'themes.php?page=editcss';
?>
	<div class="updated">
		<p style="line-height: 1.5em;">Howdy! Your theme will soon be automatically upgraded to a new theme, called <a href="<?php echo $theme_link; ?>">Pilcrow</a>.</p>
		<?php if ( ! defined( 'SAFECSS_ACTIVATED' ) || constant( 'SAFECSS_ACTIVATED' ) !== true ) : ?>
		<p style="line-height: 1.5em;">You can read more about it in <a href="http://en.forums.wordpress.com/topic/details-on-pressrow-replacement-pilcrow">our announcement</a>, or save yourself the wait and <a href="<?php echo $activate_link; ?>">activate Pilcrow now</a>&mdash;or check out any one of the other <a href="<?php echo $theme_recent_link; ?>">fantastic themes</a> we&rsquo;ve been adding lately.</p>
		<?php else: ?>
		<p style="line-height: 1.5em;"><strong>Custom CSS:</strong> Since you&rsquo;re using <a href="<?php echo $custom_css_link; ?>">Custom CSS</a> on your blog, you may want to check out the theme changes in advance, in <a href="http://en.forums.wordpress.com/topic/details-on-pressrow-replacement-pilcrow">our announcement</a>. The changes in the new theme may affect the way your <a href="<?php echo $custom_css_link; ?>">Custom CSS</a> works.
		<?php endif; ?>
	</div>
<?php
}
remove_action( 'admin_notices', 'show_tip' );
add_action( 'admin_notices', 'pressrow_change_notice' );