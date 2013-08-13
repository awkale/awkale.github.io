<?php

add_action( 'init', 'clients_custom_init' );
function clients_custom_init() {
$labels = array(
		'name' => _x('Client Item', 'post type general name', 'csc-themewp'),
		'singular_name' => _x('Client Item', 'post type singular name', 'csc-themewp'),
		'add_new' => _x('Add New', 'client_csc', 'csc-themewp'),
		'add_new_item' => __('Add New Client Item', 'csc-themewp'),
		'edit_item' => __('Edit Client Item', 'csc-themewp'),
		'new_item' => __('New Client Item', 'csc-themewp'),
		'view_item' => __('View Client Item', 'csc-themewp'),
		'search_items' => __('Search Client Items', 'csc-themewp'),
		'not_found' =>  __('No Client Items found', 'csc-themewp'),
		'not_found_in_trash' => __('No Client Items found in Trash', 'csc-themewp'),
		'parent_item_colon' => '',
		'menu_name' => 'Client Item'

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
	  // The following is the main step where we register the post.
	  register_post_type('client_csc',$args);
}

add_filter("manage_edit-client_csc_columns", "client_csc_edit_columns");    
function client_csc_edit_columns($columnsc){  
        $columnsc = array(  
         "cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name', 'csc-themewp'),
		"descriptionc" => __('Description', 'csc-themewp'),
		"thumbnailc" => __('Thumbnail', 'csc-themewp'),
		"author" => __('Author', 'csc-themewp'),
		"date" => __('Date', 'csc-themewp'),
        );  
  
        return $columnsc;  
}  

add_action("manage_posts_custom_column",  "client_csc_custom_columns", 10, 2);   
function client_csc_custom_columns($columnsc, $post_id){  
        switch ($columnsc)  
        {  
            case "descriptionc":  
                the_excerpt();  
                break;
				
			case "thumbnailc":
			$width = (int) 70;
			$height = (int) 70;
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
			
			// Display the featured image in the column view if possible
			if ($thumbnail_id) {
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			if ( isset($thumb) ) {
				echo $thumb;
			} else {
				echo __('None', 'csc-themewp');
			}
			break;		
        }  
}


?>