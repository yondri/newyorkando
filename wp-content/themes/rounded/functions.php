<?php
if ( function_exists('register_sidebar') ) {
	$a = get_bloginfo('template_directory');

	register_sidebar(array(
        'before_widget' => '<!-- //start sideitem //--><br /><div id="%1$s" class="sideitem widget %2$s"><div class="sideitemtop"><img src="'.$a.'/img/stl.gif" alt="" width="15" height="15" class="corner" style="display: none" /></div><div class="sideitemcontent">',
        'after_widget' => '</div><div class="sideitembottom"><img src="'.$a.'/img/sbl.gif" alt="" width="15" height="15" class="corner" style="display: none" /></div></div><!-- //end sideitem //-->',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

function widget_rounded_links() {
	$a = get_bloginfo('template_directory');
 ?>
	<!-- //start sideitem //--><br /><div class="widget sideitem"><div class="sideitemtop"><img src="<?php echo $a; ?>/img/stl.gif" alt="" width="15" height="15" class="corner" style="display: none" /></div><div class="sideitemcontent">
    	<?php 
	wp_list_bookmarks(array(
	'title_before' => '<h2>', 
	'title_after' => '</h2>', 
   	));
	?>
	</div><div class="sideitembottom"><img src="<?php echo $a; ?>/img/sbl.gif" alt="" width="15" height="15" class="corner" style="display: none" /></div></div><!-- //end sideitem //-->
<?php }

unregister_widget('WP_Widget_Links');
wp_register_sidebar_widget('links', __('Links', 'widgets'), 'widget_rounded_links');

register_nav_menus( array(
	'primary' => __( 'Primary Navigation' ),
) );

function rounded_page_menu() { // fallback for primary navigation ?>
<ul>
	<?php wp_list_pages( 'title_li=&depth=1' ); ?>
</ul>

<?php }

add_theme_support( 'automatic-feed-links' );

// Custom background
add_custom_background();

function rounded_custom_background() {
	if ( '' != get_background_color() && '' == get_background_image() ) { ?>
	<style type="text/css">
		body { background-image: none; }
	</style>
	<?php }
}
add_action( 'wp_head', 'rounded_custom_background' );