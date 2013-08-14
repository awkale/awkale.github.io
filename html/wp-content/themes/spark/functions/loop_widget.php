<?php
/*
 *Testimonial Widget
 */

add_action( 'widgets_init', 'csc_testimonial_widgets' );

function csc_testimonial_widgets() {
	register_widget( 'csc_Testimonial_Widget' );
}

class csc_testimonial_widget extends WP_Widget {


	function csc_Testimonial_Widget() {

		$widget_ops = array( 'classname' => 'testimonial-widget', 'description' => __('A widget that displays a random testimonial.') );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_testimonial_widget' );

		$this->WP_Widget( 'csc_testimonial_widget', __('Custom Random Testimonial'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		 ?>

      <div class="testimonialswrap">
		<ul class="testimonials-slider" id="testimonials" style="overflow:hidden; margin:0;">
           <?php $loop = new WP_Query( array( 'post_type' => 'testimonial_csc', 'posts_per_page' => -1) );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="testimonials-slide">
<blockquote>
  <p><?php
  remove_filter ('the_content', 'wpautop');
  the_content();?></p>
</blockquote>
<div class="testimonials-client clearfix">
<?php
$thumb = get_post_thumbnail_id();
if ($thumb){?>
<?php if ( has_post_thumbnail()) : ?>
<?php
$thumb = get_post_thumbnail_id();
$image = vt_resize( $thumb, '', 40, 40, true );
?>


<img src="<?php echo $image['url']; ?>"  class="left"/>
 <?php endif; ?>

<?php  }else{}?>


<small><?php echo get_the_title()?></small>
</div>
			</li>
           <?php  endwhile;?>

		</ul>
        <div class="testimonials-controls">
			<a href="#testimonials" class="next-l">1</a>
			<a href="#testimonials" class="prev-l">2</a>
		</div>
	 </div>



		<?php

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );



		return $instance;
	}


	function form( $instance ) {

		$defaults = array(
		'title' => 'Widget Testimonials',

		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>



	<?php
	}
}
?>
<?php
/*
 * Latest Tweets
 */


add_action( 'widgets_init', 'csc_tweets_widgets' );

function csc_tweets_widgets() {
	register_widget( 'csc_Tweet_Widget' );
}

class csc_tweet_widget extends WP_Widget {

	function csc_Tweet_Widget() {


		$widget_ops = array( 'classname' => 'tweet_widget', 'description' => __('A widget that displays your latest tweets.') );


		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_tweet_widget' );


		$this->WP_Widget( 'csc_tweet_widget', __('Custom Latest Tweets','csc-themewp'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$postcount = $instance['postcount'];
		$tweettext = $instance['tweettext'];


		echo $before_widget;


		if ( $title )
			echo $before_title . $title . $after_title;


		 ?>

            <script type="text/javascript">
                           jQuery(document).ready(function($){
                             $.getJSON('http://api.twitter.com/1/statuses/user_timeline.json?include_rts=true&screen_name=<?php echo $username; ?>&count=<?php echo $postcount ?>&callback=?', function(tweets){
                              $("#<?php echo $id; ?>_twitter_update_list").html(csc_twitter(tweets));
                             });
                          });
                      </script>

            <div class ="tweets">
				<ul id="<?php echo $id; ?>_twitter_update_list">
					<li><p></p></li>
				</ul>
			</div>


		<?php


		echo $after_widget;
	}



	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;


		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
		$instance['tweettext'] = strip_tags( $new_instance['tweettext'] );



		return $instance;
	}


	function form( $instance ) {


		$defaults = array(
		'title' => 'Our Latest Tweets',
		'username' => '',
		'postcount' => '4',
		'tweettext' => 'Follow on Twitter',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php echo 'Twitter Username: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>

		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php echo 'Number of tweets: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>

		<!-- Tweettext: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tweettext' ); ?>"><?php echo 'Follow Text: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tweettext' ); ?>" name="<?php echo $this->get_field_name( 'tweettext' ); ?>" value="<?php echo $instance['tweettext']; ?>" />
		</p>

	<?php
	}
}
?>
<?php
/*
 * Tabs Widget
 */


add_action( 'widgets_init', 'csc_tabs_widgets' );

function csc_tabs_widgets() {
	register_widget( 'csc_Tabs_Widget' );
}

class csc_tabs_widget extends WP_Widget {



	function csc_Tabs_Widget() {


		$widget_ops = array( 'classname' => 'csc-tab-widget', 'description' => __('A widget that displays Tabs (New post, Popular post, Tags).', 'csc-widget-tb') );


		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_tabs_widget' );


		$this->WP_Widget( 'csc_tabs_widget', __('Custom Tabs Widget','csc-widget-tb'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$tab1 = $instance['tab1'];
		$tab2 = $instance['tab2'];
		$tab3 = $instance['tab3'];


		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		 ?>




         <ul class="nav nav-tabs">
            <li class="active"><a href="#<?php echo $tab1; ?>" data-toggle="tab"><?php echo $tab1; ?></a></li>
            <li><a href="#<?php echo $tab2; ?>" data-toggle="tab"><?php echo $tab2; ?></a></li>
            <li><a href="#<?php echo $tab3; ?>" data-toggle="tab"><?php echo $tab3; ?></a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane fade in active" id="<?php echo $tab1; ?>">

            <ul class="w-recentpost">

                        <?php
				            $recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page=5');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();



					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 42, 42, true );


					echo '<li><a href="'.get_permalink().'"><img class="imageLeft" src="'.$image['url'].'" />';
					echo '<div><a href="'.get_permalink().'">'.the_title().'</a></div>';
					echo '<div>'.css_theme_posted_on().'</div></li>';


				endwhile;

			?>
                  </ul>

            </div>

            <div class="tab-pane fade" id="<?php echo $tab2; ?>">

            <ul class="w-recentpost">

              <?php
				            $recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page=5&orderby=comment_count');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();



					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 42, 42, true );


					echo '<li><a href="'.get_permalink().'"><img class="imageLeft" src="'.$image['url'].'" />';
					echo '<div><a href="'.get_permalink().'">'.the_title().'</a></div>';
					echo '<div>'.css_theme_posted_on().'</div></li>';


				endwhile;

			?>
            </ul>

            </div>

            <div class="tab-pane fade" id="<?php echo $tab3; ?>">
            <div class="tagcloud" id="tag_gl">
             <?php

				$args_tb = array(
    'smallest' => 14,
    'largest' => 16,
    'unit'  => 'px',
    'number'  => 45,
    'format'  => 'flat' );

				wp_tag_cloud( $args_tb );

		 				?>
              </div>
            </div>

          </div>






		<?php

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tab1'] = strip_tags( $new_instance['tab1'] );
		$instance['tab2'] = strip_tags( $new_instance['tab2'] );
		$instance['tab3'] = strip_tags( $new_instance['tab3'] );


		return $instance;
	}



	function form( $instance ) {


		$defaults = array(
		'title' => 'Widget Tabs',
		'tab1' => 'New',
		'tab2' => 'Popular',
		'tab3' => 'Tags',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php echo 'Tab 1 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>" value="<?php echo $instance['tab1']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php echo 'Tab 2 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>" value="<?php echo $instance['tab2']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab3' ); ?>"><?php echo 'Tab 3 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>" value="<?php echo $instance['tab3']; ?>" />
		</p>


	<?php
	}
}
?>
<?php
/*
 * Flickr Widget
 */


add_action( 'widgets_init', 'csc_flickr_widgets' );

function csc_flickr_widgets() {
	register_widget( 'csc_Flickr_Widget' );
}

class csc_flickr_widget extends WP_Widget {


	function csc_Flickr_Widget() {


		$widget_ops = array( 'classname' => 'csc-flickrwidget', 'description' => __('A widget that displays your latest flickr.', 'csc-widget-flickr') );


		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_flickr_widget' );


		$this->WP_Widget( 'csc_flickr_widget', __('Custom Latest Flickrs','csc-widget-flickr'), $widget_ops, $control_ops );
	}



	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$postcount = $instance['postcount'];
	    $type = $instance['type'];
	    $display = $instance['display'];


		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;


		 ?>
        		<!-- #flickr-username START -->
              <div class="flickr">
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $username ?>"></script>
              </div>
              <!-- #flickr-username END -->
		<?php


		echo $after_widget;
	}



	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;


		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = $new_instance['postcount'];
	    $instance['type'] = $new_instance['type'];
	    $instance['display'] = $new_instance['display'];



		return $instance;
	}



	function form( $instance ) {


	    $defaults = array(
		'title' => 'Widget Flickr',
		'username' => '52617155@N08',
		'postcount' => '8',
		'type' => 'user',
		'display' => 'latest',
	    );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php echo 'Flickr Username: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>

        <p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:') ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
		</select>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):') ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
			<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
			<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
		</select>
	</p>



	<?php
	}
}
?>
<?php
/*
 * Accordion Widget
 */


add_action( 'widgets_init', 'csc_accordion_widgets' );


function csc_accordion_widgets() {
	register_widget( 'csc_Accordion_Widget' );
}

class csc_accordion_widget extends WP_Widget {

	function csc_accordion_widget() {


		$widget_ops = array( 'classname' => 'csc-acc-widget', 'description' => __('A widget that displays Accordion (New post, Popular post, Tags).', 'csc-widget-acc') );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_accordion_widget' );


		$this->WP_Widget( 'csc_accordion_widget', __('Custom Accordion Widget','csc-widget-acc'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$tab1 = $instance['tab1'];
		$tab2 = $instance['tab2'];
		$tab3 = $instance['tab3'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		 ?>




      <div class="accordion" id="accordion2">

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                  <?php echo $tab1; ?>
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                  <ul class="w-recentpost">

                        <?php
				            $recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page=3');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();



					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 45, 45, true );


					echo '<li><a href="'.get_permalink().'"><img class="imageLeft" src="'.$image['url'].'" />';
					echo '<div><a href="'.get_permalink().'">'.the_title().'</a></div>';
					echo '<div>'.css_theme_posted_on().'</div></li>';


				endwhile;

			?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                  <?php echo $tab2; ?></a>
                </a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                 <ul class="w-recentpost">

                        <?php
				            $recentPosts = new WP_Query();
							$recentPosts->query('ignore_sticky_posts=1&posts_per_page=3&orderby=comment_count');
							while ($recentPosts->have_posts()) : $recentPosts->the_post();



					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 42, 42, true );


					echo '<li><a href="'.get_permalink().'"><img class="imageLeft" src="'.$image['url'].'" />';
					echo '<div><a href="'.get_permalink().'">'.the_title().'</a></div>';
					echo '<div>'.css_theme_posted_on().'</div></li>';



				endwhile;

			?>
            </ul>

                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                  <?php echo $tab3; ?>
                </a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                 <div class="tagcloud" id="tag_gl">
                <?php

				$args_acc = array(
    'smallest'                  => 14,
    'largest'                   => 16,
    'unit'                      => 'px',
    'number'                    => 45,
    'format'                    => 'flat' );

				wp_tag_cloud( $args_acc );

		 				?>
                  </div>
                </div>
              </div>
            </div>


          </div>



		<?php


		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;


		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tab1'] = strip_tags( $new_instance['tab1'] );
		$instance['tab2'] = strip_tags( $new_instance['tab2'] );
		$instance['tab3'] = strip_tags( $new_instance['tab3'] );


		return $instance;
	}


	function form( $instance ) {


		$defaults = array(
		'title' => 'Widget Accordion',
		'tab1' => 'New post',
		'tab2' => 'Popular post',
		'tab3' => 'Tags',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php echo 'Accordion 1 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>" value="<?php echo $instance['tab1']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php echo 'Accordion 2 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>" value="<?php echo $instance['tab2']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab3' ); ?>"><?php echo 'Accordion 3 Title: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>" value="<?php echo $instance['tab3']; ?>" />
		</p>


	<?php
	}
}
?>
<?php
/*
 * Recent Posts
 */


add_action( 'widgets_init', 'csc_recentpost_widgets' );


function csc_recentpost_widgets() {
	register_widget( 'csc_Recentpost_Widget' );
}

class csc_recentpost_widget extends WP_Widget {



	function csc_Recentpost_Widget() {


		$widget_ops = array( 'classname' => 'csc-recent-posts', 'description' => __('A widget that displays recent posts.', 'csc-widget-rp') );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_recentpost_widget' );


		$this->WP_Widget( 'csc_recentpost_widget', __('Custom Recent Posts','csc-widget-rp'), $widget_ops, $control_ops );
	}



	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];



		echo $before_widget;


		if ( $title )
			echo $before_title . $title . $after_title;


		 ?>
		 	<ul class="w-recentpost">
			<?php
				$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $number) );
				while ( $loop->have_posts() ) : $loop->the_post();



					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 70, 50, true );


