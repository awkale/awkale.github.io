<?php while ( have_posts() ) : the_post(); ?>
<?php
$csc_promo_text = csc_option('csc_promo_text');
$csc_promo_link = csc_option('csc_promo_link');
$csc_promo_title = csc_option('csc_promo_title');
?> 
    
       <?php if ($csc_promo_text)
                      {?>
       
       
        <div class="span12">
        <section>
        <div class="row">
         <div class="span12 promo-slogan-buy">
         
          <?php echo $csc_promo_text ?>
          
          <?php if ($csc_promo_link) { ?>
                <a href="<?php echo $csc_promo_link; ?>" title="" class="button right" target="_blank" style="margin-right:20px;"><?php echo $csc_promo_title; ?></a>
                <?php } else {}?>
          
          </div>
          </div>      
         </section>
         </div>
         
       
     <?php  }
		   
	else{}?>
      
<?php endwhile; // end of the loop. ?> 