<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'mt_theme_metaboxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in theme-options.php.
 *
 * @return    void
 * @since     2.3.0
 */
function mt_theme_metaboxes() {

	$prefix = '_mt_';

	$sidebar = 	array(
		array( 'value' => 'left', 'label' => 'Left Sidebar', 'src' => OT_URL . '/assets/images/layout/left-sidebar.png' ),
		array( 'value' => 'right', 'label' => 'Right Sidebar', 'src' => OT_URL . '/assets/images/layout/right-sidebar.png' ),
		array( 'value' => 'none', 'label' => 'Full Width (no sidebar)', 'src' => OT_URL . '/assets/images/layout/full-width.png' ),
		array( 'value' => 'double','label' => 'Double Sidebar', 'src' => OT_URL . '/assets/images/layout/dual-sidebar.png'),
	);

	$img_repeat = array(
		array( 'value' => 'repeat', 'label' => 'Repeat all'),
		array( 'value' => 'repeat-x', 'label' => 'Repeat horizontally'),
		array( 'value' => 'repeat-y', 'label' => 'Repeat vertically'),
		array( 'value' => 'no-repeat','label' => 'No repeat')
	);

	$img_position = array(
		array( 'value' => 'left top', 'label' => 'Left Top'),
		array( 'value' => 'left center', 'label' => 'Left Center'),
		array( 'value' => 'left bottom', 'label' => 'Left Bottom'),
		array( 'value' => 'center top', 'label' => 'Center Top'),
		array( 'value' => 'center center', 'label' => 'Center Center'),
		array( 'value' => 'center bottom', 'label' => 'Center Bottom'),
		array( 'value' => 'right top', 'label' => 'Right Top'),
		array( 'value' => 'right center', 'label' => 'Right Center'),
		array( 'value' => 'right bottom', 'label' => 'Right Bottom'),
	);

	$img_bgsize = array(
		array( 'value' => 'auto', 'label' => 'Standard'),
		array( 'value' => 'cover', 'label' => 'Cover'),
	);

// ***************************
//
//        Page options
//
// ***************************
$mt_page_meta_build = array(
	'id'          => 'mt_metaboxes_page_settings',
	'title'       => __( 'Page settings', 'mthemes' ),
	'desc'        => '',
	'pages'       => array( 'page' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label' => __('Show title','mthemes'),
			'desc' => __('Choose OFF if you want to hide title from content area.','mthemes'),
			'id' => $prefix . 'show_page_title',
			'type' => 'on-off',
			'std' => 'on'
		),
		array(
			'label' => __('Page subtitle','mthemes'),
			'desc' => __('Subtitle text visible under page title. Can be used for short description','mthemes'),
			'id' => $prefix . 'page_subtitle',
			'type' => 'textarea',
			'condition'   => $prefix . 'show_page_title:is(on)'
		),
		array(
			'label' => __('Slider','mthemes'),
			'desc' => __('Choose ON if you want to use slider at the top of the content area.','mthemes'),
			'id' => $prefix . 'show_page_slider',
			'type' => 'on-off',
			'std' => 'off'
		),
		array(
			'label' => __('Slider shortcode','mthemes'),
			'desc' => __('Works only when Your slider in ON. Can be used also for map shortcode or iframe.','mthemes'),
			'id' => $prefix . 'page_slider_shortcode',
			'type' => 'textarea',
			'condition'   => $prefix . 'show_page_slider:is(on)'
		),
		array(
			'label' => __( 'Page sidebar', 'mthemes' ),
			'desc' => __('Select main content and sidebar alignment. Don\'t use sidebar when You plan to use page with sections', 'mthemes'),
			'id' => $prefix . 'page_sidebar',
			'type' => 'radio-image',
			'choices' => $sidebar,
			'std' => 'none',
		),
	),
);

