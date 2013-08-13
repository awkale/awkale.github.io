<?php 
get_header();
wp_reset_query();
global $root; 
?>
<div class="container slider-cont"> 
  <div class="row">

<?php if (have_posts()) :?>
<?php
$sub_title = get_post_meta(get_the_ID(), 'csc_sub_title', true);
?> 
<!-- Page Title -->
<div class="span12">
<header id="pagehead">
<h1><?php echo the_title(); ?> <small><?php echo $sub_title ?></small></h1>
</header>
</div>

<?php endif; ?> 

<div class="span12">
<div class="row">
<section>

<?php if(have_posts()) ?><?php while(have_posts()) : the_post(); ?>
             
  
   <?php 
		
        $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(),'post-secondary-image-thumbnail'  );
        $featured_images[] = $featured_image_array[0];
		
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio', 'secondary-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio', 'secondary-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio', 'third-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio', 'third-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio', 'fourth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio', 'fourth-image', $post->ID,'post-secondary-image-thumbnail' );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio', 'fifth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio', 'fifth-image', $post->ID ,'post-secondary-image-thumbnail');
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
		?>

        
<div class="span8">
                    
    <?php 
		 
		  $video = get_post_meta(get_the_ID(), 'csc_video_link', true);
		  if ($video){ 
          echo '<iframe src="'.$video.'" width="620" height="400" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe><div class="divider"></div>';
		  }else{
			  
			  
			


$slider_portfolio = rwmb_meta( 'csc_port_slide_show', 'type=checkbox' );?>



<?php if( $slider_portfolio){?>
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
<style>
#blog_page .theme-default .nivoSlider,#blog_page .theme-default .nivoSlider img{ margin:0px;}
</style>
<div class="row">
 <div class="slider-wrapper-post theme-default span8">
<div class="nivoSlider">  

 <?php $slider_size_single_page = csc_option('csc_slider_single_portfolio');?>       
        
<?php  foreach ($featured_images as $image){?>

            
            
         <?php 
		 $thumb = vt_resize( '', $image, 620, $slider_size_single_page, true ); 
		 ?>
           <a title="<?php the_title(); ?>" href="<?php echo $image ; ?>" rel="prettyPhoto" class="center">
            <img src="<?php echo $thumb['url'] ; ?>" alt="" title=""/>
            </a>
            
<?php  }?>


         
 </div>
 </div>
</div>

<?php }else{?>

 <?php $image_size_single_page = csc_option('csc_image_single_portfolio');?> 
 
                 <?php  foreach ($featured_images as $image){?>
                 
                 <?php 
		           $thumb = vt_resize( '', $image, 620, $image_size_single_page, true ); 
		          ?>
                 
                  <a href="<?php echo $image ; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" >
                    <img src="<?php echo $thumb['url'] ; ?>" />
                  </a>
                  
                  <div class="divider"></div>
                  
                  <?php  }?>

<?php }?>  
			  
			  
			  
		<?php	  
			  
			  }
	     ?>
                     
</div>
   
<div class="span4"> 
<style>
.sidebar_block{ display:block; margin-bottom:10px;} 
.sidebar_block h3{font-size:14px; font-family: 'Open Sans Condensed', sans-serif;font-weight:700; margin-bottom:20px; margin-top:10px; border-bottom:1px #e0e0e0 solid; line-height:22px} 
.sidebar_block h3.titles{font-size:22px;margin-top:0; line-height:22px; padding:0; font-weight:700; text-transform:uppercase; border:none; margin-bottom:20px;} 
.sidebar_block h4{font-family: 'Open Sans Condensed', sans-serif;font-weight:700; margin-bottom:10px; margin-top:10px; text-transform: capitalize; font-size:18px;padding-left:5px;}
.sidebar_block p { padding-left:5px; margin-bottom:30px;}
ul.control-menu li a{ border:none; font-weight:400;}
ul.control-menu li a:hover{background-color:#f14a29;border:none;}
</style>  

           
             
<div class="sidebar_block">
<h3 class="titles"><?php the_title(); ?></h3>
</div>

<div class="sidebar_block">
<h3><?php _e('Client', 'csc-themewp'); ?></h3>
<h4 style="margin-bottom:10px;"><?php $pr_client = get_post_meta(get_the_ID(), 'csc_project_client', true); echo $pr_client; ?></h4>
<?php the_content(); ?>
</div>

<div class="sidebar_block">
<h3><?php _e('Skills', 'csc-themewp'); ?></h3>
<h4 style="margin-bottom:10px;"><?php $pr_skills = get_post_meta(get_the_ID(), 'csc_project_skills', true); echo $pr_skills; ?></h4>
<p style="margin-top:20px;">
<?php if(get_post_meta($post->ID, "_url", true)){ ?>
                <a href="<?php print get_post_meta($post->ID, "_url", true); ?>" title="<?php the_title();?>" target="_blank"><?php _e('visit site &rarr;', 'csc-themewp'); ?></a>
<?php } else {}?>
</p>
</div>


<?php endwhile; ?>


 
<ul class="control-menu">
     <li class="prev"><?php be_next_post_link("%link", "<i class=\"icon-arrow-left\"></i>", false, "", 'tagportifolio') ?></li>
     <li class="next"><?php be_previous_post_link("%link", "<i class=\"icon-arrow-right\"></i>", false, "", 'tagportifolio') ?></li>
</ul> 

 
</div>           


</section>
</div>
</div>

<?php if (csc_option('csc_clients_single_none')) { ?>
<?php include (get_template_directory() . '/loop_clients.php'); ?>
<?php }else{}?>


<?php get_footer(); ?>