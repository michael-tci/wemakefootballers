<?php wpb_set_post_views(get_the_ID());?>
    <?php wpb_get_post_views(get_the_ID());?>
        <div class="wmfNews">

            <div class="container">
                <div class="row">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="container">

                            <div class="full-breadcrumbs">
                                <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
                            </div>

                        </div>
                        <!-- .entry-header -->

                        <div class="col-xs-16">

                            <div class="detail-left">

                                <div class="detailimg">
                                    <?php if( has_post_thumbnail() ) { ?>
                                        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
                                            <?php } ?>
                                </div>
                                <h2 class="blogposttitle"><?php the_title(); ?></h2>
                                <h3 class="blogpost-date"><?php the_date("D d F Y");?></h3>

                                <div class="detailBlogDesc">
                                    <?php _e(wpautop(get_the_content())); ?>
                                </div>

                            

                                <div class="footer-article">
                                    <div class="socialblog">
                                        <h3>Share this article</h3>
                                        <?php if ( is_active_sidebar( 'sidebar-4' )  ) : ?>
                                            <?php dynamic_sidebar( 'sidebar-4' ); ?>
                                                <?php endif; ?>
                                    </div>

                                    <div class="backbtn btn btn-primary">
                                        <a href="<?php echo get_site_url()?>/news">Back to news</a>
                                    </div>
                                </div>


                                

                            </div>
                            <!-- detail-left -->

                        </div>
                        <!-- col-md-6 -->

                    </article>
                    <!-- #post-## -->

                </div>
                <!-- row -->
            </div>
            <!-- container -->


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

                            <!-- <div class="jsn-bootstrap3 wr-element-container wr-element-text">
                                <div class="text-center">
                                <div class="btn btn-primary"><a href="<?php //echo site_url(); ?>/news/">Read More</a></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div><!-- article-newspost_bottom END -->

        </div>