<?php

add_action('init', 'codexin_shortcodes');

function codexin_shortcodes() {

	$shortcodes = array(
		'cta_image',
		'button'
		
	);



	foreach ( $shortcodes as $shortcode ) :
		add_shortcode( $shortcode, $shortcode . '_shortcode' );
	endforeach;

}


/*  
* Syntax:
* [button button_txt="" target="" href="" type=""]
*
*/

function button_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   		'button_txt'  => 'Read More',
	   		'target'  => '_self',
	   		'href'   => '#',
	   		'type'   => '1',
	   		'class'  => ''

	   ), $atts));

	   $result = '';
	   ob_start(); 
	   ?>

		<?php if($type == 1): ?>
			<a class="codexin_btn codexin_centerSwipe " href="<?php echo $href; ?>" target="<?php echo $target; ?>">
			  	<span><?php echo $button_txt; ?></span>
			</a>
		<?php elseif($type == 2): ?>	
			<a class="codexin_btn codexin_centerSwipe codexin_skewSwipe " href="<?php echo $href; ?>" target="<?php echo $target; ?>">
			  <span><?php echo $button_txt; ?></span>
			</a>

		<?php elseif($type == 3): ?>	
			<div class="codexin_btn_3_wrapper ">
				<a class="codexin_btn_3"  href="<?php echo $href; ?>" target="<?php echo $target; ?>">
					<span><?php echo $button_txt; ?></span><em></em>
				</a>
			</div>

		<?php elseif($type == 4): ?>	
				<div class="<?php echo $class; ?>"><a class="codexin_btn_4 "  href="<?php echo $href; ?>" target="<?php echo $target; ?>"><?php echo $button_txt; ?></a></div>

		<?php else: echo 'Button type not exists'; ?>	

		<?php endif; ?>	

		<?php
		$result .= ob_get_clean();
		return $result;
}


/*  
* Syntax:
* [cta_image ]
*
*/

function cta_image_shortcode( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	   ), $atts));

	   $result = '';
	   ob_start(); 
	   ?>

		<?php
		$result .= ob_get_clean();
		return $result;
}
