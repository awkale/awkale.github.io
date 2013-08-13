<?php
/*
 * @ HTML5 Theme
 * @ Version 1.0
 * @ Created by NORDiX
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="shortcut icon" href="<?php echo csc_option('csc_favicon'); ?>"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->



<?php
wp_enqueue_script( 'jquery' );
wp_head();
?>

<?php include (get_template_directory() . '/typo.php'); ?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $font_content; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_pages; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_page; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_page2; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_page3; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_menu; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_slogan; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|<?php echo $font_title_body; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php  
if ( csc_option('auto_stylesheet') ) {

} else {
  include (get_template_directory() . '/css/typo-css.php'); 
}
?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo csc_option('csc_ga_code'); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<?php 

///////////////////////
if (csc_option('theme_wide') == get_stylesheet_directory_uri() . '/css/boxed.css' )
{?>

<body <?php 
body_class(); 
///////////////////////
$images_bg_no ='';
$images_bg ='';
$bg_color_page ='';
$images_bg = rwmb_meta( 'csc_screenshot32', 'type=image' );
$bg_color_page = rwmb_meta( 'csc_bg_color_page', 'type=color' );
if (!empty ($images_bg))
{
foreach ( $images_bg as $image_no_res )
    {
   $images_bg_no = $image_no_res['full_url'];
    }
}

///////////////////////
?> <?php 
if ($images_bg_no && $bg_color_page !== '#'){ echo 'style="background:'.$bg_color_page.' url(' .$images_bg_no. ') fixed;"';}
elseif ($images_bg_no && $bg_color_page == '#'){ echo 'style="background: url(' .$images_bg_no. ') fixed;"';}
elseif ($images_bg_no){ echo 'style="background: url(' .$images_bg_no. ') fixed;"';}
elseif ($bg_color_page == '#'){$background = csc_option('csc_theme_background'); echo 'style="background: '.$background['color'].' url('.$background['image'].') '.$background['repeat'].' '.$background['position'].' '.$background['attachment'].' "';}
elseif ($bg_color_page){ echo 'style="background-color:'.$bg_color_page.'"';}
else{ $background = csc_option('csc_theme_background'); echo 'style="background: '.$background['color'].' url('.$background['image'].') '.$background['repeat'].' '.$background['position'].' '.$background['attachment'].' "';}; 
?>>

<?php 
//////////////////////////
$slide_bg_show = rwmb_meta( 'csc_bg_slide_show', 'type=checkbox' );
$slide_bg_delay = rwmb_meta( 'csc_bg_slide_delay', 'type=text' );
////////////////// overlay
$images = rwmb_meta( 'csc_overlay_bg');
$over_bg = $images;
?>
 
<?php if ($images_bg){?>

<?php 
} else if ($slide_bg_show){ ?>

<script type="text/javascript">
jQuery( function() {
	
	jQuery.vegas( 'slideshow', { 
        backgrounds:[ <?php  
$metas = rwmb_meta( 'csc_screenshot3', 'type=image' );
foreach ( $metas as $meta )
{
print_r( '{ src:\''.$meta['full_url'].'\'},');
}
?>],
fade: 1000,
delay: <?php if ($slide_bg_delay){ echo $slide_bg_delay;}else{ echo '3000';} ?>,
valign:'center', 
align:'center' 
     })('overlay', {
	src:'<?php echo get_template_directory_uri(); ?>/images/overlays/<?php echo $over_bg; ?>.png',
	opacity:0.5
  });

});
</script>
  
 <?php } else {?>
 
 <?php 
  //////////////bg image resize
 $images_bg ='';
 $images = rwmb_meta( 'csc_screenshot3', 'type=image' );
if (!empty ($images))
{
 foreach ( $images as $imagess )
    {
   $images_bg = $imagess['full_url'];
    }
}
 ?> 
<script type="text/javascript">
jQuery( function() {
	
  jQuery.vegas({
    src:'<?php echo $images_bg; ?>',
	fade:100, // milliseconds,
	valign:'center', // top, center, bottom or %
    align:'center' // left, center, right or %
	
  })('overlay', {
	src:'<?php echo get_template_directory_uri(); ?>/images/overlays/<?php echo $over_bg; ?>.png',
	opacity:0.5
  });
  
});
</script>
 
 <?php }?>
 <?php
 /////////////////////////////////////////////////////// 
 } else if (csc_option('theme_wide') == get_stylesheet_directory_uri() . '/css/fullwide.css' ) { ?>
<body  <?php body_class();?>  > 
<?php  }?>

<?php if ( csc_option('csc_social_top_page') ) {?>
<div class="container" id="top">
 <div class="row" style="margin-left:0;">
<?php include (get_template_directory() . '/socialize.php'); ?>
</div>
</div>
 <?php } ?>
     
<div class="container basis shadow" style="position:relative; background:#ffffff;">
 <div class="row" style="margin-left:0;">
<div class="container" style="position:relative;">

<!-- Logo / Menu
================================================== -->
<header class="header default">
<div class="row">

      <div class="span4">
      <?php if ( csc_option('csc_logo_theme') ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo csc_option('csc_logo_theme'); ?>" /></a>
							<?php } ?>
      </div>
      <div class="span8">

<?php $defaults = array(
	'theme_location'  => 'csc-theme-menu-main',
	'menu'            => '', 
	'container'       => 'nav', 
	'container_class' => '', 
	'container_id'    => 'menu-top',
	'menu_class'      => 'menu', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
); ?>

<?php wp_nav_menu( $defaults ); ?>

  </div>
  
</div>
</header>
</div>