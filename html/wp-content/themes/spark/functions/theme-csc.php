<?php


if( ! defined('CSC_BASE' ) ) 
{ define( 'CSC_BASE', get_template_directory().'/' ); }

if( ! defined('CSC_BASE_URL' ) ) 
{ define( 'CSC_BASE_URL', get_template_directory_uri().'/' ); }

if( ! defined('CSC_BASE_CSS' ) ) 
{ define( 'CSC_BASE_CSS', get_stylesheet_directory_uri().'/' ); }

//if ( is_admin() ) {
 //   include_once (CSC_BASE . 'update-theme.php');
//} 

/* Load the Theme Functions. */

add_action('after_setup_theme', 'csc_languages_setup');
function csc_languages_setup(){
    load_theme_textdomain('csc-themewp', get_template_directory() . '/languages');
}

$shortname = 'csc';

function theme_csc_styles(){
	
wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, false, 'all');
wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', false, false, 'all');
wp_enqueue_style('nivo-slider', get_template_directory_uri().'/css/nivo-slider.css', false, false, 'all');
wp_enqueue_style('flex-slider', get_template_directory_uri().'/css/flexslider.css', false, false, 'all');
wp_enqueue_style('vegas', get_template_directory_uri().'/css/jquery.vegas.css', false, false, 'all');
wp_enqueue_style('google-code-prettify', get_template_directory_uri().'/js/google-code-prettify/prettify.css', false, false, 'all');
wp_enqueue_style('mediaelementplayer', get_template_directory_uri().'/js/build/mediaelementplayer.min.css', false, false, 'all');
wp_enqueue_style('csc-style', get_template_directory_uri().'/css/csc-style.css', false, false, 'all');
wp_enqueue_style('csc-color', get_template_directory_uri().'/css/csc-color.css', false, false, 'all');
}
add_action('wp_enqueue_scripts', 'theme_csc_styles');

//////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'theme_csc_scripts' );

function theme_csc_scripts() {

  wp_register_script( 'totop', get_template_directory_uri() . '/js/jquery.ui.totop.js', array('jquery'), '1.1', true);
  wp_register_script( 'vegas', get_template_directory_uri() . '/js/jquery.vegas.js', array('jquery'),'', true);
  wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'),'', true);
  wp_register_script( 'form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'),'', true);
  wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),'', true);
  wp_register_script( 'ufvalidator', get_template_directory_uri() . '/js/jquery.ufvalidator-1.0.5.js', array('jquery'),'', true );
  wp_register_script( 'jquerycycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array('jquery'),'', true);
  wp_register_script( 'google-code-prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', array('jquery'),'', true);	
  wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'', true);
  wp_register_script( 'bootstrap-application', get_template_directory_uri() . '/js/application.js', array('jquery'),'', true);
  wp_register_script( 'mediaelement', get_template_directory_uri() . '/js/build/mediaelement-and-player.min.js', array('jquery'),'', true);
  wp_register_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.min.js', array('jquery'),'', true);
  wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'),'', true);
  wp_register_script( 'nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.pack.js', array('jquery'),'', true);
  wp_register_script( 'flex', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'),'', true);
  wp_register_script( 'csctip', get_template_directory_uri() . '/js/jquery.csctip.js', array('jquery'),'', true);
  wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'),'', true);
  wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'),'', true);
  wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'', true);

  wp_enqueue_script( 'totop');
  wp_enqueue_script( 'prettyPhoto');
  wp_enqueue_script( 'form');
  wp_enqueue_script( 'easing');
  wp_enqueue_script( 'ufvalidator' );
  wp_enqueue_script( 'jquerycycle');
  wp_enqueue_script( 'google-code-prettify');	
  wp_enqueue_script( 'bootstrap');
  wp_enqueue_script( 'bootstrap-application');
  wp_enqueue_script( 'mediaelement');
  wp_enqueue_script( 'gmap3');
  wp_enqueue_script( 'isotope');
  wp_enqueue_script( 'nivo');
  wp_enqueue_script( 'flex');
  wp_enqueue_script( 'superfish');
  wp_enqueue_script( 'modernizr');
  wp_enqueue_script( 'vegas');
  wp_enqueue_script( 'custom');


}


//////////////////////////////////////////////////////////////////////

