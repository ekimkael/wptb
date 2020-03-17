<?php

define("THEME_URI", get_template_directory_uri());
define("THEME_PATH", get_template_directory());

// functions
function [THEME_SCRIPTS]()
{
  // css files
  wp_enqueue_style('bootstrap', THEME_URI . '/css/bootstrap.min.css');
  wp_enqueue_style('main', THEME_URI . '/css/main.css');
  wp_enqueue_style('stylesheet', get_stylesheet_uri());

  // javascript files
  wp_enqueue_script('bootstrapjs', THEME_URI . '/js/bootstrap.min.js', array('jquery'), false, false);
  wp_enqueue_script('mainjs', THEME_URI . '/js/main.js', array(), false, false);
}

// add hooks
add_action("wp_enqueue_scripts", "[THEME_SCRIPTS]");
add_theme_support("title-tag");
add_theme_support("menus");