					echo '<li class="clearfix"><a href="'.get_permalink().'"><img class="imageLeft" src="'.$image['url'].'" />';
					echo '<div><a href="'.get_permalink().'">'.the_title().'</a></div>';
					echo '<div>'.css_theme_posted_on().'</div></li>';

				endwhile;

			?>
			</ul>
		<?php


		echo $after_widget;
	}



	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;


		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );


		return $instance;
	}


	function form( $instance ) {


		$defaults = array(
		'title' => 'Widget Recent Posts',
		'number' => '5'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo 'Number: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>

	<?php
	}
}
?>
<?php
/*
 * Latest Portfolio
 */


add_action( 'widgets_init', 'csc_portfolio_widgets' );

function csc_portfolio_widgets() {
	register_widget( 'csc_Portfolio_Widget' );
}

class csc_portfolio_widget extends WP_Widget {


	function csc_Portfolio_Widget() {

		$widget_ops = array( 'classname' => 'csc-portfolio_widget', 'description' => __('A widget that displays your latest portfolio.', 'csc-widget-portf') );


		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_portfolio_widget' );

		$this->WP_Widget( 'csc_portfolio_widget', __('Custom Latest Portfolios','csc-widget-portf'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$num_item = $instance['num_item'];



		echo $before_widget;


		if ( $title )
			echo $before_title . $title . $after_title;


		 ?>
            	<ul class="csc_latest_portfolio">
            	<?php
            	$i = 100;
				global $post;
            	$loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' =>  $num_item) );

				while ( $loop->have_posts() ) : $loop->the_post();


					$thumb = get_post_thumbnail_id();
					$image = vt_resize( $thumb, '', 51, 51, true );

					echo '<li class="latest_portfolio_image" id="latest_portfolio_image'.$i.'">';
					echo '<a href="'.get_permalink().'" class="itemload" data-ajax="'. $post->post_name .'"><img src="'.$image['url'].'" alt="" title="'.get_the_title().'" /></a>';
					echo '</li>';
					$i++;
				endwhile; ?>
				</ul>
		<?php


		echo $after_widget;
	}



	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;


		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_item'] = $new_instance['num_item'];




		return $instance;
	}



	function form( $instance ) {


		$defaults = array(
		'title' => 'Widget Latest Portfolio',
		'num_item' => '8'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

<p>
		<label for="<?php echo $this->get_field_id( 'num_item' ); ?>"><?php _e('Number of Item:') ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'num_item' ); ?>" name="<?php echo $this->get_field_name( 'num_item' ); ?>" value="<?php echo $instance['num_item']; ?>" />
	</p>


	<?php
	}
}
?>
<?php
/*
 * Video Widget
 */
add_action( 'widgets_init', 'csc_video_widgets' );


function csc_video_widgets() {
	register_widget( 'csc_Video_Widget' );
}

class csc_video_widget extends WP_Widget {


	function csc_Video_Widget() {


		$widget_ops = array( 'classname' => 'video-widget', 'description' => __('A widget that displays a video.') );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'csc_video_widget' );

		$this->WP_Widget( 'csc_video_widget', __('Custom Video Widget'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );


		$title = apply_filters('widget_title', $instance['title'] );
		$source = $instance['source'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		 ?>
			<iframe src="<?php echo $source;?>" width="300" height="200" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		<?php

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['source'] = strip_tags( $new_instance['source'] );



		return $instance;
	}


	function form( $instance ) {


		$defaults = array(
		'title' => 'Widget Video',
		'source' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'source' ); ?>"><?php echo 'Source: '; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'source' ); ?>" name="<?php echo $this->get_field_name( 'source' ); ?>" value="<?php echo $instance['source']; ?>" />
		</p>

	<?php
	}
}
?>