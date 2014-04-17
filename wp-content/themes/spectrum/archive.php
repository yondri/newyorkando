<?php
/**
 * @package WordPress
 * @subpackage Spectrum
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<div class="main-title"><h3>
		<?php if ( is_category() ) {
			/* If this is a category archive */
			printf( __( 'Archive for the &#8216;%1$s&#8217; Category', 'spectrum' ), single_cat_title( '', false ) );

		} elseif( is_tag() ) {
			/* If this is a tag archive */
			printf( __( 'Posts tagged &#8216;%1$s&#8217;', 'spectrum' ), single_tag_title( '', false ) );

		 } elseif ( is_day() ) {
			/* If this is a daily archive */
			printf( __( 'Archive for <span>%1$s</span>', 'spectrum' ), get_the_date() );

		} elseif ( is_month() ) {
			/* If this is a monthly archive */
			printf( __( 'Archive for <span>%1$s</span>', 'spectrum' ), get_the_date('F, Y') );

		} elseif ( is_year() ) {
			/* If this is a yearly archive */
			printf( __( 'Archive for <span>%1$s</span>', 'spectrum' ), get_the_date('Y') );

		} elseif ( is_author() ) {
			/* If this is an author archive */
			_e( 'Author Archive', 'spectrum' );

		} elseif ( isset($_GET[ 'paged' ] ) && !empty( $_GET[ 'paged' ] ) ) {
			/* If this is a paged archive */
			_e( 'Blog Archives', 'spectrum' );

		} ?>
		</h3></div>

		<?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="entry">
				<h3 class="result"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'spectrum' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
			<div class="post-meta post-category">
				<p class="post-category-title"><strong><?php _e( 'Category:', 'spectrum' ); ?></strong></p>
				<p class="post-category-elements"><?php the_category( ', ' ); ?></p>
			</div>
			<?php the_tags( '<div class="post-meta post-tags"><p><strong>' . __( 'Tagged with:', 'spectrum' ) . '</strong></p><ul><li>','</li><li>','</li></ul></div>'); ?>
		</div>

		<?php endwhile; ?>

	<?php else :

		echo '<div class="main-title"><h3>';

		if ( is_category() ) { // If this is a category archive
			printf( __( 'Sorry, but there aren&rsquo;t any posts in the %s category yet.', 'spectrum' ), single_cat_title( '', false ) );
		} elseif ( is_date() ) { // If this is a date archive
			_e( 'Sorry, but there aren&rsquo;t any posts with this date.', 'spectrum' );
		} elseif ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin( get_query_var( 'author_name' ) );
			printf( __( 'Sorry, but there aren&rsquo;t any posts by %s yet.', 'spectrum' ), $userdata->display_name );
		} else {
			_e( 'No posts found.', 'spectrum' );
		}

		echo '</h3></div>';

	endif;
?>

</div>

<?php get_sidebar(); ?>

<div id="navigation">
	<p id="prev-page"><?php next_posts_link( __( 'Older Posts', 'spectrum' ) ); ?></p>
	<p id="next-page"><?php previous_posts_link( __( 'Newer Posts', 'spectrum' ) ); ?></p>
</div>

<?php get_footer(); ?>