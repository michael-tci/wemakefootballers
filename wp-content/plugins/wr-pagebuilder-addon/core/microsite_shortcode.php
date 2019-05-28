<?php
/**
 * gss_microsite_shortcode_init
 */
add_action('init', 'gss_microsite_shortcode_init');
if ( !function_exists('gss_microsite_shortcode_init') ) {
  function gss_microsite_shortcode_init() {
    add_shortcode( 'gss_blogs_select', 'gssGetPostCodeSites');
    add_shortcode( 'gss_blogs_other_select', 'gssGetPostCodeSitesOther');
    add_shortcode( 'gss_blog_select', 'gssGetPostCodeSite');
    add_shortcode( 'gss_blog_select_name_ggmap', 'gssGetNameSiteForMap');
    add_shortcode( 'gss_blog_select_address_ggmap', 'gssGetPostCodeSiteForMap');
  }

  /**
   * gss_blogs_select
   * @param  [type] $atts [description]
   * @return [type]       [description]
   */
  function gssGetPostCodeSites($atts) {
    if( is_multisite() ) {
      $blog_list = wp_get_sites(array(
        'deleted'    => 0,
        'limit'      => 100,
        'offset'     => 0,
      ));
    } else {
      $blog_list = array();
    }
    $atts = shortcode_atts( array(
      'placeholder' => 'Chosen option'
    ), $atts, 'gss_blogs_select' );
    $option = array();

    foreach ($blog_list as $blogId) {
      if( !is_main_site( $blogId['blog_id'] ) ) {

        $address = get_blog_option($blogId['blog_id'], 'gss_address');
        $postcode = get_blog_option($blogId['blog_id'], 'gss_postcode');
        $gss_additonal_info = get_blog_option($blogId['blog_id'], 'gss_additonal_info');
        $gss_session_times = get_blog_option($blogId['blog_id'], 'gss_session_times');
        $gss_121_coaching_url = get_blog_option($blogId['blog_id'], 'gss_121_coaching_url');
        $gss_birthday_parties_url = get_blog_option($blogId['blog_id'], 'gss_birthday_parties_url');

        if ( empty($gss_additonal_info) ) {
          $gss_additonal_info = 'Access through St Mary’s Primary School on Richmond Road';
        }

        if ( empty($gss_session_times) ) {
          $gss_session_times = '<table>
  <tr>
    <td>Saturday:</td>
    <td>Time:</td>
  </tr>
  <tr>
    <td>8-14 Years</td>
    <td>09.30am - 10.30am</td>
  </tr>
  <tr>
    <td>4-7 Years</td>
    <td>10.30am - 11.30am</td>
  </tr>
</table>';
        }

        if ( !empty($address) ) {
          $address .= !empty($postcode) ? ' - '.$postcode : '';
        } else {
          $address = $postcode;
        }

        if ( !empty($address) ) {
          $blog_details = get_blog_details($blogId['blog_id'], true);
          array_push($option, array(
            'value' => $postcode,
            'label' => $postcode,
            'postcode' => $postcode,
            'url' => $blog_details->siteurl,
            'coaching_url' => $gss_121_coaching_url,
            'birthday_url' => $gss_birthday_parties_url,
            'address' => $address,
            'additonal_info' => $gss_additonal_info,
            'session_times' => $gss_session_times,
            'name' => $blog_details->blogname
          ));
        }
      }
    }
    return json_encode($option);
  }

  /**
   * gss_blog_select
   * @return [type] [description]
   */
  function gssGetPostCodeSite() {
    $blog_id = get_current_blog_id();
    $address = get_blog_option($blog_id, 'gss_address');
    $postcode = get_blog_option($blog_id, 'gss_postcode');
    if ( !empty($address) ) {
      $blogName = get_bloginfo('name');
      if( !empty($blogName)) {
        $blogName = '<b style="display: block;">' . $blogName . '</b>';
      } else {
        $blogName = '';
      }
      $address = $blogName . $address;
    }
    else
    {
      $address = $postcode;
    }
    $address = '<p style="font-weight: 400;">' . $address . '</p>';
    return $address;
  }

  /**
   * gss_blog_select_address_ggmap
   * @return [type] [description]
   */
  function gssGetPostCodeSiteForMap(){
    $blog_id = get_current_blog_id();
    $address = get_blog_option($blog_id, 'gss_address');
    if ( empty($address) ) {
      $address = get_blog_option($blogId['blog_id'], 'gss_postcode');
    }
    return $address;
  }

  /**
   * gss_blog_select_name_ggmap
   * @return [type] [description]
   */
  function gssGetNameSiteForMap(){
    $blog_id = get_current_blog_id();
    $name = get_blog_option($blogId['blog_id'], 'gss_academy_name');
    if ( empty($name) ) {
      $blog_details = get_blog_details($blog_id, true);
      $name = $blog_details->blogname;
    }
    if ( empty($name) ) {
      $name = '';
    }
    return $name;
  }

  /**
   * gss_blogs_other_select
   * @param  [type] $atts [description]
   * @return [type]       [description]
   */
  function gssGetPostCodeSitesOther($atts){
    $blog_list = wp_get_sites(array(
      'deleted'    => 0,
      'limit'      => 100,
      'offset'     => 0,
	  'orderby' => 'path',
    ));
    $atts = shortcode_atts( array(
      'placeholder' => 'Chosen option'
    ), $atts, 'gss_blogs_other_select' );
    $option = array();
    $blogIdcurrent =  get_current_blog_id();
    foreach ($blog_list as $blogId) {

      //if($blogId[blog_id] == $blogIdcurrent)
        //continue;

      $blog_details = get_blog_details($blogId['blog_id'], true);
      array_push($option, array(
        'value' => $blog_details->siteurl,
        'label' => $blog_details->blogname
      ));
    }
    return json_encode($option);
  }
}

