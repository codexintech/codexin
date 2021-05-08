<?php // Template Name: Template - About Page ?>
<?php get_header(); ?>

<div id="content" class="site-content">
	<div id="home">
		<main id="primary" class="site-main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

					<div id="page-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'page-entry-content' ) ); ?>>
						<?php
						the_content();
						?>

						<!-- About Top Section -->
						<?php
						$top_image = get_field( 'mnursing_about_top_image' );
						$top_title = get_field( 'mnursing_about_top_headline' );
						$top_text  = get_field( 'mnursing_about_top_text' );
						?>
						<section class="about-top about-cols mb-full">
							<div class="container">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 left-col order-1 order-lg-2 order-xl-2">
										<div class="text-wrapper text-right-col">
											<?php
											echo do_shortcode( '[mnursing_section_title title="' . $top_title . '"]' );

											echo '<div class="about-content">';
												echo apply_filters( 'the_content', $top_text );
											echo '</div>';
											?>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6 right-col order-2 order-lg-1 order-xl-1">
										<div class="about-top-bg bg-image bg-image-cover rellax" data-rellax-speed="-2"></div>
										<div class="img-wrapper">
										<?php
										$image_size = 'full';
										$alt_text   = trim( wp_strip_all_tags( get_post_meta( $top_image, '_wp_attachment_image_alt', true ) ) );

										echo wp_get_attachment_image(
											$top_image,
											$image_size,
											false,
											array(
												'class' => 'about-image',
												'alt'   => esc_attr( $alt_text ),
											)
										);
										?>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- About Bottom Section -->
						<?php
						$bottom_image = get_field( 'mnursing_about_bottom_image' );
						$bottom_title = get_field( 'mnursing_about_bottom_headline' );
						$bottom_text  = get_field( 'mnursing_about_bottom_text' );
						?>
						<section class="about-bottom about-cols pt-full pb-full mb-0 pos-r">
							<div class="container">
								<div class="about-bottom-shape"></div>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 left-col">
										<div class="text-wrapper text-left-col">
											<?php
											echo do_shortcode( '[mnursing_section_title title="' . $bottom_title . '"]' );

											echo '<div class="about-content">';
												echo apply_filters( 'the_content', $bottom_text );
											echo '</div>';
											?>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6 right-col">
										<div class="about-bottom-bg bg-image bg-image-cover rellax" data-rellax-speed="-1"></div>
										<div class="img-wrapper img-right">
										<?php
										$image_size = 'full';
										$alt_text   = trim( wp_strip_all_tags( get_post_meta( $bottom_image, '_wp_attachment_image_alt', true ) ) );

										echo wp_get_attachment_image(
											$bottom_image,
											$image_size,
											false,
											array(
												'class' => 'about-image',
												'alt'   => esc_attr( $alt_text ),
											)
										);
										?>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div><!-- #page-## -->

					<?php

				endwhile;
			else :
				// No posts to display
			endif;
			?>
		</main> <!-- end of #primary -->
	</div> <!-- end of #home -->
</div><?php // #content ?>
<?php get_footer(); ?>
