<?php
  // Index file

 get_header();
 ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!-- post -->
  <div class="container">

        <?php the_content(); ?>

  </div>
  <?php endwhile; ?>
  <!-- post navigation -->

  <?php else: ?>
  <!-- no posts found -->
  <div>
    <?php get_template_part( 'content', 'none' ); ?>
  </div>
  <?php endif; ?>


  <?php print_modals(); ?>

<?php
get_footer();
