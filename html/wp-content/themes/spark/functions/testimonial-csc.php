<?php add_action( 'init', 'testimonials_custom_init' );
function testimonials_custom_init() {
$labels = array(
		'name' => _x('Testimonial Item', 'post type general name','csc_theme'),
		'singular_name' => _x('Testimonial Item', 'post type singular name','csc_theme'),
		'add_new' => _x('Add New', 'Testimonial_csc','csc_theme'),
		'add_new_item' => __('Add New Testimonial Item','csc_theme'),
		'edit_item' => __('Edit Testimonial Item','csc_theme'),
		'new_item' => __('New Testimonial Item','csc_theme'),
		'view_item' => __('View Testimonial Item','csc_theme'),
		'search_items' => __('Search Testimonial Items','csc_theme'),
		'not_found' =>  __('No Testimonial Items found','csc_theme'),
		'not_found_in_trash' => __('No Testimonial Items found in Trash','csc_theme'),
		'parent_item_colon' => '',
		'menu_name' => 'Testimonial Item'

	  );
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt')
	  );

	  register_post_type('testimonial_csc',$args);
}?>