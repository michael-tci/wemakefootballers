<header class="container-fluid wmf-header-local hidden-xs hidden-sm">
  <div class="row">
    <div class="col-md-6 header-local-left">
      <a href="/"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back to wmf</a>
      <a href="/academy-locator/">Change location</a>
    </div>
    <div class="col-md-4 header-local-center">
      <p>
        <?php
        $optionTheme = get_option('gss_theme_option');
        if ( isset($optionTheme) AND !empty($optionTheme['gsstheme_setting_logo']) ) {
          echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), $optionTheme['gsstheme_setting_logo']);
        }
        else {
          echo sprintf('<a href="%s"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), get_stylesheet_directory_uri() . '/assets/img/logo-wmf.png');
        }
        ?>
      </p>
      <p><?php echo get_bloginfo('name'); ?></p>
    </div>
    <div class="col-md-6 header-local-right">
      <div class="col-md-8 col-lg-8 contact" style="padding-top:20px;">
        <a href="<?php echo get_site_url();?>/contact-us/">Contact us</a>


        <ul>
          <?php
            if ( isset($optionTheme) AND !empty($optionTheme['social']) )
            {
                foreach ($optionTheme['social'] as $key => $social)
                {
                  echo "<li>
                          <a href='$social' title='$key' ><i class='icon-social icon-social-$key'></i></a>
                        </li>";
                }
            }
            else {
              ?>
              <li>
                <a><i class="icon-social icon-social-facebook"></i></a>
              </li>
              <li>
                <a><i class="icon-social icon-social-twitter"></i></a>
              </li>
              <li>
                <a><i class="icon-social icon-social-instagram"></i></a>
              </li>
              <?php
            }
          ?>
        </ul>
        <span  style="color:#676767;font-size:15px;display:block">Phone : <?php echo get_settings('gss_getintouch_phone'); ?></span>
      </div>
      <div class="col-md-8 col-lg-8 signin">
        <h2>existing customer?</h2>
        <h2>
          <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login here</a>
          <span>or</span>
          <a href="<?php _e(get_option( 'gss_signup_link', '/sign-up/' )) ?>">sign up</a>
        </h2>
      </div>
    </div>
  </div>
</header>