define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/functions' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/functions' ) );
require_once RWMB_DIR . 'meta-box.php';
require_once(get_template_directory() . '/functions/portfolio-csc.php');
require_once(get_template_directory() . '/functions/slider-csc.php');
require_once(get_template_directory() . '/functions/client-csc.php');
require_once(get_template_directory() . '/functions/testimonial-csc.php');
require_once(get_template_directory() . '/functions/previous-and-next-post.php');
require_once(get_template_directory() .'/functions/multi-post-thumbnails.php');
require_once(get_template_directory() .'/functions/vt_resize.php');
require_once(get_template_directory() .'/functions/aq_resizer.php');
require_once(get_template_directory() . '/functions/meta-options.php');
define('SHORT', CSC_BASE . 'functions');
require_once(get_template_directory() .'/functions/loop_widget.php');
require_once(SHORT . '/shortcodes/columns.php');
require_once(SHORT . '/shortcodes/misk.php');
require_once(SHORT . '/shortcodes/icon_fa.php');
require_once(SHORT . '/shortcodes/columns-t.php');
require_once(SHORT . '/shortcodes/shortcode-t.php');
require_once(SHORT . '/shortcodes/icon-fa-t.php');

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 40;
	$args['largest'] = 12;
	$args['smallest'] = 14;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

//////////////////////////////////////////////////////////////////////

