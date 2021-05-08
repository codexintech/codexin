<?php get_header(); ?>

<div id="content" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<main id="primary" class="site-main">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							?>

							<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-item' ); ?>>
								<?php
								if ( has_post_thumbnail() ) {
									echo '<div class="post-thumb mt-60">';
										// the_post_thumbnail( 'mn-post-thumbnail' );
										$image_size = 'mn-post-thumbnail';
										$alt_text   = trim( wp_strip_all_tags( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) );

										echo wp_get_attachment_image(
											get_post_thumbnail_id(),
											$image_size,
											false,
											array(
												'class' => 'wp-post-image',
												'alt'   => esc_attr( $alt_text ),
											)
										);
									echo '</div>';
								}
								?>
								<div class="post-content mt-full">
									<?php
									the_content();

									$args = array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'codexin' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'codexin' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									);
									wp_link_pages( $args );
									?>
								</div>
							</div> <!-- end of .single-post-item -->

							<?php
						}
					} else {
						// No posts to display.
					}
					?>
				</main> <!-- end of #primary -->
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
