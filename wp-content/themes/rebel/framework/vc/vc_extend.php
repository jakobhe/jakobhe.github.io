<?php
/*
Plugin Name: MThemes Extension for Visual Composer
Plugin URI: http://www.m-themes.eu
Description: Additional Extension for Visual Composer that includes shortcodes created by MThemes
Version: 1.0
Author: Marcin Michalak
Author URI: http://themeforest.net/user/maarcin
License: GPLv2 or later
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

/**
 * Display notice if Visual Composer is not installed or activated.
 */
if ( !defined('WPB_VC_VERSION') ) { add_action('admin_notices', 'mt_vc_extend_notice'); return; }
function mt_vc_extend_notice() {
	$plugin_data = get_plugin_data(__FILE__);
	echo '
	<div class="updated">
		<p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'mthemes'), $plugin_data['Name']).'</p>
	</div>';
}

/**
 * Load plugin css and javascript files
 */
add_action( 'admin_enqueue_scripts', 'mt_vc_extend_styles' );
function mt_vc_extend_styles() {
	if( is_admin()) {
		wp_enqueue_style('mt-vc-extend-styles', get_template_directory_uri() . '/framework/vc/vc_extend.css', 'js_composer_settings');
		wp_enqueue_script('mt-vc-extend-scripts', get_template_directory_uri() . '/framework/vc/vc_extend.js', 'jquery', '',true);
	}
}

/**
 * Include config file with shortcodes
 */
require_once('config.php');

/**
 * Include custom page templates
 */
// require_once('page-templates/templates.php');

/**
 * Remove all default templates
 */
add_filter( 'vc_load_default_templates', 'my_custom_template_modify_array' );
function my_custom_template_modify_array($data) {
	return array();
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) vc_set_as_theme();

/**
 * Override directory where Visual Composer should look for shortcode template files. Also get_stylesheet_directory() can be used
 */
$vc_shortcodes_new_dir = get_template_directory() . '/framework/vc/shortcode-templates/';
vc_set_shortcodes_templates_dir($vc_shortcodes_new_dir);