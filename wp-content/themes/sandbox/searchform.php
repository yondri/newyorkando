<form id="searchform" method="get" action="<?php bloginfo('url') ?>">
	<div>
		<input id="s" name="s" type="text" value="<?php the_search_query(); ?>" size="40" />
		<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search &raquo;', 'sandbox') ?>" />
	</div>
</form>