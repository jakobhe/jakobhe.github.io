<?php

/*-----------------------------------------------------------------------------------*/
// Admin Panel
/*-----------------------------------------------------------------------------------*/
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/redux-framework/ReduxCore/framework.php' );
}
// load theme options
if ( !isset( $mt_options ) && file_exists( dirname( __FILE__ ) . '/framework/theme-options/options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/theme-options/options.php' );
}
/* Required: run in theme mode */
add_filter( 'ot_theme_mode', '__return_true' );
/* Required: include OT Loader */
load_template( trailingslashit( get_template_directory() ) . '/framework/metaboxes/ot-loader.php' );
/* Meta Boxes */
load_template( trailingslashit( get_template_directory() ) . '/framework/metaboxes/options/metaboxes.php' );
/* Hide Settings Pages */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_use_theme_options', '__return_false' );

/*-----------------------------------------------------------------------------------*/
// Theme setup
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'mt_theme_setup' );

function mt_theme_setup() {
	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) ) {
		$content_width = 1140;
	}

	/* Add theme support for automatic feed links. */	
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for localization. */
	load_theme_textdomain( 'mthemes', get_template_directory() . '/lang' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/lang/$locale.php";
	if ( is_readable($locale_file) ) {
		require_once($locale_file);
	}

	/* Add theme support for post formats. */
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'gallery', 'link', 'quote', 'video' ) ); 

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-grid', 600, 9999 );
	add_image_size( 'full-43', 1140, 855, true );
	add_image_size( 'full-169', 1140, 649, true );
	add_image_size( 'gallery-2', 570, 362, true );
	add_image_size( 'latest-posts', 360, 220, true );
	add_image_size( 'latest-widget', 77, 77, true );
	add_image_size( 'portfolio-full', 1140, 9999 );
	add_image_size( 'portfolio-thumb', 560, 356, true );
	add_image_size( 'portfolio-masonry', 560, 9999 );	

	/* Add your nav menus function to the 'init' action hook. */
	add_action('init', 'mt_register_menus');

	/* Add your sidebars function to the 'widgets_init' action hook. */
	add_action( 'widgets_init', 'mt_register_sidebars' );

	/* Add WP title tag support for WP 4.1 */
	add_theme_support( 'title-tag' );

	/* Load CSS and JavaScript files. */
	add_action( 'wp_enqueue_scripts', 'mt_load_styles' );
	add_action( 'wp_enqueue_scripts', 'mt_load_scripts' );
	add_action( 'admin_enqueue_scripts', 'mt_redux_styles' );
	
}

// register menus
function mt_register_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu', 'mthemes'),
			'top-menu' => __('Top Menu', 'mthemes'),
			'footer-menu' => __('Footer Menu', 'mthemes'),
		)
	);
}

// register sidebars
function mt_register_sidebars() {	

	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id'   => 'page-sidebar',
		'description'   => 'These are widgets for the page.',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'  
	));

	register_sidebar(array(
		'name' => 'Page Sidebar 2',
		'id'   => 'page-sidebar2',
		'description'   => 'These are widgets for the second sidebar on double sidebar page.',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'  
	));

	register_sidebar(array(
		'name' => 'Footer Widgets 1',
		'id'   => 'footer-widgets1',
		'description'   => 'First widgets section for the footer.',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Widgets 2',
		'id'   => 'footer-widgets2',
		'description'   => 'Second widgets section for the footer.',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Widgets 3',
		'id'   => 'footer-widgets3',
		'description'   => 'Third widgets section for the footer.',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Widgets 4',
		'id'   => 'footer-widgets4',
		'description'   => 'Fourth widgets section for the footer.',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id'   => 'blog-sidebar',
		'description'   => 'These are widgets for the blog.',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'  
	));

	register_sidebar(array(
		'name' => 'Blog Sidebar 2',
		'id'   => 'blog-sidebar2',
		'description'   => 'These are widgets for the second sidebar on double sidebar blog.',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'  
	));
}

function mt_load_styles() {
	if( !is_admin()) {
		wp_enqueue_style('mt-icons', get_template_directory_uri() . '/css/icons.css', 'style');
		wp_enqueue_style('mt-style', get_stylesheet_uri(), 'style');		
		wp_enqueue_style('mt-responsive', get_template_directory_uri() . '/css/responsive.css', 'style');
	}
}

