<header class="container-fluid ">

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
      </div>
    </div>

    <div class="col-md-6">
      <div class="pull-right">
      <div class="existing-suctomers">
        <span>Existing Customers:</span>
        <a href="https://www.parentarea.co/parent/login" target="_blank">login</a>
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
  </div>
</div>
</header>

<div class="masking-menu"></div>
<div class="web-menu-bx device-992-show">
          <div class="close-menu-all"></div>
          <div class="existing-device-menu">
            <a href="<?php echo site_url(); ?>">Home</a>
            <a href="https://www.parentarea.co/parent/login" target="_blank">login</a>
            
          </div>
          <?php get_template_part( 'header/header', 'menu' ); ?>
        </div>



        <script type="text/javascript">
    
    $(document).ready(function() {
       

        $('#myModal_popup .close').click(function() {
            $('#myModal_popup').removeClass('in');
            $('#myModal_popup').hide();
        });

        
    });
</script>