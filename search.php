<?php get_header(); ?>

<div id="content" class="section site-content match-height">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<main id="primary" class="site-main">
		
					<?php if ( have_posts() ) : ?>
					<h1 class="search-title something-missing"><?php printf( __( 'Search Results for: %s', 'codexin' ), '<span>"' . get_search_query() . '"</span>' ); ?></h1>
						<?php
						while ( have_posts() ) :
							the_post();
							?>
						<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
							<div class="post-single-content search-content">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="image-featured">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-grid-thumbnail' ); ?></a>
									</div>
								<?php endif; ?>
								<div class="post-details">
									<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="post-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
								</div>
									<!-- <div class="read-more">
										<a class="primary-btn enroll-btn" href="<?php // the_permalink(); ?>"> <?php // _e('Read More ','codexin'); ?></a>
									</div> -->
							</div>
						</div> <!-- end of .post-item -->

					<?php endwhile ?>
					<?php else : ?>

					<h2 class="search-title text-center"><?php _e( 'Nothing found for the search keyword "' . get_search_query() . '"', 'codexin' ); ?></h2>
					<p class="text-center"> <?php _e( 'Please use the menu above to locate what you are searching for. Or you can try searching with another keyword below:', 'codexin' ); ?> </p>
						<?php get_search_form(); ?>

					<?php endif ?>

				</main> <!-- end of #primary -->

					<?php codexin_posts_navigation(); ?>
			</div><?php // .col-xs-12 ?>
	
		</div><?php // #content .container .row ?>
	
	</div><?php // #content .container ?>

</div><?php // #content ?>

<?php get_footer(); ?>