/**
 * gss_blocks admin pages
 */
add_action('admin_menu', 'gss_blocks');
if ( !function_exists('gss_blocks') ) {
  function gss_blocks() {
    add_menu_page('Gss Blocks', 'Gss Blocks', 'manage_options', 'blocks', 'gss_blocks_page');
  }
}
if ( !function_exists('gss_blocks_page') ) {
  function gss_blocks_page() {

    if (!current_user_can('manage_options')) {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

      $gss_blocks_holiday       = 'gss_blocks_holiday';
      $gss_blocks_holiday_info  = 'gss_blocks_holiday_info';
      $gss_additonal_info       = 'gss_additonal_info';
      $gss_session_times        = 'gss_session_times';
      $gss_training_times       = 'gss_training_times';
      $gss_training_calendar    = 'gss_training_calendar';
      $gss_getintouch_text      = 'gss_getintouch_text';
      $gss_getintouch_phone     = 'gss_getintouch_phone';
      $gss_getintouch_email     = 'gss_getintouch_email';
      $gss_signup_link          = 'gss_signup_link';
      $gss_login_link           = 'gss_login_link';
      $hidden_field_name        = 'gss_blocks_submit_hidden';

      // $gss_blocks_holiday_val = get_option( $gss_blocks_holiday );

      $opt_val = '';

      if( filter_input(INPUT_POST, $hidden_field_name) && filter_input(INPUT_POST, $hidden_field_name) == 'Y' ) {

        $opt_val = filter_input(INPUT_POST, $gss_blocks_holiday );
        update_option( $gss_blocks_holiday, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_blocks_holiday_info );
        update_option( $gss_blocks_holiday_info, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_additonal_info );
        update_option( $gss_additonal_info, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_session_times );
        update_option( $gss_session_times, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_training_times );
        update_option( $gss_training_times, $opt_val );
        $opt_val = filter_input(INPUT_POST, $gss_training_calendar );
        update_option( $gss_training_calendar, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_getintouch_text );
        update_option( $gss_getintouch_text, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_getintouch_phone );
        update_option( $gss_getintouch_phone, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_getintouch_email );
        update_option( $gss_getintouch_email, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_signup_link );
        update_option( $gss_signup_link, $opt_val );

        $opt_val = filter_input(INPUT_POST, $gss_login_link );
        update_option( $gss_login_link, $opt_val );

        echo '<div class="updated"><p><strong>'. __('settings saved.', 'gss' ) . '</strong></p></div>';
      }


      echo  '<div class="wrap">' .
        '<h2>' .
          __( 'Gss Blocks Setting', 'gss' ) .
        '</h2>' .

        '<form name="form1" method="post" action="" class="' . $gss_blocks_holiday . '_form">' .
          '<input type="hidden" name="' . $hidden_field_name . '" value="Y">' .


          '<hr />' .
          '<strong>' .
            __("Holiday Camps", 'gss' ) .
          '</strong>';


      $opt_val = get_option( $gss_blocks_holiday, $opt_val );
      wp_editor( $opt_val, $gss_blocks_holiday, $settings = array(
        'media_buttons'     => false,
        'drag_drop_upload'  => false,
        'editor_css'        => '<style>
                                .' . $gss_blocks_holiday . '_form {
                                  width: 70%;
                                  max-width: 660px;
                                }
                                </style>'
      ) );


      echo '<hr />' .
          '<strong>' .
            __("Holiday Camps Info", 'gss' ) .
          '</strong>';


      $opt_val = get_option( $gss_blocks_holiday_info, '
        <div class="item"><img style="height: px;" src="http://www.wemakefootballers.com/isleworth/wp-content/uploads/sites/12/2015/11/11_NewsPageAll_05.jpg" alt="Hounslow Football Camp" />
          <div class="carousel-caption">
            <h4><i class=""></i>isleworth Easter Camp</h4>
            <h4 style="display: block;">isleworth</h4>
            4th – 8th April
            <a href="http://www.kidsregister.com/sign-up/?company_id=1" target="_blank">BOOK now</a>
            (Limited spaces)
          </div>
        </div>
        <div class=" item"><img style="height: px;" src="http://www.wemakefootballers.com/isleworth/wp-content/uploads/sites/12/2015/11/11_NewsPageAll_05.jpg" alt="Hounslow Football Camp" />
          <div class="carousel-caption">
            <h4><i class=""></i>isleworth Easter Camp</h4>
            <h4 style="display: block;">isleworth</h4>
            4th – 8th April
            <a href="http://www.kidsregister.com/sign-up/?company_id=1" target="_blank">BOOK now</a>
            (Limited spaces)
          </div>
        </div>
        <div class=" item"><img style="height: px;" src="http://www.wemakefootballers.com/isleworth/wp-content/uploads/sites/12/2015/11/11_NewsPageAll_05.jpg" alt="Isleworth Football Camp" />
          <div class="carousel-caption">
            <h4><i class=""></i>isleworth Easter Camp</h4>
            <h4 style="display: block;">isleworth</h4>
            4th – 8th April
            <a href="http://www.kidsregister.com/sign-up/?company_id=1" target="_blank">BOOK now</a>
            (Limited spaces)
          </div>
</div>' );
      wp_editor( $opt_val, $gss_blocks_holiday_info, $settings = array(
        'media_buttons'     => true,
        'drag_drop_upload'  => true,
        'wpautop'           => false,
        'editor_css'        => '<style>
                                .' . $gss_blocks_holiday_info . '_form {
                                  width: 70%;
                                  max-width: 660px;
                                }
                                </style>'
      ) );


      echo '<hr />' .

          '<strong>' .
            __("Additional info", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_additonal_info . '" value="' . __(get_option( $gss_additonal_info, 'Access through St Mary’s Primary School on Richmond Road' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>';


      echo '<hr />' .

          '<strong>' .
            __("Session times", 'gss' ) .
          '</strong>' .
          '<p>';

          $opt_val = get_option( $gss_session_times, '<table>
  <tr>
    <td>Saturday:</td>
    <td>Time:</td>
  </tr>
  <tr>
    <td>8-12 Years</td>
    <td>09.30am - 10.30am</td>
  </tr>
  <tr>
    <td>4-7 Years</td>
    <td>10.30am - 11.30am</td>
  </tr>
</table>' );
           wp_editor( $opt_val, $gss_session_times, $settings = array(
        'media_buttons'     => false,
        'drag_drop_upload'  => false,
        'editor_css'        => '<style>
                                .' . $gss_session_times . '_form {
                                  width: 70%;
                                  max-width: 660px;
                                }
                                </style>'
      ) );


      echo '<hr />' .

          '<strong>' .
            __("Weekly training times", 'gss' ) .
          '</strong>' .
          '<p>';

      $opt_val = get_option( $gss_training_times, '<table>
  <tr>
    <th colspan="2"><p>weekly training</p></th>
  </tr>
  <tr>
    <td><p>Wednesday 5-6pm</p></td>
    <td><p>4 – 7 year olds</p></td>
  </tr>
  <tr>
    <td><p>Wednesday 6-7pm</p></td>
    <td><p>8 – 12 year olds</p></td>
  </tr>
  <tr>
    <td><p>Saturday 9.30-10.30am</p></td>
    <td><p>9-12 year olds</p></td>
  </tr>
  <tr>
    <td><p>Saturday 10.30-11.30am</p></td>
    <td><p>4-6 years old</p></td>
  </tr>
  <tr>
    <td><p>Saturday 11.30-12.30pm</p></td>
    <td><p>7-8 year olds</p></td>
  </tr>
</table>' );
      wp_editor( $opt_val, $gss_training_times, $settings = array(
        'media_buttons'     => false,
        'drag_drop_upload'  => false,
        'editor_css'        => '<style>
                                .' . $gss_training_times . '_form {
                                  width: 70%;
                                  max-width: 660px;
                                }
                                </style>'
      ) );

echo '<hr />' .

          '<strong>' .
            __("Training Calendar", 'gss' ) .
          '</strong>' .
          '<p>';

      $opt_val = get_option( $gss_training_calendar, '<table>
  <tr>
    <th colspan="2"><p>Training calendar</p></th>
  </tr>
  <tr>
    <td><p>Wednesday 5-6pm</p></td>
    <td><p>4 – 7 year olds</p></td>
  </tr>
  <tr>
    <td><p>Wednesday 6-7pm</p></td>
    <td><p>8 – 12 year olds</p></td>
  </tr>
  <tr>
    <td><p>Saturday 9.30-10.30am</p></td>
    <td><p>9-12 year olds</p></td>
  </tr>
  <tr>
    <td><p>Saturday 10.30-11.30am</p></td>
    <td><p>4-6 years old</p></td>
  </tr>
  <tr>
    <td><p>Saturday 11.30-12.30pm</p></td>
    <td><p>7-8 year olds</p></td>
  </tr>
</table>' );
      wp_editor( $opt_val, $gss_training_calendar, $settings = array(
        'media_buttons'     => false,
        'drag_drop_upload'  => false,
        'editor_css'        => '<style>
                                .' . $gss_training_calendar . '_form {
                                  width: 70%;
                                  max-width: 660px;
                                }
                                </style>'
      ) );
      
      echo
          '<hr />' .
          '<strong>' .
            __("GetInTouch Text: ", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_getintouch_text . '" value="' . __(get_option( $gss_getintouch_text, 'GET IN TOUCH' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>' .


          '<hr />' .



          '<strong>' .
            __("GetInTouch Phone: ", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_getintouch_phone . '" value="' . __(get_option( $gss_getintouch_phone, '+020 7148 1602' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>' .


          '<hr />' .



          '<strong>' .
            __("GetInTouch Email: ", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_getintouch_email . '" value="' . __(get_option( $gss_getintouch_email, 'isleworth@wemakefootballers.com' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>' .


          '<hr />' .


          '<strong>' .
            __("Sign up link: ", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_signup_link . '" value="' . __(get_option( $gss_signup_link, '/sign-up/' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>' .


          '<hr />' .


          '<strong>' .
            __("Login link: ", 'gss' ) .
          '</strong>' .
          '<p>' .
          '<input type="text" name="' . $gss_login_link . '" value="' . __(get_option( $gss_login_link, '/login/' )) . '" style="width: 100%;outline: 0;padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;margin: 0 0 3px;">' .
          '</p>' .


          '<hr />' .


          '<p class="submit">' .
            '<input type="submit" name="Submit" class="button-primary" value="' . esc_attr('Save Changes') . '" />' .
          '</p>' .
        '</form>' .
      '</div>';
  }
}