// ***************************
//
//     Portfolio options
//
// ***************************
$mt_portfolio_meta_build = array(
	'id'          => 'mt_metaboxes_portfolio_settings',
	'title'       => __( 'Portfolio settings', 'mthemes' ),
	'desc'        => '',
	'pages'       => array( 'portfolio' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label' => __('Portfolio layout type','mthemes'),
			'desc' => __('Choose portfolio layout type (choose full width if You want to work with sections)', 'mthemes'),
			'id' => $prefix . 'portfolio_layout_type',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'standard', 'label' => 'Standard'),
				array( 'value' => 'full', 'label' => 'Full width'),
			),
			'std' => 'standard',
		),
		array(
			'label' => __('Related items','mthemes'),
			'desc' => __('Show related items at the bottom of the content.','mthemes'),
			'id' => $prefix . 'portfolio_related_items',
			'type' => 'on-off',
			'std' => 'off',
		),
		array(
			'label' => __('Related items number','mthemes'),
			'desc' => __('How many related items You want to show (-1 to show all)','mthemes'),
			'id' => $prefix . 'portfolio_related_number',
			'type' => 'text',
			'std' => '-1',
		),
		array(
			'label' => __('Comments','mthemes'),
			'desc' => __('Show comments under portfolio item.','mthemes'),
			'id' => $prefix . 'portfolio_comments',
			'type' => 'on-off',
			'std' => 'off',
		),
		array(
			'label' => __( 'Portfolio details', 'mthemes' ),
			'desc' => __( 'Portfolio details settings. To use them add a shortcode <b>[mt_portfolio_details]</b> somewhere in content area.', 'mthemes' ),
			'id' => $prefix . 'info_portfolio_details',
			'type' => 'textblock-titled',
		),
		array(
			'label' => __('Date label','mthemes'),
			'desc' => '',
			'id' => $prefix . 'portfolio_details_date_label',
			'type' => 'text',
			'std' => 'Date',
		),
		array(
			'label' => __('Client label','mthemes'),
			'desc' => '',
			'id' => $prefix . 'portfolio_details_client_label',
			'type' => 'text',
			'std' => 'Client',
		),
		array(
			'label' => __('Client name','mthemes'),
			'desc' => '',
			'id' => $prefix . 'portfolio_details_client',
			'type' => 'text',
			'std' => '',
		),
		array(
			'label' => __('Client url','mthemes'),
			'desc' => __('Put link url here if You want to use it with Clients name','mthemes'),
			'id' => $prefix . 'portfolio_details_client_url',
			'type' => 'text',
			'std' => '',
		),
		array(
			'label' => __('Project link text','mthemes'),
			'desc' => __('Project link text used in button','mthemes'),
			'id' => $prefix . 'portfolio_details_link',
			'type' => 'text',
			'std' => '',
		),
		array(
			'label' => __('Project link url','mthemes'),
			'desc' => '',
			'id' => $prefix . 'portfolio_details_link_url',
			'type' => 'text',
			'std' => '',
		),
	),
);

