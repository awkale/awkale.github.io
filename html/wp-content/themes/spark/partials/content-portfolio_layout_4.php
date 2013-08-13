<?php wp_reset_query();
global $root; ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
$sub_title = get_post_meta(get_the_ID(), 'csc_sub_title', true);
?> 
<!-- Page Title -->
<div class="span12 strip-lines">
<div class="row">

<div class="span6">
<header id="pagehead" style="border:none">
<h1><?php the_title(); ?> <small><?php echo $sub_title ?></small></h1>
</header>
</div>
	<?php $metas = wp_get_post_terms($post->ID, 'tagportifolio', array("fields" => "names"));?>
<?php endwhile;?>

    <div class="span6" id="filters" style="margin-top:45px;">
  
    
    <?php
	

	 
	$count = count($metas);
	
	    if ( $count <= 0 )
			  
			  {      
	
				 $terms = get_terms("tagportifolio");
				 $count = count($terms);
				 echo '<ul class="filter-data" data-option-key="filter">';
					echo '<li><a href="#filter" title="" class="currents selected" data-option-value="*">All</a></li>';
				 if ( $count > 0 ){
					
						foreach ( $terms as $term ) {
							
							$termname = strtolower($term->name);
							$termname = str_replace(' ', '-', $termname);
							echo '<li><a href="#filter" title="" data-option-value=".'.$termname.'">'.$term->name.'</a></li>
							';
						}
				 }
				 echo "</ul>";
				 
				 
			  }else{


				 $terms = wp_get_post_terms($post->ID, 'tagportifolio', array("fields" => "names"));
				 $count = count($terms);
				 
				 if ( $count > 1 ){
				 
				 echo '<ul class="filter-data" data-option-key="filter">';
					echo '<li><a href="#filter" title="" class="currents selected" data-option-value="*">All</a></li>';
				 
					
						foreach ( $terms as $key => $value ) {
							
							$termname = strtolower($value);
							$termname = str_replace('-',' ', $termname);
							//$a=str_replace('-', '%20', $a);
							echo '<li><a href="#filter" title="" data-option-value=".'.$termname.'">'.$termname .'</a></li>
							';
						}
				 }
				 echo "</ul>";
				 
			  }
				 
			?>
        
        </div>
        
 </div>
 </div>       
        
             
        
             
      <div class="span12">
       <div class="row">
       <section>  
          <?php 

 if( wp_get_post_terms($post->ID, 'tagportifolio', array("fields" => "names")))
			  
			  { 
			  
			  
	$args=array(
    'tax_query' => array(
        array(
            'taxonomy' => 'tagportifolio',
            'field' => 'slug',
            'terms' =>  $metas
        )
    ),
    'post_type' => 'portfolio',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => '-1'
);
			  
			  
			 
} else {
				  
				  
	$args=array(
	
    'post_type' => 'portfolio',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => '-1'
);	  

}

$loop = new WP_Query($args);
	
?>
           <ul class="port-block row portfolio" id="portfolio-list" style="margin-left:0;">
             <?php if ( $loop ) : 
					 
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
						<?php
						$terms = get_the_terms( $post->ID, 'tagportifolio');
								
						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();

							foreach ( $terms as $term ) 
							{
								$links[] = $term->name;
							}
							$links = str_replace(' ', '-', $links);	
							$tax = join( " ", $links );		
						else :	
							$tax = '';	
						endif;
						
						
						?>
                        
           <?php 
			$image =  portfolio_thumbnail_url($post->ID);
			$humb = vt_resize( '', $image, 220, 220, true );
			?>
                       
                        
          <li class="span3 <?php echo strtolower($tax); ?> all item-block">
          

          
          
           <div class="port-item" style="background-image: url(<?php echo $humb['url'] ?>)">				
							<div class="port-info-wrap">
                            
								<div class="port-info">
									<div class="port-info-front" style="background-image: url(<?php echo $humb['url'] ?>)"></div>
									<div class="port-info-back">
										<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title(); ?></a></h3>
										<p><?php remove_filter ('the_excerpt', 'wpautop'); the_excerpt();?>
                                        <a href="<?php echo get_permalink();?>"><?php _e('more info', 'csc-themewp'); ?> </a> &nbsp;&bull;&nbsp; <a href="<?php print  portfolio_thumbnail_url($post->ID) ?>" rel="prettyPhoto" title="<?php echo get_the_title(); ?>"><?php _e('view', 'csc-themewp'); ?></a>
                                        </p>
									</div>	
								</div>
                                
							</div>
						</div> 
           
          
 
         
            
           
          </li>
						
					<?php endwhile; else: ?>
					 
					<li class="error-not-found"><?php _e('Sorry, no portfolio entries for while.', 'csc-themewp'); ?></li>
						
				<?php endif; ?>
               
			

</ul>
<!-- portfolio end here -->


   </section> 
   </div>
       </div>
       