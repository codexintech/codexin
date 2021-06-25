<?php
add_action( 'admin_enqueue_scripts', 'mnursing_admin_scripts' );
function mnursing_admin_scripts() {
	wp_enqueue_style( 'codexin-theme-options', get_template_directory_uri() . '/css/admin/admin-styles.css', false, '1.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'mnursing_scripts' );
function mnursing_scripts() {
	wp_enqueue_style( 'eys-google-fonts', 'https://fonts.googleapis.com/css2?family=Kalam&family=Roboto:wght@300;400;700&display=swap', false );
	// Font Awesome Icon Font.
	wp_enqueue_style( 'fontawesome-free-5', get_template_directory_uri() . '/css/fontawesome-free-5/css/all.min.css', false, '5.0', 'all' );

	// Load the other stylesheets.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.0.0', 'all' );
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css', false, '1.1', 'all' );

	// if ( is_page_template( 'page-templates/page-home.php' ) ) {
	// 	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css', false, '5.3', 'all' );
	// }

	wp_enqueue_style( 'theme-styles', get_stylesheet_uri(), false, '1.1', 'all' );

	// Load scripts.
	wp_enqueue_script( 'headroom-polyfill', get_template_directory_uri() . '/js/object-assign.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/js/modernizr-custom.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array( 'jquery' ), 1.1, true );

	// if ( is_page_template( 'page-templates/page-home.php' ) ) {
	// 	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), 5.3, true );
	// }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), 1.1, true );

	wp_localize_script(
		'theme-scripts',
		'mnursing_script',
		array(
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'ajax-nonce' ),
		)
	);

}
