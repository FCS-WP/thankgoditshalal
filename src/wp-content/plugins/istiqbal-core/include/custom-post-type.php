<?php

/**
 * Initialize Custom Post Type - Istiqbal Theme
 */

function istiqbal_custom_post_type() {


  $service_cpt = (istiqbal_framework_active()) ? cs_get_option('theme_service_name') : '';
  $service_slug = (istiqbal_framework_active()) ? cs_get_option('theme_service_slug') : '';
  $service_cpt_slug = (istiqbal_framework_active()) ? cs_get_option('theme_service_cat_slug') : '';

  $base = (isset($service_cpt_slug) && $service_cpt_slug !== '') ? sanitize_title_with_dashes($service_cpt_slug) : ((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');
  $base_slug = (isset($service_slug) && $service_slug !== '') ? sanitize_title_with_dashes($service_slug) : ((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');
  $label = ucfirst((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');

  // Register custom post type - Service
  register_post_type(
    'service',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'istiqbal-core'), $label),
        'all_items' => sprintf(esc_html__('All %s', 'istiqbal-core'), $label),
        'add_new' => esc_html__('Add New', 'istiqbal-core'),
        'add_new_item' => sprintf(esc_html__('Add New %s', 'istiqbal-core'), $label),
        'edit' => esc_html__('Edit', 'istiqbal-core'),
        'edit_item' => sprintf(esc_html__('Edit %s', 'istiqbal-core'), $label),
        'new_item' => sprintf(esc_html__('New %s', 'istiqbal-core'), $label),
        'view_item' => sprintf(esc_html__('View %s', 'istiqbal-core'), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'istiqbal-core'), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'istiqbal-core'),
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'istiqbal-core'),
        'parent_item_colon' => ''
      ),
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-edit-page',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'elementor',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Service
  register_taxonomy(
    'service_category',
    'service',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__('%s Categories', 'istiqbal-core'), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'istiqbal-core'), $label),
        'search_items' =>  sprintf(esc_html__('Search %s Categories', 'istiqbal-core'), $label),
        'all_items' => sprintf(esc_html__('All %s Categories', 'istiqbal-core'), $label),
        'parent_item' => sprintf(esc_html__('Parent %s Category', 'istiqbal-core'), $label),
        'parent_item_colon' => sprintf(esc_html__('Parent %s Category:', 'istiqbal-core'), $label),
        'edit_item' => sprintf(esc_html__('Edit %s Category', 'istiqbal-core'), $label),
        'update_item' => sprintf(esc_html__('Update %s Category', 'istiqbal-core'), $label),
        'add_new_item' => sprintf(esc_html__('Add New %s Category', 'istiqbal-core'), $label),
        'new_item_name' => sprintf(esc_html__('New %s Category Name', 'istiqbal-core'), $label)
      ),
      'rewrite' => array('slug' => $base . '_cat'),
    )
  );

  $service_custom_taxonomies = (istiqbal_framework_active()) ? cs_get_option('service_custom_taxonomies') : '';
  $counter = 0;
  if ($service_custom_taxonomies) {
    foreach ($service_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'service_' . $own_id,
        'service',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__('%s ' . $heading, 'istiqbal-core'), $label),
            'singular_name' => sprintf(esc_html__('%s ' . $heading, 'istiqbal-core'), $label),
            'search_items' =>  sprintf(esc_html__('Search %s ' . $heading, 'istiqbal-core'), $label),
            'all_items' => sprintf(esc_html__('All %s ' . $heading, 'istiqbal-core'), $label),
            'parent_item' => sprintf(esc_html__('Parent %s ' . $heading, 'istiqbal-core'), $label),
            'parent_item_colon' => sprintf(esc_html__('Parent %s :.$heading', 'istiqbal-core'), $label),
            'edit_item' => sprintf(esc_html__('Edit %s ' . $heading, 'istiqbal-core'), $label),
            'update_item' => sprintf(esc_html__('Update %s ' . $heading, 'istiqbal-core'), $label),
            'add_new_item' => sprintf(esc_html__('Add New %s ' . $heading, 'istiqbal-core'), $label),
            'new_item_name' => sprintf(esc_html__('New %s ' . $heading . ' Name', 'istiqbal-core'), $label)
          ),
          'rewrite' => array('slug' => 'service_' . $own_id),
        )
      );
    }
  }


  $event_cpt = (istiqbal_framework_active()) ? cs_get_option('theme_event_name') : '';
  $event_slug = (istiqbal_framework_active()) ? cs_get_option('theme_event_slug') : '';
  $event_cpt_slug = (istiqbal_framework_active()) ? cs_get_option('theme_event_cat_slug') : '';

  $base = (isset($event_cpt_slug) && $event_cpt_slug !== '') ? sanitize_title_with_dashes($event_cpt_slug) : ((isset($event_cpt) && $event_cpt !== '') ? strtolower($event_cpt) : 'event');
  $base_slug = (isset($event_slug) && $event_slug !== '') ? sanitize_title_with_dashes($event_slug) : ((isset($event_cpt) && $event_cpt !== '') ? strtolower($event_cpt) : 'event');
  $label = ucfirst((isset($event_cpt) && $event_cpt !== '') ? strtolower($event_cpt) : 'event');

  // Register custom post type - Service
  register_post_type('event',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'istiqbal-core' ), $label),
        'all_items' => sprintf(esc_html__('All %s', 'istiqbal-core' ), $label),
        'add_new' => esc_html__('Add New', 'istiqbal-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'istiqbal-core' ), $label),
        'edit' => esc_html__('Edit', 'istiqbal-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'istiqbal-core' ), $label),
        'new_item' => sprintf(esc_html__('New %s', 'istiqbal-core' ), $label),
        'view_item' => sprintf(esc_html__('View %s', 'istiqbal-core' ), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'istiqbal-core' ), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'istiqbal-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'istiqbal-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-calendar',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'elementor',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Service
  register_taxonomy(
    'event_category',
    'event',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'istiqbal-core' ), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'istiqbal-core'), $label),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'istiqbal-core'), $label),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'istiqbal-core'), $label),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'istiqbal-core'), $label),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'istiqbal-core'), $label),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'istiqbal-core'), $label),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'istiqbal-core'), $label),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'istiqbal-core'), $label),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'istiqbal-core'), $label)
      ),
      'rewrite' => array( 'slug' => $base . '_cat' ),
    )
  );

  $event_custom_taxonomies = (istiqbal_framework_active()) ? cs_get_option('event_custom_taxonomies') : '';
  $counter = 0;
  if ($event_custom_taxonomies) {
    foreach ($event_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'event_'.$own_id,
        'event',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__( '%s '.$heading, 'istiqbal-core' ), $label),
            'singular_name' => sprintf(esc_html__('%s '.$heading, 'istiqbal-core'), $label),
            'search_items' =>  sprintf(esc_html__( 'Search %s '.$heading, 'istiqbal-core'), $label),
            'all_items' => sprintf(esc_html__( 'All %s '.$heading, 'istiqbal-core'), $label),
            'parent_item' => sprintf(esc_html__( 'Parent %s '.$heading, 'istiqbal-core'), $label),
            'parent_item_colon' => sprintf(esc_html__( 'Parent %s :.$heading', 'istiqbal-core'), $label),
            'edit_item' => sprintf(esc_html__( 'Edit %s '.$heading, 'istiqbal-core'), $label),
            'update_item' => sprintf(esc_html__( 'Update %s '.$heading, 'istiqbal-core'), $label),
            'add_new_item' => sprintf(esc_html__( 'Add New %s '.$heading, 'istiqbal-core'), $label),
            'new_item_name' => sprintf(esc_html__( 'New %s '.$heading.' Name', 'istiqbal-core'), $label)
          ),
          'rewrite' => array( 'slug' => 'event_'.$own_id),
        )
      );
    }
  }


  // Register custom post type - Project
  register_post_type('headerbuilder',
    array(
      'labels' => array(
        'name' => esc_html__('Header Builder', 'istiqbal-core' ),
        'singular_name' => esc_html__('Header', 'istiqbal-core' ),
        'all_items' => esc_html__('All Header', 'istiqbal-core' ),
        'add_new' => esc_html__('Add New', 'istiqbal-core') ,
        'add_new_item' => esc_html__('Add New Header', 'istiqbal-core' ),
        'edit' => esc_html__('Edit', 'istiqbal-core') ,
        'edit_item' => esc_html__('Edit Header', 'istiqbal-core' ),
        'new_item' => esc_html__('New Header', 'istiqbal-core' ),
        'view_item' => esc_html__('View Header', 'istiqbal-core' ),
        'search_items' => esc_html__('Search Header', 'istiqbal-core' ),
        'not_found' => esc_html__('Nothing found in the Database.', 'istiqbal-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'istiqbal-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'menu_icon' => 'dashicons-heading',
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array(
        'title',
        'elementor',
      )
    )
  );
  // Registered

  // Register custom post type - Project
  register_post_type('footerbuilder',
    array(
      'labels' => array(
        'name' => esc_html__('Footer Builder', 'istiqbal-core' ),
        'singular_name' => esc_html__('Footer', 'istiqbal-core' ),
        'all_items' => esc_html__('All Footer', 'istiqbal-core' ),
        'add_new' => esc_html__('Add New', 'istiqbal-core') ,
        'add_new_item' => esc_html__('Add New Footer', 'istiqbal-core' ),
        'edit' => esc_html__('Edit', 'istiqbal-core') ,
        'edit_item' => esc_html__('Edit Footer', 'istiqbal-core' ),
        'new_item' => esc_html__('New Footer', 'istiqbal-core' ),
        'view_item' => esc_html__('View Footer', 'istiqbal-core' ),
        'search_items' => esc_html__('Search Footer', 'istiqbal-core' ),
        'not_found' => esc_html__('Nothing found in the Database.', 'istiqbal-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'istiqbal-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'menu_icon' => 'dashicons-align-center',
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array(
        'title',
        'elementor',
      )
    )
  );
  // Registered


  // Team Start

  $team_cpt = (istiqbal_framework_active()) ? cs_get_option('theme_team_name') : '';
  $team_slug = (istiqbal_framework_active()) ? cs_get_option('theme_team_slug') : '';
  $team_cpt_slug = (istiqbal_framework_active()) ? cs_get_option('theme_team_cat_slug') : '';

  $base = (isset($team_cpt_slug) && $team_cpt_slug !== '') ? sanitize_title_with_dashes($team_cpt_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
  $base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
  $label = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

  // Register custom post type - Team
  register_post_type('team',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'istiqbal-core' ), $label),
        'all_items' => sprintf(esc_html__('All %s', 'istiqbal-core' ), $label),
        'add_new' => esc_html__('Add New', 'istiqbal-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'istiqbal-core' ), $label),
        'edit' => esc_html__('Edit', 'istiqbal-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'istiqbal-core' ), $label),
        'new_item' => sprintf(esc_html__('New %s', 'istiqbal-core' ), $label),
        'view_item' => sprintf(esc_html__('View %s', 'istiqbal-core' ), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'istiqbal-core' ), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'istiqbal-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'istiqbal-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-businessperson',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Team
  register_taxonomy(
    'team_category',
    'team',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'istiqbal-core' ), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'istiqbal-core'), $label),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'istiqbal-core'), $label),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'istiqbal-core'), $label),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'istiqbal-core'), $label),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'istiqbal-core'), $label),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'istiqbal-core'), $label),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'istiqbal-core'), $label),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'istiqbal-core'), $label),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'istiqbal-core'), $label)
      ),
      'rewrite' => array( 'slug' => $base . '_cat' ),
    )
  );

  $team_custom_taxonomies = (istiqbal_framework_active()) ? cs_get_option('team_custom_taxonomies') : '';
  $counter = 0;
  if ($team_custom_taxonomies) {
    foreach ($team_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'team_'.$own_id,
        'team',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__( '%s '.$heading, 'istiqbal-core' ), $label),
            'singular_name' => sprintf(esc_html__('%s '.$heading, 'istiqbal-core'), $label),
            'search_items' =>  sprintf(esc_html__( 'Search %s '.$heading, 'istiqbal-core'), $label),
            'all_items' => sprintf(esc_html__( 'All %s '.$heading, 'istiqbal-core'), $label),
            'parent_item' => sprintf(esc_html__( 'Parent %s '.$heading, 'istiqbal-core'), $label),
            'parent_item_colon' => sprintf(esc_html__( 'Parent %s :.$heading', 'istiqbal-core'), $label),
            'edit_item' => sprintf(esc_html__( 'Edit %s '.$heading, 'istiqbal-core'), $label),
            'update_item' => sprintf(esc_html__( 'Update %s '.$heading, 'istiqbal-core'), $label),
            'add_new_item' => sprintf(esc_html__( 'Add New %s '.$heading, 'istiqbal-core'), $label),
            'new_item_name' => sprintf(esc_html__( 'New %s '.$heading.' Name', 'istiqbal-core'), $label)
          ),
          'rewrite' => array( 'slug' => 'team_'.$own_id),
        )
      );
    }
  }

  
    

}




// After Theme Setup
function istiqbal_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	istiqbal_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'istiqbal_custom_flush_rules');
add_action('init', 'istiqbal_custom_post_type');


/* ---------------------------------------------------------------------------
 * Custom columns - Service
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-event_columns", "istiqbal_event_edit_columns");
function istiqbal_event_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = esc_html__('Title', 'istiqbal-core' );
  $new_columns['thumbnail'] = esc_html__('Image', 'istiqbal-core' );
  $new_columns['date'] = esc_html__('Date', 'istiqbal-core' );

  return $new_columns;
}

add_action('manage_event_posts_custom_column', 'istiqbal_manage_event_columns', 10, 2);
function istiqbal_manage_event_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}



