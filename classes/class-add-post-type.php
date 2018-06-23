<?php

class add_post_type {
    public function __construct() {
        add_action( 'init', array ( $this, 'nb_custom_post_type' ) );
        
    }

    function nb_custom_post_type() {

        $update_menu_name = get_option('update_menu_name',true);
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Person CPT', 'Post Type General Name', '' ),
            'singular_name'       => _x( 'Person', 'Post Type Singular Name', '' ),
            'menu_name'           => __( 'Person CPT', '' ),
            'parent_item_colon'   => __( 'Parent Person', '' ),
            'all_items'           => __( 'All Person', '' ),
            'view_item'           => __( 'View Person', '' ),
            'add_new'             => __( 'Add Person', '' ),
            'edit_item'           => __( 'Edit Person', '' ),
            'update_item'         => __( 'Update Person', '' ),
            'search_items'        => __( 'Search Person', '' ),
            'not_found'           => __( 'Not Found', '' ),
            'not_found_in_trash'  => __( 'Not found in Trash', '' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Person', '' ),
            'description'         => __( 'Person news and reviews', '' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'			  => 'dashicons-businessman',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
         
        // Registering your Custom Post Type
        register_post_type( 'Person', $args );
    }


    /*Code for short code-display*/
    
}

$obj_post_type = new add_post_type();