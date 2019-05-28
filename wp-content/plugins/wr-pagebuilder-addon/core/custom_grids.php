<?php

add_action( 'wr_pb_addon', 'wr_pb_gss_custom_grids');
// add_action( 'wr_pb_init_plugin', 'wr_pb_gss_custom_grids');
if ( !function_exists('wr_pb_gss_custom_grids') ) {
  function wr_pb_gss_custom_grids() {

    /**
     * init carousel replace default
     */
    if ( !class_exists('WR_Carousel') && class_exists('WR_Pb_Shortcode_Parent') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/' . $elementsDir . '/carousel/carousel.php';
    }

    /**
     * init googlemap replace default
     */
    if ( !class_exists('WR_Googlemap') && class_exists('WR_Pb_Shortcode_Parent') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/' . $elementsDir . '/googlemap/googlemap.php';
    }

    /**
     * init image replace default
     */
    if ( !class_exists('WR_Image') && class_exists('WR_Pb_Shortcode_Parent') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/' . $elementsDir . '/image/image.php';
    }

    /**
     * init testimonial replace default
     */
    if ( !class_exists('WR_Testimonial') && class_exists('WR_Pb_Shortcode_Parent') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/' . $elementsDir . '/testimonial/testimonial.php';
    }

    /**
     * init column replace default
     */
    if ( !class_exists('WR_Column') && class_exists('WR_Pb_Shortcode_Layout') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/core/layout/column.php';
    }

    /**
     * init row replace default
     */
    if ( !class_exists('WR_Row') && class_exists('WR_Pb_Shortcode_Layout') ) {
      global $elementsDir;
      require_once __GSS_PB_DIR__ . '/core/layout/row.php';
    }

  }
}

/**
 * default disable pb boootstrap js, css
 */
add_action( 'wr_pb_modal_page_content', 'wr_gss_pb_modal_page_content' );
// add_action( 'wr_pb_register_assets', 'wr_gss_pb_modal_page_content' );
if(!function_exists('wr_gss_pb_modal_page_content')) {
  function wr_gss_pb_modal_page_content($assets) {

    update_option( 'wr_pb_settings_boostrap_js', 'disable', 'yes' );
    update_option( 'wr_pb_settings_boostrap_css', 'disable', 'yes' );

  }
}

add_action( 'wp_enqueue_scripts', 'wr_gss_pb_enqueue_scripts' );
if(!function_exists('wr_gss_pb_enqueue_scripts')) {
  function wr_gss_pb_enqueue_scripts() {
    wp_enqueue_style('wr-pb-frontend', plugins_url( 'assets/woorockets/css/front_end.css', plugin_dir_path( __FILE__ ) ), false, false);

    wp_enqueue_style('wr-pb-gss-carousel', plugins_url( 'elements/carousel/assets/owl.carousel.2.0.0-beta.3/assets/owl.carousel.min.css', plugin_dir_path( __FILE__ ) ), false, false);
    wp_enqueue_style('wr-pb-gss-carousel-theme', plugins_url( 'elements/carousel/assets/owl.carousel.2.0.0-beta.3/assets/owl.theme.default.min.css', plugin_dir_path( __FILE__ ) ), false, false);
    wp_enqueue_script('wr-pb-gss-carousel', plugins_url( 'elements/carousel/assets/owl.carousel.2.0.0-beta.3/owl.carousel.min.js', plugin_dir_path( __FILE__ ) ), array('jquery'), false);

    wp_enqueue_style('wr-pb-gss-testimonial_frontend', plugins_url( 'elements/testimonial/assets/css/testimonial_frontend.css', plugin_dir_path( __FILE__ ) ), false, false);
    wp_enqueue_script('wr-pb-gss-testimonial_frontend', plugins_url( 'elements/testimonial/assets/js/testimonial_frontend.js', plugin_dir_path( __FILE__ ) ), false, false);
  }
}
add_action( 'admin_enqueue_scripts', 'wr_gss_pb_admin_enqueue_scripts' );
if(!function_exists('wr_gss_pb_admin_enqueue_scripts')) {
  function wr_gss_pb_admin_enqueue_scripts() {
    wp_enqueue_style('wr-pb-layout-font', plugins_url('assets/3rd-party/wr-layout-font/css/wr-layout-font.css', plugin_dir_path( __FILE__ ) ), false, false);
    wp_enqueue_script('wr-pb-layout', plugins_url('assets/woorockets/js/layout.js', plugin_dir_path( __FILE__ ) ), array('jquery'), false);
  }
}

#reload_wr_shortcodes
#wr_pb_init_plugin
#wr_pb_footer
#wr_pb_modal_page_content
#wr_pb_addon
// add_action('reload_wr_shortcodes', die('1'));
// add_action( 'wr_pb_init_plugin', die('2'));
// add_action( 'wr_pb_footer', die('3'));
// add_action( 'wr_pb_modal_page_content', die('4'));
// add_action( 'wr_pb_addon', die('4'));



// add_action( 'wr_pb_modal_page_content', 'wr_pb_gss_custom');
// /**
// * The function to init the story
// **/
// if ( !function_exists('wr_pb_gss_custom') ) {
//   function wr_pb_gss_custom() {
//     if ( class_exists('WR_Pb_Init_Assets') ) {
//       die('hehe');
//     }
//   }
// }
