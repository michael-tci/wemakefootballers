

<?php get_template_part( 'header/header', 'html' ); ?>
<div class="header-custom">
<?php get_template_part( 'header/header', 'banner' ); ?>

<?php
  $blog_siteurl = '';
  if ( is_multisite() ) {
    $blog_details = get_blog_details(get_current_blog_id(), true);
    $blog_siteurl = !empty($blog_details->siteurl) ? $blog_details->siteurl : '';
  } else {
    $blog_siteurl = site_url('/');
  }
?>

  <!-- <div class="wmf-navbar navbar collapse wmf-navbar-collapse" id='wmf-navbar-collapse'>
    <div class="container">

       <div class="visible-xs-block visible-sm-block sign-in">
        <a href="<?php //_e(get_option( 'gss_login_link', $blog_siteurl . '/login/' )); ?>">login</a>
        <a href="<?php //_e(get_option( 'gss_signup_link', $blog_siteurl . '/sign-up/' )); ?>">sign up</a>
      </div> 
      <?php //get_template_part( 'header/header', 'menu' ); ?>
      <div class="visible-xs-block visible-sm-block contact-us">
        <a href="<?php //_e($blog_siteurl); ?>/contact-us/">Contact us</a> 
        
         <a href="https://www.wemakefootballers.com/academy-locator/">Find an Academy</a> 
      </div>
    </div>
  </div> -->
  <?php //get_template_part( 'header/header', 'tablet' ); ?>
  
<?php if(is_front_page()): ?>

  <div class="banner-content-full" style="background:url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>)">
    <div class="banner-content-full-inset"></div>
      <div class="banner-content-full_table">
        <div class="banner-content-full_tablecell">
          <div class="container">
            <h3><span>Nurturing</span> football talent, <br>one child at a time.</h3>
            <span>Accessible and fun football coaching for boys and girls aged 4-12 of all abilities.</span>
            <div class="book-freetrial-btn"><a id="generate" href="javascript:void(0);">Book a FREE training session</a></div>
          </div>
        </div>
      </div>
  </div><!-- banner-content-full END -->
<?php endif; ?>

</div>