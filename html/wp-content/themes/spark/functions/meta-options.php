<?php 

global $meta_boxes;
global $shortname;
$prefix = $shortname . "_";
$meta_boxes = array();


$meta_boxes[] = array(
  'id' => 'layout_page',
  'title' => 'Please choose page modul ( Important! Available only for Template Page with Modules )',
  'pages' => array('page'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Modules List ',
		'id' => $prefix .'layout_page',
		'type' => 'select',
		'clone' => true,
		'options' => array(
		        'slider_nivo.php' => 'Slider NIVO / Flex',
		        'loop_content.php' => 'Content',
				'loop_content-title.php' => 'Content with Title',
				'loop_home_blog.php' => 'Blog Page',
				'loop_slogan.php' => 'Slogan',
				'loop_latest_portfolio_home.php' => 'Latest Portfolio',
				'loop_latest_portfolio_home_c.php' => 'Latest Portfolio Circle',
				'loop_latest_blog.php' => 'Latest Blog',
				'loop_latest_blog_no_image.php' => 'Latest Blog Without Image',
				'loop_latest_blog_testimonial.php' => 'Latest Blog / Testimonial',
				'loop_clients.php' => 'Clients',
				'loop_promo_banner.php' => 'Promo Banner'
				
			)
		)
	
  )
);


$meta_boxes[] = array(

  'id' => 'count_item_portfolio',
  'title' => 'Amount of Portfolio Item in Module Latest Portfolio',
  'pages' => array('page'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
			
			array(
			'desc' => 'How many item do you want to display?',
			'id'   => $prefix .'count_items_portfolio',
			"type" => "text",
	        "std" => "8"
			)

		)
);

$meta_boxes[] = array(

  'id' => 'count_item_blogs',
  'title' => 'Amount of Post in Module Latest Blog',
  'pages' => array('page'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
			
			array(
			'desc' => 'How many post do you want to display?',
			'id'   => $prefix .'count_items_post',
			"type" => "text",
	        "std" => "8"
			)

		)
);

$meta_boxes[] = array(

  'id' => 'count_item_blog',
  'title' => 'Amount of Post in Module Blog Page',
  'pages' => array('page'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
			
			array(
			'desc' => 'How many post do you want to display?',
			'id'   => $prefix .'count_post_home',
			"type" => "text",
	        "std" => "3"
			)

		)
);




$meta_boxes[] = array(
  'id' => 'portfolio_columns',
  'title' => 'Choose Portfolio Columns Layout ( Important! Available only for Template Portfolio Columns )',
  'pages' => array('page'),
  'context' => 'side',
  'priority' => 'core',
  'fields' => array(
	array(
		'name' => 'Portfolio Columns Layout',
		'id' => $prefix .'portfolio_columns',
		'type' => 'select',
		'options' => array(
				//'1' => '1 column layout',
				'2' => '2 column layout',
				'3' => '3 column layout',
				'4' => '4 column layout',
				'5' => '4 column circle layout',
				'6' => 'Gallery layout',
				'7' => 'Portfolio + R Sidebar',
				'8' => 'Portfolio + L Sidebar'
				//'41' => '4 column no separated'
			)
		)
	
  )
);


$meta_boxes[] = array(
	'id' => 'cat_portfolio_ch',							
	'title' => 'Choose a Portfolio Source Category ( Important! Available only for Template Portfolio Columns )',
	'pages' => array('page'),	
	'context' => 'side',						
	'priority' => 'core',						

	'fields' => array(							

		array(
			'name' => 'Select Which Portfolio Source to Use.',
			'id' => $prefix . 'cats_portfolio',
			'type' => 'taxonomy',					
			'options' => array(
				'taxonomy' => 'tagportifolio',		
				'type' => 'checkbox_list',					
				'args' => array()
			),
			'desc' => 'None Checking - Use All Categories'
		)
	)
);

$meta_boxes[] = array(
  'id' => 'page_bg_images2',
  'title' => 'Background Pattern ( No Resize )',
  'pages' => array('page','post','portfolio'),
  'context' => 'side',
  'priority' => 'low',
  'fields' => array(
		array(
			'name' => 'Upload a Background  Image',
			'desc' => '',
			'id'   => $prefix .'screenshot32',
			'type' => 'thickbox_image',
		),
		array(
			'name' => 'Choose Background Color',
			'desc' => '',
			'id'   => $prefix .'bg_color_page',
			'type' => 'color',
			'std' =>''
		)
	
  )
);



