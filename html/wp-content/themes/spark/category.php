
<?php
get_header();
?>
<div class="container slider-cont"> 
  <div class="row">


<!-- Page Title -->
<div class="span12">
<header id="pagehead">
<h1><?php printf( __( 'Category Archives: %s', 'csc-themewp' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
</header>
</div>




<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( '/partials/content', get_post_format() ); ?>

				<?php endwhile; ?>
				
				<?php /* Display navigation to next/previous pages when applicable */ ?>
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<nav id="nav-below">
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'csc-themewp' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'csc-themewp' ) ); ?></div>
					</nav><!-- end nav-below -->
				<?php endif; ?>


</div>
</div>

<div class="span4">

<div class="row">
<div class="span4">
<?php get_sidebar(); ?>
</div>
</div>

</div>

</section>
</div>
</div>
		
<?php get_footer(); ?>