// ***************************
//
//        Post options
//
// ***************************
$mt_post_meta_build = array(
	'id'          => 'mt_metaboxes_post_settings',
	'title'       => __( 'Post settings', 'mthemes' ),
	'desc'        => '',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(		
		array(
			'label' => __( 'General settings', 'mthemes' ),
			'id' => 'mt_general_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __( 'Post sidebar', 'mthemes' ),
			'desc' => __('Select main content and sidebar alignment.', 'mthemes'),
			'id' => $prefix . 'post_sidebar',
			'type' => 'radio-image',
			'choices' => $sidebar,
			'std' => 'right',
		),
		array(
			'label' => __('Author bio box','mthemes'),
			'desc' => __('Show author bio box under the post.','mthemes'),
			'id' => $prefix . 'post_author_bio',
			'type' => 'on-off',
			'std' => 'on',
		),

		// Audio format settings
		array(
			'label' => __( 'Audio format', 'mthemes' ),
			'id' => 'mt_audio_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __('MP3 File URL','mthemes'),
			'desc' => __('Please enter in the URL to the .mp3 file','mthemes'),
			'id' => $prefix . 'post_format_audio_mp3',
			'type' => 'upload',
		),
		array(
			'label' => __('OGA File URL','mthemes'),
			'desc' => __('Please enter in the URL to the .ogg or .oga file','mthemes'),
			'id' => $prefix . 'post_format_audio_oga',
			'type' => 'upload',
		),
		array(
			'label' => __('Embedded Code','mthemes'),
			'desc' => __('If the audio is an embed, enter the code here.','mthemes'),
			'id' => $prefix . 'post_format_audio_embedded',
			'type' => 'textarea',
		),

		// Gallery format settings
		array(
			'label' => __( 'Gallery format', 'mthemes' ),
			'id' => 'mt_gallery_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __('Gallery type', 'mthemes'), 
			'desc' => __('Choose gallery type', 'mthemes'),
			'id' => $prefix . 'post_format_gallery_type',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'standardslider', 'label' => 'Standard Slider'),
				array( 'value' => 'revoslider', 'label' => 'Revolution Slider'),
			),
			'std' => 'owlslider',
		),
		array(
			'label' => __('Gallery Images', 'mthemes'),
			'desc' => __('Create a new Gallery by selecting existing or uploading new images', 'mthemes'),
			'id' => $prefix . 'post_format_gallery_ids',
			'type' => 'gallery',
			'condition' => $prefix . 'post_format_gallery_type:not(revoslider)',
		),
		array(
			'label' => __('Images size', 'mthemes'), 
			'desc' => __('Choose images size used for slider', 'mthemes'),
			'id' => $prefix . 'post_format_gallery_images_size',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'standard_43', 'label' => 'Standard (4:3 ratio)'),
				array( 'value' => 'standard_169', 'label' => 'Standard (16:9 ratio)'),
				array( 'value' => 'masonry', 'label' => 'Masonry (1140x100%)'),
			),
			'std' => 'standard_43',
			'condition' => $prefix . 'post_format_gallery_type:not(revoslider)',
		),

		// Standard slider options
		array(
			'label' => __('Lightbox', 'mthemes'),
			'desc' => __('Use lightbox effect on images from slideshow', 'mthemes'),
			'id' => $prefix . 'post_format_gallery_lightbox',
			'type' => 'on-off',
			'std' => 'on',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),
		array(
			'label' => __('Slideshow caption', 'mthemes'),
			'desc' => __('Enable slider caption', 'mthemes'),
			'id' => $prefix . 'post_format_slideshow_caption',
			'type' => 'on-off',
			'std' => 'on',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),
		array(
			'label' => __('Slideshow animation', 'mthemes'), 
			'desc' => __('Slideshow animation used for slider', 'mthemes'),
			'id' => $prefix . 'post_format_slideshow_anim',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'slide', 'label' => 'Slide'),
				array( 'value' => 'fade', 'label' => 'Fade'),
				array( 'value' => 'backSlide', 'label' => 'backSlide'),
				array( 'value' => 'goDown', 'label' => 'goDown'),
				array( 'value' => 'fadeUp', 'label' => 'fadeUp'),			
			),
			'std' => '',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),
		array(
			'label' => __('Slideshow speed','mthemes'),
			'desc' => __('Speed of the slideshow cycling, in milliseconds','mthemes'),
			'id' => $prefix . 'post_format_slideshow_speed',
			'type' => 'text',
			'std' => '4000',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),
		array(
			'label' => __('Slideshow pagination', 'mthemes'),
			'desc' => __('Enable navigation for paging control of each slide', 'mthemes'),
			'id' => $prefix . 'post_format_slideshow_pagi',
			'type' => 'on-off',
			'std' => 'on',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),
		array(
			'label' => __('Slideshow navigation', 'mthemes'),
			'desc' => __('Enable arrow navigation for previous/next slide', 'mthemes'),
			'id' => $prefix . 'post_format_slideshow_nav',
			'type' => 'on-off',
			'std' => 'on',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),		
		array(
			'label' => __('Slideshow pause', 'mthemes'),
			'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering', 'mthemes'),
			'id' => $prefix . 'post_format_slideshow_pause',
			'type' => 'on-off',
			'std' => 'on',
			'condition' => $prefix . 'post_format_gallery_type:is(standardslider)',
		),

		// Shortcode slider options
		array(
			'label' => __('Revolution Slider','mthemes'),
			'desc' => __('Enter here shortcode of Revolution Slider','mthemes'),
			'id' => $prefix . 'post_format_shortcode_slider_id',
			'type' => 'text',
			'condition' => $prefix . 'post_format_gallery_type:is(revoslider)',
		),

		// Link format settings
		array(
			'label' => __( 'Link format', 'mthemes' ),
			'id' => 'mt_link_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __('Custom url','mthemes'),
			'desc' => __('Enter here url of the link<br>e.g. http://www.google.com<br><br><br>','mthemes'),
			'id' => $prefix . 'post_format_link_url',
			'type' => 'text',
		),

		// Quote format settings
		array(
			'label' => __( 'Quote format', 'mthemes' ),
			'id' => 'mt_quote_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __('Quote author','mthemes'),
			'desc' => __('Enter here quote author name/company/position etc.<br><br><br><br>','mthemes'),
			'id' => $prefix . 'post_format_quote_author',
			'type' => 'text',
		),

		// Video format settings
		array(
			'label' => __( 'Video format', 'mthemes' ),
			'id' => 'mt_video_post_settings',
			'type' => 'tab'
		),
		array(
			'label' => __('MP4 File URL','mthemes'),
			'desc' => __('Please enter in the URL to the .mp4 file','mthemes'),
			'id' => $prefix . 'post_format_video_m4v',
			'type' => 'upload',
		),
		array(
			'label' => __('OGV File URL','mthemes'),
			'desc' => __('Please enter in the URL to the .ogg or .ogv file','mthemes'),
			'id' => $prefix . 'post_format_video_ogv',
			'type' => 'upload',
		),
		array(
			'label' => __('Embedded Code','mthemes'),
			'desc' => __('If the video is an embed, enter the code here.','mthemes'),
			'id' => $prefix . 'post_format_video_embedded',
			'type' => 'textarea',
		),
		array(
			'label' => __('Video poster', 'mthemes'),
			'desc' => __('Image to show as placeholder before the media plays', 'mthemes'),
			'id' => $prefix . 'post_format_video_poster',
			'type' => 'upload',
		),
	),
);

