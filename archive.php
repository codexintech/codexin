<?php get_header(); ?>

<div id="content" class="section site-content match-height">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-8">
				<main id="primary" class="site-main">
					<?php if ( have_posts() ) : ?>
						<?php
						while ( have_posts() ) :
							the_post();
							?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
							<div class="image-featured">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>

						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-meta">	
							<div class="post-cats"><i class="fa fa-tag"></i><?php the_category( ', ' ); ?></div>
							<div class="post-time"><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></div>
						</div>
						<div class="post-excerpt"><?php the_excerpt(); ?></div>

							<?php if ( ! is_single() ) : ?>
								<div class="read-more">
									<a href="<?php the_permalink(); ?>"> <?php _e( 'Read More', 'codexin' ); ?></a>
								</div>
						<?php endif; ?>

							<?php if ( has_tag() ) : ?>

								<div class="post-tag">
									<?php the_tags( 'Tags: &nbsp;', ' ', '' ); ?>
								</div>
						<?php endif; ?>

					</div> <!-- end of .post-item -->

					<?php endwhile ?>
					<?php else : ?>

						<?php // No posts to display ?>

					<?php endif ?>

				</main> <!-- end of #primary -->

					<?php codexin_posts_navigation(); ?>
			</div><?php // .col-sm-9 ?>

			<div class="col-sm-3 col-md-3 col-md-offset-1">
				<aside id="secondary" class="widget-area">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