function options_stylesheets_theme_style()   {
    if ( csc_option('theme_wide') ) {
		
        wp_enqueue_style( 'options_stylesheets_theme_style', csc_option('theme_wide'), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_theme_style' );

function options_stylesheets_alt_style()   {
	
    if ( csc_option('auto_stylesheet') ) {
		
        wp_register_style( 'color_stylesheet', csc_option('auto_stylesheet'), array(), false, false, 'all' );
		wp_enqueue_style( 'color_stylesheet');
    }
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );


/////////////////////////////////////////////////////////////////////

class blogauthorGenerator {

function blog_author_info()	{

	$author = get_the_author_link();
		$output = '<section>'.
	'<div class="span8"><div class="row">'.
	 
	 '<div class="span8 divider-strip author"><h3>'.__('About the author &nbsp;&frasl;&nbsp;<span>','csc-theme').$author.'</span></h3></div>'.
		'<div class="span1">'.get_avatar( get_the_author_meta('user_email'), '60' ).'</div>'.
		'<div class="span7">'.
			'<p>'.get_the_author_meta('description').'</p>'.
		'</div>'.
	'</div></div>'.
'</section>';
		return $output;
	}
	
}

function blog_author($function){
	global $_blogauthorGenerator;
	if($_blogauthorGenerator==NULL){
		$_blogauthorGenerator = new blogauthorGenerator;
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_blogauthorGenerator, $function ), $args );
}	

//////////////////////////////////////////////////////////////////////


function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

if ( ! function_exists( 'twentyeleven_comment' ) ) :

function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'csc_theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'csc_theme' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'csc_theme' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'csc_theme' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'csc_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'csc_theme' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'csc_theme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; 

if ( ! function_exists( 'twentyeleven_posted_on' ) ) :

function twentyeleven_posted_on() {
	printf( __( '<span class="sep">Posted </span><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span> In </span>', 'csc_theme' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'csc_theme' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

if ( ! function_exists( 'css_theme_posted_on' ) ) :

function css_theme_posted_on() {
	printf( __( '<span class="sep">Posted </span><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'csc_theme' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'csc_theme' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

//////////////////////////////////////////////////////////////////////

add_action('after_setup_theme', 'cscstudio_setup');

if ( ! function_exists( 'cscstudio_setup' ) ):

function cscstudio_setup() {
	
	register_nav_menu( 'csc-theme-menu-main', __( 'CSC Main Navigation' , 'csc-theme') );
	register_nav_menu( 'csc-theme-menu-footer', __( 'CSC Footer Navigation' , 'csc-theme') );
	register_nav_menu( 'csc-theme-menu-side', __( 'CSC Side Navigation' , 'csc-theme') );
	
	wp_create_nav_menu( 'CSC Footer Navigation', array( 'slug' => 'csc-theme-menu-footer' ) );
	wp_create_nav_menu( 'CSC Main Navigation', array( 'slug' => 'csc-theme-menu-main' ) );
	wp_create_nav_menu( 'CSC Side Navigation', array( 'slug' => 'csc-theme-menu-side' ) );

}
endif;


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats', array(
		'aside',
		'chat',
		'link',
		'gallery',
		'status',
		'quote',
		'image',
		'video',
		'audio'
	) );


function my_search_form( $form ) {

    $form = '<form role="search" class="form-search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input class="input-medium search-query" type="text" value="' . get_search_query() . '" name="s" id="s" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

add_filter('widget_text', 'do_shortcode');

//////////////////////////////////////////////////////////////////////

$sidebars = array('Theme Defaul Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

$sidebars = array('Sidebar Bottom Left');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

$sidebars = array('Sidebar Bottom Center');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

$sidebars = array('Sidebar Bottom Right');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

//////////////////////////////////////////////////////////////////////


if (class_exists('MultiPostThumbnails')) 
{ 
 $types = array('post','portfolio');
                foreach($types as $type) {
    new MultiPostThumbnails(array( 'label' => 'Secondary Image', 'id' => 'secondary-image', 'post_type' => $type ) ); 
    new MultiPostThumbnails(array( 'label' => 'Third Image', 'id' => 'third-image', 'post_type' => $type ) );
    new MultiPostThumbnails(array( 'label' => 'Fourth Image', 'id' => 'fourth-image', 'post_type' => $type ) );
    new MultiPostThumbnails(array( 'label' => 'Fifth Image', 'id' => 'fifth-image', 'post_type' => $type ) );
   
 }
}
 
function portfolio_thumbnail_url($pid){
	$image_id = get_post_thumbnail_id($pid);  
	$image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
	return  $image_url[0];  
}

function custom_excerpt_length( $length ) {
	return 170;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function string_limit_words($string, $word_limit)
{
       $words = explode(' ', $string, ($word_limit + 1));
       if(count($words) > $word_limit)
       array_pop($words);
       return implode(' ', $words);
}

function new_excerpt_more($more) {
     global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function get_short_title($maxchar = 15){
	$title = get_the_title();
	if( iconv_strlen($title, 'utf-8') < $maxchar )
		return $title;
	$title = iconv_substr( $title, 0, $maxchar, 'utf-8' );
	$title = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $title);

	return $title;
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'blog-posts', 270, 200, true );
	add_image_size( 'portfolio_img_th', 300, 400, true );
	add_image_size( 'single_posts', 600, 600, true );
	add_image_size( 'home-slide', 940, 350, true );
	add_image_size( 'bg_slider', 112, 70, true );
	add_image_size('post-secondary-image-thumbnail', 1500, 1500, true);
}

function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
 
add_filter('the_excerpt', 'filter_ptags_on_images');

//////////////////////////////////////////////////////////////////////

function round_num($num, $to_nearest) {
   return floor($num/$to_nearest)*$to_nearest;
}

function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First');
    $pagenavi_options['last_text'] = ('Last');
    $pagenavi_options['next_text'] = '&raquo;';
    $pagenavi_options['prev_text'] = '&laquo;';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;
 
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
        //empty - Determine whether a variable is empty
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
 
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil - Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
 
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
 
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi">'."\n";
 
            if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            previous_posts_link($pagenavi_options['prev_text']);
 
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
 
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            next_posts_link($pagenavi_options['next_text'], $max_page);
 
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}


if ( !function_exists( 'optionsframework_init' ) ) {

	/*-----------------------------------------------------------------------------------*/
	/* Options Framework Theme
	/*-----------------------------------------------------------------------------------*/


	if ( CSC_BASE_CSS == CSC_BASE ) {
		define('OPTIONS_FRAMEWORK_URL', CSC_BASE . 'framework/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', CSC_BASE_URL . 'framework/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', CSC_BASE . 'framework/');
		define('OPTIONS_FRAMEWORK_DIRECTORY',  CSC_BASE_CSS . 'framework/');
	}

	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
	require_once (OPTIONS_FRAMEWORK_URL . 'options-sb.php');

}

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { 
$themename = wp_get_theme();
$themename = preg_replace("/\W/", "_", strtolower($themename) );
?>

<script type="text/javascript">
jQuery(document).ready(function() {
		

////////////////////////////////////////////////////////////////////

jQuery('#<?php echo $themename; ?>-csc_query_set-category_post').click(function() {
  		jQuery('#section-csc_query_post').fadeToggle(200);
		
		jQuery('#section-csc_query_portfolio,#section-csc_query_tags,#section-csc_query_page,#section-csc_query_custom_post').fadeOut(200);
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_query_set-category_post:checked').val() !== undefined) {
		jQuery('#section-csc_query_post').show();
	}
	

////////////////////////////////////////////////////////////////////

jQuery('#<?php echo $themename; ?>-csc_query_set-category_custom_post').click(function() {
  		jQuery('#section-csc_query_custom_post').fadeToggle(200);
		
		jQuery('#section-csc_query_portfolio,#section-csc_query_tags,#section-csc_query_page,#section-csc_query_post').fadeOut(200);
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_query_set-category_custom_post:checked').val() !== undefined) {
		jQuery('#section-csc_query_custom_post').show();
	}	

////////////////////////////////////////////////////////////////////
	
jQuery('#<?php echo $themename; ?>-csc_query_set-category_port').click(function() {
		
		jQuery('#section-csc_query_post,#section-csc_query_tags,#section-csc_query_page,#section-csc_query_custom_post').fadeOut(200);
	});
	

////////////////////////////////////////////////////////////////////
	
jQuery('#<?php echo $themename; ?>-csc_query_set-category_slid').click(function() {
		
		jQuery('#section-csc_query_post,#section-csc_query_tags,#section-csc_query_page,#section-csc_query_custom_post').fadeOut(200);
	});


////////////////////////////////////////////////////////////////////
	
jQuery('#<?php echo $themename; ?>-csc_query_set-category_tags').click(function() {
  		jQuery('#section-csc_query_tags').fadeToggle(200);
		
		jQuery('#section-csc_query_post,#section-csc_query_portfolio,#section-csc_query_page,#section-csc_query_custom_post').fadeOut(200);
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_query_set-category_tags:checked').val() !== undefined) {
		jQuery('#section-csc_query_tags').show();
	}
	
////////////////////////////////////////////////////////////////////
	
jQuery('#<?php echo $themename; ?>-csc_query_set-category_page').click(function() {
  		jQuery('#section-csc_query_page').fadeToggle(200);
		
		jQuery('#section-csc_query_post,#section-csc_query_tags,#section-csc_query_portfolio,#section-csc_query_custom_post').fadeOut(200);
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_query_set-category_page:checked').val() !== undefined) {
		jQuery('#section-csc_query_page').show();
	}

////////////////////////////////////////////////////////////////////
		
jQuery('#<?php echo $themename; ?>-csc_slider_type-nivo').click(function() {
	
  		jQuery('#section-nivo_csc_slices,#section-nivo_csc_speed,#section-nivo_csc_arr,#section-nivo_csc_effect,#section-nivo_csc_pause').fadeToggle(200);
		
		jQuery('#section-csc_flex_thum, #section-csc_flex_anim, #section-csc_flex_dir, #section-csc_flex_ea, #section-csc_flex_pause, #section-csc_flex_spa').fadeOut(200);
		
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_slider_type-nivo:checked').val() !== undefined) {
		jQuery('#section-nivo_csc_slices,#section-nivo_csc_speed,#section-nivo_csc_arr,#section-nivo_csc_effect,#section-nivo_csc_pause').show();
		
		jQuery('#section-csc_flex_thum, #section-csc_flex_anim, #section-csc_flex_dir, #section-csc_flex_ea, #section-csc_flex_pause, #section-csc_flex_spa').hide();
}	
	
////////////////////////////////////////////////////////////////////
		
jQuery('#<?php echo $themename; ?>-csc_slider_type-flex').click(function() {
	
  		jQuery('#section-nivo_csc_slices,#section-nivo_csc_speed,#section-nivo_csc_arr,#section-nivo_csc_effect,#section-nivo_csc_pause').fadeOut(200);
		
		jQuery('#section-csc_flex_thum, #section-csc_flex_anim, #section-csc_flex_dir, #section-csc_flex_ea, #section-csc_flex_pause, #section-csc_flex_spa').fadeToggle(200);
	});
	
	if (jQuery('#<?php echo $themename; ?>-csc_slider_type-flex:checked').val() !== undefined) {
		
		jQuery('#section-nivo_csc_slices,#section-nivo_csc_speed,#section-nivo_csc_arr,#section-nivo_csc_effect,#section-nivo_csc_pause').hide();
		
		jQuery('#section-csc_flex_thum, #section-csc_flex_anim, #section-csc_flex_dir, #section-csc_flex_ea, #section-csc_flex_pause, #section-csc_flex_spa').show();
}	
	
});
</script>

<?php } ?>