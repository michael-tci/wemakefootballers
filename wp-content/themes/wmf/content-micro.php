<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="container">
        <div class="row">
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </header>
    <!-- .entry-header -->
    <div class="entry-content" id="entry-content">
        <div class="jsn-bootstrap3 home-slider local-banner-carousel">
            <div class="owl-carousel owl-theme owl-carousels-1">
                <?php
                    if(have_rows('slider_item')) : 
                        while(have_rows('slider_item')) : 
                            the_row();
                            echo '<div class="owl-item item">';
                            ?>
                            <img src="<?php if(get_sub_field('image')) : echo get_sub_field('image'); else: echo ''; endif; ?>" alt="" />
                            <div class="carousel-caption">
                                <?php if(get_sub_field('content')) : echo get_sub_field('content'); else: echo ''; endif; ?>
                            </div>
                            <?php
                            echo '</div>';
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
        <?php
            //show page content
            the_content(); 
        ?>
    </div>
    <!-- .entry-content -->
</article>
<!-- #post-## -->
<script>
    jQuery(document).ready(function($) {
        $('.owl-carousels-1').owlCarousel({
            loop:true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            items: 1,
            margin: 0,
            stagePadding: 0,
            smartSpeed: 500
        });
    });
</script>