<?php
    /*
    Template Name: News Page 
    */
    if(is_main_site()){
        get_header();
    }else{
        get_header('local');
    } ?>

<script type='text/javascript' src='/wp-includes/js/masonry.min.js?ver=3.3.2'></script>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.masonry.min.js?ver=3.1.2b'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.js"></script>

<div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
            ?>
        <div class="newswrap newswrappage" data-aos="fade-up">
            <div class="container">

                <div class="partsnewswrap">
                            <div id="owl-demo" class="owl-carousel owl-theme">
                                <?php /* $query = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); */ ?>
                                <?php $query = new WP_Query( array( 'posts_per_page' => 4, 'order' => 'DESC'  ) ); ?>
                                <?php if ( $query->have_posts() ) : ?>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="item">
                                    <div class="news-slide">
                                        <div class="partsnewswrap-table">
                                            <div class="leftpartslidertis">
                                                <div class="news-slide-left">
                                                    <h3><?php the_date("D d F Y");?></h3>
                                                    <h2>
                                                        <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>
                                                    <?php 
                                                        $trimexcerpt = get_the_excerpt();
                                                        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 40 ); 
                                                    ?>
                                                    <p><?php echo $shortexcerpt;?><a href="<?php the_permalink(); ?>">Continue reading</a></p>
                                                </div>
                                            </div>
                                            <div class="post_thumbnail rightpartslidertis"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                        </div> <!-- owl-demo END -->                       
                    
                </div><!-- partsnewswrap END -->
            </div>
        </div><!-- newswrappage END -->



<!-- New code changes start -->

<div class="newsslidewrap">
        <div class="container">
            <div class="tab-container">
                <div class="heading-section checkoutheading grey-secbg">
                    <h3 class="hedline-txt">
                        <?php $catss = get_categories(array('exclude' => ['78', '79', '80', '51', '53', '54']));  // Get categories ?>
                        <?php if ($catss) : ?>
                            <select id="select-box">
                                <option value="all" selected="true">All</option>
                                <?php foreach ($catss as $cate) { ?>
                                    <?php $cat_no_spaces = preg_replace('/[^\p{L}\p{N}]+/u', '', preg_replace('/\s+/', '', $cate->name)); ?>
                                    <option value="<?php echo $cat_no_spaces; ?>"><?php echo $cate->name; ?></option>
                                <?php  } ?>
                                <?php wp_reset_query();  // Restore global post data  ?> 
                            </select>
                        <?php endif; ?>
                    </h3>
                    <p class="desc-txt">Please select a news category from the drop down above to view the desired articles.</p>
                </div>
              
                <div id="tab-dropdown">

                    <?php $cats = get_categories(array('exclude' => ['78', '79', '80', '51', '53', '54']));  // Get categories ?>

                    <?php if ($cats) : ?>
            
                        <?php // Loop through categories to print name ?>
                        <?php foreach ($cats as $cat) { ?>
                            
                        <?php $cat_no_spacess = preg_replace('/[^\p{L}\p{N}]+/u', '', preg_replace('/\s+/', '', $cat->name)); ?>
                        <div>
                        <div id="tab-<?php echo $cat_no_spacess; ?>"  class="card-columns" style="display: none;"> 

                        <?php
                        $args = array(
                        'post_type' => 'post',
                        'orderby' => 'DESC',
                        'category_name' => $cat->name
                        );
                    
                        $the_query = new WP_Query($args);
                    ?>

                    <?php if($the_query->have_posts()): while($the_query->have_posts()) : $the_query->the_post();  ?>
                        <div class="card">
                            <div>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <div class="card-body">
                                    <p class="text-title">
                                        <a class="text-decoration" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </p>
                                    <div class="card_text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <?php endwhile;  ?>
                    <?php endif; ?>
                    
                    </div>
<!--
                    <div id="load-<?php echo $cat_no_spacess; ?>" class="row">
                        <div class="wmle_loadmore">
                            <a id="<?php echo $cat_no_spacess; ?>ShowMore" class="loader-more-css" rel="wmle_container">Load More</a>
                        </div>
                    </div>
-->
                    <script>
                            $(document).ready(function () {
                                var itemsCount = 0,
                                itemsMax = $('#tab-<?php echo $cat_no_spacess; ?> div.card').length;
                                $('#tab-<?php echo $cat_no_spacess; ?> div.card').hide();
                            
                                function showNextItems() {
                                    var pagination = 10;
                            
                                    for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                                    $('#tab-<?php echo $cat_no_spacess; ?> div.card:eq(' + i + ')').show();
                                    }
                                    itemsCount += pagination;
                                    if (itemsCount >= itemsMax) {
                                    $('#<?php echo $cat_no_spacess; ?>ShowMore').hide();
                                    }
                                };
                                showNextItems();
                                $('#<?php echo $cat_no_spacess; ?>ShowMore').on('click', function (e) {
                                    e.preventDefault();
                                    showNextItems();
                                });
                                });
                        </script>
                    </div>
                <?php    } ?>

        <?php wp_reset_query();  // Restore global post data  ?> 
            <?php endif; ?>
        </div>
    </div>
