<?php

/** 
 * 
 * Plugin Name: Listing Plugin Simplified
 * Description: This is a Test Plugin
 * Version: 1.0.0
 * Text Domain: options-plugin
 * 
*/

if (!defined('ABSPATH')) {
      die('Unauthorized Access!!');
}

add_action('init', 'create_post_type');

add_action( 'init', 'custom_listing_country_taxonomy', 0 );

add_action( 'init', 'custom_listing_city_taxonomy', 0 );

add_action( 'init', 'custom_listing_states_taxonomy', 0 );

function create_post_type()
{

      // Create the submissions post type to store form submissions

      $args = [

            'public' => true,
            'has_archive' => true,
            'menu_position' => 30,
            'publicly_queryable' => false,
            'labels' => [

                  'name' => 'Listings',
                  'singular_name' => 'Listing',
                  'edit_item' => 'View Listings'

            ],
            'supports' => ['title', 'editor','custom-fields']
      ];

      register_post_type('listing', $args);
}

// Register Taxonomy for City
function custom_listing_city_taxonomy() {
    $labels = array(
        'name'                       => 'Cities',
        'singular_name'              => 'City',
        'menu_name'                  => 'Cities',
        'all_items'                  => 'All Cities',
        'parent_item'                => 'Parent City',
        'parent_item_colon'          => 'Parent City:',
        'new_item_name'              => 'New City Name',
        'add_new_item'               => 'Add New City',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'city', 'listing', $args );
}

// Register Taxonomy for Country
function custom_listing_country_taxonomy() {
    $labels = array(
        'name'                       => 'Countries',
        'singular_name'              => 'Country',
        'menu_name'                  => 'Countries',
        'all_items'                  => 'All Countries',
        'new_item_name'              => 'New Country Name',
        'add_new_item'               => 'Add New Country',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'country', 'listing', $args );
}

function custom_listing_states_taxonomy() {
    $labels = array(
        'name'                       => 'States',
        'singular_name'              => 'State',
        'menu_name'                  => 'States',
        'all_items'                  => 'All States',
        'add_new_item'               => 'Add New State',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'state', 'listing', $args );
}

