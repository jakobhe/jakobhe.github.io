<?php

/*
Plugin Name: MThemes CPT Pack
Plugin URI: http://www.m-themes.eu
Description: Custom posts related to this theme
Version: 1.0
Author: maarcin
Author URI: http://themeforest.net/user/maarcin
*/

// Register Portfolio Custom Post Type
add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {

    $labels = array( 
        'name' => __( 'Portfolios', 'mthemes' ),
        'singular_name' => __( 'Portfolio', 'mthemes' ),
        'add_new' => __( 'Add New', 'mthemes' ),
        'add_new_item' => __( 'Add New Portfolio', 'mthemes' ),
        'edit_item' => __( 'Edit Portfolio', 'mthemes' ),
        'new_item' => __( 'New Portfolio', 'mthemes' ),
        'view_item' => __( 'View Portfolio', 'mthemes' ),
        'search_items' => __( 'Search Portfolio', 'mthemes' ),
        'not_found' => __( 'No portfolio found', 'mthemes' ),
        'not_found_in_trash' => __( 'No portfolio found in Trash', 'mthemes' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'mthemes' ),
        'menu_name' => __( 'Portfolios', 'mthemes' ),
        'all_items' => __( 'All Portfolios', 'mthemes' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'excerpt', 'editor', 'author', 'thumbnail', 'revisions', 'comments' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'portfolio' ),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-portfolio'
    );

    register_post_type( 'portfolio', $args );
}

// Register Taxonomies for Portfolio
add_action( 'init', 'build_taxonomies', 0);

function build_taxonomies() {

    // Portfolio Categories
    register_taxonomy('portfolio-categories', 'portfolio', array(
        'hierarchical' => true,
        'label' => 'Portfolio Categories',
        'singular_label' => 'Portfolio Category',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-categories')
        )
    );

}

// Add Taxonomy Columns Inside Portfolio List View
add_filter("manage_edit-portfolio_columns", "add_new_columns");  
add_action("manage_posts_custom_column",  "add_column_data", 2,10 );

function add_new_columns($defaults) {
    $defaults['portfolio-categories'] = __('Portfolio Categories','mthemes');
    return $defaults;
}
function add_column_data( $column_name, $post_id ) {
    if( $column_name == 'portfolio-categories' ) {
        $_taxonomy = 'portfolio-categories';
        $terms = get_the_terms( $post_id, $_taxonomy );
        if ( !empty( $terms ) ) {
            $out = array();
            foreach ( $terms as $c )
                $out[] = "<a href='edit-tags.php?action=edit&taxonomy=$_taxonomy&post_type=book&tag_ID={$c->term_id}'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
            echo join( ', ', $out );
        }
        else {
            _e('No Category','mthemes');
        }
    }
}

/* --------------------------------- */
//      Team Members post type
/* --------------------------------- */

// Register Team Members Custom Post Type
add_action( 'init', 'register_cpt_teammembers' );

function register_cpt_teammembers() {

    $labels = array( 
        'name' => __( 'Team Members', 'mthemes' ),
        'singular_name' => __( 'Team Member', 'mthemes' ),
        'add_new' => __( 'Add New', 'mthemes' ),
        'add_new_item' => __( 'Add New Team Member', 'mthemes' ),
        'edit_item' => __( 'Edit Team Member', 'mthemes' ),
        'new_item' => __( 'New Team Member', 'mthemes' ),
        'view_item' => __( 'View Team Member', 'mthemes' ),
        'search_items' => __( 'Search Team Member', 'mthemes' ),
        'not_found' => __( 'No Team Member found', 'mthemes' ),
        'not_found_in_trash' => __( 'No Team Member found in Trash', 'mthemes' ),
        'parent_item_colon' => __( 'Parent Team Member:', 'mthemes' ),
        'menu_name' => __( 'Team Members', 'mthemes' ),
        'all_items' => __( 'All Team Members', 'mthemes' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'team' ),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-groups'
    );

    register_post_type( 'teammembers', $args );
}


// Register Taxonomies for Team Members
add_action( 'init', 'build_taxonomies_teammembers', 0);

function build_taxonomies_teammembers() {

    // Team Members Categories
    register_taxonomy('teammembers-categories', 'teammembers', array(
        'hierarchical' => true,
        'label' => 'Team Members Categories',
        'singular_label' => 'Team Member Category',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team-categories')
        )
    );

}

// Add Taxonomy Columns Inside Team Members List View
add_filter("manage_edit-teammembers_columns", "add_new_columns_teammembers");  
add_action("manage_posts_custom_column",  "add_column_data_teammembers", 2,10 );

function add_new_columns_teammembers($defaults) {
    $defaults['teammembers-categories'] = __('Team Member Categories','mthemes');
    $defaults['teammember_id'] = __('Team Member ID','mthemes');
    return $defaults;
}
function add_column_data_teammembers( $column_name, $post_id ) {
    if( $column_name == 'teammembers-categories' ) {
        $_taxonomy = 'teammembers-categories';
        $terms = get_the_terms( $post_id, $_taxonomy );
        if ( !empty( $terms ) ) {
            $out = array();
            foreach ( $terms as $c )
                $out[] = "<a href='edit-tags.php?action=edit&taxonomy=$_taxonomy&post_type=book&tag_ID={$c->term_id}'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
            echo join( ', ', $out );
        }
        else {
            _e('No Category','mthemes');
        }
    }

    //output for teammember_id
    if( $column_name == 'teammember_id' ) {
        echo 'Team member ID: <code>'.$post_id.'</code>';
    }
}