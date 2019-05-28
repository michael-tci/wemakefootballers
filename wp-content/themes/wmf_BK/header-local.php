<?php get_template_part( 'header/header', 'html' ); ?>
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

  <div class="wmf-navbar navbar collapse wmf-navbar-collapse" id='wmf-navbar-collapse'>
    <div class="container">
      <div class="visible-xs-block visible-sm-block sign-in">
        <a href="<?php _e(get_option( 'gss_login_link', $blog_siteurl . '/login/' )); ?>">login</a>
        <a href="<?php _e(get_option( 'gss_signup_link', $blog_siteurl . '/sign-up/' )); ?>">sign up</a>
      </div>
      <?php get_template_part( 'header/header', 'menu-local' ); ?>
      <div class="visible-xs-block visible-sm-block contact-us">
        <a href="<?php _e($blog_siteurl); ?>/contact-us/">Contact us</a>
      </div>
    </div>
  </div>
  <?php get_template_part( 'header/header', 'tablet-local' ); ?>
