<?php get_header() ?>

	<div id="container">
		<div id="content" class="hfeed">

<?php the_post() ?>

<?php if ( is_day() ) : ?>
			<h2 class="page-title"><?php printf(__('Daily Archives: %s', 'chaostheory'), get_the_time('F jS, Y')) ?></h2>
<?php elseif ( is_month() ) : ?>
			<h2 class="page-title"><?php printf(__('Monthly Archives: %s', 'chaostheory'), get_the_time('F Y')) ?></h2>
<?php elseif ( is_year() ) : ?>
			<h2 class="page-title"><?php printf(__('Yearly Archives: %s', 'chaostheory'), get_the_time('Y')) ?></h2>
<?php elseif ( is_author() ) : ?>
			<h2 class="page-title"><?php $curauth = sandbox_get_author(); printf(__('Author Archives: %s', 'chaostheory'),  $curauth->display_name) ?></h2>
<?php elseif ( is_tag() ) : ?>
			<h2 class="page-title"><?php printf(__('Tag Archives: %s', 'chaostheory'), single_tag_title('', false)) ?></h2>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<h2 class="page-title"><?php _e('Blog Archives', 'chaostheory') ?></h2>
<?php endif; ?>

<?php rewind_posts() ?>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__('&laquo; Older posts', 'chaostheory')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts &raquo;', 'chaostheory')) ?></div>
			</div>

<?php while ( have_posts() ) : the_post(); ?>

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
<?php the_content('<span class="more-link">'.__('Read More &raquo;', 'chaostheory').'</span>') ?>

				</div>
			</div><!-- .post -->

<?php endwhile ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__('&laquo; Older posts', 'chaostheory')) ?></div>
				<div class="nav-next"><?php previous_posts_link(__('Newer posts &raquo;', 'chaostheory')) ?></div>
			</div>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
