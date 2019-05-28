<?php
    /*
    Template Name: Birthday Parties
    */
    
    get_header(); ?>
<div id="primary" class="content-area wmf-news container-fluid">
    <!-- <main id="main" class="site-main row" role="main">
        <div class="">
            <div class="container">
                <div class="">
                    <?php //if (function_exists('breadcrumbs')) breadcrumbs(); ?>
                </div>
            </div>
        </div>
        
    </main> -->
    <!-- .site-main -->
</div>
<!-- .content-area -->
<div class="section-all-row brthdaytoppadd brthdaytoppaddbxs" style="background: url(<?php if(has_post_thumbnail()) : echo get_the_post_thumbnail_url(); else : echo site_url().'/wp-content/themes/wmf/assets/img/landing-page-header.jpg'; endif; ?>);">
    <div class="brthdaytoppaddbxs-gradient"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8" data-aos="fade-up">
                <div class="combination-top">
                    <?php if(get_field('birthday_parties_heading')) : ?>
                        <h1><?php echo get_field('birthday_parties_heading'); ?></h1>
                    <?php endif; ?>
                    <?php if(get_field('birthday_parties_sub_heading')) : ?>
                        <h4><?php echo get_field('birthday_parties_sub_heading'); ?></h4>
                    <?php endif; ?>
                    <div class="btn btn-primary">
                        <a href="<?php echo get_field('party_button_link'); ?>">
                            <?php if(get_field('party_button_text')) : echo get_field('party_button_text'); ?>
                            <?php else : echo "Book a Birthday Party"; endif; ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8" data-aos="fade-up">
                <div class="tetimonial-section-fulcenter">
                    <?php  ?>
                    <div class="tetimonial-section-ful-row">
                        <?php if(get_field('header_right_side_testimonial_image')) : ?>
                            <div class="author-image"><img src="<?php echo get_field('header_right_side_testimonial_image'); ?>"></div>
                        <?php endif; ?>
                        <?php if(get_field('header_right_side_testimonial_content')) : ?>
                            <div class="author-descrip">                            
                                <p><?php echo get_field('header_right_side_testimonial_content'); ?></p>                            
                                <div><?php the_field('header_right_side_testimonial_name'); ?></div>                        
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section-all-row END -->
<div class="section-twocol section-twocol-full" data-aos="fade-up">
    <div class="section-twocol-table">
        <div class="section-twocol-col section-twocol-col-content">
            <div class="contentoverlaythis rightset">
                <?php if(get_field('childs_fav_coach_heading')) : ?>
                    <div><?php echo get_field('childs_fav_coach_heading'); ?></div>
                <?php endif; ?>
                <?php if(get_field('childs_fav_coach_content')) : ?>
                    <p><?php echo get_field('childs_fav_coach_content'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="section-twocol-col section-twocol-col-image">
            <div class="section-twocol-col-imagebx">
                <img src="<?php if(get_field('childs_fav_coach_image')) : echo get_field('childs_fav_coach_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image">
            </div>
        </div>
    </div>
</div>
<!-- section-twocol END -->
<div class="section-all-row ">
    <div class="container">
        <?php if(get_field('key_elements_heading')) : ?>
            <h2 class="hedline-txt" data-aos="fade-up"><?php echo get_field('key_elements_heading'); ?></h2>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="col-for-element-all">
            <div class="row">
                <?php if(have_rows('key_elements')) : while(have_rows('key_elements')) : the_row(); ?>
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="col-for-element-iner">
                            <div class="col-for-element-icon">
                                <img src="<?php if(get_sub_field('key_elements_icon')) : echo get_sub_field('key_elements_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/football-icon-bl.png'; endif; ?>" alt="icon" />
                            </div>                            
                            <?php if(get_sub_field('key_elements_description')) : ?>
                                <p><?php echo get_sub_field('key_elements_description'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<!-- section-all-row END -->
<div class="section-all-row ">
    <div class="container">
        <h2 class="hedline-txt" data-aos="fade-up"><?php the_field('party_packages_heading'); ?></h2>
        <div class="clearfix"></div>
    </div>
</div>
<!-- section-all-row END -->
<?php if(have_rows('party_packages')) : $package_counter = 1; while(have_rows('party_packages')) : the_row(); ?>
    <?php if($package_counter %2 == 1) : ?>
        <div class="section-twocol" data-aos="fade-up">
            <div class="section-twocol-table">
                <div class="section-twocol-col section-twocol-col-image indesktopnone">
                    <div class="section-twocol-col-imagebx">
                        <img src="<?php if(get_sub_field('package_image')) : echo get_sub_field('package_image'); endif; ?>" alt="image">
                    </div>
                </div>

                <div class="section-twocol-col section-twocol-col-content">
                    <div class="col-section-twocol pull-right">
                        <div class="pachage-hedline"><?php the_sub_field('package_name'); ?></div>
                        <div class="pachage-subhedline"><?php the_sub_field('children_and_coach'); ?></div>
                        <?php if(get_sub_field('wmf_coach_request')) : ?><p><?php echo get_sub_field('wmf_coach_request'); ?></p><?php endif; ?>
                        <?php if(get_sub_field('package_content')) : ?><p><?php echo get_sub_field('package_content'); ?></p><?php endif; ?>
                        <div class="btn btn-primary">
                            <a href="<?php if(get_sub_field('package_button_link')) : echo get_sub_field('package_button_link'); else: echo site_url().'/contact-us'; endif; ?>">
                                <?php if(get_sub_field('package_button_text')) : echo get_sub_field('package_button_text'); ?>
                                    <?php else: echo "Book This Package"; ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="section-twocol-col section-twocol-col-image inmobilenone">
                    <div class="section-twocol-col-imagebx">
                        <img src="<?php if(get_sub_field('package_image')) : echo get_sub_field('package_image'); endif; ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="section-twocol" data-aos="fade-up">
            <div class="section-twocol-table">
                <div class="section-twocol-col section-twocol-col-image">
                    <div class="section-twocol-col-imagebx">
                        <img src="<?php if(get_sub_field('package_image')) : echo get_sub_field('package_image'); endif; ?>" alt="image">
                    </div>
                </div>
                <div class="section-twocol-col section-twocol-col-content">
                    <div class="col-section-twocol pull-left">
                        <div class="pachage-hedline"><?php the_sub_field('package_name'); ?></div>
                        <div class="pachage-subhedline"><?php the_sub_field('children_and_coach'); ?></div>
                        <?php if(get_sub_field('wmf_coach_request')) : ?><p><?php echo get_sub_field('wmf_coach_request'); ?></p><?php endif; ?>
                        <?php if(get_sub_field('package_content')) : ?><p><?php echo get_sub_field('package_content'); ?></p><?php endif; ?>
                        <div class="btn btn-primary">
                            <a href="<?php if(get_sub_field('package_button_link')) : echo get_sub_field('package_button_link'); else: echo site_url().'/contact-us'; endif; ?>">
                                <?php if(get_sub_field('package_button_text')) : echo get_sub_field('package_button_text'); ?>
                                    <?php else: echo "Book This Package"; ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $package_counter++; endwhile; endif; wp_reset_postdata(); ?>

<!-- section-twocol END -->
<div class="section-all-row party-package">
    <div class="container">
        <h3 class="hedline-txt" data-aos="fade-up"><?php the_field('party_every_package_heading'); ?></h3>
        <div class="clearfix"></div>
        <div class="col-for-element-all">
            <div class="row">
                <?php if(have_rows('party_inclusions_package')) : while(have_rows('party_inclusions_package')) : the_row(); ?>
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="col-for-element-iner">
                            <div class="col-for-element-icon">
                                <img src="<?php if(get_sub_field('inclusions_package_icon')) : echo get_sub_field('inclusions_package_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/football-icon-bl.png'; endif; ?>" alt="icon" />
                            </div>
                            <p><?php the_sub_field('inclusions_package_description', false, false); ?></p>
                        </div>
                    </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
                
            </div>
        </div>
    </div>
</div>
<!-- section-all-row END -->
<div class="section-all-row optionalexras-col">
    <div class="container">
        <h3 class="hedline-txt" data-aos="fade-up"><?php the_field('optional_extras_heading'); ?></h3>
        <div class="clearfix"></div>
        <div class="col-for-element-all">
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">&nbsp;</div>
                <?php if(have_rows('optional_extras_repeater')) : while(have_rows('optional_extras_repeater')) : the_row(); ?>
                    <div class="col-md-4"  data-aos="fade-up">
                        <div class="col-for-element-iner">
                            <div class="col-for-element-icon"><img src="<?php echo get_sub_field('optional_icon'); ?>" alt="icon" /></div>
                            <p>
                                <?php the_sub_field('optional_content', false, false); ?>
                                <?php if(get_sub_field('optional_price')) : ?>
                                    <span><?php echo get_sub_field('optional_price'); ?></span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>                
            </div>
        </div>
    </div>
</div>
<!-- section-all-row END -->
<div class="section-twocol section-twocol-full" data-aos="fade-up">
    <div class="section-twocol-table">
        <div class="section-twocol-col section-twocol-col-image">
            <div class="section-twocol-col-imagebx"><img src="<?php if(get_field('bottom_section_image')) : echo get_field('bottom_section_image'); else: echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg'; endif; ?>" alt="image"></div>
        </div>
        <div class="section-twocol-col section-twocol-col-content whitekro">
            <div class="contentoverlaythis contentoverlaythis-bl">
                <p><?php the_field('bottom_section_content', false, false); ?></p>
            </div>
        </div>
    </div>
</div>
<!-- section-twocol END -->
<div class="entry-content findnearest_academyanimbx">
    <div class="jsn-bootstrap3 container">
        <div class="row findnearest_academy">
            <?php echo do_shortcode('[postcodesearch]'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
