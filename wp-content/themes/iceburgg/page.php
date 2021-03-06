<?php 

get_header();

?>

<div id="maincontent">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('post'); ?>>
    <h2><a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <div style="clear: both"></div>
    <div class="pb"><b class="postbitmed"> <b class="postbitmed1"><b></b></b> <b class="postbitmed2"><b></b></b> <b class="postbitmed3"></b> <b class="postbitmed4"></b> <b class="postbitmed5"></b> </b>
      <div class="postbitmed_content">
        <p><img src="<?php bloginfo('template_directory'); ?>/imgs/comments.gif" alt="<?php esc_attr_e( 'Comments Dropped', 'iceburgg' ); ?>" /> <a href="<?php comments_link(); ?>">
          <?php comments_number( __( 'leave a response', 'iceburgg' ), __( 'one response', 'iceburgg' ), __( '% responses', 'iceburgg' ) ); ?>
          </a></p>
		<p><?php edit_post_link( __( 'Edit', 'iceburgg' ), '', '' ); ?></p>
      </div>
      <b class="postbitmed"> <b class="postbitmed5"></b> <b class="postbitmed4"></b> <b class="postbitmed3"></b> <b class="postbitmed2"><b></b></b> <b class="postbitmed1"><b></b></b> </b></div>
    <div class="words">
	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
    </div>
    <div style="clear: both"></div>
    <?php endwhile; else: ?>
    <p>
      <?php _e( 'Sorry, no posts matched your criteria.', 'iceburgg' ); ?>
    </p>
    <?php endif; ?>
    <?php posts_nav_link(' &#8212; ', __( '&laquo; Previous Page', 'iceburgg' ), __( 'Next Page &raquo;', 'iceburgg') ); ?>
    <div style="clear: both"></div>
    <div id="cprespace"></div>
    <div style="clear: both"></div>
  	<?php if ('open' == $post->comment_status) : ?>
    <div class="sidecomments"> <b class="comrules"> <b class="comrules1"><b></b></b> <b class="comrules2"><b></b></b> <b class="comrules3"></b> <b class="comrules4"></b> <b class="comrules5"></b> </b>
      <div class="comrules_content">
        <p><?php _e( 'Leave a response and help improve reader response. All your responses
          matter, so say whatever you want. But please refrain from spamming
          and shameless plugs, as well as excessive use of vulgar language.', 'iceburgg' ); ?></p>
      </div>
      <b class="comrules"> <b class="comrules5"></b> <b class="comrules4"></b> <b class="comrules3"></b> <b class="comrules2"><b></b></b> <b class="comrules1"><b></b></b> </b> </div>
		<?php endif; ?>
    <?php comments_template(); ?>
    <div style="clear: both"></div>
  </div>
  <div style="clear: both"></div>
</div>
<?php get_footer(); ?>
