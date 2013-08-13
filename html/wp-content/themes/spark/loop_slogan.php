 <?php
$csc_home_slogan = htmlspecialchars_decode(get_post_meta(get_the_ID(), 'csc_home_slogan', true));
?> 
    
       <?php if ($csc_home_slogan)
                      {?>
       
        <div class="span12 promo-slogan">
         <section style="padding-bottom:0px; padding-top:10px">
          <?php echo $csc_home_slogan ?>
          </section>
         </div>
       
     <?php  }
else{}?>