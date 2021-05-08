<?php get_header(); ?>

<div id="content" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12">
				<main id="primary" class="site-main">
					<div class="row">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								?>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-half">
									<article id="post-<?php echo get_the_ID(); ?>" <?php post_class( 'mn-blog-post' ); ?>>
										<div class="inner">
											<div class="post-media">
												<a href="<?php echo get_the_permalink(); ?>">
													<?php the_post_thumbnail( 'mn-archive-thumbnail' ); ?>
												</a>
											</div>
											<div class="post-content">
												<div class="post-title">
													<h5><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
												</div>
												<div class="more-button">
													<a href="<?php echo get_the_permalink(); ?>" class="read-more">
														<span>Read More <i class="fas fa-arrow-right"></i></span>
													</a>
												</div>
											</div>
										</div>
									</article>
								</div>

								<?php
							}
						} else {
							// Nothing to display.
						}
						?>
					</div>
				</main> <!-- end of #primary -->

				<?php
				codexin_numbered_posts_nav();
				?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
