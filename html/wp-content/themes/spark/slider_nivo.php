<?php
global $post;

    $number = csc_option( 'csc_query_count' );
	$slider_query = csc_option( 'csc_query_set' );
	
	if( $slider_query == 'category_post' ){
		
		$posts =  csc_option( 'csc_query_post' );
		$args= array('posts_per_page'=> $number , 'cat' => $posts  );
		
    } elseif ( $slider_query == 'category_port' ){
       
	   $args=array('post_type' => 'portfolio','posts_per_page' => $number );
	   
    } elseif ( $slider_query  == 'category_slid'){
		
	  $args=array('post_type' => 'slider_csc','posts_per_page' => $number );
    
	} elseif ( $slider_query  == 'category_tags'){
		
		
		$tags = csc_option( 'csc_query_tags' );
		$args= array('posts_per_page'=> $number , 'tag_id' => $tags);
		
    
	} elseif ( $slider_query  == 'category_page'){
          
		$pages = explode (',' , csc_option( 'csc_query_page' ));
		$args= array('posts_per_page'=> $number , 'post_type' => 'page', 'post__in' => $pages  );

	} elseif ( $slider_query  == 'category_custom_post'){
          
		$pages = explode (',' , csc_option( 'csc_query_custom_post' ));
		$args= array('posts_per_page'=> $number , 'post_type' => 'post', 'post__in' => $pages  );

	}
	
	$featured_query = new WP_Query( $args );
?>


<?php if( csc_option('csc_slider_type') == 'nivo' ){?>

<script type="text/javascript">

jQuery(document).ready(function() {

	jQuery('#sliders').nivoSlider({
		effect:'<?php echo csc_option('nivo_csc_effect'); ?>',
		slices:<?php echo csc_option('nivo_csc_slices'); ?>,
		animSpeed:<?php echo csc_option('nivo_csc_speed'); ?>, //Slide transition speed
        pauseTime:<?php echo csc_option('nivo_csc_pause'); ?>,
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

<!--slider nivoSlider-->

<div id="slider_top" class="span12" style="padding-bottom:35px;border-bottom: 1px solid #E3E3E8;">        
 <section style="padding-top:35px">    
<div class="slider-wrapper-post theme-default row">

<div id="sliders" class="nivoSlider span12" style="margin-bottom:0px; max-height:400px;">

<?php while($featured_query->have_posts()): $featured_query->the_post(); ?>
								<?php if(has_post_thumbnail()): ?>
                                    
                                    <?php $thumb = get_post_thumbnail_id();?>
									<?php $image = wp_get_attachment_url($thumb, 'full'); ?>
                                    
                                    <?php 
									$slider_size_home = csc_option('csc_slider_height');
									$images = aq_resize($image, 940, $slider_size_home , true, true); //resize & retain image proportions (soft crop)?>
                                    
									<a href="<?php if (get_post_meta($post->ID, "csc_project_urlss", true)) { print get_post_meta($post->ID, "csc_project_urlss", true);} else { the_permalink(); } ?>" title="<?php the_title();?>">
                                    <img src="<?php echo $images; ?>" title="<?php the_title(); ?>" alt=""  />
                                    </a>
								
								<?php endif; ?>
							<?php endwhile; ?>
						</div>

</div>
</section>
</div>
<?php
wp_reset_query();
?>


<!-- slider end here --> 

<?php }elseif (csc_option('csc_slider_type') == 'flex' ){?>


<!-- slider begin here -->             

<div id="slider_top" class="span12" style="padding-bottom:35px;padding-top:35px;border-bottom: 1px solid #E3E3E8;">

<!--slider flexiSlider-->

<?php  if ( csc_option('csc_flex_thum')) { ?>

<style>
.flexslider {margin: 0 0 80px 0;}
.flex-control-nav { bottom: -80px; height:78px;}
.flex-control-thumbs li { margin:0; padding:0; border:0;}
.flex-control-thumbs li img { margin:0; padding:0; border:0;}
</style>

<?php } else{ ?>

<style>
.flexslider {margin:0 0 7px 0;}
.flex-control-nav { bottom:-7px; height:6px;}
</style>

<?php } ?>

<div class="flexslider">
  <ul class="slides" style="margin-left:0; margin-bottom:0;">
  
  <?php while($featured_query->have_posts()): $featured_query->the_post(); ?>
  
								<?php if(has_post_thumbnail()): ?>
                                    
                                    <?php $thumb = get_post_thumbnail_id();?>
									<?php $image = wp_get_attachment_url($thumb, 'full'); ?>
									<?php $image_thumb = wp_get_attachment_url($thumb, 'full'); ?>
                                    
                                    <?php 
									$slider_size_home = csc_option('csc_slider_height');
									$images = aq_resize($image, 940, $slider_size_home , true, true); //resize & retain image proportions (soft crop)?>
                                    <?php $images_thumb = aq_resize($image_thumb, 300, 100  , true, true); //resize & retain image proportions (soft crop)?>
                                    
  
    <li data-thumb="<?php echo $images_thumb; ?>">
    
      <a href="<?php if (get_post_meta($post->ID, "csc_project_urlss", true)) { print get_post_meta($post->ID, "csc_project_urlss", true);} else { the_permalink(); } ?>" title="<?php the_title(); ?>"><img src="<?php echo $images; ?>" alt="<?php the_title(); ?>" /></a>
      

      <div class="slider-caption">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <h1><?php the_title(); ?></h1>
                    </a>
	  </div>

      
    </li>
    
<?php endif; ?>
<?php endwhile; ?>

  </ul>
</div>
<script type="text/javascript">
	
jQuery(window).load(function() {

  jQuery('.flexslider').flexslider({
    animation: "<?php echo csc_option('csc_flex_anim'); ?>",
	easing: "<?php echo csc_option('csc_flex_ea'); ?>", 
    direction: "<?php echo csc_option('csc_flex_dir'); ?>",  
    slideshowSpeed: <?php echo csc_option('csc_flex_pause'); ?>, 
    animationSpeed: <?php echo csc_option('csc_flex_spa'); ?>,           
    controlNav: "<?php if ( csc_option('csc_flex_thum')) { echo 'thumbnails';} else{ echo 'true'; } ?>",
    useCSS: false,
	pauseOnHover: true, 
	start: function(slider) {
       		var slide_control_width = 100/<?php echo $number; ?>;
    		jQuery('.flex-control-nav li').css('width', slide_control_width+'%');
      	}
  });
  

});

</script>

</div>
<?php
wp_reset_query();
?>

<!-- slider end here -->


<?php }?>
