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
            //the_content(); 
            
            ?>
        <div class="fulwraper">
            
            <?php /* <div class="holiday-camps-txt-sldier paddingtop_none">
                <div class="row">
                    <div class="col-md-6">
                        <div class="camps-slider-left-txt" style="background-image: url(<?php if(get_field('holiday_camps_bg')) : echo get_field('holiday_camps_bg'); else: echo site_url().'/wp-content/themes/wmf/assets/img/holiday-camp-header.jpg'; endif; ?>);">
                            <div class="upper-txt">
                                <h2>
                                    <?php if(get_field('holiday_camps_heading')) : echo get_field('holiday_camps_heading'); ?>
                                        <?php else: echo 'Holiday camps'; ?>
                                    <?php endif; ?>
                                </h2>
                                <?php if(get_field('holiday_camps_content')) : ?>
                                <p><?php echo get_field('holiday_camps_content', false, false); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="camps-slider-right" style="background-image: url(<?php if(get_field('parents_testi_bg')) : echo get_field('parents_testi_bg'); else: echo site_url().'/wp-content/themes/wmf/assets/img/holiday-camp-bg.png'; endif; ?>);">
                            <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                                
                                <?php 
                                    $parent_testimonial = array(
                                        'post_type' => 'parents_testimonial',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 7
                                    );
                                    $get_parent_testi = new Wp_query($parent_testimonial);
                                    $total_slide = $get_parent_testi->post_count;
                                    $slide_counter = 1;
                                    ?>
                                <ol class="carousel-indicators">
                                    <?php for($i=0; $i<=$total_slide-1; $i++) { ?>
                                    <li data-target="#myCarousel2" data-slide-to="<?php echo $i; ?>" class="<?php if($slide_counter == 1) : echo "active"; endif; ?>"></li>
                                    <?php $slide_counter++; } ?>
                                </ol>
                                
                                <div class="carousel-inner">
                                    <?php if($get_parent_testi->have_posts()) : $counter =1 ; while($get_parent_testi->have_posts()) : $get_parent_testi->the_post(); ?>
                                    <div class="item <?php if($counter == 1) : echo "active"; endif; ?>">
                                        <div class="slide-txt text-center">
                                            <p><?php the_content(); ?></p>
                                            <div class="revolver-name">
                                                <h4><?php the_title(); ?>
                                                    <?php if(get_field('relation_name')) : ?>
                                                    <span><?php echo ' , '.get_field('relation_name'); ?></span>
                                                    <?php endif; ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
                                </div>
                                
                                <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div> */ ?>




            <div class="section-all-row brthdaytoppadd brthdaytoppaddbxs holiday-camps-txt-sldier" style="background: url(<?php if(has_post_thumbnail()) : echo get_the_post_thumbnail_url(); else : echo site_url().'/wp-content/themes/wmf/assets/img/landing-page-header.jpg'; endif; ?>);">
    <div class="brthdaytoppaddbxs-gradient"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8" data-aos="fade-up">
                <div class="combination-top holidaytextsgs">
                    <div class="upper-txt">
                                <h2>
                                    <?php if(get_field('holiday_camps_heading')) : echo get_field('holiday_camps_heading'); ?>
                                        <?php else: echo 'Holiday camps'; ?>
                                    <?php endif; ?>
                                </h2>
                                <?php if(get_field('holiday_camps_content')) : ?>
                                <p><?php echo get_field('holiday_camps_content', false, false); ?></p>
                                <?php endif; ?>
                            </div>
                </div>
            </div>
            <div class="col-md-8" data-aos="fade-up">
                <div class="tetimonial-section-fulcenter">
                    <div class="camps-slider-right">
                    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <?php 
                                    $parent_testimonial = array(
                                        'post_type' => 'parents_testimonial',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 7
                                    );
                                    $get_parent_testi = new Wp_query($parent_testimonial);
                                    $total_slide = $get_parent_testi->post_count;
                                    $slide_counter = 1;
                                    ?>
                                <ol class="carousel-indicators">
                                    <?php for($i=0; $i<=$total_slide-1; $i++) { ?>
                                    <li data-target="#myCarousel2" data-slide-to="<?php echo $i; ?>" class="<?php if($slide_counter == 1) : echo "active"; endif; ?>"></li>
                                    <?php $slide_counter++; } ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php if($get_parent_testi->have_posts()) : $counter =1 ; while($get_parent_testi->have_posts()) : $get_parent_testi->the_post(); ?>
                                    <div class="item <?php if($counter == 1) : echo "active"; endif; ?>">
                                        <div class="slide-txt text-center">
                                            <p><?php the_content(); ?></p>
                                            <div class="revolver-name">
                                                <h4><?php the_title(); ?>
                                                    <?php if(get_field('relation_name')) : ?>
                                                    <span><?php echo ' , '.get_field('relation_name'); ?></span>
                                                    <?php endif; ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section-all-row END -->




            <div class="clearfix"></div>
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
          <div class="book-holiday-camp-section" data-aos="fade-up">
                <div class="container">
                    <div class="btn btn-primary">
                        <a href="<?php if(get_field('child_into_button_link')) : echo get_field('child_into_button_link'); else: echo "#"; endif; ?>">
                        <?php if(get_field('child_camp_button_text')) : echo get_field('child_camp_button_text'); ?>
                        <?php else: echo "Book your child into a Holiday camp Today";?> 
                        <?php endif; ?>                           
                        </a>
                    </div>
                </div>
            </div>                  
                </div>
            </div>

            <div class="camp-information">
                <div class="container">
                    <div class="camp-info-top-txt">
                        <?php if(get_field('our_academy_sites_heading')) : ?>
                        <h2><?php echo get_field('our_academy_sites_heading'); ?></h2>
                        <?php endif; ?>
                        <div class="row">
                            <?php if(have_rows('our_academy_sites')) : $count_academy=1; while(have_rows('our_academy_sites')) : the_row(); ?>
                                <?php 
                                    $academy_name[] = get_sub_field('academy_name'); 
                                    $academy_link[] = get_sub_field('academy_link');
                                $count_academy++; endwhile; endif; wp_reset_postdata();                              
                                    $academy_arr = array_chunk($academy_name ,4 , true);
                                    $link_arr = array_chunk($academy_link ,4 , true);                                 
                                ?>
                            <?php  
                                for($j = 0; $j < count($academy_arr); $j++ ){
                                $name_count_arr = array_combine($academy_arr[$j], $link_arr[$j]);           
                                ?>                                     
                            <div class="col-md-3">
                                <div class="camp-location">
                                    <?php   
                                        foreach($name_count_arr as $name_academy => $link_academy){ ?>
                                            <p> 
                                                <a href="<?php echo $link_academy; ?>" target="_blank">
                                                    <?php echo $name_academy; ?>
                                                </a>
                                            </p>
                                    <?php }  ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="time-line-section">
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
                                <div class="<?php if($format_counter % 2 == 1 ) : echo "col-md-6 col-md-push-6"; else : echo "col-md-6"; endif; ?>">
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
            <div class="holiday-camps-for">
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
                <div class="section-twocol section-twocol-full nobgandfull" id="facilities">
                    <div class="section-twocol-table">
                        <div class="section-twocol-col section-twocol-col-image" data-aos="fade-right">
                            <div class="section-twocol-col-imagebx">
                                <img src="<?php echo get_sub_field('following_image'); ?>" alt="Please update image">
                            </div>
                        </div>
                        <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-left">
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
                <div class="section-twocol section-twocol-full nobgandfull" id="health-safety">
                    <div class="section-twocol-table">
                        <div class="section-twocol-col section-twocol-col-image indesktopnone" data-aos="fade-left">
                            <div class="section-twocol-col-imagebx">
                                <img src="<?php echo get_sub_field('following_image'); ?>" alt="Please update image">
                            </div>
                        </div>

                        <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-right">
                            <div class="contentoverlaythis rightset">
                                <?php if(get_sub_field('following_desc')) : ?>
                                <p><?php echo get_sub_field('following_desc'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="section-twocol-col section-twocol-col-image inmobilenone" data-aos="fade-left">
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
                    <div class="btn btn-primary">
                        <a href="<?php if(get_field('child_into_button_link')) : echo get_field('child_into_button_link'); else: echo "#"; endif; ?>">
                        <?php if(get_field('child_camp_button_text')) : echo get_field('child_camp_button_text'); ?>
                        <?php else: echo "Book your child into a Holiday camp Today";?> 
                        <?php endif; ?>                           
                        </a>
                    </div>
                </div>
            </div>

            <div class="top-video-section bordervideo-bottoms">
                <?php if(get_field('holiday_camps_video_id')) : ?>
                   <iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo get_field('holiday_camps_video_id'); ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                <?php endif; ?>
            </div>


            <div class="testimonial-slider-section" data-aos="fade-up">
                <div class="container">
                    <div class="testimonial-head">
                        <h2>testimonials</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/comment.png" alt="image"/></div>
                    <div class="clearfix"></div>
                    <br>
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
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
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