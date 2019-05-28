<?php
/*
Template Name: Home
*/
if( is_multisite() && !is_main_site() ) : ?>
  <?php get_template_part('page', 'location-dashboard'); ?>
<?php else : ?>

  <?php get_header();  ?>

  <?php
  while ( have_posts() ) :
    the_post();

    get_template_part( 'content', 'homepage' );

  endwhile;
  ?>
  <?php if(!is_front_page()) : ?>
    <?php  get_template_part( 'header/header', 'searchform' ); ?>
  <?php endif; ?>
  <?php get_footer(); ?>
<?php endif; ?>