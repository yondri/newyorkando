<?php
/**
 * @package WordPress
 * @subpackage Traction
 */

get_header(); ?>
	<div id="main-top">
		<?php /* If this is a category archive */ if ( is_category() ) { ?>
			<h4><?php printf( __( 'Posts from the &#8220;%s&#8221; Category', 'traction' ), single_cat_title( '', false ) ); ?></h4>
		<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
			<h4><?php printf( __( 'Posts tagged &#8220;%s&#8221;', 'traction' ), single_tag_title( '', false ) ); ?></h4>
		<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
			<h4><?php _e( 'Archive for', 'traction' ); ?> <?php the_time( __( 'F jS, Y', 'traction' ) ); ?></h4>
		<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
			<h4><?php _e( 'Archive for', 'traction' ); ?> <?php the_time( __( 'F, Y', 'traction' ) ); ?></h4>
		<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
			<h4><?php _e( 'Archive for', 'traction' ); ?> <?php the_time( __( 'Y', 'traction' ) ); ?></h4>
		<?php /* If this is an author archive */ } elseif ( is_author() ) { if ( isset( $_GET['author_name'] ) ) $current_author = get_userdatabylogin( $author_name ); else $current_author = get_userdata( intval( $author) );?>
			<h4><?php printf( __( 'Posts by %s', 'traction' ), $current_author->display_name ); ?></h4>
		<?php /* If this is a paged archive */ } elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) { ?>
			<h4><?php _e( 'Blog Archives', 'traction' ); ?></h4>
		<?php } ?>
		<?php get_template_part( 'subscribe' ); ?>
	</div>
	<div id="main" class="clear">
		<div id="content">
			<?php if (have_posts() ) : ?>
			<?php while (have_posts() ) : the_post(); ?>
				<?php $has_thumb = false; ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
					<div class="date">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<div class="day"><?php the_time( __( 'j' ) ); ?></div>
							<div class="month"><?php the_time( __( 'M', 'traction' ) ); ?></div>
						</a>
					</div>
					<?php if ( has_post_thumbnail() && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'index-thumb' ) ) && $image[1] >= '175' ) : ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'index-thumb', array( 'class' => 'index-post-thm alignleft border' ) ); ?></a>
						<?php $has_thumb = true; ?>
					<?php endif; ?>
					<div class="entry<?php if ( ! $has_thumb ) echo ' nothumb'; ?>">
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content( traction_read_more() ); ?>
						<?php edit_post_link( __( 'Edit', 'traction' ) ); ?>
						<?php wp_link_pages(); ?>
					</div><!--end entry-->
				</div><!--end post-->
			<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
				<div class="navigation index">
					<div class="alignleft"><?php next_posts_link( __( '&laquo; Older Entries', 'traction' ) ); ?></div>
					<div class="alignright"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'traction' ) ); ?></div>
				</div><!--end navigation-->
			<?php else : ?>
			<?php endif; ?>
		</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>