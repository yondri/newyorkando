<?php get_header() ?>

	<div id="container">
		<div id="content" class="hfeed">

<?php if (have_posts()) : ?>

		<h2 class="page-title"><?php _e('Search Results for:', 'chaostheory') ?> <?php the_search_query(); ?></h2>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__('&laquo; Older posts', 'chaostheory')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts &raquo;', 'chaostheory')) ?></div>
			</div>

<?php while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<div class="entry-meta">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent link to %s', 'chaostheory' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title() ?></a></h2>
					<ul>
						<li class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s &#8211; %2$s', 'chaostheory'), the_date('', '', '', false), get_the_time()) ?></abbr></li>
						<!-- <li class="entry-author author vcard"><?php printf(__('By %s', 'chaostheory'), '<a class="url fn" href="'.get_author_link(false, $authordata->ID, $authordata->user_nicename).'" title="View all posts by ' . $authordata->display_name . '">'.get_the_author().'</a>') ?></li> -->
						<li class="entry-category"><?php printf(__('Posted in %s', 'chaostheory'), get_the_category_list(', ')) ?></li>
						<?php the_tags('<li class="entry-tags">'.__('Tagged').' ', ", ", "</li>\n") ?>
<?php edit_post_link(__('Edit', 'chaostheory'), "\t\t\t\t\t<li class='entry-editlink'>", "</li>"); ?>
						<li class="entry-commentlink"><?php comments_popup_link(__('Leave a Comment', 'chaostheory'), __('Comments (1)', 'chaostheory'), __('Comments (%)', 'chaostheory')) ?></li>
					</ul>
				</div>
				<div class="entry-content">
<?php the_content('<span class="more-link">'.__('Read More &raquo;', 'chaostheory').'</span>'); ?>

				</div>
			</div><!-- .post -->

<?php endwhile; ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__('&laquo; Older posts', 'chaostheory')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts &raquo;', 'chaostheory')) ?></div>
			</div>

<?php else : ?>

			<div id="post-0" class="post">
				<h2 class="entry-title"><?php _e('Nothing Found', 'chaostheory') ?></h2>
				<div class="entry-content">
					<p class="search-error"><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'chaostheory') ?></p>
				</div>
			</div>
			<form id="searchform" method="get" action="<?php bloginfo('url') ?>">
				<div>
					<input id="s" name="s" type="text" value="<?php the_search_query(); ?>" tabindex="1" size="40" />
					<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php esc_attr_e( 'Search &raquo;', 'chaostheory' ); ?>" tabindex="2" />
				</div>
			</form>

<?php endif; ?>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
