<?php
/**
 * @version    $Id$
 * @package    WR PageBuilder
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2012 woorockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 * Technical Support:  Feedback - http://www.woorockets.com
 */

if ( ! class_exists( 'WR_Gsscarousel' ) ) :

class WR_Gsscarousel extends WR_Pb_Shortcode_Element {
  /**
   * Constructor
   *
   * @return  void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Configure shortcode.
   *
   * @return  void
   */
  public function element_config() {
    $this->config['shortcode']        = strtolower( __CLASS__ );
    $this->config['name']             = __( 'Gss Carousel', WR_PBL );
    $this->config['cat']              = __( 'Typography', WR_PBL );
    $this->config['icon']             = 'wr-icon-carousel';
    $this->config['has_subshortcode'] = 'WR_Item_' . str_replace( 'WR_', '', __CLASS__ );
    $this->config['description']      = __( 'Rotating circular content with text and images', WR_PBL );

    // Define exception for this shortcode
    $this->config['exception'] = array(
      'admin_assets' => array(
        'wr-pb-joomlashine-iconselector-js',
      ),
      'frontend_assets' => array(
          'carousel_frontend.css',
          'carousel_frontend.js',
          'owl.carousel.min.css',
          'owl.theme.default.min.css',
          'owl.carousel.min.js'
        ),
      );

    // Use Ajax to speed up element settings modal loading speed
    $this->config['edit_using_ajax'] = true;

    // Edit inline supplement
    add_action( 'wr_pb_modal_footer', array( 'WR_Pb_Objects_Modal', '_modal_footer' ) );
  }

