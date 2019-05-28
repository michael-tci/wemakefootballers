
<?php  get_template_part( 'header/header', 'html' ); ?>

<?php get_template_part( 'header/header', 'banner-local' ); ?>

<?php
  $blog_siteurl = '';
  if ( is_multisite() ) {
    $blog_details = get_blog_details(get_current_blog_id(), true);
    $blog_siteurl = !empty($blog_details->siteurl) ? $blog_details->siteurl : '';
  } else {
    $blog_siteurl = site_url('/');
  }
?>

<!--
  <div class="wmf-navbar navbar collapse wmf-navbar-collapse" id='wmf-navbar-collapse'>
    <div class="container">
      <div class="visible-xs-block visible-sm-block sign-in">
        <a href="<?php _e(get_option( 'gss_login_link', $blog_siteurl . '/login/' )); ?>">login</a>
        <a href="<?php _e(get_option( 'gss_signup_link', $blog_siteurl . '/sign-up/' )); ?>">sign up</a>
      </div>
      <?php get_template_part( 'header/header', 'menu-local' ); ?>
      <div class="visible-xs-block visible-sm-block contact-us">
        <a href="<?php _e($blog_siteurl); ?>/contact-us/">Contact us</a>
        <a href="https://www.wemakefootballers.com/academy-locator/">Find an Academy</a>
      </div>
    </div>
  </div>
-->
  <?php get_template_part( 'header/header', 'tablet-local' );
   global $blog_id;
    $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
    // $current_blog_details->blogname;
   ?>

<?php
// check for active campaign form code
if ( get_option('embed_code') ) {
    ?>
    <!-- Active Campaign Form -->
    <div id="myModal" class="row modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
            <h4 class="modal-title">Book Your Free Session</h4>
            <h4 class="modal-title">@ <?php  echo $current_blog_details->blogname; ?></h4>
          </div>
          <div class="triangle-down"></div>
          <div class="modal-body">
		  <script>
			var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
		  </script>
          <?php echo get_option('embed_code'); ?>
          </div>
          <div class="modal-footer">
          </div><div class="quotefooter"></div>
        </div>
      </div>
    </div>
    <?php
} else {
?>
    <!-- Contact Form 7 -->
    <div id="myModal" class="row modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
            <h4 class="modal-title">Book Your Free Trial</h4>
            <h4 class="modal-title">@ <?php  echo $current_blog_details->blogname; ?></h4>
          </div>
          <div class="triangle-down"></div>
          <div class="modal-body">
          <?php  echo do_shortcode('[contact-form-7 id="2602" title="Free trial form"]');  ?>
          </div>
          <div class="modal-footer">
          </div><div class="quotefooter"></div>
        </div>
      </div>
    </div>
<?php  
}
?> 
