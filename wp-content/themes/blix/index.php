<?php get_header(); ?>

<!-- content ................................. -->
<div id="content">

<?php if ( have_posts() ) : ?>

<?php while (have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php ($post->post_excerpt != "")? the_excerpt() : the_content(); ?>

		<p class="info"><?php if ($post->post_excerpt != "") { ?><a href="<?php the_permalink(); ?>" class="more"><?php _e( 'Continue Reading', 'blix' ); ?></a><?php } ?>
   		<?php comments_popup_link( __( 'Add comment', 'blix' ), __( '1 comment', 'blix' ), __( '% comments', 'blix' ), __( 'commentlink', 'blix' ), ''); ?>
   		<em class="date"><?php the_time( get_option( 'date_format' ) ); ?><!-- at <?php the_time();  ?>--></em>
   		<!--<em class="author"><?php the_author(); ?></em>-->
   		<?php edit_post_link( __( 'Edit', 'blix' ), '<span class="editlink">', '</span>' ); ?>
   		</p>

	</div>


<?php endwhile; ?>

	<p>
		<span class="previous"><?php next_posts_link( __( 'Older Posts', 'blix' ) ); ?></span>
		<span class="next"><?php previous_posts_link( __( 'Newer Posts', 'blix' ) ); ?></span>
	</p>


<?php else : ?>

	<h2><?php _e( 'Not Found', 'blix' ); ?></h2>
	<p><?php _e( 'Sorry, but you are looking for something that isn&rsquo;t here.' ); ?></p>

<?php endif; ?>

</div> <!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
