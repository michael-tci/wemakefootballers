<?php

if ( !function_exists('gss_microsite_init') ) {
  add_action('init', 'gss_microsite_init');
  function gss_microsite_init() {
    add_filter( 'wpmu_blogs_columns', 'add_microsite_settings_page_in_list');
    add_action( 'manage_sites_custom_column', 'siteid_columns', 10, 3);
    add_action( 'manage_blogs_custom_column', 'siteid_columns', 10, 3);
    add_action( 'admin_footer', 'add_microsite_settings_page_in_info');
    add_action( 'admin_init', 'save_microsite_settings_page_in_info');

    add_action( 'admin_init', 'add_microsite_settings_page_in_options_general');
    if ( is_admin() ) {
      gss_microsite_backend_init();
    }
  }

  /**
   * [save_microsite_settings_page_in_info description]
   * @return [type] [description]
   */
  function save_microsite_settings_page_in_info() {

    global $pagenow;

    if( 'site-info.php' == $pagenow &&
        isset($_REQUEST['action']) &&
        'update-site' == $_REQUEST['action']
    ) {

      if ( ! is_multisite() ) {
        wp_die( __( 'Multisite support is not enabled.' ) );
      }

      if ( ! current_user_can( 'manage_sites' ) ) {
        wp_die( __( 'You do not have sufficient permissions to edit this site.' ) );
      }

      $id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

      if ( ! $id ) {
        wp_die( __('Invalid site ID.') );
      }

      $details = get_blog_details( $id );
      if ( ! $details ) {
        wp_die( __( 'The requested site does not exist.' ) );
      }

      if ( ! can_edit_network( $details->site_id ) ) {
        wp_die( __( 'You do not have permission to access this page.' ), 403 );
      }

      if ( isset( $_POST['blog']['gss_postcode'] ) ) {
        update_blog_option($details->blog_id, 'gss_postcode', $_POST['blog']['gss_postcode']);
      }

      if ( isset( $_POST['blog']['gss_address'] ) ) {
        update_blog_option($details->blog_id, 'gss_address', $_POST['blog']['gss_address']);
      }

      if ( isset( $_POST['blog']['gss_academy_name'] ) ) {
        update_blog_option($details->blog_id, 'gss_academy_name', $_POST['blog']['gss_academy_name']);
      }

      if ( isset( $_POST['blog']['gss_getintouch_text'] ) ) {
        update_blog_option($details->blog_id, 'gss_getintouch_text', $_POST['blog']['gss_getintouch_text']);
      }

      if ( isset( $_POST['blog']['gss_getintouch_phone'] ) ) {
        update_blog_option($details->blog_id, 'gss_getintouch_phone', $_POST['blog']['gss_getintouch_phone']);
      }

      if ( isset( $_POST['blog']['gss_getintouch_email'] ) ) {
        update_blog_option($details->blog_id, 'gss_getintouch_email', $_POST['blog']['gss_getintouch_email']);
      }

      if ( isset( $_POST['blog']['gss_birthday_parties_url'] ) ) {
        update_blog_option($details->blog_id, 'gss_birthday_parties_url', $_POST['blog']['gss_birthday_parties_url']);
      }

      if ( isset( $_POST['blog']['gss_121_coaching_url'] ) ) {
        update_blog_option($details->blog_id, 'gss_121_coaching_url', $_POST['blog']['gss_121_coaching_url']);
      }

    }
}

  /**
   * [add_microsite_settings_page_in_info description]
   */
  function add_microsite_settings_page_in_info() {
    global $pagenow;
    if( 'site-info.php' == $pagenow ) {

      if ( ! is_multisite() ) {
        wp_die( __( 'Multisite support is not enabled.' ) );
      }

      if ( ! current_user_can( 'manage_sites' ) ) {
        wp_die( __( 'You do not have sufficient permissions to edit this site.' ) );
      }

      $id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

      if ( ! $id ) {
        wp_die( __('Invalid site ID.') );
      }

      $details = get_blog_details( $id );
      if ( ! $details ) {
        wp_die( __( 'The requested site does not exist.' ) );
      }

      if ( ! can_edit_network( $details->site_id ) ) {
        wp_die( __( 'You do not have permission to access this page.' ), 403 );
      }

      $gss_postcode = get_blog_option($details->blog_id, 'gss_postcode');
      $gss_academy_name = get_blog_option($details->blog_id, 'gss_academy_name');
      $gss_address  = get_blog_option($details->blog_id, 'gss_address');
      $gss_getintouch_text  = get_blog_option($details->blog_id, 'gss_getintouch_text');
      $gss_getintouch_phone  = get_blog_option($details->blog_id, 'gss_getintouch_phone');
      $gss_getintouch_email  = get_blog_option($details->blog_id, 'gss_getintouch_email');
      $gss_121_coaching_url = get_blog_option($details->blog_id, 'gss_121_coaching_url');
      $gss_birthday_parties_url = get_blog_option($details->blog_id, 'gss_birthday_parties_url'); ?>
      <table style="display: none;">
        <tr id="gss_academy_name" class="form-field">
          <th scope="row">
            <label for="gss_academy_name_input"><?php _e( 'Academy Name' ); ?></label>
          </th>
          <td><input name="blog[gss_academy_name]" type="text" id="gss_academy_name_input" value="<?php echo esc_attr( $gss_academy_name ) ?>" style="max-width: 25em;"/></td>
        </tr>
        <tr id="gss_postcode" class="form-field">
          <th scope="row">
            <label for="gss_postcode_input"><?php _e( 'Postcode' ); ?></label>
          </th>
          <td><input name="blog[gss_postcode]" type="text" id="gss_postcode_input" value="<?php echo esc_attr( $gss_postcode ) ?>" style="max-width: 25em;"/></td>
        </tr>
        <tr id="gss_address" class="form-field">
          <th scope="row">
            <label for="gss_address_input"><?php _e( 'Address' ); ?></label>
          </th>
          <td>
            <textarea class="all-options" rows="5" cols="40" name="blog[gss_address]" id="gss_address_input" style="max-width: 25em;"><?php echo esc_textarea( $gss_address ) ?></textarea>
          </td>
        </tr>
        <tr id="gss_getintouch_text" class="form-field">
          <th scope="row">
            <label for="gss_getintouch_text_input"><?php _e( 'GetInTouch Text' ); ?></label>
          </th>
          <td><input name="blog[gss_getintouch_text]" type="text" id="gss_getintouch_text_input" value="<?php echo esc_attr( $gss_getintouch_text ) ?>" style="max-width: 25em;"/></td>
        </tr>
        <tr id="gss_getintouch_phone" class="form-field">
          <th scope="row">
            <label for="gss_getintouch_phone_input"><?php _e( 'GetInTouch Phone' ); ?></label>
          </th>
          <td><input name="blog[gss_getintouch_phone]" type="text" id="gss_getintouch_phone_input" value="<?php echo esc_attr( $gss_getintouch_phone ) ?>" style="max-width: 25em;"/></td>
        </tr>
        <tr id="gss_getintouch_email" class="form-field">
          <th scope="row">
            <label for="gss_getintouch_email_input"><?php _e( 'GetInTouch Email' ); ?></label>
          </th>
          <td><input name="blog[gss_getintouch_email]" type="text" id="gss_getintouch_email_input" value="<?php echo esc_attr( $gss_getintouch_email ) ?>" style="max-width: 25em;"/></td>
        </tr>
        <tr id="gss_birthday_parties_url" class="form-field">
          <th scope="row">
            <label for="gss_birthday_parties_url_input"><?php _e( 'Birthday Parties URL' ); ?></label>
          </th>
          <td>
            <?php echo gss_select_pages_load($details->blog_id, $gss_birthday_parties_url, 'gss_birthday_parties_url'); ?>
          </td>
        </tr>
        <tr id="gss_121_coaching_url" class="form-field">
          <th scope="row">
            <label for="gss_121_coaching_url_input"><?php _e( '121 Coaching URL' ); ?></label>
          </th>
          <td>
            <?php echo gss_select_pages_load($details->blog_id, $gss_121_coaching_url, 'gss_121_coaching_url'); ?>
          </td>
        </tr>
      </table>
      <script>(function($) {
        // $(document).ready(function() {
          $('.form-table tbody').append($('#gss_academy_name'));
          $('.form-table tbody').append($('#gss_postcode'));
          $('.form-table tbody').append($('#gss_address'));
          $('.form-table tbody').append($('#gss_getintouch_text'));
          $('.form-table tbody').append($('#gss_getintouch_phone'));
          $('.form-table tbody').append($('#gss_getintouch_email'));
          $('.form-table tbody').append($('#gss_birthday_parties_url'));
          $('.form-table tbody').append($('#gss_121_coaching_url'));
        // });
      })(jQuery);</script>
    <?php }
  }

  /**
   * [add_microsite_settings_page_in_list description]
   * @param [type] $columns [description]
   */
  function add_microsite_settings_page_in_list($columns) {
    $columns['gss_postcode'] = __('POSTCODE', 'gss_postcode');
    $columns['gss_address'] = __('Address', 'gss_address');
    $columns['gss_academy_name'] = __('Academy Name', 'gss_academy_name');
    return $columns;
  }

  /**
   * [gss_microsite_backend_init description]
   * @return [type] [description]
   */
  function gss_microsite_backend_init() {
    add_action( 'admin_enqueue_scripts', 'gss_microsite_backend_assets');
  }

  /**
   * [gss_microsite_backend_assets description]
   * @return [type] [description]
   */
  function gss_microsite_backend_assets() {
    wp_enqueue_style('gss_microsite-general-backend-style', plugin_dir_url( __FILE__ ) . '../assets/css/app.min.css');
  }

  /**
   * [siteid_columns description]
   * @param  [type] $column [description]
   * @param  [type] $value  [description]
   * @return [type]         [description]
   */
  function siteid_columns($column, $value) {
    if ( $column == 'gss_postcode' ) { ?>
      <a href="<?php echo esc_url( network_admin_url( 'site-info.php?id=' . $value ) ); ?>" class="edit"><?php echo get_blog_option($value, $column); ?></a>
      <?php
      return;
    }
    if ( $column == 'gss_address' ) {
      echo get_blog_option($value,$column);
      return;
    }
    if ( $column == 'gss_academy_name' ) {
      echo get_blog_option($value, $column);
      return;
    }
    return;
  }

  /**
   * [add_microsite_settings_page_in_options_general description]
   */
  function add_microsite_settings_page_in_options_general() {
    register_setting('general', 'gss_academy_name');
    register_setting('general', 'gss_postcode');
    register_setting('general', 'gss_address');
    register_setting('general', 'gss_getintouch_text');
    register_setting('general', 'gss_getintouch_phone');
    register_setting('general', 'gss_getintouch_email');
    register_setting('general', 'gss_birthday_parties_url');
    register_setting('general', 'gss_121_coaching_url');
    add_settings_field(
      'gss_academy_name',
      '<label for="gss_academy_name">' . __( 'Academy Name' , 'gss_academy_name' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_academy_name',
      'general'
    );
    add_settings_field(
      'gss_postcode',
      '<label for="gss_postcode">' . __( 'Postcode' , 'gss_postcode' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_postcode',
      'general'
    );
    add_settings_field(
      'gss_address',
      '<label for="gss_address">' . __( 'Address' , 'gss_address' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_address',
      'general'
    );
    add_settings_field(
      'gss_getintouch_text',
      '<label for="gss_getintouch_text">' . __( 'GetInTouch Text' , 'gss_getintouch_text' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_getintouch_text',
      'general'
    );
    add_settings_field(
      'gss_getintouch_phone',
      '<label for="gss_getintouch_phone">' . __( 'GetInTouch Phone' , 'gss_getintouch_phone' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_getintouch_phone',
      'general'
    );
    add_settings_field(
      'gss_getintouch_email',
      '<label for="gss_getintouch_email">' . __( 'GetInTouch Email' , 'gss_getintouch_email' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_getintouch_email',
      'general'
    );
    add_settings_field(
      'gss_birthday_parties_url',
      '<label for="gss_birthday_parties_url">' . __( 'Birthday Parties URL' , 'gss_birthday_parties_url' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_birthday_parties_url',
      'general'
    );
    add_settings_field(
      'gss_121_coaching_url',
      '<label for="gss_121_coaching_url">' . __( '121 Coaching URL' , 'gss_121_coaching_url' ) . '</label>',
      'add_microsite_settings_page_in_options_general_html_gss_121_coaching_url',
      'general'
    );
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_postcode() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_postcode = get_blog_option( $blog_id, 'gss_postcode' );
    } else {
      $gss_postcode = get_option( 'gss_postcode' );
    }
    echo '<input type="text" id="gss_postcode" class="regular-text" name="gss_postcode" value="' . esc_attr( $gss_postcode ) . '" />';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_address() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_address = get_blog_option( $blog_id, 'gss_address' );
    } else {
      $gss_address = get_option( 'gss_address' );
    }
    echo '<textarea class="all-options regular-text" rows="5" cols="40" id="gss_address" name="gss_address"/>' . esc_textarea( $gss_address ) . '</textarea>';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_getintouch_text() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_getintouch_text = get_blog_option( $blog_id, 'gss_getintouch_text' );
    } else {
      $gss_getintouch_text = get_option( 'gss_getintouch_text' );
    }
    echo '<input type="text" id="gss_getintouch_text" class="regular-text" name="gss_getintouch_text" value="' . esc_attr( $gss_getintouch_text ) . '" />';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_getintouch_phone() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_getintouch_phone = get_blog_option( $blog_id, 'gss_getintouch_phone' );
    } else {
      $gss_getintouch_phone = get_option( 'gss_getintouch_phone' );
    }
    echo '<input type="text" id="gss_getintouch_phone" class="regular-text" name="gss_getintouch_phone" value="' . esc_attr( $gss_getintouch_phone ) . '" />';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_getintouch_email() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_getintouch_email = get_blog_option( $blog_id, 'gss_getintouch_email' );
    } else {
      $gss_getintouch_email = get_option( 'gss_getintouch_email' );
    }
    echo '<input type="text" id="gss_getintouch_email" class="regular-text" name="gss_getintouch_email" value="' . esc_attr( $gss_getintouch_email ) . '" />';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_postcode description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_academy_name() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_academy_name = get_blog_option( $blog_id, 'gss_academy_name' );
    } else {
      $gss_academy_name = get_option( 'gss_academy_name' );
    }
    echo '<input type="text" id="gss_academy_name" class="regular-text" name="gss_academy_name" value="' . esc_attr( $gss_academy_name ) . '" />';
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_birthday_parties_url description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_birthday_parties_url() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_birthday_parties_url = get_blog_option( $blog_id, 'gss_birthday_parties_url' );
    } else {
      $gss_birthday_parties_url = get_option( 'gss_birthday_parties_url' );
    }
    // echo '<input type="text" id="gss_birthday_parties_url" class="regular-text" name="gss_birthday_parties_url" value="' . esc_attr( $gss_birthday_parties_url ) . '" />';
    _e(gss_select_pages_load($blog_id, $gss_birthday_parties_url, 'gss_birthday_parties_url'));
  }

  /**
   * [add_microsite_settings_page_in_options_general_html_gss_121_coaching_url description]
   */
  function add_microsite_settings_page_in_options_general_html_gss_121_coaching_url() {
    $blog_id = get_current_blog_id();
    if(is_multisite()) {
      $gss_121_coaching_url = get_blog_option( $blog_id, 'gss_121_coaching_url' );
    } else {
      $gss_121_coaching_url = get_option( 'gss_121_coaching_url' );
    }
    // echo '<input type="text" id="gss_121_coaching_url" class="regular-text" name="gss_121_coaching_url" value="' . esc_attr( $gss_121_coaching_url ) . '" />';
    _e(gss_select_pages_load($blog_id, $gss_121_coaching_url, 'gss_121_coaching_url'));
  }

  /**
   * [gss_select_pages_load description]
   * @param  [type]  $blog_id [description]
   * @param  integer $pid     [description]
   * @param  string  $htmlID  [description]
   * @return [type]           [description]
   */
  function gss_select_pages_load($blog_id, $pid = 0, $htmlID = 'gss_birthday_parties_url') {
    $args = array(
      'post_type' => array('page'),
      'posts_per_page' => -1
    );
    if(is_multisite()) {
      switch_to_blog($blog_id);
    }
    $the_query = new WP_Query($args);
    $return = sprintf( '<select id="%s-input" name="blog[%s]" style="border-style: solid; border-width: 1px; width: 95%%; max-width: 25em;">', $htmlID, $htmlID );
    $return .= '<option value="0" ' . ($pid == 0 ? 'selected' : '') . '>Use Home Page</option>';
    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
        $return.= sprintf('<option value="%s" %s data-url="%s">%s</option>', get_the_ID(), ($pid == get_the_ID() ? 'selected' : ''), get_the_permalink(), str_replace('Wmf', 'WMF',ucwords(strtolower(get_the_title()))));
      endwhile;
      wp_reset_postdata();
    endif;
    $return .= '</select>';
    return $return;
  }

}
