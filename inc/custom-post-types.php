<?php
/*-----------------------------------------------------------------------------
Register Custom Post Types
-----------------------------------------------------------------------------*/

// Register Custom Post Type
function ministries_post_type()
{

    $labels = array(
        'name' => _x('Ministries', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Ministry', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Ministries', 'text_domain'),
        'name_admin_bar' => __('Ministry', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Ministry:', 'text_domain'),
        'all_items' => __('All Ministries', 'text_domain'),
        'add_new_item' => __('Add New Ministry', 'text_domain'),
        'add_new' => __('New Ministry', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Ministry', 'text_domain'),
        'update_item' => __('Update Ministry', 'text_domain'),
        'view_item' => __('View Ministry', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search ministries', 'text_domain'),
        'not_found' => __('No ministries found', 'text_domain'),
        'not_found_in_trash' => __('No ministries found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Ministry', 'text_domain'),
        'description' => __('Ministry information pages.', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('ministry', $args);

}
add_action('init', 'ministries_post_type', 0);

// Register Custom Post Type
function staff_post_type()
{

    $labels = array(
        'name' => _x('Staff', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Staff Member', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Staff', 'text_domain'),
        'name_admin_bar' => __('Staff Member', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Staff:', 'text_domain'),
        'all_items' => __('All Staff', 'text_domain'),
        'add_new_item' => __('Add New Staff Member', 'text_domain'),
        'add_new' => __('New Staff Member', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Staff Member', 'text_domain'),
        'update_item' => __('Update Staff Member', 'text_domain'),
        'view_item' => __('View Staff Member', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search staff', 'text_domain'),
        'not_found' => __('No staff found', 'text_domain'),
        'not_found_in_trash' => __('No staff found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Staff Member', 'text_domain'),
        'description' => __('Staff Member information pages.', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('staff', $args);

}
add_action('init', 'staff_post_type', 0);

// Register Custom Post Type
function cta_post_type()
{

    $labels = array(
        'name' => _x('Calls to Action', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('CTA', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Calls to Action', 'text_domain'),
        'name_admin_bar' => __('CTA', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent CTA:', 'text_domain'),
        'all_items' => __('All CTAs', 'text_domain'),
        'add_new_item' => __('Add New CTA', 'text_domain'),
        'add_new' => __('New CTA', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit CTA', 'text_domain'),
        'update_item' => __('Update CTA', 'text_domain'),
        'view_item' => __('View CTA', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Calls to Action', 'text_domain'),
        'not_found' => __('No CTA found', 'text_domain'),
        'not_found_in_trash' => __('No CTA found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('CTA', 'text_domain'),
        'description' => __('CTA information pages.', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('Calls to Action', $args);

}
add_action('init', 'cta_post_type', 0);

// Register Custom Post Type
function servicetime_post_type()
{

    $labels = array(
        'name' => _x('Service Times', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Service Time', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Service Times', 'text_domain'),
        'name_admin_bar' => __('Service Time', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Service Time:', 'text_domain'),
        'all_items' => __('All Service Times', 'text_domain'),
        'add_new_item' => __('Add New Service Time', 'text_domain'),
        'add_new' => __('New Service Time', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Service Time', 'text_domain'),
        'update_item' => __('Update Service Time', 'text_domain'),
        'view_item' => __('View Service Time', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Service Times', 'text_domain'),
        'not_found' => __('No Service Time found', 'text_domain'),
        'not_found_in_trash' => __('No Service Time found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Service Time', 'text_domain'),
        'description' => __('Service Time information pages.', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('Service Times', $args);

}
add_action('init', 'servicetime_post_type', 0);

// Register Custom Post Type
function feature_cta_post_type()
{

    $labels = array(
        'name' => _x('Feature CTAs', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Feature CTA', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Feature CTAs', 'text_domain'),
        'name_admin_bar' => __('Feature CTA', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Feature CTA:', 'text_domain'),
        'all_items' => __('All Feature CTAs', 'text_domain'),
        'add_new_item' => __('Add New Feature CTA', 'text_domain'),
        'add_new' => __('New Feature CTA', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Feature CTA', 'text_domain'),
        'update_item' => __('Update Feature CTA', 'text_domain'),
        'view_item' => __('View Feature CTA', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Feature CTAs', 'text_domain'),
        'not_found' => __('No Feature CTA found', 'text_domain'),
        'not_found_in_trash' => __('No Feature CTA found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Feature CTA', 'text_domain'),
        'description' => __('Feature CTA information pages.', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'comments', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('Feature CTAs', $args);

}
add_action('init', 'feature_cta_post_type', 0);