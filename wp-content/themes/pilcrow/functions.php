<?php
/**
 * @package WordPress
 * @subpackage Pilcrow
 * @since Pilcrow 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 500;

/** Tell WordPress to run pilcrow_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'pilcrow_setup' );

if ( ! function_exists( 'pilcrow_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override pilcrow_setup() in a child theme, add your own pilcrow_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Pilcrow 1.0
 */
function pilcrow_setup() {

	// This theme has some pretty cool theme options
	require( dirname( __FILE__ ) . '/theme-options.php' );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'pilcrow', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'pilcrow' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '000' );

	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/books.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to pilcrow_header_image_width and pilcrow_header_image_height to change these values.
	$options = get_option( 'pilcrow_theme_options' );
	$current_layout = $options['theme_layout'];
	$two_columns = array( 'content-sidebar', 'sidebar-content' );

	if ( in_array( $current_layout, $two_columns ) ) {
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'pilcrow_header_image_width', 770 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'pilcrow_header_image_height', 200 ) );
	}
	else {
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'pilcrow_header_image_width', 990 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'pilcrow_header_image_height', 257 ) );
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );


	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See pilcrow_admin_header_style(), below.
	add_custom_image_header( 'pilcrow_header_style', 'pilcrow_admin_header_style', 'pilcrow_admin_header_image' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'books' => array(
			'url' => '%s/images/headers/books.jpg',
			'thumbnail_url' => '%s/images/headers/books-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Books', 'pilcrow' )
		),
		'record' => array(
			'url' => '%s/images/headers/record.jpg',
			'thumbnail_url' => '%s/images/headers/record-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Record', 'pilcrow' )
		),
		'pattern' => array(
			'url' => '%s/images/headers/pattern.jpg',
			'thumbnail_url' => '%s/images/headers/pattern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pattern', 'pilcrow' )
		),
	) );
}
endif;