// ***************************
//
//        Team options
//
// ***************************
$mt_team_meta_build = array(
	'id'          => 'mt_metaboxes_team_settings',
	'title'       => __( 'Team member settings', 'mthemes' ),
	'desc'        => '',
	'pages'       => array( 'teammembers' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label' => __('Featured image','mthemes'),
			'desc' => __('Choose to show or hide featured image on single team member page', 'mthemes'),
			'id' => $prefix . 'team_featured_image',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'hide', 'label' => 'Hide'),
				array( 'value' => 'show', 'label' => 'Show'),
			),
			'std' => 'hide',
		),
		array(
			'label' => __('Team single page layout type','mthemes'),
			'desc' => __('Choose team single page layout type (choose full width if You want to work with sections)', 'mthemes'),
			'id' => $prefix . 'team_layout_type',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'standard', 'label' => 'Standard'),
				array( 'value' => 'full', 'label' => 'Full width'),
			),
			'std' => 'standard',
		),
		array(
			'label' => __('Person description link','mthemes'),
			'desc' => __('Choose what kind of description You want to open after clicking on person link', 'mthemes'),
			'id' => $prefix . 'team_description',
			'type' => 'select',
			'choices' => array(
				array( 'value' => 'single', 'label' => 'Single page'),
				array( 'value' => 'custom', 'label' => 'Custom link'),
			),
			'std' => 'single',
		),
		array(
			'label' => __('Custom link','mthemes'),
			'desc' => __('Put your link here if You chose Custom link above','mthemes'),
			'id' => $prefix . 'team_link_custom',
			'type' => 'text',
			'std' => '',
		),
		array(
			'label' => __('Person position','mthemes'),
			'desc' => __('You can place here something like CEO, Company Owner etc.','mthemes'),
			'id' => $prefix . 'team_position',
			'type' => 'text',
			'std' => '',
		),
		array(
			'label' => __('Team member social icons','mthemes'),
			'desc' => __('You can easily generate this shortcode on every page and just paste it here','mthemes'),
			'id' => $prefix . 'team_social_icons',
			'type' => 'textarea',
			'std' => '[mt_social_icons]'."\n".'[mt_social_icon icontype="twitter" icontitle="Twitter" url="#"]'."\n".'[mt_social_icon icontype="facebook" icontitle="Facebook" url="#"]'."\n".'[mt_social_icon icontype="youtube" icontitle="YouTube" url="#"]'."\n".'[/mt_social_icons]',
		),
		array(
			'label' => __('Social icons on single page','mthemes'),
			'desc' => __('Choose ON if you want to show social icons at the bottom of the single page.','mthemes'),
			'id' => $prefix . 'team_social_icons_onoff',
			'type' => 'on-off',
			'std' => 'on'
		),
	),
);

