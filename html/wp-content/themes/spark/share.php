<?php if (csc_option('csc_share_post')) { ?>

<div class="share span8">
<h3>Share This Post</h3>

<ul class="socicon-2 right">

            <li><a href="http://www.twitter.com/share?url=<?php echo get_permalink(); ?>" class="soc-follow twitter"  title="twitter" target="_blank"></a></li>
            
            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;t=<?php echo get_the_title(); ?>" class="soc-follow facebook"  title="facebook" target="_blank"></a></li>
          
            <li><a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>&amp;title=<?php echo get_the_title(); ?>" class="soc-follow linkedin"  title="linkedin" target="_blank"></a></li>
            
            <li><a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>&amp;title=<?php echo get_the_title(); ?>" class="soc-follow google" title="google plus" target="_blank"></a></li>
       
            
            <li><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()) ?>&name=<?php echo urlencode(get_the_title()) ?>&description=<?php remove_filter ('the_excerpt', 'wpautop');  echo urlencode(the_excerpt()) ?>" class="soc-follow tumblr"  target="_blank"></a></li>
            
            </ul>

  </div>    
<?php } else { ?>
<?php } ?>