<form role="search" method="get" class="input-group" action="<?php echo home_url('/'); ?>">
	<input type="search" class="form-control" placeholder="<?php _e('Search...','codexin');?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php _e('Search...','codexin');?> " />
	<input type="submit" class="submit-button" value="<?php _e('Search','codexin');?>">
</form>