if ( ! function_exists( 'pilcrow_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since pilcrow 1.0
 */
function pilcrow_header_style() {
	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#site-title {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		#nav {
			margin-top: 18px;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;

if ( ! function_exists( 'pilcrow_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in pilcrow_setup().
 *
 * @since Pilcrow 1.0
 */
function pilcrow_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
.appearance_page_custom-header #headimg {
	border: none;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	max-width: 800px;
}
#site-title {
	font-family: Georgia, serif;
	text-align: right;
	margin: 0;
}
#site-title a {
	color: #000;
	font-size: 40px;
	font-weight: bold;
	line-height: 72px;
	text-decoration: none;
}
#headimg img {
	height: auto;
	width: 100%;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

if ( ! function_exists( 'pilcrow_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in pilcrow_setup().
 *
 * @since pilcrow 1.0
 */
function pilcrow_admin_header_image() { ?>
	<div id="headimg">
			<?php
			if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
				$style = ' style="display:none;"';
			else
				$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
			?>
			<h1 id="site-title"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<img src="<?php esc_url ( header_image() ); ?>" alt="" />
	</div>
<?php }
endif;


if ( ! function_exists( 'pilcrow_background_markup' ) ) :
/**
 * Adds a containing div around everything if the custom background feature is in use
 *
* @since Pilcrow 1.0
 */
function pilcrow_background_markup() {
	// check if we're using a custom background image or color
	$color = get_background_color();
	$image = get_background_image();

	if ( '' != $color || '' != $image ) {
		// If we are, let's hook into the pilcrow_before action
		function pilcrow_wrap_before() {
			echo '<div id="wrapper">';
		}
		add_action( 'pilcrow_before', 'pilcrow_wrap_before' );

		// And, let's hook into the pilcrow_after action
		function pilcrow_wrap_after() {
			echo '</div><!-- #wrapper -->';
		}
		add_action( 'pilcrow_after', 'pilcrow_wrap_after' );
	}
}
add_action( 'init', 'pilcrow_background_markup' );
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link and only show 1 level of menu items (to match a previous theme)
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Pilcrow 1.0
 */
function pilcrow_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['depth'] = 1;
	return $args;
}
add_filter( 'wp_page_menu_args', 'pilcrow_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Pilcrow 1.0
 * @return int
 */
function pilcrow_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'pilcrow_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Pilcrow 1.0
 * @return string "Continue Reading" link
 */
function pilcrow_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pilcrow' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and pilcrow_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Pilcrow 1.0
 * @return string An ellipsis
 */
function pilcrow_auto_excerpt_more( $more ) {
	return ' &hellip;' . pilcrow_continue_reading_link();
}
add_filter( 'excerpt_more', 'pilcrow_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Pilcrow 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function pilcrow_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pilcrow_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'pilcrow_custom_excerpt_more' );

if ( ! function_exists( 'pilcrow_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own pilcrow_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Pilcrow 1.0
 */
function pilcrow_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-container">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 48 ); ?>
				<?php printf( __( '%s', 'pilcrow' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'pilcrow' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'pilcrow' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'pilcrow' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->

			<div class="comment-body"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'pilcrow' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'pilcrow' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and two widget-ready columns in the footer.
 *
 * To override pilcrow_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Pilcrow 1.0
 * @uses register_sidebar
 */
function pilcrow_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Sidebar', 'pilcrow' ),
		'id' => 'sidebar-1',
		'description' => __( 'The main sidebar', 'pilcrow' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'pilcrow' ),
		'id' => 'sidebar-2',
		'description' => __( 'The secondary sidebar in three-column layouts', 'pilcrow' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located above the primary and secondary sidebars in Content-Sidebar-Sidebar and Sidebar-Sidebar-Content layouts. Empty by default.
	register_sidebar( array(
		'name' => __( 'Feature Area', 'pilcrow' ),
		'id' => 'sidebar-3',
		'description' => __( 'The feature widget area above the sidebars in Content-Sidebar-Sidebar and Sidebar-Sidebar-Content layouts', 'pilcrow' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Area', 'pilcrow' ),
		'id' => 'sidebar-4',
		'description' => __( 'The first footer widget area', 'pilcrow' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Area', 'pilcrow' ),
		'id' => 'sidebar-5',
		'description' => __( 'The second footer widget area', 'pilcrow' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running pilcrow_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'pilcrow_widgets_init' );

/**
 *  Returns the current pilcrow color scheme as selected in the theme options
 *
 * @since pilcrow 1.0
 */
function pilcrow_current_color_scheme() {
	$options = get_option( 'pilcrow_theme_options' );

	return $options['color_scheme'];
}

/**
 * Register our color schemes and add them to the queue
 */
function pilcrow_color_registrar() {
	$color_scheme = pilcrow_current_color_scheme();

	if ( 'dark' == pilcrow_current_color_scheme() ) {
		wp_register_style( 'dark', get_template_directory_uri() . '/colors/dark.css', null, null );
		wp_enqueue_style( 'dark' );
	}
	if ( 'brown' == pilcrow_current_color_scheme() ) {
		wp_register_style( 'brown', get_template_directory_uri() . '/colors/brown.css', null, null );
		wp_enqueue_style( 'brown' );
	}
	if ( 'red' == pilcrow_current_color_scheme() ) {
		wp_register_style( 'red', get_template_directory_uri() . '/colors/red.css', null, null );
		wp_enqueue_style( 'red' );
	}
}
add_action( 'wp_print_styles', 'pilcrow_color_registrar' );

/**
 *  Returns the current pilcrow layout as selected in the theme options
 *
 * @since pilcrow 1.0
 */
function pilcrow_current_layout() {
	$options = get_option( 'pilcrow_theme_options' );
	$current_layout = $options['theme_layout'];

	$two_columns = array( 'content-sidebar', 'sidebar-content' );
	$three_columns = array( 'content-sidebar-sidebar', 'sidebar-sidebar-content', 'sidebar-content-sidebar' );

	if ( in_array( $current_layout, $two_columns ) )
		return 'two-column ' . $current_layout;
	elseif ( in_array( $current_layout, $three_columns ) )
		return 'three-column ' . $current_layout;
	else
		return $current_layout;
}

/**
 *  Adds pilcrow_current_layout() to the array of body classes
 *
 * @since pilcrow 1.0
 */
function pilcrow_body_class($classes) {
	$classes[] = pilcrow_current_layout();

	return $classes;
}
add_filter( 'body_class', 'pilcrow_body_class' );

/**
 * Set the default theme colors based on the current color scheme
 */
$color_scheme = pilcrow_current_color_scheme();

switch ( $color_scheme ) {
	case 'dark':
		$themecolors = array(
			'bg' => '0a0a0a',
			'border' => '282828',
			'text' => 'd8d8cd',
			'link' => '1c9bdc',
			'url' => '1c9bdc'
		);
		break;

	case 'brown':
		$themecolors = array(
			'bg' => '29241b',
			'border' => '3a3121',
			'text' => '9f9c80',
			'link' => 'b58942',
			'url' => 'b58942'
		);
		break;

	case 'red':
		$themecolors = array(
			'bg' => 'b62413',
			'border' => 'e23817',
			'text' => 'fae8e6',
			'link' => 'b58942',
			'url' => 'b58942'
		);
		break;

	default:
		$themecolors = array(
			'bg' => 'ffffff',
			'border' => 'bbbbbb',
			'text' => '333333',
			'link' => '1c9bdc',
			'url' => '1c9bdc'
		);
		break;
}

/**
 * Show a nice admin message saying Pilcrow replaced PressRow
 */
function pilcrow_change_notice() {
	$custom_css_link = admin_url() . 'themes.php?page=editcss';
	$hide_link = wp_nonce_url( admin_url( 'themes.php?hide-switch-note=true' ), 'hide_switch_note' )
?>
	<div class="updated">
		<p style="line-height: 1.5em;">Your site was automatically upgraded to a new theme called Pilcrow.
		<?php if ( ! defined( 'SAFECSS_ACTIVATED' ) || constant( 'SAFECSS_ACTIVATED' ) !== true ) : ?>
		<a href="http://blog.wordpress.com/new-theme-pilcrow/">Read more about Pilcrow</a> or learn about the theme change in <a href="http://en.forums.wordpress.com/topic/details-on-pressrow-replacement-pilcrow">our announcement</a>.</p>
		<?php else: ?>
		<br /><strong>Custom CSS:</strong> Since you&rsquo;re using <a href="<?php echo $custom_css_link; ?>">Custom CSS</a> on your blog, you may want to check out the theme changes in <a href="http://en.forums.wordpress.com/topic/details-on-pressrow-replacement-pilcrow">our announcement</a>. The changes in the new theme may affect the way your <a href="<?php echo $custom_css_link; ?>">Custom CSS</a> works.</p>
		<?php endif; ?>
		<p style="line-height: 1.5em;">( <a href="<?php echo $hide_link; ?>">Don't show this message again</a>. )</p>
	</div>
<?php
}

// Only show admin note if this was an automated switch
$hide_switch_note = get_theme_mod( 'hide_switch_note' );
if ( false !== get_option( 'pressrow_sidebars_widgets_bak' ) && empty( $hide_switch_note ) ) {
	remove_action( 'admin_notices', 'show_tip' );
	add_action( 'admin_notices', 'pilcrow_change_notice' );
}
// Process the "Don't show this message again" action
if ( isset( $_GET['hide-switch-note'] ) ) {
	check_admin_referer( 'hide_switch_note' );

	set_theme_mod( 'hide_switch_note', true );
	wp_redirect( admin_url( 'themes.php' ) ); // reload the page
}