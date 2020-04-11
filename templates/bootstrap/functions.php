<?php

define("THEME_URI", get_template_directory_uri());
define("THEME_PATH", get_template_directory());

// functions
function theme_title_separator()
{
  return "|";
}

function menu_anchor_class($atts, $item, $args)
{
  $class = 'nav-link'; // or something based on $item
  $atts['class'] = $class;
  return $atts;
}

function theme_supports()
{
  add_theme_support("title-tag");
  add_theme_support("menus");
  add_theme_support('post-thumbnails');
}

function theme_scripts()
{
  // register styles and js files 
  wp_register_style('bootstrap', THEME_URI . '/css/bootstrap.min.css');
  wp_register_style('main', THEME_URI . '/css/main.css');
  wp_register_style('stylesheet', get_stylesheet_uri());
  wp_register_script('bootstrapjs', THEME_URI . '/js/bootstrap.min.js', array('jquery'), false, true);
  wp_register_script('mainjs', THEME_URI . '/js/main.js', array(), false, true);

  // css files
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('main');
  wp_enqueue_style('stylesheet');

  // javascript files
  wp_enqueue_script('bootstrapjs');
  wp_enqueue_script('mainjs');
}

// ======= Hooks =======
// actions
add_action("after_setup_theme", "theme_supports");
add_action("wp_enqueue_scripts", "theme_scripts");

// filters
add_filter("document_title_separator", "theme_title_separator");
add_filter('nav_menu_link_attributes', 'menu_anchor_class', 10, 3);
