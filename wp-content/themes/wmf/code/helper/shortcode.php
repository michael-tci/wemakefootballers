<?php

add_shortcode('div', 'shortcode_div');
add_shortcode('form', 'shortcode_form');
add_shortcode('section', 'shortcode_section');
add_shortcode('container', 'shortcode_container');
add_shortcode('container-fluid', 'shortcode_containerfluid');
add_shortcode('content', 'shortcode_content');
add_shortcode('content-fluid', 'shortcode_contentFluid');
add_shortcode('row', 'shortcode_row');
add_shortcode('col', 'shortcode_col');
add_shortcode('col3', 'shortcode_col3');
add_shortcode('detail', 'shortcode_detail');
add_shortcode('youtube', 'shortcode_youtube');
add_shortcode('comment', 'shortcode_comment');
add_shortcode('help', 'shortcode_help');
add_shortcode('imgdetail', 'shortcode_detailImg');

function shortcode_div($args, $content = null){
  return '<div class="' . implode(' ', array_values(is_array($args)?$args: array())) . '">' . do_shortcode($content) . '</div>';
}

function shortcode_form($args, $content = null){
  return '<form class="' . implode(' ', array_values(is_array($args)?$args: array())) . '">' . do_shortcode($content) . '</form>';
}

function shortcode_section($args, $content = null) {
  $args[] = 'section';
  return shortcode_div($args, $content);
}

function shortcode_container($args, $content = null) {
  $args[] = 'container';
  return shortcode_div($args, $content);
}

function shortcode_containerfluid($args, $content = null) {
  $args[] = 'container-fluid';
  return shortcode_div($args, $content);
}

function shortcode_row($args, $content = null) {
  $args[] = 'row';
  return shortcode_div($args, $content);
}

function shortcode_col($args, $content = null) {

  if(isset($args['col'])) {
    $col = $args['col'];
    $args[] = 'col-md-' . $col;
    unset($args['col']);
  }
  else if(isset($args['num'])) {
    $col = $args['num'];
    $args[] = 'col-md-' . $col;
    if(((16 - $col) / 2) > 0)
      $args[] = 'col-md-offset-' . ((16 - $col) / 2);
    unset($args['num']);
  }
  return shortcode_div($args, $content);
}

function shortcode_col3($args, $content = null) {
  $args[] = 'col-3';
  return do_shortcode('[div ' . implode(' ', array_values(is_array($args)?$args: array())) . ']' . do_shortcode($content) .'[/div]');
}

add_shortcode('col2', 'shortcode_col2');
function shortcode_col2($args, $content = null) {
  return do_shortcode('[col col=8]' . do_shortcode('[col num=14 ' . implode(' ', array_values(is_array($args)?$args: array())) . ']' . do_shortcode($content) . '[/col]') . '[/col]');
}

function shortcode_content($args, $content = null) {
  return do_shortcode('[section ' . implode(' ', array_values(is_array($args)?$args: array())) . '][container][row]' . do_shortcode($content) . '[/row][/container][/section]');
}

function shortcode_contentFluid($args, $content = null) {
  return do_shortcode('[section ' . implode(' ', array_values(is_array($args)?$args: array())) . '][container-fluid][row]' . do_shortcode($content) . '[/row][/container-fluid][/section]');
}

add_shortcode('banner', 'shortcode_banner');
function shortcode_banner($args, $content = null) {
  $args[] = 'banner';
  $image = '';
  if (isset($args['img'])){
    $image = '<img src=' . $args['img'] . ' class="img-responsive">';
    unset($args['img']);
  }
  return do_shortcode('[content-fluid ' . implode(' ', array_values(is_array($args)?$args: array())) . ']' . $image . do_shortcode($content) . '[/content-fluid]');
}

