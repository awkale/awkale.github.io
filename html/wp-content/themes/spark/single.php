<?php
/*
*/
get_header();
wp_reset_query();
global $root; 
?>
<div class="container slider-cont"> 
  <div class="row">


<?php if (have_posts()) :?>
<?php
$sub_title = get_post_meta(get_the_ID(), 'csc_sub_title', true);
?> 
<!-- Page Title -->
<div class="span12">
<header id="pagehead">
<h1><?php echo the_title(); ?> <small><?php echo $sub_title ?></small></h1>
</header>
</div>

<?php endif; ?> 

<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


<?php while ( have_posts() ) : the_post(); ?>

					
					<?php get_template_part( '/partials/content', 'single' ); ?>

					<?php comments_template( '/comments-temp.php'); ?>

				<?php endwhile; // end of the loop. ?>

				<div class="navigation btn-toolbar span8">
                 <?php if(function_exists('pagenavi')) { pagenavi(); } ?>
                </div>


</div>
</div>

<div class="span4">

<div class="row">
<div class="span4 scroll-side">


<?php get_sidebar(); ?>

</div>
</div>

</div>

</section>
</div>
</div>
		
<?php get_footer(); ?>