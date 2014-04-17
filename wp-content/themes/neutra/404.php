<?php
/**
 * @package WordPress
 * @subpackage Neutra
 */
get_header(); ?>

<div id="page">

	<div id="left">
		<div class="post">
			<h2 class="title">Nothing found here: An error occurred (404)</h2>
			<div class="postcontent">
				<p>Either we've changed a lot of things here or you <strong>mistyped</strong> the URL.</p>
				<p>You can <strong>search</strong>, see the <strong>archives</strong> and browse the <strong>categories</strong>.</p>
				<h3>Archives</h3>
				<ul class="browse">
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
				<h3>Categories</h3>
				<ul class="browse">
					<?php wp_list_categories( 'title_li=' ); ?>
				</ul>
			</div>
		</div><!-- /post -->
	</div><!-- /left -->

	<div id="right">
		<?php get_sidebar(); ?>
	</div><!-- /right -->

</div><!-- /page -->

<?php get_footer(); ?>