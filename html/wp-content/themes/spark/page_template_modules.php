<?php 
/*
Template Name: Template Page with Modules 
*/ 
?>
<?php 

get_header();
global $post;
?>
  
                
<div class="container slider-cont"> 
  <div class="row">

<?php 
$metass = get_post_meta( get_the_ID(), 'csc_layout_page', true );

    foreach ( $metass as $value )
    {
		
    include ( get_template_directory().'/'.$value );

    }	
	
 ?>


<?php get_footer(); ?>

