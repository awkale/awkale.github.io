<?php
/**
 * The default template for displaying content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="span8">
<div class="row">

<ul class="blog-meta meta pull-left span1">
<li class="data"><ul style="margin:0;"><li class="month"><?php the_time('M'); ?></li><li class="day"><?php the_time('d'); ?></li><li class="year"><?php the_time('Y'); ?></li></ul></li>
<li class="post-format"><span></span>
</li>
</ul>

<div class="span2">

<?php $image_post_heigh = csc_option('csc_image_post_height');?>
<?php if ( has_post_thumbnail()) : ?>


<?php 
$thumb = get_post_thumbnail_id(); 
$image = vt_resize( $thumb, '', 140, 140, true );
?>




                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <img src="<?php echo $image['url']; ?>" />
                  </a>
 <?php endif; ?>
 </div>
 
 
 <div class="span5">
 <header class="entry-header">
<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'csc-themewp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
                          
</header><!-- .entry-header -->

  

<div class="entry-content">
<?php
global $more;
$more = 0;
?><?php
the_content();
?>
<a class="pull-left" href="<?php the_permalink() ?>"><?php _e('Read More &rarr;', 'csc-themewp'); ?></a>
</div><!-- .entry-content -->

</div>


</div>
</div>

      <div class="span8 entry-info">              
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

<div class="divider-post span8"></div>

</article><!-- #post-<?php the_ID(); ?> -->
