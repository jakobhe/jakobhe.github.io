<?php

// Remove default VC elements. If You want them back just comment or remove proper lines from list below
vc_remove_element("vc_pie");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_gmaps");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_gallery");
vc_remove_element("vc_single_image");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_message");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_video");
vc_remove_element("vc_custom_heading");


// Font Awesome picker param
function mt_vc_fontawesome_picker($settings, $value) {
	$dependency = vc_generate_dependencies_attributes($settings);

	$fa_icons = array('fa fa-glass','fa fa-music','fa fa-search','fa fa-envelope-o','fa fa-heart','fa fa-star','fa fa-star-o','fa fa-user','fa fa-film','fa fa-th-large','fa fa-th','fa fa-th-list','fa fa-check','fa fa-remove','fa fa-close','fa fa-times','fa fa-search-plus','fa fa-search-minus','fa fa-power-off','fa fa-signal','fa fa-gear','fa fa-cog','fa fa-trash-o','fa fa-home','fa fa-file-o','fa fa-clock-o','fa fa-road','fa fa-download','fa fa-arrow-circle-o-down','fa fa-arrow-circle-o-up','fa fa-inbox','fa fa-play-circle-o','fa fa-rotate-right','fa fa-repeat','fa fa-refresh','fa fa-list-alt','fa fa-lock','fa fa-flag','fa fa-headphones','fa fa-volume-off','fa fa-volume-down','fa fa-volume-up','fa fa-qrcode','fa fa-barcode','fa fa-tag','fa fa-tags','fa fa-book','fa fa-bookmark','fa fa-print','fa fa-camera','fa fa-font','fa fa-bold','fa fa-italic','fa fa-text-height','fa fa-text-width','fa fa-align-left','fa fa-align-center','fa fa-align-right','fa fa-align-justify','fa fa-list','fa fa-dedent','fa fa-outdent','fa fa-indent','fa fa-video-camera','fa fa-photo','fa fa-image','fa fa-picture-o','fa fa-pencil','fa fa-map-marker','fa fa-adjust','fa fa-tint','fa fa-edit','fa fa-pencil-square-o','fa fa-share-square-o','fa fa-check-square-o','fa fa-arrows','fa fa-step-backward','fa fa-fast-backward','fa fa-backward','fa fa-play','fa fa-pause','fa fa-stop','fa fa-forward','fa fa-fast-forward','fa fa-step-forward','fa fa-eject','fa fa-chevron-left','fa fa-chevron-right','fa fa-plus-circle','fa fa-minus-circle','fa fa-times-circle','fa fa-check-circle','fa fa-question-circle','fa fa-info-circle','fa fa-crosshairs','fa fa-times-circle-o','fa fa-check-circle-o','fa fa-ban','fa fa-arrow-left','fa fa-arrow-right','fa fa-arrow-up','fa fa-arrow-down','fa fa-mail-forward','fa fa-share','fa fa-expand','fa fa-compress','fa fa-plus','fa fa-minus','fa fa-asterisk','fa fa-exclamation-circle','fa fa-gift','fa fa-leaf','fa fa-fire','fa fa-eye','fa fa-eye-slash','fa fa-warning','fa fa-exclamation-triangle','fa fa-plane','fa fa-calendar','fa fa-random','fa fa-comment','fa fa-magnet','fa fa-chevron-up','fa fa-chevron-down','fa fa-retweet','fa fa-shopping-cart','fa fa-folder','fa fa-folder-open','fa fa-arrows-v','fa fa-arrows-h','fa fa-bar-chart-o','fa fa-bar-chart','fa fa-twitter-square','fa fa-facebook-square','fa fa-camera-retro','fa fa-key','fa fa-gears','fa fa-cogs','fa fa-comments','fa fa-thumbs-o-up','fa fa-thumbs-o-down','fa fa-star-half','fa fa-heart-o','fa fa-sign-out','fa fa-linkedin-square','fa fa-thumb-tack','fa fa-external-link','fa fa-sign-in','fa fa-trophy','fa fa-github-square','fa fa-upload','fa fa-lemon-o','fa fa-phone','fa fa-square-o','fa fa-bookmark-o','fa fa-phone-square','fa fa-twitter','fa fa-facebook','fa fa-github','fa fa-unlock','fa fa-credit-card','fa fa-rss','fa fa-hdd-o','fa fa-bullhorn','fa fa-bell','fa fa-certificate','fa fa-hand-o-right','fa fa-hand-o-left','fa fa-hand-o-up','fa fa-hand-o-down','fa fa-arrow-circle-left','fa fa-arrow-circle-right','fa fa-arrow-circle-up','fa fa-arrow-circle-down','fa fa-globe','fa fa-wrench','fa fa-tasks','fa fa-filter','fa fa-briefcase','fa fa-arrows-alt','fa fa-group','fa fa-users','fa fa-chain','fa fa-link','fa fa-cloud','fa fa-flask','fa fa-cut','fa fa-scissors','fa fa-copy','fa fa-files-o','fa fa-paperclip','fa fa-save','fa fa-floppy-o','fa fa-square','fa fa-navicon','fa fa-reorder','fa fa-bars','fa fa-list-ul','fa fa-list-ol','fa fa-strikethrough','fa fa-underline','fa fa-table','fa fa-magic','fa fa-truck','fa fa-pinterest','fa fa-pinterest-square','fa fa-google-plus-square','fa fa-google-plus','fa fa-money','fa fa-caret-down','fa fa-caret-up','fa fa-caret-left','fa fa-caret-right','fa fa-columns','fa fa-unsorted','fa fa-sort','fa fa-sort-down','fa fa-sort-desc','fa fa-sort-up','fa fa-sort-asc','fa fa-envelope','fa fa-linkedin','fa fa-rotate-left','fa fa-undo','fa fa-legal','fa fa-gavel','fa fa-dashboard','fa fa-tachometer','fa fa-comment-o','fa fa-comments-o','fa fa-flash','fa fa-bolt','fa fa-sitemap','fa fa-umbrella','fa fa-paste','fa fa-clipboard','fa fa-lightbulb-o','fa fa-exchange','fa fa-cloud-download','fa fa-cloud-upload','fa fa-user-md','fa fa-stethoscope','fa fa-suitcase','fa fa-bell-o','fa fa-coffee','fa fa-cutlery','fa fa-file-text-o','fa fa-building-o','fa fa-hospital-o','fa fa-ambulance','fa fa-medkit','fa fa-fighter-jet','fa fa-beer','fa fa-h-square','fa fa-plus-square','fa fa-angle-double-left','fa fa-angle-double-right','fa fa-angle-double-up','fa fa-angle-double-down','fa fa-angle-left','fa fa-angle-right','fa fa-angle-up','fa fa-angle-down','fa fa-desktop','fa fa-laptop','fa fa-tablet','fa fa-mobile-phone','fa fa-mobile','fa fa-circle-o','fa fa-quote-left','fa fa-quote-right','fa fa-spinner','fa fa-circle','fa fa-mail-reply','fa fa-reply','fa fa-github-alt','fa fa-folder-o','fa fa-folder-open-o','fa fa-smile-o','fa fa-frown-o','fa fa-meh-o','fa fa-gamepad','fa fa-keyboard-o','fa fa-flag-o','fa fa-flag-checkered','fa fa-terminal','fa fa-code','fa fa-mail-reply-all','fa fa-reply-all','fa fa-star-half-empty','fa fa-star-half-full','fa fa-star-half-o','fa fa-location-arrow','fa fa-crop','fa fa-code-fork','fa fa-unlink','fa fa-chain-broken','fa fa-question','fa fa-info','fa fa-exclamation','fa fa-superscript','fa fa-subscript','fa fa-eraser','fa fa-puzzle-piece','fa fa-microphone','fa fa-microphone-slash','fa fa-shield','fa fa-calendar-o','fa fa-fire-extinguisher','fa fa-rocket','fa fa-maxcdn','fa fa-chevron-circle-left','fa fa-chevron-circle-right','fa fa-chevron-circle-up','fa fa-chevron-circle-down','fa fa-html5','fa fa-css3','fa fa-anchor','fa fa-unlock-alt','fa fa-bullseye','fa fa-ellipsis-h','fa fa-ellipsis-v','fa fa-rss-square','fa fa-play-circle','fa fa-ticket','fa fa-minus-square','fa fa-minus-square-o','fa fa-level-up','fa fa-level-down','fa fa-check-square','fa fa-pencil-square','fa fa-external-link-square','fa fa-share-square','fa fa-compass','fa fa-toggle-down','fa fa-caret-square-o-down','fa fa-toggle-up','fa fa-caret-square-o-up','fa fa-toggle-right','fa fa-caret-square-o-right','fa fa-euro','fa fa-eur','fa fa-gbp','fa fa-dollar','fa fa-usd','fa fa-rupee','fa fa-inr','fa fa-cny','fa fa-rmb','fa fa-yen','fa fa-jpy','fa fa-ruble','fa fa-rouble','fa fa-rub','fa fa-won','fa fa-krw','fa fa-bitcoin','fa fa-btc','fa fa-file','fa fa-file-text','fa fa-sort-alpha-asc','fa fa-sort-alpha-desc','fa fa-sort-amount-asc','fa fa-sort-amount-desc','fa fa-sort-numeric-asc','fa fa-sort-numeric-desc','fa fa-thumbs-up','fa fa-thumbs-down','fa fa-youtube-square','fa fa-youtube','fa fa-xing','fa fa-xing-square','fa fa-youtube-play','fa fa-dropbox','fa fa-stack-overflow','fa fa-instagram','fa fa-flickr','fa fa-adn','fa fa-bitbucket','fa fa-bitbucket-square','fa fa-tumblr','fa fa-tumblr-square','fa fa-long-arrow-down','fa fa-long-arrow-up','fa fa-long-arrow-left','fa fa-long-arrow-right','fa fa-apple','fa fa-windows','fa fa-android','fa fa-linux','fa fa-dribbble','fa fa-skype','fa fa-foursquare','fa fa-trello','fa fa-female','fa fa-male','fa fa-gittip','fa fa-sun-o','fa fa-moon-o','fa fa-archive','fa fa-bug','fa fa-vk','fa fa-weibo','fa fa-renren','fa fa-pagelines','fa fa-stack-exchange','fa fa-arrow-circle-o-right','fa fa-arrow-circle-o-left','fa fa-toggle-left','fa fa-caret-square-o-left','fa fa-dot-circle-o','fa fa-wheelchair','fa fa-vimeo-square','fa fa-turkish-lira','fa fa-try','fa fa-plus-square-o','fa fa-space-shuttle','fa fa-slack','fa fa-envelope-square','fa fa-wordpress','fa fa-openid','fa fa-institution','fa fa-bank','fa fa-university','fa fa-mortar-board','fa fa-graduation-cap','fa fa-yahoo','fa fa-google','fa fa-reddit','fa fa-reddit-square','fa fa-stumbleupon-circle','fa fa-stumbleupon','fa fa-delicious','fa fa-digg','fa fa-pied-piper','fa fa-pied-piper-alt','fa fa-drupal','fa fa-joomla','fa fa-language','fa fa-fax','fa fa-building','fa fa-child','fa fa-paw','fa fa-spoon','fa fa-cube','fa fa-cubes','fa fa-behance','fa fa-behance-square','fa fa-steam','fa fa-steam-square','fa fa-recycle','fa fa-automobile','fa fa-car','fa fa-cab','fa fa-taxi','fa fa-tree','fa fa-spotify','fa fa-deviantart','fa fa-soundcloud','fa fa-database','fa fa-file-pdf-o','fa fa-file-word-o','fa fa-file-excel-o','fa fa-file-powerpoint-o','fa fa-file-photo-o','fa fa-file-picture-o','fa fa-file-image-o','fa fa-file-zip-o','fa fa-file-archive-o','fa fa-file-sound-o','fa fa-file-audio-o','fa fa-file-movie-o','fa fa-file-video-o','fa fa-file-code-o','fa fa-vine','fa fa-codepen','fa fa-jsfiddle','fa fa-life-bouy','fa fa-life-buoy','fa fa-life-saver','fa fa-support','fa fa-life-ring','fa fa-circle-o-notch','fa fa-ra','fa fa-rebel','fa fa-ge','fa fa-empire','fa fa-git-square','fa fa-git','fa fa-hacker-news','fa fa-tencent-weibo','fa fa-qq','fa fa-wechat','fa fa-weixin','fa fa-send','fa fa-paper-plane','fa fa-send-o','fa fa-paper-plane-o','fa fa-history','fa fa-circle-thin','fa fa-header','fa fa-paragraph','fa fa-sliders','fa fa-share-alt','fa fa-share-alt-square','fa fa-bomb','fa fa-soccer-ball-o','fa fa-futbol-o','fa fa-tty','fa fa-binoculars','fa fa-plug','fa fa-slideshare','fa fa-twitch','fa fa-yelp','fa fa-newspaper-o','fa fa-wifi','fa fa-calculator','fa fa-paypal','fa fa-google-wallet','fa fa-cc-visa','fa fa-cc-mastercard','fa fa-cc-discover','fa fa-cc-amex','fa fa-cc-paypal','fa fa-cc-stripe','fa fa-bell-slash','fa fa-bell-slash-o','fa fa-trash','fa fa-copyright','fa fa-at','fa fa-eyedropper','fa fa-paint-brush','fa fa-birthday-cake','fa fa-area-chart','fa fa-pie-chart','fa fa-line-chart','fa fa-lastfm','fa fa-lastfm-square','fa fa-toggle-off','fa fa-toggle-on','fa fa-bicycle','fa fa-bus','fa fa-ioxhost','fa fa-angellist','fa fa-cc','fa fa-shekel','fa fa-sheqel','fa fa-ils','fa fa-meanpath');

	$fa_param  = '';
	$fa_param .= 'Current Icon: <i class="'.$value.'" style="font-size:20px; background: #fafafa; border: 1px solid #eee; width: 40px; height: 40px; line-height: 40px; margin-bottom: 10px; text-align: center;"></i> <input name="'.$settings['param_name'].'" class="wpb_vc_param_value hidden wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'.$value.'" ' . $dependency . '/>';
	$fa_param .= '<div class="mt_admin_vc_iconpicker">';
	foreach( $fa_icons as $fa_icon ) {
		$fa_param .= '<span class="'.$fa_icon.'" data-name="'.$fa_icon.'"></span>';
	}
	$fa_param .= '</div>';

	return $fa_param;
}
add_shortcode_param('faicons', 'mt_vc_fontawesome_picker');

