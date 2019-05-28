<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=9" /> -->
  <link type="image/x-icon" href="/wp-content/themes/wmf/assets/img/favicon.ico" rel="icon">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.sync.bootstrap.min.js"></script>
  <!-- Hotjar Tracking Code for http://wemakefootballers.com -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:186945,hjsv:5};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
</head>
<?php
  $_class = ( isset($post) AND is_object($post) ) ? 'wmf-'.$post->post_name : '';
  $_classes_keys = get_post_custom_keys();
  if($_classes_keys) {
    $_class_exist = array_key_exists('class', $_classes_keys) || in_array('class', $_classes_keys);
    if($_class_exist) {
      $_class .= ' ' . implode(' ', get_post_custom_values('class'));
    }
  }
  $_class .= ' page';
  if (is_main_site()) {
    $_class .= ' page-template-default';
  } else {
    $_class .= ' page-template-page-location-dashboard-php';
  }
?>
<body <?php body_class($_class); ?>>
