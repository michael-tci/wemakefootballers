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
      <div class="col-md-8 col-lg-8 signin">
        <h2>existing customer:</h2>
        <h2>
          <a href="<?php _e(get_option( 'gss_login_link', '/login/' )) ?>">login here</a>
        </h2>
      </div>
      <div class="web-menu-full">
        <div class="webmenu-icon">
        </div>
        <div class="web-menu-bx device-hiden">
          <div class="close-menu-all"></div>
          <div class="existing-device-menu">
            <a href="<?php echo site_url(); ?>">Home</a>
            <a href="https://www.parentarea.co/parent/login" target="_blank">login</a>
            
          </div>
          <?php get_template_part( 'header/header', 'menu' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
