<?php 
wp_reset_query();
global $root; ?>


<div class="span12">
<section>
<div class="row" style="position:relative">

<div class="span12 divider-strip">
            <h3><?php _e('Latest Blog &amp; Testimonials', 'csc-themewp'); ?></h3>
          </div>
</div>
</section>	
</div>  

<div class="span12">
<div class="row">


     
     <div class="span9">
     <div class="row">

				        <?php $recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page=3');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();	?>	

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="span3">

        
       <?php  
	   $thumb = get_post_thumbnail_id(); 
	   if ($thumb){?>

            
            
           <?php if ( has_post_thumbnail()) : ?>


<?php 
$thumb = get_post_thumbnail_id(); 
$image = vt_resize( $thumb, '', 220, 100, true );
?>




                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <img src="<?php echo $image['url']; ?>" />
                  </a>
 <?php endif; ?>
            
<?php  }else{}?>
         
 
<header class="entry-header" style="margin-top:5px;">
<ul class="blog-meta meta pull-left" style="margin:5px 10px 0 0; width:40px">
<li class="post-format"><span style="margin:0;"></span>
</li>
</ul>
<h3 class="post-title" style="font-size:16px; line-height:21px; margin-top:10px;"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'csc-themewp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>  
</header><!-- .entry-header -->

<div class="entry-content home-p" style="margin:5px 0 0 0;">

<?php
the_excerpt();
?>

</div><!-- .entry-content -->


</div>
</article>
<?php 	endwhile;?>

</div>
</div>



<div class="span3">
      <div class="testimonialswrap">
		<ul class="testimonials-slider" id="testimonials" style="overflow:hidden; margin:0;">
           <?php $loop = new WP_Query( array( 'post_type' => 'testimonial_csc', 'posts_per_page' => -1) );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="testimonials-slide">	
<blockquote>
  <p><?php 
 remove_filter ('the_content', 'wpautop'); 
  the_content();?></p>
</blockquote>
<div class="testimonials-client clearfix">                
<?php  
$thumb = get_post_thumbnail_id(); 
if ($thumb){?>       
<?php if ( has_post_thumbnail()) : ?>
<?php 
$thumb = get_post_thumbnail_id(); 
$image = vt_resize( $thumb, '', 40, 40, true );
?>


<img src="<?php echo $image['url']; ?>"  class="left"/>
 <?php endif; ?>
            
<?php  }else{}?>
                 
                 
<small><?php echo get_the_title()?></small>
</div>
			</li>
           <?php  endwhile;?>
            
		</ul>
        <div class="testimonials-controls">
			<a href="#testimonials" class="next-l">1</a>
			<a href="#testimonials" class="prev-l">2</a>
		</div>  
	 </div>
     </div>



</div>
</div>


				
	
