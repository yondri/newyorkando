<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

get_header(); ?>
	<div id="main-top">
		<?php get_template_part( 'subscribe' ); ?>
	</div>
	<div id="main" class="clear">
		<div id="content">
			<div class="post single">
				<h1 class="title"><?php _e( '404: Page Not Found', 'traction' ); ?></h1>
				<div class="entry single">
					<p><?php _e( 'We are terribly sorry, but the URL you typed no longer exists. It might have been moved or deleted, or perhaps you mistyped it. We suggest searching the site:', 'traction' ); ?></p>
					<?php get_search_form(); ?>
				</div><!--end entry-->
			</div><!--end post-->
		</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>