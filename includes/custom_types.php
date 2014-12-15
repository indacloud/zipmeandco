<?php
add_action( 'init', 'zmc_custom_types' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function zmc_custom_types() {

  $labels_menus = array(
    'name'               => _x( 'Menus', 'post type general name', 'zmc' ),
    'singular_name'      => _x( 'Menu', 'post type singular name', 'zmc' ),
    'menu_name'          => _x( 'Menu', 'admin menu', 'zmc' ),
    'name_admin_bar'     => _x( 'Menu', 'add new on admin bar', 'zmc' ),
    'add_new'            => _x( 'Add New', 'book', 'zmc' ),
    'add_new_item'       => __( 'Add New Menu', 'zmc' ),
    'new_item'           => __( 'New Menu', 'zmc' ),
    'edit_item'          => __( 'Edit Menu', 'zmc' ),
    'view_item'          => __( 'View Menu', 'zmc' ),
    'all_items'          => __( 'All Menus', 'zmc' ),
    'search_items'       => __( 'Search Menus', 'zmc' ),
    'parent_item_colon'  => __( 'Parent Menus:', 'zmc' ),
    'not_found'          => __( 'No menus found.', 'zmc' ),
    'not_found_in_trash' => __( 'No menus found in Trash.', 'zmc' )
  );

  $args_menus = array(
    'labels'             => $labels_menus,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => 20,
    'supports'           => array( 'title', 'custom-fields', 'page-attributes' )
  );

  register_post_type( 'menus', $args_menus );


  $labels_modals = array(
    'name'               => _x( 'Modals', 'post type general name', 'zmc' ),
    'singular_name'      => _x( 'Modal', 'post type singular name', 'zmc' ),
    'menu_name'          => _x( 'Modal', 'admin menu', 'zmc' ),
    'name_admin_bar'     => _x( 'Modal', 'add new on admin bar', 'zmc' ),
    'add_new'            => _x( 'Add New', 'book', 'zmc' ),
    'add_new_item'       => __( 'Add New Modal', 'zmc' ),
    'new_item'           => __( 'New Modal', 'zmc' ),
    'edit_item'          => __( 'Edit Modal', 'zmc' ),
    'view_item'          => __( 'View Modal', 'zmc' ),
    'all_items'          => __( 'All Modals', 'zmc' ),
    'search_items'       => __( 'Search Modals', 'zmc' ),
    'parent_item_colon'  => __( 'Parent Modals:', 'zmc' ),
    'not_found'          => __( 'No modals found.', 'zmc' ),
    'not_found_in_trash' => __( 'No modals found in Trash.', 'zmc' )
  );

  $args_modals = array(
    'labels'             => $labels_modals,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'supports'           => array( 'title', 'editor', 'custom-fields' )
  );

  register_post_type( 'modals', $args_modals );

  $labels_products = array(
    'name'               => _x( 'Products', 'post type general name', 'zmc' ),
    'singular_name'      => _x( 'Product', 'post type singular name', 'zmc' ),
    'menu_name'          => _x( 'Product', 'admin menu', 'zmc' ),
    'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'zmc' ),
    'add_new'            => _x( 'Add New', 'book', 'zmc' ),
    'add_new_item'       => __( 'Add New Product', 'zmc' ),
    'new_item'           => __( 'New Product', 'zmc' ),
    'edit_item'          => __( 'Edit Product', 'zmc' ),
    'view_item'          => __( 'View Product', 'zmc' ),
    'all_items'          => __( 'All Products', 'zmc' ),
    'search_items'       => __( 'Search Products', 'zmc' ),
    'parent_item_colon'  => __( 'Parent Products:', 'zmc' ),
    'not_found'          => __( 'No product found.', 'zmc' ),
    'not_found_in_trash' => __( 'No product found in Trash.', 'zmc' )
  );

  $args_product = array(
    'labels'             => $labels_products,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => 20,
    'supports'           => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes' )
  );

  register_post_type( 'product', $args_product );

  $labels_testimonials = array(
    'name'               => _x( 'Testimonials', 'post type general name', 'zmc' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name', 'zmc' ),
    'menu_name'          => _x( 'Testimonial', 'admin menu', 'zmc' ),
    'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'zmc' ),
    'add_new'            => _x( 'Add New', 'book', 'zmc' ),
    'add_new_item'       => __( 'Add New Testimonial', 'zmc' ),
    'new_item'           => __( 'New Testimonial', 'zmc' ),
    'edit_item'          => __( 'Edit Testimonial', 'zmc' ),
    'view_item'          => __( 'View Testimonial', 'zmc' ),
    'all_items'          => __( 'All Testimonials', 'zmc' ),
    'search_items'       => __( 'Search Testimonials', 'zmc' ),
    'parent_item_colon'  => __( 'Parent Testimonials:', 'zmc' ),
    'not_found'          => __( 'No testimonial found.', 'zmc' ),
    'not_found_in_trash' => __( 'No testimonial found in Trash.', 'zmc' )
  );

  $args_testimonial = array(
    'labels'             => $labels_testimonials,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => 20,
    'supports'           => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes' )
  );

  register_post_type( 'testimonial', $args_testimonial );

}
?>