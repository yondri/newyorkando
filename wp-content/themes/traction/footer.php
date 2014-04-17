<?php
/**
 * @package WordPress
 * @subpackage Traction
 */
?>
	</div><!--end main-->
	<div id="main-bottom"></div>
</div><!--end wrapper-->
<div id="footer">
	<div class="wrapper clear">
		<?php if ( is_active_sidebar( 'footer_sidebar' ) ) : ?>
		<div class="footer-column first">
			<ul>
				<?php dynamic_sidebar( 'footer_sidebar' ); ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer_sidebar_2' ) ) : ?>
		<div class="footer-column second">
			<ul>
				<?php dynamic_sidebar( 'footer_sidebar_2' ); ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer_sidebar_3' ) ) : ?>
		<div class="footer-column third">
			<ul>
				<?php dynamic_sidebar( 'footer_sidebar_3' ); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div><!--end wrapper-->
</div><!--end footer-->
<div id="copyright" class="wrapper">
	<a href="http://wordpress.org/" rel="generator">Proudly powered by WordPress</a> <?php printf( __( 'Theme: %1$s by %2$s.', 'traction' ), 'Traction', '<a href="http://thethemefoundry.com/traction/" rel="designer">The Theme Foundry</a>' ); ?>
</div><!--end copyright-->
<?php wp_footer(); ?>
</body>
</html>