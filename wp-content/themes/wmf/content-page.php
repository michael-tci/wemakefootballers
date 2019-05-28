<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="container">
    <div class="row">
      <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content" id="entry-content">


    <?php if( get_the_ID() == '279' || get_the_ID() == '4277' ) { // homepage ?>

    <div class="wmf_hd" style="display:none;">How do we make footballers?</div>
   

    <?php 

  /*  if ( wp_is_mobile() ) { 

        putRevSlider('hs-mobile', 'homepage'); 

      } else {

       putRevSlider('hslider','homepage');

      } */

    }
   

    //show page content
    the_content(); 

   ?>
  </div><!-- .entry-content -->

</article><!-- #post-## -->