  /**
   * Define shortcode settings.
   *
   * @return  void
   */
  public function element_items() {
    $this->items = array(
    //   'action' => array(
    // array(
    //       'id'      => 'btn_convert',
    //       'type'    => 'button_group',
    //       'bound'   => 0,
    //       'actions' => array(
    // array(
    //           'std'         => __( 'Tab', WR_PBL ),
    //           'action_type' => 'convert',
    //           'action'      => 'carousel_to_tab',
    // ),
    // array(
    //           'std'         => __( 'Accordion', WR_PBL ),
    //           'action_type' => 'convert',
    //           'action'      => 'carousel_to_accordion',
    // ),
    // array(
    //           'std'         => __( 'List', WR_PBL ),
    //           'action_type' => 'convert',
    //           'action'      => 'carousel_to_list',
    // ),
    // )
    // ),
    // ),
    //   'content' => array(

    // array(
    //       'id'            => 'gsscarousel_items',
    //       'type'          => 'group',
    //       'shortcode'     => ucfirst( __CLASS__ ),
    //       'sub_item_type' => $this->config['has_subshortcode'],
    //       'sub_items'     => array(
    // array('std' => ''),
    // array('std' => ''),
    // ),
    // ),
    // ),
      'styling' => array(
        array(
              'type' => 'preview',
        ),
        array(
              'name'    => __( 'Alignment', WR_PBL ),
              'id'      => 'align',
              'class'   => 'input-sm',
              'std'     => 'center',
              'type'    => 'radio_button_group',
              'options' => WR_Pb_Helper_Type::get_text_align(),
        ),
        array(
              'name'                 => __( 'Dimension', WR_PBL ),
              'container_class'      => 'combo-group dimension-inline',
              'id'                   => 'dimension',
              'type'                 => 'dimension',
              'extended_ids'         => array( 'dimension_width', 'dimension_height', 'dimension_width_unit' ),
              'dimension_width'      => array( 'std' => '' ),
              'dimension_height'     => array( 'std' => '' ),
              'dimension_width_unit' => array(
                'options' => array( 'px' => 'px', '%' => '%' ),
                'std'     => 'px',
        ),
              'tooltip' => __( 'Set width and height of element', WR_PBL ),
        ),
        array(
              'name'          => __( 'Items', WR_PBL ),
              'id'            => 'items',
              'type'          => 'text_append',
              'type_input'    => 'number',
              'class'         => 'input-mini',
              'std'           => '1',
              'append'        => 'Items',
              'validate'      => 'number',
              'parent_class'  => 'combo-item input-mini-inline',
              'tooltip'       => 'The number of items you want to see on the screen.'
        ),
        array(
          'name'          => __( 'Items responsive mobile (768px)', WR_PBL ),
          'id'            => 'smitems',
          'type'          => 'text_append',
          'type_input'    => 'number',
          'class'         => 'input-mini',
          'std'           => '1',
          'append'        => 'Items',
          'validate'      => 'number',
          'parent_class'  => 'combo-item input-mini-inline',
          'tooltip'       => 'The number of items you want to see on the tablet screen.'
        ),
        array(
          'name'          => __( 'Items responsive mobile (320px)', WR_PBL ),
          'id'            => 'xsitems',
          'type'          => 'text_append',
          'type_input'    => 'number',
          'class'         => 'input-mini',
          'std'           => '1',
          'append'        => 'Items',
          'validate'      => 'number',
          'parent_class'  => 'combo-item input-mini-inline',
          'tooltip'       => 'The number of items you want to see on the mobile screen.'
        ),
        array(
              'name'    => __( 'Show Arrows', WR_PBL ),
              'id'      => 'show_arrows',
              'type'    => 'radio',
              'std'     => 'yes',
              'options' => array( 'yes' => __( 'Yes', WR_PBL ), 'no' => __( 'No', WR_PBL ) ),
              'tooltip' => __( 'Previous & Next buttons', WR_PBL ),
        ),
        array(
              'name'       => __( 'Automatic Cycling', WR_PBL ),
              'id'         => 'automatic_cycling',
              'type'       => 'radio',
              'std'        => 'no',
              'options'    => array( 'yes' => __( 'Yes', WR_PBL ), 'no' => __( 'No', WR_PBL ) ),
              'has_depend' => '1',
              'tooltip' => __( 'Automatically run carousel', WR_PBL ),
        ),
        array(
              'name' => __( 'Cycling Interval', WR_PBL ),
              'type' => array(
        array(
                  'id'         => 'cycling_interval',
                  'type'       => 'text_append',
                  'type_input' => 'number',
                  'class'      => 'input-mini',
                  'std'        => '5',
                  'append'     => 'second(s)',
                  'validate'   => 'number',
        ),
        ),
              'dependency' => array('automatic_cycling', '=', 'yes'),
              'tooltip' => __( 'Set interval for each cycling', WR_PBL ),
        ),
        array(
              'name'       => __( 'Pause on mouse over', WR_PBL ),
              'id'         => 'pause_mouseover',
              'type'       => 'radio',
              'std'        => 'yes',
              'options'    => array( 'yes' => __( 'Yes', WR_PBL ), 'no' => __( 'No', WR_PBL ) ),
              'dependency' => array( 'automatic_cycling', '=', 'yes' ),
              'tooltip' => __( 'Pause cycling on mouse over', WR_PBL ),
        ),
        WR_Pb_Helper_Type::get_apprearing_animations(),
        WR_Pb_Helper_Type::get_animation_speeds(),
      )

    );
  }

