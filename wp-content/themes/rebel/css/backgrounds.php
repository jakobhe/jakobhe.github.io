<?php

// ----------------------
//  Background options
// ----------------------

function mt_custom_backgrounds() {

	$custom_bg = get_post_meta( get_the_ID(), '_mt_use_page_title_bg_custom', true);
	$custom_img = get_post_meta( get_the_ID(), '_mt_page_title_background_image_custom', true);
	
	if (!empty($custom_bg) && $custom_bg == 'on') {
		if( !empty($custom_img) ) {
			echo '<style type="text/css">
			.page-title {
				padding-top: '. get_post_meta( get_the_ID(), '_mt_page_title_padding_top_custom', true) .'px;
				padding-bottom: '. get_post_meta( get_the_ID(), '_mt_page_title_padding_bottom_custom', true) .'px;
				background-image: none;
				background-color: '. get_post_meta( get_the_ID(), '_mt_page_title_background_color_custom', true) .';
				background-image: url('.$custom_img.');
				background-repeat: '.get_post_meta( get_the_ID(), '_mt_page_title_background_image_repeat_custom', true) .';
				background-position: '.get_post_meta( get_the_ID(), '_mt_page_title_background_image_position_custom', true) .';
				background-size: '.get_post_meta( get_the_ID(), '_mt_page_title_background_image_size_custom', true) .';
			}
			.page-title h1, .page-title h1 small, .page-title p {
				color: '. get_post_meta( get_the_ID(), '_mt_page_title_text_color_custom', true) .';
			}
			</style>';
		} else {
			echo '<style type="text/css">
			.page-title {
				padding-top: '. get_post_meta( get_the_ID(), '_mt_page_title_padding_top_custom', true) .'px;
				padding-bottom: '. get_post_meta( get_the_ID(), '_mt_page_title_padding_bottom_custom', true) .'px;
				background-image: none;
				background-color: '. get_post_meta( get_the_ID(), '_mt_page_title_background_color_custom', true) .';
			}
			.page-title h1, .page-title h1 small, .page-title p {
				color: '. get_post_meta( get_the_ID(), '_mt_page_title_text_color_custom', true) .';
			}
			</style>';
		}
	} // END use_page_title_bg_custom

} // END mt_custom_backgrounds 

add_action('wp_head', 'mt_custom_backgrounds');

?>