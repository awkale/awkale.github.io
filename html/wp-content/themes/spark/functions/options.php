<?php
function optionsframework_option_name() {

	
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

}

function optionsframework_options() {
	
	// Nivo Nav
	$nivo_arrow = array( "true" => "Yes", "false" => "No");	
	$csc_arrow = array( "1" => "Yes", "0" => "No");
	
	// Nivo Type
	$nivo_type = array(
	"random" => "random",
	"sliceDown" => "sliceDown",
	"sliceDownLeft" => "sliceDownLeft",
	"sliceUp" => "sliceUp",
	"sliceUpLeft" => "sliceUpLeft",
	"sliceUpDown" => "sliceUpDown",
	"sliceUpDownLeft" => "sliceUpDownLeft",
	"slideInRight"=>"slideInRight",
    "slideInLeft"=>"slideInLeft",
    "boxRandom"=>"boxRandom",
    "boxRain"=>"boxRain",
    "boxRainReverse"=>"boxRainReverse",
    "boxRainGrow"=>"boxRainGrow",
    "boxRainGrowReverse"=>"boxRainGrowReverse",
	"fold" => "fold",
	"fade" => "fade");
	
	// flex Type
	$flex_type = array(
	"fade" => "fade",
	"slide" => "slide");
	
	$flex_type2 = array(
	"vertical" => "vertical",
	"horizontal" => "horizontal");
	
	$flex_type3 = array(
	"true" => "No",
	"thumbnails" => "Yes");

	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	///////////////////////////////////////////////////////////////
	
	//Slider type
	$slider_array = array(
	    'nivo' => 'NivoSlider',
		'flex' => 'FlexSlider'
	);
	
	///////////////////////////////////////////////////////////////
	
	//Query data
	$query_array = array(
	    'category_slid' => 'CSC Slider',
		'category_port' => 'CSC Portfolio',
		//'category_post' => 'Category Post',
		'category_tags' => 'Post Tags',
		'category_custom_post' => 'Custom a Post'
		//'category_page' => 'Custom a Pages'
	);
	
	
	///////////////////////////////////////////////////////////////
	
	$args_post = array(
	//'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category'
	//'pad_counts'               => false 
	);
	
	
	// Pull the posts categories into an array
	$options_categories_post = array();  
	$options_categories_obj_post = get_categories($args_post);
	$options_categories_post[''] = 'Select a post categories:';
	foreach ($options_categories_obj_post as $category_post) {
    	$options_categories_post[$category_post->cat_ID] = $category_post->cat_name;
	}
	
	
	///////////////////////////////////////////////////////////////////////////////
	
	
	$args_port = array(
	//'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'tagportifolio'
	//'pad_counts'               => false 
	);
	
	
	// Pull the posts categories into an array
	$options_categories_port = array();  
	$options_categories_port_obj = get_categories($args_port);
	$options_categories_port[''] = 'Select a portfolio categories:';
	foreach ($options_categories_port_obj as $category_port) {
    	$options_categories_port[$category_port->cat_ID] = $category_port->cat_name;
	}
	
	
	//////////////////////////////////////////////////////////////////////////////
	
	
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	
	///////////////////////////////////////////////////////////////////////////////
	
	// Pull all tags into an array
	
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	
	//////////////////////////////////////////////////////////////////////////////
	
	// Pull all the categories into an array
	$options_all_categories = array();
	$options_all_categories_obj = get_categories();
	foreach ($options_all_categories_obj as $all_category) {
		$options_all_categories[$all_category->cat_ID] = $all_category->cat_name;
	}

	///////////////////////////////////////////////////////////////////////////////
		
	// Typography Options
	$typography_options = array(
	'size' => '',
	'face' => 'Open+Sans+Condensed',
	'color' => false,
	'style' => ''
	);
	
	$defined_stylesheets = array(
    //"0" => "Default", // There is no "default" stylesheet to load
    get_stylesheet_directory_uri() . '/css/boxed.css' => "Boxed",
    get_stylesheet_directory_uri() . '/css/fullwide.css' => "Full Wide",
   // get_stylesheet_directory_uri() . '/css/minimal.css' => "Minimal"
    );


    $alt_stylesheets = options_stylesheets_get_file_list(
      get_stylesheet_directory() . '/css/color-theme/', // $directory_path
       'css', // $filetype
      get_stylesheet_directory_uri() . '/css/color-theme/' // $directory_uri
    );
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/framework/images/';
	
	$shortname = "csc";
		
	$options = array();
	
	///////////////////////////////////////////////////////////
	$options[] = array( "name" => "General Settings",
						"type" => "heading");
						
	
	$options[] = array( "name" => "Select a Theme Layout",
         "desc" => "The choice of layout theme.",
         "id" => "theme_wide",
         "std" => "0",
         "type" => "select",
         "options" => $defined_stylesheets );
	
	$options[] = array( "name" => "Predefined Color Schemes",
       "desc" => 'The css files in the "/css/color-theme" directory are automatically loaded into the option.',
       "id" => "auto_stylesheet",
       "type" => "select",
       "options" => $alt_stylesheets );		 
		 
	
	$options[] = array( "name" => "Favicon",
	                    "desc" => "Please download an image ( 16x16 px ) file or write url of your favicon.",
	                    "id" => $shortname."_favicon",
	                    "type" => "text",
	                    "type" => "upload");							
												
						
	$options[] = array( "name" => "Image Logo",
						"desc" => "Please choose an image file or write url of your logo.",
						"id" => $shortname."_logo_theme",
						"type" => "upload");				
									
					
	$options[] = array( "name" => "Footer Copyright Text",
	                    "desc" => "Change copyright text",
	                    "id" => $shortname."_copyright",
	                    "type" => "text",
	                    "std" => "&copy; 2012 John Smith, LLC. All Rights Reserved.");
						
	
	$options[] = array( "name" => "Promo Banner Text",
	                    "desc" => "Change Promo Banner Text (support HTML tag)",
	                    "id" => $shortname."_promo_text",
	                    "type" => "textarea",
	                    "std" => "<h1>Welcome to SPARK is minimalist and responsive <span> HTML5&amp;CSS3 </span>WP Theme</h1>");	
						
	
	$options[] = array( "name" => "Promo Banner Link Button",
	                    "desc" => "Change Promo Banner Link Button",
	                    "id" => $shortname."_promo_link",
	                    "type" => "text",
	                    "std" => "http://sparkwp.wp-theme.pro");
	
	$options[] = array( "name" => "Promo Banner Title Button",
	                    "desc" => "Change Promo Banner Title Button",
	                    "id" => $shortname."_promo_title",
	                    "type" => "text",
	                    "std" => "title");										
										

	
		///////////////////////////////////////////////////////////////////							
		
	$options[] = array( "name" => "Images Resize",
						"type" => "heading");
						
	//////////////////////////////////////////////////////////////////
	
											
	
	$options[] = array( "name" => "Images Height Slider Home",
	                    "desc" => "Change Images Height Size Slider Home",
	                    "id" => $shortname."_slider_height",
	                    "type" => "text",
	                    "std" => "300");
						
	
		$options[] = array( "name" => "Images Height Post Slider",
	                    "desc" => "Change Images Height Size Post Slider",
	                    "id" => $shortname."_slider_post_height",
	                    "type" => "text",
	                    "std" => "250");
										
	$options[] = array( "name" => "Images Height Single Post Slider",
	                    "desc" => "Change Images Height Size Single Post Slider",
	                    "id" => $shortname."_slider_single_post_height",
	                    "type" => "text",
	                    "std" => "350");
						
		$options[] = array( "name" => "Images Height Post",
	                    "desc" => "Change Images Height Size Post",
	                    "id" => $shortname."_image_post_height",
	                    "type" => "text",
	                    "std" => "250");
										
	$options[] = array( "name" => "Images Height Single Post",
	                    "desc" => "Change Images Height Size Single Post",
	                    "id" => $shortname."_image_single_post_height",
	                    "type" => "text",
	                    "std" => "350");									
	
	///////////////////////////////////////////////////////////////////							
		
	$options[] = array( "name" => "Typography Settings",
						"type" => "heading");
						
	//////////////////////////////////////////////////////////////////
	
	
	
	$options[] = array( "name" => "Body Font Family",
						"desc" => "Select a font family for body texts",
						"id" => $shortname."_font_title_body",
						"std" => array('size' => '14px','face' => 'PT+Sans','color' => '#6F7072','style'=>'300'),
						"type" => "typography");
	
	
	$options[] = array( "name" => "Page Title Font Setting",
						"desc" => "Page Title Font Setting",
						"id" => $shortname."_page_title",
						"std" => array('size' => '24px','face' => 'Open+Sans+Condensed','color' => '#6F7072','style'=>'700'),
						"type" => "typography");
						
	$options[] = array( "name" => "Top Menu Font Setting",
						"desc" => "Top Menu Font Setting",
						"id" => $shortname."_menu_fonts",
						"std" => array('size' => '18px','face' => 'Open+Sans+Condensed','color' => '#6F7072','style'=>'700'),
						"type" => "typography");
	
						
	
	$options[] = array( "name" => "Page Slogan Font Family",
						"desc" => "Select a font family for slogan",
						"id" => $shortname."_font_title_slogan",
						"std" => array('size' => '28px','face' => 'Open+Sans+Condensed','color' => '#6F7072','style'=>'700'),
						"type" => "typography");
																									
	
	
	$options[] = array( "name" => "Font Family <H1>",
						"desc" => "Select a font family for H1",
						"id" => $shortname."_font_title_page",
						"std" => array('size' => '36px','face' => 'PT+Sans','color' => '#6F7072','style'=>'300'),
						"type" => "typography");
						
	$options[] = array( "name" => "Font Family <H2>",
						"desc" => "Select a font family for H2",
						"id" => $shortname."_font_title_page2",
						"std" => array('size' => '32px','face' => 'PT+Sans','color' => '#6F7072','style'=>'300'),
						"type" => "typography");
																			
	$options[] = array( "name" => "Font Family <H3>",
						"desc" => "Select a font family for H3",
						"id" => $shortname."_font_title_page3",
						"std" => array('size' => '18px','face' => 'Open+Sans+Condensed','color' => '#6F7072','style'=>'700'),
						"type" => "typography");
											
						
	$options[] = array( "name" => "Font Family <p> ",
						"desc" => "Select a font family for ( p ) ",
						"id" => $shortname."_font_content",
						"std" => array('size' => '14px','face' => 'PT+Sans','color' => '#6F7072','style'=>'300'),
						"type" => "typography");
						
						
	//$options[] = array( "name" => "Theme FontFamily Links <a> ",
//						"desc" => "Theme FontFamily( a ) ",
//						"id" => $shortname."_font_content_links",
//						"std" => array('size' => '14px','face' => 'PT+Sans','color' => '#474747','style'=>''),
//						"type" => "typography");
										
						
	
	///////////////////////////////////////////////////////////////////							
		
	$options[] = array( "name" => "Styling Settings",
						"type" => "heading");
						
	//////////////////////////////////////////////////////////////////	
	
	
	$options[] = array( "name" =>  "Background Theme",
						"desc" => "Change the background CSS ( No selected by default. )",
						"id" => $shortname."_theme_background",
						"std" => $background_defaults, 
						"type" => "background");
	
	
	
	$options[] = array(
		'name' => __('TopBar Social Icon Background Color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_top_socicon_bg",
		'std' => '#f8f8f8',
		'type' => 'color' );
		
		
	$options[] = array(
		'name' => __('Header Background Color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_header_bg",
		'std' => '',
		'type' => 'color' );
		
	
	$options[] = array( "name" => "Top Menu Hover Color",
						"desc" => "Top Menu Hover Color",
						"id" => $shortname."_menu_color_hover",
						"std" => '#e16652',
						'type' => 'color' );
						
	
	$options[] = array( "name" => "Top Menu Current Color",
						"desc" => "Top Menu Current Color",
						"id" => $shortname."_menu_color_a_bg",
						"std" => '#e16652',
						'type' => 'color' );					
						
	
	$options[] = array( "name" => "Top Menu Hover Background Color",
						"desc" => "Top Menu Hover Background Color",
						"id" => $shortname."_menu_color_hover_bg",
						"std" => '',
						'type' => 'color' );					
		
		
	$options[] = array(
		'name' => __('Top Menu Sub-level background Color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_menu_bg",
		'std' => '#4d4d4d',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Top Menu Sub-level Hover background Color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_menu_hover_bg",
		'std' => '#6f7072',
		'type' => 'color' );	
		
	
	$options[] = array( "name" =>  "Slider Home background",
						"desc" => "Change the background color and images ( No selected by default. )",
						"id" => $shortname."_slider_home_bg",
						"std" => $background_defaults, 
						"type" => "background");				
		
						
	
	
	$options[] = array(
		'name' => __('Slogan Top page Color link, a:hover, button, links, etc', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_slogan_link_bg",
		'std' => '#e16652',
		'type' => 'color' );
		
	
	$options[] = array(
		'name' => __('Background color icon  blog post format', 'csc_theme'),
		'desc' => __('Background color icon blog post format.', 'csc_theme'),
		'id' => $shortname."_post_bg",
		'std' => '#e16652',
		'type' => 'color' );	
	
		
		
	$options[] = array(
		'name' => __('Theme Element background color', 'csc_theme'),
		'desc' => __('Filter, button, etc.', 'csc_theme'),
		'id' => $shortname."_element_bg",
		'std' => '#6f7072',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Slider Nav & Caption background color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_slidernav_bg",
		'std' => '#e16652',
		'type' => 'color' );	
		
		
	$options[] = array(
		'name' => __('Social Icon background color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_socicon_bg",
		'std' => '#c2c2c2',
		'type' => 'color' );
		
	
	$options[] = array(
		'name' => __('Font Awesome Icon color', 'csc_theme'),
		'desc' => __('Click right side of the box below to pick a color. If you would like to tunn back the default color, just delete the value and save options.', 'csc_theme'),
		'id' => $shortname."_fontaw_bg",
		'std' => '',
		'type' => 'color' );	
		
												
	
		///////////////////////////////////////////////////////////////////							
		
	$options[] = array( "name" => "Blog Settings",
						"type" => "heading");
						
	//////////////////////////////////////////////////////////////////
	
	
	$options[] = array( "name" => "Amount of blog post per page",
	                    "desc" => "How many posts do you want to display per page?",
	                    "id" => $shortname."_count_post_page",
	                    "type" => "text",
	                    "std" => "5");
						
	
	$options[] = array( "name" => "Share Post Links in Blog Single page",
	                    "desc" => "",
	                    "id" => $shortname."_share_post",
	                    "type" => "checkbox",
	                    "std" => "");					
								
						
						
		//////////////////////////////////////////////////////////////										
		$options[] = array( "name" => "Portfolio Settings",
						"type" => "heading");
						
	
	//////////////////////////////////////////////////////////////////
	
	
	$options[] = array( "name" => "Slider Images Height Portfolio Single Page",
	                    "desc" => "Change Images Height Size Portfolio Single Page",
	                    "id" => $shortname."_slider_single_portfolio",
	                    "type" => "text",
	                    "std" => "350");
	
	
	$options[] = array( "name" => "Images Height Portfolio Single Page",
	                    "desc" => "Change Images Height Size Portfolio Single Page",
	                    "id" => $shortname."_image_single_portfolio",
	                    "type" => "text",
	                    "std" => "350");					
																			
						
	$options[] = array( "name" => "Use Clients Module in Portfolio Single Page?",
						"desc" => "Check Show / Hide",
						"id" => $shortname."_clients_single_none",
						"type" => "checkbox");

	
	///////////////////////////////////////////////////////////////////							
		
	$options[] = array( "name" => "Slider Settings",
						"type" => "heading");
						
	//////////////////////////////////////////////////////////////////	
	
	
	$options[] = array(
		'name' => "Slider Type",
		'desc' => "Select a Slider.",
		'id' => $shortname."_slider_type",
		'std' => 'nivo',
		'type' => 'radio',
		'options' => $slider_array);
	
	
	////////////////////////nivo settings//////////////////////////////////						
						
	$options[] = array( "name" => "Number of slices in Slider",
						"desc" => "Select a number of slices in your Slider.",
						"id" => "nivo_csc_slices",
						"std" => "15",
						"class" => "hidden",
						"type" => "text");
	
	$options[] = array( "name" => "Pause Time",
						"desc" => "How long each slide will show.",
						"id" => "nivo_csc_pause",
						"std" => "4000",
						"class" => "hidden",
						"type" => "text");	
	
	$options[] = array( "name" => "Animation Speed Slider",
						"desc" => "Select a speed of animation slider.",
						"id" => "nivo_csc_speed",
						"std" => "500",
						"class" => "hidden",
						"type" => "text");
						
	$options[] = array( "name" => "Navigation Slider Arrow",
						"desc" => "Show / Hide navigation.",
						"id" => "nivo_csc_arr",
						"std" => "",
						"type" => "checkbox",
						"class" => "hidden");
	
												
	$options[] = array( "name" => "Type of Animation Slider",
						"desc" => "Select a type of animation slider.",
						"id" => "nivo_csc_effect",
						"std" => "random",
						"type" => "select",
						"class" => "hidden",
						"options" => $nivo_type);
	
	////////////////////////flex settings//////////////////////////////////	
	
	$options[] = array( "name" => "Thumbnails Nav Slider",
						"desc" => "Check a Show / Hide Thumbnails.",
						"id" => $shortname."_flex_thum",
						"std" => "true",
						"type" => "checkbox",
						"class" => "hidden");					
						
	$options[] = array( "name" => "Type of Animation Slider",
						"desc" => "Select a type of animation slider.",
						"id" => $shortname."_flex_anim",
						"std" => "slide",
						"type" => "select",
						"class" => "hidden",
						"options" => $flex_type);
	
	$options[] = array( "name" => "Sliding Direction",
						"desc" => "Select the sliding direction.",
						"id" => $shortname."_flex_dir",
						"std" => "horizontal",
						"type" => "select",
						"class" => "hidden",
						"options" => $flex_type2);
	
	$options[] = array( "name" => "Easing Method",
						"desc" => "Determines the easing method used in jQuery transitions. More info - <a href=\"http://gsgd.co.uk/sandbox/jquery/easing/\">jQuery Easing plugin</a>",
						"id" => $shortname."_flex_ea",
						"std" => "swing",
						"class" => "hidden",
						"type" => "text");					
						
						
	$options[] = array( "name" => "Pause Time",
						"desc" => "Set the speed of the slideshow cycling, in milliseconds.",
						"id" => $shortname."_flex_pause",
						"std" => "7000",
						"class" => "hidden",
						"type" => "text");
	
	$options[] = array( "name" => "Speed of Animations",
						"desc" => "Set the speed of animations, in milliseconds.",
						"id" => $shortname."_flex_spa",
						"std" => "1000",
						"class" => "hidden",
						"type" => "text");										
						
	///////////////////////////////////////////////////////////////////////////////
	
	$options[] = array(
		'name' => "The Number of Items in the Slider",
		'desc' => "Enter a numeric value in the field.",
		'std' => "5",
		'id' => $shortname."_query_count",
		'type' => 'text');
	
	$options[] = array(
		'name' => "Query Settings Slider",
		'desc' => "Select a Query Settings Slider.",
		'id' => $shortname."_query_set",
		'std' => 'category_post',
		'type' => 'radio',
		'options' => $query_array);

	
	//////////////////////hidden///////////////////////////////////////	
	
	$options[] = array(
		'name' => "Select a Post Category",
		'desc' => "Passed an array of categories with cat_ID and cat_name",
		'id' => $shortname."_query_post",
		'type' => 'select',
		"class" => "hidden",
		'options' => $options_categories_post);
	
	
		
	$options[] = array( "name" => "Query Tags",
		"desc" => "Select a Post Tags.",
		"id" => $shortname."_query_tags",
		"std" => "",
		"type" => "select",
		"class" => "hidden",
		"options" => $options_tags);
		
	$options[] = array(
		'name' => "Custom Select a Post",
		'desc' => "Enter a post ID's separated by comma.",
		'id' => $shortname."_query_custom_post",
		"class" => "hidden",
		'type' => 'text');	
		
	
	$options[] = array(
		'name' => "Custom Select a Page",
		'desc' => "Enter a page ID's separated by comma.",
		'id' => $shortname."_query_page",
		"class" => "hidden",
		'type' => 'text');
	
	$options[] = array( "name" => "Contact Page Setting",
						"type" => "heading");
	
	$options[] = array(  "name" => "E-mail To Receive Mail",
			"desc" => "Change Your e-mail",
            "id" => $shortname."_mail_form",
            "std" => "john@johnsmith.com",
            "type" => "text");
			
   
   $options[] = array(  "name" => "Your E-mail",
			"desc" => "Change Your e-mail (support HTML tag)",
            "id" => $shortname."_mail",
            "std" => "<strong>Email:</strong> john@johnsmith.com",
            "type" => "textarea");
			
	
	$options[] = array(  "name" => "Your Location",
			"desc" => "Change Your location (support HTML tag)",
            "id" => $shortname."_location",
            "std" => "Chicago, IL, 111 Webdev St",
            "type" => "textarea");

	$options[] = array(  "name" => "Your Phone",
			"desc" => "Change Your phone (support HTML tag)",
            "id" => $shortname."_phone",
            "std" => "<strong>Phone:</strong> +00 (111) 111-1111-1111",
            "type" => "textarea");

	$options[] = array(  "name" => "Your WebSite",
			"desc" => "Change link to Your WebSite (support HTML tag)",
            "id" => $shortname."_web_site",
            "std" => "<strong>Web:</strong> www.johnsmith.com",
            "type" => "textarea");		
	
	////////////////////////////////////////////////////////////////////					
	
	$options[] = array( "name" => "Social Networking",
						"type" => "heading");
						
	$options[] = array( "name" => "Social Icon in Top page",
	                    "desc" => "Use Social Icon in Top page",
	                    "id" => $shortname."_social_top_page",
	                    "type" => "checkbox",
	                    "std" => "");
							
								
	$options[] = array( "name" => "Twitter",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_twitter",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Dribbble",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_dribbble",
						"std" => "",
						"type" => "text");
										
	
	$options[] = array( "name" => "Facebook",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_facebook",
						"std" => "",
						"type" => "text");	
	
	
	$options[] = array( "name" => "Vimeo",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_vimeo",
						"std" => "",
						"type" => "text");
						
	
	$options[] = array( "name" => "Linkedin",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_linkedin",
						"std" => "",
						"type" => "text");
										
	
	$options[] = array( "name" => "Google Plus",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_googlep",
						"std" => "",
						"type" => "text");	
	
	$options[] = array( "name" => "Flickr",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_flickr",
						"std" => "",
						"type" => "text");
					
	
	$options[] = array( "name" => "Ember",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_ember",
						"std" => "",
						"type" => "text");
						
						
	$options[] = array( "name" => "Evernote",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_evernote",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Forrst",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_forrst",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Github",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_github",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Last-fm",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_last-fm",
						"std" => "",
						"type" => "text");				
						
	$options[] = array( "name" => "Paypal",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_paypal",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Sharethis",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_sharethis",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Skype",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_skype",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Tumblr",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_tumblr",
						"std" => "",
						"type" => "text");
						
						
	$options[] = array( "name" => "Wordpress",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_wordpress",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Yahoo",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_yahoo",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Youtube",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_youtube",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Zerply",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_zerply",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Aim",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_aim",
						"std" => "",
						"type" => "text");	
						
						
	$options[] = array( "name" => "Behance",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_behance",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Digg",
						"desc" => "Change Full URL to Your Profile.",
						"id" => $shortname."_digg",
						"std" => "",
						"type" => "text");																																																	
						
	/////////////////////////////////////////////////////////////
	
	$options[] = array( "name" => "Google Services",
						"type" => "heading");
						
						
	$options[] = array( "name" => "Google Analytics Code",
	                    "desc" => "Change UA-XXXXX-X to be your site's ID",
	                    "id" => $shortname."_ga_code",
	                    "type" => "text",
	                    "std" => "UA-XXXXX-X");
						
	$options[] = array( "name" => "Google Map",
	                    "desc" => "Change your address",
	                    "id" => $shortname."_ga_map",
	                    "type" => "text",
	                    "std" => "Pearl St, NY");					
	
		
								
	return $options;
}