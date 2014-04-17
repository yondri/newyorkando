<?php


/**
 * GPAISRProfile class.
 */
class GPAISRProfile {


	/**
	 * __construct function.
	 *
	 * @access public
	 * @return \GPAISRProfile
	 * @since 0.6
	 */
	function __construct() {
		// Will show the field
		add_action( 'show_user_profile', array( $this, 'link_profile_fields' ) );
		add_action( 'edit_user_profile', array( $this, 'link_profile_fields' ) );

		// Will save the field
		add_action( 'personal_options_update', array( $this, 'link_profile_fields_save' ) );
		add_action( 'edit_user_profile_update', array( $this, 'link_profile_fields_save' ) );
	}


	/**
	 * link_profile_fields function.
	 * Displays the profile-field in the Authors Profile Page
	 *
	 * @access public
	 *
	 * @param mixed $user
	 *
	 * @since 0.6
	 *
	 * @return void
	 */
	function link_profile_fields( $user ) {
		?>

	<h3>Google Plus Author Link</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Google Plus Link</label></th>

			<td>
				<input type="text" name="gplus_link" id="gplus_link" value="<?php echo esc_attr( get_the_author_meta( 'gplus_link', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter the URL to your Google+ Profile.</span>
			</td>
		</tr>

	</table>
	<?php
	}


	/**
	 * link_profile_fields_save function.
	 * Saves the profile-field from the authors profile page
	 *
	 * @access public
	 *
	 * @param mixed $user_id
	 *
	 * @since 0.6
	 *
	 * @return void
	 */
	function link_profile_fields_save( $user_id ) {

		if( ! current_user_can( 'edit_user', $user_id ) )
			return false;

		update_user_meta( $user_id, 'gplus_link', $_POST['gplus_link'] );

	}


}