$meta_boxes[] = array(
  'id' => 'page_bg_images',
  'title' => 'Background Image Fullwide ( Resize )',
  'pages' => array('page','post','portfolio'),
  'context' => 'side',
  'priority' => 'low',
  'fields' => array(
		array(
			'name' => 'Upload a BG Image',
			'desc' => '',
			'id'   => $prefix .'screenshot3',
			'type' => 'thickbox_image',
		),
		array(
			'name' => 'SlideShow Bg Image?',
			'desc' => '',
			'id'   => $prefix .'bg_slide_show',
			'type' => 'checkbox',
		),
		array(
			'name' => 'Slide pause : ',
			'desc' => 'ex: 5000',
			'id'   => $prefix .'bg_slide_delay',
			'type' => 'text',
		    'std' => "5000"
		)
	
  )
);



$meta_boxes[] = array(
  'id' => 'overlay_bg',
  'title' => 'Overlay Background Image',
  'pages' => array('page','post','portfolio'),
  'context' => 'side',
  'priority' => 'low',
  'fields' => array(
	array(
		'name' => 'Choose a Overlay BG Image',
		'id' => $prefix .'overlay_bg',
		'type' => 'select',
		'options' => array(
	"0" => "None",	
	"01" => "Pattern 1",
	"02" => "Pattern 2",
	"03" => "Pattern 3",
	"04" => "Pattern 4",
	"05" => "Pattern 5",
	"06" => "Pattern 6",
	"07" => "Pattern 7",
	"08" => "Pattern 8",
	"09" => "Pattern 9",
	"10" => "Pattern 10",
	"11" => "Pattern 11",
	"12" => "Pattern 12",
	"13" => "Pattern 13",
	"14" => "Pattern 14",
	"15" => "Pattern 15"
			)
		)
	
  )
);


$meta_boxes[] = array(
  'id' => 'page_subtitle',
  'title' => 'Enter a Subtitle Page',
  'pages' => array('page','portfolio'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Enter a Subtitle Page',
		'id' => $prefix .'sub_title',
		'desc' => '',
		'type' => 'textarea'
		)
	
  )
);


$meta_boxes[] = array(
  'id' => 'page_slogan',
  'title' => 'Slogan',
  'pages' => array('page'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Enter a Slogan Page',
		'id' => $prefix .'home_slogan',
		'desc' => '',
		'std' => '<h1>Welcome to <a href="#">SPARK </a> is creative and responsive HTML5&amp;CSS3 WP Theme</h1><span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</span>',
		'type' => 'textarea'
		
		)
	
  )
);


//////////////////////slider///////////////////////////////////



$meta_boxes[] = array(
	'id' => 'project_info',							// meta box id, unique per meta box
	'title' => 'Project URL',			// meta box title
	'pages' => array('slider_csc'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'side',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'URL',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix .'project_urlss',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' =>''
		)
	)
);



//////////////////////clients///////////////////////////////////

$meta_boxes[] = array(
	'id' => 'project_info',							// meta box id, unique per meta box
	'title' => 'Project URL',			// meta box title
	'pages' => array('client_csc'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'side',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'URL',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix .'project_urls',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' =>''
		)
	)
);


////////////////////portfolio////////////////////////////////////


$meta_boxes[] = array(
	'id' => 'portfolio_video',							// meta box id, unique per meta box
	'title' => 'Video',			// meta box title
	'pages' => array('portfolio'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'Link to video',					// field name
			'desc' => 'Example: Vimeo - http://player.vimeo.com/video/28220269 / Youtube - http://www.youtube.com/embed/knWnMKKEt88',	// field description, optional
			'id' => $prefix .'video_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 200px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
	)
);

$meta_boxes[] = array(
	'id' => 'project_summary',							// meta box id, unique per meta box
	'title' => 'Project Summary',			// meta box title
	'pages' => array('portfolio'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'side',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'Skills',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix .'project_skills',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' =>''
		),
		array(
			'name' => 'Client',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix .'project_client',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' =>''
		)
	)
);

$meta_boxes[] = array(
  'id' => 'use_slider_portfolio',
  'title' => 'Use Slider in Portfolio Single Page',
  'pages' => array('portfolio'),
  'context' => 'side',
  'priority' => 'core',
  'fields' => array(
		array(
			'name' => 'SlideShow Portfolio Item Images?',
			'desc' => '',
			'id'   => $prefix .'port_slide_show',
			'type' => 'checkbox',
		)
	
  )
);


function pages_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'pages_register_meta_boxes' );
?>