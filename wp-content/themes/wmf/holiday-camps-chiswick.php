<?php
/*
Template Name: Holiday camps Chiswick
*/

 if( !is_multisite() && is_main_site() ) : ?>
  <?php get_template_part('page', ''); ?>
<?php else : ?>

  <?php get_header('local');  ?>

  <?php
  while ( have_posts() ) :
    the_post();

    // Include the page content template.
    get_template_part( 'content', 'hldcw' );

    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    //   comments_template();
    // endif;

  endwhile;
  ?>

  <?php get_footer(); ?>
<?php endif; ?>