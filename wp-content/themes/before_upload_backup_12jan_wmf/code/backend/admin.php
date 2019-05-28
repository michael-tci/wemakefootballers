<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/
/*--- Don't exists class ---*/
if ( !class_exists('gssAdmin') )
{
  class gssAdmin extends gssCore
  {

    function __construct(){
      add_action( 'admin_menu', array($this, 'registerAdminMenu'));
      /* --- Assets --- */
      add_action( 'admin_enqueue_scripts', array($this, 'assets'));
      add_action( 'admin_head', array($this, 'adminHeadUpdate') );
      add_action( 'admin_footer', array($this, 'adminFooterUpdate'));
    }

    public function registerAdminMenu(){
      add_menu_page('Theme Setting', 'Theme Setting', 'administrator', 'gss-theme-setting', array($this, 'themeSettings'), 'dashicons-admin-generic', 66);
      add_submenu_page('gss-theme-setting', 'Setting header', 'Setting header', 'administrator', 'gss-setting-header', array($this, 'settingHeader'));
      add_submenu_page('gss-theme-setting', 'Setting Social', 'Setting Social', 'administrator', 'gss-setting-social', array($this, 'settingSocial'));
      add_submenu_page('gss-theme-setting', 'Setting Footer', 'Setting Footer', 'administrator', 'gss-setting-footer', array($this, 'settingFooter'));
    }

    public function assets(){
      // assets
      // wp_enqueue_style('gss-general-fontend-less', get_stylesheet_directory_uri().'/assets/less/fontend/general.less', 999, '3.3.5');
      wp_enqueue_style('gss-general-backend-style', get_stylesheet_directory_uri() . '/assets/css/backend/general.min.css', 999, '3.3.5');
      // wp_enqueue_style('gss-general-backend-less', get_stylesheet_directory_uri() . '/assets/less/backend/general.less');
      // wp_enqueue_script('less-js', '//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js', array('jquery'), false, true);
      wp_enqueue_script('gss-general-bootstrap-js', get_stylesheet_directory_uri() . '/assets/libs/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.5');
      wp_enqueue_script('gss-general-backend-js', get_stylesheet_directory_uri() . '/assets/js/backend/general.js', array('gss-general-bootstrap-js'), '1.0.1');
    }

    public function themeSettings(){
      if ( !empty($_POST) )
      {
        $this->updateThemeOption('general');
      }
      wp_enqueue_media();
      $this->template()->render(array('tpl'=>'tpl/backend/general.php', 'datas'=>get_option('gss_theme_option')));
    }

    public function settingSocial(){
      if ( !empty($_POST) )
      {
        $this->updateThemeOption('social');
      }
      $this->template()->render(array('tpl'=>'tpl/backend/setting-social.php', 'datas'=>get_option('gss_theme_option')));
    }

    public function settingHeader(){
      if ( !empty($_POST) )
      {
        $this->updateThemeOption('header');
      }
      wp_enqueue_media();
      $this->template()->render(array('tpl'=>'tpl/backend/setting-header.php', 'datas'=>get_option('gss_theme_option')));
    }

    public function settingFooter(){
      if ( !empty($_POST) )
      {
        $this->updateThemeOption('footer');
      }
      wp_enqueue_media();
      $this->template()->render(array('tpl'=>'tpl/backend/setting-footer.php', 'datas'=>get_option('gss_theme_option')));
    }

    public function updateThemeOption($session = ''){
      if ( !empty($_POST) )
      {
        $options = get_option('gss_theme_option');
        switch ($session)
        {
          // Setting Header
          case 'header':
            $datas = array(
              'gsstheme_setting_logo' => (!empty($_POST['gsstheme_setting_logo']) ? $_POST['gsstheme_setting_logo'] : ''),
              'gsstheme_setting_favicon' => (!empty($_POST['gsstheme_setting_favicon']) ? $_POST['gsstheme_setting_favicon'] : '')
            );
            break;
          // Setting Social
          case 'social':
            $datas = array('social' => ( !empty($_POST['social']) ? $_POST['social'] : '') );
            break;
          case 'footer':
            $datas = array(
              'gsstheme_setting_footer_logo' => (!empty($_POST['gsstheme_setting_footer_logo']) ? $_POST['gsstheme_setting_footer_logo'] : ''),
              'gsstheme_setting_footer_content' => (!empty($_POST['gsstheme_setting_footer_content']) ? $_POST['gsstheme_setting_footer_content'] : '')
            );
            break;
          case 'general':
            $datas = array('general' => ( !empty($_POST['general']) ? $_POST['general'] : '' ));
            break;
        }
        // save update
        if ( empty($options) )
        {
          $options = array();
        }
        $options = array_merge($options, $datas);
        update_option( 'gss_theme_option',  $options);
        $this->settingRender();
      }
    }

    public function adminHeadUpdate() {
      echo '<script type="text/javascript">
        less = {
          env: "development",
          async: true,
          fileAsync: true,
        };
      </script>';
    }

    public function adminFooterUpdate(){
      echo "<script type='text/javascript'>
        (function($){
          $(document).ready(function(){
            $('body').coreadmin({
              skin_url: '".get_stylesheet_directory_uri()."/'
            });
          });
        })(jQuery);
      </script>";
    }

    public function settingRender(){
      $file = locate_template('assets/css/theme/setting.css');
      if ( !file_exists($file) )
      {
        $file = get_stylesheet_directory().'/assets/css/theme/setting.css';
        $handle = fopen($file, 'w');
      }
      if ( file_exists($file) )
      {
        $settings = get_option('gss_theme_option');
        $contentCss = '';
        if ( isset($settings) AND isset($settings['general']) )
        {
          if ( isset($settings['general']['settings']) AND is_array($settings['general']['settings']) )
          {
            foreach ($settings['general']['settings'] as $name => $values)
            {
              if ( is_array($values) )
              {
                $inline = '';
                foreach ($values as $key => $value)
                {
                  switch ($key)
                  {
                    case 'background-image':
                      if ( !empty($value) )
                      {
                        $value = sprintf('url("%s")', $value);
                      }
                      break;
                  }
                  if ( !empty($value) )
                  {
                    $inline .= sprintf("%s: %s;", $key, $value);
                  }
                }
                $contentCss .= sprintf("%s{%s}", $name, $inline);
              }
            }
          }
          if ( isset($settings['general']['custom']) AND isset($settings['general']['custom']['css']) )
          {
            $contentCss .= $settings['general']['custom']['css'];
          }
        }
        file_put_contents($file, $contentCss);
      }
    }

  }
}

?>
