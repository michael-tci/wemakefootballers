<header class="container-fluid ">
  <!-- <div class="row">
    <div class="col-md-3 gsstheme_setting_logo">
      <?php
        $optionTheme = get_option('gss_theme_option');
        if ( isset($optionTheme) AND !empty($optionTheme['gsstheme_setting_logo']) ) {
          echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), $optionTheme['gsstheme_setting_logo']);
        }
        else {
          echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), get_stylesheet_directory_uri() . '/assets/img/logo-wmf.png');
        }
      ?>
    </div>
    <div class="col-md-4 col-lg-5 gsstheme_setting_search">
      <form class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-16">
            <input class="form-control postcode-plugin-head" placeholder="Search academy - Enter a postcode" type="text" name="post_code">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-5 col-lg-offset-3 col-md-7 col-md-offset-2 text-right singin">
      <div class="col-xs-7 text-left">
        <h2>existing customer?<br />
          <span>
            <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login here</a>
            <span>or</span>
            <a href="<?php _e(get_option( 'gss_signup_link', '/sign-up/' )) ?>">sign up</a>
          </span>
        </h2>
      </div>
      <div class="col-xs-9 contact">
        <div class="row text-center">
          <div class="col-xs-7 text-center"><a href="/contact-us/">Contact us</a></div>
          <div class="col-xs-9">
            <div class="row">
            <?php
              if ( isset($optionTheme) AND !empty($optionTheme['social']) )
              {
                  foreach ($optionTheme['social'] as $key => $social)
                  {
                    echo "<div class='col-xs-5'>
                            <a href='$social' title='$key' ><i class='icon-social icon-social-$key'></i></a>
                          </div>";
                  }
              }
              else {
                ?>
                <div class="col-xs-5">
                  <a><i class="icon-social icon-social-facebook"></i></a>
                </div>
                <div class="col-xs-5">
                  <a><i class="icon-social icon-social-twitter"></i></a>
                </div>
                <div class="col-xs-5">
                  <a><i class="icon-social icon-social-instagram"></i></a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->


<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="logo-web gsstheme_setting_logo">
        <?php
          $optionTheme = get_option('gss_theme_option');
          if ( isset($optionTheme) AND !empty($optionTheme['gsstheme_setting_logo']) ) {
            echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), $optionTheme['gsstheme_setting_logo']);
          }
          else {
            echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), get_stylesheet_directory_uri() . '/assets/img/logo-wmf.png');
          }
        ?>
      </div>

      <div class="search-sectop gsstheme_setting_search">
        <!-- TrustBox widget - Micro Star -->
          <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="5630b23d0000ff000584db47" data-style-height="20px" data-style-width="100%" data-theme="dark">
          <a href="https://uk.trustpilot.com/review/wemakefootballers.com" target="_blank">Trustpilot</a>
          </div>
<!-- End TrustBox widget -->
        <!-- <input class="form-control postcode-plugin-head" placeholder="Search academy - Enter a postcode" type="text" name="post_code"> -->


        <!-- TrustBox widget - Grid -->

<!-- End TrustBox widget -->
      </div>
    </div>

    <div class="col-md-6">
      <div class="pull-right">
      <div class="existing-suctomers">
        <span>Existing Customers:</span>
        <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login</a>
      </div>

      <div class="web-menu-full">
        
        <div class="webmenu-icon">

        </div>
        <div class="web-menu-bx device-hiden">
          <div class="close-menu-all"></div>
          <div class="existing-device-menu">
            <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login</a>
            <a href="<?php _e(get_option( 'gss_signup_link', $blog_siteurl . '/sign-up/' )); ?>">sign up</a>
          </div>
          <?php get_template_part( 'header/header', 'menu' ); ?>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</header>

<div class="masking-menu"></div>
<div class="web-menu-bx device-992-show">
          <div class="close-menu-all"></div>
          <div class="existing-device-menu">
            <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login</a>
            <a href="<?php _e(get_option( 'gss_signup_link', $blog_siteurl . '/sign-up/' )); ?>">sign up</a>
          </div>
          <?php get_template_part( 'header/header', 'menu' ); ?>
        </div>