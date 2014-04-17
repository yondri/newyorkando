<?php

add_action( 'admin_init', 'andrea_theme_options_init' );
add_action( 'admin_menu', 'andrea_theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function andrea_theme_options_init(){
	register_setting( 'andrea_options', 'andrea_theme_options', 'andrea_theme_options_validate' );

	// set up default option values
	$defaults = array( 'layout_choice' => 'flexible-width' );
	if ( false === get_option( 'andrea_theme_options' ) )
		update_option( 'andrea_theme_options', $defaults );
}

/**
 * Load up the menu page
 */
function andrea_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'andrea_theme_options', 'andrea_theme_options_do_page' );
}

/**
 * Create options array
 */
$layout_options = array(
	'flexible-width' => array(
		'value' => 'flexible-width',
		'label' => __( 'Flexible-width Layout' ),
		'description' => __( 'Wide, flexible-width layout. Site width is fluid between a minimum width of <strong>900px</strong> and maximum width of <strong>1280px</strong>. Images in the main column have a maximum width of <strong>1000px</strong>.' )
	),
	'fixed-width' => array(
		'value' => 'fixed-width',
		'label' => __( 'Fixed-width Layout' ),
		'description' => __( 'Narrow, fixed-width layout. Site width is <strong>700px</strong> and the main column width is <strong>500px</strong>. Images in the main column have a maximum width of <strong>500px</strong>.' )
	)
);

/**
 * Create the options page
 */
function andrea_theme_options_do_page() {
	global $layout_options;
	
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved.' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'andrea_options' ); ?>
			<?php $options = get_option( 'andrea_theme_options' ); ?>

			<table class="form-table form-wrap">

				<tr valign="top"><th scope="row"><?php _e( 'Choose a layout option:' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Layout Options' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $layout_options as $option ) {
								$layout_setting = $options['layout_choice'];

								if ( '' != $layout_setting ) {
									if ( $options['layout_choice'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="andrea_theme_options[layout_choice]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <strong><?php echo $option['label']; ?></strong> &mdash; <span class="description"><?php echo $option['description']; ?></span></label>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function andrea_theme_options_validate( $input ) {
	global $layout_options;

	// Layout option must be in our array of options
	if ( ! isset( $input['layout_choice'] ) )
		$input['layout_choice'] = null;
	if ( ! array_key_exists( $input['layout_choice'], $layout_options ) )
		$input['layout_choice'] = null;

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/