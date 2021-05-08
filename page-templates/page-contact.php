<?php // Template Name: Template - Contact Page ?>
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

						<!-- Contact Details -->
						<?php
						$email     = get_field( 'mnursing_footer_email', 'option' );
						$phone     = get_field( 'mnursing_footer_phone', 'option' );
						$phone_url = get_field( 'mnursing_footer_phone_url', 'option' );
						$socials   = get_field( 'mnursing_footer_socials', 'option' );
						?>
						<section class="contact-section">
							<div class="container">
								<div class="row">
									<div class="col-12 contact-col">
										<div class="row align-items-center">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6">
												<div class="contact-details">
													<div class="contact-content">
														<ul>
															<?php
															if ( ! empty( $email ) ) {
																?>
																<li>
																	<a href="mailto:<?php echo $email; ?>">
																		<?php
																		$email_icon = get_template_directory_uri() . '/images/email.svg';
																		echo '<img src="' . $email_icon . '" alt="Email">';
																		?>
																		<span><?php echo $email; ?></span>
																	</a>
																</li>
																<?php
															}

															if ( ! empty( $phone ) ) {
																?>
																<li>
																	<?php
																	echo ! empty( $phone_url ) ? '<a href="tel:' . $phone_url . '">' : '';
																	$phone_icon = get_template_directory_uri() . '/images/phone.svg';
																	echo '<img src="' . $phone_icon . '" alt="phone">';
																	?>
																	<span><?php echo $phone; ?></span>
																	<?php
																	echo ! empty( $phone_url ) ? '</a>' : '';
																	?>
																</li>
																<?php
															}
															?>
														</ul>
													</div>
												<?php
												if ( ! empty( $socials ) ) {
													?>
													<div class="contact-socials">
														<ul class="list-inline">
															<?php
															foreach ( $socials as $social ) {
																if ( ! empty( $social['social_link'] ) ) {
																	?>
																	<li class="list-inline-item">
																		<a target="_blank" href="<?php echo esc_url( $social['social_link'] ); ?>">
																			<i class="<?php echo esc_attr( $social['icon'] ); ?>"></i>
																		</a>
																	</li>
																	<?php
																}
															}
															?>
														</ul>
													</div>
													<?php
												}
												?>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6">
												<div class="contact-media-wrapper">
													<div class="contact-media bg-image bg-image-contain rellax" data-rellax-speed="-1"></div>
													<div class="contact-featured">
														<?php
														$image_size = 'full';
														$alt_text   = trim( wp_strip_all_tags( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) );

														echo wp_get_attachment_image(
															get_post_thumbnail_id(),
															$image_size,
															false,
															array(
																'class'     => 'contact-image',
																'alt'       => esc_attr( $alt_text ),
															)
														);
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Contact Form Section -->
						<?php
						$form_title = get_field( 'mnursing_contact_form_headline' );
						$form_id    = get_field( 'mnursing_contact_gravity_form' );
						?>
						<section class="contact-page-form pos-r mb-0 pb-full">
							<div class="container">
								<div class="contact-shape"></div>
								<div class="row">
									<div class="col-12">
										<div class="contact-form-wrapper">
											<div class="form-header text-center">
												<h2><?php echo $form_title; ?></h2>
											</div>
											<div class="form-content">
												<?php
												echo do_shortcode( '[gravityform id="' . $form_id . '" title="false" description="false"]' );
												?>
											</div>
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
