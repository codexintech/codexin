<?php

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    // require_once( 'vendor/autoload.php' );
    require_once get_template_directory().'/vendors/carbon-fields/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_metabox' );
function crb_attach_metabox() {
    
	Container::make( 'post_meta', 'Custom Data' )
	    ->where( 'post_type', '=', 'post' )
	    ->add_fields( array(

			Field::make( 'checkbox', 'crb_show_content', 'Show content' ),

			Field::make( 'rich_text', 'crb_content', 'Content' )
				->set_conditional_logic( array(
						array(
						    'field' => 'crb_show_content',
						    'value' => true,
						)
					) 
				),

	    ));
}

