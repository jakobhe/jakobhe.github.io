<?php
extract(shortcode_atts(array(
	'section' => 'no',
	'sectionwidth' => 'centered',
	'backgroundcolor' => '',
	'bordertopcolor' => '',
	'borderbottomcolor' => '',
	'backgroundimage' => '',
	'backgroundrepeat' => 'repeat',
	'backgroundposition' => 'left top',
	'backgroundattachment' => 'scroll',
	'backgroundsize' => 'auto',
	'paddingtop' => '80px',
	'paddingbottom' => '80px',
	'textcolor' => '',
	'parallax' => 'no',
	'parallax_speed' => '2',
	'visibility' => '',
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

// conditional rules
$css = '';
if($backgroundsize == 'cover') {
	$css .= '-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;';
}
$bordertop = '';
if(!empty($bordertopcolor)) {
	$bordertop .= 'border-top:1px solid '.$bordertopcolor.';';
}
$borderbottom = '';
if(!empty($borderbottomcolor)) {
	$borderbottom .= 'border-bottom:1px solid '.$borderbottomcolor.';';
}
$bgcolor = '';
if(!empty($backgroundcolor)) {
	$bgcolor .= 'background-color:'.$backgroundcolor.';';
}
$rowvisibility = '';
if(!empty($visibility)) {
	$rowvisibility .= ' '.$visibility;
}

// background image
$img = wp_get_attachment_image_src($backgroundimage, 'full');

// output
$output = '';
if ($section == 'yes') {
	if (!empty($backgroundimage)) {
		$output .= '<div class="mt-section mt-text-'.$textcolor.' vc_row wpb_row parallax-'.$parallax.''.$rowvisibility.'" data-parallax-speed="0.'.$parallax_speed.'" style="'.$bgcolor.''.$bordertop.''.$borderbottom.'background-image:url('.$img[0].');background-repeat:'.$backgroundrepeat.';background-position:'.$backgroundposition.';background-attachment:'.$backgroundattachment.';padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';'.$css.'">';
	} else {
		$output .= '<div class="mt-section mt-text-'.$textcolor.' vc_row wpb_row parallax-'.$parallax.''.$rowvisibility.'" data-parallax-speed="0.'.$parallax_speed.'" style="'.$bgcolor.''.$bordertop.''.$borderbottom.'padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';">';
	}
	if($sectionwidth == 'centered') {
		$output .= '<div class="container no-padding">';
		$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';
	} else {
		$output .= wpb_js_remove_wpautop($content);	
	}
	$output .= '</div>'.$this->endBlockComment('row');
	
} else {
	$output .= '<div class="vc_row wpb_row'.$rowvisibility.'">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>'.$this->endBlockComment('row');
}

echo $output;