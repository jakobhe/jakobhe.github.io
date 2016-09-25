<?php

// Font Awesome script
$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$awesomepath = MTHEMES_TINYMCE_URI . '/css/font-awesome.css';
$subject = file_get_contents($awesomepath);

preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

$faicons = array();

foreach($matches as $match){
	$faicons[$match[1]] = $match[2];
}

// Glyphicons script
$patterng = '/\.(glyphicon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$glyphpath = MTHEMES_TINYMCE_URI . '/css/glyphicons.css';
$subjectg = file_get_contents($glyphpath);

preg_match_all($patterng, $subjectg, $matchesg, PREG_SET_ORDER);

$glyphicons = array();

foreach($matchesg as $matchg){
	$glyphicons[$matchg[1]] = $matchg[2];
}

// Choose shortcode category
function mt_shortcode_choose_cat ( $taxonomy, $empty_choice = false ) {
	if($empty_choice == true) {
		$post_categories[''] = 'Default';
	}

	$get_categories = get_categories('hide_empty=0&taxonomy=' . $taxonomy);

	if( ! array_key_exists('errors', $get_categories) ) {
		if( $get_categories && is_array($get_categories) ) {
			foreach ( $get_categories as $cat ) {
				$post_categories[$cat->slug] = $cat->name;
			}
		}

		if(isset($post_categories)) {
			return $post_categories;
		}
	}
}

// css animation list
$cssAnimationList = array(
	'fadeIn' => 'fadeIn',
	'fadeInDown' => 'fadeInDown',
	'fadeInDownBig' => 'fadeInDownBig',
	'fadeInLeft' => 'fadeInLeft',
	'fadeInLeftBig' => 'fadeInLeftBig',
	'fadeInRight' => 'fadeInRight',
	'fadeInRightBig' => 'fadeInRightBig',
	'fadeInUp' => 'fadeInUp',
	'fadeInUpBig' => 'fadeInUpBig',
	'flipInX' => 'flipInX',
	'flipInY' => 'flipInY',
	'bounceIn' => 'bounceIn',
	'bounceInDown' => 'bounceInDown',
	'bounceInLeft' => 'bounceInLeft',
	'bounceInRight' => 'bounceInRight',
	'bounceInUp' => 'bounceInUp',
	'lightSpeedIn' => 'lightSpeedIn',
	'rotateIn' => 'rotateIn',
	'rotateInDownLeft' => 'rotateInDownLeft',
	'rotateInDownRight' => 'rotateInDownRight',
	'rotateInUpLeft' => 'rotateInUpLeft',
	'rotateInUpRight' => 'rotateInUpRight',
	'slideInDown' => 'slideInDown',
	'slideInLeft' => 'slideInLeft',
	'slideInRight' => 'slideInRight',
	'rollIn' => 'rollIn',
);

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Selection Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_generator'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '',
	'popup_title' => ''
);

