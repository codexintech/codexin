<?php
	$showcase_image_id    = get_field( 'mnursing_showcase_image' );
	$showcase_heading     = get_field( 'mnursing_showcase_headline' );
?>

<div id="showcase">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 order-2 order-md-1 col-md-5 col-lg-7 p-0">
				<div class="showcase-media bg-image bg-image-cover">
					<div class="img-holder">
						<?php
						$image_size = 'full';
						$alt_text   = trim( wp_strip_all_tags( get_post_meta( $showcase_image_id, '_wp_attachment_image_alt', true ) ) );

						echo wp_get_attachment_image(
							$showcase_image_id,
							$image_size,
							false,
							array(
								'class' => 'showcase-image',
								'alt'   => esc_attr( $alt_text ),
							)
						);
						?>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 order-1 order-md-2 col-md-7 col-lg-5">
				<div class="showcase-content">
					<div class="content-header">
						<h1><?php echo $showcase_heading; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
