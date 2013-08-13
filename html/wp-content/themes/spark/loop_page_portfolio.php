<?php /*
Template Name: Template Portfolio Layout
*/
get_header(); 
wp_reset_query();
global $root; 
?>


<div class="container slider-cont top_portfolio" id="container-ch"> 
<div class="row" style="position:relative">


                    
                    <?php $portfolio_columns = get_post_meta(get_the_ID(), 'csc_portfolio_columns', true); ?>
                    
                    <?php if ($portfolio_columns == 2)
                      {
                        get_template_part( '/partials/content','portfolio_layout_2' );  
                      } 
		              else if ($portfolio_columns == 3)
                      {
                        get_template_part( '/partials/content','portfolio_layout_3' );
                      } 
		              else if ($portfolio_columns == 4)
                      {
                        get_template_part( '/partials/content','portfolio_layout_4' );
                      }
					  else if ($portfolio_columns == 5)
                      {
                        get_template_part( '/partials/content','portfolio_layout_4_circle' );
                      }
					  else if ($portfolio_columns == 6)
                      {
                        get_template_part( '/partials/content','portfolio_gallery' );
                      }
					  else if ($portfolio_columns == 7)
                      {
                        get_template_part( '/partials/content','portfolio_sideright' );
                      }
					  else if ($portfolio_columns == 8)
                      {
                        get_template_part( '/partials/content','portfolio_sideleft' );
                      }
					  
			
					  
	   
                    else {};
					
					?>



<?php if (csc_option('csc_clients_home_none')) { ?>
<?php include (get_template_directory() . '/loop_clients.php'); ?>
<?php }else{}?>
		
<?php get_footer(); ?>