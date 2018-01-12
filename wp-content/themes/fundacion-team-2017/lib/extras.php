<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * inline svg helper
 */
function ungrynerd_svg($svg) {
  $output = '';
  if (empty($svg)) {
    return;
  }
  $svg_file_path = \get_template_directory() . "/dist/images/" . $svg . ".svg";
  ob_start();
  include($svg_file_path);
  $output .= ob_get_clean();
  return $output;
}

/**
 * return post type friendly name
 */
function ungrynerd_post_type($type='post') {
  $friendlys = array(
    'post' => esc_html__('Noticia', 'ungrynerd'),
    'runner' => esc_html__('Corredor', 'ungrynerd')
  );

  echo (isset($friendlys[$type]) ? $friendlys[$type] : $type);
}

add_action( 'init', __NAMESPACE__ . '\ungrynerd_post_type_sponsor');
function ungrynerd_post_type_sponsor() {
  $labels = array(
    'name' => __('Sponsors', 'ungrynerd'),
    'singular_name' => __('Sponsor', 'ungrynerd'),
    'add_new' => __('Añadir Sponsor', 'ungrynerd'),
    'add_new_item' => __('Añadir Sponsor', 'ungrynerd'),
    'edit_item' => __('Editar Sponsor', 'ungrynerd'),
    'new_item' => __('Nuevo Sponsor', 'ungrynerd'),
    'view_item' => __('Ver Sponsors', 'ungrynerd'),
    'search_items' => __('Buscar Sponsors', 'ungrynerd'),
    'not_found' =>  __('No se han encontrado Sponsors ', 'ungrynerd'),
    'not_found_in_trash' => __('No hay Sponsors en la papelera', 'ungrynerd'),
    'parent_item_colon' => ''
  );

  register_post_type('sponsor', array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'sponsor' ),
    'taxonomies' => array(),
    'has_archive' => true,
    'supports' => array('title', 'thumbnail')
  ));
}
