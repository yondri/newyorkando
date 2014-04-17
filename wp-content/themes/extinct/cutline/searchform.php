<form method="get" id="search_form" action="<?php bloginfo('url'); ?>/">
<input type="text" class="search_input" value="<?php esc_attr_e( 'To search, type and hit enter','cutline'); ?>" name="s" id="s" onfocus="if (this.value == '<?php echo esc_js(__('To search, type and hit enter','cutline')); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_js(__('To search, type and hit enter','cutline')); ?>';}" />
<input type="hidden" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'cutline' ); ?>" />
</form>
