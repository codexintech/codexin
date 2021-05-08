<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- Site Loader started-->
	<div class="cx-pageloader">
		<div class="cx-pageloader-inner">
			<label> &#8226;</label>
			<label> &#8226;</label>
			<label> &#8226;</label>
			<label> &#8226;</label>
			<label> &#8226;</label>
			<label> &#8226;</label>
		</div>
	</div>
	<!-- Site Loader Finished-->

	<?php
	$image_logo_id = get_field( 'mnursing_main_logo', 'option' );
	?>

<div id="c-menu--slide-left" class="c-menu c-menu--slide-left">
	<button class="c-menu__close">&larr; <?php _e( 'Back', 'codexin' ); ?></button><?php get_mobile_menu(); ?>
</div>
<div id="c-mask" class="c-mask"></div>


<div id="whole" class="whole-site-wrapper">
	<header id="masthead" class="site-header">
		<div class="header-wrapper intelligent-header<?php echo ! is_front_page() ? esc_attr( ' inner-header' ) : ' front-header'; ?>">
			<div class="main-header">
				<div class="container">
					<div class="row align-items-center" >
						<div class="col-12">
							<div class="logo">
								<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
									<?php
									$alt_text = trim( wp_strip_all_tags( get_post_meta( $image_logo_id, '_wp_attachment_image_alt', true ) ) );

									echo wp_get_attachment_image(
										$image_logo_id,
										'full',
										false,
										array(
											'alt' => esc_attr( $alt_text ),
										)
									);
									?>
								</a>
							</div>
						</div>

						<div class="col-12">
							<div id="o-wrapper" class="mobile-nav o-wrapper">
								<div class="primary-nav">
									<button id="c-button--slide-left" class="primary-nav-details"> <span><?php _e( 'Menu', 'codexin' ); ?> </span><i class="fas fa-bars"></i> </button>
								</div>
							</div>

							<div class="nav-wrapper">
								<div id="nav">
									<?php get_main_menu(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header> <!-- end of #masthead -->

	<div class="intelligent-header-space"></div><!-- empty div with a height of header height-->

	<?php
	if ( is_front_page() ) {
		get_header( 'home' );
	} else {
		get_template_part( 'lib/page-titles/page', 'title' );
	}
	?>
