<?php
/**
 * Theme engine room.
 */

// Requiring core files.
require_once 'lib/menus.php';
require_once 'lib/shortcodes.php';
require_once 'lib/scripts.php';
require_once 'lib/widgets.php';
require_once 'lib/wp-debloat.php';
require_once 'lib/helpers.php';
require_once 'lib/post-types.php';

/**
 * Essential Theme supports.
 */
add_action( 'after_setup_theme', 'eys_setup_theme' );
function eys_setup_theme() {
	/**
	 * Text Domain.
	 */
	load_theme_textdomain( 'codexin', get_template_directory() . '/languages' );

	/**
	 * Theme features.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/**
	 * Enable support for adding custom image sizes.
	 */
	// add_image_size( 'eys-post-thumbnail', 1170, 650, true );

	/**
	 * Declaring WooCommerce support.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 */
add_action( 'admin_init', 'eys_editor_styles' );
function eys_editor_styles() {
	add_editor_style( 'css/admin/editor-style.css' );
}

/**
 * Adding WooCommerce computability to theme structure.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'eys_wrapper_start', 10 );
function eys_wrapper_start() {
	echo '<div class="container">';
}

add_action( 'woocommerce_after_main_content', 'eys_wrapper_end', 10 );
function eys_wrapper_end() {
	echo '</div>';
}

/**
 * Returns a custom-formatted page title.
 *
 * @param string  $title Page title.
 * @param integer $id Post ID.
 * @return mixed
 */
function get_page_title( $title, $id = null ) {
	?>

	<div id="page-title" class="site-content mb-full">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title-content">
						<h1><?php echo $title; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
}

/**
 * Enqueue Google fonts.
 */
add_action( 'wp_enqueue_scripts', 'eys_add_google_fonts' );
function eys_add_google_fonts() {
	wp_enqueue_style( 'eys-google-fonts', 'https://fonts.googleapis.com/css2?family=Kalam&family=Roboto:wght@300;400;700&display=swap', false );
}

/**
 * Add ACF Options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
 * Header Code
 */
add_action( 'wp_head', 'eys_header_code', 10 );
function eys_header_code() {
	$header_code = get_field( 'eys_header_code', 'option' );

	if ( $header_code ) {
		printf( '%s', $header_code );
	}
}

/**
 * Footer Code
 */
add_action( 'wp_footer', 'eys_footer_code' );
function eys_footer_code() {
	$footer_code = get_field( 'eys_footer_code', 'option' );

	if ( $footer_code ) {
		printf( '%s', $footer_code );
	}
}

/**
 * Add featured image help text.
 */
add_filter( 'admin_post_thumbnail_html', 'eys_featured_image_html' );
function eys_featured_image_html( $html ) {
	// if ( 'page' === get_post_type() ) {
		// $html .= '<p>Please upload top banner image here. Recommended image size is: <b>1920X505</b> px. <br><br><b><u>Note:</u></b> Featured image will not work on Homepage or Page (Home Page) template.</p>';
	// }

	if ( 'post' === get_post_type() ) {
		$html .= '<p>Please upload top banner image here. Recommended image size is: <br><b>1170X650</b> px.</p>';
	}

	return $html;
}

/**
 * Gravity form error notification.
 */
add_filter( 'gform_validation_message', 'eys_gf_validation_message', 10, 2 );
function eys_gf_validation_message( $validation_message ) {
	add_action( 'wp_footer', 'eys_gf_js_error' );
}

function eys_gf_js_error() {
	?>
	<script type="text/javascript">
		alert( "Form not sent; Please fill in required * fields." );
	</script>
	<?php
}
