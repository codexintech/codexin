<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

<?php if( codexin_get_option('cx_page_loader') == true ) { ?>
    <!-- Site Loader started-->
    <div class="cx-pageloader" style="/* display: none; */">
        <div class="cx-pageloader-inner">
            <label>&#8226;</label>
            <label>&#8226;</label>
            <label>&#8226;</label>
            <label>&#8226;</label>
            <label>&#8226;</label>
            <label>&#8226;</label>
        </div>
    </div>
    <!-- Site Loader Finished-->
<?php } ?>

<?php

    // $logo_type          	= codexin_get_option( 'cx_logo_type' );
    // $text_logo          	= codexin_get_option( 'cx_text_logo' ); 
    $image_logo         	= codexin_get_option( 'cx_image_logo' ) ? codexin_get_option( 'cx_image_logo' )['url']:'#' ;
	$image_logo_id      	= codexin_get_option( 'cx_image_logo' ) ? codexin_get_option( 'cx_image_logo' )['id']:'#' ;
	// print_r(codexin_get_option( 'cx_image_logo' ));
    // $cx_text_office_time    = codexin_get_option( 'cx_text_office_time' );
    // $cx_text_phone          = codexin_get_option( 'cx_text_phone' );
    // $phone_url 				= preg_replace('/[^0-9]/', '', $cx_text_phone);
    // $cx_text_email          = codexin_get_option( 'cx_text_email' );
	
	// $image_alt = get_post_meta($image_logo_id, '_wp_attachment_image_alt', TRUE); 

	$page_id =  get_queried_object_ID();
	$baner_css = '' ;

?>

<div id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <button class="c-menu__close">&larr; <?php _e('Back','codexin');?></button><?php get_mobile_menu() ?>
</div>
<div id="c-mask" class="c-mask"></div>


<div id="whole" class="topbar-active whole-site-wrapper">
	<header class="header">
		<div class="header-top">
			
			<!-- header infobar end  -->
			<div class="container">
				<div class="row align-items-center" >

					<div class="col-md-3  col-sm-7">
						<div class="logo">
						
							<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
								<?php 
					            // if( $logo_type == 2 ) {
					               echo wp_get_attachment_image($image_logo_id,'full');
					            // } else {
					            //     echo $text_logo;
					            // }
								 ?>
							</a>
						</div>
					</div>

					<div class="col-sm-9  col-xs-5">

						<div id="o-wrapper" class="mobile-nav o-wrapper">
							  <div class="primary-nav">
							    <button id="c-button--slide-left" class="primary-nav-details"> <?php _e('Menu','codexin');?> <i class="fas fa-bars"></i> </button>
							  </div>
						</div>
						
						<div id="nav" class="clearfix">						
							<?php get_main_menu() ?>
						</div>
					</div>
				</div>
			</div> <!-- end of .container -->
		</div>

	</header> <!-- end of #header -->
	
	<?php if ( is_front_page() ):  
				get_header( 'home' ); 
		else:
				get_template_part( 'lib/page-titles/page', 'title' );
		endif;		
	?>

