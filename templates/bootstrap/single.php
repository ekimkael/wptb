<?php get_header(); ?>

<!-- article's content here -->
<?php if (have_posts()) { ?>
  <?php while (have_posts()) : the_post(); ?>
    <article><?php the_content(); ?></article>
  <?php endwhile; ?>
<?php }; ?>
<!-- End article's content -->

<?php get_footer(); ?>