<?php
define( 'GURUQ_CAT', 'GuruQ Questions' );
define( 'GURUQ_SLUG', 'guruq-questions' );
define( 'GURUQ_ID', guruq_check_category( GURUQ_CAT ) );
define( 'GURUQ_FEAT_CAT', 'GuruQ Featured Questions' );
define( 'GURUQ_FEAT_SLUG', 'guruq-featured-questions' );
define( 'GURUQ_FEAT_ID', guruq_check_category( GURUQ_FEAT_CAT ) );
define( 'Q_DEFAULT', 'Ask your question' );
define( 'D_DEFAULT', 'More details...' );

/**
 * Add new question into the queue
 */
function guruq_new_post() {
	if ( isset( $_GET['action'] ) && 'post' == $_GET['action'] ) {
		$post = new stdClass();
		$post->post_title = stripslashes( strip_tags( $_POST['question'] ) );
		$post->post_date = current_time( 'mysql' );
		$post->post_content = '';
		$post->author_name = stripslashes( strip_tags( $_POST['name'] ) );
		$post->author_email = stripslashes( strip_tags( $_POST['email'] ) );
		$post->author_website = stripslashes( strip_tags( $_POST['website'] ) );
		$key = 'guruq_' . md5( $post->post_date . '-' . $post->post_title );
		add_option( $key, $post );

		echo $key;
		die();
	}
}
guruq_new_post();

/**
 * Checks if GuruQ category exists, if not, create it, return the ID
 *
 * @return int
 */
function guruq_check_category( $cat = GURUQ_CAT ) {
	// Include the taxonomy api so we can check if category exists
	require_once ( ABSPATH . '/wp-admin/includes/taxonomy.php' );
	$cat_id = (int) category_exists( $cat );
	// cat_id = 0 means it doesn't exist, so we will create it
	if ( 0 == $cat_id )
		$cat_id = (int) wp_create_category( $cat );

	return $cat_id;
}

function guruq_title_from_content( $content ) {

	static $strlen = null;
	if ( !$strlen ) {
		$strlen = function_exists( 'mb_strlen' ) ? 'mb_strlen' : 'strlen';
	}
	$max_len = 40;
	$title = $strlen( $content ) > $max_len ? wp_html_excerpt( $content, $max_len ) . '...' : $content;
	$title = trim( strip_tags( $title ) );
	$title = str_replace( "\n", " ", $title );

	//Try to detect image or video only posts, and set post title accordingly
	if ( !$title ) {
		if ( preg_match( "/<object|<embed/", $content ) )
			$title = __( 'Video Post', 'p2' );
		elseif ( preg_match( "/<img/", $content ) )
			$title = __( 'Image Post', 'p2' );
	}
	return $title;
}

add_action( 'admin_menu', 'guruq_questions_menu' );

/**
 * Adds a GuruQ menu to admin sidebar
 */
function guruq_questions_menu() {
	global $menu;
	$name = add_menu_page( 'GuruQ', 'GuruQ', 'administrator', GURUQ_SLUG, 'guruq_edit_page', '' );
}

/**
 * Generate the data grid of posts categorized as guruq
 */
function guruq_edit_page() {
	include ( 'guruq-list.php' );
}

/**
 * External API handler
 */
function guruq_api_call() {
	if ( !isset( $_GET['guruq-api'] ) )
		return;

	// inits json decoder/encoder object if not already available
	if ( !class_exists( 'Services_JSON' ) ) {
		include_once ( dirname( __FILE__ ) . '/class.json.php' );
	}

	$limit = 20;
	if ( isset( $_GET['limit'] ) )
		$limit = (int) $_GET['limit'];
	$offset = 0;
	if ( isset( $_GET['offset'] ) )
		$offset = (int) $_GET['offset'];
	$format = 'json';
	if ( isset( $_GET['format'] ) && ( 'json' == $_GET['format'] || 'xml' == $_GET['format'] ) )
		$format = $_GET['format'];

	$posts = get_posts( "numberposts=$limit&offset=$offset&category_name=" . GURUQ_CAT );

	if ( empty( $posts ) )
		return;

	foreach ( $posts as $id => $post ) {
		$post->permalink = get_permalink( $post->ID );
		$posts[$id] = guruq_filter_post( $post );
	}

	if ( 'json' == $format ) {
		//header('Content-type: application/json');
		if ( isset( $_GET['callback'] ) ) {
			echo $_GET['callback'] . "(" . json_encode( $posts ) . ");";
		} else {
			echo json_encode( $posts );
		}
		exit();
	}

	$xml = '';
	if ( 'xml' == $format ) {
		header( 'Content-type: text/plain' );
		$bloginfo_charset = get_bloginfo( 'charset' );
		$xml .= '<';
		$xml .= '?xml version="1.0" encoding="' . $bloginfo_charset . '"?>' . "\n";
		$xml .= "<items>\n";
		$xml .= guruq_obj2xml( $posts );
		$xml .= "</items>\n";
		echo $xml;
		exit();
	}
}
guruq_api_call();

