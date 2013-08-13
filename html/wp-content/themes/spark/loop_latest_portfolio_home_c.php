<style>
.port-item,.port-info-wrap, .port-info ,.port-info > div{border-radius: 50%;}
.port-info-back h3{ padding-top:30px;}
@media (max-width: 980px) {
.port-item, .port-info-wrap, .port-info, .port-info > div,.port-info-front{-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;}
}
</style>
<?php 
wp_reset_query();
global $root; ?>


<div class="span12">
<section>
<div class="row top_portfolio">
<div class="span12 divider-strip" style="margin-bottom:-5px">
            <h3><?php _e('Latest Portfolio', 'csc-themewp'); ?></h3>
          </div>
</div>
</section>	
</div>          

<div class="span12">

  <ul class="port-block row" style="margin-bottom:0px;">
            	<?php
				$count_item  = rwmb_meta( 'csc_count_items_portfolio', 'type=text' );
            	$i = 100;
            	$loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' =>  $count_item) );
				while ( $loop->have_posts() ) : $loop->the_post(); 			

			    $image_lp =  portfolio_thumbnail_url($post->ID);
				$humb_lp = vt_resize( '', $image_lp, 220, 220, true );
				?>

                     <li class="span3 item-block" style="margin-top:20px;margin-bottom:0px;">
						<div class="port-item" style="background-image: url(<?php echo $humb_lp['url'] ?>)">
                        			
							<div class="port-info-wrap">
                            
								<div class="port-info">
                                
									<div class="port-info-front" style="background-image: url(<?php echo $humb_lp['url'] ?>)"></div>
                                    
									<div class="port-info-back">
										<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title(); ?></a></h3>
										<p><?php remove_filter ('the_excerpt', 'wpautop'); the_excerpt();?>
                                        <a href="<?php echo get_permalink();?>"><?php _e('more info', 'csc-themewp'); ?> </a> &nbsp;&bull;&nbsp; <a href="<?php print  portfolio_thumbnail_url($post->ID) ?>" rel="prettyPhoto"><?php _e('view', 'csc-themewp'); ?></a>
                                        </p>
									</div>
                                    	
								</div>
                                
							</div>
						</div>
					</li>
					
               <?php endwhile;?>
               </ul>

</div>
