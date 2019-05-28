<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/
if ( !class_exists('gssFontEnd') )
{
  class gssFontEnd extends gssCore
  {

    public function __construct(){
      /**
       * load helper libs
       */
      $this->helper('breadcrumbs');
      $this->helper('shortcode');
      $this->helper('pagetitle');
      $this->helper('pagespeed');
      $this->helper('pagination');

      /**
       * load theme settings
       */
      add_action( 'wp_enqueue_scripts', array($this, 'gss_enqueue_scripts'));
      add_action( 'after_setup_theme', array($this, 'gss_dequeue_assets'));
      add_action( 'wp_footer', array($this, 'footerUpdate'));
    }

    function gss_dequeue_assets() {
      add_action( 'wp_enqueue_scripts', array($this, 'gss_dequeue_scripts'));
      add_action( 'wp_enqueue_scripts', array($this, 'gss_dequeue_style'));
    }

    /**
     * [gss_dequeue_scripts description]
     * @return [type] [description]
     */
    function gss_dequeue_scripts() {
      wp_dequeue_script('twentyfifteen-skip-link-focus-fix');
      wp_dequeue_script('twentyfifteen-script');
    }

    /**
     * [gss_dequeue_style description]
     * @return [type] [description]
     */
    public function gss_dequeue_style() {
      wp_dequeue_style('twentyfifteen-fonts');
      wp_dequeue_style('twentyfifteen-style');
      wp_dequeue_style('genericons');
      wp_dequeue_style('twentyfifteen-ie');
      wp_dequeue_style('twentyfifteen-ie7');
    }

    /**
     * [gss_enqueue_scripts description]
     * @return [type] [description]
     */
    public function gss_enqueue_scripts() {
      /**
       * Style
       */
      wp_enqueue_style('gss-font-open-sans-condensed', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700', array(), false);
      wp_enqueue_style('gss-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800', array(), false);
      ///wp_enqueue_style('gss-font-open-sans-local', get_stylesheet_directory_uri().'/assets/fonts/opensans/stylesheet.css', array(), false);
      // wp_enqueue_style('gss-select-2', '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css', array(), false);
      wp_enqueue_style('mCustomScrollbar', get_stylesheet_directory_uri().'/assets/js/fontend/jquery.mCustomScrollbar.min.css', array(), false);
      wp_enqueue_style('gss-general-fontend', get_stylesheet_directory_uri().'/assets/css/fontend/app.min.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/fontend/app.min.css'));
      wp_enqueue_style ('chosen', get_stylesheet_directory_uri() .'/assets/css/fontend/chosen.css', array(), false);
      /*------ Scripts ------*/
      /**
       * jwplayer
       */

      wp_deregister_script('jquery-core');
      wp_register_script('jquery-core',
        '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js',
        false,
        false,
        true
      );
      wp_enqueue_script('jquery-core');

      wp_deregister_script('jquery-migrate');
      wp_register_script('jquery-migrate',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.0/jquery-migrate.min.js',
        false,
        false,
        true
      );
      // wp_enqueue_script('jquery-migrate');

      wp_deregister_script('jquery');
      wp_register_script('jquery',
        false,
        array( 'jquery-core', 'jquery-migrate' ),
        false,
        true
      );
      // wp_enqueue_script('jquery');

  wp_enqueue_script('jwplayer',
        '//content.jwplatform.com/libraries/dDNu3K4L.js',
        array( 'jquery' ),
        false,
        true
      ); 
	  
      /**
       * jquery-lazyload
       */
    

/***	wp_enqueue_script('jquery-lazyload',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js',
        array( 'jquery' ),
        false,
        true
      ); **/
      /**
       * general-fonted
       */
    /***  wp_enqueue_script('gss-general-fonted',
        get_stylesheet_directory_uri().'/assets/js/fontend/general.min.js',
        array('jquery', 'jwplayer', 'jquery-lazyload'),
        filemtime(get_stylesheet_directory() . '/assets/js/fontend/general.min.js'),
        true
      ); ***/
      /**
       * Libs
       */
   /***  wp_enqueue_script( 'chosen',
        get_stylesheet_directory_uri() . '/assets/js/fontend/chosen.jquery.js',
        array( 'gss-general-fonted' ),
        false,
        true
      );
	  
	 ***/
  /***  wp_enqueue_script( 'mCustomScrollbar',
        get_stylesheet_directory_uri().'/assets/js/fontend/jquery.mCustomScrollbar.concat.min.js',
        array( 'gss-general-fonted' ),
        false,
        true
      ); **/
    
/***	wp_enqueue_script( 'wr-pb-googlemap-js',
        'https://maps.googleapis.com/maps/api/js',
        null,
        false,
        true
      ); **/
   
   wp_enqueue_script( 'gss-select-2',
        '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
        array('jquery'),
        false,
        true
      );
	  
	 
      /**
       * main-fonted
       */
    /*  wp_enqueue_script('gss-main-fonted',
        get_stylesheet_directory_uri() . '/assets/js/fontend/main.min.js',
        array( 'gss-general-fonted', 'jquery', 'wr-pb-googlemap-js' ),
        filemtime(get_stylesheet_directory() . '/assets/js/fontend/main.min.js'),
        true
      );
	  **/

      /**
       * wmf_locations
       */
      $option = json_decode(do_shortcode('[gss_blogs_select ]'));
      wp_localize_script('gss-main-fonted', 'wmf_locations', !empty($option) ? $option : null);

      /**
       * blogPostcode
       */
      $blogPostcode = get_option('gss_postcode');
      wp_localize_script('gss-main-fonted', 'blogPostcode', !empty($blogPostcode) ? $blogPostcode : null);

      /**
       * blogAddress
       */
      $blogAddress = get_option('gss_postcode');
      wp_localize_script('gss-main-fonted', 'blogAddress', !empty($blogAddress) ? $blogAddress : !empty($blogPostcode) ? $blogPostcode : '');

      /**
       * blogUrl
       */
      if ( is_multisite() ) {
        $blog_details = get_blog_details(get_current_blog_id(), true);
        $blog_siteurl = !empty($blog_details->siteurl) ? $blog_details->siteurl : '';
      } else {
        $blog_siteurl = site_url('/');
      }
      wp_localize_script('gss-main-fonted', 'blogUrl', $blog_siteurl);

      /**
       * blog_names
       */
      $blog_names = array();
      if( is_multisite() ) {
        $blogs = wp_get_sites();
        $i = 0;
        foreach ($blogs as $blog) {
          $blog_names[$i] = get_blog_option($blog['blog_id'], 'gss_academy_name');
          $i++;
        }
      }
      wp_localize_script('gss-main-fonted', 'blog_names', !empty($blog_names) ? $blog_names : null);

      /**
       * is_birthday_parties
       */
      wp_localize_script('gss-main-fonted', 'is_birthday_parties', get_option('gss_birthday_parties_url') == get_the_ID() ? "true" : "false" );

      /**
       * is_121_coaching
       */
      wp_localize_script('gss-main-fonted', 'is_121_coaching', get_option('gss_121_coaching_url') == get_the_ID() ? "true" : "false" );

      /**
       * postcodeVal
       */
      $postcodeVal = filter_input(INPUT_POST, 'postcode');
      if (!empty($postcodeVal) && $postcodeVal) {
        $postcodeVal = trim($postcodeVal);
      }
      wp_localize_script('gss-main-fonted', 'postcodeVal', !empty($postcodeVal) ? $postcodeVal : null);

      /**
       * wmf_locations_dis
       */
      wp_localize_script('gss-main-fonted', 'wmf_locations_dis', array());

      /**
       * wmf_main_url
       */
      wp_localize_script('gss-main-fonted', 'wmf_main_url', network_site_url());
      
      wp_enqueue_script( 'custom_js', 'https://www.wemakefootballers.com/wp-content/themes/wmf/assets/js/custom.js', array( 'jquery'), '', true );
      wp_localize_script( 'custom_js', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'noposts' => __('No older posts found', 'fireproduct'), ));
      
      


    }

    /**
     * [footerUpdate description]
     * @return [type] [description]
     */
	/*** 
	
    public function footerUpdate(){
      $gss_blogs_other_select = do_shortcode('[gss_blogs_other_select ]');
      $gss_blogs_other_select = !empty($gss_blogs_other_select) ? $gss_blogs_other_select : '';

      echo "<script type='text/javascript' async=\"async\">
        (function($){
          $(document).ready(function() {
            $( window ).load(function() {

              $('body').fontEnd({
                skin_url: '".get_stylesheet_directory_uri()."/'
              });

              $('[name=academy]').html('<option>Select an academy</option>');
              $('[name=wmf_select]').html('<option>Click to select academy</option>');
              $('[name=wmf_select2]').html('<option>Click to select academy</option>');
              $.each(".$gss_blogs_other_select.", function( index, val) {
                $('[name=academy]').append('<option value=\"' + val.value + '\">' + val.label + '</option>');
                $('[name=wmf_select]').append('<option value=\"' + val.label + '\">' + val.label + '</option>');
                $('[name=wmf_select2]').append('<option value=\"' + val.label + '\">' + val.label + '</option>');
              });

              $( document ).on('change', '[name=academy]', function() {
                if($(this).val()) {
                  var url = $(this).val() + '/contact-us/ #ajax-form';
                  $('#ajax-form').html('<div class=\"loading\"><div class=\"bounce1\"></div><div class=\"bounce2\"></div></div>');
                  $('#ajax-form').load(url);
                }
              });

            });
          });
        })(jQuery);
      </script>";
    } ***/
	


  }
}

?>
