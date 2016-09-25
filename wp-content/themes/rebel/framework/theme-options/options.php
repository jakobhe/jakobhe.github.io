<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "mt_options";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }    

    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'mt-theme-options' ),
        'page_title'           => __( 'Theme Options', 'mt-theme-options' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    // if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    //     if ( ! empty( $args['global_variable'] ) ) {
    //         $v = $args['global_variable'];
    //     } else {
    //         $v = str_replace( '-', '_', $args['opt_name'] );
    //     }
    //     $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    // } else {
    //     $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    // }

    // Add content after the form.
    //$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    // $tabs = array(
    //     array(
    //         'id'      => 'redux-help-tab-1',
    //         'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
    //         'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
    //     ),
    //     array(
    //         'id'      => 'redux-help-tab-2',
    //         'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
    //         'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
    //     )
    // );
    // Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    // $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    // Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /**************************************
    //
    //
    //      Theme options
    //
    //
    **************************************/

    // Define assets path
    $assets_url = ReduxFramework::$_url . '../../theme-options/columns';

/**

     GENERAL settings

**/
Redux::setSection( $opt_name, array(
    'title' => __('General Settings', 'mthemes'),
    'icon' => 'el-icon-cogs',
    'fields' => array(
        array(
            'title' => __('Breadcrumb title', 'mthemes'),
            'subtitle'=> __('Show breadcrumb title before links', 'mthemes'),
            'id'=>'breadcrumb_title',
            'type' => 'switch', 
            'default' => 0,
        ),
        array(
            'title' => __('Breadcrumb title text', 'mthemes'),
            'subtitle'=> __('Choose title for breadcrumbs', 'mthemes'),
            'id'=>'breadcrumb_title_text',
            'type' => 'text',
            'default' => 'You are here:'
        ),
        array(
            'title' => __('Favicon', 'mthemes'),
            'subtitle' => __('Upload your favicon here', 'mthemes'),
            'id'=> 'custom_favicon',
            'type' => 'media',
            'default'=> array('url' => get_template_directory_uri().'/favicon.png'),
        ),
        array(
            'title' => __('Feedburner URL', 'mthemes'),
            'subtitle' => __('Enter your full FeedBurner URL to replace the default feed URL by Wordpress.', 'mthemes'),
            'id'=>'feedburner',
            'type' => 'text',
            'default' => ''
        ),
        array(
            'title' => __('Tracking code', 'mthemes'), 
            'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added at the bottom of the footer.', 'mthemes'),
            'id'=>'google_analytics',
            'type' => 'textarea',
        ),
    ),
));

