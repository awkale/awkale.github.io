<?php
/**
 * The template used for displaying page content in page.php
 */
?>





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

<div class="span12" id="blog_page">
<div class="row">

 <?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="span12">
<?php
the_content();
?>
	</div><!-- .entry-content -->

		<?php edit_post_link( __( 'Edit', 'csc-themewp' ), '<span class="edit-link">', '</span>' ); ?>
    
</article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>

</div>
</div>


</section>
</div>
</div>