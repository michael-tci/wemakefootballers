<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="container">
    <div class="row">
      <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content" id="entry-content">
  
  
    <?php if(get_the_ID() == '279') { ?>
  <div class="video_banners">
  <video autoplay loop id="video-background" muted>
  	<source src="<?php echo bloginfo('siteurl'); ?>/wp-content/uploads/2016/05/Video_For_Header_Orange_Overlay.webm" type="video/webm">
  	<source src="<?php echo bloginfo('siteurl'); ?>/wp-content/uploads/2016/05/Video_For_Header_Orange_Overlay.mp4" type="video/mp4">
  </video>
  </div>
  <div class="image-background">
	  <img src="<?php echo bloginfo('siteurl'); ?>/wp-content/themes/wmf/assets/img/01_home_final_02.jpg">
  </div>
  <?php } ?>

  
    <?php the_content(); ?>
  </div><!-- .entry-content -->

</article><!-- #post-## -->
