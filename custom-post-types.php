<?php 
add_action( 'init', 'custom_post_type_activities', 0 );
add_action( 'init', 'custom_post_type_itineraries', 0 );


// ====== Properties
function custom_post_type_activities() {

    $labels = array(
        'name'                => _x( 'Activities', 'Post Type General Name'),
        'singular_name'       => _x( 'Activity',  'Post Type Singular Name'),
        'menu_name'           => __( 'Activities'),
        'parent_item_colon'   => __( 'Activities'),
        'all_items'           => __( 'All Activities'),
        'view_item'           => __( 'View Activities'),
        'add_new_item'        => __( 'Add New Activity'),
        'add_new'             => __( 'Add Activity' ),
        'edit_item'           => __( 'Edit Activity' ),
        'update_item'         => __( 'Update Activity' ),
        'search_items'        => __( 'Search Activities' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'activities' ),
        'description'         => __( 'activities'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-pets',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'activities', $args );
}

// ====== Itineraries
function custom_post_type_itineraries() {

    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name'),
        'singular_name'       => _x( 'Itinerary',  'Post Type Singular Name'),
        'menu_name'           => __( 'Itineraries'),
        'parent_item_colon'   => __( 'Itineraries'),
        'all_items'           => __( 'All Itineraries'),
        'view_item'           => __( 'View Itineraries'),
        'add_new_item'        => __( 'Add New Itinerary'),
        'add_new'             => __( 'Add Itinerary' ),
        'edit_item'           => __( 'Edit Itinerary' ),
        'update_item'         => __( 'Update Itinerary' ),
        'search_items'        => __( 'Search Itineraries' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'itineraries' ),
        'description'         => __( 'itineraries'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-calendar-alt',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'itineraries', $args );
}
// ====== Type Sarafi Type
function taxonomy_safaritype() {

    $labels = array(
        'name'              => _x( 'Safari Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Safari Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Safari Types'   ),
        'all_items'         => __( 'All Safari Types'     ),
        'parent_item'       => __( 'Parent Safari Type'   ),
        'parent_item_colon' => __( 'Parent Safari Type:'  ),
        'edit_item'         => __( 'Edit Safari Type'     ),
        'update_item'       => __( 'Update Safari Type'   ),
        'add_new_item'      => __( 'Add New Safari Type'  ),
        'new_item_name'     => __( 'New Safari Type' ),
        'menu_name'         => __( 'Safari Types'         )
    );

    register_taxonomy( 'safaritype', array( 'activities', 'itineraries' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'safaritype', 'hierarchical' => true )
    ));
}
// ====== Type Destination
function taxonomy_destination() {

    $labels = array(
        'name'              => _x( 'Destinations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Destinations'   ),
        'all_items'         => __( 'All Destinations'     ),
        'parent_item'       => __( 'Parent Destination'   ),
        'parent_item_colon' => __( 'Parent Destinations:'  ),
        'edit_item'         => __( 'Edit Destinations'     ),
        'update_item'       => __( 'Update Destination'   ),
        'add_new_item'      => __( 'Add New Destination'  ),
        'new_item_name'     => __( 'New Destination' ),
        'menu_name'         => __( 'Destinations'         )
    );

    register_taxonomy( 'destination', array(  'activities', 'itineraries' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destination', 'hierarchical' => true )
    ));
}
// ====== Type Seasons
function taxonomy_seasons() {

    $labels = array(
        'name'              => _x( 'Seasons', 'taxonomy general name' ),
        'singular_name'     => _x( 'Season', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Seasons'   ),
        'all_items'         => __( 'All Seasons'     ),
        'parent_item'       => __( 'Parent Season'   ),
        'parent_item_colon' => __( 'Parent Season'  ),
        'edit_item'         => __( 'Edit Season'     ),
        'update_item'       => __( 'Update Property Style'   ),
        'add_new_item'      => __( 'Add New Season'  ),
        'new_item_name'     => __( 'New Season' ),
        'menu_name'         => __( 'Season'         )
    );

    register_taxonomy( 'season', array(  'activities', 'itineraries'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'season', 'hierarchical' => true )
    ));
}
// ====== Type Property Style
function taxonomy_propertystyle() {

    $labels = array(
        'name'              => _x( 'Property Style', 'taxonomy general name' ),
        'singular_name'     => _x( 'Property Style', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Property Styles'   ),
        'all_items'         => __( 'All Property Styles'     ),
        'parent_item'       => __( 'Parent Property Style'   ),
        'parent_item_colon' => __( 'Parent Property Style:'  ),
        'edit_item'         => __( 'Edit Property Style'     ),
        'update_item'       => __( 'Update Property Style'   ),
        'add_new_item'      => __( 'Add New Property Style'  ),
        'new_item_name'     => __( 'New Property Style' ),
        'menu_name'         => __( 'Property Style'         )
    );

    register_taxonomy( 'propertystyle', array(  'properties', 'itineraries'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'propertystyle', 'hierarchical' => true )
    ));
}






add_action( 'init', 'taxonomy_seasons', 0 );
add_action( 'init', 'taxonomy_safaritype', 0 );
add_action( 'init', 'taxonomy_destination', 0 );
add_action( 'init', 'taxonomy_propertystyle', 0 );