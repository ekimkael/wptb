<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Favicon here -->
  <link rel="shortcut icon" type="image/png" href="<?php echo (THEME_URI); ?>/images/favicon.png">
  <!-- Fonts here -->

  <!-- wp-head & css files -->
  <?php wp_head(); ?>

</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand text-primary" href="<?php echo esc_url(home_url('/')); ?>">
        <?php $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if (has_custom_logo()) {
          echo '<img class="d-inline-block align-top" src="' . esc_url($logo[0]) . '"  width="30" height="30" alt="' . esc_attr(get_bloginfo('name', 'display')) . '">';
          echo bloginfo("name");
        } else {
          echo bloginfo("name");
        } ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-lg-end" id="mobileMenu">
        <?php
        echo preg_replace(
          '#<li[^>]+>#',
          '<li class="nav-item">',
          wp_nav_menu(
            array(
              'theme_location'    => '',
              'container'         => false,
              'items_wrap'        => '<ul class="navbar-nav">%3$s</ul>',
              'depth'             => 0,
              'echo'              => false
            )
          )
        );
        ?>
      </div>
    </div>
  </nav>