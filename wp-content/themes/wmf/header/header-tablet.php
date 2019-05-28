<div class="wmf-navbar-header navbar text-center visible-xs-block visible-sm-block">
  <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#wmf-navbar-collapse" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <?php
    $wmf_navbar_logo_link = get_stylesheet_directory_uri() . '/assets/img/logo-wmf.png';
    if ( isset($optionTheme) AND !empty($optionTheme['gsstheme_setting_logo']) ) {
      $wmf_navbar_logo_link = $optionTheme['gsstheme_setting_logo'];
    }
    printf('<a href="%s" class="wmf-navbar-header-logo"><img src="%s" alt="" class="center-block img-responsive"/></a>', get_site_url(), $wmf_navbar_logo_link);
  ?>
  <a href="#wmf-navbar-header-search" class="glyphicon glyphicon-search wmf-navbar-header-search" aria-hidden="true" aria-expanded="false" data-toggle="collapse"></a>
  <div class="collapse" id="wmf-navbar-header-search">
    <?php get_template_part( 'header/header', 'searchform' ); ?>
  </div>
</div>
