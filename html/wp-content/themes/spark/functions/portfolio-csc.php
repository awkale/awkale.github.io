<?php
	add_action('init', 'portfolio_custom_init');  
	/*-- Custom Post Init Begin --*/
	function portfolio_custom_init()
	{
	  $labels = array(
		'name' => _x('Portfolio Item', 'post type general name', 'csc-themewp'),
		'singular_name' => _x('Portfolio Item', 'post type singular name', 'csc-themewp'),
		'add_new' => _x('Add New', 'portfolio', 'csc-themewp'),
		'add_new_item' => __('Add New Portfolio Item', 'csc-themewp'),
		'edit_item' => __('Edit Portfolio Item', 'csc-themewp'),
		'new_item' => __('New Portfolio Item', 'csc-themewp'),
		'view_item' => __('View Portfolio Item', 'csc-themewp'),
		'search_items' => __('Search Portfolio Items', 'csc-themewp'),
		'not_found' =>  __('No Portfolio Items found', 'csc-themewp'),
		'not_found_in_trash' => __('No Portfolio Items found in Trash', 'csc-themewp'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio Item'

	  );
	 
	 $portfolio_slug = 'portfolio';
	  	  
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		//'rewrite' => array( 'slug' => 'portfolio','with_front' => false, 'pages' => false, 'feeds'=>false ),
		'rewrite' => array('slug' => __( 'portfolio', 'csc-themewp' )),
		'menu_position' => null,
		'exclude_from_search' => true,
		'query_var' => true,
		'supports' => array('title','editor','author','thumbnail','excerpt')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('portfolio',$args);
	  
	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Categories', 'taxonomy general name', 'csc-themewp' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'csc-themewp' ),
		'search_items' =>  __( 'Search Types', 'csc-themewp' ),
		'all_items' => __( 'All Categories', 'csc-themewp' ),
		'parent_item' => __( 'Parent Category', 'csc-themewp' ),
		'parent_item_colon' => __( 'Parent Category:', 'csc-themewp' ),
		'edit_item' => __( 'Edit Categories' , 'csc-themewp'),
		'update_item' => __( 'Update Category' , 'csc-themewp'),
		'add_new_item' => __( 'Add New Category' , 'csc-themewp'),
		'new_item_name' => __( 'New Category Name' , 'csc-themewp'),
	  );
		// Custom taxonomy for portfolio Categories
		register_taxonomy('tagportifolio',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portifolio' ),
	  ));
	  
	}

	/*--- Demo URL meta box ---*/
	
	
	
	add_action('admin_init','portfolio_meta_init');
	
	function portfolio_meta_init()
	{
		// add a meta box for wordpress 'portfolio' type
		add_meta_box('portfolio_meta', 'Link to the project', 'portfolio_meta_setup', 'portfolio', 'side', 'low');
		
		//add_meta_box('csc_url_metabox', 'Image and Video link prettyPhoto ( from another site )', 'csc_url_metabox', 'portfolio', 'side', 'default');
	 
		// add a callback function to save any data a user enters in
		add_action('save_post','portfolio_meta_save');
	}
	
	
	
	
	
	
	function portfolio_meta_setup()
	{
		global $post;
	 	 
		?>
			<div class="portfolio_meta_control">
				<label>URL</label>
				<p>
					<input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
		<?php

		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	
	function portfolio_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == 'DOING_AUTOSAVE') {
		return $post_id;
		}

		if(isset($_POST['_url'])) 
		{
			update_post_meta($post_id, '_url', $_POST['_url']);
		} else 
		{
			delete_post_meta($post_id, '_url');
		}
	}
	/*--- #end  Demo URL meta box ---*/
	

function csc_url_metabox() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="urlmeta_noncename" id="urlmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the location data if its already been entered
    $url = get_post_meta($post->ID, 'csc_url', true);
    // Echo field
    echo '
	<div class="portfolio_meta_control">
				<label>URL</label>
				<p>
	<input type="text" name="csc_url" value="' . $url  . '" class="widefat" />
	</p>
			</div>
	';
}


function csc_save_url_meta($post_id, $post) {
    // verify
    if ( !wp_verify_nonce( isset($_POST['urlmeta_noncename']), plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    // user allowance
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    // data into array
    $url_meta['csc_url'] = $_POST['csc_url'];
    // delegate
    foreach ($url_meta as $key => $value) { // Cycle through array
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If cf has value
            update_post_meta($post->ID, $key, $value);
        } else { // If not
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'csc_save_url_meta', 1, 2); // save the custom fields
  


add_filter("manage_edit-portfolio_columns", "project_edit_columns");   
 
function project_edit_columns($columns){  
        $columns = array(  
         "cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name'),
		"description" => __('Description', 'csc-themewp'),
		"thumbnail" => __('Thumbnail', 'csc-themewp'),
		"author" => __('Author', 'csc-themewp'),
		"date" => __('Date', 'csc-themewp'),
        );  
  
        return $columns;  
}  

add_action("manage_posts_custom_column",  "project_custom_columns", 10, 2); 

function project_custom_columns($columns, $post_id){  
        switch ($columns)  
        {  
            case "description":  
                the_excerpt();  
                break;
				
			case "thumbnail":
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