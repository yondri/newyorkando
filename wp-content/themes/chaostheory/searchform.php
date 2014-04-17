<form id="searchform" method="get" action="<?php bloginfo('url') ?>">
	<div>
		<input id="s" name="s" type="text" value="<?php the_search_query(); ?>" size="40" />
		<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php esc_attr_e( 'Search &raquo;', 'chaostheory' ); ?>" />
	</div>
</form>