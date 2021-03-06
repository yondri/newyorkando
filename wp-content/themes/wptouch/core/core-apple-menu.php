<?php if (bnc_is_login_button_enabled()) { ?>
	<?php if (!is_user_logged_in()) { ?>
		    <a id="loginopen" class="top" href="#" onclick="bnc_jquery_login_toggle(); return false;"><?php _e( 'Login', 'wptouch' ); ?></a>	
	<?php } else { ?>
		    <a id="accountopen" class="top" href="#" onclick="bnc_jquery_acct_open(); return false;"><?php _e( 'My Account', 'wptouch' ); ?></a>	
	<?php } ?>
<?php } ?>

	<?php if (bnc_is_cats_button_enabled()) { ?>			    
    	<a id="catsopen" class="top" href="#" onclick="bnc_jquery_cats_open(); return false;"><?php _e( 'Categories', 'wptouch' ); ?></a>
	<?php } ?>

	<?php if (bnc_is_tags_button_enabled()) { ?>	
    	<a id="tagsopen" class="top" href="#" onclick="bnc_jquery_tags_open(); return false;"><?php _e( 'Tags', 'wptouch' ); ?></a>
	<?php } ?>

 <!-- #start the Categories Select List -->
	<form action="<?php bloginfo('url'); ?>/" id="select-cats" method="get">
<?php
	$select = wp_dropdown_categories('show_option_none=Select category:&show_count=1&orderby=name&echo=0');
	$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
	echo $select;
?>
	</form>

 <!-- #start the Tags Select List -->
<form id="select-tags" action="">
	<select id="tag-dropdown" name="tag-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value="">Select Tag:</option>
		<?php dropdown_tag_cloud('number=50&order=asc'); ?>
	</select>
</form>

 <!-- #start the Account Select List -->
<form id="select-acct" action="">	
	<select id="acct-dropdown" name="acct-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	<option value="#"><?php _e("My Account:", "wptouch"); ?></option>
			<?php if (current_user_can('edit_posts')) : ?>
				<option value="<?php bloginfo('wpurl'); ?>/wp-admin/"><?php _e("Admin", "wptouch"); ?></option>
			<?php endif; ?>
			<?php if (get_option('comment_registration')) { ?>
				<option value="<?php bloginfo('wpurl'); ?>/wp-register.php"><?php _e( "Register for this site", "wptouch" ); ?></option>
			<?php } ?>
			<?php if (is_user_logged_in()) { ?>
				<option value="<?php bloginfo('wpurl'); ?>/wp-admin/profile.php"><?php _e( "Account Profile", "wptouch" ); ?></option>
				<option value="<?php $version = (float)get_bloginfo('version'); if ($version >= 2.7) { ?><?php echo wp_logout_url($_SERVER['REQUEST_URI']); } else { bloginfo('wpurl'); ?>/wp-login.php?action=logout&redirect_to=<?php echo $_SERVER['REQUEST_URI']; ?><?php } ?>"><?php _e( "Logout", "wptouch" ); ?></option>	
			<?php } // End fancy iPhone stuff ?>
	</select>
</form>