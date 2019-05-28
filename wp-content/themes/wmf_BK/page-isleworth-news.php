<?php
/*
Template Name: Isleworth News
*/
get_header('local'); ?>
 <div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">

      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();
        the_content();
      endwhile; ?>

      <div class="wmf-news-body">


        <div class="wmf-news-article">



          <?php $the_query = new WP_Query( array (
            'post_type'              => array( 'post' ),
            'paged'                  => '1',
            'posts_per_page'         => '1',
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'tax_query'              => array(
                                          'relation' => 'AND',
                                          array(
                                            'taxonomy' => 'post_format',
                                            'field'    => 'slug',
                                            'terms'    => array(
                                              'post-format-image',
                                              'post-format-video' ),
                                            'operator' => 'NOT IN',
                                          ),
                                        ),
          )); ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="entry-post-content">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                  <?php if( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
                  <?php } ?>
                </a>
                <div class="post-excerpt">
                  <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                  <?php echo wpautop(get_the_content()); ?>
                </div>
                <a class="post-more" href="<?php the_permalink(); ?>" aria-hidden="true">read more</a>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php $the_query = new WP_Query( array (
            'post_type'              => array( 'post' ),
            'paged'                  => '1',
            'posts_per_page'         => '1',
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'tax_query'              => array(
                                          'relation' => 'AND',
                                          array(
                                            'taxonomy' => 'post_format',
                                            'field'    => 'slug',
                                            'terms'    => array( 'post-format-video' ),
                                          ),
                                        ),
          )); ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <?php echo do_shortcode('[wmf_video src="' . get_the_content() . '" title="' . get_the_title() . '" height="525"]'); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php $the_query = new WP_Query( array (
            'post_type'              => array( 'post' ),
            'paged'                  => '2',
            'posts_per_page'         => '1',
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'tax_query'              => array(
                                          'relation' => 'AND',
                                          array(
                                            'taxonomy' => 'post_format',
                                            'field'    => 'slug',
                                            'terms'    => array(
                                              'post-format-image',
                                              'post-format-video' ),
                                            'operator' => 'NOT IN',
                                          ),
                                        ),
          )); ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="entry-post-content">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                  <?php if( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
                  <?php } ?>
                </a>
                <div class="post-excerpt">
                  <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                  <?php echo wpautop(get_the_content()); ?>
                </div>
                <a class="post-more" href="<?php the_permalink(); ?>" aria-hidden="true">read more</a>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php $the_query = new WP_Query( array (
            'post_type'              => array( 'post' ),
            'paged'                  => '1',
            'posts_per_page'         => '1',
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'tax_query'              => array(
                                          'relation' => 'AND',
                                          array(
                                            'taxonomy' => 'post_format',
                                            'field'    => 'slug',
                                            'terms'    => array( 'post-format-image' ),
                                          ),
                                        ),
          )); ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="entry-post-image">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                  <?php if( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
                  <?php } ?>
                </a>
                <div class="post-link">
                  <div class="post-link-middle">
                    <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    <a class="post-more" href="<?php the_permalink(); ?>" aria-hidden="true">read more</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>



        </div>

        <div id="wmf-news-sidebar" class="wmf-news-sidebar">
          <?php get_sidebar(); ?>
        </div><!-- .sidebar -->
      </div><!-- .wmf-news-body -->
    </main><!-- .site-main -->
  </div><!-- .content-area -->

<?php get_footer(); ?>
