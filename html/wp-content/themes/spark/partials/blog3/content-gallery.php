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

<ul class="blog-meta meta pull-left span1">
<li class="data"><ul style="margin:0;"><li class="month"><?php the_time('M'); ?></li><li class="day"><?php the_time('d'); ?></li><li class="year"><?php the_time('Y'); ?></li></ul></li>
<li class="post-format"><span></span>
</li>
</ul>


<div class="span7">


<style>
#blog_page .theme-default .nivoSlider<?php the_ID(); ?>,#blog_page .theme-default .nivoSlider<?php the_ID(); ?> img{ margin:0px;}
</style>
<div class="row">
 <div class="slider-wrapper-post theme-default span7" style="overflow:hidden; margin-bottom:30px;">
<div class="nivoSlider<?php the_ID(); ?>">  

    
    
   <?php 

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
		
		$slider_size_post = csc_option('csc_slider_post_height');
		?>
        
        
         <?php foreach ($featured_images as $image){?>
         
         <?php 
		 $thumb = vt_resize( '', $image, 540, $slider_size_post, true ); 
		 ?>

           <a title="<?php the_title(); ?>" href="<?php echo $thumb['url'] ; ?>" rel="prettyPhoto" class="center">
            <img src="<?php echo $thumb['url'];?>" alt="" title=""/>
            </a>
         
<?php  }?>
   
 </div>
 </div>
</div>

 <header class="entry-header">
<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'csc-themewp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
                          
</header><!-- .entry-header -->

  

<div class="entry-content">
<?php
global $more;
$more = 0;
?> 
<?php
the_content('...');
?>
<a class="pull-left" href="<?php the_permalink() ?>"><?php _e('Read More &rarr;', 'csc-themewp'); ?></a>
</div><!-- .entry-content -->

</div>


</div>
</div>

      <div class="span8 entry-info">              
          <?php if ( 'post' == get_post_type() ) : ?>

				<?php twentyeleven_posted_on(); ?>
			
			<?php endif; ?>
            
             <?php if ( count( get_the_category() ) ) : ?>
			<?php printf( __( '%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
			<?php endif; ?>
            
        
             			<?php $tags_list = get_the_tag_list( '', ', ' ); 
			if ( $tags_list ): ?>
			<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'csc-themewp' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
			<?php endif; ?> 
            <?php if ( comments_open() ) : ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="%1$s">Comments</span> 0', '<span class="%1$s">Comments</span> 1', '<span class="%1$s">Comments</span> %', 'comments-link', 'Comments are off for this post');; ?></span>
			<?php endif; // End if comments_open() ?>  
            <?php edit_post_link( __( ' Edit', 'csc-themewp' ), '<span class="edit-link">', '</span>' ); ?>
            </div>

<div class="divider-post span8"></div>

</article><!-- #post-<?php the_ID(); ?> -->

<script type="text/javascript">


jQuery(document).ready(function() {

	jQuery('.nivoSlider<?php the_ID(); ?>').nivoSlider({
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