<div class="span12">
<div class="row">
<section>

<div class="span12" id="blog_page">
<div class="row">

 <?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php 
the_content();
?>
    
</article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>

</div>
</div>


</section>
</div>
</div>