function shortcode_detail($args, $content = null) {
  $args[] = 'detail';

  $col = '';
  if(!isset($args['num'])) $args['num'] = 16;
  $col = $args['num'];
  $col = 'col-md-' . $col . (((16 - $col) / 2) > 0? (' col-md-offset-' . ((16 - $col) / 2)) : '');
  unset($args['num']);

  return do_shortcode('[content ' . implode(' ', array_values(is_array($args)?$args: array())) . '][col ' . $col . ']' . do_shortcode($content) . '[/col][/content]');
}

function shortcode_youtube($args, $content = null) {
  $args[] = 'youtube';

  if(!isset($args['src'])) $args['src'] = '';
  $src = $args['src'];
  unset($args['src']);

  if(!isset($args['num'])) $args['num'] = 12;
  $col = $args['num'];
  $col = 'col-md-' . $col . (((16 - $col) / 2) > 0? (' col-md-offset-' . ((16 - $col) / 2)) : '');
  unset($args['num']);

  return do_shortcode('[section ' . implode(' ', array_values(is_array($args)?$args: array())) . '][container][row][col ' . $col . ']'
    . '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'
    . $src
    . '" allowfullscreen=""></iframe></div>'
    . '[/col][/row][/container][/section]');
}

function shortcode_comment($args, $content = null) {
  $args[] = 'comment';

  $marks = '';
  if(isset($args['marks'])) {
    $marks = '<img src=' . $args['marks'] . ' class="' . (!isset($args['offset'])?'center-block':'') . ' marks img-responsive">';
    unset($args['marks']);
  }

  $full = false;
  if(isset($args['full'])) {
    $full = $args['full'];
    unset($args['full']);
  }

  $fluid = false;
  if(isset($args['fluid'])) {
    $fluid = $args['fluid'];
    unset($args['fluid']);
  }

  $right = (isset($args['point']) && $args['point']=='right')? 1 : 0;

  if(!isset($args['img'])) $args['img'] = '';
  $src = $args['img'];
  unset($args['img']);

  if(!isset($args['num'])) $args['num'] = 12;
  $col = $args['num'];
  $col = 'col-md-' . $col . (((16 - $col) / 2) > 0 && !isset($args['offset'])? (' col-md-offset-' . ((16 - $col) / 2)) : '');
  unset($args['num']);
  unset($args['offset']);

  return do_shortcode('[' . ($fluid?'content-fluid':'content') . ' ' . implode(' ', array_values(is_array($args)?$args: array())) . ']'
    . $marks
    .'[col ' . $col . ']'
    . ($right?(
        ($full?'[div col-md-8 col-md-offset-1]':'[div col-md-10]') . do_shortcode($content) . '[/div]'
      . ($full?'[div col-md-6 col-md-offset-1]':'[div col-md-4]') . ($src==''?'':'<img src=' . $src . ' class="center-block  img-circle img-responsive">') . '[/div]'
      ):(
        ($full?'[div col-md-6 col-md-offset-1]':'[div col-md-4]') . ($src==''?'':'<img src=' . $src . ' class="center-block  img-circle img-responsive">') . '[/div]'
      . ($full?'[div col-md-8 col-md-offset-1]':'[div col-md-10]') . do_shortcode($content) . '[/div]'
      ))
    . '[/col][/' . ($fluid?'content-fluid':'content') . ']');
}

function shortcode_help($args, $content = null) {
  $args[] = 'help';

  if(!isset($args['num'])) $args['num'] = 12;
  $col = $args['num'];
  $col = 'col-md-' . $col . (((16 - $col) / 2) > 0? (' col-md-offset-' . ((16 - $col) / 2)) : '');
  unset($args['num']);

  return do_shortcode('[content ' . implode(' ', array_values(is_array($args)?$args: array())) . '][col ' . $col . ']'
    . do_shortcode($content)
    . '[/col][/content]');
}

