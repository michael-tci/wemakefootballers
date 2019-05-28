<?php
/*
Template Name: News Page 
*/

get_header(); ?>
  <div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">
    <?php
      // Start the loop.
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    ?>
<div class="newswrap newswrappage">
  <div class="container">
    <div class="partsnewswrap">
      <div class="partsnewswrap-table">
    <div class="leftpartslidertis" data-aos="fade-up">
    <div id="owl-demo" class="owl-carousel owl-theme">
      
      <?php /* $query = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); */ ?>
      <?php $query = new WP_Query( array( 'posts_per_page' => 4, 'order' => 'DESC'  ) ); ?>
          
           <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
			      <div class="item">
			        <div class="row news-slide">
			        
			          <div class="col-xs-12">
			            <div class="news-slide-left">
			              <h3><?php the_date("D d F Y");?></h3>
			              <h2><a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			              <?php 
				              $trimexcerpt = get_the_excerpt();
				              $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 35 ); 
			              ?>
			              <p><?php echo $shortexcerpt;?><a href="<?php the_permalink(); ?>">Continue reading..</a></p>
			            </div>
			          </div>
			        </div>
			        </div>

    			<?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
			      </div><!-- owl-demo END -->

          </div>

          <div class="rightpartslidertis" data-aos="fade-up">
            <img src="<?php  echo site_url(); ?>/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg" alt="icon">
          </div>
        </div>
</div><!-- partsnewswrap END -->

			    </div>
			  </div>
    <div class="newsslidewrap">
      <div class="container">
      	<div class="row">
       
          	<?php echo do_shortcode('[wmls name="News Post" id="1"]');?>
            
            </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .newsslidewrap -->

<?php /*
<div class="newsfoot">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
			    <?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
			    <?php dynamic_sidebar( 'sidebar-2' ); ?>
			<?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
         <?php if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
			    <?php dynamic_sidebar( 'sidebar-3' ); ?>
			<?php endif; ?>
      </div>
    </div>
  </div>
</div> */ ?>

    </main><!-- .site-main -->
  </div><!-- .content-area -->
<script>
jQuery(document).ready(function () {
  //var owl = jQuery("#owl-demo");
  jQuery('.owl-carousel').owlCarousel({
 // owl.owlCarousel({
    navigation : true,
    singleItem : true,
    autoPlay: true
  });
});
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
      loop:true,
      margin:10,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              //nav:true
          },
          600:{
              items:1,
              //nav:false
          },
          1000:{
              items:1,
              nav:true,
              loop:false
          }
      }
  })
</script>
