<?php
/*
Template Name: News Page 
*/

get_header(); ?>
<link href="<?php echo bloginfo('stylesheet_directory');?>/assets/css/fontend/owl.carousel.css" rel="stylesheet">


  <div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">

      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();
        the_content();
      endwhile; ?>
      
      
      
<div class="newswrap">
  <div class="container">
    <div id="owl-demo" class="owl-carousel owl-theme">
      
      <?php $query = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); ?>
          
           <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
			      <div class="item">
			        <div class="row news-slide">
			        
			          <div class="col-xs-12 col-sm-12 col-md-5">
			            <div class="news-slide-left">
			              <h3><?php the_date("D d F Y");?></h3>
			              <h2><a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			              <p><?php echo substr('0','50',the_excerpt());?></p>
			            </div>
			          </div>
			          
			          <div class="col-xs-12 col-sm-12 col-md-7">
			            <div class="news-slide-right"> 
			            <a href="<?php the_permalink(); ?>">
					            	<?php if( has_post_thumbnail() ) { ?>
				                      <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
				                    <?php } ?>
				         </a>
			             </div>
			          </div>
			         
			        </div>
			        </div>
			      
			      
			      
			 <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>


			      </div>
			    </div>
			  </div>
  
  
  <div class="newsslidewrap">
    <div class="container">
    	<div class="row">
     
        	<?php echo do_shortcode('[wmls name="News Post" id="1"]');?>
          
          </div><!-- .row -->
          
	    
  </div><!-- .container -->
</div><!-- .newsslidewrap -->


<?php 

/*
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $paged = ( get_query_var('page') ) ? get_query_var('page') : $paged;
	
	$args = array(
		'suppress_filters' => true,
        'post_type' => array( 'post' ),
        'posts_per_page' => 3,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
     $out .= '<div class="small-12 large-4 columns">
                <h1>'.get_the_title().'</h1>
         </div>';

    endwhile;
    endif;
    //wp_reset_postdata();die($out);
*/
	

	
?>


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
</div>

      
      
      

    </main><!-- .site-main -->
  </div><!-- .content-area -->

<?php get_footer(); ?>

<script src="<?php echo bloginfo('stylesheet_directory');?>/assets/js/fontend/owl.carousel.js"></script> 
<script>

jQuery(document).ready(function () {
	    
 
  var owl = jQuery("#owl-demo");
 
  owl.owlCarousel({
    navigation : true,
    singleItem : true,
    transitionStyle : "fade",
    autoPlay:true
  });
  
 
});

/*
jQuery(function () {
    jQuery(".news-box").slice(0, 4).show();
    jQuery("#loadMore").on('click', function (e) {
        e.preventDefault();
        jQuery(".news-box:hidden").slice(0, 4).slideDown();
        if ($(".news-box:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        
    });
});
*/
//var ajaxurl = "<?php //echo admin_url('admin-ajax.php')?>";

</script>

<script type="text/javascript">
var a2a_config = a2a_config || {};
a2a_config.linkname = 'Example Page';
a2a_config.linkurl = 'http://www.example.com/page.html';
a2a_config.num_services = 10;
a2a_config.show_title = 1;
</script>

<script async src="//static.addtoany.com/menu/page.js"></script>

