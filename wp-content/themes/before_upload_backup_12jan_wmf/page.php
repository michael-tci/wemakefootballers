<?php if( is_multisite() && !is_main_site() ) : ?>
  <?php get_template_part('page', 'location-dashboard'); ?>
<?php else : ?>

  <?php get_header();  ?>

  <?php
  while ( have_posts() ) :
    the_post();

    // Include the page content template.
    get_template_part( 'content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    //   comments_template();
    // endif;

  endwhile;
  ?>

  <?php if(!is_front_page()) : ?>
    <?php  get_template_part( 'header/header', 'searchform' ); ?>
  <?php endif; ?>
  <?php get_footer(); ?>
<?php endif; ?>
