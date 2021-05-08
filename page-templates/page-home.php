<?php // Template Name: Template - Home Page ?>
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

						<!-- About Section -->
						<?php
						$about_title = get_field( 'mnursing_home_about_headline' );
						$about_text  = get_field( 'mnursing_home_about_text' );
						?>
						<section class="home-about mt-full mb-full">
							<div class="container">
								<div class="row align-items-center">
									<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-6 left-col">
										<?php
										echo do_shortcode( '[mnursing_section_title title="' . $about_title . '"]' );

										echo '<div class="about-content">';
											echo apply_filters( 'the_content', $about_text );
										echo '</div>';
										?>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6 right-col">
										<div class="highlights-wrapper">
											<div class="about-media bg-image bg-image-cover rellax"></div>
											<div class="inner">
												<?php
												if ( have_rows( 'mnursing_home_highlights' ) ) {
													while ( have_rows( 'mnursing_home_highlights' ) ) {
														the_row();
														echo do_shortcode( '[mnursing_icon_box image="' . get_sub_field( 'icon' ) . '" text="' . get_sub_field( 'text' ) . '"]' );
													}
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- CTA Section -->
						<?php
						$cta_left  = get_field( 'mnursing_home_cta_left' );
						$cta_right = get_field( 'mnursing_home_cta_right' );
						?>
						<section class="home-cta pt-full pb-full pos-r">
							<div class="container">
								<div class="cta-top-shape"></div>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="cta-left">
											<div class="cta-wrapper">
												<div class="cta-media">
													<?php
													$image_size = 'full';
													$alt_text   = trim( wp_strip_all_tags( get_post_meta( $cta_left['image'], '_wp_attachment_image_alt', true ) ) );

													echo wp_get_attachment_image(
														$cta_left['image'],
														$image_size,
														false,
														array(
															'class'     => 'cta-image',
															'alt'       => esc_attr( $alt_text ),
														)
													);
													?>
												</div>
												<div class="cta-body">
													<div class="cta-title text-center">
														<h3><?php echo $cta_left['headline']; ?></h3>
													</div>
													<div class="cta-content">
														<?php echo wpautop( $cta_left['text'] ); ?>
													</div>
													<?php
													if ( ! empty( $cta_left['button'] ) ) {
														?>
														<div class="cta-button text-center mt-40">
															<a class="mn-btn primary-btn with-shadow" href="<?php echo $cta_left['button']['url']; ?>" target="<?php echo $cta_left['button']['target']; ?>"><?php echo $cta_left['button']['title']; ?></a>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="cta-right">
											<div class="cta-wrapper">
												<div class="cta-media">
													<?php
													$image_size = 'full';
													$alt_text   = trim( wp_strip_all_tags( get_post_meta( $cta_right['image'], '_wp_attachment_image_alt', true ) ) );

													echo wp_get_attachment_image(
														$cta_right['image'],
														$image_size,
														false,
														array(
															'class'     => 'cta-image',
															'alt'       => esc_attr( $alt_text ),
														)
													);
													?>
												</div>
												<div class="cta-body">
													<div class="cta-title text-center">
														<h3><?php echo $cta_right['headline']; ?></h3>
													</div>
													<div class="cta-content">
														<?php echo wpautop( $cta_right['text'] ); ?>
													</div>
													<?php
													if ( ! empty( $cta_right['button'] ) ) {
														?>
														<div class="cta-button text-center mt-40">
															<a class="mn-btn secondary-btn with-shadow" href="<?php echo $cta_right['button']['url']; ?>" target="<?php echo $cta_right['button']['target']; ?>"><?php echo $cta_right['button']['title']; ?></a>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="cta-bottom-shape"></div>
							</div>
						</section>

						<!-- Logos Section -->
						<?php
						$logo_title   = get_field( 'mnursing_home_logos_headline' );
						$logos        = get_field( 'mnursing_home_logos' );
						$logos_button = get_field( 'mnursing_home_logo_button' );
						?>
						<section class="home-logos">
							<div class="container">
								<div class="row">
									<div class="col-12 col-sm-8 offset-sm-2">
										<?php
										echo do_shortcode( '[mnursing_section_title title="' . $logo_title . '" align="center"]' )
										?>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="logos-container">
											<div class="inner">
											<?php
											foreach ( $logos as $logo ) {
												echo '<div class="logos-col">';
													echo do_shortcode( '[mnursing_icon_box_circle image="' . $logo . '"]' );
												echo '</div>';
												echo '<div class="logos-col placeholder"></div>';
											}
											?>
											</div>
										</div>
									</div>
									<div class="col-12 text-center">
										<div class="logos-button">
											<a class="mn-btn primary-btn with-shadow" href="<?php echo $logos_button['url']; ?>" target="<?php echo $logos_button['target']; ?>"><?php echo $logos_button['title']; ?></a>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Roles Section -->
						<?php
						$roles_title  = get_field( 'mnursing_home_roles_headline' );
						$roles_button = get_field( 'mnursing_home_roles_button' );
						$roles        = get_field( 'mnursing_home_roles' );
						$roles_count  = count( $roles ) < 4 ? ' first-col-full' : '';
						?>
						<section class="home-roles pt-full pb-full mb-0 pos-r">
							<div class="container">
								<div class="roles-top-shape"></div>
								<div class="row align-items-center">
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<?php
										echo do_shortcode( '[mnursing_section_title title="' . $roles_title . '"]' );
										?>
										<div class="roles-button d-none d-lg-block">
											<a class="mn-btn primary-btn with-shadow" href="<?php echo $roles_button['url']; ?>" target="<?php echo $roles_button['target']; ?>"><?php echo $roles_button['title']; ?></a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6 roles-col-wrapper">
										<div class="inner<?php echo $roles_count; ?>">
										<?php
										if ( have_rows( 'mnursing_home_roles' ) ) {
											while ( have_rows( 'mnursing_home_roles' ) ) {
												the_row();
												echo '<div class="roles-col">';
												echo do_shortcode( '[mnursing_icon_box_circle image="' . get_sub_field( 'icon' ) . '" text="' . get_sub_field( 'role_name' ) . '" link="' . $roles_button['url'] . '"]' );
												echo '</div>';
											}
										}
										?>
										</div>
										<div class="roles-button d-block d-lg-none mb-half">
											<a class="mn-btn primary-btn with-shadow" href="<?php echo $roles_button['url']; ?>" target="<?php echo $roles_button['target']; ?>"><?php echo $roles_button['title']; ?></a>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Latest Blog Section -->
						<?php
						$blog_title  = get_field( 'mnursing_home_blog_headline' );
						$blog_button = get_field( 'mnursing_home_blog_button' );
						?>
						<section class="home-blog bgc-offset pb-full mb-0">
							<div class="container pos-r">
								<div class="multi-dots rellax"></div>
								<div class="row">
									<div class="col-12 col-sm-8 offset-sm-2">
										<?php
										echo do_shortcode( '[mnursing_section_title title="' . $blog_title . '" align="center"]' );
										?>
									</div>
								</div>
								<div class="row blog-row justify-content-center">
									<?php
									echo do_shortcode( '[mnursing_latest_posts per_page="3"]' );
									?>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="blog-button mt-40 text-center">
											<a class="mn-btn primary-btn with-shadow" href="<?php echo $blog_button['url']; ?>" target="<?php echo $blog_button['target']; ?>"><?php echo $blog_button['title']; ?></a>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Testimonials Section -->
						<?php
						$testi_title = get_field( 'mnursing_home_testimonials_headline' );
						$testi_image = get_field( 'mnursing_home_testimonials_image' );
						?>
						<section class="home-testimonials pb-full mb-0 bgc-offset">
							<div class="container">
								<div class="row">
									<div class="col-12 col-sm-10 offset-sm-1">
										<?php
										echo do_shortcode( '[mnursing_section_title title="' . $testi_title . '" align="center"]' );
										?>
									</div>
								</div>

								<div class="row align-items-center">
									<div class="col-12 col-md-5">
										<div class="testimonial-bg bg-image bg-image-cover"></div>
										<div class="tesitmonial-left-image pos-r">
											<?php
											$image_size = 'full';
											$alt_text   = trim( wp_strip_all_tags( get_post_meta( $testi_image, '_wp_attachment_image_alt', true ) ) );

											echo wp_get_attachment_image(
												$testi_image,
												$image_size,
												false,
												array(
													'class'     => 'wp-post-image',
													'alt'       => esc_attr( $alt_text )
												)
											);
											?>
										</div>
									</div>
									<div class="col-12 col-md-7">
										<div class="testimonial-wrapper">
											<?php
											echo do_shortcode( '[mnursing_testimonials]' );
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