/*-----------------------------------------------------------------------------------*/
/*	Media self hosted audio Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_audio'] = array(
	'no_preview' => true,
	'params' => array(
		'mp3' => array(
			'type' => 'text',
			'label' => __('MP3 url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'ogg' => array(
			'type' => 'text',
			'label' => __('OGG url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'wav' => array(
			'type' => 'text',
			'label' => __('WAV url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'loop' => array(
			'type' => 'select',
			'label' => __('Loop', 'mthemes'),
			'desc' => __('Allows for the looping of media. Defaults to "off".', 'mthemes'),
			'options' => array(
				'' => 'Off',
				'on' => 'On',
			),
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => __('Autoplay', 'mthemes'),
			'desc' => __('Causes the media to automatically play as soon as the media file is ready. Defaults to "off".', 'mthemes'),
			'options' => array(
				'' => 'Off',
				'on' => 'On',
			),
		),
		'preload' => array(
			'type' => 'select',
			'label' => __('Preload', 'mthemes'),
			'desc' => __('Specifies if and how the audio should be loaded when the page loads. Defaults to "none".', 'mthemes'),
			'options' => array(
				'none' => 'The audio should not be loaded when the page loads',
				'auto' => 'The audio should be loaded entirely when the page loads',
				'metadata' => 'Only metadata should be loaded when the page loads',
			),
		),
	),
	'shortcode' => '[audio mp3="{{mp3}}" ogg="{{ogg}}" wav="{{wav}}" loop="{{loop}}" autoplay="{{autoplay}}" preload="{{preload}}"]',
	'popup_title' => __('Audio Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Media self hosted video Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_video'] = array(
	'no_preview' => true,
	'params' => array(
		'mp4' => array(
			'type' => 'text',
			'label' => __('MP4 url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'ogv' => array(
			'type' => 'text',
			'label' => __('OGV url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'mov' => array(
			'type' => 'text',
			'label' => __('MOV url', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'poster' => array(
			'type' => 'text',
			'label' => __('Poster url', 'mthemes'),
			'desc' => __('Image to show as placeholder before the media plays.', 'mthemes'),
			'std' => '',
		),
		'loop' => array(
			'type' => 'select',
			'label' => __('Loop', 'mthemes'),
			'desc' => __('Allows for the looping of media. Defaults to "off".', 'mthemes'),
			'options' => array(
				'' => 'Off',
				'on' => 'On',
			),
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => __('Autoplay', 'mthemes'),
			'desc' => __('Causes the media to automatically play as soon as the media file is ready. Defaults to "off".', 'mthemes'),
			'options' => array(
				'' => 'Off',
				'on' => 'On',
			),
		),
		'preload' => array(
			'type' => 'select',
			'label' => __('Preload', 'mthemes'),
			'desc' => __('Specifies if and how the video should be loaded when the page loads. Defaults to "none".', 'mthemes'),
			'options' => array(
				'none' => 'The video should not be loaded when the page loads',
				'auto' => 'The video should be loaded entirely when the page loads',
				'metadata' => 'Only metadata should be loaded when the page loads',
			),
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Defines width of the media.', 'mthemes'),
			'desc' => __('In pixels e.g. 200', 'mthemes'),
			'std' => '',
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Defines height of the media.', 'mthemes'),
			'desc' => __('In pixels e.g. 200', 'mthemes'),
			'std' => '',
		),		
	),
	'shortcode' => '[video mp4="{{mp4}}" ogv="{{ogv}}" mov="{{mov}}" poster="{{poster}}" loop="{{loop}}" autoplay="{{autoplay}}" preload="{{preload}}" width="{{width}}" height="{{height}}"]',
	'popup_title' => __('Video Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_button'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => __('Size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'sm' => 'Small',
				'lg' => 'Large',
			),
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'standard' => 'Standard',
				'empty-light' => 'Empty light',
				'empty-dark' => 'Empty dark',
			),
		),
		'block' => array(
			'type' => 'select',
			'label' => __('Block button (full width)', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'Default',
				'yes' => 'Block',
			),
		),
		'link' => array(
			'type' => 'text',
			'label' => __('Button url', 'mthemes'),
			'desc' => __('E.g. http://www.themeforest.net', 'mthemes'),
			'std' => '',
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Target', 'mthemes'),
			'desc' => '',
			'options' => array(
				'_self' => 'Open link in current window',
				'_blank' => 'Open link in new window',
			),
		),
		'icon' => array(
			'type' => 'faiconpicker',
			'label' => __('Select Icon', 'mthemes'),
			'desc' => __('If You want to use icon in the button choose one here.', 'mthemes'),
			'options' => $faicons,
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
		'xclass' => array(
			'type' => 'text',
			'label' => __('Extra button class', 'mthemes'),
			'desc' => __('You can add here extra class for this button', 'mthemes'),
			'std' => '',
		),
		'content' => array(
			'type' => 'text',
			'label' => __('Button text', 'mthemes'),
			'desc' => '',
			'std' => 'Button text',
		),
	),
	'shortcode' => '[mt_button size="{{size}}" style="{{style}}" block="{{block}}" link="{{link}}" target="{{target}}" icon="{{icon}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}" xclass="{{xclass}}"]{{content}}[/mt_button]',
	'popup_title' => __('Button Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_alert'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Alert type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'default' => 'Default',
				'primary' => 'Primary',
				'success' => 'Success',
				'info' 	  => 'Info',
				'warning' => 'Warning',
				'danger'  => 'Danger',
			),
		),
		'dismissable' => array(
			'type' => 'select',
			'label' => __('Close button', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Alert text', 'mthemes'),
			'desc' => '',
			'std' => 'Alert text goes here',
		),
	),
	'shortcode' => '[mt_alert type="{{type}}" dismissable="{{dismissable}}"]{{content}}[/mt_alert]',
	'popup_title' => __('Alert Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Code Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_code'] = array(
	'no_preview' => true,
	'params' => array(
		'inline' => array(
			'type' => 'select',
			'label' => __('Inline', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'scrollable' => array(
			'type' => 'select',
			'label' => __('Scrollable', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Code text', 'mthemes'),
			'desc' => '',
			'std' => 'Code text goes here',
		),
	),
	'shortcode' => '[mt_code inline="{{inline}}" scrollable="{{scrollable}}"]{{content}}[/mt_code]',
	'popup_title' => __('Code Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Label Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_label'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'type' => 'textarea',
			'label' => __('Label text', 'mthemes'),
			'desc' => '',
			'std' => 'New',
		),
	),
	'shortcode' => '[mt_label]{{content}}[/mt_label]',
	'popup_title' => __('Label Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Badge Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_badge'] = array(
	'no_preview' => true,
	'params' => array(
		'right' => array(
			'type' => 'select',
			'label' => __('Align to right', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Badge text', 'mthemes'),
			'desc' => '',
			'std' => 'New',
		),
	),
	'shortcode' => '[mt_badge right="{{right}}"]{{content}}[/mt_badge]',
	'popup_title' => __('Badge Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Glyphicon Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_glyphicon'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'glyphiconpicker',
			'label' => __('Select Icon', 'mthemes'),
			'desc' => __('Click an icon to select it and click again to deselect', 'mthemes'),
			'options' => $glyphicons,
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => __('Icon color', 'mthemes'),
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Stack size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'033x' => '33% larger',
				'2x' => '2x larger',
				'3x' => '3x larger',
				'4x' => '4x larger',
				'5x' => '5x larger',
			),
		),
	),
	'shortcode' => '[mt_glyphicon type="{{type}}" size="{{size}}" color="{{color}}"]',
	'popup_title' => __('Glyphicon Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Font Awesome Stack Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_fastack'] = array(
	'no_preview' => true,
	'params' => array(		
		'size' => array(
			'type' => 'select',
			'label' => __('Stack size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'lg' => '33% larger',
				'2x' => '2x larger',
				'3x' => '3x larger',
				'4x' => '4x larger',
				'5x' => '5x larger',
			),
		),
	),
	'shortcode' => '[mt_fa_stack size="{{size}}"][/mt_fa_stack]',
	'popup_title' => __('Font Awesome Stack Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Font Awesome Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_fontawesome'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'faiconpicker',
			'label' => __('Select Icon', 'mthemes'),
			'desc' => __('Click an icon to select it and click again to deselect', 'mthemes'),
			'options' => $faicons,
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Icon size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'lg' => '33% larger',
				'2x' => '2x larger',
				'3x' => '3x larger',
				'4x' => '4x larger',
				'5x' => '5x larger',
			),
		),
		'fixedwidth' => array(
			'type' => 'select',
			'label' => __('Fixed width', 'mthemes'),
			'desc' => __('Great to use when variable icon widths throw off alignment', 'mthemes'),
			'options' => array(
				'' => 'No',
				'true' => 'Yes',
			),
		),
		'spin' => array(
			'type' => 'select',
			'label' => __('Spin icon', 'mthemes'),
			'desc' => __('This animation is not supported by IE9 and below', 'mthemes'),
			'options' => array(
				'' => 'No',
				'true' => 'Yes',
			),
		),
		'rotate' => array(
			'type' => 'select',
			'label' => __('Rotate icon', 'mthemes'),
			'desc' => __('This animation is not supported by IE9 and below', 'mthemes'),
			'options' => array(
				'' => 'No',
				'rotate-90' => 'Rotate 90',
				'rotate-180' => 'Rotate 180',
				'rotate-270' => 'Rotate 270',
				'flip-horizontal' => 'Flip horizontal',
				'flip-vertical' => 'Flip vertical',
			),
		),
		'stack' => array(
			'type' => 'select',
			'label' => __('Icon size in stack', 'mthemes'),
			'desc' => __('Should be used only in the stack. Use 2x for background icon and 1x for front icon', 'mthemes'),
			'options' => array(
				'' => 'Default (I don\'t use stack icons)',
				'1x' => '1x',
				'2x' => '2x',
			),
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => __('Icon color', 'mthemes'),
		),
	),
	'shortcode' => '[mt_fa type="{{type}}" size="{{size}}" fixedwidth="{{fixedwidth}}" spin="{{spin}}" rotate="{{rotate}}" stack="{{stack}}" color="{{color}}"]',
	'popup_title' => __('Font Awesome Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Table Wrap Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_table_wrap'] = array(
	'no_preview' => true,
	'params' => array(		
		'type' => array(
			'type' => 'select',
			'label' => __('Table type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'table-striped' => 'Striped',
				'table-bordered' => 'Bordered',
				'table-hover' => 'Hover',
				'table-condensed' => 'Condensed',
			),
		),
		'responsive' => array(
			'type' => 'select',
			'label' => __('Responsive', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'No',
				'true' => 'Yes',
			),
		),
	),
	'shortcode' => '[mt_table_wrap type="{{type}}" responsive="{{responsive}}"][/mt_table_wrap]',
	'popup_title' => __('Table Wrap Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Well Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_well'] = array(
	'no_preview' => true,
	'params' => array(		
		'size' => array(
			'type' => 'select',
			'label' => __('Well size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'lg' => 'Large',
				'sm' => 'Small',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Well text', 'mthemes'),
			'desc' => '',
			'std' => 'Well text goes here',
		),
	),
	'shortcode' => '[mt_well size="{{size}}"]{{content}}[/mt_well]',
	'popup_title' => __('Well Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Panel Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_panel'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Panel title', 'mthemes'),
			'desc' => __('If You don\'t want to use it leave it blank. Only text.', 'mthemes'),
			'std' => '',
		),
		'footer' => array(
			'type' => 'text',
			'label' => __('Panel footer', 'mthemes'),
			'desc' => __('If You don\'t want to use it leave it blank. Only text.', 'mthemes'),
			'std' => '',
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Panel text', 'mthemes'),
			'desc' => '',
			'std' => 'Panel text goes here',
		),
	),
	'shortcode' => '[mt_panel title="{{title}}" footer="{{footer}}"]{{content}}[/mt_panel]',
	'popup_title' => __('Panel Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Progress Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_progress'] = array(
	'no_preview' => true,
	'params' => array(
		'value' => array(
			'type' => 'text',
			'label' => __('Value', 'mthemes'),
			'desc' => __('Choose between 0-100', 'mthemes'),
			'std' => ''
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Progress title', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
	),
	'shortcode' => '[mt_progress value="{{value}}" title="{{title}}"]',
	'popup_title' => __('Progress Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_tabs'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Tabs type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'nav-tabs' => 'Default Tabs',
				'nav-pills' => 'Pills',
			),
		),
	),
	'shortcode' => '[mt_tabs type="{{type}}"]{{child_shortcode}}[/mt_tabs]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Tab Title', 'mthemes'),
				'desc' => '',
				'std' => 'Title',
			),
			'content' => array(
				'type' => 'textarea',
				'label' => __('Tab Content', 'mthemes'),
				'desc' => '',
				'std' => 'Tab Content',
			),
		),
		'shortcode' => '[mt_tab title="{{title}}"]{{content}}[/mt_tab]',
		'clone_button' => __('Add Tab', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Tooltip Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_tooltip'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Tooltip Title', 'mthemes'),
			'desc' => __('Only text can be used', 'mthemes'),
			'std' => 'Title',
		),
		'placement' => array(
			'type' => 'select',
			'label' => __('Tooltip placement', 'mthemes'),
			'desc' => '',
			'options' => array(
				'top'   => 'Top',
				'right' => 'Right',
				'bottom' => 'Bottom',
				'left' => 'Left',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Tooltip text', 'mthemes'),
			'desc' => __('You can use shortcodes here e.g. buttons, images and also plain html', 'mthemes'),
			'std' => 'Hover over this',
		),
	),
	'shortcode' => '[mt_tooltip title="{{title}}" placement="{{placement}}"]{{content}}[/mt_tooltip]',
	'popup_title' => __('Tooltip Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Popover Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_popover'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Popover Title', 'mthemes'),
			'desc' => __('Only text can be used', 'mthemes'),
			'std' => 'Title',
		),
		'popcontent' => array(
			'type' => 'text',
			'label' => __('Popover Content', 'mthemes'),
			'desc' => __('Only text can be used', 'mthemes'),
			'std' => 'Popover content goes here',
		),
		'placement' => array(
			'type' => 'select',
			'label' => __('Popover placement', 'mthemes'),
			'desc' => '',
			'options' => array(
				'top'   => 'Top',
				'right' => 'Right',
				'bottom' => 'Bottom',
				'left' => 'Left',
			),
		),
		'trigger' => array(
			'type' => 'select',
			'label' => __('Popover trigger', 'mthemes'),
			'desc' => '',
			'options' => array(
				'click'   => 'Click',
				'hover' => 'Hover',
				'focus' => 'Focus',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Popover text', 'mthemes'),
			'desc' => __('You can use shortcodes here e.g. buttons, images and also plain html', 'mthemes'),
			'std' => 'Click here',
		),
	),
	'shortcode' => '[mt_popover title="{{title}}" popcontent="{{popcontent}}" placement="{{placement}}" trigger="{{trigger}}"]{{content}}[/mt_popover]',
	'popup_title' => __('Popover Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Emphasis Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_emphasis'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Emphasis type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'default' => 'Default',
				'muted'   => 'Muted',				
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Emphasis text', 'mthemes'),
			'desc' => '',
			'std' => 'Emphasis text',
		),
	),
	'shortcode' => '[mt_emphasis type="{{type}}"]{{content}}[/mt_emphasis]',
	'popup_title' => __('Emphasis Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Modal Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_modal'] = array(
	'no_preview' => true,
	'params' => array(
		'text' => array(
			'type' => 'text',
			'label' => __('Modal link text', 'mthemes'),
			'desc' => '',
			'std' => 'Click here to open modal'
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Modal title', 'mthemes'),
			'desc' => '',
			'std' => 'Short modal title'
		),
		'id' => array(
			'type' => 'text',
			'label' => __('Modal ID (required)', 'mthemes'),
			'desc' => __('Used to open modal. This have to be <b>unique</b> and can\'t contains special signs (use only letters, numbers, dashes and underscores)', 'mthemes'),
			'std' => ''
		),
		'footer' => array(
			'type' => 'select',
			'label' => __('Enable modal footer', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Modal content', 'mthemes'),
			'desc' => '',
			'std' => 'Put modal content here',
		),
	),
	'shortcode' => '[modal-trigger id="{{id}}"]{{text}}[/modal-trigger][modal id="{{id}}" title="{{title}}" footer="{{footer}}"]{{content}}[/modal]',
	'popup_title' => __('Modal Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Custom list Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_customlist'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Choose custom list type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'unstyled' => 'Unstyled',
				'inline' => 'Inline',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Content', 'mthemes'),
			'desc' => '',
			'std' => 'Put Your list here',
		),
	),
	'shortcode' => '[mt_custom_list type="{{type}}"]{{content}}[/mt_custom_list]',
	'popup_title' => __('Custom List Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Header Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_header'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => __('Header size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'1' => 'Header 1',
				'2' => 'Header 2',
				'3' => 'Header 3',
				'4' => 'Header 4',
				'5' => 'Header 5',
				'6' => 'Header 6',
			),
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Header align', 'mthemes'),
			'desc' => '',
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Header text', 'mthemes'),
			'desc' => '',
			'std' => 'Header goes here',
		),
	),
	'shortcode' => '[mt_header size="{{size}}" align="{{align}}"]{{content}}[/mt_header]',
	'popup_title' => __('Header Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Blockquote Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_blockquote'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Blockquote title/author', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'right' => array(
			'type' => 'select',
			'label' => __('Align to the right', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Content', 'mthemes'),
			'desc' => '',
			'std' => 'Blockquote content goes here',
		),
	),
	'shortcode' => '[mt_blockquote title="{{title}}" right="{{right}}"]{{content}}[/mt_blockquote]',
	'popup_title' => __('Blockquote Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Image Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_image'] = array(
	'no_preview' => true,
	'params' => array(
		'src' => array(
			'type' => 'text',
			'label' => __('Image source', 'mthemes'),
			'desc' => __('E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
			'std' => ''
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Image width', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Image height', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Image style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'rounded' => 'Rounded',
				'circle' => 'Circle',
				'thumbnail' => 'Thumbnail',
			),
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Image align', 'mthemes'),
			'desc' => '',
			'options' => array(
				'none' => 'None',
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Image title', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'alt' => array(
			'type' => 'text',
			'label' => __('Image alt text', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
	),
	'shortcode' => '[mt_image src="{{src}}" width="{{width}}" height="{{height}}" style="{{style}}" align="{{align}}" title="{{title}}" alt="{{alt}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]',
	'popup_title' => __('Image Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Lightbox Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_lightbox'] = array(
	'no_preview' => true,
	'params' => array(
		'thumb' => array(
			'type' => 'text',
			'label' => __('Thumbnail source', 'mthemes'),
			'desc' => __('E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
			'std' => ''
		),
		'url' => array(
			'type' => 'text',
			'label' => __('Lightbox url', 'mthemes'),
			'desc' => __('Link to big image/video that will pop in the lightbox. E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
			'std' => ''
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Thumbnail width (in pixels)', 'mthemes'),
			'desc' => __('If you\'re using <b>thumbnail</b> style make sure width value is 20px bigger than actual image (because of additional padding and border)', 'mthemes'),
			'std' => ''
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Thumbnail height (in pixels)', 'mthemes'),
			'desc' => __('If you\'re using <b>thumbnail</b> style make sure height value is 20px bigger than actual image (because of additional padding and border)', 'mthemes'),
			'std' => ''
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Thumbnail style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'rounded' => 'Rounded',
				'circle' => 'Circle',
				'thumbnail' => 'Thumbnail',
			),
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Thumbnail align', 'mthemes'),
			'desc' => '',
			'options' => array(
				'none' => 'None',
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Image title in lightbox', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
	),
	'shortcode' => '[mt_lightbox thumb="{{thumb}}" url="{{url}}" width="{{width}}" height="{{height}}" style="{{style}}" align="{{align}}" title="{{title}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]',
	'popup_title' => __('Lightbox Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_testimonial'] = array(
	'no_preview' => true,
	'params' => array(
		'author' => array(
			'type' => 'text',
			'label' => __('Testimonial author', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'company' => array(
			'type' => 'text',
			'label' => __('Author company/position', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'thumb' => array(
			'type' => 'text',
			'label' => __('Thumbnail source', 'mthemes'),
			'desc' => __('E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
			'std' => ''
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Content', 'mthemes'),
			'desc' => '',
			'std' => 'Testimonial content goes here',
		),
	),
	'shortcode' => '[mt_testimonial author="{{author}}" company="{{company}}" thumb="{{thumb}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]{{content}}[/mt_testimonial]',
	'popup_title' => __('Testimonial Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Testimonial slider Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_testslider'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Testimonials type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'default-left' => 'Default left',
				'default-center' => 'Default center',
				'minimal-left' => 'Minimal left',
				'minimal-center' => 'Minimal center',
			),
		),
		'controls' => array(
			'type' => 'select',
			'label' => __('Show controls', 'mthemes'),
			'desc' => __('Show pagination controls under carousel', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
	),
	'shortcode' => '[mt_testimonial_slider style="{{style}}" controls="{{controls}}"]{{child_shortcode}}[/mt_testimonial_slider]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'author' => array(
				'type' => 'text',
				'label' => __('Testimonial author', 'mthemes'),
				'desc' => '',
				'std' => ''
			),
			'company' => array(
				'type' => 'text',
				'label' => __('Author company/position', 'mthemes'),
				'desc' => '',
				'std' => ''
			),
			'thumb' => array(
				'type' => 'text',
				'label' => __('Thumbnail source', 'mthemes'),
				'desc' => __('E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
				'std' => ''
			),
			'content' => array(
				'type' => 'textarea',
				'label' => __('Content', 'mthemes'),
				'desc' => '',
				'std' => 'Testimonial content goes here',
			),
		),
		'shortcode' => '[mt_testimonial_slide author="{{author}}" company="{{company}}" thumb="{{thumb}}"]{{content}}[/mt_testimonial_slide]',
		'clone_button' => __('Add Testimonial', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'mthemes'),
			'desc' => __('Add the title that will go above the toggle content', 'mthemes'),
			'std' => 'Title'
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Toggle style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'standard' => 'Standard',
				'small' => 'Small',
			),
		),
		'margin' => array(
			'type' => 'select',
			'label' => __('Margin bottom', 'mthemes'),
			'desc' => __('Add bottom margin to this toggle. Otherwise there will be no margin at the bottom (similar style to accordions)', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'mthemes'),
			'desc' => __('Add the toggle content. Will accept HTML', 'mthemes'),
		),
	),
	'shortcode' => '[mt_toggle title="{{title}}" style="{{style}}" margin="{{margin}}"]{{content}}[/mt_toggle]',
	'popup_title' => __('Toggle Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_accordions'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Accordion style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'standard' => 'Standard',
				'small' => 'Small',
			),
		),
	),
	'no_preview' => true,
	'shortcode' => '[mt_accordions style="{{style}}"]{{child_shortcode}}[/mt_accordions]',
	'popup_title' => __('Accordion Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'name' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Accordion Tab Title', 'mthemes'),
				'desc' => __('Title of the accordion', 'mthemes'),
			),
			'content' => array(
				'std' => 'Accordion Content',
				'type' => 'textarea',
				'label' => __('Accordion Content', 'mthemes'),
				'desc' => __('Add the accordion\'s content', 'mthemes')
			)
		),
		'shortcode' => '[mt_accordion name="{{name}}"]{{content}}[/mt_accordion]',
		'clone_button' => __('Add Accordion Tab', 'mthemes')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Social icons Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_socialicons'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '[mt_social_icons]{{child_shortcode}}[/mt_social_icons]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'icontype' => array(
				'type' => 'select',
				'label' => __('Choose social icon', 'mthemes'),
				'desc' => '',
				'options' => array(
					'twitter' => 'Twitter',
					'facebook' => 'Facebook',
					'youtube' => 'YouTube',
					'vimeo' => 'Vimeo',
					'skype' => 'Skype',
					'linkedin' => 'LinkedIn',
					'google-plus' => 'Google+',
					'envelope' => 'Email',
					'github' => 'GitHub',
					'flickr' => 'Flickr',
					'dropbox' => 'Dropbox',
					'dribbble' => 'Dribbble',
					'behance' => 'Behance',
					'instagram' => 'Instagram',
					'soundcloud' => 'SoundCloud',
					'pinterest' => 'Pinterest',
					'evernote' => 'Evernote',
					'picasa' => 'Picasa',
					'stumbleupon' => 'Stumbleupon',
					'lastfm' => 'Last FM',
					'tumblr' => 'Tumblr',
					'stack-overflow' => 'Stack Overflow',
					'bitbucket' => 'Bitbucket',
					'smashing' => 'Smashing',
					'apple' => 'Apple',
					'android' => 'Android',
				),
			),
			'icontitle' => array(
				'type' => 'text',
				'label' => __('Icon title', 'mthemes'),
				'desc' => __('Short text that will be used in the tooltip', 'mthemes'),
				'std' => ''
			),
			'url' => array(
				'type' => 'text',
				'label' => __('Social url', 'mthemes'),
				'desc' => '',
				'std' => ''
			),
		),
		'shortcode' => '[mt_social_icon icontype="{{icontype}}" icontitle="{{icontitle}}" url="{{url}}"][/mt_social_icon]',
		'clone_button' => __('Add Social Icon', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Service
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_service'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Choose service style', 'mthemes'),
			'desc' => '',
			'options' => array(
				'icon-on-left' => 'Icon on the left',
				'icon-on-right' => 'Icon on the right',
				'icon-on-top' => 'Icon on top',
				'icon-on-left-list' => 'Icon on the left (list style)',
				'icon-on-right-list' => 'Icon on the right (list style)',
				'icon-box' => 'Icon box',
			),
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Service title', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'icon' => array(
			'type' => 'faiconpicker',
			'label' => __('Select Icon', 'mthemes'),
			'desc' => __('Click an icon to select it and click again to deselect', 'mthemes'),
			'options' => $faicons,
		),
		'url' => array(
			'type' => 'text',
			'label' => __('Service url', 'mthemes'),
			'desc' => __('E.g. http://www.themeforest.net', 'mthemes'),
			'std' => '',
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Url target', 'mthemes'),
			'desc' => '',
			'options' => array(
				'_self' => 'Open link in current window',
				'_blank' => 'Open link in new window',
			),
		),
		'margin' => array(
			'type' => 'select',
			'label' => __('Bottom margin (mainly for list style)', 'mthemes'),
			'desc' => '',
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',				
			),
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),	
		'content' => array(
			'type' => 'textarea',
			'label' => __('Content', 'mthemes'),
			'desc' => '',
			'std' => 'Service content goes here',
		),
	),
	'shortcode' => '[mt_service style="{{style}}" title="{{title}}" icon="{{icon}}" url="{{url}}" target="{{target}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]{{content}}[/mt_service]',
	'popup_title' => __('Service Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Team Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_teammembers'] = array(
	'no_preview' => true,
	'params' => array(
		'postid' => array(
			'type' => 'text',
			'label' => __('Team post ID', 'mthemes'),
			'desc' => __('You can put here Team Member ID if You want to show only one person. If You want to show 2 and more use slug', 'mthemes'),
			'std' => '',
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'teammembers-categories' )
		),
		'limit' => array(
			'type' => 'text',
			'label' => __('Number of item to show', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Team column size', 'mthemes'),
			'desc' => '',
			'options' => array(
				'4' => '1/3',
				'3' => '1/4',
				'6' => '1/2',
				'2' => '1/6',
				'12' => '100%',
			),
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'From highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'From lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order you want to use to show posts', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
	),
	'shortcode' => '[mt_team postid="{{postid}}" slug="{{slug}}" limit="{{limit}}" size="{{size}}" order="{{order}}" orderby="{{orderby}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]',
	'popup_title' => __('Team Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Team carousel Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_teamcarousel'] = array(
	'no_preview' => true,
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Column Size', 'mthemes'),
			'desc' => __('Select the size of the team carousel shortcode.', 'mthemes'),
			'options' => array(
				'3' => '3',
				'4' => '4',
			)
		),
		'controls' => array(
			'type' => 'select',
			'label' => __('Show controls', 'mthemes'),
			'desc' => __('Show pagination controls under carousel', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
		'limit' => array(
			'type' => 'text',
			'label' => __('Items number', 'mthemes'),
			'desc' => __('How many items you want to show in carousel e.g. 6', 'mthemes'),
			'std' => '6'
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'Descending order from highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'Ascending order from lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'teammembers-categories' )
		),
	),
	'shortcode' => '[mt_team_carousel columns="{{columns}}" controls="{{controls}}" limit="{{limit}}" order="{{order}}" orderby="{{orderby}}" slug="{{slug}}"]',
	'popup_title' => __('Team carousel Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Pricing Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_pricing'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Pricing title', 'mthemes'),
			'desc' => '',
			'std' => 'Title'
		),
		'value' => array(
			'type' => 'text',
			'label' => __('Pricing value', 'mthemes'),
			'desc' => '',
			'std' => '$19'
		),
		'span' => array(
			'type' => 'text',
			'label' => __('Pricing span text', 'mthemes'),
			'desc' => __('Smaller text e.g. some additional info or period: daily, monthly etc.', 'mthemes'),
			'std' => ''
		),
		'url' => array(
			'type' => 'text',
			'label' => __('Custom button url', 'mthemes'),
			'desc' => __('E.g. http://www.themeforest.net', 'mthemes'),
			'std' => ''
		),
		'button_text' => array(
			'type' => 'text',
			'label' => __('Button text', 'mthemes'),
			'desc' => '',
			'std' => 'Purchase'
		),
	),
	'shortcode' => '[mt_pricing title="{{title}}" value="{{value}}" span="{{span}}" url="{{url}}" button_text="{{button_text}}"]Put unordered list here[/mt_pricing]',
	'popup_title' => __('Pricing Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Google map Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_gmap'] = array(
	'no_preview' => true,
	'params' => array(
		'width' => array(
			'type' => 'text',
			'label' => __('Map width in pixels', 'mthemes'),
			'desc' => '',
			'std' => '800'
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Map height in pixels', 'mthemes'),
			'desc' => '',
			'std' => '200'
		),
		'zoom' => array(
			'type' => 'text',
			'label' => __('Map zoom', 'mthemes'),
			'desc' => '',
			'std' => '12'
		),
		'scrollwheel' => array(
			'type' => 'select',
			'label' => __('Zoom map with scrollwheel', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
		'maptype' => array(
			'type' => 'select',
			'label' => __('Choose map type', 'mthemes'),
			'desc' => '',
			'options' => array(
				'ROADMAP' => 'Roadmap',
				'HYBRID' => 'Hybrid',
				'SATELLITE' => 'Satellite',
				'TERRAIN' => 'Terrain',
			)
		),
	),
	'shortcode' => '[mt_gmap width="{{width}}" height="{{height}}" zoom="{{zoom}}" scrollwheel="{{scrollwheel}}" maptype="{{maptype}}"]{{child_shortcode}}[/mt_gmap]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'type' => array(
				'type' => 'select',
				'label' => __('Address type', 'mthemes'),
				'desc' => '',
				'options' => array(
					'address' => 'Use standard address',
					'coordinates' => 'Use coordinates (latitude and longitude)',
				)
			),
			'address' => array(
				'type' => 'text',
				'label' => __('Address', 'mthemes'),
				'desc' => __('For example: New York', 'mthemes'),
				'std' => ''
			),
			'latitude' => array(
				'type' => 'text',
				'label' => __('Latitude', 'mthemes'),
				'desc' => '',
				'std' => ''
			),
			'longitude' => array(
				'type' => 'text',
				'label' => __('Longitude', 'mthemes'),
				'desc' => '',
				'std' => ''
			),
			'icon' => array(
				'type' => 'text',
				'label' => __('Icon url', 'mthemes'),
				'desc' => __('Put here marker icon url', 'mthemes'),
				'std' => ''
			),
			'popup' => array(
				'type' => 'select',
				'label' => __('Show popup', 'mthemes'),
				'desc' => __('Show popup by default', 'mthemes'),
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes',
				)
			),
			'content' => array(
				'type' => 'textarea',
				'label' => __('Content', 'mthemes'),
				'desc' => '',
				'std' => '',
			),
		),
		'shortcode' => '[mt_gmarker type="{{type}}" address="{{address}}" latitude="{{latitude}}" longitude="{{longitude}}" icon="{{icon}}" popup="{{popup}}"]{{content}}[/mt_gmarker]',
		'clone_button' => __('Add Marker', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio carousel Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_portfoliocarousel'] = array(
	'no_preview' => true,
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Column Size', 'mthemes'),
			'desc' => __('Select the size of the portfolio shortcode.', 'mthemes'),
			'options' => array(
				'3' => '3',
				'4' => '4',
			)
		),
		'controls' => array(
			'type' => 'select',
			'label' => __('Show controls', 'mthemes'),
			'desc' => __('Show pagination controls under carousel', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
		'gaps' => array(
			'type' => 'select',
			'label' => __('Gaps', 'mthemes'),
			'desc' => __('Add some margin between items', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
		'limit' => array(
			'type' => 'text',
			'label' => __('Items number', 'mthemes'),
			'desc' => __('How many items you want to show in carousel e.g. 6', 'mthemes'),
			'std' => '6'
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'Descending order from highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'Ascending order from lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'portfolio-categories' )
		),
	),
	'shortcode' => '[mt_portfolio_carousel columns="{{columns}}" controls="{{controls}}" gaps="{{gaps}}" limit="{{limit}}" order="{{order}}" orderby="{{orderby}}" slug="{{slug}}"]',
	'popup_title' => __('Portfolio carousel Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Clients carousel Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_clientscarousel'] = array(
	'no_preview' => true,
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Column Size', 'mthemes'),
			'desc' => __('How many items You want to show in one row', 'mthemes'),
			'options' => array(
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			)
		),
		'controls' => array(
			'type' => 'select',
			'label' => __('Show controls', 'mthemes'),
			'desc' => __('Show pagination controls under carousel', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)
		),
	),
	'shortcode' => '[mt_clients_carousel columns="{{columns}}" controls="{{controls}}"]{{child_shortcode}}[/mt_clients_carousel]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'thumb' => array(
				'type' => 'text',
				'label' => __('Client logo', 'mthemes'),
				'desc' => __('Client image ID', 'mthemes'),
				'std' => ''
			),
			'url' => array(
				'type' => 'text',
				'label' => __('Custom url', 'mthemes'),
				'desc' => __('E.g. http://www.themeforest.net', 'mthemes'),
				'std' => ''
			),
		),
		'shortcode' => '[mt_client thumb="{{thumb}}" url="{{url}}"]',
		'clone_button' => __('Add Client', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Clients grid Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_clientsgrid'] = array(
	'no_preview' => true,
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Column Size', 'mthemes'),
			'desc' => __('How many items You want to show in one row', 'mthemes'),
			'options' => array(
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			)
		),
	),
	'shortcode' => '[mt_clients_grid columns="{{columns}}"]{{child_shortcode}}[/mt_clients_grid]',
	'popup_title' => __('Insert Shortcode', 'mthemes'),

	'child_shortcode' => array(
		'params' => array(
			'thumb' => array(
				'type' => 'text',
				'label' => __('Thumbnail source', 'mthemes'),
				'desc' => __('E.g. http://www.yoursite.com/image.jpg', 'mthemes'),
				'std' => ''
			),
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'mthemes'),
				'desc' => __('Title used in image alt and title.', 'mthemes'),
				'std' => ''
			),
			'url' => array(
				'type' => 'text',
				'label' => __('Custom url', 'mthemes'),
				'desc' => __('E.g. http://www.themeforest.net', 'mthemes'),
				'std' => ''
			),
		),
		'shortcode' => '[mt_client_item thumb="{{thumb}}" url="{{url}}"]',
		'clone_button' => __('Add Client', 'mthemes')
	),
);

/*-----------------------------------------------------------------------------------*/
/*	Latest posts Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_latestposts'] = array(
	'no_preview' => true,
	'params' => array(
		'limit' => array(
			'type' => 'text',
			'label' => __('Items number', 'mthemes'),
			'desc' => __('How many items you want to show e.g. 6', 'mthemes'),
			'std' => '6'
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'Descending order from highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'Ascending order from lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'category' )
		),
	),
	'shortcode' => '[mt_latest_posts limit="{{limit}}" order="{{order}}" orderby="{{orderby}}" slug="{{slug}}"]',
	'popup_title' => __('Post Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	YouTube Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_youtube'] = array(
	'no_preview' => true,
	'params' => array(
		'id' => array(
			'type' => 'text',
			'label' => __('Video ID', 'mthemes'),
			'desc' => __('For example the Video ID for<br />http://www.youtube.com/watch?v=<b>G_G8SdXktHg</b> is <b>G_G8SdXktHg</b>', 'mthemes'),
			'std' => ''
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Video width', 'mthemes'),
			'desc' => __('In pixels e.g. 600', 'mthemes'),
			'std' => '600'
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Video height', 'mthemes'),
			'desc' => __('In pixels e.g. 360', 'mthemes'),
			'std' => '360'
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => __('Autoplay', 'mthemes'),
			'desc' => __('Set to YES to make video autoplaying', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
	),
	'shortcode' => '[mt_youtube id="{{id}}" width="{{width}}" height="{{height}}" autoplay="{{autoplay}}"]',
	'popup_title' => __('YouTube Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Vimeo Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_vimeo'] = array(
	'no_preview' => true,
	'params' => array(
		'id' => array(
			'type' => 'text',
			'label' => __('Video ID', 'mthemes'),
			'desc' => __('For example the Video ID for<br />http://vimeo.com/<b>7449107</b> is <b>7449107</b>', 'mthemes'),
			'std' => ''
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Video width', 'mthemes'),
			'desc' => __('In pixels e.g. 600', 'mthemes'),
			'std' => '600'
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Video height', 'mthemes'),
			'desc' => __('In pixels e.g. 360', 'mthemes'),
			'std' => '360'
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => __('Autoplay', 'mthemes'),
			'desc' => __('Set to YES to make video autoplaying', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
	),
	'shortcode' => '[mt_vimeo id="{{id}}" width="{{width}}" height="{{height}}" autoplay="{{autoplay}}"]',
	'popup_title' => __('Vimeo Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Milestone Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_milestone'] = array(
	'no_preview' => true,
	'params' => array(
		'number' => array(
			'type' => 'text',
			'label' => __('Milestone number (number only)', 'mthemes'),
			'desc' => '',
			'std' => ''
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Milestone title', 'mthemes'),
			'desc' => '',
			'std' => '',
		),
	),
	'shortcode' => '[mt_milestone number="{{number}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"]{{content}}[/mt_milestone]',
	'popup_title' => __('Milestone Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Pie chart Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_piechart'] = array(
	'no_preview' => true,
	'params' => array(
		'number' => array(
			'type' => 'text',
			'label' => __('Number', 'mthemes'),
			'desc' => '',
			'std' => '50'
		),
		'percent' => array(
			'type' => 'select',
			'label' => __('Percent', 'mthemes'),
			'desc' => __('Show percent after number', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
		),
		'trackcolor' => array(
			'type' => 'colorpicker',
			'label' => __('Track color', 'mthemes'),
			'std' => '#f2f2f2'
		),
		'barcolor' => array(
			'type' => 'colorpicker',
			'label' => __('Bar color', 'mthemes'),
			'std' => '#1DDBF4'
		),
		'linewidth' => array(
			'type' => 'text',
			'label' => __('Line width (in px)', 'mthemes'),
			'desc' => '',
			'std' => '4'
		),
		'size' => array(
			'type' => 'text',
			'label' => __('Chart size', 'mthemes'),
			'desc' => __('In pixels. Keep in mind that it\'s not responsive.', 'mthemes'),
			'std' => '140'
		),
		'easing' => array(
			'type' => 'select',
			'label' => __('Easing', 'mthemes'),
			'desc' => '',
			'options' => array(
				'swing'=>'swing',
				'easeInQuad'=>'easeInQuad',
				'easeOutQuad' => 'easeOutQuad',
				'easeInOutQuad'=>'easeInOutQuad',
				'easeInCubic'=>'easeInCubic',
				'easeOutCubic'=>'easeOutCubic',
				'easeInOutCubic'=>'easeInOutCubic',
				'easeInQuart'=>'easeInQuart',
				'easeOutQuart'=>'easeOutQuart',
				'easeInOutQuart'=>'easeInOutQuart',
				'easeInQuint'=>'easeInQuint',
				'easeOutQuint'=>'easeOutQuint',
				'easeInOutQuint'=>'easeInOutQuint',
				'easeInExpo'=>'easeInExpo',
				'easeOutExpo'=>'easeOutExpo',
				'easeInOutExpo'=>'easeInOutExpo',
				'easeInSine'=>'easeInSine',
				'easeOutSine'=>'easeOutSine',
				'easeInOutSine'=>'easeInOutSine',
				'easeInCirc'=>'easeInCirc',
				'easeOutCirc'=>'easeOutCirc',
				'easeInOutCirc'=>'easeInOutCirc',
				'easeInElastic'=>'easeInElastic',
				'easeOutElastic'=>'easeOutElastic',
				'easeInOutElastic'=>'easeInOutElastic',
				'easeInBack'=>'easeInBack',
				'easeOutBack'=>'easeOutBack',
				'easeInOutBack'=>'easeInOutBack',
				'easeInBounce'=>'easeInBounce',
				'easeOutBounce'=>'easeOutBounce',
				'easeInOutBounce'=>'easeInOutBounce',
			),
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Use css animation', 'mthemes'),
			'desc' => '',
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'anim_type' => array(
			'type' => 'select',
			'label' => __('CSS animation type', 'mthemes'),
			'desc' => '',
			'options' => $cssAnimationList,
		),
		'anim_delay' => array(
			'type' => 'text',
			'label' => __('Animation delay', 'mthemes'),
			'desc' => __('You can choose to delay css animation here. Put a number here (in milliseconds). Not supported by IE9', 'mthemes'),
			'std' => '',
		),
	),
	'shortcode' => '[mt_piechart number="{{number}}" percent="{{percent}}" trackcolor="{{trackcolor}}" barcolor="{{barcolor}}" linewidth="{{linewidth}}" size="{{size}}" easing="{{easing}}" animated="{{animated}}" anim_type="{{anim_type}}" anim_delay="{{anim_delay}}"][/mt_piechart]',
	'popup_title' => __('Pie chart Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_blog'] = array(
	'no_preview' => true,
	'params' => array(
		'limit' => array(
			'type' => 'text',
			'label' => __('How many items You want to show', 'mthemes'),
			'desc' => __('Use "-1" to show all posts. Works with pagination', 'mthemes'),
			'std' => '-1'
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'Descending order from highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'Ascending order from lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'category' )
		),
		'pagination' => array(
			'type' => 'select',
			'label' => __('Show pagination', 'mthemes'),
			'desc' => __('Choose to show pagination at the bottom of posts (works with "limit" option)', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'layout_type' => array(
			'type' => 'select',
			'label' => __('Layout type', 'mthemes'),
			'desc' => __('Choose layout type', 'mthemes'),
			'options' => array(
				'standard' => 'Standard (can be used with column size)',
				'grid' => 'Grid (uses own column calculation)',
			)
		),
	),
	'shortcode' => '[mt_blog limit="{{limit}}" order="{{order}}" orderby="{{orderby}}" slug="{{slug}}" pagination="{{pagination}}" layout_type="{{layout_type}}"]',
	'popup_title' => __('Blog Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		'limit' => array(
			'type' => 'text',
			'label' => __('Items number', 'mthemes'),
			'desc' => __('How many items You want to show. Use "-1" to show all', 'mthemes'),
			'std' => '-1'
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order Type', 'mthemes'),
			'desc' => __('Designates the ascending or descending order of the "orderby" parameter', 'mthemes'),
			'options' => array(
				'DESC' => 'Descending order from highest to lowest values (3, 2, 1; c, b, a)',
				'ASC' => 'Ascending order from lowest to highest values (1, 2, 3; a, b, c)'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'mthemes'),
			'desc' => __('Choose type of order', 'mthemes'),
			'options' => array(
				'date' => 'Order by date of publication',
				'title' => 'Order by title',
				'author' => 'Order by author name',
				'ID' => 'Order by post ID',
				'rand' => 'Random order'
			)
		),
		'slug' => array(
			'type' => 'multi_select',
			'label' => __('Category', 'mthemes'),
			'desc' => __('Choose category/categories you want to use', 'mthemes'),
			'options' => mt_shortcode_choose_cat( 'portfolio-categories' )
		),
		'filter' => array(
			'type' => 'select',
			'label' => __('Show filter', 'mthemes'),
			'desc' => __('Shows filter with portfolio categories.', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
		'pagination' => array(
			'type' => 'select',
			'label' => __('Show pagination', 'mthemes'),
			'desc' => __('Shows pagination. Works with items number.', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Portfolio size', 'mthemes'),
			'desc' => __('Choose portfolio column size', 'mthemes'),
			'options' => array(
				'2' => '2 columns',
				'3' => '3 columns',
				'4' => '4 columns',
			)
		),
		'images_size' => array(
			'type' => 'select',
			'label' => __('Images size', 'mthemes'),
			'desc' => __('Choose images size', 'mthemes'),
			'options' => array(
				'standard' => 'Standard (560x356px)',
				'masonry' => 'Masonry (560x100%)',
			)
		),
		'layout_type' => array(
			'type' => 'select',
			'label' => __('Layout type', 'mthemes'),
			'desc' => __('Choose layout type', 'mthemes'),
			'options' => array(
				'standard' => 'Standard (can be used with column size)',
				'grid' => 'Grid (uses own column calculation)',
			)
		),
	),
	'shortcode' => '[mt_portfolio limit="{{limit}}" order="{{order}}" orderby="{{orderby}}" slug="{{slug}}" filter="{{filter}}" pagination="{{pagination}}" size="{{size}}" images_size="{{images_size}}" layout_type="{{layout_type}}"]',
	'popup_title' => __('Portfolio Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	Slider: FlexSlider Config
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_flexslider'] = array(
	'no_preview' => true,
	'params' => array(
		'ids' => array(
			'type' => 'text',
			'label' => __('Image IDs', 'mthemes'),
			'desc' => __('Slider image IDs. For example: 11, 32, 45', 'mthemes'),
			'std' => '',
		),
		'caption' => array(
			'type' => 'select',
			'label' => __('Show caption', 'mthemes'),
			'desc' => __('Choose to show slides captions', 'mthemes'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			),
		),
		'animation' => array(
			'type' => 'select',
			'label' => __('Animation type', 'mthemes'),
			'desc' => __('Choose slider animation type', 'mthemes'),
			'options' => array(
				'fade' => 'Fade',
				'slide' => 'Slide',
			),
		),
		'pagination' => array(
			'type' => 'select',
			'label' => __('Show pagination', 'mthemes'),
			'desc' => __('Choose to show slider pagination', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
		),
		'arrows' => array(
			'type' => 'select',
			'label' => __('Show arrows', 'mthemes'),
			'desc' => __('Choose to show slider arrows', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
		),
		'pause' => array(
			'type' => 'select',
			'label' => __('Pause slideshow', 'mthemes'),
			'desc' => __('Pause slideshow when you hover over slide image', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
		),
		'slideshow' => array(
			'type' => 'select',
			'label' => __('Use slideshow', 'mthemes'),
			'desc' => __('Automatically slide between images', 'mthemes'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
		),
		'slideshow_speed' => array(
			'type' => 'text',
			'label' => __('Slideshow speed', 'mthemes'),
			'desc' => __('Choose slideshow speed (in milliseconds)', 'mthemes'),
			'std' => '4000',
		),
	),
	'shortcode' => '[mt_flexslider ids="{{ids}}" caption="{{caption}}" animation="{{animation}}" pagination="{{pagination}}" arrows="{{arrows}}" pause="{{pause}}" slideshow="{{slideshow}}" slideshow_speed="{{slideshow_speed}}"]',
	'popup_title' => __('FlexSlider Shortcode', 'mthemes')
);

/*-----------------------------------------------------------------------------------*/
/*	"Empty" shortcode - only informations here
/*-----------------------------------------------------------------------------------*/

$mthemes_shortcodes['mt_shortcode_clear'] = array(
	'no_preview' => true,
	'params' => array(
		'clear_info' => array(
			'type' => 'info',
			'std' => __('No options available for this shortcode. Use the insert button below', 'mthemes')
		),
		
	),
	'shortcode' => '[mt_clear]',
	'popup_title' => __('Clear Shortcode', 'mthemes')
);

$mthemes_shortcodes['mt_shortcode_portfoliodetails'] = array(
	'no_preview' => true,
	'params' => array(
		'clear_info' => array(
			'type' => 'info',
			'std' => __('No options available for this shortcode. Can be used only on single portfolio page', 'mthemes')
		),
		
	),
	'shortcode' => '[mt_portfolio_details]',
	'popup_title' => __('Portfolio Details Shortcode', 'mthemes')
);

?>