// Some preparation
$yesno = array( "Yes" => "yes", "No" => "no" );
$noyes = array( "No" => "no", "Yes" => "yes" );
$onoff = array( "On" => "on", "Off" => "off" );
$offon = array( "Off" => "off", "On" => "on" );
$shortcode_cat = __('MThemes shortcodes', 'mthemes');
$bgrepeat = array('Repeat all' => 'repeat','Repeat horizontally' => 'repeat-x','Repeat vertically' => 'repeat-y','No repeat' => 'no-repeat');
$bgpos = array('Left top' => 'left top','Left center' => 'left center','Left bottom' => 'left bottom','Center top' => 'center top','Center center' => 'center center','Center bottom' => 'center bottom','Right top' => 'right top','Right center' => 'right center','Right bottom' => 'right bottom');
$bgatt = array('Scroll' => 'scroll','Fixed' => 'fixed');
$bgsize = array('Auto' => 'auto','Cover' => 'cover');
$parallax_speed = array('10% speed' => '1','20% speed' => '2','30% speed' => '3','40% speed' => '4','50% speed' => '5','60% speed' => '6','70% speed' => '7','80% speed' => '8','90% speed' => '9');
$cssAnimationList = array('fadeIn' => 'fadeIn','fadeInDown' => 'fadeInDown','fadeInDownBig' => 'fadeInDownBig','fadeInLeft' => 'fadeInLeft','fadeInLeftBig' => 'fadeInLeftBig','fadeInRight' => 'fadeInRight','fadeInRightBig' => 'fadeInRightBig','fadeInUp' => 'fadeInUp','fadeInUpBig' => 'fadeInUpBig','flipInX' => 'flipInX','flipInY' => 'flipInY','bounceIn' => 'bounceIn','bounceInDown' => 'bounceInDown','bounceInLeft' => 'bounceInLeft','bounceInRight' => 'bounceInRight','bounceInUp' => 'bounceInUp','lightSpeedIn' => 'lightSpeedIn','rotateIn' => 'rotateIn','rotateInDownLeft' => 'rotateInDownLeft','rotateInDownRight' => 'rotateInDownRight','rotateInUpLeft' => 'rotateInUpLeft','rotateInUpRight' => 'rotateInUpRight','slideInDown' => 'slideInDown','slideInLeft' => 'slideInLeft','slideInRight' => 'slideInRight','rollIn' => 'rollIn');
$easing = array('swing'=>'swing','easeInQuad'=>'easeInQuad','easeOutQuad' => 'easeOutQuad','easeInOutQuad'=>'easeInOutQuad','easeInCubic'=>'easeInCubic','easeOutCubic'=>'easeOutCubic','easeInOutCubic'=>'easeInOutCubic','easeInQuart'=>'easeInQuart','easeOutQuart'=>'easeOutQuart','easeInOutQuart'=>'easeInOutQuart','easeInQuint'=>'easeInQuint','easeOutQuint'=>'easeOutQuint','easeInOutQuint'=>'easeInOutQuint','easeInExpo'=>'easeInExpo','easeOutExpo'=>'easeOutExpo','easeInOutExpo'=>'easeInOutExpo','easeInSine'=>'easeInSine','easeOutSine'=>'easeOutSine','easeInOutSine'=>'easeInOutSine','easeInCirc'=>'easeInCirc','easeOutCirc'=>'easeOutCirc','easeInOutCirc'=>'easeInOutCirc','easeInElastic'=>'easeInElastic','easeOutElastic'=>'easeOutElastic','easeInOutElastic'=>'easeInOutElastic','easeInBack'=>'easeInBack','easeOutBack'=>'easeOutBack','easeInOutBack'=>'easeInOutBack','easeInBounce'=>'easeInBounce','easeOutBounce'=>'easeOutBounce','easeInOutBounce'=>'easeInOutBounce');
$visibility = array('Default' => 'mt-visible-all','Visible on Phones (<768px)' => 'visible-xs','Visible on Tablets (≥768px)' => 'visible-sm','Visible on Desktops (≥992px)' => 'visible-md','Visible on Desktops (≥1200px)' => 'visible-lg','Hidden on Phones (<768px)' => 'hidden-xs','Hidden on Tablets (≥768px)' => 'hidden-sm','Hidden on Desktops (≥992px)' => 'hidden-md','Hidden on Desktops (≥1200px)' => 'hidden-lg');

