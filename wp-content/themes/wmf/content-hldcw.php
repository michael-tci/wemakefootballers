<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="container">
        <div class="row">
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </header>
    <!-- .entry-header -->
    <div class="entry-content" id="entry-content">
        <?php
            //show page content
            the_content(); 
        ?>
        <div class="fulwraper">
            <div class="holiday-camps-calender text-center">
                <div class="container">
                <img class="small-img" src="<?php echo site_url(); ?>/wp-content/uploads/2017/12/calender-icon.png">
                <div class="year-txt">
                    <?php if(get_field('holiday_vacations_heading')) : ?>
                    <h2><?php echo get_field('holiday_vacations_heading'); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if(have_rows('weather')) : while(have_rows('weather')) : the_row(); ?>
                <div class="vcation">
                    <?php if(get_sub_field('weather_name')) : ?>
                    <h3><?php echo get_sub_field('weather_name'); ?></h3>
                    <?php endif; ?>
                    <?php if(have_rows('vacation_date')) : while(have_rows('vacation_date')) : the_row(); ?>
                    <?php if(get_sub_field('vacation_date_to')) : ?> 
                    <p><?php echo get_sub_field('vacation_date_to'); ?></p>
                    <?php endif; ?>
                    <?php endwhile; endif; ?>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>                 
                </div>
            </div>
            <div class="jsn-bootstrap3 wr-element-container wr-element-gssgetintouch wr-element-text wmf-info ">
                <div class="wr_text" id="ufTpUG">
                    <p style="text-align: center;">
                        <?php 
                            if(get_field('get_in_touch')) echo get_field('get_in_touch');
                        ?>
                    </p>
                </div>
            </div>
            <div id="holiday-camps-for" class="holiday-camps-for">
                <div class="container">
                    <div class="camps-for-top-txt">
                        <?php if(get_field('cater_camps_for_heading')) : ?>
                        <h2><?php echo get_field('cater_camps_for_heading'); ?></h2>
                        <?php endif; ?>
                        <?php if(get_field('cater_camps_for_content')) : ?>
                        <p><?php echo get_field('cater_camps_for_content'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(have_rows('we_offer_following_exp')) : $following_counter = 1; while(have_rows('we_offer_following_exp')) : the_row(); ?>
                <?php if($following_counter %2 == 1) : ?>
                <div class="section-twocol section-twocol-full nobgandfull" id="facilities" data-aos="fade-up">
                    <div class="section-twocol-table row">
                        <div class="section-twocol-col section-twocol-col-image col-md-7">
                            <div class="section-twocol-col-imagebx">
                                <img src="<?php echo get_sub_field('following_image'); ?>" alt="Please update image">
                            </div>
                        </div>
                        <div class="section-twocol-col section-twocol-col-content col-md-9">
                            <div class="contentoverlaythis rightset rightsetsidecont">
                                <?php if(get_sub_field('following_desc')) : ?>
                                <p><?php echo get_sub_field('following_desc'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <!-- section-twocol END -->
                <div class="section-twocol section-twocol-full nobgandfull" id="health-safety" data-aos="fade-up">
                    <div class="section-twocol-table row">
                        <div class="section-twocol-col section-twocol-col-content col-md-9">
                            <div class="contentoverlaythis rightset">
                                <?php if(get_sub_field('following_desc')) : ?>
                                <p><?php echo get_sub_field('following_desc'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="section-twocol-col section-twocol-col-image inmobilenone col-md-7">
                            <div class="section-twocol-col-imagebx">
                                <img src="<?php echo get_sub_field('following_image'); ?>" alt="Please update image">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php $following_counter++; endwhile; endif; wp_reset_postdata(); ?>            
            </div>
            <div class="book-holiday-camp-section" data-aos="fade-up">
                <div class="container">

                    <div class="btn-view-training <?php if(get_field('child_into_button_class')) : echo get_field('child_into_button_class'); endif; ?>">

                        <a class="btn btn-default" href="<?php if(get_field('child_into_button_link')) : echo get_field('child_into_button_link'); else: echo "#"; endif; ?>">
                        <?php if(get_field('child_camp_button_text')) : echo get_field('child_camp_button_text'); ?>
                        <?php else: echo "Book your child into a Holiday camp Today";?> 
                        <?php endif; ?>                           
                        </a>
                    </div>
                </div>
            </div>
            <div class="camp-information">
                <div class="container">
                    <div id="camp-format-of-each-day" class="time-line-section">
                        <div class="each-day-top-txt text-center">
                            <?php if(get_field('format_of_each_day_heading')) : ?>
                            <h3><?php echo get_field('format_of_each_day_heading'); ?></h3>
                            <?php endif; ?>
                            <?php if(get_field('format_of_each_day_content', false, false)) : ?>
                            <p><?php echo get_field('format_of_each_day_content', false, false); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mid-line-for-time">
                            <?php if(have_rows('formats_of_each_day')) : $format_counter=1; while(have_rows('formats_of_each_day')) : the_row(); ?>
                            <div class="row">
                                <div class="<?php if($format_counter % 2 == 1 ) : echo "col-sm-8 col-sm-push-8"; else : echo "col-sm-8"; endif; ?>">
                                    <div class="<?php if($format_counter % 2 == 1 ) : echo "time-line-inner"; else : echo "time-line-inner left-linear"; endif; ?>">
                                        <?php if(get_sub_field('format_timing')) : ?>
                                        <div class="time-section">
                                            <p><?php echo get_sub_field('format_timing'); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(get_sub_field('format_name')) : ?>
                                            <h4><?php echo get_sub_field('format_name'); ?></h4>
                                        <?php endif; ?>
                                        <?php if(get_sub_field('format_description')) : ?>
                                            <p><?php echo get_sub_field('format_description'); ?></p>
                                        <?php endif; ?>
                                        <?php if(get_sub_field('format_icon')) : ?>
                                            <div class="related-icon">
                                                <img src="<?php echo get_sub_field('format_icon'); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $format_counter++; endwhile; endif; wp_reset_postdata(); ?>                           
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="camp-what-to-bring" class="camp-what-to-bring">
                <div class="container">
                    <?php if(get_field('what_to_bring_heading')) : ?>
                    <h2><?php echo get_field('what_to_bring_heading'); ?></h2>
                    <?php endif; ?>
                    <div class="camp-what-to-bring-content row">
                        <?php 
                            if(have_rows('what_to_bring_item')) : 
                                while(have_rows('what_to_bring_item')) : the_row();
                                    $title = get_sub_field('title'); 
                                    $image = get_sub_field('image');
                                    echo '<div class="bring-item col-sm-8 col-md-4">';
                                        if($image){
                                            echo '<div class="bring-item-image">';
                                                echo '<img alt="" src="'. $image .'" >';
                                            echo '</div>';
                                        }
                                        if($title){
                                            echo '<div class="bring-item-title">';
                                                echo $title;
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                endwhile; 
                            endif; 
                            wp_reset_postdata();                              
                        ?>
                    </div>
                </div>
            </div>
            
            <div id="camp-ways-to-book" class="camp-ways-to-book">
                <div class="container">
                    <div class="camp-ways-to-book-inner">
                        <?php if(get_field('ways_to_book_heading')) : ?>
                        <h2 class="ways-to-book-heading"><?php echo get_field('ways_to_book_heading'); ?></h2>
                        <?php endif; ?>
                        <?php if(get_field('ways_to_book_description')) : ?>
                        <p class="ways-to-book-des"><?php echo get_field('ways_to_book_description'); ?></p>
                        <?php endif; ?>
                        <div class="ways-to-book-content row">
                            <?php 
                                if(have_rows('ways_to_book_item')) : 
                                    while(have_rows('ways_to_book_item')) : the_row();
                                        $image = get_sub_field('image');
                                        $content = get_sub_field('content'); 

                                        $link = get_sub_field('link'); 
                                        echo '<div class="ways-to-book-item col-sm-4">';
                                            if($image){
                                                echo '<div class="ways-to-book-item-image">';
                                                    if($link){
                                                        echo '<a href="'. $link .'">';
                                                    }
                                                    echo '<img alt="" src="'. $image .'" >';
                                                    if($link){
                                                        echo '</a>';
                                                    }

                                                echo '</div>';
                                            }
                                            if($content){
                                                echo '<div class="ways-to-book-item-title">';
                                                    echo $content;
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    endwhile; 
                                endif; 
                                wp_reset_postdata();                              
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="top-video-section">
                <?php if(get_field('holiday_camps_video_title')) : ?>
                    <h2 class="video-title"><?php echo get_field('holiday_camps_video_title'); ?></h2>
                <?php endif; ?>
                <?php if(get_field('holiday_camps_video_id')) : ?>
                    <div class="top-video-content">
                        <iframe width="560px" height="315px" src="https://www.youtube.com/embed/<?php echo get_field('holiday_camps_video_id'); ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </div>

                <?php endif; ?>
            </div>


            <div class="testimonial-slider-section" data-aos="fade-up">
                <div class="container">
                    <div class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/comment.png" alt="image"/></div>
                    <div class="clearfix"></div>
                    <div class="testimonial-head">
                        <h2>Testimonials</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="myCarousel" class="carousel slide testimslidebottomse" data-ride="carousel">
                        <?php 
                            $testimonial = array(
                                'post_type' => 'tesimonials',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'lising_type',
                                                            'field' => 'slug',
                                                            'terms' => 'holiday-camps',
                                                        ),
                                                    ),
                                'posts_per_page' => -1,
                            );
                            $get_testimonial = new Wp_query($testimonial);
                            $get_total_testi = $get_testimonial->post_count;
                            $testi_counter = 1;
                            
                            ?>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php for($i=0; $i<=$get_total_testi-1; $i++){ ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($testi_counter ==1 ): echo "active"; endif; ?>"></li>
                            <?php $testi_counter++; } ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php if($get_testimonial->have_posts()) : $count_testi = 1; while($get_testimonial->have_posts()) : $get_testimonial->the_post(); ?>
                            <div class="item <?php if($count_testi ==1 ) : echo "active"; endif; ?>">
                                <div class="parent-table">
                                    <div class="left-revolver-img-parent">
                                        <div class="left-revolver-img">

                                            <?php the_post_thumbnail(); ?>

                                        </div>
                                    </div>
                                    <div class="about-revolver-right">
                                        <p><?php the_content(); ?></p>
                                        <div class="revolver-name">
                                            <h4><?php the_title(); ?>
                                                <?php if(get_field('testi_player_position')) : ?>
                                                <span><?php echo ', '.get_field('testi_player_position'); ?></span>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $count_testi++; endwhile; endif; wp_reset_postdata(); ?>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .entry-content -->
</article>
<!-- #post-## -->
<script>
    jQuery(document).ready(function($) {
      $('.fadeOut').owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
      });
      $('.custom1').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450
      });
    });
</script>