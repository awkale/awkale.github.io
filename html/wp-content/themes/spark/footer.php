
 </div>
 <div class="divider"></div>
</div>
<!-- boxed
================================================== -->
</div>
</div>

<!-- Footer
================================================== -->

<?php if (csc_option('theme_wide') == get_stylesheet_directory_uri() . '/css/fullwide.css' ) { ?>
<div class="footers">
<?php  } else if (csc_option('theme_wide') == get_stylesheet_directory_uri() . '/css/boxed.css' ){?>
<div class="container basis-footer shadow footers">
<?php }?>


<div class="row" style="margin-left:0;">

<footer class="container" id="footers">

    <div class="row">
    
      <div class="span4">
        <?php dynamic_sidebar("Sidebar Bottom Left"); ?>
        <?php //include (get_template_directory() . '/socialize.php'); ?>
        <?php include (get_template_directory() . '/js/settingGmap.js.php'); ?>
      </div>
      
      <div class="span4">
       <?php dynamic_sidebar("Sidebar Bottom Center"); ?>
      </div>
      
      <div class="span4">
        <?php dynamic_sidebar("Sidebar Bottom Right"); ?>
      </div>
      
    </div>

  
  <div class="bottom_copy">

    <div class="row">
    
    <div class="span6 copy"><?php echo csc_option('csc_copyright'); ?></div>
    <div class="span6">

<?php $defaults = array(
	'theme_location'  => 'csc-theme-menu-footer',
	'menu'            => '', 
	'container'       => 'div', 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => 'menu-f', 
	'menu_id'         => '',
	//'echo'            => false,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s </ul>',
	'depth'           => 1,
	'walker'          => ''
); ?>

<?php wp_nav_menu( $defaults ); ?>
     </div>
     
  </div>
  
</div>

</footer>

</div>
</div>

 <?php wp_footer(); ?>
</body>
</html>