 <section style="display:inline-block" class="clients_block">
        
          <div class="span12 divider-strip">
            <h3><?php _e('Clients', 'csc-themewp'); ?></h3>
          </div>
          
          
      <div class="span12" style="margin-bottom:0;">
        <div class="row">

				 <?php

global $post;
$args = array(
	'post_type' =>'client_csc',
	'numberposts' => 6,
	'orderby' => 'ASC'
);
$client_posts = get_posts($args);
?>

<?php
// show slider only if slides exist
if($client_posts) {
?>
<?php
// start the loop
foreach($client_posts as $post) : setup_postdata($post);
// get image
$thumb = wp_get_attachment_image_src(get_post_thumbnail_id());
?>

<div class="span2" style=" background:#efefef;">

<a href="<?php print get_post_meta($post->ID, "csc_project_urls", true); ?>" title="<?php the_title();?>" target="_blank" style="margin:1px; background:#ffffff; display:block"><img src="<?php echo $thumb[0]; ?>" title="<?php the_title();?>" alt="" /></a>

</div>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>

<?php } ?>
			</div>
		</div>
                
                
</section>