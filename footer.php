<?php
	// $logo_type          	= codexin_get_option( 'cx_logo_type' );
	// $text_logo           = codexin_get_option( 'cx_text_logo' );
	// $image_logo         	= codexin_get_option( 'cx_image_logo' )['url'];

?>
	<footer id="footer">
		<div class="container">
			<div class="row ">
				<div id="footer_left" class="col-sm-6">		
					<div id="copyright_text">
						<span class="copyright-legal">
							<?php echo ! empty( codexin_get_option( 'cx_copyright' ) ) ? codexin_get_option( 'cx_copyright' ) : ''; ?>
						</span>
					</div> <!-- end of copyright -->
				</div>
				
				<div id="footer_right_center" class="col-sm-6">
					 <div class="socials-links">
						  <ul class="list-unstyled ">  	
							<?php
								$socials = array(
									'facebook'  => array(
										'img' => get_template_directory_uri() . '/images/facebook-logo.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-facebook' ) ),
									),
									'twitter'   => array(
										'img' => get_template_directory_uri() . '/images/twitter.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-twitter' ) ),
									),
									'youtube'   => array(
										'img' => get_template_directory_uri() . '/images/youtube.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-youtube' ) ),
									),

									'yelp'      => array(
										'img' => get_template_directory_uri() . '/images/yelp.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-yelp' ) ),
									),
									'linkedin'  => array(
										'img' => get_template_directory_uri() . '/images/linkedin.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-linkedin' ) ),
									),
									'pinterest' => array(
										'img' => get_template_directory_uri() . '/images/pinterest.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-pinterest' ) ),
									),
									'instagram' => array(
										'img' => get_template_directory_uri() . '/images/instagram.svg',
										'url' => wp_http_validate_url( codexin_get_option( 'codexin-instagram' ) ),
									),
								);
								$i = 0;
								foreach ( $socials as $key => $value ) {
									if ( ! empty( $value['url'] ) ) {
										$i = ++$i;
										?>
										<li><a href="<?php echo $value['url']; ?>" target="_blank" class="bg-<?php echo $key; ?>">
											<img src="<?php echo $value['img']; ?>" width="13">
										</a></li>
										<?php
									}
								}

								?>
							</ul>
					</div>
				</div>

			</div>
		</div>
	</footer> <!-- end of footer -->

	<?php
		$to_top = codexin_get_option( 'cx_totop' );
	if ( $to_top ) {
		echo '<!-- Go to Top Button at right bottom of the window screen -->';
		echo '<div id="toTop">';
			echo '<i class="fa fa-chevron-up"></i>';
		echo '</div>';
		echo '<!-- Go to Top Button finished-->';
	}
	?>
</div> <!-- end of #whole -->

<?php wp_footer(); ?>

</body>
</html>
