<?php 

 
	require_once('../../../../../../wp-load.php');
	require_once('../../../../../../wp-admin/includes/admin.php');
	do_action('admin_init');
	
	if ( ! is_user_logged_in() )
		die('You must be logged in to access this script.');
	
?>

(function() {
	tinymce.create('tinymce.plugins.<?php echo $cscShortcodes->shortcodesButton; ?>', {
		createControl : function(n, cm) {
			if(n=='<?php echo $cscShortcodes->shortcodesButton; ?>'){
                var cols = cm.createListBox('<?php echo $cscShortcodes->shortcodesButton; ?>List', {
                     title : 'Misk',
                     onselect : function(value) {
                     	if(value == 'dropcap'){
                         	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[dropcap] [/dropcap]');
                        }
                        else if(value == 'button'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[button link="#" style="none, small, large, biglarge" title="Link Title"][/button]');
                        }
						
						else if(value == 'button_tb'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[button_tb link="#" style="none, btn-info, btn-primary, btn-success, btn-warning, btn-danger, btn-inverse, btn-large, btn-small, btn-mini, disabled" title="Link Title"][/button_tb]');
                        }
						
						else if(value == 'divider'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[divider]');
                        }
						
						else if(value == 'well_tb'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[well_tb][/well_tb]');
                        }
						
						else if(value == 'aside'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[aside] [/aside]');
                        }
                        else if(value == 'blockquote'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[blockquote] [/blockquote]');
                        }
						else if(value == 'tabgro'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[tabgroup] [tab title="First tab" id="tab1" class="active"] First Content [/tab] [tab title="Second Tab" id="tab2"] Second Content [/tab] [tab title="Third Tab" id="tab3"] Third Content [/tab] [/tabgroup]');
                        }
                        else if(value == 'toggle'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[toggle title="Toggle title"] [/toggle]');
                        }
                        else if(value == 'accordion'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[accordion title="Accordion title"] [/accordion][accordion title="Accordion title"] [/accordion][accordion title="Accordion title"] [/accordion]');
                        }
						else if(value == 'box'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[box style="none, info, note, confirm, error"] This is an message box (select style). [/box]');
							
						}
						else if(value == 'tb_label'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[tb_label style="none, label-warning, label-success, label-important, label-info, label-inverse"] Label Title. [/tb_label]');
                        }
						
						else if(value == 'tb_badges'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[tb_badges style="none, badge-success, badge-warning, badge-important, badge-info, badge-inverse"] Badge Title. [/tb_badges]');
                        }
						else if(value == 'clear'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[clear]');
                        }
                        
                        
                        else if(value == 'progress_bar'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[progress_bar style="progress-success" width="20%"][/progress_bar]');
                        }
                        
                        
						
						
						
						
						
						else if(value == 'icon_dribbble'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_dribbble link=# ][/icon_dribbble]');
                        }
						
						else if(value == 'icon_facebook2'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_facebook2 link=#][/icon_facebook2]');
                        }
						
						else if(value == 'icon_twitter2'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_twitter2 link=#][/icon_twitter2]');
                        }
						
						else if(value == 'icon_flickr'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_flickr link=#][/icon_flickr]');
                        }

						else if(value == 'icon_linkedin2'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_linkedin2 link=#][/icon_linkedin2]');
                        }
						
						else if(value == 'icon_vimeo'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_vimeo link=#][/icon_vimeo]');
                        }
						
						else if(value == 'icon_google'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_google link=#][/icon_google]');
                        }
						
					
						else if(value == 'icon_delicious'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_delicious link=#][/icon_delicious]');
                        }
						else if(value == 'icon_digg'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_digg link=#][/icon_digg]');
                        }
						else if(value == 'icon_ember'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_ember link=#][/icon_ember]');
                        }
						else if(value == 'icon_forrst'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_forrst link=#][/icon_forrst]');
                        }
						else if(value == 'icon_last_fm'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_last_fm link=#][/icon_last_fm]');
                        }
						else if(value == 'icon_my_space'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_my_space link=#][/icon_my_space]');
                        }
						else if(value == 'icon_rss2'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_rss2 link=#][/icon_rss2]');
                        }
						
						else if(value == 'icon_sharethis'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_sharethis link=#][/icon_sharethis]');
                        }
						
						else if(value == 'icon_skype'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_skype link=#][/icon_skype]');
                        }
						
						else if(value == 'icon_stumbleupon'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_stumbleupon link=#][/icon_stumbleupon]');
                        }
						
						else if(value == 'icon_tumblr'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_tumblr link=#][/icon_tumblr]');
                        }
						
						else if(value == 'icon_you_tube'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_you_tube link=#][/icon_you_tube]');
                        }
						
						else if(value == 'icon_aim'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_aim link=#][/icon_aim]');
                        }
						
						else if(value == 'icon_behance'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_behance link=#][/icon_behance]');
                        }
						
						else if(value == 'icon_evernote'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_evernote link=#][/icon_evernote]');
                        }
						
						else if(value == 'icon_github2'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_github2 link=#][/icon_github2]');
                        }
						
						else if(value == 'icon_paypal'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_paypal link=#][/icon_paypal]');
                        }
						
						else if(value == 'icon_wordpress'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_wordpress link=#][/icon_wordpress]');
                        }
						
						else if(value == 'icon_yahoo'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_yahoo link=#][/icon_yahoo]');
                        }
						
						else if(value == 'icon_zerply'){
                        	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon_zerply link=#][/icon_zerply]');
                        }
						
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
						
                     }
                });
				
				cols.add('Dropcap', 'dropcap');
                cols.add('Button', 'button');
				cols.add('Divider', 'divider');
				cols.add('Aside', 'aside');
                cols.add('Blockquote', 'blockquote');
				cols.add('Tabs', 'tabgro');
                cols.add('Toggle', 'toggle');
                cols.add('Accordion', 'accordion');
                cols.add('Skills Progress bar', 'progress_bar');
				cols.add('Message Box', 'box');
				cols.add('Clear', 'clear');
                
                cols.add('-- Social icon--', '-');
                
                cols.add('dribbble', 'icon_dribbble');
				cols.add('facebook2', 'icon_facebook2');
				cols.add('twitter2', 'icon_twitter2');
				cols.add('flickr', 'icon_flickr');
				cols.add('linkedin2', 'icon_linkedin2');
				cols.add('vimeo', 'icon_vimeo');
				cols.add('google', 'icon_google');
				cols.add('delicious', 'icon_delicious');
				cols.add('digg', 'icon_digg');
				cols.add('ember', 'icon_ember');
				cols.add('forrst', 'icon_forrst');
				cols.add('last_fm', 'icon_last_fm');
				cols.add('my_space', 'icon_my_space');
				cols.add('rss2', 'icon_rss2');
				cols.add('sharethis', 'icon_sharethis');
				cols.add('skype', 'icon_skype');
				cols.add('stumbleupon', 'icon_stumbleupon');
				cols.add('tumblr', 'icon_tumblr');
				cols.add('you_tube', 'icon_you_tube');
				cols.add('aim', 'icon_aim');
				cols.add('behance', 'icon_behance');
				cols.add('evernote', 'icon_evernote');
				cols.add('github2', 'icon_github2');
				cols.add('paypal', 'icon_paypal');
				cols.add('wordpress', 'icon_wordpress');
				cols.add('yahoo', 'icon_yahoo');
				cols.add('zerply', 'icon_zerply');
                
				
                cols.add('-- Bootstrap--', '-');
				
				cols.add('Button TB', 'button_tb');
				cols.add('Label TB', 'tb_label');
				cols.add('Badge TB', 'tb_badges');
				cols.add('Well TB', 'well_tb');
				
				


                return cols;
             }
             
             return null;
		},

	});

	// Register plugin
	tinymce.PluginManager.add('<?php echo $cscShortcodes->shortcodesButton; ?>', tinymce.plugins.<?php echo $cscShortcodes->shortcodesButton; ?>);
	
})();