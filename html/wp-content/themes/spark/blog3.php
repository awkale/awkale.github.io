<?php
/*
Template Name: Blog Page 3
*/
get_header();
?>
<div class="container slider-cont"> 
 <div class="row" >



<?php while ( have_posts() ) : the_post(); ?>
<?php
$sub_title = get_post_meta(get_the_ID(), 'csc_sub_title', true);
?> 
<!-- Page Title -->
<div class="span12">
<header id="pagehead">
<h1><?php the_title(); ?> <small><?php echo $sub_title ?></small></h1>
</header>
</div>

<?php endwhile; // end of the loop. ?>


<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$count_post = csc_option('csc_count_post_page');
$wp_query->query('posts_per_page='.$count_post.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

					<?php get_template_part( '/partials/blog3/content', get_post_format() ); ?>

<?php endwhile; ?>

<div class="navigation span8">
                 <?php if(function_exists('pagenavi')) { pagenavi(); } ?>
                </div>
<?php $wp_query = null; $wp_query = $temp;?>

</div>
</div>

<div class="span4">

<div class="row">
<div class="span4 scroll-side">
<?php generated_dynamic_sidebar(); ?>
</div>
</div>

</div>

</section>
</div>
</div>
		
<?php get_footer(); ?>