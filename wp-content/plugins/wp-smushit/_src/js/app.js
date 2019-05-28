/**
 * Admin modules
 */

let WP_Smush = WP_Smush || {};
window.WP_Smush = WP_Smush;

require( './modules/helpers' );
require( './modules/admin' );
require( './modules/bulk-smush' );
require( './modules/modals' );
require( './modules/directory-smush' );
require( './smush/cdn' );

/**
 * Notice scripts.
 *
 * Notices are used in the following functions:
 *
 * @used-by WP_Smushit::smush_updated()
 * @used-by WP_Smush_S3::3_support_required_notice()
 * @used-by WP_Smush_View::installation_notice()
 *
 * @todo should this be moved out in a separate file like common.scss?
 */
require( './modules/notice' );