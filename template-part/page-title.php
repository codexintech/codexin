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

?>

<div id="page_title" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><span><?php echo $title ?></span></h1>	
			</div>
		</div>
	</div>
</div>