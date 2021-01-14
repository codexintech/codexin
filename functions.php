<?php
// Declaring Global Variable for Theme Options
define( 'CODEXIN_THEME_OPTIONS', 'codexin_get_option' );

require_once 'lib/menus.php';
require_once 'lib/shortcodes.php';
require_once 'lib/scripts.php';
require_once 'lib/widgets.php';
require_once 'lib/wp-debloat.php';
require_once 'lib/helpers.php';
require_once 'lib/color-patterns.php';
require_once 'lib/post-type-and-texonomy.php';
require_once 'lib/codexin-ajax.php';

// Curbon field 
require_once 'lib/carbon-fields.php';

// include Redux framework theme  options

// if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/vendors/redux-framework/redux-core/framework.php' ) ) {
//     require_once( dirname( __FILE__ ) . '/vendors/redux-framework/redux-core/framework.php' );
// }


if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/lib/theme-options-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/lib/theme-options-config.php' );
}


/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */


// Declaring woocommerce support


add_action( 'after_setup_theme', 'codexin_setup_theme' );
function codexin_setup_theme() {

    load_theme_textdomain( 'codexin', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );


    /**
     * Enable support for adding custom image sizes
     *
     */
    add_image_size( 'single-post-image', 800, 450, true );


}


// /* Removing 'Redux Framework' sub menu under Tools */
// /** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

add_action( 'admin_init', 'codexin_editor_styles' );
if ( ! function_exists( 'codexin_editor_styles' ) ) {
	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses 	add_editor_style() Links a stylesheet to visual editor
	 * @since 	v1.0
	 */
	function codexin_editor_styles() {
		add_editor_style( 'css/admin/editor-style.css' );
	}
}


// Adding woocommerce compitability to theme structure

// woocommerce finished


# returns a custom-formated page title
function get_page_title ( $title, $id = null ) {
	?>
	<div id="page_title" class="section site-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1><span><?php echo $title ?></span></h1>	
				</div>
			</div>
		</div>
	</div>
	<?php
} // get_page_title( $title, $id = null )











