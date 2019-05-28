<?php
/**
 * @version    $Id$
 * @package    WR GSS
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! class_exists( 'WR_GssHolidayCampInfo' ) ) :

/**
 * Create GssHolidayCamp element
 *
 * @package  GssHolidayCamp Shortcodes
 * @since    1.0.0
 */
class WR_GssHolidayCampInfo extends WR_Pb_Shortcode_Element {
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
  function element_config() {
    $this->config['shortcode']   = strtolower( __CLASS__ );
    $this->config['name']        = __( 'Holiday Camp Info', WR_PBL );
    $this->config['icon']        = 'wr-icon-text';
    $this->config['description'] = __( 'Holiday Camp Info Block', WR_PBL );

    // Use Ajax to speed up element settings modal loading speed
    $this->config['edit_using_ajax'] = true;
  }
  /**
   * Define shortcode settings.
   *
   * @return  void
   */
  function element_items() {
    $this->items = array(
      'styling' => array(
        array(
          'type' => 'preview',
        ),
        array(
          'name'               => __( 'Margin', WR_PBL ),
          'container_class'    => 'combo-group',
          'id'                 => 'holiday_info_block_margin',
          'type'               => 'margin',
          'extended_ids'       => array( 'holiday_info_block_margin_top', 'holiday_info_block_margin_right', 'holiday_info_block_margin_bottom', 'holiday_info_block_margin_left' ),
          'text_margin_top'    => array( 'std' => '0' ),
          'text_margin_bottom' => array( 'std' => '0' ),
          'tooltip'            => __( 'External spacing with other elements', WR_PBL )
        ),
      )
    );
  } /**
  /**
   * Generate HTML code from shortcode content.
   *
   * @param   array   $atts     Shortcode attributes.
   * @param   string  $content  Current content.
   *
   * @return  string
   */
  function element_shortcode_full( $atts = null, $content = null ) {
    $arr_params = shortcode_atts( $this->config['params'], $atts );
    extract( $arr_params );

    $random_id = WR_Pb_Utils_Common::random_string();
    $html_element = '';
    if ( ! empty( $content ) ) {
      $content = WR_Pb_Helper_Shortcode::remove_autop( $content );
    }
    $content .= WR_Pb_Helper_Shortcode::remove_autop( get_option( 'gss_blocks_holiday_info', '' ) );

    $html_element .= $content;
    $html  = sprintf( '<div class="wr_text wr_gssholidaycamp" id="%s">', $random_id );
    $html .= $html_element;
    $html .= '</div>';

    // Process margins
    if ( isset( $arr_params['holiday_info_block_margin_top'] ) )
      $arr_params['div_margin_top']    = $arr_params['holiday_info_block_margin_top'];
    if ( isset( $arr_params['holiday_info_block_margin_bottom'] ) )
      $arr_params['div_margin_bottom'] = $arr_params['holiday_info_block_margin_bottom'];
    if ( isset( $arr_params['holiday_info_block_margin_right'] ) )
      $arr_params['div_margin_right']  = $arr_params['holiday_info_block_margin_right'];
    if ( isset( $arr_params['holiday_info_block_margin_left'] ) )
      $arr_params['div_margin_left']   = $arr_params['holiday_info_block_margin_left'];

    $arr_params['css_suffix'] .= ' wr-element-table ';

    return $this->element_wrapper( $html, $arr_params );
  }
}

endif;
