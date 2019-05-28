<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/
if ( file_exists(locate_template('code/core/core.php')) )
{
  locate_template('code/core/core.php', true, true);
  if ( !class_exists('gssCore') AND class_exists('core') )
  {
    /**
     * Core
     */
    class gssCore extends core
    {
      /**
       * [__construct description]
       * @param array $argument [description]
       */
      function __construct($argument = array()) {
        $this->initialize();
      }

      /**
       * [initialize description]
       * @return [type] [description]
       */
      public function initialize() {
        /**
         * Register Menu
         */
        add_action( 'after_setup_theme', array($this, 'registerMenu'));

        /**
         * theme add assets libs
         */
        add_action( 'init', array($this, 'generalAssets') );
        add_action( 'widgets_init', array($this, 'gss_widgets_init') );

        /**
         * wpautop control options
         * view in wp-admin -> Appearance -> wpautop control
         */
        $this->helper('wpautop-control');

        /**
         * Init theme
         */
        if ( is_admin() ) {
          $this->adminInit();
        } else {
          $this->fontendInit();
        }
      }

      /**
       * [generalAssets description]
       * @return [type] [description]
       */
      public function generalAssets(){
        wp_enqueue_script('bootstrap-js', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js#asyncload', array('jquery'), false);
        wp_enqueue_script('core-js', get_stylesheet_directory_uri() . '/assets/js/core.js', array('bootstrap-js'), '1.0.0');
      }

      /**
       * [adminInit description]
       * @return [type] [description]
       */
      public function adminInit() {
        $this->template()->load('code/backend/admin.php');
        if ( class_exists('gssAdmin') ) {
          $gssAdmin = new gssAdmin();
        }
      }

      /**
       * [fontendInit description]
       * @return [type] [description]
       */
      public function fontendInit() {
        $this->template()->load('code/fontend/fontend.php');
        if ( class_exists('gssFontEnd') ) {
          new gssFontEnd();
        }
      }

      public function registerMenu() {
        register_nav_menus(array(
          'primaryLocation'     => 'primaryLocation',
          'footer-menu-link'    => 'Footer menu link',
          'footer-menu-detail'  => 'Footer menu detail',
        ));
      }

      function gss_widgets_init() {
        register_sidebar( array(
          'name'          => __( 'Twitter Area', 'gss' ),
          'id'            => 'sidebar-1',
          'description'   => __( 'Add widgets here to appear in your sidebar.', 'gss' ),
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
        ) );
        
        register_sidebar( array(
          'name'          => __( 'Facebook Area', 'gss' ),
          'id'            => 'sidebar-2',
          'description'   => __( 'Add widgets here to appear in your sidebar.', 'gss' ),
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
        ) );
        
        register_sidebar( array(
          'name'          => __( 'Instagram Area', 'gss' ),
          'id'            => 'sidebar-3',
          'description'   => __( 'Add widgets here to appear in your sidebar.', 'gss' ),
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
        ) );
        
        register_sidebar( array(
          'name'          => __( 'Social Share', 'gss' ),
          'id'            => 'sidebar-4',
          'description'   => __( 'Add widgets here to appear in your sidebar.', 'gss' ),
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
        ) );
      }

    }
  }
}
?>
