<?php
function posttype_update_messages( $messages ) {
global $post, $post_ID;
$post_types = get_post_types( array( 'show_ui' => true, '_builtin' => false ), 'objects' );
foreach( $post_types as $post_type => $post_object ) {
    $messages[$post_type] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => sprintf( '%s '.__( 'updated. ','codexin' ).'<a href="%s">'.__('View ','codexin').' %s</a>', $post_object->labels->singular_name, esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
        2  => __( 'Custom field updated.','codexin' ),
        3  => __( 'Custom field deleted.','codexin' ),
        4  => sprintf( '%s '.__( 'updated.','codexin' ), $post_object->labels->singular_name ),
        5  => ['revision'] ? sprintf( '%s '.__( 'restored to revision from ' ,'codexin').' %s', $post_object->labels->singular_name, wp_post_revision_title( (int) ['revision'], false ) ) : false,
        6  => sprintf( '%s '.__( 'published. ','codexin' ).'<a href="%s">'.__( 'View ','codexin' ).'%s</a>', $post_object->labels->singular_name, esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
        7  => sprintf( '%s '.__( 'saved.','codexin' ), $post_object->labels->singular_name ),
        8  => sprintf( '%s '.__( 'submitted. ','codexin').'<a target="_blank" href="%s">'.__( 'Preview ','codexin').'%s</a>', $post_object->labels->singular_name, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), $post_object->labels->singular_name ),
        9  => sprintf( '%s '.__( 'scheduled for:','codexin').'<strong>%1$s</strong>.<a target="_blank" href="%2$s">'.__( ' Preview ','codexin').'%s</a>', $post_object->labels->singular_name, date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
        10 => sprintf( '%s '.__( 'draft updated. ','codexin').'<a target="_blank" href="%s">'.__( 'Preview','codexin').' %s</a>', $post_object->labels->singular_name, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), $post_object->labels->singular_name ),
        );
}
return $messages;
}
// add_filter( 'post_updated_messages', 'posttype_update_messages' ); 


function testimonials_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'all_items'    => __( 'All Testimonials', 'codexin' ),
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' =>  'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials in the trash',
        'parent_item_colon' => '',
    );
 
    register_post_type( 'testimonials', array(
        'labels' => $labels,
        'public' => true,
        // 'publicly_queryable' => true,
        'publicly_queryable'  => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'menu_icon'   => 'dashicons-testimonial',
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array( 'title','editor','thumbnail')
    ) );
}
add_action( 'init', 'testimonials_post_type' );




/**
 * Creating Custom Place Holders for the Custom Post Types
 */
add_filter('enter_title_here', 'codexin_title_placeholder', 0, 2);
/**
 * Function to Create Custom Title Placeholders for the Custom Post Types
 *
 * @since 1.0
 */
function codexin_title_placeholder($title, $post) {

    if ($post->post_type == 'slides') {
        $cx_title = esc_html__('Add Slide Title', 'codexin');
        return $cx_title;
    }

    return $title;
}




function filter_featured_image_admin_text( $content, $post_id, $thumbnail_id ){
    
    $post = get_post( $post_id );
    $post_type = $post->post_type;
    $help_text = '' ;
    if ( $post_type == 'sliders') {
        $help_text = '<p><b><u>'.__('Note: ','codexin').'</u></b>'. __( 'Upload slider image as Featured image here. Recommended image size is 1800*1200 px.', 'codexin' ) . '</p>';
   }
    return $content.$help_text;
}
add_filter( 'admin_post_thumbnail_html', 'filter_featured_image_admin_text', 10, 3 );



