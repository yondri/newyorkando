<?php
add_action('admin_init', 'guruq_settings_init' );
add_action('admin_menu', 'guruq_settings_add_page');

// Add menu page
function guruq_settings_add_page() {
	add_submenu_page( GURUQ_SLUG, 'GuruQ Settings', 'Settings', 'manage_options', 'guruq-settings', 'gq_settings_page' );
}

// Init plugin options to white list our options
function guruq_settings_init() {
	register_setting( 'gq_options', 'gq_options', 'gq_options_validate' );
	add_settings_section( 'gq_main', 'GuruQ Settings', 'gq_section_text', 'guruq-settings' );
	add_settings_field( 'gq_title', 'GuruQ Title', 'gq_setting_title', 'guruq-settings', 'gq_main' );
	add_settings_field( 'gq_description', 'GuruQ Description', 'gq_setting_description', 'guruq-settings', 'gq_main' );
	add_settings_field( 'gq_show_featured', 'Show Featured Questions?', 'gq_setting_show_featured', 'guruq-settings', 'gq_main');
}

function gq_setting_title() {
	$options = get_option( 'gq_options' );
	if ( false === $options )
		$options['gq_title'] = 'Ask the Guru';
	echo "<input id='gq_title' name='gq_options[gq_title]' size='40' type='text' value='{$options['gq_title']}' />";
}

function gq_setting_description() {
	$options = get_option( 'gq_options' );
	if ( false === $options )
		$options['gq_description'] = 'Ask me a question.';
	echo "<input id='gq_description' name='gq_options[gq_description]' size='40' type='text' value='{$options['gq_description']}' />";
}

function gq_setting_show_featured() {
	$options = get_option( 'gq_options' );
	if ( false === $options )
		$options['gq_show_featured'] = 0;

	$checked = '';
	if ( 1 == (int) $options['gq_show_featured'] )
		$checked = " checked='checked' ";
	echo "<input name='gq_options[gq_show_featured]' type='checkbox' value='1' $checked />";
}

function gq_section_text() {  }

function gq_settings_page() {
?>
<div class="wrap">
<?php
	if ( isset( $_GET['updated'] ) && 'true' == $_GET['updated'] ) {
		echo '<div id="message" class="updated"><p>Settings saved.</p></div>';
		unset( $_GET['updated'] );
	}
?>
		<form method="post" action="options.php">
			<?php settings_fields( 'gq_options' ); ?>
			<?php do_settings_sections( 'guruq-settings' ); ?>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}

function gq_options_validate( $input ) {
	$input['gq_title'] = wp_filter_nohtml_kses( $input['gq_title'] );
	$input['gq_description'] = wp_filter_nohtml_kses( $input['gq_description'] );
	$input['gq_show_featured'] = (int) $input['gq_show_featured'];
	return $input;
}