</div>
</div>    


<div class="container pr-0">
    <div class="row mt-ml-mb-mr" >
        <div>
            <div id="tab-all" class="card-columns">
                <?php $cats = get_categories(array('exclude' => ['78', '79', '80', '51', '53', '54']));  // Get categories ?>
                    <?php if ($cats) : ?>
                        <?php // Loop through categories to print name ?>
                        <?php foreach ($cats as $cat) { ?>
                        <?php $cat_no_spacess = preg_replace('/\s+/', '', $cat->name); ?>
                        <?php
                        $args = array(
                        'post_type' => 'post',
                        'orderby' => 'DESC',
                        'category_name' => $cat->name
                        );
                        $the_query = new WP_Query($args);
                    ?>
                    <?php if($the_query->have_posts()): while($the_query->have_posts()) : $the_query->the_post();  ?>
                        
                    <div class="card">
                        <div>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <div class="card-body">
                                <p class="text-title">
                                    <a class="text-decoration" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </p>
                                <div class="card_text">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>  
                    </div>

                    <?php endwhile;  ?>
                    <?php endif; ?>
                    <?php    } ?>
                    
                    <?php wp_reset_query(); ?> 
                    <?php endif; ?> 
                </div>
                <div id="load-all" class="row">
                        <div class="wmle_loadmore">
                            <a id="allShowMore" class="loader-more-css">Load More</a>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            var itemsCount = 0,
                            itemsMax = $('#tab-all div.card').length;
                            $('#tab-all div.card').hide();
                        
                            function showNextItems() {
                                var pagination = 10;
                        
                                for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                                $('#tab-all div.card:eq(' + i + ')').show();
                                }
                                itemsCount += pagination;
                                if (itemsCount >= itemsMax) {
                                $('#allShowMore').hide();
                                }
                            };
                            showNextItems();
                            $('#allShowMore').on('click', function (e) {
                                e.preventDefault();
                                showNextItems();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

<!-- <div class="wmle_loadmore">
	<a href="https://www.wemakefootballers.com/wp-admin/admin-ajax.php?action=wml_load_posts&amp;shortcodeId=1" class="wmle_loadmore_btn" rel="wmle_container">Load More</a>
</div> -->
               


<!-- new code changes end -->
                  
    </div>
        <div class="row">
        </div>
        <!-- .row -->
    </div>
        </div>
   
</main>
<!-- .site-main -->
</div>
<!-- .content-area -->

<script type="text/javascript">
      //hide all tabs first
$('.tab-content').hide();
//show the first tab content
$('#tab-1').show();

$('#select-box').change(function () {
   dropdown = $('#select-box').val();
   if(dropdown == "all"){
        $('#tab-all').show();
        $('#load-all').show();
        $('#tab-dropdown').hide();
   }else{
        $("#tab-all").hide(); 
        $('#tab-dropdown').show();
        $("#load-all").hide();
        // $(".wmle_loadmore_btn").show();
        var items = $('#tab-dropdown div.card-columns').length;
        for (var i = 0; i <= items; i++) {
            $('#tab-dropdown div.card-columns:eq(' + i + ')').show();
            if($('#tab-dropdown div.card-columns:eq(' + i + ')').length > 0){
                if($('#tab-dropdown div.card-columns:eq(' + i + ')')[0].id == "tab-"+dropdown){
                    $('#' + "tab-" + dropdown).show();        
                    $('#' + "load-" + dropdown).show();        
                }else{
                    var otherdropdown = $('#tab-dropdown div.card-columns:eq(' + i + ')')[0].id;
                    $('#'+otherdropdown).hide();        
                    $('#' + "load-" + otherdropdown.split("-")[1]).hide();        
                }
            }
        }
   }
});
</script>
<script>
    $(document).ready(function(){
        $('#tab-all').show();
        $('#load-all').show();
        $('#tab-dropdown').hide();
    }); 
</script>

<script>
    jQuery(document).ready(function() {
        //var owl = jQuery("#owl-demo");
        jQuery('.owl-carousel').owlCarousel({
            // owl.owlCarousel({
            navigation: true,
            singleItem: true,
            autoPlay: true
        });
    });

    $('.show_postcode_pop').click(function(){
        $('#myModal').css('cssText', 'display: block !important');
    })
</script>


<?php get_footer(); ?>
<script type="text/javascript">
    var a2a_config = a2a_config || {};
    a2a_config.linkname = 'Example Page';
    a2a_config.linkurl = 'http://www.example.com/page.html';
    a2a_config.num_services = 10;
    a2a_config.show_title = 1;
</script>
<script async src="//static.addtoany.com/menu/page.js"></script>
<script type="text/javascript">
    $('#owl-demo').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                //nav:true
            },
            600: {
                items: 1,
                //nav:false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    })
</script>