/**
 * Return post object with specified member variables
 *
 * @param object $post
 * @return object
 */
function guruq_filter_post( $post ) {
	$_post = new stdClass();
	$members = array( 'ID', 'post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_name', 'post_modified', 'post_modified_gmt', 'post_parent', 'guid', 'permalink' );

	foreach ( $members as $member ) {
		if ( isset( $post->$member ) )
			$_post->$member = $post->$member;
	}

	return $_post;
}

/**
 * Take input string and wrap it with CDATA
 *
 * @param string $str
 * @return string
 */
function guruq_wxr_cdata( $str ) {
	if ( seems_utf8( $str ) == false )
		$str = utf8_encode( $str );

	$str = "<![CDATA[$str" . ( ( substr( $str, -1 ) == ']' ) ? ' ' : '' ) . "]]>";

	return $str;
}

/**
 * Loop over input array and output XML versions of the post objects
 *
 * @param array $posts
 * @return string
 */
function guruq_obj2xml( $posts ) {
	$out = '';
	foreach ( $posts as $post ) {
		$post_title = apply_filters( 'the_title_rss', $post->post_title );
		$post_permalink_rss = apply_filters( 'the_permalink_rss', get_permalink( $post->ID ) );
		$post_pub_date = mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true, $post ), false );
		$dc_creator = guruq_wxr_cdata( get_the_author() );
		$post_guid = get_the_guid( $post->ID );
		$post_content = guruq_wxr_cdata( apply_filters( 'the_content_export', $post->post_content ) );

		$out .= <<<EOD

<item>
<title>$post_title</title>
<link>$post_permalink_rss</link>
<pubDate>$post_pub_date</pubDate>
<guid isPermaLink="false">$post_guid</guid>
<content:encoded>$post_content</content:encoded>
<post_id>$post->ID</post_id>
<post_date>$post->post_date</post_date>
<post_date_gmt>$post->post_date_gmt</post_date_gmt>
<post_name>$post->post_name</post_name>
<post_parent>$post->post_parent</post_parent>
</item>

EOD;
	}

	return $out;
}

/**
 * Add a row to Right Now metabox
 */
function guruq_right_now() {
	$cat = get_category_by_slug( GURUQ_SLUG );
	$total_answered = (int) $cat->category_count;
	$link_answered = '<a href="edit.php?category_name=' . GURUQ_SLUG . '">%s</a>';
	$out = '';
	$out .= '<tr>';
	$out .= '<td class="first b">' . sprintf( $link_answered, $total_answered ) . '</td>';
	$out .= '<td class="t">' . sprintf( $link_answered, __( GURUQ_CAT ) . ' Answered' ) . '</td>';
	$out .= '<td class="b"></td>';
	$out .= '<td class="last t"></td>';
	$out .= '</tr>';

	$total_pending = guruq_count_queue();
	$link_pending = '<a href="admin.php?page=' . GURUQ_SLUG . '">%s</a>';
	$out .= '<tr>';
	$out .= '<td class="first b">' . sprintf( $link_pending, $total_pending ) . '</td>';
	$out .= '<td class="t">' . sprintf( $link_pending, __( GURUQ_CAT ) . ' Pending' ) . '</td>';
	$out .= '<td class="b"></td>';
	$out .= '<td class="last t"></td>';
	$out .= '</tr>';

	echo $out;
}
add_action( 'right_now_table_end', 'guruq_right_now' );

/**
 * Check if post is categorized as GuruQ
 *
 * @param int $post_id Optional. Post id to check
 * @return bool
 */
function is_post_guruq( $post_id = null ) {
	global $post;

	if ( !is_object( $post ) ) {
		$post = get_post( $post_id );
	} else {
		$post_id = $post->ID;
	}

	$cats = get_the_category( $post_id );

	foreach ( $cats as $cat ) {
		if ( GURUQ_SLUG == $cat->slug )
			return true;
	}

	return false;
}

/**
 * Count questions in the queue
 *
 * @return int
 */
function guruq_count_queue() {
	global $wpdb;

	$sql = $wpdb->prepare( "SELECT COUNT( option_name ) FROM $wpdb->options WHERE option_name LIKE %s", 'guruq_%' );
	return (int) $wpdb->get_var( $sql );
}

/**
 * Return items from the queue
 *
 * @param array $args
 * @return array
 */
