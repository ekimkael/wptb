<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-7 mx-auto">
      <!-- article's content here -->
      <?php if (have_posts()) { ?>
        <?php while (have_posts()) : the_post(); ?>
          <article><?php the_content(); ?></article>
        <?php endwhile; ?>
      <?php }; ?>
      <!-- End article's content -->
    </div>
  </div>
</div>

<?php get_footer(); ?>