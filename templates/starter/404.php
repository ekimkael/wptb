<?php

/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage YourThemeName
 * @since 1.0.0
 */

get_header();
?>

<section>
  <h1>Page not found</h1>
  <a href="<?php echo home_url() ?>">Back to home page</a>
</section>


<?php get_footer(); ?>