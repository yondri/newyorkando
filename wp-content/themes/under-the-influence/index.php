<?php
/**
 * @package WordPress
 * @subpackage Under_the_Influence
 */

get_header(); ?>
<div id="content_container">
<?php get_sidebar(); ?>
	<?php if (have_posts()) : ?>
		<div id="content" class="mainpage">
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="date"><?php the_time(get_option('date_format')) ?></div>
				<h2>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permalink to ', 'uti_theme'); the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<?php
					/* If author is shown */
					if ($author == "on"){
				?>
				<span class="author"><?php _e('by ', 'uti_theme'); the_author() ?></span>
				<?php
					}
				?>
				<div class="entry">
					<?php the_content(__('read more &raquo;', 'uti_theme')); ?>
				</div>

				<p class="postmetadata">
					<?php _e('Posted in ', 'uti_theme'); the_category(', ') ?> |
					<?php edit_post_link(__('Edit', 'uti_theme'), '', ' | '); ?>
					<?php comments_popup_link(__('Leave a Comment &#187;', 'uti_theme'), __('1 Comment &#187;', 'uti_theme'), __('% Comments &#187;', 'uti_theme')); ?>
				</p>
				<div class="tags">
					<?php the_tags(__('Tags: ', 'uti_theme'), ', ', '<br />'); ?>
				</div>
				<div class="ornament"></div>
			</div>
		<?php endwhile; ?>
		</div><!--#content-->

		<div class="navigation_box">
	  		<div class="navigation">
				<?php next_posts_link(__('&laquo; Older Entries', 'uti_theme')) ?>
				<?php previous_posts_link(__('Newer Entries &raquo;', 'uti_theme')) ?>
			</div><!--.navigation-->
		</div><!--.navigation_box-->
	<?php else : ?>
		<!-- no posts found -->
		<div class="center">
			<h2>
				<?php _e('Not found', 'uti_theme')?>
			</h2>
			<p>
				<?php _e('Sorry, but you are looking for something that isn&rsquo;t here.', 'uti_theme')?>
			</p>
			<?php get_search_form(); ?>
		</div><!--.center-->
	<?php endif; ?>
</div><!--#content_container-->


<?php get_footer(); ?>