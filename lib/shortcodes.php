<?php

add_action( 'init', 'codexin_shortcodes' );

function codexin_shortcodes() {

	$shortcodes = array(
		'cta_image',
	);

	foreach ( $shortcodes as $shortcode ) :
		add_shortcode( $shortcode, $shortcode . '_shortcode' );
	endforeach;

}


/*
* Syntax:
* [cta_image ]
*
*/

function cta_image_shortcode( $atts, $content = null ) {
	extract(
		shortcode_atts(
			array(),
			$atts
		)
	);

	   $result = '';
	   ob_start();
	?>

		<?php
		$result .= ob_get_clean();
		return $result;
}