/**
 * VC Row Block - all necessary changes are here
 *
 */
// old
vc_remove_param("vc_row", "css");
vc_remove_param("vc_row", "font_color");
vc_remove_param("vc_row", "el_class");
vc_remove_param("vc_row_inner", "css");
vc_remove_param("vc_row_inner", "font_color");
// since VC 4.7.4
vc_remove_param("vc_row", "el_id");
vc_remove_param("vc_row", "full_width");
vc_remove_param("vc_row", "full_height");
vc_remove_param("vc_row", "content_placement");
vc_remove_param("vc_row", "video_bg");
vc_remove_param("vc_row", "video_bg_url");
vc_remove_param("vc_row", "video_bg_parallax");
vc_remove_param("vc_row", "visibility");
// since VC 4.10.2
vc_remove_param("vc_row", "gap");
vc_remove_param("vc_row", "columns_placement");
vc_remove_param("vc_row", "equal_height");
vc_remove_param("vc_row", "parallax_speed_video");

// params
$row_att1 = array(
	"type" => "dropdown",
	"heading" => __("Section", "mthemes"),
	"param_name" => "section",
	"value" => $noyes,
	"description" => __("Choose if this is a section", "mthemes")
);
$row_att2 = array(
	"type" => "dropdown",
	"heading" => __("Section width", "mthemes"),
	"param_name" => "sectionwidth",
	"value" => array( "Centered section (in container)" => "centered", "Full width" => "fullwidth" ),
	"description" => __("Choose section content width", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att3 = array(
	"type" => "textfield",
	"heading" => __("Padding top", "mthemes"),
	"param_name" => "paddingtop",
	"value" => "80px",
	"description" => __("Section padding top value", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att4 = array(
	"type" => "textfield",
	"heading" => __("Padding bottom", "mthemes"),
	"param_name" => "paddingbottom",
	"value" => "80px",
	"description" => __("Section padding bottom value", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att5 = array(
	"type" => "colorpicker",
	"heading" => __("Background color", "mthemes"),
	"param_name" => "backgroundcolor",
	"description" => __("Section background color", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att6 = array(
	"type" => "colorpicker",
	"heading" => __("Border top color", "mthemes"),
	"param_name" => "bordertopcolor",
	"description" => __("Section border top color", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att7 = array(
	"type" => "colorpicker",
	"heading" => __("Border bottom color", "mthemes"),
	"param_name" => "borderbottomcolor",
	"description" => __("Section border bottom color", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att8 = array(
	"type" => "attach_image",
	"heading" => __("Background image", "mthemes"),
	"param_name" => "backgroundimage",
	"description" => __("Section background image", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att9 = array(
	"type" => "dropdown",
	"heading" => __("Image repeat", "mthemes"),
	"param_name" => "backgroundrepeat",
	"value" => $bgrepeat,
	"description" => __("Background image repeat", "mthemes"),
	"dependency" => Array('element' => "backgroundimage", 'not_empty' => true)
);
$row_att10 = array(
	"type" => "dropdown",
	"heading" => __("Image position", "mthemes"),
	"param_name" => "backgroundposition",
	"value" => $bgpos,
	"description" => __("Background image position", "mthemes"),
	"dependency" => Array('element' => "backgroundimage", 'not_empty' => true)
);
$row_att11 = array(
	"type" => "dropdown",
	"heading" => __("Image attachment", "mthemes"),
	"param_name" => "backgroundattachment",
	"value" => $bgatt,
	"description" => __("Background image attachment", "mthemes"),
	"dependency" => Array('element' => "backgroundimage", 'not_empty' => true)
);
$row_att12 = array(
	"type" => "dropdown",
	"heading" => __("Image size", "mthemes"),
	"param_name" => "backgroundsize",
	"value" => $bgsize,
	"description" => __("Background image size", "mthemes"),
	"dependency" => Array('element' => "backgroundimage", 'not_empty' => true)
);
$row_att13 = array(
	"type" => "dropdown",
	"heading" => __("Text color", "mthemes"),
	"param_name" => "textcolor",
	"value" => array( "Default text" => "default", "Light text" => "light" ),
	"description" => __("Choose text color for this section", "mthemes"),
	"dependency" => Array('element' => "section", 'value' => 'yes')
);
$row_att14 = array(
	"type" => "dropdown",
	"heading" => __("Parallax", "mthemes"),
	"param_name" => "parallax",
	"value" => $noyes,
	"description" => __("Choose if you want to use parallax section", "mthemes"),
	"dependency" => Array('element' => "backgroundimage", 'not_empty' => true)
);
$row_att15 = array(
	"type" => "dropdown",
	"heading" => __("Parallax speed", "mthemes"),
	"param_name" => "parallax_speed",
	"value" => $parallax_speed,
	"description" => __("Choose parallax speed", "mthemes"),
	"dependency" => Array('element' => "parallax", 'value' => 'yes')
);
$row_att16 = array(
	"type" => "dropdown",
	"heading" => __("Row visibility", "mthemes"),
	"param_name" => "visibility",
	"value" => $visibility,
	"description" => __("Choose row visibility based on screen width", "mthemes")
);
vc_add_param('vc_row', $row_att1);
vc_add_param('vc_row', $row_att2);
vc_add_param('vc_row', $row_att3);
vc_add_param('vc_row', $row_att4);
vc_add_param('vc_row', $row_att5);
vc_add_param('vc_row', $row_att6);
vc_add_param('vc_row', $row_att7);
vc_add_param('vc_row', $row_att8);
vc_add_param('vc_row', $row_att9);
vc_add_param('vc_row', $row_att10);
vc_add_param('vc_row', $row_att11);
vc_add_param('vc_row', $row_att12);
vc_add_param('vc_row', $row_att13);
vc_add_param('vc_row', $row_att14);
vc_add_param('vc_row', $row_att15);
vc_add_param('vc_row', $row_att16);

/**
 * VC Separator - all necessary changes are here
 *
 */
vc_remove_param("vc_separator", "color");
vc_remove_param("vc_text_separator", "color");
$sep_att1 = array(
	"type" => "dropdown",
	"heading" => __("Style", "mthemes"),
	"description" => __("Separator style", "mthemes"),
	"param_name" => "style",
	"value" => array(
		"Border" => "",
		"Dashed" => "dashed",
		"Dotted" => "dotted",
		"Double" => "double",
		"No line" => "noline",
	),	
);
$sep_att2 = array(
	"type" => "textfield",
	"heading" => __("Margin top", "mthemes"),
	"description" => __("Set custom top margin. For example: 60px", "mthemes"),
	"param_name" => "margintop",
	"value" => "",
);
$sep_att3 = array(
	"type" => "textfield",
	"heading" => __("Margin bottom", "mthemes"),
	"description" => __("Set custom bottom margin. For example: 60px", "mthemes"),
	"param_name" => "marginbottom",
	"value" => "",
);
vc_add_param('vc_separator', $sep_att1);
vc_add_param('vc_separator', $sep_att2);
vc_add_param('vc_separator', $sep_att3);

$tsep_att1 = array(
	"type" => "dropdown",
	"heading" => __("Style", "mthemes"),
	"description" => __("Separator style", "mthemes"),
	"param_name" => "style",
	"value" => array(
		"Border" => "",
		"Dashed" => "dashed",
		"Dotted" => "dotted",
		"Double" => "double",
		"No line" => "noline",
	),	
);
$tsep_att2 = array(
	"type" => "textfield",
	"heading" => __("Margin top", "mthemes"),
	"description" => __("Set custom top margin. For example: 60px", "mthemes"),
	"param_name" => "margintop",
	"value" => "",
);
$tsep_att3 = array(
	"type" => "textfield",
	"heading" => __("Margin bottom", "mthemes"),
	"description" => __("Set custom bottom margin. For example: 60px", "mthemes"),
	"param_name" => "marginbottom",
	"value" => "",
);
vc_add_param('vc_text_separator', $tsep_att1);
vc_add_param('vc_text_separator', $tsep_att2);
vc_add_param('vc_text_separator', $tsep_att3);

/*---------------------------------------------------------------
 * 
 *    	Custom Blocks
 *
 ---------------------------------------------------------------*/


/**
 * Alert Block
 *
 */
vc_map( array(
	"name" => __("Alert", "mthemes"),
	"description" => __("Notification box", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_alert",
	"wrapper_class" => "mt_alert mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Alert type", "mthemes"),
			"param_name" => "type",
			"value" => array(
				'Default' => 'default',
				'Primary' => 'primary',
				'Success' => 'success',
				'Info' 	  => 'info',
				'Warning' => 'warning',
				'Danger'  => 'danger',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Dismissable", "mthemes"),
			"param_name" => "dismissable",
			"value" => $yesno,
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => __("<p>Put here Your text</p>", "mthemes")
		),
	),
) );

/**
 * Blockquote Block
 *
 */
vc_map( array(
	"name" => __("Blockquote", "mthemes"),
	"description" => __("Add quote", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_blockquote",
	"wrapper_class" => "mt_blockquote mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Title/author", "mthemes"),
			"admin_label" => true,
			"param_name" => "title",
			"value" => ""
		),		
		array(
			"type" => "dropdown",
			"heading" => __("Align to the right", "mthemes"),
			"param_name" => "right",
			"value" => $noyes,
		),
		array(
			"type" => "textarea",
			"heading" => __("Blockquote text", "mthemes"),
			"param_name" => "content",
			"value" => "Blockquote text goes here",
		),
	),
) );

/**
 * Blog Block
 *
 */
vc_map( array(
	"name" => __("Blog", "mthemes"),
	"description" => __("Insert Blog", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_blog",
	"wrapper_class" => "mt_blog mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("How many items You want to show", "mthemes"),
			"param_name" => "limit",
			"description" => __('Use "-1" to show all posts. Works with pagination', 'mthemes'),
			"value" => "-1"
		),		
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show pagination", "mthemes"),
			"description" => __("Shows pagination. Works with items number.", "mthemes"),
			"param_name" => "pagination",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Layout type", "mthemes"),
			"description" => __("Choose layout type.", "mthemes"),
			"param_name" => "layout_type",
			"value" => array(
				'Standard (can be used with column size)' => 'standard',
				'Grid (uses own column calculation)' => 'grid',
			),
		),
	),
) );

/**
 * Button block
 *
 */
vc_map( array(
	"name" => __("Button", "mthemes"),
	"description" => __("Add button", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_button",
	"wrapper_class" => "mt_button mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Button text", "mthemes"),
			"param_name" => "content",
			"holder" => "span",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button size", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'Default' => 'md',
				'Small' => 'sm',
				'Large' => 'lg',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button style", "mthemes"),
			"param_name" => "style",
			"value" => array(
				'Standard' => 'standard',
				'Empty light' => 'empty-light',
				'Empty dark' => 'empty-dark',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Block button (full width)", "mthemes"),
			"param_name" => "block",
			"value" => $noyes,
		),
		array(
			"type" => "textfield",
			"heading" => __("Button url", "mthemes"),
			"description" => __("For example: http://www.themeforest.net", "mthemes"),
			"param_name" => "link",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Link target", "mthemes"),
			"param_name" => "target",
			"value" => array(
				'Open link in current window' => '_self',
				'Open link in new window' => '_blank',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("With icon", "mthemes"),
			"param_name" => "icon_onoff",
			"value" => $noyes,
		),
		array(
			"type" => "faicons",
			"heading" => __("Select Icon", "mthemes"),
			"param_name" => "icon",
			"value" => "",
			"dependency" => Array('element' => "icon_onoff", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Extra icon css class", "mthemes"),
			"param_name" => "xclass_icon",
			"value" => "",
			"dependency" => Array('element' => "icon_onoff", 'value' => 'yes'),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Extra css class", "mthemes"),
			"param_name" => "xclass",
			"value" => "",
		),
	),
) );

/**
 * Clients carousel Blocks
 *
 */
vc_map( array(
	"name" => __("Clients carousel", "mthemes"),
	"description" => __("Create clients carousel", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_clients_carousel",
	"as_parent" => array('only' => 'mt_client'),
	"icon" => "mt_vc_icon",
	"content_element" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Column size", "mthemes"),
			"description" => __('Select the size of the carousel shortcode', 'mthemes'),
			"param_name" => "columns",
			"value" => array(
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show controls", "mthemes"),
			"description" => __("Show pagination controls under carousel", "mthemes"),
			"param_name" => "controls",
			"value" => $noyes,
		),
	),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => __("Client", "mthemes"),
	"description" => __("Add client to carousel", "mthemes"),
	"base" => "mt_client",
	"content_element" => true,
	"as_child" => array('only' => 'mt_clients_carousel'),
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "attach_image",
			"heading" => __("Client logo", "mthemes"),
			"param_name" => "thumb",
			"value" => "",
		),	
		array(
			"type" => "textfield",
			"heading" => __("Custom client url", "mthemes"),
			"description" => __('For example: http://www.themeforest.net', 'mthemes'),
			"param_name" => "url",
			"value" => ""
		),
	),
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mt_Clients_Carousel extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Mt_Client extends WPBakeryShortCode {}
}

/**
 * Clients grid Blocks
 *
 */
vc_map( array(
	"name" => __("Clients grid", "mthemes"),
	"description" => __("Create clients grid", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_clients_grid",
	"as_parent" => array('only' => 'mt_client_item'),
	"icon" => "mt_vc_icon",
	"content_element" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Column size", "mthemes"),
			"description" => __('How many items You want to show in one row', 'mthemes'),
			"param_name" => "columns",
			"value" => array(
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			),
		),
	),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => __("Client", "mthemes"),
	"description" => __("Add client to grid", "mthemes"),
	"base" => "mt_client_item",
	"content_element" => true,
	"as_child" => array('only' => 'mt_clients_grid'),
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "attach_image",
			"heading" => __("Client logo", "mthemes"),
			"param_name" => "thumb",
			"value" => "",
		),	
		array(
			"type" => "textfield",
			"heading" => __("Custom client url", "mthemes"),
			"description" => __('For example: http://www.themeforest.net', 'mthemes'),
			"param_name" => "url",
			"value" => ""
		),
	),
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mt_Clients_Grid extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Mt_Client_Item extends WPBakeryShortCode {}
}

/**
 * Custom Header Block
 *
 */
vc_map( array(
	"name" => __("Custom Header", "mthemes"),
	"description" => __("Add custom header", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_header",
	"wrapper_class" => "mt_header mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Choose header align", "mthemes"),
			"param_name" => "align",
			"value" => array(
				'Left' => 'left',
				'Center' => 'center',
				'Right' => 'right',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Choose header size", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'H1' => '1',
				'H2' => '2',
				'H3' => '3',
				'H4' => '4',
				'H5' => '5',
				'H6' => '6',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"admin_label" => true,
			"value" => "Header text goes here",
		),
	),
) );


/**
 * Gallery Block
 *
 */
vc_map( array(
	"name" => __("Gallery", "mthemes"),
	"description" => __("Insert Gallery", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_gallery",
	"wrapper_class" => "mt_gallery mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "attach_images",
			"heading" => __("Images", "mthemes"),
			"param_name" => "ids",
			"value" => "",
			"description" => __("Select images from media library.", "mthemes")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Columns size", "mthemes"),
			"description" => __("Choose gallery columns size", "mthemes"),
			"param_name" => "columns",
			"value" => array(
				'1','2','3','4','5','6','7','8','9','10',
			),
		),
	),
) );

// Helper function for VC backend Gallery
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_MT_Gallery extends WPBakeryShortCode {

		public function singleParamHtmlHolder($param, $value) {
			$output = '';
			// Compatibility fixes
			$old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
			$new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
			$value = str_ireplace($old_names, $new_names, $value);
			//$value = __($value, "mthemes");
			//
			$param_name = isset($param['param_name']) ? $param['param_name'] : '';
			$type = isset($param['type']) ? $param['type'] : '';
			$class = isset($param['class']) ? $param['class'] : '';

			if ( isset($param['holder']) == true && $param['holder'] !== 'hidden' ) {
				$output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
			}
			if($param_name == 'ids') {
				$images_ids = empty($value) ? array() : explode(',', trim($value));
				$output .= '<ul class="attachment-thumbnails'.( empty($images_ids) ? ' image-exists' : '' ).'" data-name="' . $param_name . '">';
				foreach($images_ids as $image) {
					$img = wpb_getImageBySize(array( 'attach_id' => (int)$image, 'thumb_size' => 'thumbnail' ));
					$output .= ( $img ? '<li>'.$img['thumbnail'].'</li>' : '<li><img width="150" height="150" test="'.$image.'" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail" alt="" title="" /></li>');
				}
				$output .= '</ul>';
				$output .= '<a href="#" class="column_edit_trigger' . ( !empty($images_ids) ? ' image-exists' : '' ) . '">' . __( 'Add images', 'mthemes' ) . '</a>';
			}
			return $output;
		}
	}
}

/**
 * Google map Block
 *
 */
vc_map( array(
	"name" => __("Google map", "mthemes"),
	"description" => __("Use Google Map", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_gmap",
	"as_parent" => array('only' => 'mt_gmarker'),
	"icon" => "mt_vc_icon",
	"content_element" => true,
	"params" => array(		
		array(
			"type" => "textfield",
			"heading" => __("Map width in pixels", "mthemes"),
			"param_name" => "width",
			"value" => "800",
		),
		array(
			"type" => "textfield",
			"heading" => __("Map height in pixels", "mthemes"),
			"param_name" => "height",
			"value" => "300",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Map zoom", "mthemes"),
			"param_name" => "zoom",
			"value" => array(__("Select map zoom (21 - largest zoom)", "mthemes") => '', 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Zoom map with scrollwheel", "mthemes"),
			"param_name" => "scrollwheel",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Choose map type", "mthemes"),
			"param_name" => "maptype",
			"value" => array(
				'Roadmap' => 'ROADMAP',
				'Hybrid' => 'HYBRID',
				'Satellite' => 'SATELLITE',
				'Terrain' => 'TERRAIN',
			),
		),
	),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => __("Map marker", "mthemes"),
	"description" => __("Add your address", "mthemes"),
	"base" => "mt_gmarker",
	"content_element" => true,
	"as_child" => array('only' => 'mt_gmap'),
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Address type", "mthemes"),
			"param_name" => "type",
			"value" => array(
				'Use standard address' => 'address',
				'Use coordinates (latitude and longitude)' => 'coordinates',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Address", "mthemes"),
			"description" => __("Place address here. For example: New York", "mthemes"),
			"param_name" => "address",
			"admin_label" => true,
			"value" => "",
			"dependency" => Array('element' => "type", 'value' => 'address')
		),
		array(
			"type" => "textfield",
			"heading" => __("Latitude", "mthemes"),
			"param_name" => "latitude",
			"admin_label" => true,
			"value" => "",
			"dependency" => Array('element' => "type", 'value' => 'coordinates')
		),
		array(
			"type" => "textfield",
			"heading" => __("Longitude", "mthemes"),
			"param_name" => "longitude",
			"admin_label" => true,
			"value" => "",
			"dependency" => Array('element' => "type", 'value' => 'coordinates')
		),
		array(
			"type" => "attach_image",
			"heading" => __("Marker icon", "mthemes"),
			"param_name" => "icon",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show popup", "mthemes"),
			"description" => __("Show popup by default.", "mthemes"),
			"param_name" => "popup",
			"value" => $noyes,
		),
		array(
			"type" => "textarea",
			"heading" => __("Content", "mthemes"),
			"param_name" => "content",
			"value" => "",
		),
	),
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mt_Gmap extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Mt_Gmarker extends WPBakeryShortCode {}
}

/**
 * Image Block
 *
 */
vc_map( array(
	"name" => __("Image", "mthemes"),
	"description" => __("Insert Image", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_image_vc",
	"wrapper_class" => "mt_image_vc mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "attach_image",
			"heading" => __("Image", "mthemes"),
			"param_name" => "image",
			"holder" => "img",
			"value" => "",
			"description" => __("Select image from media library.", "mthemes")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image size", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'Thumbnail' => 'thumbnail',
				'Medium' => 'medium',
				'Large' => 'large',
				'Full' => 'full',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Image width", "mthemes"),
			"param_name" => "width",
			"value" => "",
		),
		array(
			"type" => "textfield",
			"heading" => __("Image height", "mthemes"),
			"param_name" => "height",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image style", "mthemes"),
			"param_name" => "style",
			"value" => array(
				'Default' => '',
				'Rounded' => 'rounded',
				'Circle' => 'circle',
				'Thumbnail' => 'thumbnail',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image align", "mthemes"),
			"param_name" => "align",
			"value" => array(
				'None' => 'none',
				'Left' => 'left',
				'Right' => 'right',
				'Center' => 'center',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Image title", "mthemes"),
			"param_name" => "title",
			"value" => "",
		),
		array(
			"type" => "textfield",
			"heading" => __("Image alt", "mthemes"),
			"param_name" => "alt",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Latest posts Block
 *
 */
vc_map( array(
	"name" => __("Latest posts", "mthemes"),
	"description" => __("Show latest blog posts", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_latest_posts",
	"wrapper_class" => "mt_latest_posts mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("How many items You want to show", "mthemes"),
			"param_name" => "limit",
			"description" => __('How many items you want to show in carousel e.g. 6', 'mthemes'),
			"value" => "6"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),
	),
) );

/**
 * Lightbox Block
 *
 */
vc_map( array(
	"name" => __("Lightbox", "mthemes"),
	"description" => __("Insert Lightbox", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_lightbox_vc",
	"wrapper_class" => "mt_lightbox_vc mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Lightbox type", "mthemes"),
			"param_name" => "type",
			"value" => array(
				'Image' => 'image',
				'Video' => 'video',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Video url", "mthemes"),
			"description" => __("Paste here video url that will be visible in lightbox", "mthemes"),
			"param_name" => "url",
			"value" => "",
			"dependency" => Array('element' => "type", 'value' => 'video'),
		),
		array(
			"type" => "attach_image",
			"heading" => __("Thumbnail", "mthemes"),
			"param_name" => "thumb",
			"holder" => "img",
			"value" => "",
			"description" => __("Select image from media library.", "mthemes")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Thumbnail size", "mthemes"),
			"param_name" => "thumb_size",
			"value" => array(
				'Thumbnail' => 'thumbnail',
				'Medium' => 'medium',
				'Large' => 'large',
				'Full' => 'full',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumbnail width", "mthemes"),
			"param_name" => "width",
			"value" => "",
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumbnail height", "mthemes"),
			"param_name" => "height",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Thumbnail style", "mthemes"),
			"param_name" => "style",
			"value" => array(
				'Default' => '',
				'Rounded' => 'rounded',
				'Circle' => 'circle',
				'Thumbnail' => 'thumbnail',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Thumbnail align", "mthemes"),
			"param_name" => "align",
			"value" => array(
				'None' => 'none',
				'Left' => 'left',
				'Right' => 'right',
				'Center' => 'center',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumbnail title", "mthemes"),
			"param_name" => "title",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Link Block
 *
 */
vc_map( array(
	"name" => __("Link Block", "mthemes"),
	"description" => __("Add link block", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_link",
	"wrapper_class" => "mt_link mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "textarea",
			"admin_label" => true,
			"heading" => __("Link title", "mthemes"),
			"param_name" => "content",
			"description" => __("Post link title here", "mthemes"),
			"value" => "This is my custom link &rarr;"
		),
		array(
			"type" => "textfield",
			"heading" => __("Url", "mthemes"),
			"description" => __("For example: http://www.themeforest.net", "mthemes"),
			"param_name" => "url",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => __("Url target", "mthemes"),
			"param_name" => "target",
			"dependency" => Array('element' => "url", 'not_empty' => true),
			"value" => array(
				'Open link in current window' => '_self',
				'Open link in new window' => '_blank',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Padding top", "mthemes"),
			"param_name" => "paddingtop",
			"value" => "40px",
			"description" => __("Link area top padding", "mthemes"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Padding bottom", "mthemes"),
			"param_name" => "paddingbottom",
			"value" => "40px",
			"description" => __("Link area bottom padding", "mthemes"),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Color type", "mthemes"),
			"param_name" => "color",
			"value" => array(
				'Standard' => 'standard',
				'Reverse' => 'reverse',
			),
		),
		// array(
		// 	"type" => "textfield",
		// 	"heading" => __("Link font size", "mthemes"),
		// 	"param_name" => "fontsize",
		// 	"value" => "20px",
		// ),
		// array(
		// 	"type" => "dropdown",
		// 	"heading" => __("Link font weight", "mthemes"),
		// 	"param_name" => "fontweight",
		// 	"value" => array(
		// 		'normal',
		// 		'100',
		// 		'200',
		// 		'300',
		// 		'400',
		// 		'500',
		// 		'600',
		// 		'700',
		// 		'800',
		// 		'900',
		// 	),
		// ),
		// array(
		// 	"type" => "dropdown",
		// 	"heading" => __("Link text transform", "mthemes"),
		// 	"param_name" => "texttransform",
		// 	"value" => array(
		// 		'Normal' => 'none',
		// 		'Uppercase' => 'uppercase',
		// 	),
		// ),
	),
) );

/**
 * Milestone Block
 *
 */
vc_map( array(
	"name" => __("Milestone", "mthemes"),
	"description" => __("Use milestone numbers", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_milestone",
	"wrapper_class" => "mt_milestone mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Milestone number (number only)", "mthemes"),
			"param_name" => "number",
			"value" => ""
		),		
		array(
			"type" => "textfield",
			"heading" => __("Title", "mthemes"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * OwlSlider Block
 *
 */
vc_map( array(
	"name" => __("OwlSlider", "mthemes"),
	"description" => __("Insert OwlSlider", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_owlslider",
	"wrapper_class" => "mt_owlslider mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "attach_images",
			"heading" => __("Images", "mthemes"),
			"param_name" => "ids",
			"value" => "",
			"description" => __("Select images from media library.", "mthemes")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Images size", "mthemes"),
			"description" => __("Choose slider images size", "mthemes"),
			"param_name" => "img_size",
			"value" => array(
				'1140x649 (16:9 ratio)' => 'page169',
				'1140x855 (4:3 ratio)' => 'page43',
				'1140x100% (full height)' => 'page_masonry',
				'Original image (full width and height)' => 'full',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show caption", "mthemes"),
			"description" => __("Choose to show slides captions", "mthemes"),
			"param_name" => "caption",
			"value" => $offon,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Animation type", "mthemes"),
			"description" => __("Choose slider animation type", "mthemes"),
			"param_name" => "animation",
			"value" => array(
				'Fade' => 'fade',
				'Slide' => 'slide',
				'backSlide' => 'backSlide',
				'goDown' => 'goDown',
				'fadeUp' => 'fadeUp',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show pagination", "mthemes"),
			"description" => __("Choose to show slider pagination", "mthemes"),
			"param_name" => "pagination",
			"value" => $onoff,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show arrows", "mthemes"),
			"description" => __("Choose to show slider arrows", "mthemes"),
			"param_name" => "arrows",
			"value" => $onoff,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Pause slideshow", "mthemes"),
			"description" => __("Pause slideshow when you hover over slide image", "mthemes"),
			"param_name" => "pause",
			"value" => $onoff,
		),
		array(
			"type" => "textfield",
			"heading" => __("Slideshow speed", "mthemes"),
			"param_name" => "slideshow_speed",
			"description" => __('Choose slideshow speed (in milliseconds)', 'mthemes'),
			"value" => "4000"
		),
	),
) );

// Helper function for VC backend Slider
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_MT_Owlslider extends WPBakeryShortCode {

		public function singleParamHtmlHolder($param, $value) {
			$output = '';
			// Compatibility fixes
			$old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
			$new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
			$value = str_ireplace($old_names, $new_names, $value);
			//$value = __($value, "mthemes");
			//
			$param_name = isset($param['param_name']) ? $param['param_name'] : '';
			$type = isset($param['type']) ? $param['type'] : '';
			$class = isset($param['class']) ? $param['class'] : '';

			if ( isset($param['holder']) == true && $param['holder'] !== 'hidden' ) {
				$output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
			}
			if($param_name == 'ids') {
				$images_ids = empty($value) ? array() : explode(',', trim($value));
				$output .= '<ul class="clearfix attachment-thumbnails'.( empty($images_ids) ? ' image-exists' : '' ).'" data-name="' . $param_name . '">';
				foreach($images_ids as $image) {
					$img = wpb_getImageBySize(array( 'attach_id' => (int)$image, 'thumb_size' => 'thumbnail' ));
					$output .= ( $img ? '<li>'.$img['thumbnail'].'</li>' : '<li><img width="150" height="150" test="'.$image.'" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail" alt="" title="" /></li>');
				}
				$output .= '</ul>';
				$output .= '<a href="#" class="column_edit_trigger' . ( !empty($images_ids) ? ' image-exists' : '' ) . '">' . __( 'Add images', 'mthemes' ) . '</a>';
			}
			return $output;
		}
	}
}

/**
 * Panel Block
 *
 */
vc_map( array(
	"name" => __("Panel", "mthemes"),
	"description" => __("Use text panel", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_panel",
	"wrapper_class" => "mt_panel mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => __("Title", "mthemes"),
			"param_name" => "title",
			"description" => __("If You don't want to use it leave it blank. Only text.", "mthemes")
		),
		array(
			"type" => "textfield",
			"heading" => __("Footer text", "mthemes"),
			"param_name" => "footer",
			"description" => __("If You don't want to use it leave it blank. Only text.", "mthemes")
		),
		array(
			"type" => "textarea_html",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => __("<p>Put here Your text</p>", "mthemes")
		),
	),
) );

/**
 * Pie chart Block
 *
 */
vc_map( array(
	"name" => __("Pie chart", "mthemes"),
	"description" => __("Use animated pie chart", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_piechart",
	"wrapper_class" => "mt_piechart mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Number", "mthemes"),
			"description" => __("Choose between 0-100", "mthemes"),
			"param_name" => "number",
			"value" => "50",
			"admin_label" => true,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Percent", "mthemes"),
			"description" => __("Show percent after number", "mthemes"),
			"param_name" => "percent",
			"value" => $yesno,
		),
		array(
			"type" => "colorpicker",
			"heading" => __("Track color", "mthemes"),
			"param_name" => "trackcolor",
			"value" => "#f2f2f2",
		),
		array(
			"type" => "colorpicker",
			"heading" => __("Bar color", "mthemes"),
			"param_name" => "barcolor",
			"value" => "#1DDBF4",			
		),
		array(
			"type" => "textfield",
			"heading" => __("Line width (in px)", "mthemes"),
			"param_name" => "linewidth",
			"value" => "4",
		),
		array(
			"type" => "textfield",
			"heading" => __("Chart size (in px)", "mthemes"),
			"description" => __("In pixels. Keep in mind that it\'s not responsive.", "mthemes"),
			"param_name" => "size",
			"value" => "140",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Easing", "mthemes"),
			"param_name" => "easing",
			"value" => $easing,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Portfolio Block
 *
 */
vc_map( array(
	"name" => __("Portfolio", "mthemes"),
	"description" => __("Insert Portfolio", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_portfolio",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Items number", "mthemes"),
			"param_name" => "limit",
			"description" => __('How many items You want to show. Use "-1" to show all', 'mthemes'),
			"value" => "-1"
		),		
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show filter", "mthemes"),
			"description" => __("Shows filter with portfolio categories.", "mthemes"),
			"param_name" => "filter",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show pagination", "mthemes"),
			"description" => __("Shows pagination. Works with items number.", "mthemes"),
			"param_name" => "pagination",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Portfolio size", "mthemes"),
			"description" => __("Choose portfolio column size.", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'2 columns' => '2',
				'3 columns' => '3',
				'4 columns' => '4',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Images size", "mthemes"),
			"description" => __("Choose images size.", "mthemes"),
			"param_name" => "images_size",
			"value" => array(
				'Standard (560x356px)' => 'standard',
				'Masonry (560x100%)' => 'masonry',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Layout type", "mthemes"),
			"description" => __("Choose layout type.", "mthemes"),
			"param_name" => "layout_type",
			"value" => array(
				'Standard (can be used with column size)' => 'standard',
				'Grid (uses own column calculation)' => 'grid',
			),
		),
	),
) );

/**
 * Portfolio carousel Block
 *
 */
vc_map( array(
	"name" => __("Portfolio carousel", "mthemes"),
	"description" => __("Show portfolio carousel", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_portfolio_carousel",
	"wrapper_class" => "mt_portfolio_carousel mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("How many items You want to show", "mthemes"),
			"param_name" => "limit",
			"description" => __('How many items you want to show in carousel e.g. 6', 'mthemes'),
			"value" => "6"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Column size", "mthemes"),
			"description" => __('Select the size of the carousel shortcode', 'mthemes'),
			"param_name" => "columns",
			"value" => array(
				'3' => '3',
				'4' => '4',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show controls", "mthemes"),
			"description" => __("Show pagination controls under carousel", "mthemes"),
			"param_name" => "controls",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Gaps", "mthemes"),
			"description" => __("Add some margin between items", "mthemes"),
			"param_name" => "gaps",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),
	),
) );

/**
 * Pricing column Block
 *
 */
vc_map( array(
	"name" => __("Pricing column", "mthemes"),
	"description" => __("Add pricing column", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_pricing",
	"as_parent" => array('only' => 'vc_column_text'),
	"icon" => "mt_vc_icon",
	"content_element" => true,
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Title", "mthemes"),
			"param_name" => "title",
			"value" => "Title"
		),
		array(
			"type" => "textfield",
			"heading" => __("Pricing value", "mthemes"),
			"param_name" => "value",
			"value" => "$19"
		),
		array(
			"type" => "textfield",
			"heading" => __("Pricing span text", "mthemes"),
			"description" => __('Smaller text e.g. some additional info or period: daily, monthly etc.', 'mthemes'),
			"param_name" => "span",
			"value" => "per month"
		),
		array(
			"type" => "textfield",
			"heading" => __("Custom button url", "mthemes"),
			"description" => __('For example: http://www.themeforest.net', 'mthemes'),
			"param_name" => "url",
			"value" => "#"
		),
		array(
			"type" => "textfield",
			"heading" => __("Button text", "mthemes"),
			"param_name" => "button_text",
			"value" => "Purchase"
		),
	),
	"js_view" => 'VcColumnView'
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mt_Pricing extends WPBakeryShortCodesContainer {}
}

/**
 * Progress Block
 *
 */
vc_map( array(
	"name" => __("Progress", "mthemes"),
	"description" => __("Progress/skill bars", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_progress",
	"wrapper_class" => "mt_progress mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => __("Title", "mthemes"),
			"param_name" => "title",
		),
		array(
			"type" => "textfield",
			"heading" => __("Value", "mthemes"),
			"param_name" => "value",
			"admin_label" => true,
			"description" => __("Choose between 0-100", "mthemes")
		),
	),
) );

/**
 * Service Block
 *
 */
vc_map( array(
	"name" => __("Service", "mthemes"),
	"description" => __("Show your services", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_service",
	"wrapper_class" => "mt_service mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Choose style", "mthemes"),
			"param_name" => "style",
			"value" => array(
				'Icon on the left' => 'icon-on-left',
				'Icon on the right' => 'icon-on-right',
				'Icon on top' => 'icon-on-top',
				'Icon on the left (list style)' => 'icon-on-left-list',
				'Icon on the right (list style)' => 'icon-on-right-list',
				'Icon box' => 'icon-box',
			),
		),
		array(
			"type" => "textfield",
			"heading" => __("Title", "mthemes"),
			"admin_label" => true,
			"param_name" => "title",
			"value" => ""
		),
		array(
			"type" => "faicons",
			"heading" => __("Select Icon", "mthemes"),
			"param_name" => "icon",
			"value" => "",
		),
		array(
			"type" => "textarea",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => "Service text goes here",
		),
		array(
			"type" => "textfield",
			"heading" => __("Url", "mthemes"),
			"description" => __("For example: http://www.themeforest.net", "mthemes"),
			"param_name" => "url",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => __("Url target", "mthemes"),
			"param_name" => "target",
			"dependency" => Array('element' => "url", 'not_empty' => true),
			"value" => array(
				'Open link in current window' => '_self',
				'Open link in new window' => '_blank',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Bottom margin (mainly for list style)", "mthemes"),
			"param_name" => "margin",
			"value" => $yesno,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Team Block
 *
 */
vc_map( array(
	"name" => __("Team", "mthemes"),
	"description" => __("Show team members", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_team",
	"wrapper_class" => "mt_team mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Team post ID", "mthemes"),
			"description" => __("You can put here Team Member ID if You want to show only one person. If You want to show 2 and more use slug", "mthemes"),
			"param_name" => "postid",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("How many items You want to show", "mthemes"),
			"param_name" => "limit",
			"description" => __('Use "-1" to show all posts. Works with pagination', 'mthemes'),
			"value" => "-1"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Team column size", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'1/3' => '4',
				'1/4' => '3',
				'1/2' => '6',
				'1/6' => '2',
				'1/1' => '12',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),		
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Team carousel Block
 *
 */
vc_map( array(
	"name" => __("Team carousel", "mthemes"),
	"description" => __("Show team members", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_team_carousel",
	"wrapper_class" => "mt_team_carousel mt_vc_item",
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Category", "mthemes"),
			"description" => __("Enter category/categories slugs you want to use (comma separated). For example: category1, category2", "mthemes"),
			"param_name" => "slug",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("How many items You want to show", "mthemes"),
			"param_name" => "limit",
			"description" => __('How many items you want to show in carousel e.g. 6', 'mthemes'),
			"value" => "6"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Column size", "mthemes"),
			"description" => __('Select the size of the carousel shortcode', 'mthemes'),
			"param_name" => "columns",
			"value" => array(
				'3' => '3',
				'4' => '4',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show controls", "mthemes"),
			"description" => __("Show pagination controls under carousel", "mthemes"),
			"param_name" => "controls",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order Type", "mthemes"),
			"description" => __("Designates the ascending or descending order", "mthemes"),
			"param_name" => "order",
			"value" => array(
				'Descending order from highest to lowest values (3, 2, 1; c, b, a)' => 'DESC',
				'Ascending order from lowest to highest values (1, 2, 3; a, b, c)' => 'ASC',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Order By", "mthemes"),
			"description" => __("Choose type of order", "mthemes"),
			"param_name" => "orderby",
			"value" => array(
				'Order by date of publication' => 'date',
				'Order by title' => 'title',
				'Order by author name' => 'author',
				'Order by post ID' => 'ID',
				'Random order' => 'rand',
			),
		),
	),
) );

/**
 * Testimonial (single) Blocks
 *
 */
vc_map( array(
	"name" => __("Testimonial", "mthemes"),
	"description" => __("Add single testimonial", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_testimonial",
	"wrapper_class" => "mt_testimonial mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(		
		array(
			"type" => "textfield",
			"heading" => __("Author", "mthemes"),
			"param_name" => "author",
			"admin_label" => true,
			"value" => "",
		),
		array(
			"type" => "textfield",
			"heading" => __("Author company/position", "mthemes"),
			"param_name" => "company",
			"value" => "",
		),
		array(
			"type" => "attach_image",
			"heading" => __("Thumbnail image", "mthemes"),
			"param_name" => "thumb",
			"value" => "",
		),
		array(
			"type" => "textarea",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Use css animation", "mthemes"),
			"param_name" => "animated",
			"value" => $noyes,
		),
		array(
			"type" => "dropdown",
			"heading" => __("CSS animation type", "mthemes"),
			"param_name" => "anim_type",
			"value" => $cssAnimationList,
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Animation delay", "mthemes"),
			"description" => __("You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9", "mthemes"),
			"param_name" => "anim_delay",
			"value" => "",
			"dependency" => Array('element' => "animated", 'value' => 'yes'),
		),
	),
) );

/**
 * Testimonial Slider Blocks
 *
 */
vc_map( array(
	"name" => __("Testimonial slider", "mthemes"),
	"description" => __("Create testimonials slider", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_testimonial_slider",
	"as_parent" => array('only' => 'mt_testimonial_slide'),
	"icon" => "mt_vc_icon",
	"content_element" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Testimonials type", "mthemes"),
			"param_name" => "style",
			"value" => array(
				'Default left' => 'default-left',
				'Default center' => 'default-center',
				'Minimal left' => 'minimal-left',
				'Minimal center' => 'minimal-center',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Show controls", "mthemes"),
			"description" => __("Show pagination controls under carousel", "mthemes"),
			"param_name" => "controls",
			"value" => $noyes,
		),
	),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => __("Testimonial slide", "mthemes"),
	"description" => __("Add testimonial slide", "mthemes"),
	"base" => "mt_testimonial_slide",
	"content_element" => true,
	"as_child" => array('only' => 'mt_testimonial_slider'),
	"icon" => "mt_vc_icon",
	"params" => array(
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => __("Author", "mthemes"),
			"param_name" => "author",
			"value" => "",
		),
		array(
			"type" => "textfield",
			"heading" => __("Author company/position", "mthemes"),
			"param_name" => "company",
			"value" => "",
		),
		array(
			"type" => "attach_image",
			"heading" => __("Thumbnail image", "mthemes"),
			"param_name" => "thumb",
			"value" => "",
		),
		array(
			"type" => "textarea",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => "",
		),
	),
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mt_Testimonial_Slider extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Mt_Testimonial_Slide extends WPBakeryShortCode {}
}

/**
 * Vimeo Block
 *
 */
vc_map( array(
	"name" => __("Vimeo", "mthemes"),
	"description" => __("Insert Vimeo Video", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_vimeo",
	"wrapper_class" => "mt_vimeo mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => __("Video ID", "mthemes"),
			"param_name" => "id",
			"description" => __("For example the Video ID for<br />http://vimeo.com/<b>7449107</b> is <b>7449107</b>", "mthemes"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Video width", "mthemes"),
			"param_name" => "width",
			"description" => __("In pixels e.g. 600", "mthemes"),
			"value" => "600"
		),
		array(
			"type" => "textfield",
			"heading" => __("Video height", "mthemes"),
			"param_name" => "height",
			"description" => __("In pixels e.g. 360", "mthemes"),
			"value" => "360"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "mthemes"),
			"description" => __("Set to YES to make video autoplaying", "mthemes"),
			"param_name" => "autoplay",
			"value" => $noyes,
		),
	),
) );

/**
 * Well Block
 *
 */
vc_map( array(
	"name" => __("Well", "mthemes"),
	"description" => __("Wrap text with well box", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_well",
	"wrapper_class" => "mt_well mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Size", "mthemes"),
			"param_name" => "size",
			"value" => array(
				'Default' => '',
				'Large' => 'lg',
				'Small' => 'sm',
			),
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"heading" => __("Text", "mthemes"),
			"param_name" => "content",
			"value" => __("<p>Put here Your text</p>", "mthemes")
		),
	),
) );

/**
 * YouTube Block
 *
 */
vc_map( array(
	"name" => __("YouTube", "mthemes"),
	"description" => __("Insert YouTube Video", "mthemes"),
	"category" => $shortcode_cat,
	"base" => "mt_youtube",
	"wrapper_class" => "mt_youtube mt_vc_item",
	"icon" => "mt_vc_icon",	
	"params" => array(
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => __("Video ID", "mthemes"),
			"param_name" => "id",
			"description" => __("For example the Video ID for<br />http://www.youtube.com/watch?v=<b>G_G8SdXktHg</b> is <b>G_G8SdXktHg</b>", "mthemes"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Video width", "mthemes"),
			"param_name" => "width",
			"description" => __("In pixels e.g. 600", "mthemes"),
			"value" => "600"
		),
		array(
			"type" => "textfield",
			"heading" => __("Video height", "mthemes"),
			"param_name" => "height",
			"description" => __("In pixels e.g. 360", "mthemes"),
			"value" => "360"
		),
		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "mthemes"),
			"description" => __("Set to YES to make video autoplaying", "mthemes"),
			"param_name" => "autoplay",
			"value" => $noyes,
		),
	),
) );