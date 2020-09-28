<?php
if(is_home()):
	$title = ! empty( $blog_title ) ? $blog_title : __( 'Blog', 'codexin' );
elseif(is_archive()):
	$title = get_the_archive_title();
elseif(is_search()):
	$title = __('Search results for "','codexin') . get_search_query().'"';
elseif(is_404()):
	$title =  __('Page Not Found','codexin');
else:
	$title =  get_the_title();
endif;

get_page_title( $title );

?>
