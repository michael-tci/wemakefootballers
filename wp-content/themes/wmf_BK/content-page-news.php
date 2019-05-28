<?php wpb_set_post_views(get_the_ID());?>
<?php wpb_get_post_views(get_the_ID());?>

<?php 
	/*
$custom_fields = get_post_custom(post_id);
	$my_custom_field = $custom_fields['wpb_post_views_count'];
	foreach ( $my_custom_field as $value ) { 
		     //echo $value;
		  } 
*/
?>
  
<div class="wmfNews">  
  
  <div class="container">
  <div class="row">
  
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="container">
    <div class="row">
      <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
  </header><!-- .entry-header -->

  
   <div class="col-xs-12 col-sm-12 col-md-8">
   
   <div class="detail-left">
			   <h3><?php the_date("D d F Y");?></h3>
			   <h2><?php the_title(); ?></h2>
   				<div class="detailimg">
	   				<?php if( has_post_thumbnail() ) { ?>
				                      <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
				    <?php } ?>
   			    </div>
			   <div class="detailBlogDesc"><?php _e(wpautop(get_the_content())); ?></div>


				<div class="socialblog">
				<h3>Share this article</h3>

				<!--
<span><a href="#"><img src="<?php echo bloginfo('stylesheet_directory');?>/assets/img/twt.png"></a></span>
				<span><a href="#"><img src="<?php echo bloginfo('stylesheet_directory');?>/assets/img/fb.png"></a></span>
				<span><a href="#"><img src="<?php echo bloginfo('stylesheet_directory');?>/assets/img/gplus.png"></a></span>
				<span><a href="#"><img src="<?php echo bloginfo('stylesheet_directory');?>/assets/img/pin.png"></a></span>
-->
				<?php if ( is_active_sidebar( 'sidebar-4' )  ) : ?>
				    <?php dynamic_sidebar( 'sidebar-4' ); ?>
				<?php endif; ?>
				</div>

				<div class="backbtn">
				<a href="<?php echo get_site_url()?>/news-demo"><i class="fa fa-angle-left" aria-hidden="true"></i>Back to news</a>
				</div>

   </div><!-- detail-left -->

</div><!-- col-md-6 -->
   
    <div class="col-xs-12 col-sm-12 col-md-4">
    <div class=" detail-right">
    			
    			<div class="articles">
	    			<h2>Popular articles</h2>
				    <div class="articlecover">
				    
				    <?php $query = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); ?>
				    
				    <?php if ( $query->have_posts() ) : ?>
				    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
				    
				    <div class="articlesFull">
				    
				       <div class="articles-left">
				       		<?php if( has_post_thumbnail() ) { ?>
				                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
				            <?php } ?>
				       </div>
				       
				        <div class="articles-right">
					        <h3><a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					        <p><?php the_excerpt(); ?></p>
				        </div>
				        
				    </div>
				        
				      <?php endwhile; ?>
				     <?php wp_reset_postdata(); ?>
				     <?php endif; ?>
				        
				    </div>
    
    			</div>
    			
    			<div class="articles2">
	    			<h2>Recommended articles</h2>
	    			
	    			<?php 
					$args = array( 'numberposts' => 2, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
					$postslist = get_posts( $args ); ?>
					<?php foreach ($postslist as $post) :  setup_postdata($post); ?> 
				    <div class="articlecover">
				    
				       <div class="articles-left">
				       		<?php if( has_post_thumbnail() ) { ?>
				                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
				            <?php } ?>
				       </div>
				       
				        <div class="articles-right">
					        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"> <?php the_title(); ?></a></h3>
					        <p><?php the_excerpt(); ?></p>
				        </div>
				        
				    </div>
				    <?php endforeach; ?>
				    
    			</div>
    
    </div>
    </div>
    
    </article><!-- #post-## -->
    
  </div><!-- row -->
  </div><!-- container -->
  
</div>
  
  
  
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


  