function shortcode_detailImg($args, $content = null) {
  $args[] = 'imgdetail';

  $left = (isset($args['point']) && $args['point']=='left')? 1 : 0;

  if(!isset($args['img'])) $args['img'] = '';
  $src = $args['img'];
  unset($args['img']);

  if(!isset($args['num'])) $args['num'] = 16;
  $col = $args['num'];
  $col = 'col-md-' . $col . (((16 - $col) / 2) > 0? (' col-md-offset-' . ((16 - $col) / 2)) : '');
  unset($args['num']);

  return do_shortcode('[content ' . implode(' ', array_values(is_array($args)?$args: array())) . '][col ' . $col . ']'
    . ($left?(
        '[div col-md-8]' . ($src==''?'':'<img src=' . $src . ' class="center-block img-responsive">') . '[/div]'
      . '[div col-md-8]' . do_shortcode($content) . '[/div]'
      ):(
        '[div col-md-8]' . do_shortcode($content) . '[/div]'
      . '[div col-md-8]' . ($src==''?'':'<img src=' . $src . ' class="center-block img-responsive">') . '[/div]'
      ))
    . '[/col][/content]');
}

add_shortcode('search', 'shortcode_search');
function shortcode_search($args, $content = null) {

  if(!isset($args['text'])) $args['text'] = 'enter your postcode below and find your nearest academy';
  $text = $args['text'];
  unset($args['text']);
  return do_shortcode('<div class="section form">
    <div class="container">
      <div class="row text-center">
        <h3>' . $text . '</h3>
        <form class="col-sm-16">
          <input class="form-control postcode-plugin-val-orange" placeholder="Enter your postcode" name="post_code">
          <button type="submit" class="btn btn-find-locator postcode-plugin-orange">search</button>
        </form>
      </div>
    </div>
  </div>');
}

add_shortcode('wmf_title', 'shortcode_title');
function shortcode_title($args, $content = null) {
  $args[] = 'title';
  return do_shortcode('[content-fluid ' . implode(' ', array_values(is_array($args)?$args: array())) . ']' . do_shortcode($content) . '[/content-fluid]');
}

add_shortcode('slides', 'shortcode_slides');
function shortcode_slides($args, $content = null){
  $GLOBALS['shortcode_slide_fisrt'] = true;
  if(!isset($GLOBALS['shortcode_slides_mutil'])) {
    $GLOBALS['shortcode_slides_mutil'] = 0;
  } else {
    $GLOBALS['shortcode_slides_mutil'] += 1;
  }
  $GLOBALS['shortcode_slide_mutil'] = 0;
  $args[] = 'slides';
  return do_shortcode('[col ' . implode(' ', array_values(is_array($args)?$args: array())) . ']<div>' . do_shortcode($content) . '</div>[/col]');
}

add_shortcode('slide', 'shortcode_slide');
function shortcode_slide($args, $content = null){
  $args[] = 'slide';

  if(!isset($args['imgshapes'])) $args['imgshapes'] = 'img-circle';
  $imgshapes = $args['imgshapes'];
  unset($args['imgshapes']);

  if(!isset($GLOBALS['shortcode_slide_mutil'])) {
    $GLOBALS['shortcode_slide_mutil'] = 0;
  } else {
    $GLOBALS['shortcode_slide_mutil'] += 1;
  }

  $radio = '<input type=radio id="' . $GLOBALS['shortcode_slide_mutil'] . '" name="slide' . $GLOBALS['shortcode_slides_mutil'] . '" ' . ($GLOBALS['shortcode_slide_fisrt']?'checked':'') . '/>';
  $label = '<label for="' . ($GLOBALS['shortcode_slide_mutil'] - 1) . '"></label>'
    . '<label for="' . $GLOBALS['shortcode_slide_mutil'] . '"></label>'
    . '<label for="' . ($GLOBALS['shortcode_slide_mutil'] + 1) . '"></label>';

  $GLOBALS['shortcode_slide_fisrt'] = false;

  if(!isset($args['img'])) $args['img'] = '';
  $src = $args['img'];
  unset($args['img']);

  return $radio
    . $label
    .'<div class="' . implode(' ', array_values(is_array($args)?$args: array())) . '">'
    . ($src==''?'':'<img src=' . $src . ' class="center-block img-responsive ' . $imgshapes . '">')
    . do_shortcode($content) . '</div>';
}

add_shortcode('wmf_gallery', 'shortcode_gallery');
function shortcode_gallery($args, $content = null) {
  $args[] = 'gallery';

  $col = 5;
  if(isset($args['col'])) {
    $col = $args['col'];
    unset($args['col']);
  }

  if(!isset($args['img'])) $args['img'] = 'https://www.wemakefootballers.com/wp-content/uploads/2015/10/03c_Join-a-pro-academy_10.jpg';
  $src = $args['img'];
  unset($args['img']);

  return do_shortcode('<div class="' . implode(' ', array_values(is_array($args)?$args: array())) . '" style="width: calc(1 / ' . $col . ' * 99% - 40px); min-height: calc(180 / 1920 * 100vw); float: left; background-color: #303030 !important; margin: 20px;">'
    . ($src==''?'':'<img src=' . $src . ' class="center-block img-responsive">')
    . do_shortcode($content)
    . '</div>');
}

add_shortcode('wmf_video', 'shortcode_video');
function shortcode_video($args, $content = null) {

  $file  = isset($args['src']) ? 'file: "' . $args['src'] . '",' : '';
  $title = isset($args['title']) ? 'title: "' . $args['title'] . '",' : '';
  $height = 'height: ' . (isset($args['height']) ? $args['height'] : '585') . ',';

  $characters = 'abcdefghijklmnopqrstuvwxyz';
  $randomString = '';
  for ( $i = 0; $i < 6; $i ++ ) {
    $randomString .= $characters[rand( 0, strlen( $characters ) - 1 )];
  }

  $wmf_jwplayer_id = 'WmfJwplayer' . $randomString;

  $content  = '<div id="'. $wmf_jwplayer_id . '">Loading the player...</div>';
  $content .= '<script type="text/javascript">
                (function($) {
                  $(document)

                  .ready(function() {

                    var playerInstance' . $wmf_jwplayer_id . ' = jwplayer("' . $wmf_jwplayer_id . '");
                    var playerInstance' . $wmf_jwplayer_id . 'Options = {
                      autostart: "false",
                      controls: "true",
                      displaydescription: "false",
                      displaytitle: "true",
                      mute: "false",
                      primary: "html5",
                      repeat: "false",
                      stretching: "uniform",
                      visualplaylist: "false",
                      width: "100%",
                      ' . $file . '
                      ' . $title . '
                      ' . $height . '
                    };

                    $(window).load(function() {
                      playerInstance' . $wmf_jwplayer_id . '.setup(playerInstance' . $wmf_jwplayer_id . 'Options);

                      playerInstance' . $wmf_jwplayer_id . '.on("ready", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer")
                          .append(
                            $("<span>")
                          );
                      });

                      playerInstance' . $wmf_jwplayer_id . '.on("pause", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer span").click();
                      });

                      playerInstance' . $wmf_jwplayer_id . '.on("stop", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer")
                          // .fadeOut()
                          .addClass("jw-state-stoping")
                          .delay(400)
                          .queue(function(next) {
                          // $(this).fadeIn();
                          $("#' . $wmf_jwplayer_id . '.jwplayer").removeClass("jw-state-stoping");
                          next();
                        });
                      });

                    });

                    $(document)

                    .on("click", "#' . $wmf_jwplayer_id . '.jwplayer span", function() {
                      playerInstance' . $wmf_jwplayer_id . '.stop();
                      jwplayer("' . $wmf_jwplayer_id . '").stop();

                      playerInstance' . $wmf_jwplayer_id . '.setup(playerInstance' . $wmf_jwplayer_id . 'Options);

                      playerInstance' . $wmf_jwplayer_id . '.on("ready", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer")
                          .append(
                            $("<span>")
                          );
                      });

                      playerInstance' . $wmf_jwplayer_id . '.on("pause", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer span").click();
                      });

                      playerInstance' . $wmf_jwplayer_id . '.on("stop", function() {
                        $("#' . $wmf_jwplayer_id . '.jwplayer")
                          // .fadeOut()
                          .addClass("jw-state-stoping")
                          .delay(400)
                          .queue(function(next) {
                          // $(this).fadeIn();
                          $("#' . $wmf_jwplayer_id . '.jwplayer").removeClass("jw-state-stoping");
                          next();
                        });
                      });

                    });

                  });
                })(jQuery);
              </script>';

  return do_shortcode($content);
}

