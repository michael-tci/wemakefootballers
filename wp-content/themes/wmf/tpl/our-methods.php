<?php
    /*
    Template Name: Our Methods
    */
    
    get_header(); ?>
<div id="primary" class="content-area wmf-news">
    <!-- <main id="main" class="site-main row" role="main">
        <div class="page-header-pages">
            <div class="container">
                <div class="full-breadcrumbs">
                    <?php //if (function_exists('breadcrumbs')) breadcrumbs(); ?>
                </div>
            </div>
        </div>
        
    </main> -->
    <!-- .site-main -->
    <div class="section-all-row heaerprttp">
        <div class="container">
            <div class="text-center">
                <div class="iconof-pgtitle"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/our-mrthods-icon.png" alt="icon"></div>
                <h2 class="pagetitlename">
                    <?php the_field('our_methods_heading'); ?>
                </h2>
                <p>
                    <?php the_field('our_methods_description'); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- section-all-row END -->
    <?php if(have_rows('our_methods')) : $counter = 1; while(have_rows('our_methods')) : the_row(); ?>
        <?php if( $counter == 1 || $counter == 3 ) : ?>
        <div class="row value<?php echo $counter; ?>">
            <div class="section-twocol section-twocol-full image-height-control" data-aos="fade-up">
                <div class="section-twocol-table">
                    <div class="section-twocol-col section-twocol-col-content down-left-data" >
                        <div class="contentoverlaythis rightset">
                            <span class="hdlsidicovery"><?php if(get_sub_field('method_name')) : echo get_sub_field('method_name'); endif; ?></span>
                        </div>
                    </div>
                    <div class="section-twocol-col section-twocol-col-image">
                        <div class="section-twocol-col-imagebx"><img src="<?php if(get_sub_field('methods_image')) : echo get_sub_field('methods_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image"></div>
                    </div>
                </div>
            </div>
            <!-- section-twocol END -->
            <div class="section-all-row bgpartcount-section-text" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <p><?php if(get_sub_field('method_description')) : echo get_sub_field('method_description'); endif; ?></p>
                    </div>
                </div>
            </div>
            <!-- section-all-row END  -->
            <div class="section-background-colstwo" data-aos="fade-up" style="background:url(<?php if(get_sub_field('method_second_background_image')) : echo get_sub_field('method_second_background_image'); else: echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg)'; endif; ?>">
                <div class="container">
                    <div class="section-background-col-table">
                        <div class="section-background-col" >
                            <div class="section-bckground-boldtext"><?php if(get_sub_field('methods_second_title')) : echo get_sub_field('methods_second_title'); endif; ?></div>
                        </div>
                        <div class="section-background-col">
                            <div class="section-bckground-contet">
                                <p><?php if(get_sub_field('method_second_description')) : echo get_sub_field('method_second_description'); endif; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section-background-colstwo END -->
            <div class="section-all-row bgpartcount-section-text bgnonetransparent" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <div class="ttsetshs"><?php if(get_sub_field('method_second_bottom_title')) : echo get_sub_field('method_second_bottom_title'); endif; ?></div>
                        <p><?php if(get_sub_field('method_second_bottom_content')) : echo get_sub_field('method_second_bottom_content'); endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($counter == 2): ?>
        <div class="row value<?php echo $counter; ?>">
            <div class="section-twocol section-twocol-full image-height-control" data-aos="fade-up">
                <div class="section-twocol-table">
                    <div class="section-twocol-col section-twocol-col-content down-left-data indesktopnone">
                        <div class="contentoverlaythis rightset rightsetsidecont">
                            <span class="hdlsidicovery"><?php if(get_sub_field('method_name')) : echo get_sub_field('method_name'); endif; ?></span>
                        </div>
                    </div>
                    <div class="section-twocol-col section-twocol-col-image">
                        <div class="section-twocol-col-imagebx"><img src="<?php if(get_sub_field('methods_image')) : echo get_sub_field('methods_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image"></div>
                    </div>
                    <div class="section-twocol-col section-twocol-col-content down-left-data inmobilenone">
                        <div class="contentoverlaythis rightset rightsetsidecont">
                            <span class="hdlsidicovery"><?php if(get_sub_field('method_name')) : echo get_sub_field('method_name'); endif; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section-twocol END -->
            <div class="section-all-row bgpartcount-section-text" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <p><?php if(get_sub_field('method_description')) : echo get_sub_field('method_description'); endif; ?></p>
                    </div>
                </div>
            </div>
            <!-- section-all-row END  -->
            <div class="section-background-colstwo"  data-aos="fade-up" style="background:url(<?php if(get_sub_field('method_second_background_image')) : echo get_sub_field('method_second_background_image'); else: echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg)'; endif; ?>">
                <div class="container">
                    <div class="section-background-col-table">
                        <div class="section-background-col">
                            <div class="section-bckground-boldtext"><?php if(get_sub_field('methods_second_title')) : echo get_sub_field('methods_second_title'); endif; ?></div>
                        </div>
                        <div class="section-background-col">
                            <div class="section-bckground-contet">
                                <p><?php if(get_sub_field('method_second_description')) : echo get_sub_field('method_second_description'); endif; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section-background-colstwo END -->
            <div class="section-all-row bgpartcount-section-text bgnonetransparent" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <div class="ttsetshs"><?php if(get_sub_field('method_second_bottom_title')) : echo get_sub_field('method_second_bottom_title'); endif; ?></div>
                        <p><?php if(get_sub_field('method_second_bottom_content')) : echo get_sub_field('method_second_bottom_content'); endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($counter == 4): ?>
        <div class="row value<?php echo $counter; ?>">
            <div class="section-background-colstwo"  data-aos="fade-up" style="background:url(<?php if(get_sub_field('method_second_background_image')) : echo get_sub_field('method_second_background_image'); else: echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg)'; endif; ?>">
                <div class="container">
                    <div class="section-background-col-table">
                        <div class="section-background-col">
                            <div class="section-bckground-boldtext"><?php if(get_sub_field('methods_second_title')) : echo get_sub_field('methods_second_title'); endif; ?></div>
                        </div>
                        <div class="section-background-col">
                            <div class="section-bckground-contet">
                                <p><?php if(get_sub_field('method_second_description')) : echo get_sub_field('method_second_description'); endif; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-all-row bgpartcount-section-text bgnonetransparent" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <div class="ttsetshs"><?php if(get_sub_field('method_second_bottom_title')) : echo get_sub_field('method_second_bottom_title'); endif; ?></div>
                        <p><?php if(get_sub_field('method_second_bottom_content')) : echo get_sub_field('method_second_bottom_content'); endif; ?></p>
                    </div>
                </div>
            </div>
            <div class="section-twocol section-twocol-full image-height-control"  data-aos="fade-up">
                <div class="section-twocol-table">
                    <div class="section-twocol-col section-twocol-col-content">
                        <div class="contentoverlaythis rightset">
                            <span class="hdlsidicovery"><?php if(get_sub_field('method_name')) : echo get_sub_field('method_name'); endif; ?></span>
                        </div>
                    </div>
                    <div class="section-twocol-col section-twocol-col-image">
                        <div class="section-twocol-col-imagebx"><img src="<?php if(get_sub_field('methods_image')) : echo get_sub_field('methods_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image"></div>
                    </div>
                </div>
            </div>
            <div class="section-all-row bgpartcount-section-text bgpartcount-section-textgegs" data-aos="fade-up">
                <div class="container">
                    <div class="text-center">
                        <p><?php if(get_sub_field('method_description')) : echo get_sub_field('method_description'); endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
    <div class="entry-content findnearest_academyanimbx">
        <div class="jsn-bootstrap3 container">
            <div class="row findnearest_academy">
                <?php echo do_shortcode('[postcodesearch]'); ?>
            </div>
        </div>
    </div>
</div>
<!-- .content-area -->
<?php get_footer(); ?>