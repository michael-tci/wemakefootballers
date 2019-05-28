<?php
/*
Template Name: Single Page
*/

get_header(); ?>

  <div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">


      		<div class="newswrap">


          <?php
          // Start the loop.
          while ( have_posts() ) : the_post();
          	
          	
	            get_template_part( 'content', 'page-news' );
            // the_content();

            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;

          endwhile;

          ?>

        
        
        
      </div><!-- .wmf-news-body -->
      
      
      
      

    </main><!-- .site-main -->
  </div><!-- .content-area -->

<?php get_footer(); ?>
