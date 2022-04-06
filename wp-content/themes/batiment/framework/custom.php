<?php
/*
Dynamic css file. Please don't edit it. it's update automatically when settins changed
*/
 add_action('wp_head', 'rs_custom_colors', 160);
 function rs_custom_colors() { 
   global $rs_option;

	if(!empty($rs_option['body_bg_color']))
	{
		$body_bg 	  	  = $rs_option['body_bg_color'];

	$body_color       = $rs_option['body_text_color'];	
	$site_color       = $rs_option['primary_color'];	
	$hover_color      = $rs_option['secondary_color'];
	$link_color       = $rs_option['link_text_color'];	
	$link_hover_color = $rs_option['link_hover_text_color'];	
	$footer_bgcolor   = $rs_option['footer_bg_color'];
	
	if(!empty($rs_option['footer_bg']['url'])):
		$footer_top   	  = $rs_option['footer_bg']['url'];
	endif;

	if(!empty($rs_option['menu_text_color'])){		
	$menu_text_color = $rs_option['menu_text_color'];
	}
	if(!empty($rs_option['menu_text_hover_color'])){		
	$menu_text_hover_color = $rs_option['menu_text_hover_color'];
	}
	if(!empty($rs_option['menu_text_active_color'])){		
		$menu_active_color = $rs_option['menu_text_active_color'];
	}
	if(!empty($rs_option['drop_down_bg_color'])){		
		$drop_down_bg = $rs_option['drop_down_bg_color'];	
	}
	if(!empty($rs_option['drop_text_color'])){		
		$dropdown_text_color = $rs_option['drop_text_color'];
	}	
	if(!empty($rs_option['drop_text_hover_color'])){		
		$drop_text_hover_color = $rs_option['drop_text_hover_color'];
	}		
	
	if(!empty($rs_option['drop_text_hoverbg_color'])){		
		$drop_text_hoverbg_color = $rs_option['drop_text_hoverbg_color'];
	}
	
	//typography extract for body
	
	if(!empty($rs_option['opt-typography-body']['color']))
	{
		$body_typography_color=$rs_option['opt-typography-body']['color'];
	}
	if(!empty($rs_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight=$rs_option['opt-typography-body']['line-height'];
	}
		
	$body_typography_font=$rs_option['opt-typography-body']['font-family'];

	$body_typography_font_size=$rs_option['opt-typography-body']['font-size'];
	
	
	//typography extract for menu
	$menu_typography_color=$rs_option['opt-typography-menu']['color'];	
	$menu_typography_weight=$rs_option['opt-typography-menu']['font-weight'];	
	$menu_typography_font_family=$rs_option['opt-typography-menu']['font-family'];
	$menu_typography_font_fsize=$rs_option['opt-typography-menu']['font-size'];	
	if(!empty($rs_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$rs_option['opt-typography-menu']['line-height'];
	}
	
	//typography extract for heading
	
	$h1_typography_color=$rs_option['opt-typography-h1']['color'];		
	if(!empty($rs_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$rs_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family=$rs_option['opt-typography-h1']['font-family'];
	$h1_typography_font_fsize=$rs_option['opt-typography-h1']['font-size'];	
	if(!empty($rs_option['opt-typography-h1']['line-height']))
	{
		$h1_typography_line_height=$rs_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color=$rs_option['opt-typography-h2']['color'];	

	$h2_typography_font_fsize=$rs_option['opt-typography-h2']['font-size'];	
	if(!empty($rs_option['opt-typography-h2']['font-weight']))
	{
		$h2_typography_font_weight=$rs_option['opt-typography-h2']['font-weight'];
	}	
	$h2_typography_font_family=$rs_option['opt-typography-h2']['font-family'];
	$h2_typography_font_fsize=$rs_option['opt-typography-h2']['font-size'];	
	if(!empty($rs_option['opt-typography-h2']['line-height']))
	{
		$h2_typography_line_height=$rs_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color=$rs_option['opt-typography-h3']['color'];	
	if(!empty($rs_option['opt-typography-h3']['font-weight']))
	{
		$h3_typography_font_weightt=$rs_option['opt-typography-h3']['font-weight'];
	}	
	$h3_typography_font_family=$rs_option['opt-typography-h3']['font-family'];
	$h3_typography_font_fsize=$rs_option['opt-typography-h3']['font-size'];	
	if(!empty($rs_option['opt-typography-h3']['line-height']))
	{
		$h3_typography_line_height=$rs_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color=$rs_option['opt-typography-h4']['color'];	
	if(!empty($rs_option['opt-typography-h4']['font-weight']))
	{
		$h4_typography_font_weight=$rs_option['opt-typography-h4']['font-weight'];
	}	
	$h4_typography_font_family=$rs_option['opt-typography-h4']['font-family'];
	$h4_typography_font_fsize=$rs_option['opt-typography-h4']['font-size'];	
	if(!empty($rs_option['opt-typography-h4']['line-height']))
	{
		$h4_typography_line_height=$rs_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color=$rs_option['opt-typography-h5']['color'];	
	if(!empty($rs_option['opt-typography-h5']['font-weight']))
	{
		$h5_typography_font_weight=$rs_option['opt-typography-h5']['font-weight'];
	}	
	$h5_typography_font_family=$rs_option['opt-typography-h5']['font-family'];
	$h5_typography_font_fsize=$rs_option['opt-typography-h5']['font-size'];	
	if(!empty($rs_option['opt-typography-h5']['line-height']))
	{
		$h5_typography_line_height=$rs_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color=$rs_option['opt-typography-6']['color'];	
	if(!empty($rs_option['opt-typography-6']['font-weight']))
	{
		$h6_typography_font_weight=$rs_option['opt-typography-6']['font-weight'];
	}
	$h6_typography_font_family=$rs_option['opt-typography-6']['font-family'];
	$h6_typography_font_fsize=$rs_option['opt-typography-6']['font-size'];	
	if(!empty($rs_option['opt-typography-6']['line-height']))
	{
		$h6_typography_line_height=$rs_option['opt-typography-6']['line-height'];
	}	
?>

<!-- Typography -->
<?php if(!empty($body_color)){
	global $rs_option;
	$hex = $hover_color;
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$site_color_rgb = "$r, $g, $b";

 if(!empty($rs_option['toolbar_bg_color'])){ 
	$hex2 = $rs_option['toolbar_bg_color'];
	list($r, $g, $b) = sscanf($hex2, "#%02x%02x%02x");
	$toolbar_bg_color_rgb = "$r, $g, $b";
  }
?>
<style>

body{
	background:<?php echo esc_attr($body_bg); ?> !important;
	color:<?php echo esc_attr($body_color); ?> !important;
	font-family: <?php echo esc_attr($body_typography_font);?> !important;    
    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;	
}
.navbar a, .navbar li{	
	font-family:<?php echo esc_attr($menu_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($menu_typography_font_fsize);?>;
}
.menu-area .navbar ul li > a{
	color: <?php echo esc_attr($menu_text_color); ?> !important;
}
.menu-area:not(.sticky) .navbar ul li.active a,
.page-template-page-single .menu-area:not(.sticky) .navbar ul li.active a,
.menu-area .navbar ul li.current-menu-item a, .menu-area .navbar ul li.active a {
	color: <?php echo esc_attr($menu_active_color); ?> !important;
}
.menu-area:not(.sticky) .navbar ul li > a:hover{
	color: <?php echo esc_attr($menu_text_hover_color); ?> !important;
}
.menu-area .navbar ul li ul.sub-menu{
	background:<?php echo esc_attr($drop_down_bg);?> !important;
}
#rs-header .menu-area .navbar ul li .sub-menu li a, 
#rs-header .menu-area .navbar ul li .children li a {
	color:<?php echo esc_attr($dropdown_text_color);?> !important;
}
#rs-header .menu-area .navbar ul ul li a:hover ,
#rs-header .menu-area .navbar ul ul li.current-menu-item a{
	color:<?php echo esc_attr($drop_text_hover_color);?> !important
}
#rs-header .menu-area .navbar ul ul li a:hover, #rs-header .menu-area .navbar ul ul li.current-menu-item a{
<?php if(!empty($drop_text_hoverbg_color))
{?>
  background:<?php echo esc_attr($drop_text_hoverbg_color); ?> !important;
<?php }?>	
}

#rs-header .menu-area .navbar ul li .sub-menu li{
  <?php if(!empty($rs_option['drop_text_hoverbg_color'])){		
		?>
		border-color:<?php echo esc_attr($dropdown_border_color); ?> !important;
		<?php
	}	
?>
}

h1{
	color:<?php echo esc_attr($h1_typography_color);?>;
	font-family:<?php echo esc_attr($h1_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h1_typography_font_fsize);?>!important;
	<?php if(!empty($h1_typography_weight)){
	?>
	font-weight:<?php echo esc_attr($h1_typography_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h1_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h1_typography_line_height);?>!important;
	<?php }?>
	
}
h2{
	color:<?php echo esc_attr($h2_typography_color);?>; 
	font-family:<?php echo esc_attr($h2_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
	<?php if(!empty($h2_typography_font_weight)){
	?>
	font-weight:<?php echo esc_attr($h2_typography_font_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h2_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h2_typography_line_height);?>
	<?php }?>
}
h3{
	color:<?php echo esc_attr($h3_typography_color);?> ;
	font-family:<?php echo esc_attr($h3_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
	<?php if(!empty($h3_typography_font_weight)){
	?>
	font-weight:<?php echo esc_attr($h3_typography_font_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h3_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h3_typography_line_height);?>!important;
	<?php }?>
}
h4{
	color:<?php echo esc_attr($h4_typography_color);?>;
	font-family:<?php echo esc_attr($h4_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
	<?php if(!empty($h4_typography_font_weight)){
	?>
	font-weight:<?php echo esc_attr($h4_typography_font_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h4_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h4_typography_line_height);?>!important;
	<?php }?>
	
}
h5{
	color:<?php echo esc_attr($h5_typography_color);?>;
	font-family:<?php echo esc_attr($h5_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
	<?php if(!empty($h5_typography_font_weight)){
	?>
	font-weight:<?php echo esc_attr($h5_typography_font_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h5_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h5_typography_line_height);?>!important;
	<?php }?>
}
h6{
	color:<?php echo esc_attr($h6_typography_color);?> ;
	font-family:<?php echo esc_attr($h6_typography_font_family);?>!important;
	font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
	<?php if(!empty($h6_typography_font_weight)){
	?>
	font-weight:<?php echo esc_attr($h6_typography_font_weight);?>!important;
	<?php }?>
	
	<?php if(!empty($h6_typography_line_height)){
	?>
		line-height:<?php echo esc_attr($h6_typography_line_height);?>!important;
	<?php }?>
}


.menu-area .get-quote,
.menu-area .menu-offcanvas .get-quote .nav-link-container a.nav-menu-link,
.readon,
.services-style-2 .services-desc .btn-more,
.rs-portfolio .portfolio-item .p-zoom:hover,
.owl-carousel .owl-nav [class*="owl-"],
#rs-testimonial .slider2 .testimonial-content:hover img,
#rs-testimonial .slick-dots button,
#content #cl-testimonial .slick-active button,
.owl-dots .owl-dot span,
#rs-footer .footer-top h3.footer-title:after,
#rs-footer .footer-top .recent-post-widget .post-item .post-date,
#rs-footer .footer-top .mc4wp-form-fields input[type="submit"],
#scrollUp i,
.sidenav .nav-close-menu-li button:hover:after, .sidenav .nav-close-menu-li button:hover:before,
#cl-testimonial .slider4 .slick-active button,
.team-slider-style2 .team-item-wrap .team-content .display-table .display-table-cell .team-title:after,
.team-slider-style2 .team-item-wrap .team-img .normal-text .team-name,
.team-slider-style2 .team-item-wrap .team-content .display-table .display-table-cell .team-social .social-icon:hover,
#cta-sec,
#about-sec2 a.mt-20,
.rs-about3 .vc_tta-panel.vc_active .vc_tta-panel-heading a i,
.rs-about3 .vc_tta-panel-heading,
.rs-about3 .vc_tta-panel-heading:hover a i,
.services-tabs .vc_tta-tab.vc_active > a, .services-tabs .vc_tta-tab > a:hover,
#cleaning-sec-contact,
.readon-sm,
.contact-form-area input[type="submit"],
.widget_brochures a:hover,
.inquiry-btn .vc_btn3,
.team-gird .team-style2 .team-content .display-table .display-table-cell .team-title:after,
.team-gird .team-style2 .team-content .display-table .display-table-cell .team-social .social-icon:hover,
.team-gird .team-style2 .team-img .normal-text .team-name,
.team-gird .team-style1 .team-item .team-content,
.team-gird .team-style3 .team-wrapper .team_desc:before,
.team-gird .team-style4 .team-content .team-social a:hover,
.comment-respond .form-submit #submit,
.pagination-area .nav-links a,
#rscontact-pages .contact-details .vc_icon_element .vc_icon_element-inner,
#loading .object,
.services-style-3:after,
.rs-blog-details .author-block,
#rs-testimonial .slider2 .testimonial-content:hover .cl-author-info,
.rs-heading.border-style h2:after,
code,mark, ins,
#about-sec2 .about-btn,
.services-tabs .vc_tta-panel-body .btn-more,
.border-style2:after,
#rs-about.registration #registration-carpenter::before,
.services-style-3 .services-desc .btn-more
{
	background-color:<?php echo esc_attr($site_color);?> !important;
}

#rs-accordion .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a,
#rs-header .logo-area a,
article.sticky .blog-title a:after,
.btm-cate li a:hover,
.rs-blog .blog-item .full-blog-content .blog-button a:hover,
.toolbar-contact-style4 ul li i,
.primary-color,
.rs-services1 .services-icon i,
.rs-video-2 .popup-videos,
.services-style-2 .services-desc h3 a:hover,
.counter-top-area .rs-counter-list i,
.rs-portfolio .portfolio-item .p-zoom,
.team-slider-style1 .team-inner-wrap .social-icons a:hover,
#rs-footer .footer-top .recent-post-widget .post-item .post-title a:hover,
#rs-footer .footer-top ul#menu-footer-menu li:hover a, #rs-footer .footer-top ul#menu-footer-menu li:hover:before,
.nav-footer ul li a:hover,
#rs-footer .footer-bottom .footer-bottom-share ul li a:hover,
#rs-header.style2 .menu-area .menu-responsive .nav-link-container a:hover,
.team-slider-style2 .team-item-wrap .team-content .display-table .display-table-cell .team-title,
.rs-blog .blog-item .blog-content h3 a:hover,
#cta-sec .readon:hover,
#cta-sec .readon:hover:before,
.team-slider-style2 .team-item-wrap .team-content .display-table .display-table-cell .team-name a:hover,
.services-tabs .dropcap:first-letter,
#rs-header.header-styl-3 .toolbar-contact i, #rs-header.header-styl-3 .toolbar-contact a:hover,
#rs-header.header-styl-3 .toolbar-sl-share ul li a:hover,
.rs-breadcrumbs ul li,
.widget_contact_widget i,
.rs-breadcrumbs ul li a:hover,
.team-gird .team-style2 .team-content .display-table .display-table-cell .team-title,
.team-gird .team-style1 .team-item .social-icons a:hover,
.team-gird .team-style4 .team-content .team-name a:hover,
.single-teams .ps-informations ul li.social-icon i,
.bs-sidebar ul a:hover,
.main-contain ol li:before, 
.rs-blog .blog-item .full-blog-content .blog-button-icon a:hover, 
.rs-heading .sub-text,
.menu-area .navbar ul li.current-menu-parent > a, .menu-area .navbar ul li.current-menu-parent > a, .menu-area .navbar ul li.current-menu-ancestor > a,
.sidenav .menu-main-menu-container .menu li.current-menu-parent > a, .sidenav .menu-main-menu-container .menu li.current-menu-parent > ul .current-menu-item > a, .sidenav .menu-main-menu-container .menu li.current-menu-ancestor > a,
.counter-home .counter-top-area .rs-counter-list h4,
.portfolio-filter button:hover, .portfolio-filter button.active,
.widget_contact_widget ul li a:hover,
.team-slider-style1 .team-inner-wrap:hover .team-name a,
#rs-testimonial .slider2 .testimonial-content i,
.main-contain ul li:before, .main-contain ol li:before,
.breadcrumbs-inner span a:hover, 
.breadcrumbs-inner span.current-item,
#rs-services .services-style-2:hover h3 a,
#rs-accordion2 .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a,
.ps-navigation ul a:hover,
#rs-about.registration #registration-carpenter .contact-form-area .submit-center .wpcf7-submit,
#carpentervideo .rs-video-2 .popup-videos i,
.cl-testimonial1 i,
.rs-blog .blog-item .blog-full-area .blog-meta h3.blog-title a:hover
{
	color:<?php echo esc_attr($site_color); ?> !important;
}

.readon,
#rs-accordion2 .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-controls-icon:before,
.rs-services1 .services-item,
.rs-video-2 .overly-border:before,
.overly-border::before,
.overly-border::after,
.rs-portfolio .portfolio-item .portfolio-content .display-table:before,
.rs-portfolio .portfolio-item .portfolio-content .display-table:after,
.rs-portfolio .portfolio-item .p-zoom,
.rs-partner .partner-item img:hover,
.menu-area .navbar ul li ul.sub-menu,
.services-style-2 .services-desc,
.widget_brochures a:hover,
.single-teams .ps-informations ul li.social-icon i,
#rs-services .services-style-2:hover .services-desc,
blockquote,
#rs-accordion .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-controls-icon:before,
.counter-top-area .rs-counter-list:before,
.counter-top-area .rs-counter-list:after,
#rs-testimonial .slider2 .testimonial-content:hover,
.rs-video-2 .popup-videos{
	border-color: <?php echo esc_attr($site_color); ?> !important;
}

.rs-footer{
	background:<?php echo esc_attr($footer_bgcolor); ?> !important;
}

a{
	color:<?php echo  esc_attr($link_color);?>;
}
a:hover,.rs-blog .blog-item .full-blog-content .blog-title a:hover {
	color:<?php echo esc_attr($link_hover_color);?>;
}

#rs-header .menu-area .navbar ul li .sub-menu li a{
	color:<?php echo esc_attr($dropdown_text_color);?>;
}
#rs-header .menu-area .navbar ul ul li a:hover ,
#rs-header .menu-area .navbar ul ul li.current-menu-item a{
	color:<?php echo esc_attr($drop_text_hover_color);?>
}
.hover-color,
.bs-sidebar .bs-search button,
.services-style-3:hover .services-desc h3 a
{
	color:<?php echo esc_attr($hover_color); ?> !important;
}

.hover-bg, #rs-header.header-style1 .menu_one,
.services-style-2 .services-desc .btn-more:hover,
.sidenav,
#cta-sec .readon,
#about-sec2 .mt-20:hover,
.team-slider-style2 .team-item-wrap .team-img .normal-text .team-title,
.rs-about3 .vc_tta-panel-heading:hover,
.rs-about3 .vc_tta-panel.vc_active .vc_tta-panel-heading,
.rs-about3 .vc_tta-panel-heading a i,
.services-tabs .vc_tta-tab > a,
#scrollUp i:hover,
.readon:hover, .readon:focus,
.readon-sm:hover,
.contact-form-area input[type="submit"]:hover,
.services-style-3:hover:after,
.pagination-area .nav-links span.current,
.pagination-area .nav-links a:hover,
.team-gird .team-style3 .team-wrapper:hover .team_desc,
#rs-header.header-style1 .menu_one .navbar,
.header-style1 .sticky
{
	background:<?php echo esc_attr($hover_color); ?> !important;
}
.rs-porfolio-details.project-gallery .file-list-image:hover .p-zoom:hover{
	color: #fff !important;
}
.hover-border,
.readon:hover, .readon:focus,
.services-style-2:hover .services-desc{
	border-color: <?php echo esc_attr($hover_color); ?> !important;
}

.rs-portfolio .portfolio-item .title-block
{
	background: rgba(<?php echo esc_attr($site_color_rgb)?>,.9) !important;
}
.rs-portfolio .portfolio-item .portfolio-content,
.rs-blog .blog-item .blog-content:before{
	background: rgba(<?php echo esc_attr($site_color_rgb)?>,.8) !important;
}
.team-slider-style1 .team-inner-wrap .overlay,
.team-slider-style2 .team-item-wrap .team-content:before{
	background: rgba(<?php echo esc_attr($site_color_rgb)?>,.7) !important;
}

<?php if(!empty($rs_option['toolbar_bg_color'])){ ?>
	#rs-header.style2 .toolbar-area, #rs-header.style2 .menu-area{
		background: rgba(<?php echo esc_attr($toolbar_bg_color_rgb)?>,.6) !important;
	}

	#rs-header .toolbar-area{
		background:<?php  echo esc_attr($rs_option['toolbar_bg_color']);?>;
	}
<?php } ?>	

<?php if(!empty($rs_option['toolbar_text_color'])){ ?>
	#rs-header .toolbar-area .toolbar-contact ul li{
	color:<?php  echo esc_attr($rs_option['toolbar_text_color']);?>;
}
<?php } ?>

<?php if(!empty($rs_option['toolbar_link_color'])){ ?>
	#rs-header .toolbar-area .toolbar-contact ul li a{
	color:<?php  echo esc_attr($rs_option['toolbar_link_color']);?>;
}
<?php } ?>

<?php if(!empty($rs_option['toolbar_link_hover_color'])){ ?>
	#rs-header .toolbar-area .toolbar-contact ul li a:hover{
	color:<?php  echo esc_attr($rs_option['toolbar_link_hover_color']);?>;
}
<?php } ?>


<?php if(!empty($rs_option['toolbar_icon_color'])){ ?>
	#rs-header .toolbar-area .toolbar-contact ul li i{
	color:<?php  echo esc_attr($rs_option['toolbar_icon_color']);?>;
}
<?php } ?>

<?php if(!empty($rs_option['toolbar_social_icon_color'])){ ?>
	#rs-header .toolbar-area .toolbar-sl-share ul li a,
	.menu-cart-area i,
	.menu-cart-area span.icon-num{
	color:<?php  echo esc_attr($rs_option['toolbar_social_icon_color']);?>;
}
<?php } ?>

<?php if(!empty($rs_option['toolbar_social_icon_hover_color'])){ ?>
	#rs-header .toolbar-area .toolbar-sl-share ul li a:hover{
	color:<?php  echo esc_attr($rs_option['toolbar_social_icon_hover_color']);?>;
}
<?php } ?>



.footer-top .container, .footer-top ul, .footer-top ul li, .footer-top li a{
	position:relative;
	z-index: 100;
}
kbd, #about-sec2 .about-btn:hover,
#rs-about.registration .registration-form:before,
.services-tabs .vc_tta-panel-body .btn-more:hover,
.main-contain #cta-sec .readon:hover,
#rs-services .services-style-2:hover .btn-more,
.inquiry-btn .vc_btn3:hover,
.team-gird .team-style4 .team-content .team-social a{
	background: <?php echo esc_attr($rs_option['secondary_color']);?> !important;  
}
.main-contain #cta-sec .readon:hover{
	border-color: <?php echo esc_attr($rs_option['secondary_color']);?> !important
}
<?php if(!empty($rs_option['copyright_bg'])){
	?>
	.footer-bottom{
	background: <?php echo esc_attr($rs_option['copyright_bg']) ;?> !important;
}
	<?php
}


}?>
</style>
<?php
if(is_page() || is_single()){
  	$padding_top = get_post_meta(get_the_ID(), 'content_top', true);
  	$padding_bottom = get_post_meta(get_the_ID(), 'content_bottom', true);
  	if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  </style>	
	  	<?php
	  }
  }	
   
}
	}	

?>