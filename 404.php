<?php get_header() ?>

<div id="content" class="section site-content match-height">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<main id="primary" class="site-main text-center">
					<h2 class="something-missing"><?php _e('The page you are trying to access does not exist. ','codexin');?></h2>
					<p><?php _e('Please use the menu above to locate what you are searching for. Or you can try searching with a keyword below: ','codexin');?></p>
					<?php get_search_form(); ?>
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>