<?php
  // Index file

 get_header();
 ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!-- post -->
  <div>
    <h2><?php the_title(); ?></h2>
  </div>
  <?php endwhile; ?>
  <!-- post navigation -->

  <?php else: ?>
  <!-- no posts found -->
  <div>
    <?php get_template_part( 'content', 'none' ); ?>
  </div>
  <?php endif; ?>


<?php
get_footer();
