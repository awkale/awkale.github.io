<style type="text/css">
html,body {font-family: '<?php echo $fontFamily_font_title_body; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_body; ?>;
color:<?php echo $fontColor_font_title_body; ?>; font-size:<?php echo $fontSize_font_title_body; ?>}

h1{font-family: '<?php echo $fontFamily_font_title_page; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_page; ?>;
color:<?php echo $fontColor_font_title_page; ?>; font-size:<?php echo $fontSize_font_title_page; ?>}

h2{font-family: '<?php echo $fontFamily_font_title_page2; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_page2; ?>;
color:<?php echo $fontColor_font_title_page2; ?>; font-size:<?php echo $fontSize_font_title_page2; ?>}

h3{font-family: '<?php echo $fontFamily_font_title_page3; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_page3; ?>;
color:<?php echo $fontColor_font_title_page3; ?>; font-size:<?php echo $fontSize_font_title_page3; ?>}

p{font-family: '<?php echo $fontFamily_font_content; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_content; ?>;
color:<?php echo $fontColor_font_content; ?>; font-size:<?php echo $fontSize_font_content; ?>}
a,
#change-small i,#change-small2 i,
.blog-meta .data .month,
.blog-meta .data .day,
.blog-meta .data .year,
#commentform label,
ul.price li.cost,
ul.price li.cost h3,
#container-ch .item-block-isotope .description,
.item-block-isotope .symbol,
.item-block-isotope .name ,
.item-block-isotope .summary p,
.sidebar_block h3,
.sidebar_block h4,.page-header h1,
.block-info .home-title,
a.description,
.promo-slogan h1 span,
nav ul.menu li a:hover, nav ul li.current-menu-item > a,nav ul li.current-menu-parent > a,nav ul li.current_page_parent > a,
.divider-strip h1,.divider-strip h3, h3.widget-title{color:<?php echo $fontColor_font_title_body; ?>;}
a:hover,#top a:hover,
#commentform label small,
#footers .tweets ul li a,.divider-strip.author h3 span,#menu-csc-side-navigation.menu li.current-menu-item a{color:<?php echo csc_option('csc_slogan_link_bg'); ?>;}
#menu-csc-side-navigation.menu li.current-menu-item a{ border-left-color:<?php echo csc_option('csc_slogan_link_bg'); ?>}
#top .info-text li{color:<?php echo csc_option('csc_top_inform_color'); ?>;}
#top .info-text li a{color:<?php echo csc_option('csc_top_inform_color_link'); ?>;}
.carousel-right:hover,
.item-block:hover > a.description,
ul.control-menu li a:hover,
#container-ch .item-block-isotope:hover > .description,
.item-block-isotope .zoomi:hover,.item-block-isotope .linki:hover,.item-block-isotope .info:hover,.open-block-acc.active,.open-block.active a{ background-color:<?php echo csc_option('csc_slogan_link_bg'); ?>;}
ul.control-menu li a,
.button:hover, .button:focus,
ul#portfolio-filter a,ul.filter-data a,ul.filter-change li a,ul.control-menu li a,.button.blue,.port-info .port-info-back{ background:<?php echo csc_option('csc_slogan_link_bg'); ?>; }
.top-bar,.top-strip{background:<?php echo csc_option('csc_topbar_bg'); ?> ;}
.top-bar{border-top:3px <?php echo csc_option('csc_header_bg'); ?> solid;}
#top-search .search-query.span4 { background-color:<?php echo csc_option('csc_top_search_bg'); ?>;}
.header{background-color:<?php echo csc_option('csc_header_bg'); ?>;}
#slider_top{<?php $background = csc_option('csc_slider_home_bg'); echo 'background: '.$background['color'].' url('.$background['image'].') '.$background['repeat'].' '.$background['position'].' '.$background['attachment'].''; ?>}
.sliders_csc{<?php $background = csc_option('csc_slider_csc_home_bg'); echo 'background: '.$background['color'].' url('.$background['image'].') '.$background['repeat'].' '.$background['position'].' '.$background['attachment'].''; ?>}
i{color:<?php echo csc_option('csc_fontaw_bg'); ?>;}
#change-small .change-select,#change-small2 .change-select,ul.filter-change li a:hover,ul#portfolio-filter li a:hover,
ul.control-menu li a,
ul#portfolio-filter li a.currents,ul.filter-data li a.selected,
ul.price.best li.cost,
.progress-warning.progress-striped .bar,
ul.control-menu li a:hover,.button.blue:hover{background-color:<?php echo csc_option('csc_element_bg'); ?>}
ul.control-menu li a,
ul.filter-data li a:hover,ul.control-menu li a:hover{ background-color:<?php echo csc_option('csc_element_bg'); ?>;color: #f8f8f8;}
#change-small i,#change-small2 i{ color:#f8f8f8;}
.dropcap,
.button,
.hover-desc-bottom{background:<?php echo csc_option('csc_element_bg'); ?>;}
.nivo-caption,.slider-caption{background:<?php echo csc_option('csc_slidernav_bg'); ?>;}
.theme-default a.nivo-nextNav{ background-color:<?php echo csc_option('csc_slidernav_bg'); ?>}
.theme-default a.nivo-prevNav{ background-color:<?php echo csc_option('csc_slidernav_bg'); ?>}
#pagehead h1{font-family: '<?php echo $fontFamily_font_title_pages; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_pages; ?>;
color:<?php echo $fontColor_font_title_pages; ?>; font-size:<?php echo $fontSize_font_title_pages; ?>}
ul.filter-data li a{background:none;color:<?php echo $fontColor_font_title_menu; ?>;}
ul.filter-data li a:hover{background:none; color:<?php echo csc_option('csc_menu_color_hover'); ?>;}
ul.filter-data li a.selected{ background:none; color:<?php echo csc_option('csc_menu_color_hover'); ?>;}
nav ul.menu li a{font-family: '<?php echo $fontFamily_font_title_menu; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_menu; ?>;
font-size:<?php echo $fontSize_font_title_menu; ?>;color:<?php echo $fontColor_font_title_menu; ?>;}
nav ul.menu li a:hover{color:<?php echo csc_option('csc_menu_color_hover'); ?>;background-color:<?php echo csc_option('csc_menu_color_hover_bg'); ?>}
nav ul li.current-menu-item > a,nav ul li.current-menu-parent > a,nav ul li.current_page_parent > a{color:<?php echo csc_option('csc_menu_color_a_bg'); ?>}
nav ul.menu li ul li a{background:<?php echo csc_option('csc_menu_bg'); ?>;color:#ccc;}
nav ul.menu li ul li a:hover{background:<?php echo csc_option('csc_menu_hover_bg'); ?>;color:#f8f8f8;}
nav ul.menu li ul li{background-color:<?php echo csc_option('csc_menu_hover_bg'); ?>;}
nav ul.menu li.sfHover > a{color:#ccc;}
nav ul.menu li.sfHover > a:hover{color:#f8f8f8;}
nav ul.menu li.sfHover > a:hover,nav ul.menu li.sfHover > a{background-color:<?php echo csc_option('csc_menu_bg'); ?>;}
.flex-control-paging li a.flex-active,.flex-control-paging li a:hover {background:<?php echo csc_option('csc_slidernav_bg'); ?>;}
#sliders-csc h1{font-family: '<?php echo $fontFamily_font_title_slogan; ?>', sans, serif;color:<?php echo csc_option('csc_slider_csc_bg'); ?>}
#sliders-csc h2,#sliders-csc p{ background-color:<?php echo csc_option('csc_slider_csc_cap'); ?>;}
.promo-slogan h1,.promo-slogan-buy h1{font-family: '<?php echo $fontFamily_font_title_slogan; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_slogan; ?>;
color:<?php echo $fontColor_font_title_slogan; ?>; font-size:<?php echo $fontSize_font_title_slogan; ?>}
.promo-slogan h1 a,.promo-slogan-buy h1 span{font-family: '<?php echo $fontFamily_font_title_slogan; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_slogan; ?>;
color:<?php echo csc_option('csc_slogan_link_bg'); ?>;font-size:<?php echo $fontSize_font_title_slogan; ?>}
.not-mes{font-family: '<?php echo $fontFamily_font_title_slogan; ?>', sans, serif;color:<?php echo csc_option('csc_slogan_link_bg'); ?>;}
.promo-slogan h1 span {font-family: '<?php echo $fontFamily_font_title_slogan; ?>', sans, serif; font-weight:<?php echo $fontStyle_font_title_slogan; ?>;
color:<?php echo csc_option('csc_slogan_link_bg'); ?>;}
a.soc-follow.dribbble { background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/dribbble.png) 0 0 no-repeat;}
a.soc-follow.facebook { background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/facebook.png) 0 0 no-repeat;}
a.soc-follow.twitter { background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/twitter.png) 0 0 no-repeat;}
a.soc-follow.flickr { background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/flickr.png) 0 0 no-repeat;}
a.soc-follow.linkedin { background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png) 0 0 no-repeat;}
a.soc-follow.vimeo{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/vimeo.png) 0 0 no-repeat;}
a.soc-follow.google{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/google+.png) 0 0 no-repeat;}
a.soc-follow.ember{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/ember.png) 0 0 no-repeat;}
a.soc-follow.evernote{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/evernote.png) 0 0 no-repeat;}
a.soc-follow.forrst{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/forrst.png) 0 0 no-repeat;}
a.soc-follow.github{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/github.png) 0 0 no-repeat;}
a.soc-follow.last-fm{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/last-fm.png) 0 0 no-repeat;}
a.soc-follow.paypal{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/paypal.png) 0 0 no-repeat;}
a.soc-follow.rss{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/rss.png) 0 0 no-repeat;}
a.soc-follow.sharethis{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/sharethis.png) 0 0 no-repeat;}
a.soc-follow.skype{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/skype.png) 0 0 no-repeat;}
a.soc-follow.tumblr{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/tumblr.png) 0 0 no-repeat;}
a.soc-follow.wordpress{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/wordpress.png) 0 0 no-repeat;}
a.soc-follow.yahoo{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/yahoo.png) 0 0 no-repeat;}
a.soc-follow.youtube{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/youtube.png) 0 0 no-repeat;}
a.soc-follow.zerply{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/zerply.png) 0 0 no-repeat;}
a.soc-follow.aim{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/aim.png) 0 0 no-repeat;}
a.soc-follow.behance{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/behance.png) 0 0 no-repeat;}
a.soc-follow.digg{ background:<?php echo csc_option('csc_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/digg.png) 0 0 no-repeat;}
#top a.soc-follow.dribbble { background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/dribbble.png) 0 0 no-repeat;}
#top a.soc-follow.facebook { background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/facebook.png) 0 0 no-repeat;}
#top a.soc-follow.twitter { background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/twitter.png) 0 0 no-repeat;}
#top a.soc-follow.flickr { background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/flickr.png) 0 0 no-repeat;}
#top a.soc-follow.linkedin { background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png) 0 0 no-repeat;}
#top a.soc-follow.vimeo{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/vimeo.png) 0 0 no-repeat;}
#top a.soc-follow.google{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/google+.png) 0 0 no-repeat;}
#top a.soc-follow.ember{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/ember.png) 0 0 no-repeat;}
#top a.soc-follow.evernote{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/evernote.png) 0 0 no-repeat;}
#top a.soc-follow.forrst{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/forrst.png) 0 0 no-repeat;}
#top a.soc-follow.github{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/github.png) 0 0 no-repeat;}
#top a.soc-follow.last-fm{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/last-fm.png) 0 0 no-repeat;}
#top a.soc-follow.paypal{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/paypal.png) 0 0 no-repeat;}
#top a.soc-follow.rss{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/rss.png) 0 0 no-repeat;}
#top a.soc-follow.sharethis{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/sharethis.png) 0 0 no-repeat;}
#top a.soc-follow.skype{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/skype.png) 0 0 no-repeat;}
#top a.soc-follow.tumblr{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/tumblr.png) 0 0 no-repeat;}
#top a.soc-follow.wordpress{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/wordpress.png) 0 0 no-repeat;}
#top a.soc-follow.yahoo{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/yahoo.png) 0 0 no-repeat;}
#top a.soc-follow.youtube{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/youtube.png) 0 0 no-repeat;}
#top a.soc-follow.zerply{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/zerply.png) 0 0 no-repeat;}
#top a.soc-follow.aim{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/aim.png) 0 0 no-repeat;}
#top a.soc-follow.behance{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/behance.png) 0 0 no-repeat;}
#top a.soc-follow.digg{ background:<?php echo csc_option('csc_top_socicon_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/social/digg.png) 0 0 no-repeat;}
.post-format span{background:<?php echo csc_option('csc_post_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/post-format-sprite.png) 50% 40px no-repeat;}
.blog-meta .post-format span{background:<?php echo csc_option('csc_post_bg'); ?> url(<?php echo get_template_directory_uri(); ?>/images/post-format-sprite.png) 50% 40px no-repeat;}
.format-aside .post-format span { background-position: 50% 0;}
.format-audio .post-format span{ background-position: 50% -40px;}
.format-chat .post-format span{ background-position: 50% -80px;}
.format-standard .post-format span{ background-position: 50% -120px;}
.format-gallery .post-format span{ background-position: 50% -160px;}
.format-link .post-format span{ background-position: 50% -200px;}
.format-quote .post-format span{ background-position: 50% -240px;}
.format-status .post-format span{ background-position: 50% -280px;}
.format-video .post-format span{ background-position: 50% -320px;}
.format-image .post-format span{ background-position: 50% -360px;}
</style>
