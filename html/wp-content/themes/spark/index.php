<?php


get_header(); ?>
<div class="container slider-cont"> 
  <div class="row">



<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( '/partials/content', get_post_format() ); ?>

				<?php endwhile; ?>

				<div class="navigation">
                 <?php if(function_exists('pagenavi')) { pagenavi(); } ?>
                </div>

			<?php else : ?>
 <div class="span8">
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'csc-themewp' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'csc-themewp' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
</div>
			<?php endif; ?>

</div>
</div>

<div class="span4">

<div class="row">
<div class="span4">
<?php generated_dynamic_sidebar(); ?>
</div>
</div>

</div>

</section>
</div>
</div>
		
<?php get_footer(); ?>