function guruq_get_queue( $args ) {
	global $wpdb;
	$defaults = array( 'limit' => 10, 'offset' => 0 );
	$args = wp_parse_args( $args, $defaults );
	$limit = (int) $args['limit'];
	$offset = (int) $args['offset'];

	$sql = $wpdb->prepare( "SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE %s ORDER BY option_id DESC LIMIT %d,%d", 'guruq_%', $offset, $limit );
	return $wpdb->get_results( $sql );
}

/**
 * Add GuruQ Question to default_title
 *
 * @param string $post_title
 * @return string
 */
function guruq_default_title( $post_title ) {
	if ( !isset( $_GET['guruq'] ) )
		return $post_title;

	$_post = get_option( $_GET['guruq'] );
	return $_post->post_title;
}

/**
 * Add GuruQ Question to default_content
 *
 * @param string $post_content
 * @return string
 */
function guruq_default_content( $post_content ) {
	if ( !isset( $_GET['guruq'] ) )
		return $post_content;

	$_post = get_option( $_GET['guruq'] );
	return $_post->post_content;
}

if ( strstr( $_SERVER['REQUEST_URI'], '/post-new.php' ) && isset( $_GET['guruq'] ) ) {
	add_filter( 'default_content', 'guruq_default_content' );
	add_filter( 'default_title', 'guruq_default_title' );
}

/**
 * Categorize as GuruQ when post is published
 *
 * @param int $post_id
 * @return void
 */
function guruq_categorize( $post_id ) {
	$cats = wp_get_post_categories( $post_id );
	$cats[] = GURUQ_ID;
	$default = get_option( 'default_category' );

	// Remove the default category from the list
	foreach ( $cats as $k => $v ) {
		if ( $default == $v ) {
			unset( $cats[$k] );
		}
	}

	// Sort array to reset indexes, wp_set_post_categories() checks index 0
	sort( $cats );

	wp_set_post_categories( $post_id, $cats );
}
add_action( 'publish_post', 'guruq_categorize' );

/**
 * Add post_meta to GuruQ when post is published
 *
 * @param int $post_id
 * @return void
 */
function guruq_add_post_meta( $post_id ) {
	$parts = parse_url( $_SERVER['HTTP_REFERER'] );
	$q = wp_parse_args( $parts['query'] );

	if ( !isset( $q['guruq'] ) )
		return;

	$_post = get_option( $q['guruq'] );

	if ( !empty( $_post->author_name ) )
		add_post_meta( $post_id, 'author_name', $_post->author_name );
	if ( !empty( $_post->author_email ) )
		add_post_meta( $post_id, 'author_email', $_post->author_email );
	if ( !empty( $_post->author_website ) )
		add_post_meta( $post_id, 'author_website', urldecode( $_post->author_website ) );
}
add_action( 'publish_post', 'guruq_add_post_meta' );

/**
 * Delete item from queue when post is published
 *
 * @param int $post_id Not used
 * @return void
 */
function guruq_delete_from_queue( $post_id ) {
	$parts = parse_url( $_SERVER['HTTP_REFERER'] );
	$q = wp_parse_args( $parts['query'] );

	$option = get_option( $q['guruq'] );
	if ( !empty( $option->author_email ) ) {
		guruq_notify_user( $post_id, $option->author_email );
	}

	if ( isset( $q['guruq'] ) ) {
		delete_option( $q['guruq'] );
	}
}
add_action( 'publish_post', 'guruq_delete_from_queue' );

/**
 * Send notification email to question author
 *
 * @param int $post_id
 * @param string $email
 * @return void
 */
function guruq_notify_user( $post_id, $email ) {
	$permalink = get_permalink( $post_id );
	$message = '';
	$message .= __( 'Your question has been answered:' ) . "\n\r";
	$message .= $permalink;
	wp_mail( $email, __( 'The Guru has answered your question' ), $message );
}

function guruq_bulk_delete() {
	if ( 'delete' == $_POST['bulk_action'] ) {
		$keys = $_POST['bulk'];

		foreach ( (array) $keys as $key ) {
			delete_option( $key );
		}
	}
}
if ( isset( $_POST['action'] ) && 'bulk_action' == $_POST['action'] ) {
	guruq_bulk_delete();
}

function get_guruq_title() {
	$options = get_option( 'gq_options' );
	if ( false === $options )
		$options['gq_title'] = 'Ask the Guru';

	if ( isset( $options['gq_title'] ) && !empty( $options['gq_title'] ) )
		return $options['gq_title'];
}

function get_guruq_description() {
	$options = get_option( 'gq_options' );
	if ( false === $options )
		$options['gq_description'] = 'Ask me a question.';

	if ( isset( $options['gq_description'] ) && !empty( $options['gq_description'] ) )
		return $options['gq_description'];
}

function gq_show_featured() {
	$options = get_option( 'gq_options' );
	if ( isset( $options['gq_show_featured'] ) && 1 == (int) $options['gq_show_featured'] )
		return true;

	return false;
}
