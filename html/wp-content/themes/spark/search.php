<?php
get_header();
?>
<div class="container slider-cont"> 
  <div class="row">


<!-- Page Title -->
<div class="span12">
<header id="pagehead">
<h1><?php _e('Search Results for &ldquo;', 'csc-themewp'); ?><?php the_search_query(); ?>&rdquo;</h1>

</header>
</div>




<div class="span12">
<div class="row">
<section>

<div class="span8" id="blog_page">
<div class="row">

                
                
                  <?php if (have_posts()) : ?>

                        <div class="span8">
        
                            <?php while (have_posts()) : the_post(); ?>
                               
                            <article id="post-<?php the_ID(); ?>" style="padding:10px 20px; background:#f8f8f8; margin-bottom:30px;">
                                <h4 class="post_title" style="font-weight:700"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                   <div class="entry-info">              
          <?php if ( 'post' == get_post_type() ) : ?>

				<?php twentyeleven_posted_on(); ?>
			
			<?php endif; ?>
            
             <?php if ( count( get_the_category() ) ) : ?>
			<?php printf( __( '%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
			<?php endif; ?>
            
        
             			<?php $tags_list = get_the_tag_list( '', ', ' ); 
			if ( $tags_list ): ?>
			<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'csc-themewp' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
			<?php endif; ?> 
            <?php if ( comments_open() ) : ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="%1$s">Comments</span> 0', '<span class="%1$s">Comments</span> 1', '<span class="%1$s">Comments</span> %', 'comments-link', 'Comments are off for this post');; ?></span>
			<?php endif; // End if comments_open() ?>  
            <?php edit_post_link( __( ' Edit', 'csc-themewp' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
                            
                             </article>
                            
                            <?php endwhile; ?>
        
                        </div>
                   
                    <nav>
                        <p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
                    </nav>
        
                    <?php else : ?>
                    <div class="span8">
                    <article>
                        <h3 class="post_title not-mes" style="font-size:48px; font-weight:700; line-height:60px; text-shadow:1px 1px 0 #ccc"><?php _e('Not Found', 'csc-themewp'); ?></h3>
                        <p><?php _e('Sorry, but the requested resource was not found on this site.', 'csc-themewp'); ?></p>
                        <div class="clear"></div>
                    </article>
                    </div>
        
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