add_shortcode('postcodesearch', 'shortcode_postcodesearch');
function shortcode_postcodesearch($args, $content = null) {

  if(!isset($args['text'])) 
  $enter_post_code_text = get_field('enter_post_code_text');
  $args['text'] = $enter_post_code_text;
  $text = $args['text'];
  unset($args['text']);
  return do_shortcode('<div class="section form buttonclicknone">
    <div class="container">
      <div class="row text-center home_footer_search">
        <h3 class="postcode-text">' . $text . '</h3>
        <form class="col-sm-16 post_selector" >
        <div class="overlaybuttonthiss" data-toggle="modal" data-target="#myModal" ></div>
          <input  class="form-control" id="postCode_search" placeholder="Enter your postcode">
          <button type="button" class="postcode-plugin">go<span class="show_postcode_pop"></span></button>
        </form>
      </div>
    </div>
  </div>');
}


add_shortcode('academysearch', 'shortcode_academy');
function shortcode_academy($args, $content = null) {

  if(!isset($args['text'])) $args['text'] = 'Select an academy';
  $text = $args['text'];
  unset($args['text']);
  global  $wpdb;
  $myrows = $wpdb->get_results( 'SELECT * FROM wp_accadamy'); //Get all academies from database delivered by plugin
  $returns .= count($myrows);
    $output = '';
    if(count($myrows)>0){

   foreach($myrows as $row) {
   $output .='<option value="'.$row->academy_link .'">'.$row->name .'</option>';
   //return $output;
     }
   }else{
         $output = '<option value="">Not available</option>';
   }

  return do_shortcode('<div class="section form">
    <div class="container">
      <div class="row text-center home_footer_search">
        <h3 class="postcode-text">' . $text . '</h3>
        <form class="col-sm-16 academy_selector" onsubmit="return false;">
            <select name="academy_name" class="search-aca">
      <option>Select an academy</option>
      '.$output.'
          </select>
          <button type="submit" class="btn btn-find-locator academ_finder">search</button>
        </form>
      </div>
    </div>
  </div>');

}

add_shortcode('academysearchblack', 'shortcode_academy_black');
function shortcode_academy_black($args, $content = null) {

  if(!isset($args['text'])) $args['text'] = 'Select an academy';
  $text = $args['text'];
  unset($args['text']);
  global  $wpdb;
  $myrows = $wpdb->get_results( 'SELECT * FROM wp_accadamy'); //Get all academies from database delivered by plugin
  $returns .= count($myrows);
    $output = '';
    if(count($myrows)>0){

   foreach($myrows as $row) {
   $output .='<option value="'.$row->academy_link .'">'.$row->name .'</option>';
   //return $output;
     }
   }else{
         $output = '<option value="">Not available</option>';
   }

  return do_shortcode('<div class="section form">
    <div class="container">
      <div class="row text-center home_footer_search">
        <h3 class="postcode-text">' . $text . '</h3>
        <form class="col-sm-16 academy_selector_black" onsubmit="return false;">
            <select name="academy_name" class="search-aca">
      <option>Select an academy</option>
        '. $output .'
          </select>
          <button type="submit" class="btn btn-find-locator academ_finder">search</button>
        </form>
      </div>
    </div>
  </div>');

}

add_shortcode('postcodesearchblack', 'shortcode_postcodesearch_black');
function shortcode_postcodesearch_black($args, $content = null) {

  if(!isset($args['text'])) $args['text'] = 'Find your nearest academy';
  $text = $args['text'];
  unset($args['text']);
  return do_shortcode('<div class="section form">
    <div class="container">
      <div class="row text-center home_footer_search">
        <h3 class="postcode-text">' . $text . '</h3>
        <form class="col-sm-16 post_selector_black">
          <input class="form-controls postcode-plugin-val" placeholder="Enter your postcode" name="post_code">
          <button type="button" class="btn btn-find-locators postcode-plugin" id="near-academy">go</button>
        </form>
      </div>
    </div>
  </div>');
}


add_shortcode('postcodesearchnew', 'shortcode_postcodesearch_new');
function shortcode_postcodesearch_new($args, $content = null) {

  if(!isset($args['text'])) $args['text'] = 'Find your nearest academy';
  $text = $args['text'];
  unset($args['text']);
  return do_shortcode('<div class="section form">
    <div class="container">
      <div class="row text-center postcode_search_new">
        <h3 class="postcode-text">' . $text . '</h3>
        <input id="search--an-academy-locator" type="text" placeholder="Enter your postcode or location here" /><a class="search-locator-postcode">search</a>
      </div>
    </div>
  </div>');
}

add_shortcode('holidaycamps', 'shortcode_holidaycamps');
function shortcode_holidaycamps($content = null) {


}

add_shortcode('holidaycamps_academy', 'shortcode_holidaycamps_academy');
function shortcode_holidaycamps_academy($args, $content = null) {

if(!isset($args['text'])) $args['text'] = 'Find your academy venue here:';
  $text = $args['text'];
  unset($args['text']);
  global  $wpdb;
  $myrows = $wpdb->get_results( 'SELECT * FROM wp_accadamy'); //Get all academies from database delivered by plugin
  $returns .= count($myrows);
    $output = '';
    if(count($myrows)>0){

   foreach($myrows as $row) {
   $output .='<option value="'.$row->holyday_link .'">'.$row->name .'</option>';
   //return $output;
     }
   }else{
         $output = '<option value="">Not available</option>';
   }


return do_shortcode('
    <div class="container">
      <div class="row text-center holiday_academies">
        <form class="col-sm-16" onsubmit="return false;">
          <span>OR</span>
          <h3 class="find_text">' . $text . '</h3>
          <div class="holi_academic">
            <select name="academy_names" class="search-acad">
            <option value="">Select an academy </option>
             '. $output .'
          </select>
          </div>
        </form>
      </div>
    </div>
  ');

}

add_shortcode('allacademies', 'shortcode_allacademies');
function shortcode_allacademies() {

    ob_start();
        get_template_part('archive-portfolio' );
        return ob_get_clean();

}

add_shortcode('academyevents', 'shortcode_academyevents');
function shortcode_academyevents() {

    ob_start();
        get_template_part('archive-event' );
        return ob_get_clean();

}

add_shortcode('wmf_cards','shortcode_wmf_cards');
function shortcode_wmf_cards() {
        
        ob_start();

        // wp_enqueue_style( 'semantic_addon_min', site_url() . '/wp-content/themes/wmf/assets/libs/semantic/dist/semantic.min.css');
        // wp_enqueue_style( 'semantic_addon_cards', site_url() . '/wp-content/themes/wmf/assets/libs/semantic/components/card.css');

        // wp_enqueue_style( 'wmf_cards_custom_css', site_url() . '/wp-content/themes/wmf/assets/css/frontend/wmf-cards.css');

       //wp_enqueue_script( 'semantic_scripts', site_url() . '/wp-content/themes/wmf/assets/libs/semantic/dist/semantic.min.js', array('jquery'),'1.0', true );
        
        // wp_enqueue_script( 'wmf_cards_custom_script', site_url() . '/wp-content/themes/wmf/assets/js/frontend/wmf-cards-script.js', array('jquery'),'1.0', true );

        get_template_part ('page-wmf-cards');
        
        return ob_get_clean();
}