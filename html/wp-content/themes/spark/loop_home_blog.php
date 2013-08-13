
<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$count_post_home = rwmb_meta( 'csc_count_post_home', 'type=text' );
$wp_query->query('posts_per_page='.$count_post_home.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

					<?php get_template_part( '/partials/content', get_post_format() ); ?>

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