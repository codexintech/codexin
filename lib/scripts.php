<?php
function codexin_admin_scripts() {
	wp_enqueue_style( 'codexin-theme-options', get_template_directory_uri() . '/css/admin/admin-styles.css', false, '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'codexin_admin_scripts' );





function codexin_scripts() {

	wp_enqueue_style( 'fontawesome-free-5', get_template_directory_uri() . '/css/fontawesome-free-5/css/all.min.css', false, '5.0', 'all' );
	// wp_enqueue_style( 'font-awesome', 'fontawesome-free-5');

	// Load the stylesheets
	wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.0.0', 'all' );
	wp_enqueue_style( 'superfishcss', get_template_directory_uri() . '/css/superfish.css', false, '1.1', 'all' );

	wp_enqueue_script( 'swiper' );

	wp_enqueue_style( 'wp-stylesheet', get_template_directory_uri() . '/css/wp-base.css', false, '1.1', 'all' );
	wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri(), false, filemtime( get_template_directory() . '/style.css' ), 'all' );
	wp_enqueue_style( 'responsive', get_template_directory() . '/css/responsive.css', false, filemtime( get_template_directory() . '/css/responsive.css' ), 'all' );

	// Load scripts
	// wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
	// wp_enqueue_script( 'bootstrap-popperjs', get_template_directory_uri() . '/js/popper.min.js', array ( 'jquery' ), 1.1, true);
	// IE suport polyfile
	wp_enqueue_script( 'headroom-polyfill', get_template_directory_uri() . '/js/object-assign.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/js/modernizr-custom.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), 1.1, true );

	// wp_enqueue_script( 'iziModal-modal', get_template_directory_uri() . '/js/iziModal.min.js', array ( 'jquery' ), 1.1, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'codexin-js', get_template_directory_uri() . '/js/codexin.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/codexin.js' ), true );

	wp_localize_script(
		'codexin-js',
		'cx_script',
		array(
			'ajax_url'  => admin_url( 'admin-ajax.php' ), // WordPress AJAX
			'ajx_nonce' => wp_create_nonce( 'ajax-nonce' ),
		)
	);

} // codexin_styles ()


add_action( 'wp_enqueue_scripts', 'codexin_scripts' );