  /**
   * Generate HTML code from shortcode content.
   *
   * @param   array   $atts     Shortcode attributes.
   * @param   string  $content  Current content.
   *
   * @return  string
   */
  public function element_shortcode_full( $atts = null, $content = null ) {
    $arr_params    = shortcode_atts( $this->config['params'], $atts );
    extract( $arr_params );
    $random_id     = WR_Pb_Utils_Common::random_string();
    $carousel_id   = "carousel_$random_id";

    $script        = "<script type='text/javascript'>
      (function ($){
        $(document).ready( function() {
          if( $( '#$carousel_id' ).length ) {
            // $( '#$carousel_id' ).owlCarousel({".$options."} );
            $( '#$carousel_id' ).owlCarousel({
              'loop': 'true',
              'lazyLoad': 'true',
              'lazyContent': 'true',
              'responsiveClass': 'true',
              'dots': false,
              'nav': " . ($show_arrows == 'yes' ? "true" : "false") . ",
              " . ($automatic_cycling == 'yes' ? "'autoplay': 'true',
              'autoplayTimeout': '" . (! empty( $cycling_interval ) ? intval( $cycling_interval ) * 1000 : 0) . "'," : '') . "
              " . ($pause_mouseover == 'yes' ? "'autoplayHoverPause': 'true'," : '') . "
              'responsive': {
                0: {
                  'items': 1
                },
                320: {
                  items : " .( !empty($arr_params['xsitems']) ? $arr_params['xsitems'] : 1 ) . "
                },
                530: {
                  items : " .( !empty($arr_params['smitems']) ? $arr_params['smitems'] : 1 ) . "
                },
                768: {
                  items : " .( !empty($arr_params['items']) ? $arr_params['items'] : 1 ) . "
                },
                992: {
                  items : " .( !empty($arr_params['items']) ? $arr_params['items'] : 1 ) . "
                }
              }
            });
            $( '#$carousel_id' ).fadeIn().delay(400).queue(function() {
              $(this)
              .css('transform', 'scale(1)')
              .animate({
                transform: 'scale(1)'
              }, 800).queue(function() {
                $( this )
                  .queue(function() {
                  })
                  .css('overflow', 'visible')
                  .dequeue();
              }).dequeue();
            });
          }
        });
      })( jQuery );
      </script>";

    $styles        = array();
    if ( ! empty( $dimension_width ) )
    $styles[] = "width : {$dimension_width}{$dimension_width_unit};";
    if ( ! empty( $dimension_height ) )
    $styles[] = "height : {$dimension_height}px;";

    if ( in_array( $align, array( 'left', 'right', 'inherit') ) ) {
      $styles[] = "float : $align;";
    } else if ( $align == 'center' )
    $styles[] = 'margin : 0 auto;';
    $styles[] = 'display: none;';
    $styles[] = 'overflow: hidden;';
    // $styles[] = 'transform: scale(0);';

    $styles = trim( implode( ' ', $styles ) );
    $styles = ! empty( $styles ) ? "style='$styles'" : '';

    // $sub_shortcode         = do_shortcode( $content );
    // $items                 = explode( '<!--seperate-->', $sub_shortcode );
    // $items                 = array_filter( $items );
    // $initial_open          = isset( $initial_open ) ? ( ( $initial_open > count( $items ) ) ? 1 : $initial_open ) : 1;
    // foreach ( $items as $idx => $item ) {
    //   $active                = ($idx + 1 == $initial_open) ? 'active' : '';
    //   $item                  = str_replace( '{active}', $active, $item );
    //   $item                  = str_replace( "width='{WIDTH}'", ( ! empty( $dimension_width ) ) ? "width='$dimension_width'" : '', $item );
    //   $item                  = str_replace( "height='{HEIGHT}'", ( ! empty( $dimension_height ) ) ? "height='$dimension_height'" : '', $item );
    //   $item                  = str_replace( "{HEIGHT}", $dimension_height, $item );
    //   $item                  = wpautop( $item );
    //   $items[$idx]           = $item;
    // }
    // $carousel_content      = implode( '', $items );
    $carousel_content      = WR_Pb_Helper_Shortcode::remove_autop( get_option( 'gss_blocks_holiday_info', '' ) );
    $carousel_items        = !empty($arr_params['items']) ? $arr_params['items'] : 1 ;

    $html = "<div class='owl-carousel owl-theme owl-carousels-$carousel_items' $styles id='$carousel_id'> $carousel_content</div>";

    $arr_params['css_suffix'] .= ' wr-element-carousel ';
    return $this->element_wrapper( $html . $script, $arr_params );
  }
}

endif;
