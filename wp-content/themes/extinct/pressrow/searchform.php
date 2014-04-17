<form method="get" id="search_form" action="<?php bloginfo('url'); ?>/">
	<p style="margin-bottom: 5px;"><input type="text" class="text_input" value="<?php the_search_query(); ?>" name="s" id="s" /></p>
	<p style="margin-bottom: 0;"><input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search' ); ?>" /></p>
</form>