// ***************************
//
//     Background settings
//
// ***************************
$mt_background_meta_build = array(
	'id'          => 'mt_metaboxes_background_settings',
	'title'       => __( 'Background settings', 'mthemes' ),
	'desc'        => '',
	'pages'       => array( 'page', 'post', 'teammembers', 'portfolio' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label' => __('Use custom background','mthemes'),
			'desc' => __('Choose ON if you want to use custom background for this page.','mthemes'),
			'id' => $prefix . 'use_page_title_bg_custom',
			'type' => 'on-off',
			'std' => 'off'
		),
		array(
			'label' => __('Padding top','mthemes'),
			'desc' => __('Enter here value for top padding (in pixels)','mthemes'),
			'id' => $prefix . 'page_title_padding_top_custom',
			'type' => 'text',
			'std' => '50',
		),
		array(
			'label' => __('Padding bottom','mthemes'),
			'desc' => __('Enter here value for bottom padding (in pixels)','mthemes'),
			'id' => $prefix . 'page_title_padding_bottom_custom',
			'type' => 'text',
			'std' => '50',
		),
		array(
			'label' => __('Background color','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_background_color_custom',
			'type' => 'colorpicker',
		),
		array(
			'label' => __('Text color','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_text_color_custom',
			'type' => 'colorpicker',
		),
		array(
			'label' => __('Use custom image','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_custom_image_onoff_custom',
			'type' => 'on-off',
			'std' => 'off',
		),
		array(
			'label' => __('Background image','mthemes'),
			'desc' => __('Choose image or enter url','mthemes'),
			'id' => $prefix . 'page_title_background_image_custom',
			'type' => 'upload',
			'condition' => $prefix . 'page_title_custom_image_onoff_custom:is(on)',
		),
		array(
			'label' => __('Background image repeat','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_background_image_repeat_custom',
			'type' => 'select',
			'condition' => $prefix . 'page_title_custom_image_onoff_custom:is(on)',
			'choices' => $img_repeat,
			'std' => 'repeat',
		),
		array(
			'label' => __('Background image position','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_background_image_position_custom',
			'type' => 'select',
			'condition' => $prefix . 'page_title_custom_image_onoff_custom:is(on)',
			'choices' => $img_position,
			'std' => 'left top',
		),
		array(
			'label' => __('Background image size','mthemes'),
			'desc' => '',
			'id' => $prefix . 'page_title_background_image_size_custom',
			'type' => 'select',
			'condition' => $prefix . 'page_title_custom_image_onoff_custom:is(on)',
			'choices' => $img_bgsize,
			'std' => 'auto',
		),

	),
);


	/**
	*
	* Register our meta boxes using the 
	* ot_register_meta_box() function.
	*
	*/
	if ( function_exists( 'ot_register_meta_box' ) ) 
		ot_register_meta_box( $mt_page_meta_build );
		ot_register_meta_box( $mt_portfolio_meta_build );
		ot_register_meta_box( $mt_post_meta_build );
		ot_register_meta_box( $mt_team_meta_build );
		ot_register_meta_box( $mt_background_meta_build );

}