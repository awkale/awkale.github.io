<?php
/**
 * The template used for displaying page content in page.php
 */
?>


<section>

<!-- Google map
================================================== -->

<div id="google_map" class="span12">
</div>

<div class="divider-strip"></div>

<div class="span8">

<div class="divider-strip">
<h3><?php _e('Send me mail', 'csc-themewp') ?></h3>
</div>

<!-- Contact form
================================================== -->

<div class="row">
      <form id="form" name="form" action="#" method="post">
      <input type="hidden" name="to" id="to" value="<?php echo csc_option('csc_mail_form'); ?>" />
       <div class="span4">
        <label><strong ><?php _e('First Name', 'csc-themewp'); ?></strong></label>
        <input type="text" class="span4 req-string" placeholder="Type something…" name="fname" id="fname">
        <label><strong ><?php _e('Last name', 'csc-themewp'); ?></strong></label>
        <input type="text" class="span4 req-string" placeholder="Type something…" name="lname" id="lname">
        </div>
        <div class="span4">
        <label><strong ><?php _e('Your email', 'csc-themewp'); ?></strong></label>
        <input type="text" class="span4 req-email" placeholder="Type something…" name="email" id="email">
        <label><strong ><?php _e('Your phone', 'csc-themewp'); ?></strong></label>
        <input type="text" class="span4" placeholder="Type something…" name="phone" id="phone">
        </div>
        <div class="span8" style="position:relative;">
        <label><strong ><?php _e('Your message', 'csc-themewp'); ?></strong></label>
        <textarea class="span8 req-string" rows="5" id="message" name="message"></textarea>
        </div>
        <div class="span8">
        <label><strong><?php _e('Are you human?', 'csc-themewp'); ?></strong></label>
        <input type="text" class="span4 req-numeric" value="Please solve the equation 9+1= ?" name="num" id="num" style="display:block; margin-bottom:30px; width:200px;">

        <button type="submit" class="button small" id="submit"><?php _e('Submit message', 'csc-themewp'); ?></button>
        <span class="sending">
                        <?php _e('send message...', 'csc-themewp'); ?>
                    </span>
       </div>
       </form>
      <div class="mess center"></div>
 </div>
</div>

<div class="span4">
<div class="divider-strip" style="margin-bottom:10px;">

<!--Contact info
================================================== -->

<h3><?php _e('Contact information', 'csc-themewp'); ?></h3>
</div>
<div class="row">
<div class="span4">
<ul style="margin-left:0;font-size:13px; display:block;">
<li style="margin-bottom:5px;"><?php echo csc_option('csc_location'); ?></li>
<li style="margin-bottom:5px"><?php echo csc_option('csc_phone'); ?></li>
<li style="margin-bottom:5px"><?php echo csc_option('csc_mail'); ?></li>
<li style="margin-bottom:5px"><?php echo csc_option('csc_web_site'); ?></li>
</ul>
</div>
</div>
<div class="row" id="social-contact">
<div class="span4" style="margin-top:23px;">
<?php include (get_template_directory() . '/socialize.php'); ?>
</div>
</div>
</div>


</section>
<script>
jQuery(document).ready(function($) {
 var options = {

        beforeSubmit: function() {
            $('.sending').show();

        },
        success: function() {
            $('.sending').hide();
            $('#form').hide();
            $(".mess").show().html('<h3>Thanks !</h3><h3>Your message has been sent.</h3>'); // Change Your message post send
            $('.mess').delay(3500).fadeOut(function() {

                $('#form').clearForm();
                $('#form').delay(4000).show();

            });
        },
        url: '<?php echo get_template_directory_uri(); ?>/mail/contact.php'
    };

    $('#form').submit(function() {
        $(this).ajaxSubmit(options);
        return false;
    });
});
</script>