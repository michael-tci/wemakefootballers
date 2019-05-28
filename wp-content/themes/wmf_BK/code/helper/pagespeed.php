<?php

add_action('init', 'gss_set_image_sizes');
if(!function_exists('gss_set_image_sizes')) :
  function gss_set_image_sizes(){
    update_option( 'thumbnail_size_w', 320 );
    update_option( 'thumbnail_size_h', 320 );
    update_option( 'thumbnail_crop', 1 );

    update_option( 'medium_size_w', 1024 );
    update_option( 'medium_size_h', 1024 );

    update_option( 'large_size_w', 1920 );
    update_option( 'large_size_h', 1920 );
  }
endif;
