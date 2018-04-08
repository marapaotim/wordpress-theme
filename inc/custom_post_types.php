<?php
// Our custom post type function
function create_experience_post_type() {
 
    register_post_type( 'experiences',
    // CPT Options
        array(
            'labels' 	=> array(
                'name' 			=> __( 'Experiences' ),
                'singular_name' => __( 'Experience' )
            ),
            'public' 		=> true,
            'has_archive' 	=> true,
            'rewrite' 		=> array(
            	'slug' => 'experiences'
            ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_experience_post_type' );

/*
* Creating a function to create our CPT
*/
 
function experience_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Experiences', 'Post Type General Name', 'myfirsttheme' ),
        'singular_name'       => _x( 'Experience', 'Post Type Singular Name', 'myfirsttheme' ),
        'menu_name'           => __( 'Experiences', 'myfirsttheme' ),
        'parent_item_colon'   => __( 'Parent Experiences', 'myfirsttheme' ),
        'all_items'           => __( 'All Experiences', 'myfirsttheme' ),
        'view_item'           => __( 'View Experience', 'myfirsttheme' ),
        'add_new_item'        => __( 'Add New Experience', 'myfirsttheme' ),
        'add_new'             => __( 'Add New', 'myfirsttheme' ),
        'edit_item'           => __( 'Edit Experience', 'myfirsttheme' ),
        'update_item'         => __( 'Update Experience', 'myfirsttheme' ),
        'search_items'        => __( 'Search Experience', 'myfirsttheme' ),
        'not_found'           => __( 'Not Found', 'myfirsttheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'myfirsttheme' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'experiences', 'myfirsttheme' ),
        'description'         => __( 'Experience news and reviews', 'myfirsttheme' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'work' ),
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
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'experiences', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'experience_post_type', 0 );



function create_portfolio_post_type() {
 
    register_post_type( 'portfolios', 
        array(
            'labels' 	=> array(
                'name' 			=> __( 'Portfolios' ),
                'singular_name' => __( 'Portfolio' )
            ),
            'public' 		=> true,
            'has_archive' 	=> true,
            'rewrite' 		=> array(
            	'slug' => 'portfolios'
            ),
        )
    );

}

add_action( 'init', 'create_portfolio_post_type' );


function portfolio_post_type() {

    $labels = array(
        'name'                => _x( 'Portfolios', 'Post Type General Name', 'myfirsttheme' ),
        'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'myfirsttheme' ),
        'menu_name'           => __( 'Portfolios', 'myfirsttheme' ),
        'parent_item_colon'   => __( 'Parent Portfolios', 'myfirsttheme' ),
        'all_items'           => __( 'All Portfolios', 'myfirsttheme' ),
        'view_item'           => __( 'View Portfolio', 'myfirsttheme' ),
        'add_new_item'        => __( 'Add New Portfolio', 'myfirsttheme' ),
        'add_new'             => __( 'Add New', 'myfirsttheme' ),
        'edit_item'           => __( 'Edit Portfolio', 'myfirsttheme' ),
        'update_item'         => __( 'Update Portfolio', 'myfirsttheme' ),
        'search_items'        => __( 'Search Portfolio', 'myfirsttheme' ),
        'not_found'           => __( 'Not Found', 'myfirsttheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'myfirsttheme' ),
    );
     
    $args = array(
        'label'               => __( 'portfolios', 'myfirsttheme' ),
        'description'         => __( 'Portfolio news and reviews', 'myfirsttheme' ),
        'labels'              => $labels, 
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ), 
        'taxonomies'          => array( 'projects' ), 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'portfolios', $args );
 
} 
 
add_action( 'init', 'portfolio_post_type', 0 );