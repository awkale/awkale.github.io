<script>
jQuery(document).ready(function() {
   
//Google map setting
	
	    var $map = jQuery('#google_map');
		if( $map.length ) {

			$map.gMap({ zoom:15,markers: [
					{ 'address' : '<?php echo csc_option('csc_ga_map'); ?>',}// include php  $csc_ga_map
				] });
		}
	
    });
</script>