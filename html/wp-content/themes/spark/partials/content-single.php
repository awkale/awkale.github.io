<?php
/**
 * The default template for displaying content
 *
 */
 wp_reset_query();
global $root;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="span8">
<div class="row">


<div class="span8">

   <?php 
   // featured images
        $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(),'post-secondary-image-thumbnail' );
        $featured_images[] = $featured_image_array[0];
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', 'secondary-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'third-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', 'third-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'fourth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', 'fourth-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'fifth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', 'fifth-image', $post->ID ,'post-secondary-image-thumbnail');
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
		?>


<?php

$count = count($featured_images);

?>

<?php if( $count > 1){?>

<style>
#blog_page .theme-default .nivoSlider,#blog_page .theme-default .nivoSlider img{ margin:0px;}
</style>
<div class="row">
 <div class="slider-wrapper-post theme-default span8" style="margin-bottom:20px;">
<div class="nivoSlider"> 
         
         <?php $slider_size_single_post = csc_option('csc_slider_single_post_height');?>
        
         <?php foreach ($featured_images as $image){?>
         
         <?php 
		 $thumb = vt_resize( '', $image, 620, $slider_size_single_post, true ); 
		 ?>

           <a title="<?php the_title(); ?>" href="<?php echo $image ; ?>" rel="prettyPhoto" class="center">
            <img src="<?php echo $thumb['url'];?>" alt="" title=""/>
            </a>
            
<?php  }?>
      
 </div>
 </div>
</div>
  <script type="text/javascript">


jQuery(document).ready(function() {

	jQuery('.nivoSlider').nivoSlider({
		effect:'<?php echo csc_option('nivo_csc_effect'); ?>',
		slices:<?php echo csc_option('nivo_csc_slices'); ?>,
		animSpeed:<?php echo csc_option('nivo_csc_speed'); ?>, //Slide transition speed
        pauseTime:3000,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:<?php echo csc_option('nivo_csc_arr'); ?>, //Next & Prev
        directionNavHide:false, //Only show on hover
        controlNav:false, //1,2,3...
        //controlNavThumbs:false, //Use thumbnails for Control Nav
       // controlNavThumbsFromRel:false, //Use image rel for thumbs
       // controlNavThumbsSearch: '.jpg', //Replace this with...
        //controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
       // keyboardNav:true, //Use left & right arrows
        pauseOnHover:true//Stop animation while hovering
       // manualAdvance:false, //Force manual transitions
       // captionOpacity:0.8, //Universal caption opacity
        //beforeChange: function(){},
       // afterChange: function(){},
       // slideshowEnd: function(){}, //Triggers after all slides have been shown
        //lastSlide: function(){}, //Triggers when last slide is shown
        //afterLoad: function(){} //Triggers when slider has loaded
		//afterChange: function() {}

	});
	
	

});
</script>
<?php }else{?>

<?php $image_size_single_post = csc_option('csc_image_single_post_height');?>

<?php if ( has_post_thumbnail()) : ?>


<?php 
$thumb = portfolio_thumbnail_url($post->ID); 
$image = vt_resize( '', $thumb, 620, $image_size_single_post, true );
?>




                  <a href="<?php print $thumb ; ?>" rel="prettyPhoto" title="<?php the_title_attribute(); ?>" >
                    <img src="<?php echo $image['url']; ?>" />
                  </a>
 <?php endif; ?>

<?php }?>
</div>
 


<ul class="blog-meta meta pull-left span1">
<li class="data"><ul style="margin:0;"><li class="month"><?php the_time('M'); ?></li><li class="day"><?php the_time('d'); ?></li><li class="year"><?php the_time('Y'); ?></li></ul></li>
<li class="post-format"><span></span>
</li>

</ul>


 
 <div class="span7">
 <header class="entry-header">
<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'csc-themewp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
                          
</header><!-- .entry-header -->

  

<div class="entry-content">

 <p><?php

the_content();
?>
</p>

</div><!-- .entry-content -->

</div>


</div>
</div>


<?php include (get_template_directory() . '/share.php'); ?>

<div class="divider" style="margin:0;"></div>
<style>
ul.control-menu { margin:0px; margin-bottom:20px; margin-top:20px;}
ul.control-menu li a{ background-color:#f8f8f8; border:none; font-weight:400; color:#474747; padding-top:7px}
ul.control-menu li a:hover{background-color:#f14a29;border:none;}
</style>
<ul class="control-menu right">
     <li class="prev"><?php be_next_post_link("%link", "<i class=\"icon-arrow-left\"></i> Prev", false, "", '') ?></li>
     <li class="next"><?php be_previous_post_link("%link", "Next <i class=\"icon-arrow-right\"></i>", false, "", '') ?></li>
</ul> 
<?php 
echo blog_author('blog_author_info');
?>

</article><!-- #post-<?php the_ID(); ?> -->


<?php $args = array(
	'before'           => '<p>' . __('Pages:', 'csc-themewp'),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'nextpagelink'     => __('Next page', 'csc-themewp'),
	'previouspagelink' => __('Previous page', 'csc-themewp'),
	'pagelink'         => '%',
	'echo'             => 1
); ?>
<?php wp_link_pages( $args ); ?>