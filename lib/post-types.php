<?php

// Register Custom Post Type - Testimonials
// add_action( 'init', 'codexin_testimonials_cpt' );
function codexin_testimonials_cpt() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'Post Type General Name', 'codexin' ),
		'singular_name'      => _x( 'Testimonial', 'Post Type Singular Name', 'codexin' ),
		'menu_name'          => __( 'Testimonials', 'codexin' ),
		'parent_item_colon'  => __( 'Parent Testimonial:', 'codexin' ),
		'all_items'          => __( 'All Testimonials', 'codexin' ),
		'add_new_item'       => __( 'Add New Testimonial', 'codexin' ),
		'add_new'            => __( 'Add New', 'codexin' ),
		'new_item'           => __( 'New Testimonial', 'codexin' ),
		'edit_item'          => __( 'Edit Testimonial', 'codexin' ),
		'update_item'        => __( 'Update Testimonial', 'codexin' ),
		'view_item'          => __( 'View Testimonial', 'codexin' ),
		'view_items'         => __( 'View Testimonials', 'codexin' ),
		'search_items'       => __( 'Search Testimonial', 'codexin' ),
		'not_found'          => __( 'Not found', 'codexin' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'codexin' ),
	);

	$args = array(
		'label'               => __( 'Testimonials', 'codexin' ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'thumbnail',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'query_var'           => true,
		'rewrite'             => true,
		'menu_icon'           => 'dashicons-art',
	);

	register_post_type( 'testimonials', $args );

}
