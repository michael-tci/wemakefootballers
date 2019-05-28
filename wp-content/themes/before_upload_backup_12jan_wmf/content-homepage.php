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

   <div class="article-newspost_bottom entry-content">
          <div class="jsn-bootstrap3 container">
              <div class="heading-section checkoutheading grey-secbg">
                  <h3 class="hedline-txt">Latest News</h3>
              </div>
          </div>

          <div class="jsn-bootstrap3 container">
              <div class="row latest-news-section grey-secbg">
                  <div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
                      <div class="widget recent-posts-widget-with-thumbnails">
                          <div id="rpwwt-recent_posts_widget_with_thumbnails" class="rpwwt-widget">
                              <?php dynamic_sidebar( 'latest_post'); ?>
                          </div>
                      </div>

                      <div class="jsn-bootstrap3 wr-element-container wr-element-text">
                          <div class="text-center">
                          <div class="btn btn-primary"><a href="<?php echo site_url(); ?>/news/">Read More</a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- article-newspost_bottom END -->
  </div><!-- .entry-content -->

</article><!-- #post-## -->
