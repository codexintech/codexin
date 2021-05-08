<?php
	$footer_logo         = get_field( 'mnursing_footer_logo', 'option' );
	$email               = get_field( 'mnursing_footer_email', 'option' );
	$phone               = get_field( 'mnursing_footer_phone', 'option' );
	$phone_url           = get_field( 'mnursing_footer_phone_url', 'option' );
	$footer_cpright      = get_field( 'mnursing_footer_copyright', 'option' );
?>

	<footer id="colophon">
		<div class="footer-top">
			<div class="container">
				<div class="row ">
					<div id="footer_left" class="col-12 col-sm-12 col-md-12 col-lg-7">
						<div class="footer-logo">
							<?php
							$image_size = 'full';
							$alt_text   = trim( wp_strip_all_tags( get_post_meta( $footer_logo, '_wp_attachment_image_alt', true ) ) );

							echo wp_get_attachment_image(
								$footer_logo,
								$image_size,
								false,
								array(
									'class' => 'footer-logo-image',
									'alt'   => esc_attr( $alt_text ),
								)
							);
							?>
						</div>
					</div>

					<div id="footer_right" class="col-12 col-sm-12 col-md-12 col-lg-5">
						<div class="footer-title">
							<h5>Contact Us</h5>
						</div>
						<div class="footer-content">
							<div class="footer-contact">
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
							if ( ! empty( $footer_socials ) ) {
								?>
								<div class="footer-socials">
									<ul class="list-inline">
										<?php
										foreach ( $footer_socials as $social ) {
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

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<p class="copyright"><?php echo $footer_cpright; ?></p>
					</div>
				</div>
			</div>
		</div>
	</footer> <!-- #colophon -->

	<?php
		echo '<!-- Go to Top Button at right bottom of the window screen -->';
		echo '<div id="toTop">';
			echo '<i class="fa fa-chevron-up"></i>';
		echo '</div>';
		echo '<!-- Go to Top Button finished-->';
	?>
</div> <!-- end of #whole -->

<?php wp_footer(); ?>

</body>
</html>
