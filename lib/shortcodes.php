<?php

add_action( 'init', 'codexin_shortcodes' );
function codexin_shortcodes() {

	$shortcodes = array(
		'eys_section_title',
	);

	foreach ( $shortcodes as $shortcode ) :
		add_shortcode( $shortcode, $shortcode . '_shortcode' );
	endforeach;

}

/*
* Syntax:
* [eys_section_title title="" class=""]
*
*/
function eys_section_title_shortcode( $atts, $content = null ) {
	extract(
		shortcode_atts(
			array(
				'title' => '',
				'align' => 'left',
				'class' => '',
			),
			$atts
		)
	);

	$result = '';
	ob_start();

	$classes = array();

	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}

	if ( ! empty( $title ) ) {
		?>

		<div class="section-title <?php echo esc_attr( $align ); ?>-aligned">
			<h2 class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"><?php echo $title; ?></h2>
		</div>

		<?php
	}

	$result .= ob_get_clean();
	return $result;
}
