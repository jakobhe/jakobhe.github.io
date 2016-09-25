<?php

/*-----------------------------------------------------------------------------------*/
/*
/*	Solution for empty p and br tags
/*	This is solution accepted by ThemeForest staff
/*  Link to Japhs (Envato Staff) answer: http://themeforest.net/forums/thread/how-to-add-shortcodes-in-wp-themes-without-being-rejected/98804?page=4#996848
/*  Explanation (by bitfade): http://pastie.org/pastes/7122892/text?key=eqptyqa4qdmempics74xsa
/*  Function removed unwanted tags only for shortcodes specific to this plugin. External shortcode not mentioned in the block won't be changed.
/*
/*  Notice: code below can be removed in any time, but be aware that it might brake the layout when unwanted tags will be mixed with block elements
/*
/*-----------------------------------------------------------------------------------*/
function mt_shortcode_formatter($content) {
	// array of custom shortcodes requiring the fix 
	$block = join("|",array(		
		"mt_image",
		"mt_image_vc",
		"mt_lightbox",
		"mt_lightbox_vc",
		"mt_link",
		"mt_button",
		"mt_latest_posts",
		"mt_clients_carousel",
		"mt_client",
		"mt_clients_grid",
		"mt_client_item",
		"mt_team",
		"mt_team_carousel",
		"mt_pricing",
		"mt_service",
		"mt_blockquote",
		"mt_social_icons",
		"mt_social_icon",
		"mt_header",
		"mt_custom_list",
		"mt_alert",
		"mt_code",
		"mt_label",
		"mt_badge",
		"mt_glyphicon",
		"mt_fa_stack",
		"mt_fa",
		"mt_table_wrap",
		"mt_well",		
		"mt_tooltip",
		"mt_popover",
		"mt_panel",
		"mt_progress",
		"mt_emphasis",		
		"mt_clear",
		"mt_accordions",
		"mt_accordion",
		"mt_toggle",
		"mt_tabs",
		"mt_tab",
		"mt_testimonial",
		"mt_testimonial_slider",
		"mt_testimonial_slide",		
		"mt_gmap",
		"mt_gmarker",
		"mt_portfolio",
		"mt_portfolio_carousel",	
		"mt_portfolio_details",
		"mt_youtube",
		"mt_vimeo",
		"mt_milestone",
		"mt_piechart",
		"mt_blog",
		"mt_owlslider",
		"mt_gallery",
		"vc_column_text"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;
}
add_filter("the_content", "mt_shortcode_formatter");

// get_the_content function with formatting for team members
function mt_shortcode_get_the_content_with_formatting () {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// bootstrap shortcodes
add_shortcode('mt_button', 'mt_shortcode_button' );
add_shortcode('mt_alert', 'mt_shortcode_alert' );
add_shortcode('mt_code', 'mt_shortcode_code' );
add_shortcode('mt_label', 'mt_shortcode_label' );
add_shortcode('mt_badge', 'mt_shortcode_badge' );
add_shortcode('mt_glyphicon', 'mt_shortcode_glyphicon' );
add_shortcode('mt_fa_stack', 'mt_shortcode_fastack' );
add_shortcode('mt_fa', 'mt_shortcode_fontawesome' );
add_shortcode('mt_table_wrap', 'mt_shortcode_table_wrap' );
add_shortcode('mt_well', 'mt_shortcode_well' );
add_shortcode('mt_tabs', 'mt_shortcode_tabs' );
add_shortcode('mt_tab', 'mt_shortcode_tab' );
add_shortcode('mt_tooltip', 'mt_shortcode_tooltip' );
add_shortcode('mt_popover', 'mt_shortcode_popover' );
add_shortcode('mt_panel', 'mt_shortcode_panel' );
add_shortcode('mt_progress', 'mt_shortcode_progress' );
add_shortcode('mt_emphasis', 'mt_shortcode_emphasis' );
add_shortcode('mt_custom_list', 'mt_shortcode_customlist' );

// custom shortcodes
add_shortcode('mt_clear', 'mt_shortcode_clear' );
add_shortcode('mt_header', 'mt_shortcode_header' );
add_shortcode('mt_blockquote', 'mt_shortcode_blockquote' );
add_shortcode('mt_image', 'mt_shortcode_image' );
add_shortcode('mt_image_vc', 'mt_shortcode_image_vc' );
add_shortcode('mt_lightbox', 'mt_shortcode_lightbox' );
add_shortcode('mt_lightbox_vc', 'mt_shortcode_lightbox_vc' );
add_shortcode('mt_link', 'mt_shortcode_link' );
add_shortcode('mt_testimonial', 'mt_shortcode_testimonial' );
add_shortcode('mt_testimonial_slider', 'mt_shortcode_testslider' );
add_shortcode('mt_testimonial_slide', 'mt_shortcode_testslide' );
add_shortcode('mt_accordions', 'mt_shortcode_accordions' );
add_shortcode('mt_accordion', 'mt_shortcode_accordion' );
add_shortcode('mt_toggle', 'mt_shortcode_toggle' );
add_shortcode('mt_social_icons', 'mt_shortcode_socialicons' );
add_shortcode('mt_social_icon', 'mt_shortcode_socialicon' );
add_shortcode('mt_service', 'mt_shortcode_service' );
add_shortcode('mt_team', 'mt_shortcode_teammembers' );
add_shortcode('mt_team_carousel', 'mt_shortcode_teamcarousel' );
add_shortcode('mt_pricing', 'mt_shortcode_pricing' );
add_shortcode('mt_gmap', 'mt_shortcode_gmap' );
add_shortcode('mt_gmarker', 'mt_shortcode_gmarker' );
add_shortcode('mt_portfolio_carousel', 'mt_shortcode_portfoliocarousel' );
add_shortcode('mt_portfolio_details', 'mt_shortcode_portfoliodetails' );
add_shortcode('mt_clients_carousel', 'mt_shortcode_clientscarousel' );
add_shortcode('mt_client', 'mt_shortcode_client' );
add_shortcode('mt_clients_grid', 'mt_shortcode_clientsgrid' );
add_shortcode('mt_client_item', 'mt_shortcode_clientgriditem' );
add_shortcode('mt_latest_posts', 'mt_shortcode_latestposts' );
add_shortcode('mt_youtube', 'mt_shortcode_youtube' );
add_shortcode('mt_vimeo', 'mt_shortcode_vimeo' );
add_shortcode('mt_milestone', 'mt_shortcode_milestone' );
add_shortcode('mt_piechart', 'mt_shortcode_piechart');
add_shortcode('mt_blog', 'mt_shortcode_blog');
add_shortcode('mt_portfolio', 'mt_shortcode_portfolio');
add_shortcode('mt_owlslider', 'mt_shortcode_owlslider');
add_shortcode('mt_gallery', 'mt_shortcode_gallery');

/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_button($atts, $content = null) {
		extract(shortcode_atts(array(
			"size" => false,
			"style" => "standard",
			"block" => false,
			"link" => false,
			"target" => false,
			"icon" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
			"xclass" => false,
			"xclass_icon" => false,
		), $atts));

		$return  =  '<a href="';
		$return .= ($link) ? $link : 'javascript:void(0);';
		$return .= '" class="btn btn-default mt-btn-' . $style;
		$return .= ($size) ? ' btn-' . $size : '';
		if($block == "yes") {
			$return .= ' btn-block';
		}
		if(!empty($icon)) {
			$return .= ' with-icon';
		}
		if($animated == 'yes') { $return .=' mt-animated'; }
		$return .= ($xclass) ? ' ' . $xclass : '';
		$return .= '"';
		$return .= ($target) ? ' target="' . $target . '"' : '';
		$return .= ' data-anim-type="'.$anim_type.'"';
		if(!empty($anim_delay)) {
			$return .= ' style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;"';
		}
		$return .= '>' . do_shortcode( $content );
		if(!empty($icon)) {
			$return .= '<i class="'.$icon.' fa-lg';
			$return .= ($xclass_icon) ? ' ' . $xclass_icon : '';
			$return .= '"></i>';
		}		
		$return .= '</a>';	

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Alert
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_alert($atts, $content = null) {
		extract(shortcode_atts(array(
			"type" => "success",
			"dismissable" => "yes",
		), $atts));

		$return = '';
		if($dismissable == "yes") {
			$return .= '<div class="alert alert-' . $type .' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		} else {
			$return .= '<div class="alert alert-' . $type .'">';
		}
		$return .= do_shortcode( $content ) . '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Code
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_code($atts, $content = null) {
		extract(shortcode_atts(array(
			"inline" => "no",
			"scrollable" => "no"
		), $atts));

		$return = '';
		if($inline == "yes") {
			$return .= '<code>' . $content . '</code>';
		} else {
			if($scrollable == "yes") {
				$return .= '<pre class="pre-scrollable">';
			} else {
				$return .= '<pre>';
			}
			$return .= $content . '</pre>';
		}

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Label
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_label( $atts, $content = null ) {
		return '<span class="label label-default">' . do_shortcode( $content ) . '</span>';
	}

/*-----------------------------------------------------------------------------------*/
/*	Badge
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_badge( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"right" => false
		), $atts));

		if($right == "yes") {
			return '<span class="badge pull-right">' . do_shortcode( $content ) . '</span>';
		} else {
			return '<span class="badge">' . do_shortcode( $content ) . '</span>';
		}
	}

/*-----------------------------------------------------------------------------------*/
/*	Glyphicon
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_glyphicon( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"type" => "home",
			"color" => false,
			"size" => "1x",
		), $atts));

		$color = ($color) ? ' style="color:'.$color.'"' : '';
		
		return '<span class="glyphicon glyphicon-' . $type . ' glyphicon-size-' . $size . '"'.$color.'></span>';
	}

/*-----------------------------------------------------------------------------------*/
/*	Font Awesome Stack
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_fastack( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"size" => false,
		), $atts));

		$size = ($size) ? ' fa-'.$size.'"' : '';

		return '<span class="fa-stack'.$size.'">' . do_shortcode( $content ) . '</span>';
	}

/*-----------------------------------------------------------------------------------*/
/*	Font Awesome
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_fontawesome( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"type" => "home",
			"size" => false,
			"fixedwidth" => false,
			"spin" => false,
			"rotate" => false,
			"stack" => false,
			"color" => false,
		), $atts));

		$return  =  '<i class="';
		$return .= ($type) ? '' . $type : 'fa fa-home';
		$return .= ($size) ? ' fa-' . $size : '';
		$return .= ($fixedwidth) ? ' fa-fw' : '';
		$return .= ($spin) ? ' fa-spin' : '';
		$return .= ($rotate) ? ' fa-' . $rotate : '';
		$return .= ($stack) ? ' fa-stack-' . $stack : '';
		$return .= '"';
		$return .= ($color) ? ' style="color:'.$color.'"' : '';
		$return .= '>' . do_shortcode( $content ) . '</i>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Table wrap
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_table_wrap( $atts, $content = null ) {
		extract( shortcode_atts( array(
			"type" => false,
			"responsive" => false,
		), $atts ) );

		if($responsive) {
			return '<div class="mt-table table-responsive ' . $type . '">' . do_shortcode( $content ) . '</div>';
		} else {
			return '<div class="mt-table ' . $type . '">' . do_shortcode( $content ) . '</div>';
		}
	}

/*-----------------------------------------------------------------------------------*/
/*  Well
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_well( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"size" => false
		), $atts));

		if($size) {
			$size = ' well-'.$size;
		}

		return '<div class="well' . $size . '">' . do_shortcode( $content ) . '<div class="clearfix"></div></div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Panel
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_panel( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"title" => false,
			"footer" => false
		), $atts));

		if($title) {
			$title = '<div class="panel-heading"><h3 class="panel-title">' . $title . '</h3></div>';
		}
		if($footer) {
			$footer = '<div class="panel-footer">' . $footer . '</div>';
		}
	
		return '<div class="panel panel-default">' . $title . '<div class="panel-body">' . do_shortcode( $content ) . '</div>' . $footer . '</div>';
	}

/*-----------------------------------------------------------------------------------*/
/*	Progress bar
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_progress($atts, $content = null) {
		extract(shortcode_atts(array(
			"value" => "10",
			"title" => false
		), $atts));

		$return  = '';
		$return .= '<div class="skill-bar-wrapper">'."\n";
		$return .= '<h6 class="skill-header">'.$title.'</h6>'."\n";
		$return .= '<div class="skill-bar">'."\n";		
		$return .= '<span data-width="'.$value.'">'.$value.'%</span>'."\n";
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Tabs wrap
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_tabs( $atts, $content = null ) {

		if( isset($GLOBALS['tamt_count']) )
			$GLOBALS['tamt_count']++;
		else
			$GLOBALS['tamt_count'] = 0;

		extract(shortcode_atts(array(
			"type" => "nav-tabs",
		), $atts));

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		// generate static number to add unique ID
		STATIC $idn = 0;
		$idn++;

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '';

		if( count($tab_titles) ) {
			$output .= '<ul class="tabs-nav nav ' . $type . '" id="custom-tabs-'. $idn .'">';

			$i = 0;
			foreach( $tab_titles as $tab ) {
				if($i == 0)
					$output .= '<li class="active">';
				else
					$output .= '<li>';
					$output .= '<a href="#custom-tab-' . $GLOBALS['tamt_count'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
					$i++;
			}

			$output .= '</ul>';
			$output .= '<div class="tab-content tab-content-' . $type . '">';
			$output .= do_shortcode( $content );
			$output .= '<div class="clearfix"></div></div>';
		} else {
			$output .= do_shortcode( $content );
		}

		return $output;
	}

/*-----------------------------------------------------------------------------------*/
/*  Tab
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_tab( $atts, $content = null ) {

		if( !isset($GLOBALS['current_tabs']) ) {
			$GLOBALS['current_tabs'] = $GLOBALS['tamt_count'];
			$state = 'in active';
		} else {

			if( $GLOBALS['current_tabs'] == $GLOBALS['tamt_count'] ) {
				$state = '';
			} else {
				$GLOBALS['current_tabs'] = $GLOBALS['tamt_count'];
				$state = 'in active';
			}
		}

		$defaults = array( 'title' => 'Tab');
		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="custom-tab-' . $GLOBALS['tamt_count'] . '-'. sanitize_title( $title ) .'" class="tab-pane fade ' . $state . '">'. do_shortcode( $content ) .'</div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Tooltip
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_tooltip( $atts, $content = null ) {

		$defaults = array(
			"title" => "",
			"placement" => "top",
		);
		extract( shortcode_atts( $defaults, $atts ) );

		$return  = '<span data-toggle="tooltip" class="tooltip-shortcode mt-tooltip"';
		$return .= ($placement) ? ' data-placement="' . $placement . '"' : ' data-placement="top"';
		$return .= ($title) ? ' title="' . $title . '"' : '';
		$return .= '>' . do_shortcode( $content ) . '</span>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Popover
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_popover( $atts, $content = null ) {

		$defaults = array(
			"title" => "",
			"popcontent" => "",
			"placement" => "top",			
			"trigger" => false,
		);
		extract( shortcode_atts( $defaults, $atts ) );
		
		// generate static number to add unique ID
		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'-'. $i;

		$return  = '<span data-toggle="popover" class="popover-shortcode mt-tooltip"';
		$return .= ($placement) ? ' data-placement="' . $placement.'"' : ' data-placement="top"';
		$return .= ($trigger) ? ' data-trigger="' . $trigger.'"' : '';
		$return .= ($popcontent) ? ' data-content="' . $popcontent.'"' : '';
		$return .= ($title) ? ' title="' . $title.'"' : '';
		$return .= '>' . do_shortcode( $content ) . '</span>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Emphasis
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_emphasis( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"type" => "muted"
		), $atts));

		return '<span class="text-' . $type . ' mt-emphasis">' . do_shortcode( $content ) . '</span>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Custom List
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_customlist( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"type" => "unstyled",
		), $atts));

		return '<div class="list-' . $type . '">' . do_shortcode( $content ) . '</div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Clear
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_clear( $atts, $content = null ) {
		return '<div class="clearfix"></div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Header
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_header( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"align" => "left",
			"size" => "1"
		), $atts));

		return '<div class="line-header text-'.$align.'"><h'.$size.'>'.do_shortcode($content).'</h'.$size.'><span class="header-sep"></span></div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Blockquote
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_blockquote( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"title" => "",
			"right" => "no"
		), $atts));

		$return ='';
		if($right == 'yes') {
			$return .='<blockquote class="pull-right">';
		} else {
			$return .='<blockquote>';
		}		
		$return .= do_shortcode( $content );
		$return .= ($title) ? '<small><cite title="' . $title . '">' . $title . '</cite></small>' : '';
		$return .='</blockquote>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Image
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_image($atts, $content = null) {
		extract(shortcode_atts(array(
			"src" => false,
			"width" => false,
			"height" => false,
			"style" => false,
			"align" => false,
			"title" => false,
			"alt" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$return  =  '<img src="' . $src . '"';
		$return .= ($width) ? ' width="' . $width . '"' : '';
		$return .= ($height) ? ' height="' . $height . '"' : '';
		$return .= ' class="';
		$return .= ($style) ? 'img-' . $style : '';
		$return .= ($align) ? ' align' . $align : '';
		if($animated == 'yes') { $return .=' mt-animated'; }
		$return .= '"';
		$return .= ($title) ? ' title="' . $title .'"' : '';
		$return .= ($alt) ? ' alt="' . $alt .'"' : '';
		$return .= ' data-anim-type="'.$anim_type.'"';
		if(!empty($anim_delay)) {
			$return .= ' style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;"';
		}
		$return .= ' />';

		return $return;
	}

	function mt_shortcode_image_vc($atts, $content = null) {
		extract(shortcode_atts(array(
			"image" => false,
			"size" => "thumbnail",
			"width" => false,
			"height" => false,
			"style" => false,
			"align" => false,
			"title" => false,
			"alt" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$img = wp_get_attachment_image_src($image, $size);

		$return  =  '<img src="' . $img[0] . '"';
		$return .= ($width) ? ' width="' . $width . '"' : '';
		$return .= ($height) ? ' height="' . $height . '"' : '';
		$return .= ' class="';
		$return .= ($style) ? 'img-' . $style : '';
		$return .= ($align) ? ' align' . $align : '';
		if($animated == 'yes') { $return .=' mt-animated'; }
		$return .= '"';
		$return .= ($title) ? ' title="' . $title .'"' : '';
		$return .= ($alt) ? ' alt="' . $alt .'"' : '';
		$return .= ' data-anim-type="'.$anim_type.'"';
		if(!empty($anim_delay)) {
			$return .= ' style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;"';
		}
		$return .= ' />';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Lightbox
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_lightbox($atts, $content = null) {
		extract(shortcode_atts(array(
			"thumb" => false,
			"url" => false,
			"width" => false,
			"height" => false,
			"style" => false,
			"align" => false,
			"title" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$return  = '';
		$return .= '<div class="lightbox-image';
		$return .= ($align) ? ' align' . $align : '';
		if($animated == 'yes') { $return .=' mt-animated'; }
		$return .= '" data-anim-type="'.$anim_type.'"';
		$return .= ' style="';
		$return .= ($width) ? 'width:' . $width . 'px;' : '';
		$return .= ($height) ? 'height:' . $height . 'px;' : '';
		if(!empty($anim_delay)) {
			$return .= ' animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;';
		}
		$return .= '">';
		$return .= '<div class="lightbox-overlay">';
		$return .= '<a class="image-lightbox" href="' . $url .'" title="' . $title .'">';		
		$return .= '<img src="' . $thumb . '"';
		$return .= ($style) ? ' class="img-' . $style .'"' : '';
		$return .= ($title) ? ' alt="' . $title .'"' : '';
		$return .= ' />';
		$return .= '<div class="overlay-wrapper img-' . $style .'">';
		$return .= '<div class="overlay-content">';
		$return .= '<span class="gal-hover-icon"></span>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</a>';
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

	function mt_shortcode_lightbox_vc($atts, $content = null) {
		extract(shortcode_atts(array(
			"type" => "image",
			"thumb" => false,
			"thumb_size" => "thumbnail",
			"url" => false,
			"width" => false,
			"height" => false,
			"style" => false,
			"align" => false,
			"title" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$img = wp_get_attachment_image_src($thumb, $thumb_size);
		$img_full = wp_get_attachment_image_src($thumb, 'full');

		$return  = '';
		$return .= '<div class="lightbox-image';
		$return .= ($align) ? ' align' . $align : '';
		if($animated == 'yes') { $return .=' mt-animated'; }
		$return .= '" data-anim-type="'.$anim_type.'"';
		$return .= ' style="';
		$return .= ($width) ? 'width:' . $width . 'px;' : '';
		$return .= ($height) ? 'height:' . $height . 'px;' : '';
		if(!empty($anim_delay)) {
			$return .= ' animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;';
		}
		$return .= '">';
		$return .= '<div class="lightbox-overlay">';
		if($type == 'image') {
			$return .= '<a class="image-lightbox" href="' . $img_full[0] .'" title="' . $title .'">';
		} else {
			$return .= '<a class="image-lightbox" href="' . $url .'" title="' . $title .'">';
		}		
		$return .= '<img src="' . $img[0] . '"';
		$return .= ($style) ? ' class="img-' . $style .'"' : '';
		$return .= ($title) ? ' alt="' . $title .'"' : '';
		$return .= ' />';
		$return .= '<div class="overlay-wrapper img-' . $style .'">';
		$return .= '<div class="overlay-content">';
		$return .= '<span class="gal-hover-icon"></span>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</a>';
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Link
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_link($atts, $content = null) {
		extract(shortcode_atts(array(
			"url" => false,
			"target" => false,
			"paddingtop" => "40px",
			"paddingbottom" => "40px",
			"color" => "standard",
			// "fontsize" => "20px",
			// "texttransform" => "none",
			// "fontweight" => "normal",
		), $atts));

		$return  = '';
		$return .= '<div class="mt_link mt_color_'.$color.'">';
		$return .= '<a href="'.$url.'" target="'.$target.'" style="padding-top: '.$paddingtop.'; padding-bottom: '.$paddingbottom.';">';
		$return .= do_shortcode( $content );
		$return .= '</a>';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_testimonial($atts, $content = null) {
		extract(shortcode_atts(array(
			"author" => false,
			"company" => false,
			"thumb" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$img = wp_get_attachment_image_src($thumb, 'latest-widget');

		$return = '';
		if( !empty($thumb) ) {
			if( $animated == "yes" ) {
				if(!empty($anim_delay)) {
					$return .= '<div class="testimonial with-thumb mt-animated clearfix" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
				} else {
					$return .= '<div class="testimonial with-thumb mt-animated clearfix" data-anim-type="' . $anim_type . '">';
				}
			} else {
				$return .= '<div class="testimonial with-thumb clearfix">';
			}
		} else {
			if( $animated == "yes" ) {
				if(!empty($anim_delay)) {
					$return .= '<div class="testimonial mt-animated clearfix" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
				} else {
					$return .= '<div class="testimonial mt-animated clearfix" data-anim-type="' . $anim_type . '">';
				}
			} else {
				$return .= '<div class="testimonial clearfix">';
			}
		}

		$return .= '<div class="testimonial-text">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		if( !empty($thumb) ) {
			$return .= '<img class="testimonial-thumb" src="'.$img[0].'" alt="'.$author.'" />';
		}
		$return .= '<h6>' . $author . '</h6>';
		if( !empty($company) ) {
			$return .= '<span class="testimonial-company">'.$company.'</span>';
		}
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Testimonial slider
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_testslider($atts, $content = null) {
		extract(shortcode_atts(array(
			"style" => "default-left",
			"controls" => "no",
		), $atts));

		// enqueue script
		wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);
		
		$return  = '';
		$return .= '<div class="testimonial-carousel testimonial-carousel-'.$style.' owl-controls-'.$controls.' clearfix">';
		$return .= '<div class="owl-testimonial">';
		$return .= do_shortcode( $content );
		$return .= '</div>';
		$return .= '</div>';
		$return .= '<div class="clearfix"></div>';

		return $return;
	}

	function mt_shortcode_testslide($atts, $content = null) {
		extract(shortcode_atts(array(
			"author" => false,
			"company" => false,
			"thumb" => false,
		), $atts));

		$img = wp_get_attachment_image_src($thumb, 'latest-widget');

		$return = '';
		if( !empty($thumb) ) {
			$return .= '<div class="testimonial with-thumb clearfix">';
		} else {
			$return .= '<div class="testimonial clearfix">';
		}		
		$return .= '<div class="testimonial-text">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		if( !empty($thumb) ) {
			$return .= '<img class="testimonial-thumb" src="'.$img[0].'" alt="'.$author.'" />';
		}
		$return .= '<h6>' . $author . '</h6>';
		if( !empty($company) ) {
			$return .= '<span class="testimonial-company">'.$company.'</span>';
		}
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Accordions
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_accordions($atts, $content = null) {
		extract(shortcode_atts(array(
			"style" => "standard",
		), $atts));

		wp_enqueue_script( 'jquery-ui-accordion' );
		$GLOBALS["section_count"] = 0;
		// Get the content
		do_shortcode($content);
		// Generate output
		if (is_array( $GLOBALS["sections"] )) {
			foreach ($GLOBALS["sections"] as $section) {
				$panes[] = '<h3><a href="#'. str_replace(" ", "-", strtolower($section["name"])) .'">'. $section["name"] .'</a></h3>
				<div id="'. str_replace(" ", "-", strtolower($section["name"])) .'">
					'. do_shortcode($section["content"]) .'
				</div>';
			}
		}
		$return = '<div id="mt-accordions-'. rand(1, 100) .'" class="mt-accordion mt-'.$style.'"">'. implode("", $panes) .'</div>';
		return $return;
	}

	function mt_shortcode_accordion($atts, $content = null) {
		extract(shortcode_atts(array(
			"name" => "Section name"
		), $atts));

		$x = $GLOBALS["section_count"];
			$GLOBALS["sections"][$x] = array(
				"name" => sprintf( $name, $GLOBALS["section_count"] ),
				"content" => $content
			);
		$GLOBALS["section_count"] += 1;
	}

/*-----------------------------------------------------------------------------------*/
/*	Toggle
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_toggle( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title' => 'Title goes here',
			'style' => 'standard',
			'margin' => false
		), $atts));

		STATIC $i = 0;
		$i++;

		if($margin == 'yes') {
			$margin = 'm20';
		} else {
			$margin = '';
		}

		$return  = '';
		$return .= '<div class="mt-toggle '.$margin.' mt-toggle-'.$i.' mt-'.$style.'">';
		$return .= '<span class="mt-toggle-title"><span class="ui-icon"></span>'. $title .'</span>';		
		$return .= '<div class="mt-toggle-inner closed clearfix">';
		$return .= do_shortcode($content);
		$return .= '</div></div>';

		return $return;

	}

/*-----------------------------------------------------------------------------------*/
/*	Social icons
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_socialicons($atts, $content = null) {

		$return  = '<div class="socials clearfix">';
		$return .= '<ul>';
		$return .= do_shortcode($content);
		$return .= '</ul>';
		$return .= '</div>';

		return $return;
	}

	function mt_shortcode_socialicon($atts, $content = null) {
		extract(shortcode_atts(array(
			"icontype" => false,
			"icontitle" => false,
			"url" => false,
		), $atts));

		$return  = '<li class="socialicon">';
		$return .= '<a class="socialtooltip social-' . $icontype . '" href="' . $url . '" target="_blank"';
		$return .= ($icontitle) ? ' title="' . $icontitle . '"' : ' title="' . $icontype . '"';
		$return .= '>';
		$return .= '<i class="fa fa-' . $icontype . '"></i>';
		$return .= '<span class="icon-anim"></span>';
		$return .= '</a>';
		$return .= '</li>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Service
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_service($atts, $content = null) {
		extract(shortcode_atts(array(
			"style" => false,
			"title" => false,
			"icon" => false,
			"url" => false,
			"target" => false,
			"margin" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$return = '';
		if( $animated == "yes" ) {			
			if(!empty($anim_delay)) {
				$return .= '<div class="service-wrapper service-' . $style . ' mt-animated clearfix" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
			} else {
				$return .= '<div class="service-wrapper service-' . $style . ' mt-animated clearfix" data-anim-type="' . $anim_type . '">';
			}
		} else {
			$return .= '<div class="service-wrapper service-' . $style . ' clearfix">';
		}
		$return .= '<div class="service ' . $margin . '-margin ">';
		$return .= ($icon) ? '<div class="service-icon"><i class="' . $icon . '"></i></div>' : '';
		if( !empty($url) ) {
			$return .= ($title) ? '<h4><a target="' . $target . '" href="' . $url . '">' . $title . '</a></h4>' : '';
		} else {
			$return .= ($title) ? '<h4>' . $title . '</h4>' : '';
		}		
		$return .= do_shortcode($content);
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Team members
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_teammembers($atts, $content = null) {
		extract(shortcode_atts(array(
			"postid" => false,
			"slug" => false,
			"limit" => false,
			"size" => false,
			"order" => "DESC",
			"orderby" => "date",
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		// Creating custom query to fetch the post type custom post.
		$team_loop = new WP_Query(array(
			"post_type" => "teammembers",
			"posts_per_page" => $limit,
			"p" => $postid,
			"order" => $order,
			"orderby" => $orderby,
			"teammembers-categories" => $slug,
		));		

		$return = '';
		$return .= '<div class="row">';

		// Looping through the posts and building the HTML structure.
		if($team_loop) {
			while ($team_loop->have_posts()){
				$team_loop->the_post();

				$teamid = get_the_ID();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id() ,'blog-grid', true );
				$team_social_icons = html_entity_decode(get_post_meta( get_the_ID(), '_mt_team_social_icons', true));
				$team_description = get_post_meta( get_the_ID(), '_mt_team_description', true);
				$team_link = get_post_meta( get_the_ID(), '_mt_team_link_custom', true);
				$team_position = get_post_meta( get_the_ID(), '_mt_team_position', true);
				
				if( $animated == "yes" ) {
					if(!empty($anim_delay)) {
						$return .= '<div class="team-member col-md-' . $size . ' mt-animated clearfix" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
					} else {
						$return .= '<div class="team-member col-md-' . $size . ' mt-animated clearfix" data-anim-type="' . $anim_type . '">';
					}
				} else {
					$return .= '<div class="team-member col-md-' . $size . ' clearfix">';
				}	

					$return .= '<div class="image-overlay team-overlay">';
						$return .= '<div class="team-member-thumb">';
							if (has_post_thumbnail()) {
								$return .= '<img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" alt="' . get_the_title() .'" />';
							} else {
								$return .= '<img src="' . get_template_directory_uri() . '/images/team-empty.png" alt="' . get_the_title() .'" />';
							}
						$return .= '</div>';// END team-member-thumb
						$return .= '<div class="overlay-wrapper">';
							$return .= '<div class="overlay-content">';
								$return .= '<div class="team-member-text">';
									if($team_description == 'custom') {
										if ( !empty($team_link) ) {
										$return .= '<h4><a target="_blank" href="' . $team_link . '">' . get_the_title() . '</a></h4>';
										}
									} else {
										$return .= '<h4><a target="_blank" href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
									}
									
									if ( !empty($team_position) ) {
										$return .= '<span class="position">'. $team_position .'</span>';
									}
								$return .= '</div><div class="clearfix"></div>'; // END team-member-text
								$return .= '<div class="team-member-socials clearfix">';
									$return .= do_shortcode($team_social_icons);
								$return .= '</div>'; // END team-member-socials
							$return .= '</div>';
						$return .= '</div>';
					$return .= '</div>';

				$return .= '</div>'; // END team-member				
				
			}
		}

		$return .= '</div>'; // END row

		wp_reset_query();

		// Now we are returning the HTML code back to the place from where the shortcode was called.
		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Team members carousel
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_teamcarousel($atts, $content = null) {
		extract(shortcode_atts(array(
			"columns" => "3",
			"controls" => "no",
			"limit" => "3",
			"order" => "DESC",
			"orderby" => "date",
			"slug" => "",
		), $atts));

		// enqueue script
		wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);

		// Creating custom query to fetch the post type custom post.
		$team_loop = new WP_Query(array(
			"post_type" => "teammembers",
			"posts_per_page" => $limit,
			"order" => $order,
			"orderby" => $orderby,
			"teammembers-categories" => $slug,
		));
		
		$return  = '';
		$return .= '<div class="team-carousel owl-controls-'.$controls.' clearfix">';
		$return .= '<div class="owl-team columns'.$columns.'">';

		// Looping through the posts and building the HTML structure.
		if($team_loop) {
			while ($team_loop->have_posts()) {
				$team_loop->the_post();

				$teamid = get_the_ID();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id() ,'blog-grid', true );
				$team_social_icons = html_entity_decode(get_post_meta( get_the_ID(), '_mt_team_social_icons', true));
				$team_description = get_post_meta( get_the_ID(), '_mt_team_description', true);
				$team_link = get_post_meta( get_the_ID(), '_mt_team_link_custom', true);
				$team_position = get_post_meta( get_the_ID(), '_mt_team_position', true);

				$return .= '<div class="team-member">';
					$return .= '<div class="image-overlay team-overlay">';
						$return .= '<div class="team-member-thumb">';
							if (has_post_thumbnail()) {
								$return .= '<img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" alt="' . get_the_title() .'" />';
							} else {
								$return .= '<img src="' . get_template_directory_uri() . '/images/team-empty.png" alt="' . get_the_title() .'" />';
							}
						$return .= '</div>';// END team-member-thumb
						$return .= '<div class="overlay-wrapper">';
							$return .= '<div class="overlay-content">';
								$return .= '<div class="team-member-text">';
									if($team_description == 'custom') {
										if ( !empty($team_link) ) {
										$return .= '<h4><a target="_blank" href="' . $team_link . '">' . get_the_title() . '</a></h4>';
										}
									} else {
										$return .= '<h4><a target="_blank" href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
									}
									
									if ( !empty($team_position) ) {
										$return .= '<span class="position">'. $team_position .'</span>';
									}
								$return .= '</div><div class="clearfix"></div>'; // END team-member-text
								$return .= '<div class="team-member-socials clearfix">';
									$return .= do_shortcode($team_social_icons);
								$return .= '</div>'; // END team-member-socials
							$return .= '</div>';
						$return .= '</div>';
					$return .= '</div>';	
				$return .= '</div>'; // END team-member
				
			}
		}

		wp_reset_query();

		$return .= '</div>';	
		$return .= '</div>'; // END team-carousel

		wp_reset_query();

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Pricing
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_pricing($atts, $content = null) {
		extract(shortcode_atts(array(
			"title"	=> "Title",
			"value"	=> "$19",
			"span"=> false,
			"url" => false,
			"button_text" => "Purchase"
		), $atts));

		$return  = '<div class="pt-column">';
		$return .= ($title) ? '<h3>'.$title.'</h3>' : '';
		$return .= '<div class="pt-cost"><p>'.$value;
		$return .= ($span) ? '<span>'.$span.'</span>' : '';
		$return .= '</p></div>';
		$return .= '<div class="pt-features">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		$return .= ($url) ? '<div class="pt-buynow"><a href="'.$url.'" class="btn btn-default mt-btn-empty-dark">'.$button_text.'</a></div>' : '';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Google map
/*-----------------------------------------------------------------------------------*/
	
	function mt_shortcode_gmap($atts, $content = null) {
		extract(shortcode_atts(array(
			"width" => "640",
			"height" => "480",
			"zoom" => "12",
			"maptype" => "ROADMAP",
			"scrollwheel" => "no",
		), $atts));

		// enqueue script
		wp_enqueue_script('mt-mapsensor', 'http://maps.google.com/maps/api/js?sensor=false', 'jquery', '',true);
		wp_enqueue_script('mt-gomap', get_template_directory_uri() . '/js/jquery.gomap.js', 'jquery', '',true);

		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'-'. $i;

		if($scrollwheel == 'yes') {
			$scrollwheel = 'true';
		} else {
			$scrollwheel = 'false';
		}

		$return  = '<div id="map-canvas-'.$rand.'" class="googlemap" style="width: '.$width.'px; max-width:100%; height: '.$height.'px;"></div>';
		$return .= '
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$("#map-canvas-'.$rand.'").goMap({ 
						markers: ['.do_shortcode($content).'],
						zoom: '.$zoom.',
						icon: "'.get_template_directory_uri().'/images/map-marker.png",
						maptype: "'.$maptype.'",
						scrollwheel: '.$scrollwheel.',
						hideByClick: true, 
						oneInfoWindow: false,
					}); 
				}); 
			</script>';

		return $return;
	}

	function mt_shortcode_gmarker($atts, $content = null) {
		extract(shortcode_atts(array(
			"type" => "address",
			"address" => false,
			"icon" => false,
			"popup" => false,
			"latitude" => false, 
            "longitude" => false, 
		), $atts));
		
		if($popup == 'yes') {
			$popup = 'true';
		} else {
			$popup = 'false';
		}

		$img = wp_get_attachment_image_src($icon, 'full');

		$return  = '';
		$return .= '{';
			if ($type == 'address') {
				$return .= 'address: "'.$address.'",';
			} else {
				$return .= 'latitude: '.$latitude.',';
            	$return .= 'longitude: '.$longitude.',';
			}			
			$return .= 'title: "'.$address.'",';
			if (!empty($content)) {
				$return .= 'html: {';
					$return .= 'content: unescape("'.rawurlencode(do_shortcode($content)).'"),';
					$return .= 'popup: '.$popup;
				$return .= '},';
			}
			if (!empty($icon)) {
				$return .= 'icon: "'.$img[0].'",';
			}		
		$return .= '},';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Portfolio carousel
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_portfoliocarousel($atts, $content = null) {
		extract(shortcode_atts(array(
			"columns" => "3",
			"controls" => "no",
			"gaps" => "no",
			"limit" => "3",
			"order" => "DESC",
			"orderby" => "date",
			"slug" => "",
		), $atts));

		// enqueue script
		wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);

		// Creating custom query to fetch the post type custom post.
		$portfolio_loop = new WP_Query(array(
			"post_type" => "portfolio",
			"posts_per_page" => $limit,
			"order" => $order,
			"orderby" => $orderby,
			"portfolio-categories" => $slug,
		));
		
		$return  = '';
		if($gaps == 'yes') {
			$return .= '<div class="portfolio-carousel mt-animated owl-controls-'.$controls.' row clearfix" data-anim-type="fadeInUp">';
		} else {
			$return .= '<div class="portfolio-carousel mt-animated owl-controls-'.$controls.' clearfix" data-anim-type="fadeInUp">';
		}		
		$return .= '<div class="owl-portfolio owl-gaps-'.$gaps.' columns'.$columns.'">';
		// Looping through the posts and building the HTML structure.
		if($portfolio_loop) {
			while ($portfolio_loop->have_posts()) {
				$portfolio_loop->the_post();

				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id() ,'portfolio-thumb', true );
				$full_image = wp_get_attachment_image_src( get_post_thumbnail_id() ,'full', true );

				$return .= '<div class="portfolio-item" id="portfolio-carousel-'.get_the_ID().'">';
					$return .= '<div class="image-overlay project-overlay">';
						$return .= '<div class="portfolio-item-top">';
							if ( has_post_thumbnail() ) {
								$return .= '<img src="' . $thumb[0] . '" width="' . $thumb[1] . '" height="' . $thumb[2] . '" alt="' . get_the_title() . '" />';
							} else {
								$return .= '<img src="' . get_template_directory_uri() . '/images/portfolio-empty.png" />';
							}
						$return .= '</div>'; // END portfolio-item-top
						$return .= '<div class="overlay-wrapper">';
							$return .= '<div class="overlay-content">';
								$return .= '<h5>' . get_the_title() . '</h5>';
								$return .= '<span>' . get_the_term_list(get_the_ID(), 'portfolio-categories', '', ', ', '') . '</span>';
								$return .= '<div class="clearfix"></div>';
								$return .= '<a class="image-lightbox mt-opil" href="' . $full_image[0] . '" title="' . get_the_title() . '"><i class="glyphicon glyphicon-search"></i></a>';
								$return .= '<a class="mt-opip" href="' . get_permalink() . '"><i class="glyphicon glyphicon-share-alt"></i></a>';
							$return .= '</div>'; // END overlay-content
						$return .= '</div>'; // END overlay-wrapper
					$return .= '</div>'; // END image-overlay
				$return .= '</div>'; // END portfolio-carousel
			}
		}

		wp_reset_query();

		$return .= '</div>';
		$return .= '</div>'; // END portfolio-carousel

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Portfolio details
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_portfoliodetails( $atts, $content = null ) {
		if(function_exists('mt_portfolio_details')) {
			ob_start();
				mt_portfolio_details();
			$return = ob_get_contents();
			ob_end_clean();

			return $return;
		}		
	}

/*-----------------------------------------------------------------------------------*/
/*	Clients carousel
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_clientscarousel($atts, $content = null) {
		extract(shortcode_atts(array(
			"columns" => "3",
			"controls" => "no"
		), $atts));

		// enqueue script
		wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);
		
		$return  = '';
		$return .= '<div class="clients-carousel owl-controls-'.$controls.' clearfix">';
		$return .= '<div class="owl-clients columns'.$columns.'">';
		$return .= do_shortcode( $content );
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

	function mt_shortcode_client($atts, $content = null) {
		extract(shortcode_atts(array(
			"thumb" => false,
			"url" => false,
		), $atts));

		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'-'. $i;

		$img = wp_get_attachment_image_src($thumb, 'full');
		$img_meta = wp_prepare_attachment_for_js($thumb);
		
		$return  = '<div class="client-item" id="client-item-'.$rand.'">';
		$return .= ($url) ? '<a class="tooltip-shortcode" href="' . $url . '" target="_blank" data-toggle="tooltip" data-placement="top" title="' . do_shortcode($img_meta['caption']) . '">' : '';
		$return .= '<img src="' . $img[0].'" alt="' . do_shortcode($img_meta['caption']) . '" />';
		$return .= ($url) ? '</a>' : '';
		$return .= '</div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Clients grid carousel
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_clientsgrid($atts, $content = null) {
		extract(shortcode_atts(array(
			"columns" => "3",
		), $atts));
		
		$return  = '';
		$return .= '<div class="clients-grid-wrapper clearfix">';
		$return .= '<div class="clients-grid columns'.$columns.'">';
		$return .= do_shortcode( $content );
		$return .= '</div>';
		$return .= '</div>';

		return $return;
	}

	function mt_shortcode_clientgriditem($atts, $content = null) {
		extract(shortcode_atts(array(
			"thumb" => false,
			"url" => false,
		), $atts));

		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'-'. $i;

		$img = wp_get_attachment_image_src($thumb, 'full');
		$img_meta = wp_prepare_attachment_for_js($thumb);
		
		$return  = '<div class="client-grid-item" id="client-grid-item-'.$rand.'"><div class="client-grid-inner">';
		$return .= ($url) ? '<a href="' . $url . '" target="_blank">' : '';
		$return .= '<img src="' . $img[0].'" alt="' . do_shortcode($img_meta['caption']) . '" title="' . do_shortcode($img_meta['caption']) . '" />';
		$return .= ($url) ? '</a>' : '';
		$return .= '</div></div>';

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Latest posts
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_latestposts($atts, $content = null) {
		extract(shortcode_atts(array(
			"limit" => "3",
			"order" => "DESC",
			"orderby" => "date",
			"slug" => "",
		), $atts));		

		// Creating custom query to fetch the post type custom post.
		$posts_loop = new WP_Query(array(
			"post_type" => "post",
			"posts_per_page" => $limit,
			"order" => $order,
			"orderby" => $orderby,
			"category_name" => $slug,
		));
		
		$return  = '';
		$return .= '<div class="latest-posts clearfix">';
		$return .= '<ul class="clearfix">';

		// Looping through the posts and building the HTML structure.
		if($posts_loop) {
			while ($posts_loop->have_posts()) {
				$posts_loop->the_post();

				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id() ,'latest-posts', true );
				$full_image = wp_get_attachment_image_src( get_post_thumbnail_id() ,'full', true );
				$post_custom_url = get_post_meta( get_the_ID(), '_mt_post_format_link_url', true);		

				$return .= '<li class="post-item" id="post-item-'.get_the_ID().'">';

				$return .= '<div class="row">';

					$return .= '<div class="col-sm-8 post-title">';					
						// post icon
						$return .= '<div class="post-icon">';					
						if ( 'aside' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-file"></i>'; }
						elseif ( 'audio' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-headphones"></i>'; }
						elseif ( 'gallery' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-picture-o"></i>'; }
						elseif ( 'link' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-link"></i>'; }
						elseif ( 'quote' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-quote-right"></i>'; }
						elseif ( 'video' == get_post_format() ) { $return .= '<i class="fa fa-fw fa-film"></i>'; }
						else { $return .= '<i class="fa fa-fw fa-file-text"></i>'; }
						$return .= '</div>';
						// END post icon

						// post title
						if ( 'link' == get_post_format() ) {
							$return .= '<h4><a target="_blank" href="' . $post_custom_url . '">'.get_the_title().'</a></h4>';
						} else {
							$return .= '<h4><a href="' . get_permalink() . '">'.get_the_title().'</a></h4>';
						}						
						$return .= '<div class="clearfix"></div>';
						// END title
					$return .= '</div>';
					// END col-sm-8

					$return .= '<div class="col-xs-6 col-sm-2 post-date">';
						// post date
						$return .= '<span>'.get_the_date().'</span>';
						$return .= '<div class="clearfix"></div>';
						// END date
					$return .= '</div>';
					// END col-sm-2

					$return .= '<div class="col-xs-6 col-sm-2 post-comments">';
						// post comments
						$return .= '<span>'.get_comments_number().' ' . __('comments', 'mthemes') . '</span>';
						$return .= '<div class="clearfix"></div>';
						// END comments
					$return .= '</div>';
					// END col-sm-2
				
				$return .= '</div>'; // END row
				$return .= '</li>'; // END post-item
			}
		}

		wp_reset_query();

		$return .= '</ul>';
		$return .= '</div>'; // END latest posts

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  YouTube video
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_youtube($atts, $content = null) {
		extract(shortcode_atts(array(
			'id' => '',
			'width' => 600,
			'height' => 360,
			'autoplay' => 'no'
		), $atts));

		if($autoplay == 'yes') {
			$autoplay = '&amp;autoplay=1';
		} else {
			$autoplay = '';
		}

		return '<div style="max-width:' . $width . 'px;max-height:' . $height . 'px;"><iframe title="YouTube video player" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent' . $autoplay . '" frameborder="0" allowfullscreen></iframe></div>';

	}

/*-----------------------------------------------------------------------------------*/
/*  Vimeo video
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_vimeo($atts, $content = null) {
		extract(shortcode_atts(array(
			'id' => '',
			'width' => 600,
			'height' => 360,
			'autoplay' => 'no'
		), $atts));

		$protocol = (is_ssl())? 's' : '';

		if($autoplay == 'yes') {
			$autoplay = '?autoplay=1';
		} else {
			$autoplay = '';
		}

		return '<div style="max-width:' . $width . 'px;max-height:' . $height . 'px;"><iframe src="http' . $protocol . '://player.vimeo.com/video/' . $id . '' . $autoplay . '" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe></div>';
	}

/*-----------------------------------------------------------------------------------*/
/*  Milestone
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_milestone($atts, $content = null) {
		extract(shortcode_atts(array(
			"number" => false,
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$return = '';
		if($animated == 'yes') {
			if(!empty($anim_delay)) {
				$return .= '<div class="milestone-wrapper mt-animated" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
			} else {
				$return .= '<div class="milestone-wrapper mt-animated" data-anim-type="' . $anim_type . '">';
			}
		} else {
			$return .= '<div class="milestone-wrapper">';
		}
		$return .= '<div class="milestone-number">' . $number . '</div>';
		$return .= '<div class="milestone-sep"></div>';
		$return .= '<div class="milestone-title"><h4>' . do_shortcode($content) . '</h4></div>';
		$return .= '</div>'; // END milestone-wrapper

		return $return;
	}

/*-----------------------------------------------------------------------------------*/
/*  Pie chart
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_piechart($atts, $content = null) {
		extract(shortcode_atts(array(
			'number' => '50',
			'percent' => 'yes',
			'trackcolor' => '#f2f2f2',
			'barcolor' => '#4AE2BC',
			'linewidth' => '4',
			'size' => '140',
			'title' => 'counter',
			'easing' => 'easeOutQuart',
			"animated" => false,
			"anim_type" => false,
			"anim_delay" => false,
		), $atts));

		$return = '';
		if($animated == 'yes') {
			if(!empty($anim_delay)) {
				$return .= '<div class="piechart-wrapper mt-animated" data-anim-type="' . $anim_type . '" style="animation-delay: '.$anim_delay.'ms; -moz-animation-delay: '.$anim_delay.'ms; -webkit-animation-delay: '.$anim_delay.'ms;">';
			} else {
				$return .= '<div class="piechart-wrapper mt-animated" data-anim-type="' . $anim_type . '">';
			}
		} else {
			$return .= '<div class="piechart-wrapper">';
		}		
		$return .= '<span class="piechart" style="width: '.$size.'px; height: '.$size.'px; line-height: '.$size.'px;"';
		$return .= ' data-percent="'.$number.'"';
		$return .= ' data-track-color="'.$trackcolor.'"';
		$return .= ' data-bar-color="'.$barcolor.'"';
		$return .= ' data-line-width="'.$linewidth.'"';
		$return .= ' data-size="'.$size.'"';
		$return .= ' data-easing="'.$easing.'"';
		$return .= '>';
		if($title == 'counter') {
			$return .= '<span class="number"></span>';
			if($percent == 'yes') {	$return .= '%';	}
		} else {
			$return .= do_shortcode($content);
		}	
		$return .= '</span>';
		$return .= '</div>';

		return $return;

	}

/*-----------------------------------------------------------------------------------*/
/*	Blog
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_blog($atts, $content = null) {
		extract(shortcode_atts(array(
			"limit" => "-1",
			"order" => "DESC",
			"orderby" => "date",
			"slug" => "",
			"pagination" => "yes",
			"layout_type" => "standard",
		), $atts));		

		// Creating custom query to fetch the post type custom post.
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$blog_loop = new WP_Query(array(
			"post_type" => "post",
			"posts_per_page" => $limit,
			"paged" => $paged,
			"order" => $order,
			"orderby" => $orderby,
			"category_name" => $slug,
		));

		ob_start();

		if ($layout_type == 'grid') {
			wp_enqueue_script('mt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '',true);
			wp_enqueue_script('mt-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '',true);
			wp_enqueue_script('mt-isotopeblog', get_template_directory_uri() . '/js/jquery.isotope-blog.js', 'jquery', '',true);
		}		

		?>
		
		<div class="mt-blog row clearfix <?php echo $layout_type; ?>">
		<div class="grid-sizer"></div>

		<?php
			if($blog_loop->have_posts()) :
				while($blog_loop->have_posts()) : $blog_loop->the_post();
		?>

			<!-- BEGIN .post -->
			<?php

			if ($layout_type == 'grid') {
				if(get_post_format()) {
					get_template_part( 'includes/format-grid/' . get_post_format() );
				} else {
					get_template_part( 'includes/format-grid/standard' );
				}
			} else {
				if(get_post_format()) {
					get_template_part( 'includes/format/' . get_post_format() );
				} else {
					get_template_part( 'includes/format/standard' );
				}
			}
				
			?>
			<!-- END .post -->

		<?php endwhile; ?>		

		</div><!-- END blog -->

		<?php

		// pagination
		if ($pagination == 'yes') {
			if ($layout_type == 'grid') { ?>
				<div class="blog-grid-pagination"><?php mt_pagination($blog_loop->max_num_pages, $range = 2); ?></div>
			<?php } else {
				mt_pagination($blog_loop->max_num_pages, $range = 2);
			}			
		}

		endif; // END if

		wp_reset_query();

		$blog_markup = ob_get_contents();
	
		ob_end_clean();
		
		return $blog_markup;
	}


/*-----------------------------------------------------------------------------------*/
/*  Portfolio
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_portfolio($atts, $content = null) {
		extract(shortcode_atts(array(
			"limit" => "-1",
			"order" => "DESC",
			"orderby" => "date",
			"filter" => "no",
			"pagination" => "no",
			"slug" => "",
			"size" => "3",
			"images_size" => "standard",
			"layout_type" => "standard",
		), $atts));

		ob_start();

		wp_enqueue_script('mt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '',true);
		wp_enqueue_script('mt-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '',true);
		wp_enqueue_script('mt-isotopeportfolio', get_template_directory_uri() . '/js/jquery.isotope-portfolio.js', 'jquery', '',true);

		if ($filter == 'yes') {			
		
			$terms_obj = array();
			
			//prepare terms obj
			if(!empty($slug)) {

				// explode slugs
				$selected_terms = explode(',', $slug);

				// get each slug
				foreach($selected_terms as $term) {
				
					// get terms id by slug
					$term_obj = get_term_by( 'slug', $term, 'portfolio-categories');
					
					$children = get_categories(array(
						'type'			=> 'portfolio',
						'taxonomy'		=> 'portfolio-categories',
						'order'			=> $order,
						'orderby'		=> $orderby,
						'parent'		=> $term,
					));
					
					if(count($children) > 0) {
						foreach($children as $child) {
							$terms_obj[$child->term_slug] = get_term_by( 'slug', $child->term_slug, 'portfolio-categories');
						}
					} else {
						$terms_obj[$term] = get_term_by( 'slug', $term, 'portfolio-categories');
					}
					
				}

			}

			// list all terms for the filter if there are 2 or more included
			if(count($terms_obj) > 1) {
				echo '<ul class="portfolio-filters container clearfix '.$layout_type.'">';
				echo '<li class="current"><a class="filter-show-all" href="#" data-filter="*">'.__('Show All', 'mthemes').'</a></li>';
				foreach($terms_obj as $term_obj) {
					echo '<li><a href="#" data-filter=".'.$term_obj->slug.'">'.$term_obj->name.'</a></li>';
				}
				echo '</ul>'; // END portfolio-filters
			} 
			
			// if no slugs are used show filter with every category
			if(empty($selected_terms)) {
				//show all filters
				$taxonomy     			= 'portfolio-categories';
				$show_option_all    	= '';
				$orderby      			= $orderby;
				$hierarchical 			= 1;
				$title        			= '';
				$count        			= 1;
				$walker       			= new Portfolio_Walker();

				$args = array(
					'taxonomy'     		=> $taxonomy,
					'show_option_all' 	=> $show_option_all,
					'orderby'      		=> $orderby,
					'show_option_none'  => false,
					'show_count'        => $count,
					'hierarchical' 		=> $hierarchical,
					'title_li'     		=> $title,
					'walker'       		=> $walker
				);

				?>
				<ul class="portfolio-filters clearfix <?php echo $layout_type; ?>">
					<li class="current"><a class="filter-show-all" href="#" data-filter="*"><?php _e('Show All', 'mthemes'); ?></a></li>
					<?php wp_list_categories( $args ); ?>
				</ul><!-- END portfolio-filters -->
			<?php
			}

		} // END $filter == 1
		?>
		<div class="row portfolio-row <?php echo $layout_type; ?>">

			<?php if ($layout_type == 'grid') { ?>
				<div class="portfolio-filterable isotope no-transition grid grid-<?php echo $size; ?>"><div class="grid-sizer"></div>
			<?php } else  { ?>
				<div class="portfolio-filterable isotope no-transition standard standard-<?php echo $size; ?>"><div class="grid-sizer"></div>
			<?php }

			// Creating custom query to fetch the post type custom post.
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$portfolio_shortcode_loop = new WP_Query(array(
				"post_type" => "portfolio",
				"posts_per_page" => $limit,
				"paged" => $paged,
				"order" => $order,
				"orderby" => $orderby,
				"portfolio-categories" => $slug,
			));

			if($portfolio_shortcode_loop->have_posts()) :
				while($portfolio_shortcode_loop->have_posts()) : $portfolio_shortcode_loop->the_post();

				$terms = ''; //initialize variables
				$terms = get_the_terms( get_the_ID(), 'portfolio-categories' );
				$term_list = '';
				if( is_array($terms) ) {
					foreach( $terms as $term ) {
						$term_list .= urldecode($term->slug);
						$term_list .= ' ';
					}
				}

				global $mt_options;
				$cpt_options = wp_parse_args( get_post_meta(get_the_ID(), 'mt_options', true), $mt_options );
				$thumb_id = get_post_thumbnail_id();
				$thumb_full = wp_get_attachment_image_src($thumb_id,'full', true);
				switch ( $images_size ) {
					case 'standard':
						$thumb = wp_get_attachment_image_src( $thumb_id ,'portfolio-thumb' );
					break;
					case 'masonry':
						$thumb = wp_get_attachment_image_src( $thumb_id ,'portfolio-masonry' );
					break;
					default:
					break;
				} // End SWITCH Statement							

				switch ( $size ) {
					case '2':
						echo '<div class="portfolio-item-wrapper col-xs-6 '.$term_list.'">';
					break;
					case '3':
						echo '<div class="portfolio-item-wrapper col-xs-4 '.$term_list.'">';
					break;
					case '4':
						echo '<div class="portfolio-item-wrapper col-xs-3 '.$term_list.'">';
					break;
					default:
					break;
				} // End SWITCH Statement

				?>
					<div class="portfolio-item" id="portfolio-item-<?php the_ID(); ?>">	
						<div class="image-overlay project-overlay">
							<div class="portfolio-item-top">
								<?php if ( has_post_thumbnail() ) {
										 echo '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" alt="'.get_the_title().'" />';
									} else {
										 echo '<img src="' . get_template_directory_uri() . '/images/portfolio-empty.png" />';
								} ?>
							</div>
							<div class="overlay-wrapper">
								<div class="overlay-content">
									<h5><?php the_title(); ?></h5>
									<span><?php echo get_the_term_list(get_the_ID(), 'portfolio-categories', '', ', ', ''); ?></span>
									<div class="clearfix"></div>
									<a class="image-lightbox mt-opil" href="<?php echo $thumb_full[0]; ?>" title="<?php the_title(); ?>"><i class="glyphicon glyphicon-search"></i></a>
									<a class="mt-opip" href="<?php the_permalink(); ?>"><i class="glyphicon glyphicon-share-alt"></i></a>									
								</div>
							</div>
						</div>
					</div><!-- / .portfolio-item -->	
				</div><!-- END portfolio-item-wrapper -->		
				<?php endwhile; ?>
			</div><!-- END portfolio-filterable -->

		<?php

		// pagination
		if ($pagination == 'yes') { ?>
			<?php if ($layout_type == 'grid') { ?>
				<div class="container mt-grid-pagination shortcode-pagination"><?php echo mt_pagination($portfolio_shortcode_loop->max_num_pages, $range = 2); ?></div>
			<?php } else  { ?>
				<div class="col-md-12 shortcode-pagination"><?php echo mt_pagination($portfolio_shortcode_loop->max_num_pages, $range = 2); ?></div>
			<?php } ?>			
		<?php }

		endif; ?>

		</div><!-- END row -->

		<?php

		wp_reset_query();

		$portfolio_shortcode_markup = ob_get_contents();
	
		ob_end_clean();
		
		return $portfolio_shortcode_markup;
	}

/*-----------------------------------------------------------------------------------*/
/*	MT Owl Slider
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_owlslider($atts, $content = null) {
		extract(shortcode_atts(array(
			"ids" => false,
			"caption" => "off",
			"img_size" => "full",
			"animation" => false,
			"pagination" => "on",
			"arrows" => "on",
			"pause" => "on",
			"slideshow_speed" => false,
		), $atts));

		if($pagination == 'on') { $pagination = 'true'; } else { $pagination = 'false'; }
		if($arrows == 'on') { $arrows = 'true'; } else { $arrows = 'false'; }
		if($pause == 'on') { $pause = 'true'; } else { $pause = 'false'; }
		if($slideshow_speed == false) { $slideshow_speed = '4000'; } else { $slideshow_speed; }		

		ob_start();

		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'-'. $i;

		// enqueue script
		wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);

		if ($ids == false) {
			echo __('You have to provide images IDs', 'mthemes');
		} else { ?>			

		<div class="owl-page-slider clearfix">
			<div id="owl-page-<?php echo $rand; ?>" class="owl-page-slide">
				<?php
				$attachment_ids = explode(',', $ids);
				foreach ($attachment_ids as $attachment_id) {
					switch ( $img_size ) {
						case 'full':
							$img = wp_get_attachment_image_src($attachment_id, 'full');
						break;
						case 'page43':
							$img = wp_get_attachment_image_src($attachment_id, 'full-43');
						break;
						case 'page169':
							$img = wp_get_attachment_image_src($attachment_id, 'full-169');
						break;
						case 'page_masonry':
							$img = wp_get_attachment_image_src($attachment_id, 'portfolio-full');
						break;
						default:
						break;
					} // End SWITCH Statement
					
					$thumb = wp_get_attachment_image_src($attachment_id,'latest-widget', true);
					$img_meta = wp_prepare_attachment_for_js($attachment_id);

				?>

				<div class="owl-slide-item">
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php echo $img_meta['title']; ?>" />
					<?php if ( ($caption == 'on') && ($img_meta['caption'] != '') ) { ?>
						<div class="owl-caption"><?php echo $img_meta['caption']; ?></div>
					<?php } ?>
				</div>

				<?php
				} // END foreach
				?>
			</div>
		</div>

		<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#owl-page-<?php echo $rand; ?>').owlCarousel({
				autoPlay: <?php echo $slideshow_speed; ?>,
				stopOnHover : <?php echo $pause; ?>,
				paginationSpeed: 1000,
				navigation: <?php echo $arrows; ?>,
				navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				pagination: <?php echo $pagination; ?>,
				singleItem: true,
				autoHeight: true,
				<?php if($animation == 'slide') { echo ''; } else { echo 'transitionStyle:"'.$animation.'",'; } ?>
			});
		});
		</script>

		<?php }

		$slider_markup = ob_get_contents();
	
		ob_end_clean();
		
		return $slider_markup;
	}

/*-----------------------------------------------------------------------------------*/
/*	MT Gallery
/*-----------------------------------------------------------------------------------*/

	function mt_shortcode_gallery($atts, $content = null) {
		extract(shortcode_atts(array(
			"ids" => false,
			"columns" => "6",
		), $atts));

		ob_start();

		$id = get_the_ID();
		STATIC $i = 0;
		$i++;
		$rand = $id .'_'. $i;

		if ($ids == false) {
			echo __('You have to provide images IDs', 'mthemes');
		} else { ?>			

		<ul id="mt_gallery_<?php echo $rand; ?>" class="mt_gallery clearfix mt_gallery_col_<?php echo $columns; ?>">
			<?php
			$attachment_ids = explode(',', $ids);
			foreach ($attachment_ids as $attachment_id) {
				$img = wp_get_attachment_image_src($attachment_id, 'full');				
				$img_meta = wp_prepare_attachment_for_js($attachment_id);
				// Change $img_meta['title'] to e.g. $img_meta['caption'] to show caption instead of image title (works with description and others)

				if ($columns == '1') {
					$thumb = wp_get_attachment_image_src($attachment_id,'full-169', true);
				} elseif ($columns == '2') {
					$thumb = wp_get_attachment_image_src($attachment_id,'gallery-2', true);
				} else {
					$thumb = wp_get_attachment_image_src($attachment_id,'portfolio-thumb', true);
				}

			?>

			<li class="mt_gallery_item">
				<a rel="prettyPhoto[pp_gallery_<?php echo $rand; ?>]" href="<?php echo $img[0]; ?>" title="<?php echo $img_meta['title']; ?>">
					<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php echo $img_meta['title']; ?>" />
					<span class="gal-hover-icon"></span>
				</a>
			</li>

			<?php
			} // END foreach
			?>
		</ul>
		<div class="clearfix"></div>

		<?php }

		$gallery_markup = ob_get_contents();
	
		ob_end_clean();
		
		return $gallery_markup;
	}

?>