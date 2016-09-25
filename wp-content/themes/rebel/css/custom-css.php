<?php 

function mt_custom_css() {

	global $mt_options;

// ----------------------
//  Background options
// ----------------------
	// if is on single page for cpt use this for bg options
	if( !empty($mt_options['page_title_background_image']['url']) ) {
		$background = 'background-color: '. $mt_options['page_title_background_color'] .';';
		$background .= ' background-image: url('.$mt_options['page_title_background_image']['url'].');';
		$background .= ' background-repeat: '.$mt_options['page_title_background_image_repeat'].';';
		$background .= ' background-attachment: '.$mt_options['page_title_background_image_attachment'].';';
		$background .= ' background-position: '.$mt_options['page_title_background_image_position'].';';
		$background .= ' background-size: '.$mt_options['page_title_background_image_size'].';';
	} else {
		$background = 'background-color: '. $mt_options['page_title_background_color'] .';';
	}

// ----------------------
//  Color options
// ----------------------
	$header_bg = $mt_options['header_bg_color'];
	$header_text = $mt_options['header_text_color'];
	$header_fixed_bg = mt_hex2rgb($mt_options['header_bg_color']);
	$header_fixed_opacity = $mt_options['header_fixed_opacity'];
	$header_top_border = $mt_options['header_top_border_color'];
	$header_top_text = $mt_options['header_top_text_color'];

	$nav_text = $mt_options['navigation_text_color'];
	$nav_text_hover = $mt_options['navigation_text_color_hover'];
	$subnav_text = $mt_options['navigation_sub_text_color'];
	$subnav_text_hover = $mt_options['navigation_sub_text_color_hover'];
	$subnav_bg = $mt_options['navigation_sub_bg_color'];
	$subnav_bg_hover = $mt_options['navigation_sub_bg_color_hover'];

	$footer_bg = $mt_options['footer_bg_color'];
	$footer_border = $mt_options['footer_border_color'];
	$footer_text = $mt_options['footer_text_color'];
	$footer_header = $mt_options['footer_header_color'];	

	$default_color = $mt_options['default_color'];
	$default_color_text = $mt_options['default_color_text'];
	$default_hover_color = $mt_options['default_color_hover'];
	$default_hover_color_text = $mt_options['default_color_text_hover'];

?>

<style type="text/css">
	.page-title {
		<?php echo $background; ?>
		padding-top: <?php echo $mt_options['page_title_padding_top']; ?>px;
		padding-bottom: <?php echo $mt_options['page_title_padding_bottom']; ?>px;
	}
	.page-title h1, .page-title h1 small, .page-title p {
		color: <?php echo $mt_options['page_title_text_color']; ?>;
	}
	.header .logo {
		top: <?php echo $mt_options['logo_top_margin']; ?>px;
	}
	.logo .retina-logo {
		height: <?php echo $mt_options['logo_height']; ?>px;
	}
	.header {
		height: <?php echo $mt_options['header_height']; ?>px;
	}
	.navigation-wrapper ul.sf-menu {
		margin-top: <?php echo $mt_options['nav_margin_top']; ?>px;
	}
	.sf-menu > li > a {
		padding-bottom: <?php echo $mt_options['nav_padding_bottom']; ?>px;
	}
	.sf-menu li:hover ul,
	.sf-menu li.sfHover ul {
		top: <?php echo $mt_options['subnav_margin_top']; ?>px;
	}
	.sf-menu li.megamenu:hover > ul.sub-menu,
	.sf-menu li.megamenu.sfHover > ul.sub-menu {
		top: <?php echo $mt_options['megamenu_margin_top']; ?>px;
	}
	h1 {font-size: <?php echo $mt_options['h1_font_size']; ?>px;}
	h2 {font-size: <?php echo $mt_options['h2_font_size']; ?>px;}
	h3 {font-size: <?php echo $mt_options['h3_font_size']; ?>px;}
	h4 {font-size: <?php echo $mt_options['h4_font_size']; ?>px;}
	h5 {font-size: <?php echo $mt_options['h5_font_size']; ?>px;}
	h6 {font-size: <?php echo $mt_options['h6_font_size']; ?>px;}
	.line-header h1 {font-size: <?php echo $mt_options['h1_custom_font_size']; ?>px;}
	.line-header h2 {font-size: <?php echo $mt_options['h2_custom_font_size']; ?>px;}
	.line-header h3 {font-size: <?php echo $mt_options['h3_custom_font_size']; ?>px;}
	.line-header h4 {font-size: <?php echo $mt_options['h4_custom_font_size']; ?>px;}
	.line-header h5 {font-size: <?php echo $mt_options['h5_custom_font_size']; ?>px;}
	.line-header h6 {font-size: <?php echo $mt_options['h6_custom_font_size']; ?>px;}

	/* color */
	a,
	.widget a:hover,
	.copyright a:hover,
	.mt-blog.grid .post-content a:hover,
	a.more-link:hover,
	.post-header a:hover,
	.footer-nav a:hover,
	.mt-section.mt-text-light .latest-posts .post-title a:hover,
	.top-navigation-wrapper li a:hover,
	.team-member-text h4 a:hover,
	.mt-breadcrumbs a:hover {
		color: <?php echo $default_color; ?>;
	}
	a:hover {
		color: <?php echo $default_hover_color; ?>;
	}
	::-moz-selection {background-color: <?php echo $default_color; ?>;}
	::selection {background-color: <?php echo $default_color; ?>;}
	::-moz-selection {color: <?php echo $default_color_text; ?>;}
	::selection {color: <?php echo $default_color_text; ?>;}
	.btn.btn-default,
	.form-submit #submit,
	.wpcf7-form input.wpcf7-submit,
	.widget .tagcloud a,
	.format-link .post-header h1 a:hover,
	.mt-blog.grid .format-link a:hover,
	.flex-caption-title,
	.mt-opil, .mt-opip,
	.mt_link a,
	.mt_link.mt_color_reverse a:hover,
	.mt-pagination span.current,
	.mt-pagination a:hover,
	.skill-bar span {
		color: <?php echo $default_color_text; ?>;
		background: <?php echo $default_color; ?>;
	}
	.btn.btn-default:hover,
	.form-submit #submit:hover,
	.wpcf7-form input.wpcf7-submit:hover,
	.widget .tagcloud a:hover,
	.mt-opil:hover, .mt-opip:hover,
	.mt_link a:hover,
	.mt_link.mt_color_reverse a {
		color: <?php echo $default_hover_color_text; ?>;
		background: <?php echo $default_hover_color; ?>;
	}
	.panel-default > .panel-heading,
	.panel-default > .panel-footer {
		color: <?php echo $default_color_text; ?>;
		background: <?php echo $default_color; ?>;
	}
	.text-default {
		color: <?php echo $default_color; ?>;
	}
	.alert-default {
		background: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}
	.alert .close {
		color: <?php echo $default_color_text; ?>;
	}
	.label-default,
	.line-header > .header-sep {
		background: <?php echo $default_color; ?>;
	}

	/* header + navigation */
	.header-wrapper {
		background: <?php echo $header_bg; ?>;
	}
	.fixed-header .header-wrapper {
		background: rgba(<?php echo $header_fixed_bg[0]; ?>,<?php echo $header_fixed_bg[1]; ?>,<?php echo $header_fixed_bg[2]; ?>,<?php echo $header_fixed_opacity; ?>);
	}
	.header-top {
		border-bottom-color: <?php echo $header_top_border; ?>;
	}
	.header-top,
	.top-navigation-wrapper li a {
		color: <?php echo $header_top_text; ?>;
	}
	.sf-menu a {
		color: <?php echo $nav_text; ?>;
	}
	.sf-menu > li > a i.underline {
		background: <?php echo $nav_text_hover; ?>;
	}
	.sf-menu > li > a:hover,
	.sf-menu > li.current-menu-item > a,
	.sf-menu > li.current-menu-ancestor > a {
		color: <?php echo $nav_text_hover; ?>;
	}
	.sf-menu-mobile li a:hover,
	.sf-menu-mobile li.current-menu-item > a {
		color: <?php echo $default_color_text; ?>;
		background: <?php echo $default_color; ?>;
	}
	.sf-menu ul {
		background: <?php echo $subnav_bg; ?>;
	}
	.sf-menu ul a {
		color: <?php echo $subnav_text; ?>;
	}
	.sf-menu ul a:hover,
	.sf-menu ul li.current-menu-item > a,
	.sf-menu .current-menu-item ul.sub-menu li a:hover,
	.sf-menu ul li.current-menu-parent > a {
		color: <?php echo $subnav_text_hover; ?>;
		background: <?php echo $subnav_bg_hover; ?>;
	}
	.sf-menu > li.megamenu > ul > li > a {
		color: <?php echo $subnav_text; ?> !important;
	}

	/* footer section */
	.footer-wrapper {
		background: <?php echo $footer_bg; ?>;
		color: <?php echo $footer_text; ?>;
	}
	.footer-wrapper {
		border-bottom: 1px solid <?php echo $footer_border; ?>;
		border-top: 1px solid <?php echo $footer_border; ?>;
	}
	.footer .widget h1,
	.footer .widget h2,
	.footer .widget h3,
	.footer .widget h4,
	.footer .widget h5,
	.footer .widget h6,
	.footer-wrapper a,
	.footer-wrapper h4 {
		color: <?php echo $footer_header; ?>;
	}

	/* blog */
	.meta-item a:hover {
		color: <?php echo $default_color; ?>;
	}
	.meta-author a:hover,
	.meta-comments a:hover {
		color: <?php echo $default_color_text; ?>;
		background: <?php echo $default_color; ?>;
	}
	.latest-posts .post-title h4 a:hover {
		color: <?php echo $default_hover_color; ?>;
	}
	.comment-meta a:hover,
	.comment-author.vcard .fn a:hover,
	.comment-reply-link:hover,
	.logged-in-as a:hover {
		color: <?php echo $default_color; ?>;
	}

	/* sidebar navigation */
	.widget_nav_menu li a:hover,
	.widget_nav_menu ul > li.current-menu-item > a,
	.sidebar-nav .widget_nav_menu li.active > a {
		border-bottom: 2px solid <?php echo $default_color; ?>;
		color: <?php echo $default_color; ?>;
	}

	/* portfolio */
	.portfolio-filters li a:hover,
	.portfolio-filters li.current a:hover {
		color: <?php echo $default_color; ?>;
		border-bottom: 2px solid <?php echo $default_color; ?>;
	}
	.portfolio-details a:hover {
		color: <?php echo $default_color; ?>;
	}

	/* testimonial */
	.test-flexslider .flex-direction-nav a:hover {
		background: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}
	.test-flexslider.test-style2 .flex-direction-nav a:hover {
		color: <?php echo $default_color; ?>;
	}

	/* tabs, toggle, accordions */
	.mt_toggle_title:before,
	.mt_accordion_title .ui-icon,
	.mt_accordion .wpb_accordion_wrapper .mt_accordion_title.ui-state-default .ui-icon {
		background-color: <?php echo $default_color; ?>;
	}
	.wpb_wrapper.mt_tabs .mt_tabs_nav li a:hover,
	.wpb_wrapper.mt_tabs .mt_tabs_nav li.ui-state-active a,
	.vc_tta-tabs:not([class*="vc_tta-gap"]):not(.vc_tta-o-no-fill).vc_tta-tabs-position-top .vc_tta-tab.vc_active > a,
	.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-tab > a:hover,
	.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-tab > a:focus,
	.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-tab.vc_active > a {
		background: <?php echo $default_color; ?>;
		border-color: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}
	.vc_tta-color-white.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-title > a {
		color: <?php echo $default_color_text; ?>;
	}
	.vc_tta-color-white.vc_tta-style-flat .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before,
	.vc_tta-color-white.vc_tta-style-flat .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::after {
		border-color: <?php echo $default_color_text; ?>;
	}
	.vc_tta-color-white.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading {
		background-color: <?php echo $default_color; ?>;
	}

	/* services */
	.service-wrapper .service-icon {
		color: <?php echo $default_color; ?>;
	}
	.service-icon-box .service-icon {
		background: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}

	/* milestone */
	.milestone-wrapper:hover .milestone-number {
		color: <?php echo $default_color; ?>;
	}
	.panel-default {
		border-color: <?php echo $default_color; ?>;
	}

	/* flexslider */
	.flex-control-paging li a:hover,
	.flex-direction-nav a:hover,
	.portfolio-navigation div a:hover,
	#toTop:hover {
		background: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}
	.flex-control-paging li a.flex-active {
		background: <?php echo $default_color; ?>;	
	}

	/* owl carousel */
	.owl-prev:hover,
	.owl-next:hover {
		color: <?php echo $default_color_text; ?>;
		background: <?php echo $default_color; ?>;
		border: 2px solid <?php echo $default_color; ?>;
	}
	.owl-page-slide .owl-buttons div:hover {
		background: <?php echo $default_color; ?>;
		color: <?php echo $default_color_text; ?>;
	}

	/* media audio, video colors */
	.mejs-container .mejs-controls .mejs-time-rail .mejs-time-current {
		background: <?php echo $default_color; ?>;
	}
	.mejs-container .mejs-controls .mejs-time-rail .mejs-time-float,
	.mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
		background: <?php echo $default_color; ?>;
	}
	.mejs-container .mejs-controls .mejs-time-rail .mejs-time-float-corner {
		border-color: <?php echo $default_color; ?> rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
	}

	/* form elements */
	.wpcf7-form input:focus,
	.wpcf7-form textarea:focus,
	.wpcf7-form select:focus,
	#commentform input:focus,
	#commentform textarea:focus,
	#searchform input:focus {
		border: 2px solid <?php echo $default_color; ?>;
	}

	/* additional custom styles */
	.accent_bg_icon_thumb,
	.accent_bg_heavy_70 {
		background: <?php echo $default_color; ?> !important;
		color: <?php echo $default_color_text; ?> !important;
	}
	

	<?php
	// custom css from admin panel	
	echo $mt_options['custom_css']; ?>
</style>

<?php
}

add_action('wp_head', 'mt_custom_css');

?>