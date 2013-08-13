<?php
/*
Template Name: 404 Page
*/
get_header(); ?>
<div class="container slider-cont"> 
  <div class="row">



<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">


 <div class="span8">
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title not-mes" style="font-size:100px; font-weight:700; line-height:120px; text-shadow:1px 1px 0 #ccc"><?php _e( 'Ooops ! 404 !', 'csc-themewp' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p style="font-size:18px; font-weight:400; text-shadow:1px 1px 0 #ccc"><?php _e( "404 error, couldn't find the content you were looking for.", 'csc-themewp' ); ?></p>
						
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
</div>


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