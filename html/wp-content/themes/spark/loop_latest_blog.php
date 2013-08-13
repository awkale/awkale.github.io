<?php 
wp_reset_query();
global $root, $timthumb; ?>


<div class="span12">
<section>
<div class="row" style="position:relative">

<div class="span12 divider-strip">
            <h3><?php _e('Latest Blog', 'csc-themewp'); ?></h3>
          </div>
</div>
</section>	
</div>  

<div class="span12">
<div class="row">


     
     <div class="span12">
     <div class="row">

				        <?php 
						$count_post = rwmb_meta( 'csc_count_items_post', 'type=text' );
            	       
						
						
						$recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page='.$count_post.'');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();	?>	

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="span3" style="margin-bottom:20px">

        
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


</div>
</div>


				
	
