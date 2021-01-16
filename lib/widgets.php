<?php

add_action( 'widgets_init', 'codexin_sidebar_widgets_init' );

function codexin_sidebar_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar (General)', 'codexin' ),
			'id'            => 'codexin-sidebar-general',
			'description'   => __( 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'codexin' ),
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
			'after_widget'  => '</div>',
		)
	);

	// register_sidebar( array(
	// 'name'              => __('Sidebar (Pages)','codexin'),
	// 'id'                => 'codexin-sidebar-page',
	// 'description'       => __('This sidebar will show on all Pages.','codexin'),
	// 'class'          => '',
	// 'before_widget'     => '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
	// 'after_widget'      => '</div>',
	// ) );

	// register_sidebar( array(
	// 'name'              => __('Sidebar (Blog)','codexin'),
	// 'id'                => 'codexin-sidebar-blog',
	// 'description'       => __('This sidebar will show on all blog Posts.','codexin'),
	// 'class'          => '',
	// 'before_widget'     => '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
	// 'after_widget'      => '</div>',
	// ) );
} // codexin_sidebar_widgets_init ()




// add_action( 'widgets_init', 'codexin_footer_widgets' );

function codexin_footer_widgets() {

	register_sidebar(
		array(
			'name'          => 'Footer (Column 1)',
			'id'            => 'codexin-footer-col-1',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer (Column 2)',
			'id'            => 'codexin-footer-col-2',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer (Column 3)',
			'id'            => 'codexin-footer-col-3',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer (Column 4)',
			'id'            => 'codexin-footer-col-4',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget footer-widget clearfix">',
			'after_widget'  => '</div>',
		)
	);

} // codexin_footer_widgets ()