function mt_load_scripts() {
	if( !is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('mt-modernizr', get_template_directory_uri() . '/js/modernizr.js', 'jquery', '',true);
		wp_enqueue_script('mt-jfunctions', get_template_directory_uri() . '/js/jquery.functions.js', 'jquery', '',true);
		wp_enqueue_script('mt-appear', get_template_directory_uri() . '/js/appear.js', 'jquery', '',true);
		wp_enqueue_script('mt-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '',true);
		wp_enqueue_script('mt-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', '',true);
		wp_enqueue_script('mt-scripts', get_template_directory_uri() . '/js/scripts.js', 'jquery', '',true);
	}

	// load comments script
	if (is_singular() ) wp_enqueue_script('comment-reply');

	// load portfolio scripts when on taxonomy page
	if (is_tax('portfolio-categories')) {
		wp_enqueue_script('mt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '',true);
		wp_enqueue_script('mt-isotopeportfolio', get_template_directory_uri() . '/js/jquery.isotope-portfolio.js', 'jquery', '',true);
		wp_enqueue_script('mt-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '',true);
	}

	// load portfolio scripts when on taxonomy page
	if (is_singular('gallery')) {
		wp_enqueue_script('mt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '',true);
		wp_enqueue_script('mt-isotopegallery', get_template_directory_uri() . '/js/jquery.isotope-gallery.js', 'jquery', '',true);
		wp_enqueue_script('mt-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '',true);
	}

}

function mt_redux_styles() {
	if( is_admin()) {
		wp_enqueue_style('redux-custom-styles', get_template_directory_uri() . '/framework/theme-options/css/custom-admin.css', 'redux-css');
	}
}

/*-----------------------------------------------------------------------------------*/
/* Shortcode support for widgets
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
//  Custom excerpt length
/*-----------------------------------------------------------------------------------*/
function mt_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'mt_custom_excerpt_length', 999 );

/*-----------------------------------------------------------------------------------*/
// WP title tag for older versions than 4.1
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( '_wp_render_title_tag' ) ):
	function mt_wp_title() {
		echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
	}
	add_action( 'wp_head', 'mt_wp_title' );
endif;

/*-----------------------------------------------------------------------------------*/
//  Custom functions
/*-----------------------------------------------------------------------------------*/
include('includes/custom-functions.php');
include('framework/breadcrumb-trail/breadcrumb-trail.php');

/*-----------------------------------------------------------------------------------*/
//  Custom css
/*-----------------------------------------------------------------------------------*/
include('css/custom-css.php');
include('css/backgrounds.php');

/*-----------------------------------------------------------------------------------*/
//  Visual Composer addons
/*-----------------------------------------------------------------------------------*/
include('framework/vc/vc_extend.php');

/*-----------------------------------------------------------------------------------*/
/*	Custom walker for portfolio wp_list_categories
/*-----------------------------------------------------------------------------------*/
class Portfolio_Walker extends Walker_Category {
	function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
		extract($args);
		$cat_name = esc_attr( $category->name);
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$cat_slug = esc_attr( $category->slug);
		$cat_slug = apply_filters( 'list_cats', $cat_slug, $category );
		$link = '<a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $cat_slug)).'" ';
		$link .= '>';
		// $link .= $cat_name . '</a>';
		$link .= $cat_name;
		$link .= '</a>';
		if ( isset($current_category) && $current_category )
			$_current_category = get_category( $current_category );
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
			if ( $category->term_id == $current_category )
				$class .=  ' current-cat';
			elseif ( $category->term_id == $_current_category->parent )
				$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}

/*-----------------------------------------------------------------------------------*/
//  Enable HTTP Requests
/*-----------------------------------------------------------------------------------*/

if( !class_exists( 'WP_Http' ) ) {
    include_once( ABSPATH . WPINC. '/class-http.php' );
}

/*-----------------------------------------------------------------------------------*/
// Required plugins
/*-----------------------------------------------------------------------------------*/

require_once('framework/plugins/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'mt_register_required_plugins' );

function mt_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> 'MThemes CPT Pack',
			'slug'     				=> 'mt-cpt',
			'source'   				=> get_template_directory_uri() . '/framework/plugins/mt-cpt.zip',
			'required' 				=> true,
			'version' 				=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'MThemes Widgets',
			'slug'     				=> 'mt-widgets-pack',
			'source'   				=> get_template_directory_uri() . '/framework/plugins/mt-widgets-pack.zip',
			'required' 				=> true,
			'version' 				=> '1.1',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'MThemes Shortcodes',
			'slug'     				=> 'mt-shortcodes',
			'source'   				=> get_template_directory_uri() . '/framework/plugins/mt-shortcodes.zip',
			'required' 				=> true,
			'version' 				=> '1.1',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name' 					=> 'Revolution Slider WP',
			'slug' 					=> 'revslider',
			'source' 				=> get_template_directory_uri() . '/framework/plugins/revslider.zip',
			'required' 				=> true,
			'version' 				=> '5.2.5.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> true
		),
		array(
			'name' 					=> 'Visual Composer',
			'slug' 					=> 'js_composer',
			'source' 				=> get_template_directory_uri() . '/framework/plugins/js_composer.zip',
			'required' 				=> true,
			'version' 				=> '4.12',
			'force_activation' 		=> false,
			'force_deactivation' 	=> true
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Custom Sidebars',
			'slug'      => 'custom-sidebars',
			'required'  => false,
		),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'mthemes';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'mthemes',               // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '', 						// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'mthemes' ),
			'menu_title'                       			=> __( 'Install Plugins', 'mthemes' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'mthemes' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'mthemes' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'mthemes' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'mthemes' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'mthemes' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
/*-----------------------------------------------------------------------------------*/
// Remove Revolution Slider Activation nag
/*-----------------------------------------------------------------------------------*/
remove_action( 'admin_notices', array( 'RevSliderAdmin', 'add_plugins_page_notices' ) );