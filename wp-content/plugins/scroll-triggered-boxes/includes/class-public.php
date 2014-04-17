<?php
if( ! defined("STB_VERSION") ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

class STB_Public {
	private $matched_box_ids = array();

	public function __construct() {
		add_action( 'wp', array( $this, 'filter_boxes' ) );
		add_action( 'init', array( $this, 'register_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ) );
		add_action( 'wp_footer', array( $this, 'load_boxes' ), 1 );

		add_filter( 'stb_content', 'wptexturize') ;
		add_filter( 'stb_content', 'convert_smilies' );
		add_filter( 'stb_content', 'convert_chars' );
		add_filter( 'stb_content', 'wpautop' );
		add_filter( 'stb_content', 'shortcode_unautop' );
		add_filter( 'stb_content', 'do_shortcode', 11 );
	}

	public function filter_boxes() {
		$rules = get_option( 'stb_rules' );

		if ( !$rules ) { return; }

		foreach ( $rules as $box_id => $box_rules ) {

			$matched = false;

			foreach ( $box_rules as $rule ) {

				$condition = $rule['condition'];
				$value = trim( $rule['value'] );

				if ( $condition != 'manual' ) {
					$value = array_filter( array_map( 'trim', explode( ',', $value ) ) );
				}

				switch ( $condition ) {
				case 'everywhere';
					$matched = true;
					break;

				case 'is_post_type':
					$matched = in_array( get_post_type(), $value );
					break;

				case 'is_single':
					$matched = is_single( $value );
					break;

				case 'is_page':
					$matched = is_page( $value );
					break;

				case 'is_not_page':
					$matched = !is_page( $value );
					break;

				case 'manual':
					// eval for now...
					$value = stripslashes(trim($value));
					$matched = eval( "return (" . $value . ");" );
					break;

				}

				// no need to run through the other rules
				// if criteria has already been met by this rule
				if($matched) { break; }
			}

			$matched = apply_filters('stb_show_box', $matched, $box_id);

			// if matched, box should be loaded on this page
			if ( $matched ) {
				$this->matched_box_ids[] = $box_id;
			}

		}

	}

	public function register_scripts() {

		// stylesheets
		wp_register_style( 'scroll-triggered-boxes', STB_PLUGIN_URL . 'assets/css/styles.css', array(), STB_VERSION );

		// scripts
		wp_register_script( 'scroll-triggered-boxes', STB_PLUGIN_URL . 'assets/js/script.js', array( 'jquery' ), STB_VERSION, true );
	}

	public function load_styles() {
		wp_enqueue_style('scroll-triggered-boxes');
	}

	public function load_boxes() {
		if ( empty( $this->matched_box_ids ) ) { return; }

		wp_enqueue_script('scroll-triggered-boxes');
		?><!-- Scroll Triggered Boxes v<?php echo STB_VERSION; ?> - http://wordpress.org/plugins/scroll-triggered-boxes/--><?php

		foreach ( $this->matched_box_ids as $box_id ) {

			$box = get_post( $box_id );

			if ( !$box || $box->post_status != 'publish' ) { continue; }

			$opts = stb_get_box_options( $box->ID );
			$css = $opts['css'];
			$content = $box->post_content;

			// run filters
			$content = apply_filters( 'stb_content', $content, $box );
			$auto_hide_small_screens = apply_filters('stb_auto_hide_small_screens', true, $box );
?>
			<style type="text/css">
				#stb-<?php echo $box->ID; ?> {
					background: <?php echo ( !empty( $css['background_color'] ) ) ? $css['background_color'] : 'white'; ?>;
					<?php if ( !empty( $css['color'] ) ) { ?>color: <?php echo $css['color']; ?>;<?php } ?>
					<?php if ( !empty( $css['border_color'] ) && !empty( $css['border_width'] ) ) { ?>border: <?php echo $css['border_width'] . 'px' ?> solid <?php echo $css['border_color']; ?>;<?php } ?>
					width: <?php echo ( !empty( $css['width'] ) ) ? absint( $css['width'] ) . 'px': 'auto'; ?>;
				}

				<?php if($auto_hide_small_screens) { ?>
					@media(max-width: <?php echo ( !empty( $css['width'] ) ) ? ( absint($css['width']) + 150): '719'; ?>px) {
						#stb-<?php echo $box->ID; ?> { display: none !important; }
					}
				<?php } ?>
			</style>
			<div class="scroll-triggered-box stb stb-<?php echo esc_attr( $opts['css']['position'] ); ?>" id="stb-<?php echo $box->ID; ?>" style="display: none;" <?php
			?> data-box-id="<?php echo esc_attr( $box->ID ); ?>" data-trigger="<?php echo esc_attr( $opts['trigger'] ); ?>"
			 data-trigger-percentage="<?php echo esc_attr( absint( $opts['trigger_percentage'] ) ); ?>" data-trigger-element="<?php echo esc_attr( $opts['trigger_element'] ); ?>" 
			 data-animation="<?php echo esc_attr($opts['animation']); ?>" data-cookie="<?php echo esc_attr( absint ( $opts['cookie'] ) ); ?>" data-test-mode="<?php echo esc_attr($opts['test_mode']); ?>" 
			 data-auto-hide="<?php echo esc_attr($opts['auto_hide']); ?>">
				<div class="stb-content"><?php echo $content; ?></div>
				<span class="stb-close">&times;</span>
			</div>
			<?php
		}

		?><!-- / Scroll Triggered Box --><?php
	}


}
