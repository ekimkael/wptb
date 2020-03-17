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

<main id="container" role="main">
  <div class="row justify-content-center py-5 my-5">
    <div class="col-md-6">
      <h1 class="display-4 text-center">
        <?php _e('Page Not Found', 'montrechic'); ?>
      </h1>

      <div class="d-flex flex-column justify-content-center">
        <p class="text-center py-4">
          <?php _e('The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'montrechic'); ?>
        </p>
        <a href="<?php echo home_url() ?>" class="btn btn-lg btn-outline-primary">Back to home page</a>
      </div>
    </div>
  </div><!-- .section-inner -->
</main><!-- #site-content -->

<?php get_footer(); ?>