<?php

/**
 * Plugin Name: WR PageBuilder Addon by Gss
 * Plugin URI: htt://www.gsmartsolutions.com
 * Author: Author: Village Ghost <villages.ghost@gmail.com> & Dbot <caothu91@gmail.com>
 * Author URI: htt://www.gsmartsolutions.com
 * Version: 1.0
 * Description: Plugin for microsite, <br />a solution for wordpress microsite.
 * License: GNU/GPL2 v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

$elementsDir = 'elements';
define( '__GSS_PB_DIR__', plugin_dir_path( __FILE__ ) );

/**
* The function to init the story
**/
add_action( 'wr_pb_addon', 'wr_pb_gss_init');
if ( !function_exists('wr_pb_gss_init') ) {
  function wr_pb_gss_init() {

    if ( !class_exists('WR_PB_Gss_Addon') ) {
      class WR_PB_Gss_Addon extends WR_Pb_Addon {

        public function __construct() {
          global $elementsDir;
          $this->set_provider(
            array(
              'name' => 'WR PageBuilder Addon by Gss',
              'file' => __FILE__,
              'shortcode_dir' => $elementsDir,
            )
          );
          parent::__construct();
        }
      }

    }
    // Init the Plugin Settings
    $this_ = new WR_PB_Gss_Addon();
  }
}

/**
 * init gss microsite
 */
require_once plugin_dir_path( __FILE__ ) . '/core/custom_grids.php';
require_once plugin_dir_path( __FILE__ ) . '/core/microsite.php';
require_once plugin_dir_path( __FILE__ ) . '/core/microsite_shortcode.php';
