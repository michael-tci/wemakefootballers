<?php
/*
Template Name: 5 In 5
*/

get_header(); ?>

    <div id="primary" class="content-area wmf-news">
        <main id="main" class="site-main row" role="main">
            <div class="page-header-pages">
                <div class="container">
                    <div class="full-breadcrumbs">
                        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
                    </div>
                </div>
            </div>
            <!-- page-header-pages END -->

        </main>
        <!-- .site-main -->


        <div class="section-all-row heaerprttp">
            <div class="container">
                <div class="text-center">
                    <div class="iconof-pgtitle"><img src="<?php if(get_field('footballers_5_in_5_icon')) : echo get_field('footballers_5_in_5_icon'); else : echo get_stylesheet_directory_uri().'/assets/img/goals-achivement-icon.png'; endif;?>" alt="icon"></div>
                    <h2 class="pagetitlename">
                        <?php the_field('footballers_5_in_5_heading'); ?>
                    </h2>
                    <p>
                        <?php the_field('footballers_5_in_5_description'); ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- section-all-row END -->
        <?php if(have_rows('footballers_5_in_5')) : $count =1; while(have_rows('footballers_5_in_5')) : the_row(); ?>
        <div class="bgpartcount-section-all" id="section<?php echo $count; ?>" style="background:url(<?php if(get_sub_field('section_background_image')) : echo get_sub_field('section_background_image'); else:; echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg)'; endif; ?>">
            <div class="section-all-row">
                <div class="bgpartcount-section-all-table">
                    <div class="bgpartcount-section-all-cell">
                        <div class="container">
                            <?php if($count == 1): ?>
                            <div class="odometer mainsubsnnsn reach-venues">0</div>
                            <?php elseif($count == 2) : ?>
                            <div class="mainsubsnnsn">
                                <div class="odometer workforce">0</div>
                                <div class="salsh-midle">/</div>
                                <div class="odometer workforce-1">0</div>
                            </div>
                            <?php elseif($count >= 3 ) : ?>
                            <div class="odometer mainsubsnnsn <?php if($count == 3): echo 'voluntary-coaching'; elseif($count == 4): echo 'exwmf-coaching'; elseif($count == 5) : echo 'produce-grassroots'; endif;?>">0</div>
                            <?php endif; ?>
                            <span class="subsnnsn"><?php the_sub_field('make_5_in_5_name'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section-all-row END -->
        </div>
        <!-- bgpartcount-section-all END -->

        <div class="section-all-row bgpartcount-section-text">
            <div class="container">
                <div class="text-center">
                    <p>
                        <?php the_sub_field('make_description'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php $count++; endwhile; endif; wp_reset_postdata(); ?>

        <div class="bgpartcount-section-all" id="section5" style="background:url(<?php if(get_field('our_goals_bg')) : echo get_field('our_goals_bg'); else : echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg)'; endif; ?>">
            <div class="section-all-row">
                <div class="bgpartcount-section-all-table">
                    <div class="bgpartcount-section-all-cell">
                        <div class="container">
                            <div class="ourgoals-text">
                                <?php the_field('bottom_goals_section_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section-all-row END -->
        </div>
        <!-- bgpartcount-section-all END -->

        <div class="our-goals-wmf">
            <div class="container">
                <div class="our-goals-wmfinnner">
                    <div class="row">
                        <?php if(have_rows('view_our_styles')) : while(have_rows('view_our_styles')) : the_row(); ?>
                        <div class="col-md-4">
                            <div class="our-goals-wmf-col">
                                <div class="our-goals-wmf-col-img"><img src="<?php if(get_sub_field('style_background_image')) : echo get_sub_field('style_background_image'); else: echo get_stylesheet_directory_uri().'/assets/img/slide3.jpg'; endif; ?>" alt="icon"></div>
                                <div class="hedlinssdad">
                                    <?php the_sub_field('style_name'); ?>
                                </div>
                                <div class="btn btn-primary">
                                    <a href="<?php the_sub_field('style_button_link'); ?>">
                                        <?php the_sub_field('style_button_text'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .content-area -->


    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/odometer-theme-default.css" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/odometer.js"></script>
    <script>
        $(function() {
            if ($('#section1 .container').is(':visible')) {
                //$('.reach-venues').html('100');
            }
        });

        $(window).on('scroll', function() {
            var $elem = $('#section1 .container');
            var $window = $(window);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            if (elemBottom < docViewBottom) {
                $('.reach-venues').html('100');
            }
        });


        setTimeout(function() {

            //$('.reach-venues').html('100');
            //$('.workforce').html('5050');
            //$('.voluntary-coaching').html('1000');
            //$('.exwmf-coaching').html('500');
            //$('.produce-grassroots').html('50');
        }, 1000);

        $(window).on('scroll', function() {
            var $elem = $('#section2 .container');
            var $window = $(window);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            if (elemBottom < docViewBottom) {
                //alert('hi')
                $('.workforce').html('50');
                $('.workforce-1').html('50');
            }
        });

        $(window).on('scroll', function() {
            var $elem = $('#section3 .container');
            var $window = $(window);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            if (elemBottom < docViewBottom) {
                //alert('hi')
                $('.voluntary-coaching').html('1000');
            }
        });


        $(window).on('scroll', function() {
            var $elem = $('#section4 .container');
            var $window = $(window);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            if (elemBottom < docViewBottom) {
                //alert('hi')
                $('.exwmf-coaching').html('500');
            }
        });


        $(window).on('scroll', function() {
            var $elem = $('#section5 .container');
            var $window = $(window);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            if (elemBottom < docViewBottom) {
                //alert('hi')
                $('.produce-grassroots').html('50');
            }
        });
    </script>

    <?php get_footer(); ?>