/**

     HEADER settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Header Settings', 'mthemes'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'title' => __('Fixed header', 'mthemes'),
            'subtitle'=> __('Makes Your header scroll with the page', 'mthemes'),
            'id'=>'header_fixed',
            'type' => 'switch', 
            'default' => 1,
        ),
        array(
            'title' => __('Fixed header opacity', 'mthemes'),
            'subtitle'=> __('Choose opacity for fixed header', 'mthemes'),
            'id'=>'header_fixed_opacity',
            'type' => 'slider', 
            'default' => 1,
            'min' => 0.1,
            'step' => 0.01,
            'max' => 1,
            'resolution' => 0.01,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Header height', 'mthemes'), 
            'subtitle' => __('Enter here header height in px', 'mthemes'),
            'id'=>'header_height',
            'type' => 'text',
            'default' => '100',
        ),
        array(
            'title' => __('Navigation top margin', 'mthemes'), 
            'subtitle' => __('Enter here top margin for navigation in px', 'mthemes'),
            'id'=>'nav_margin_top',
            'type' => 'text',
            'default' => '30',
        ),
        array(
            'title' => __('Subnav top margin', 'mthemes'), 
            'subtitle' => __('Should be equal to header height - navigation top margin', 'mthemes'),
            'id'=>'subnav_margin_top',
            'type' => 'text',
            'default' => '70',
        ),
        array(
            'title' => __('Megamenu top margin', 'mthemes'), 
            'subtitle' => __('By default it should be equal to header height, but in case of changing nav margin You should also tweak this value to make it match (in px)', 'mthemes'),
            'id'=>'megamenu_margin_top',
            'type' => 'text',
            'default' => '100',
        ),
        array(
            'title' => __('Navigation link bottom padding', 'mthemes'), 
            'subtitle' => __('Bottom padding for main navigation links', 'mthemes'),
            'id'=>'nav_padding_bottom',
            'type' => 'text',
            'default' => '40',
        ),
        array(
            'title' => __('Logo', 'mthemes'),
            'subtitle' => __('Upload your logo here', 'mthemes'),
            'id'=> 'logo',
            'type' => 'media',
            'default'=> array('url' => get_template_directory_uri().'/images/logo.png'),
        ),
        array(
            'title' => __('Logo top margin', 'mthemes'), 
            'subtitle' => __('Enter here logo top margin in px', 'mthemes'),
            'id'=>'logo_top_margin',
            'type' => 'text',
            'default' => '34',
        ),
        array(
            'title' => __('Retina logo', 'mthemes'),
            'subtitle' => __('Upload your logo for retina displays', 'mthemes'),
            'id'=> 'retina_logo',
            'type' => 'media',
            'default'=> array('url' => get_template_directory_uri().'/images/logo@2x.png'),
        ),
        array(
            'title' => __('Logo height', 'mthemes'), 
            'subtitle' => __('Enter here your logo height in px.', 'mthemes'),
            'id'=>'logo_height',
            'type' => 'text',
            'default' => '35',
        ),
        array(
            'title' => __('Top info area', 'mthemes'),
            'subtitle'=> __('Show/hide info area at the top of the header', 'mthemes'),
            'id'=>'header_top',
            'type' => 'switch', 
            'default' => 1,
        ),
        array(
            'title' => __('Phone', 'mthemes'), 
            'subtitle' => __('Text in phone area', 'mthemes'),
            'id'=>'header_phone_text',
            'type' => 'textarea',
            'default' => '<i class="fa fa-phone fa-lg"></i> Call Us: 0800 123 456 789',
        ),
        array(
            'title' => __('Email', 'mthemes'), 
            'subtitle' => __('Text in email area', 'mthemes'),
            'id'=>'header_email_text',
            'type' => 'textarea',
            'default' => '<i class="fa fa-envelope-o fa-lg"></i> mail@yoursite.com',
        ),
        array(
            'title' => __('Header top navigation', 'mthemes'),
            'subtitle'=> __('Choose if you want to show top navigation in header info area', 'mthemes'),
            'id'=>'header_top_nav',
            'type' => 'switch', 
            'default' => 1,
        ),      
    ),
));

/**

     FOOTER settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Footer Settings', 'mthemes'),
    'icon' => 'el-icon-photo',
    'fields' => array(
        array(
            'title' => __('Show footer', 'mthemes'),
            'subtitle'=> __('Check this to show main footer.', 'mthemes'),
            'id'=>'show_main_footer',
            'type' => 'switch', 
            "default" => 1,
        ),
        array(
            'title' => __('How many columns you want to show?', 'mthemes'), 
            'subtitle' => __('Choose how many columns you want to show in the footer', 'mthemes'),
            'id'=>'show_footer_columns',
            'type' => 'select',
            'options' => array(
                '1' => '1 column',
                '2' => '2 columns',
                '3' => '3 columns',
                '4' => '4 columns',
            ),
            'default' => '3',
        ),
        array(
            'id'=>'info2',
            'type' => 'info',
            'desc' => __('Choose 1-12 column width. 12 columns = 100%, 6 columns = 50% etc. All based on bootstrap.', 'mthemes'),
        ),
        array(
            'title' => __('Column 1 width', 'mthemes'),
            'subtitle'=> __('Width for first footer column (choose 1-12 column width)', 'mthemes'),
            'id'=>'footer_1col_width',
            'type' => 'slider', 
            'default' => 4,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Column 2 width', 'mthemes'),
            'subtitle'=> __('Width for second footer column (choose 1-12 column width)', 'mthemes'),
            'id'=>'footer_2col_width',
            'type' => 'slider', 
            'default' => 4,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Column 3 width', 'mthemes'),
            'subtitle'=> __('Width for third footer column (choose 1-12 column width)', 'mthemes'),
            'id'=>'footer_3col_width',
            'type' => 'slider', 
            'default' => 4,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Column 4 width', 'mthemes'),
            'subtitle'=> __('Width for fourth footer column (choose 1-12 column width)', 'mthemes'),
            'id'=>'footer_4col_width',
            'type' => 'slider', 
            'default' => 3,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Show bottom footer', 'mthemes'),
            'subtitle'=> __('Check this to show bottom footer.', 'mthemes'),
            'id'=>'show_bottom_footer',
            'type' => 'switch', 
            "default" => 1,
        ),
        array(
            'title' => __('Footer text.', 'mthemes'),
            'subtitle' => __('Place here your footer copyright text.', 'mthemes'),
            'id'=>'footer_text',
            'type' => 'editor',
            'default' => 'Rebel WP Theme created in 2014 by <a target="_blank" href="http://themeforest.net/user/maarcin/portfolio?ref=maarcin">maarcin</a> | Powered by <a target="_blank" href="http://wordpress.org">Wordpress</a>',
        ),
        array(
            'id'=>'footer_bottom_info',
            'type' => 'button_set',
            'title' => __('Footer menu/social icons', 'mthemes'), 
            'subtitle' => __('Choose footer menu or social icons', 'mthemes'),
            'desc' => '',
            'options' => array(
                'menu' => 'Menu',
                'social' => 'Social icons',
            ),
            'default' => 'menu'
        ),
        array(
            'title' => __('Social icons shortcode', 'mthemes'), 
            'subtitle' => '',
            'id'=>'footer_bottom_socials',
            'required' => array('footer_bottom_info', '=', 'social'),
            'type' => 'textarea',
            'default' => '',
        ),
    ),
));

/**

     PORTFOLIO settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Portfolio Settings', 'mthemes'),
    'icon' => 'el-icon-folder-open',
    'fields' => array(
        array(
            'title' => __('Comments', 'mthemes'),
            'subtitle'=> __('Show comments under portfolio item', 'mthemes'),
            'id'=>'portfolio_comments',
            'type' => 'switch', 
            'default' => 0,
        ),
        array(
            'title' => __('Related items', 'mthemes'),
            'subtitle'=> __('Show related items at the bottom of the content', 'mthemes'),
            'id'=>'portfolio_related_items',
            'type' => 'switch', 
            'default' => 0,
        ),
        array(
            'title' => __('Portfolio related items title', 'mthemes'),
            'subtitle' => __('Enter here portfolio related items title.', 'mthemes'),
            'id'=>'portfolio_related_title',
            'type' => 'text',
            'default' => 'Related items'
        ),
        array(
            'title' => __('Portfolio related items order', 'mthemes'), 
            'subtitle' => __('Choose how you want to order your related items on portfolio single page', 'mthemes'),
            'id'=>'portfolio_related_orderby',
            'type' => 'select',
            'options' => array(
                'date' => 'Order by date of publication',
                'title' => 'Order by title',
                'author' => 'Order by author name',
                'ID' => 'Order by post ID',
                'rand' => 'Random order',
            ),
            'default' => 'date',
        ),
        array(
            'id' => 'section-portfolio-taxonomy',
            'type' => 'section',
            'title' => __('Portfolio taxonomy page settings', 'mthemes'),
            'subtitle' => '',
            'indent' => true
        ),
        array(
            'id'=>'portfolio_tax_size',
            'type' => 'image_select',
            'title' => __('Portfolio size', 'mthemes'), 
            'subtitle' => __('Choose columns size for portfolio taxonomy page', 'mthemes'),
            'options' => array(
                '2' => array('alt' => '2 Columns', 'img' => $assets_url.'/2-col-portfolio.png'),
                '3' => array('alt' => '3 Columns', 'img' => $assets_url.'/3-col-portfolio.png'),
                '4' => array('alt' => '4 Columns', 'img' => $assets_url.'/4-col-portfolio.png'),
            ),
            'default' => '3'
        ),
        array(
            'id' => 'portfolio_tax_images_size',
            'type' => 'select',
            'title' => __('Images size', 'mthemes'), 
            'subtitle' => __('Choose images size', 'mthemes'),
            'options' => array(
                'standard' => 'Standard (555x320px)',
                'masonry' => 'Masonry (555x100%)',
            ),
            'default' => 'standard',
        ),
        array(
            'id' => 'portfolio_tax_layout_type',
            'type' => 'select',
            'title' => __('Layout type', 'mthemes'),
            'subtitle' => __('Choose images size', 'mthemes'),
            'options' => array(
                'standard' => 'Standard (can be used with column size)',
                'grid' => 'Grid (uses own column calculation)',
            ),
            'default' => 'standard',
        ),
    ),
));

/**

     BLOG settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Blog Settings', 'mthemes'),
    'icon' => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'=>'blog_pagi',
            'type' => 'button_set',
            'title' => __('Blog pagination style', 'mthemes'), 
            'subtitle' => __('Choose pagination style for default blog', 'mthemes'),
            'desc' => '',
            'options' => array(
                'pagination' => 'Pagination',
                'nav' => 'Older/newer navigation',
            ),
            'default' => 'pagination'
        ),
        array(
            'id'=>'blog_preview',
            'type' => 'button_set',
            'title' => __('Blog preview text', 'mthemes'), 
            'subtitle' => __('Choose what kind of preview You want to use for blog posts. "Content" option should be used with "more" button', 'mthemes'),
            'desc' => '',
            'options' => array(
                'content' => 'Use content',
                'excerpt' => 'Use excerpt',
            ),
            'default' => 'content'
        ),
        array(
            'id'=>'blog_sidebar',
            'type' => 'image_select',
            'title' => __('Blog sidebar', 'mthemes'), 
            'subtitle' => __('Select blog content and sidebar alignment.', 'mthemes'),
            'options' => array(
                'right' => array('alt' => 'Right sidebar', 'img' => $assets_url.'/2cr.png'),
                'left' => array('alt' => 'Left sidebar', 'img' => $assets_url.'/2cl.png'),
                'double' => array('alt' => 'Double sidebar', 'img' => $assets_url.'/3cm.png'),
            ),
            'default' => 'right'
        ),
    ),
));

/**

     TYPOGRAPHY settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Typography Settings', 'mthemes'),
    'icon' => 'el-icon-font',
    'fields' => array(
        array(
            'title' => __('Body font settings', 'mthemes'),
            'subtitle'=> __('Set your settings for body font', 'mthemes'),
            'id'=>'body_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'line-height'=> false,
            'text-align'=> false,
            'color'=> false,
            'all_styles' => true,
            'units'=> false,
            'output' => array('body, button,input[type="submit"],input[type="reset"],input[type="button"],input,textarea,select'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'400',
                'font-size'=>'14',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'title' => __('Navigation font settings', 'mthemes'),
            'subtitle'=> __('Set your settings for navigation font', 'mthemes'),
            'id'=>'navigation_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'line-height'=> false,
            'text-align'=> false,
            'text-transform'=> true,
            'color'=> false,
            'units'=>'px',
            'output' => array('.sf-menu a, .footer-nav a'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'600',
                'font-size'=>'13',
                'text-transform'=>'uppercase',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'title' => __('Page title font settings', 'mthemes'),
            'subtitle'=> __('Set your settings for page title font', 'mthemes'),
            'id'=>'pagetitle_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'line-height'=> false,
            'text-align'=> false,
            'text-transform'=> true,
            'color'=> false,
            'units'=>'px',
            'output' => array('.page-title h1'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'400',
                'font-size'=>'34',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'title' => __('Standard header font settings', 'mthemes'),
            'subtitle'=> __('Set font settings for standard header', 'mthemes'),
            'id'=>'header_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'font-size'=> false,
            'line-height'=> false,
            'text-align'=> false,
            'text-transform'=> true,
            'color'=> false,
            'units'=>'px',
            'output' => array('h1,h2,h3,h4,h5,h6'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'600',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'title' => __('H1 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h1_font_size',
            'type' => 'slider', 
            'default' => 36,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('H2 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h2_font_size',
            'type' => 'slider', 
            'default' => 26,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('H3 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h3_font_size',
            'type' => 'slider', 
            'default' => 22,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('H4 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h4_font_size',
            'type' => 'slider', 
            'default' => 18,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('H5 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h5_font_size',
            'type' => 'slider', 
            'default' => 16,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('H6 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h6_font_size',
            'type' => 'slider', 
            'default' => 14,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom header font settings', 'mthemes'),
            'subtitle'=> __('Set font settings for custom header', 'mthemes'),
            'id'=>'header_custom_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'font-size'=> false,
            'line-height'=> false,
            'text-align'=> false,
            'text-transform'=> true,
            'color'=> false,
            'units'=>'px',
            'output' => array('.line-header h1,.line-header h2,.line-header h3,.line-header h4,.line-header h5,.line-header h6'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'700',
                'text-transform'=>'uppercase',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'title' => __('Custom H1 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h1_custom_font_size',
            'type' => 'slider', 
            'default' => 28,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom H2 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h2_custom_font_size',
            'type' => 'slider', 
            'default' => 22,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom H3 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h3_custom_font_size',
            'type' => 'slider', 
            'default' => 18,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom H4 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h4_custom_font_size',
            'type' => 'slider', 
            'default' => 16,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom H5 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h5_custom_font_size',
            'type' => 'slider', 
            'default' => 14,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Custom H6 font size', 'mthemes'),
            'subtitle'=> __('Select value in pixels', 'mthemes'),
            'id'=>'h6_custom_font_size',
            'type' => 'slider', 
            'default' => 12,
            'min' => 10,
            'step' => 1,
            'max' => 40,
            'display_value' => 'text'
        ),
        array(
            'title' => __('Footer widget header', 'mthemes'),
            'subtitle'=> __('Set your settings for footer widget headers', 'mthemes'),
            'id'=>'footer_header_typography',
            'type' => 'typography',
            'google'=> true,
            'font-backup'=> true,
            'line-height'=> false,
            'text-align'=> false,
            'text-transform'=> true,
            'color'=> false,
            'units'=>'px',
            'output' => array('h4.widget-title'),
            'default'=> array(
                'font-family'=>'Source Sans Pro',
                'google' => true,
                'font-weight'=>'600',
                'font-size'=>'14',
                'text-transform'=>'uppercase',
                'font-backup'=> 'Arial, Helvetica, sans-serif',
            ),
        ),
    ),
));

/**

     COLOR settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Color Settings', 'mthemes'),
    'heading' => __('Color settings', 'mthemes'),
    'icon' => 'el-icon-adjust',
    'fields' => array(      
        array(
            'title' => __('Accent color', 'mthemes'),
            'id'=>'default_color',
            'type' => 'color',
            'default' => '#1be88c',
        ),
        array(
            'title' => __('Accent text color', 'mthemes'), 
            'id'=>'default_color_text',
            'type' => 'color',
            'default' => '#ffffff',
        ),      
        array(
            'title' => __('Accent color (on hover)', 'mthemes'),
            'id'=>'default_color_hover',
            'type' => 'color',
            'default' => '#444444',
        ),
        array(
            'title' => __('Accent text color (on hover)', 'mthemes'), 
            'id'=>'default_color_text_hover',
            'type' => 'color',
            'default' => '#ffffff',
        ),
        array(
            'id'    => 'opt-divide',
            'type'  => 'divide'
        ),
        array(
            'title' => __('Header background color', 'mthemes'), 
            'id'=>'header_bg_color',
            'type' => 'color',
            'default' => '#ffffff',
        ),
        array(
            'title' => __('Header text color', 'mthemes'), 
            'id'=>'header_text_color',
            'type' => 'color',
            'default' => '#888888',
        ),
        array(
            'title' => __('Header top border color', 'mthemes'), 
            'id'=>'header_top_border_color',
            'type' => 'color',
            'default' => '#eeeeee',
        ),
        array(
            'title' => __('Header top text color', 'mthemes'), 
            'id'=>'header_top_text_color',
            'type' => 'color',
            'default' => '#999999',
        ),
        array(
            'id'    => 'opt-divide',
            'type'  => 'divide'
        ),
        array(
            'title' => __('Navigation text color', 'mthemes'), 
            'id'=>'navigation_text_color',
            'type' => 'color',
            'default' => '#444444',
        ),
        array(
            'title' => __('Navigation text color (on hover)', 'mthemes'), 
            'id'=>'navigation_text_color_hover',
            'type' => 'color',
            'default' => '#1be88c',
        ),
        array(
            'title' => __('Sub navigation text color', 'mthemes'), 
            'id'=>'navigation_sub_text_color',
            'type' => 'color',
            'default' => '#444444',
        ),
        array(
            'title' => __('Sub navigation background color', 'mthemes'), 
            'id'=>'navigation_sub_bg_color',
            'type' => 'color',
            'default' => '#fafafa',
        ),
        array(
            'title' => __('Sub navigation text color (on hover)', 'mthemes'), 
            'id'=>'navigation_sub_text_color_hover',
            'type' => 'color',
            'default' => '#ffffff',
        ),
        array(
            'title' => __('Sub navigation background color (on hover)', 'mthemes'), 
            'id'=>'navigation_sub_bg_color_hover',
            'type' => 'color',
            'default' => '#1be88c',
        ),
        array(
            'id'    => 'opt-divide',
            'type'  => 'divide'
        ),
        array(
            'title' => __('Footer background color', 'mthemes'), 
            'id'=>'footer_bg_color',
            'type' => 'color',
            'default' => '#f6f6f6',
        ),
        array(
            'title' => __('Footer top and bottom border color', 'mthemes'), 
            'id'=>'footer_border_color',
            'type' => 'color',
            'default' => '#eaeaea',
        ),
        array(
            'title' => __('Footer text color', 'mthemes'), 
            'id'=>'footer_text_color',
            'type' => 'color',
            'default' => '#999999',
        ),
        array(
            'title' => __('Footer header and links color', 'mthemes'), 
            'id'=>'footer_header_color',
            'type' => 'color',
            'default' => '#444444',
        ),      
    ),
));

/**

     PAGE TITLE settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Page title', 'mthemes'),
    'header' => __('Page title background', 'mthemes'),
    'icon' => 'el-icon-picture',
    'fields' => array(
        array(
            'title' => __('Padding top', 'mthemes'),
            'subtitle' => __('Enter here value for top padding (in pixels)', 'mthemes'),
            'id'=>'page_title_padding_top',
            'type' => 'text',
            'default' => '40'
        ),
        array(
            'title' => __('Padding bottom', 'mthemes'),
            'subtitle' => __('Enter here value for bottom padding (in pixels)', 'mthemes'),
            'id'=>'page_title_padding_bottom',
            'type' => 'text',
            'default' => '40'
        ),
        array(
            'title' => __('Background color', 'mthemes'),
            'subtitle' => '', 
            'id'=>'page_title_background_color',
            'type' => 'color',
            'default' => '#f2f2f2',
        ),
        array(
            'title' => __('Text color', 'mthemes'),
            'subtitle' => '', 
            'id'=>'page_title_text_color',
            'type' => 'color',
            'default' => '#444444',
        ),
        array(
            'title' => __('Use custom image', 'mthemes'),
            'subtitle'=> '',
            'id'=>'page_title_custom_image_onoff',
            'type' => 'switch', 
            "default" => 0,
        ),
        array(
            'title' => __('Background image','mthemes'),
            'subtitle' => __('Choose image or enter url','mthemes'),
            'id'=>'page_title_background_image',
            'required' => array('page_title_custom_image_onoff', '=', 1),
            'type' => 'media',
            'url' => true,
            'readonly' => false,
        ),
        array(
            'title' => __('Background image repeat', 'mthemes'), 
            'subtitle' => '',
            'id'=>'page_title_background_image_repeat',
            'required' => array('page_title_custom_image_onoff', '=', 1),
            'type' => 'select',
            'options' => array(
                'repeat' => 'Repeat all',
                'repeat-x' => 'Repeat horizontally',
                'repeat-y' => 'Repeat vertically',
                'no-repeat' => 'No repeat',
            ),
            'default' => 'repeat',
        ),
        array(
            'title' => __('Background image position', 'mthemes'), 
            'subtitle' => '',
            'id'=>'page_title_background_image_position',
            'required' => array('page_title_custom_image_onoff', '=', 1),
            'type' => 'select',
            'options' => array(
                'left top' => 'Left Top',
                'left center' => 'Left center',
                'left bottom' => 'Left Bottom',
                'center top' => 'Center Top',
                'center center' => 'Center Center',
                'center bottom' => 'Center Bottom',
                'right top' => 'Right Top',
                'right center' => 'Right center',
                'right bottom' => 'Right Bottom',
            ),
            'default' => 'left top',
        ),
        array(
            'title' => __('Background image attachment', 'mthemes'), 
            'subtitle' => '',
            'id'=>'page_title_background_image_attachment',
            'required' => array('page_title_custom_image_onoff', '=', 1),
            'type' => 'select',
            'options' => array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ),
            'default' => 'scroll',
        ),
        array(
            'title' => __('Background image size', 'mthemes'), 
            'subtitle' => '',
            'id'=>'page_title_background_image_size',
            'required' => array('page_title_custom_image_onoff', '=', 1),
            'type' => 'select',
            'options' => array(
                'auto' => 'Standard',
                'cover' => 'Cover',
            ),
            'default' => 'auto',
        ),
    ),
));

/**

     CUSTOM CSS settings

**/

Redux::setSection( $opt_name, array(
    'title' => __('Custom CSS', 'mthemes'),
    'icon' => 'el-icon-css',
    'fields' => array(
        array(
            'title' => __('Add your custom css', 'mthemes'), 
            'subtitle' => __('If you want to add some custom css for this theme you can do this here', 'mthemes'),
            'id'=>'custom_css',
            'type' => 'textarea',           
            'default' => '',
        ),      
    ),
));

/**

     SETTINGS ENDS HERE

**/

    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
