<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
**/

require_once(get_theme_file_path( '/code/inc/functions.php'));
             
require get_theme_file_path( '/code/widgets/recent-posts-widget-with-thumbnails.php' );

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );

function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
   $my_attr = 'destination-email';

   if ( isset( $atts[$my_attr] ) ) {
       $out[$my_attr] = $atts[$my_attr];
   }

   return $out;
}


/* */
add_action( 'wp_ajax_send_email_micro', 'callback_send_email_micro' );
add_action( 'wp_ajax_nopriv_send_email_micro', 'callback_send_email_micro' );

function callback_send_email_micro(){
	
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$child = $_POST['child'];
	$dob = $_POST['dob'];
	$information = $_POST['information'];
	
	/* infor */
	$email_admin = get_option('gss_getintouch_email');
	$to = 'nguyentrang040293@gmail.com';
	$to2 = 'mr.riddle244@gmail.com';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	$headers .= 'From: We Make Footballers -  < '.$email_admin.'>' . "\r\n";			
	$subject = 'We Make Footballers';

	$body = 'Thank you for taking the time to register';
	$body .= '<p>Parent/Guardian Name : ' . $fullname . '</p>';
	$body .= '<p>Parent/Guardian email : ' . $email . '</p>';
	$body .= '<p>Parent/Guardian Phone Number : ' . $phone . '</p>';
	$body .= '<p>Childs Full Name : ' . $child . '</p>';
	$body .= '<p>Child DOB : ' .$dob. '</p>';
	$body .= '<p>Child Medical Information : ' . $information . '</p>';	
	
	
	wp_mail( $email_admin, $subject, $body, $headers );
	 
}


/* */
add_action( 'wp_ajax_send_email', 'callback_send_email' );
add_action( 'wp_ajax_nopriv_send_email', 'callback_send_email' );

function callback_send_email(){
	
	$select = $_POST['select'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$child = $_POST['child'];
	$wuc_date = $_POST['wuc_date'];
	$information = $_POST['information'];
		
	
	/* infor */
	$email_admin = get_option('gss_getintouch_email');
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	$headers .= 'From: We Make Footballers -  < '.$email_admin.'>' . "\r\n";	
				
	$subject = 'We Make Footballers';

	$body = 'Thank you for taking the time to register';
	$body .= '<p>Academy : ' . $select . '</p>';
	$body .= '<p>Parent/Guardian Name : ' . $fullname . '</p>';
	$body .= '<p>Parent/Guardian email : ' . $email . '</p>';
	$body .= '<p>Parent/Guardian Phone Number : ' . $phone . '</p>';
	$body .= '<p>Childs Full Name : ' . $child . '</p>';
	$body .= '<p>Child DOB : ' . $wuc_date   . '</p>';
	$body .= '<p>Child Medical Information : ' . $information . '</p>';	
	
	wp_mail( $email_admin, $subject, $body, $headers );
	 
}


/* */
// function form_with_pipes_handler($formName, $fieldName, $newFieldName, &$formData)
// {
//     if ($formData &&
//             $formName == $formData->title &&
//             property_exists($formData, 'WPCF7_ContactForm') &&
//             method_exists($formData->WPCF7_ContactForm, 'form_scan_shortcode')) {
 
//         $scanned_form_tags = $formData->WPCF7_ContactForm->form_scan_shortcode();
//         $emailSelected = $formData->posted_data[$fieldName];
//         if (is_array($emailSelected) && count($emailSelected) == 1) {
//             $emailSelected = $emailSelected[0];
//         }
//         $valueSelected = null;
//         foreach ($scanned_form_tags as $tag) {
//             if ($tag['name'] == $fieldName) {
//                 foreach ($tag['raw_values'] as $rawValue) {
//                     // value|email
//                     $valuesArray = explode('|', $rawValue);
//                     if (count($valuesArray) == 2 && $valuesArray[1] == $emailSelected) {
//                         $valueSelected = $valuesArray[0];
//                         break;
//                     }
//                 }
//             }
//             if ($valueSelected != null) {
//                 break;
//             }
//         }
//         if ($valueSelected != null) {
//             $formData->posted_data[$fieldName] = $valueSelected;
//             $formData->posted_data[$newFieldName] = $emailSelected;
//         }
//     }
//     return $formData;
// }

// function location_form_handler($formData) // Use a different function name for each form
// {
//     $formName = 'Contact After Form'; // change this to your form's name
//     $fieldName = 'to-email'; // change this to your field's name
//     $newFieldName = $fieldName . '_email';
//     return form_with_pipes_handler($formName, $fieldName, $newFieldName, $formData);
// }
// add_filter('cfdb_form_data', 'location_form_handler'); // ensure 2nd param matches above function name


add_action('admin_init', 'my_general_section');  
function my_general_section() {  
    add_settings_section(  
        'my_settings_section', // Section ID 
        'Football Options', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'holiday_timings', // Option ID
        'Holiday Camps Proffessional Timing', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'holiday_timings' // Should match Option ID
        )  
    ); 

    add_settings_field( // Option 2
        'option_2', // Option ID
        'Option 2', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'option_2' // Should match Option ID
        )  
    ); 

    register_setting('general','holiday_timings', 'esc_attr');
    register_setting('general','option_2', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '<p>A little message on editing info</p>';  
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

if( is_404()) {
  add_action('genesis_after_header', 'RediRect404Error');
  function RediRect404Error() {
    wp_redirect( home_url( '/404-page-not-found/' ));
    exit;
  }
}

if ( file_exists(locate_template("code/core/gssCore.php")) ) {
  locate_template("code/core/gssCore.php", true, true);
  if ( class_exists('gssCore') ) {
    $gssCore = new gssCore();
  }
}

add_action('init' ,'gss_buffer');

function gss_buffer () {
  if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
    @ob_start( "ob_gzhandler" );
  }
  else {
    ob_start();
  }
}
 
// add_filter('excerpt_length', '780');
// add_filter('widget_text', 'do_shortcode');
// add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );

function wpb_set_post_views($postID) {

    $count_key = 'wpb_post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}

//To keep the count accurate, lets get rid of prefetching

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {

    if ( !is_single() ) return;

    if ( empty ( $post_id) ) {

        global $post;

        $post_id = $post->ID;   

    }

    wpb_set_post_views($post_id);

}

add_action( 'wp_head', 'wpb_track_post_views');


function wpb_get_post_views($postID){

    $count_key = 'wpb_post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0 View";

    }

    return $count.' Views';

}

function more_post_ajax(){ //die('here');

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '<div class="col-xs-12 col-sm-12 col-md-4">
        			<div class="news-box">
        				<div class="news-box-img">
        					<a href="'.get_the_permalink().'">
        						'.get_the_post_thumbnail($post->id ,'post-thumbnail').'
        					</a>
        				</div>
        				<div class="news-box-desc">
        					<h3>'.get_the_date("D d F Y").'</h3>
        					<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
        					<p>'.get_the_excerpt().'</p>
        				</div>
        				<span><i class="fa fa-share-alt" aria-hidden="true"></i>SHARE </span>
	                </div>
                 </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


add_filter( 'the_content_more_link', 'wpsites_read_more_link' );
function wpsites_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '"></a>';
}

/*
function crunchify_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
		$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$variable .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$variable .= '<div class="crunchify-social">';
		$variable .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$variable .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$variable .= '<a class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$variable .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$variable .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$variable .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$variable .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" target="_blank">Pin It</a>';
		$variable .= '</div>';
		
		return $variable.$content;
	}else{
		// if not a post/page then don't include sharing button
		return $variable.$content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');
*/


if(get_the_ID() == '3747') {

    function the_content_filter($content) {
        $block = join("|",array(
          //add shortcodes
           "wr_column",
           "wr_text",
           "wr_image",
           "wr_row"
        ));
        $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
        $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
    return $rep;
    }
    add_filter("the_content", "the_content_filter");

}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts',        'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

add_action( 'init', function() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );


function third_party() {
wp_deregister_script('wr-pb-jquery-lazyload');
wp_dequeue_script('wr-pb-jquery-lazyload');

}
add_action('wp_enqueue_scripts', 'third_party' );


function remove_unecessary() {
if (is_front_page()) {
wp_deregister_script('sb_instagram_scripts');
wp_dequeue_script('sb_instagram_scripts');
}

wp_deregister_script('wr-pb-jquery-lazyload');
wp_dequeue_script('wr-pb-jquery-lazyload');

}
add_action( wp_print_scripts, 'remove_unecessary' );



function remove_unecessary_styles() {
    if (is_front_page()) {
    wp_deregister_style('sb_instagram_styles');
    wp_dequeue_style('sb_instagram_styles');

    wp_dequeue_style('');
    wp_deregister_style('');
     
    wp_dequeue_style('');
    wp_deregister_style('');
     

    } 
}
add_action( wp_print_styles, 'remove_unecessary_styles' );


// Deregister Contact Form 7 styles. I copied them to main CSS files to decrease amount of requests
add_action( 'wp_print_styles', 'contact_deregister_styles', 100 );
function contact_deregister_styles() {
        wp_deregister_style( 'contact-form-7' );
    
}

add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga( 'send', 'event', 'Contact Form', 'submit' );
    dataLayer.push({'event': 'Contact', 'eventCategory': 'Contact', 'eventAction': 'Click'});
}, false );
</script>
<?php
}




/*Xtreem work for footer menu */

function footer_sidebar_widgets_init(){

  register_sidebar( array(
    'name'          => __( 'Navigation', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'navigation_menu',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Customer Services', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'customer_menu',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Contact us', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'contact_us',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );
  register_sidebar( array(
    'name'          => __( 'Latest Post', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'latest_post',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Latest Post Title', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'latest_post',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Single Latest Post', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'single_latest_post',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Single Instagram feed', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'single_instagram',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Single Facebook feed', 'wmf' ), /* Primary Sidebar for Everywhere else */
    'id'            => 'single_facebook',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'footer_sidebar_widgets_init' );
// add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


add_action('wp_ajax_get_academy_list', 'get_academy_list');
add_action('wp_ajax_nopriv_get_academy_list', 'get_academy_list');

function get_academy_list(){

    global $wpdb;
     $lat =  NULL; 
     $lon =  NULL; 
     $dist2 = NULL;
        $get_result = '';
        $lat_query = '';
        $lon_query = '';
        $array = [];

        $keywordss = '';
          if( isset($_POST['get_academy_url'])){
            $keywordss = $_POST['get_academy_url']; 
            $get_result = $wpdb->get_results("SELECT * FROM wp_accadamy WHERE academy_link = '$keywordss'");
            foreach($get_result as $value){
                $array[] = $value;
            }
            echo json_encode($array);
            die;
          }


        if( isset($_POST['get_postcode_value'])  || isset($_POST['get_postcode_value_click']) ):
             if(isset($_POST['get_postcode_value']) and $_POST['get_postcode_value'] != ''){
                 $keyword = strstr($_POST['get_postcode_value'] , ',' ,true); 
                if(empty($keyword)){
                    $keyword = $_POST['get_postcode_value'];
                    // $latLong_query = getLatandLong($keyword); 
                    // $lat_query =  $latLong_query['lat']; 
                    // $lon_query = $latLong_query['lng']; 
                }
                $keyword2 = $_POST['get_postcode_value'];
                $latLong_query = getLatandLong($keyword2); 
                $lat_query =  $latLong_query['lat']; 
                $lon_query = $latLong_query['lng'];
                
                // echo '<pre>';
                // print_r($_POST['get_postcode_value']);
                //WHERE `acc_address` LIKE '%$keyword%'

                 $get_result = $wpdb->get_results("SELECT *,  
                                (((acos(sin((".$lat_query."*pi()/180)) * 
                                sin((`lat`*pi()/180))+cos((".$lat_query."*pi()/180)) * 
                                cos((`lat`*pi()/180)) * cos(((".$lon_query."- `lon`)*
                                pi()/180))))*180/pi())*60*1.1515) as distance  
                                FROM `wp_accadamy` HAVING distance < '10' ORDER BY distance ASC");
            }
            else{
                 $keyword = strstr($_POST['get_postcode_value_click'] , ',' ,true); 
                if(empty($keyword)){
                    $keyword = $_POST['get_postcode_value_click'];
                }
                $get_result = $wpdb->get_results("SELECT * FROM `wp_accadamy` WHERE `acc_name` = '$keyword'");

            }

           // echo "SELECT `acc_name`,`academy_link`,`acc_address`,`academy_email`,`academy_contact`,`training_time`,`training_link`,`weekly_training_price` FROM `wp_accadamy` WHERE `acc_name`LIKE'%$keyword%'"; die;
            
            //$get_result = $wpdb->get_results("SELECT * FROM `wp_accadamy` WHERE `acc_address`LIKE'%$keyword%'");
            $numResults =  count($get_result);
            if($numResults > 0){
                $zipcode = $_POST['get_postcode_value'];
               $latLong = getLatandLong($zipcode); 
              
                $lat =  $latLong['lat']; 
                $lon = $latLong['lng']; 


            

             //  $query="SELECT * FROM wp_accadamy WHERE (POW((69.1*(lon-\"$lon\")*cos($lat/57.3)),\"2\")+POW((69.1*(lat-\"$lat\")),\"2\"))<(10*10) ORDER BY ((lat-$lat)*(lat-$lat)) + ((lon - $lon)*(lon - $lon)) ASC"; 
                //$distance = 100;
                
               $query = "SELECT *, ( 6371 * acos ( cos ( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lon ) - radians($lon) ) + sin ( radians($lat) ) * sin( radians( lat ) ) )) AS distance FROM wp_accadamy HAVING distance < 30 ORDER BY distance ASC";
                $get_result2 = $wpdb->get_results($query);
               
            }
                if($numResults == 0){
                    $serach_res = $get_result2;
                }else{
                    $serach_res = $get_result;
                }
   
              
            ?>
            <div id="academyouter" class="academy_outer">
                <div class="inner_academy_outer"></div>
                <?php  if(count($get_result2) > 0 || count($get_result) >0 ) { 
                   // echo '<pre>';print_r($get_result);
                    ?>
                    <?php foreach ($serach_res as $key => $value) { 

                        // $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat.",".$lon."&destinations=".$value->lat.",".$value->lon."&mode=driving&language=pl-PL&key=AIzaSyCxhgcC9Un6YMIVL5agYr7ygNvQMt306Nc";
                        // echo $url;
                        // $ch = curl_init();
                        // curl_setopt($ch, CURLOPT_URL, $url);
                        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        // curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        // $response = curl_exec($ch);
                        // curl_close($ch);
                        // $response_a = json_decode($response, true);
                        // $dist = $response_a['rows'][0]['elements'][0]['+distance']['text'];
                        // $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

                        // $dist2 = $dist * 0.6213712;
                        // if($dist2 <= '10'){

                        $zip1 = urlencode($_POST['get_postcode_value']);
                        $zip2 = str_replace(' ', '', $value->post_code);
                        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat_query.",".$lon_query."&destinations=".$value->lat.",".$value->lon."&mode=driving&language=pl-PL&key=AIzaSyCxhgcC9Un6YMIVL5agYr7ygNvQMt306Nc";



                        // $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$zip1."&destinations=". $zip2."&mode=driving&language=en-EN&sensor=false&key=AIzaSyCxhgcC9Un6YMIVL5agYr7ygNvQMt306Nc";

                         $data   = @file_get_contents($url);
                          $result = json_decode($data, true);

                        
                         //outputs the array

                            $distance = array( // converts the units
                                "meters" => $result["rows"][0]["elements"][0]["distance"]["value"],
                                "kilometers" => $result["rows"][0]["elements"][0]["distance"]["value"] / 1000,
                                "yards" => $result["rows"][0]["elements"][0]["distance"]["value"] * 1.0936133,
                                "miles" => $result["rows"][0]["elements"][0]["distance"]["value"] * 0.000621371
                               
                            );
                           
                        ?>
                    <div class="outer-of-acadmy" message_count="<?php echo number_format($distance['miles'], 1, '.', '');   ?>">
                    <style>
                        .modal-content-align{
                          position: absolute;
                          z-index: 9;
                        }
                        .function-btn-modal-cross{
                          width: 3% !important;
                        }
                        button.close{
                          padding: 0 !important;
                        }
                        .subinnerform {
                            padding: 0 5% 5% 0% !important;
                        }
                      </style>


                      <div id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>-form" class="innerform subinnerform modal-content-align" role="dialog" style="width: 100%;">
                              <div class="" style="">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close function-btn-modal-cross" data-number="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>-close" id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
                                    <h4 class="modal-title">Book Your Free Trial</h4>
                                    <h4 class="modal-title">@ <?php echo $value->acc_name; ?> Academy</h4>
                                  </div>
                                  <div class="triangle-down"></div>
                                  <div class="modal-body" style="padding: 15px 20px 15px!important;">
                                
                                    <!--form start -->
                                  <?php 
                                  echo get_blog_option("$value->active_campaign_form" , 'embed_code' ); // microsite id + option name for active campaign form code
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            $(document).ready(function(){
                              $('#<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>-form').css('display', 'none');
                              
                              $('#<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>').click(function(){
                                  $('#'+$(this).attr('id')+'-form').hide();
                              });

                              $('.book-session-link').click(function(){
                                $('#'+$(this).attr('data-value')+'-form').addClass('in');
                                  $('#'+$(this).attr('data-value')+'-form').css('cssText', 'display: block;width: 100%;');
                                  $('#'+$(this).attr('data-value')+'-form .dob > input').attr('data-field', 'date');
                              });
                            });
                          </script>
                       
                        <div class="left_sec">
                            <div class="img-left-sec">
                              <?php  if(!empty($value->academy_image)){  ?>
                                <img src="<?php echo $value->academy_image; ?>">
                               <?php }else{ ?> 
                               <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/08/woodcote-high-school.jpg">
                               <?php } ?>
                            </div>
                            <ul class="detail-ul">
                                <?php if($value->acc_address): ?><li><?php echo $value->acc_address; ?></li><?php endif; ?>
                                <?php if($value->academy_email): ?><li><?php echo $value->academy_email; ?></li><?php endif; ?>
                                <?php if($value->academy_contact):?><li><?php  echo $value->academy_contact; ?></li><?php endif; ?>
                            </ul>
                        </div>
                        <div class="right_sec">
                            <h4><?php echo $value->acc_name; ?>  <span class="academy_dis"><?php if(!empty($distance['miles'])) {  ?>  <?php echo number_format($distance['miles'], 1, '.', '');   ?> m  <?php }else{ echo  $distance['m'];  ?> <?php } ?> </span></h4>

                            <h5><?php //echo $dist2; ?></h5>
                            
                            <h4 class="weekly-training">Weekly Training</h4>
                            <span class="weelly_price"><?php if($value->weekly_training_price): echo $value->weekly_training_price; endif; ?></span>
                            <!-- <span class="traning_time"><?php if($value->training_time): echo $value->training_time; endif; ?></span> -->
                            <div class="clearfix"></div><br>
                            <table class="table table-hover">
                                <tbody>
                                    <?php

                                        $training_time_arr= unserialize($value->training_time);
                                        $training_week_arr= unserialize($value->training_week);
                                        $training_age_arr= unserialize($value->training_age);

                                        $training_arr = array_map(function ($week, $time, $age) {
                                          return array_combine(
                                            ['week', 'time', 'age'],
                                            [$week, $time, $age]
                                          );
                                        }, $training_week_arr, $training_time_arr, $training_age_arr);

                                      
                                        foreach ($training_arr as $key => $data_value) { 

                                       // $trainingValue =  explode(" ",$data_value);
                                       

                                    ?>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <a class="freetrial-trigger "><?php echo $data_value['week']." ".$data_value['time']; ?></a>
                                                    </p>
                                                </td>    
                                                <td>
                                                    <p><?php echo $data_value['age'] ?></p>
                                                </td>                                  
                                            </tr>
                                    <?php } ?> 
                                </tbody>
                            </table>
                            <div class="btn btn-primary">
                                 <a class="book-session-link" href="javascript:void(0);" id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>-close" data-number="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>" data-value="<?php echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>">Book a Free Session</a>
                                <!-- <a class="book-session-link" data-number="<?php //echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>" id="<?php //echo strtolower(preg_replace('/[\s_]/', '-', $value->acc_name)); ?>-close">Book a Free Session</a> -->
                            </div>


                            <div class="btn btn-primary visit_web">
                                <a class="book-session-link" href="<?php echo $value->academy_link; ?>">Visit <?php echo $value->acc_name; ?> Website</a>
                            </div>
                        </div>
                      </div>

                      
                    <?php }
                   
                        }
                        else{ ?>
                    <span class="no_result">No nearest class found !</span>
                    <?php } ?>
                </div>
                <!-- Load more -->
               
                <div class="text-center">
                  <div  id="load_more" class="btn btn-primary">
                    <a class="book-session-link">Load more</a>
                  </div>
                </div>   
            </div>
            <?php
        endif;
    die;    

}











function getLatandLong($zip){
   $url =  "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&key=AIzaSyD34Y4Vo5pYCZTyylAzNIJUG7_pi96MOvk"; 
  $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $jsonData = json_decode(curl_exec($curlSession));
   

  //$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&amp;sensor=false";
   /*$result_string = file_get_contents($url);
  $result = json_decode($result_string, true);*/
 /* $result1[]=$jsonData['results'][0];
  $result2[]=$result1[0]['geometry'];
  $result3[]=$result2[0]['location'];*/

 $lat = $jsonData->results[0]->geometry->location->lat;
 $long = $jsonData->results[0]->geometry->location->lng; 
 $latlong = array("lat" => $lat ,"lng" => $long);
 return $latlong;
 
}


add_action('wp_ajax_current_search', 'current_search');
add_action('wp_ajax_nopriv_current_search', 'current_search');

function current_search(){
    global $wpdb;

        if(!empty($_POST['current_key'])) :
            $current_key= $_POST["current_key"];
            $get_current_key = $wpdb->get_results("SELECT * FROM wp_accadamy WHERE acc_name like '%$current_key%' OR post_code like '%$current_key%'  ORDER BY acc_name LIMIT 0,6");
            if(!empty($get_current_key)){ 
        ?>  
                <ul>
                    <?php foreach ($get_current_key as $key => $current_value) { ?>
                        <li>
                            <a href="javascript:void(0);" ><?php echo $current_value->acc_name;?><span>, <?php echo $current_value->post_code; ?></span></a>                        
                        </li>
                    <?php } ?>
                </ul>               
        <?php } else {
                    echo 'No nearest class found.';
                }
        endif;
    die;
}

//This function prints the JavaScript to the footer
function add_this_script_footer(){ ?>
 
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
     if ( '2155' == event.detail.contactFormId ) {
            location = 'https://www.wemakefootballers.com/thank-you-parenthost/';
        }else if('4752' == event.detail.contactFormId || '4065' == event.detail.contactFormId){
            location = 'https://www.wemakefootballers.com/thank-free-trial/';
        }else if('5607' == event.detail.contactFormId ){
            var parent_name = $('#parentsName-ch').val();
            var child_name = $('#childName-ch').val();
            var class_name = $('#className').val();
            location = 'https://www.wemakefootballers.com/thank-free-trial/?parent_name='+parent_name+'&child_name='+child_name+'&class_name='+class_name;
        }else if('1111' == event.detail.contactFormId){
              location = 'https://www.wemakefootballers.com/thank-contact-us/';
        }/*else if('2602' == event.detail.contactFormId){
              document.getElementById('myModal').style.display = 'none';
              document.body.style.overflow = "auto"; 
        }*/
}, false );
</script>
 
<?php } 
 
add_action('wp_footer', 'add_this_script_footer'); 

// Active Campaign Form
add_action('admin_menu', 'active_campaign_create_menu');

function active_campaign_create_menu() {

	//create new top-level menu
	add_menu_page('Active Campaign Form', 'Active Campaign Form', 'administrator', 'active_campaign_embed_form', 'active_campaign_settings_page' , 'dashicons-feedback' );

	//call register settings function
	add_action( 'admin_init', 'register_active_campaign_settings' );
}


function register_active_campaign_settings() {
	//register our settings
	register_setting( 'active-campaign-settings-group', 'embed_code' );
}

function active_campaign_settings_page() {
?>
<div class="wrap">
<h1>Active Campaign Form</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'active-campaign-settings-group' ); ?>
    <?php do_settings_sections( 'active-campaign-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Embed Code</th>
        <td><textarea rows="10" class="large-text" name="embed_code"><?php echo esc_attr( get_option('embed_code') ); ?></textarea></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } 


// active campaign main trial form shortcode
function ac_main_trial_form() {
	ob_start();
  ?> 
<style>.acform-alt input[type=text], .acform-alt select, .acform-alt textarea {display: block;
    width: 100% !important;
    padding: 0 10px;
    height: inherit;
    line-height: 1;
    font-size: 16px;
    border: 1px solid #c5c5c5 !important;
    border-style: inset;
    border-radius: 5px;
    height: 42px;
    font-weight: 400;
    box-shadow: inset 0 2px 3px rgba(0,0,0,0.1);
    }
    .acform-alt label {
        width: 100%;
    }
    .acform-alt [type=radio] {
    -webkit-appearance: radio;
    -moz-appearance: radio;
    appearance: radio;}
    .acform-alt [type=checkbox] {
    -webkit-appearance: checkbox;
    -moz-appearance: checkbox;
    appearance: checkbox;}
    .acform-alt .select-wrap { position:relative; }
    .acform-alt .select-wrap::after {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        z-index: 2;
        background: url(/wp-content/themes/wmf/assets/img/expand-button.png) center no-repeat;
            background-size: auto auto;
        background-size: 13px;
        pointer-events: none;}
    .acform-alt [type=submit]  {
        border-radius: 50px;
        color: #fff !important;
        transition: all 0 ease-in-out 0s;
        -webkit-transition: all 0 ease-in-out 0s;
        padding-right: 30px;
        position: relative;
        font-size: 16px !important;
        width: 100% !important;
        height: 52px !important;
        max-width: 330px !important;
        margin: 20px auto;
        float: none;
        display: block;
        clear: both;
        background: #389811 url(https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/tick-icon.png) no-repeat 97% center;
        background-size: 24px;
        border: 0;
        line-height: 0;
    }</style>
    <form method="POST" action="https://wemakefootballers.activehosted.com/proc.php" id="_form_4_" class="acform-alt _form _form_4 _inline-form  _dark" novalidate>
      <input type="hidden" name="u" value="4" /><input type="hidden" name="f" value="4" /><input type="hidden" name="s" /><input type="hidden" name="c" value="0" /><input type="hidden" name="m" value="0" /><input type="hidden" name="act" value="sub" /><input type="hidden" name="v" value="2" />
      <div style="display:none;">
        <label>Keep this field blank</label>
        <input type="text" name="honeypot" id="honeypot_4" />
      </div>
      <div class="_form-content">
          <div class="_form_element _field67 _full_width col-md-16" >
            <div class="_field-wrapper select-wrap">
            
            <?php 
                // tiny start
                global $wpdb;
                $rs_academy = $wpdb->get_results("SELECT `option_value` FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'", OBJECT);
            ?>
              <select name="field[67]" id="academy_trial_list" data-name="select_an_academy">
                <?php if(empty($rs_academy)) { ?>
                <option value="Beckenham" >Beckenham</option>
                <option value="Carshalton" >Carshalton</option>
                <option value="Carshalton South" >Carshalton South</option>
                <option value="Cheshire" >Cheshire</option>
                <option value="Chiswick" >Chiswick</option>
                <option value="Coulsdon South" >Coulsdon South</option>
                <option value="Finchley" >Finchley</option>
                <option value="Hounslow" >Hounslow</option>
                <option value="Isleworth" >Isleworth</option>
                <option value="Kingston" >Kingston</option>
                <option value="Milton Keynes" >Milton Keynes</option>
                <option value="Richmond" >Richmond</option>
                <option value="Southall" >Southall</option>
                <option value="Sunbury" >Sunbury</option>
                <option value="Teddington" >Teddington</option>
                <option value="Twickenham" >Twickenham</option>
                <option value="WMF Girls Class" >WMF Girls Class</option>
                <?php } else { 

                $accademy_names = $wpdb->get_results("SELECT `acc_name` FROM `wp_accadamy` ORDER  BY `acc_name`");

                foreach($accademy_names as $ac_names){ ?>
                    <option value="<?php echo $ac_names->acc_name; ?>" ><?php echo $ac_names->acc_name; ?></option>
              <?php   }

                //$list_academy = explode(',', $rs_academy[0]->option_value); natcasesort($list_academy); ?>
                <!-- <?php //foreach ($list_academy as $item): ?>
                    <option value="<?php //echo $item; ?>" ><?php //echo $item; ?></option>
                <?php //endforeach; ?> -->
                <?php } // tiny end ?>
              </select>
            </div>
          </div>
          <div class="_form_element _x41580899 _full_width col-md-16" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper">
              <input type="text" name="fullname" placeholder="Parent/Guardian Name*" required/>
            </div>
          </div>
          <div class="_form_element _x22114740 _full_width col-md-16" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper">
              <input type="text" name="email" placeholder="Parent/Guardian email*" required/>
            </div>
          </div>
          <div class="_form_element _x62414488 _full_width col-md-16" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper">
              <input type="text" name="phone" placeholder="Parent/Guardian Phone Number*" required/>
            </div>
          </div>
          <div class="_form_element _field62 _full_width col-md-8" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper">
              <input type="text" name="field[62]" value="" placeholder="Child&#039;s Full Name*" required/>
            </div>
          </div>
          <div class="_form_element _field63 _full_width col-md-8" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper dob">
              <input type="text" class="date_field" data-tiny="block2" data-field="date" name="field[74]" value="" placeholder="Child&#039;s D.O.B*" required />
            </div>
          </div>
          <div class="_form_element _field64 _full_width col-md-16" >
            <label class="_form-label">
            </label>
            <div class="_field-wrapper">
              <textarea name="field[64]" placeholder="Child Medical Information"  style="padding-top: 12px;"></textarea>
            </div>
          </div>
              <div class="_form_element _x64534333 _full_width _clear" >
                <div class="_html-code">
                  <p>
                    For more information about our privacy practices, please read our <a href="http://wemakefootballers.com/privacy-policy/">Privacy Policy</a>.
                  </p>
                  <p>
                    By clicking below, you agree that we may process your information in accordance with these terms.
                  </div>
                </div>
                <div class="_button-wrapper _full_width text-center">
                  <button id="_form_4_submit" class="_submit" type="submit" style="padding-top: 0;">
                    BOOK A FREE TRAINING SESSION
                  </button>
                </div>
                <div class="_clear-element">
                </div>
              </div>
              <div class="_form-thank-you" style="display:none;">
              </div>
            </form>
<script>
window.cfields = {"67":"select_an_academy","62":"childs_name","74":"childs_dob2","64":"medical_information_for_child","65":"do_you_have_any_siblings_or_friends_you_would_like_to_book_a_free_trial_for_too"};
window._show_thank_you = function(id, message, trackcmp_url) {
  var form = document.getElementById('_form_' + id + '_'), thank_you = form.querySelector('._form-thank-you');
  form.querySelector('._form-content').style.display = 'none';
  thank_you.innerHTML = message;
  thank_you.style.display = 'block';
  if (typeof(trackcmp_url) != 'undefined' && trackcmp_url) {
    // Site tracking URL to use after inline form submission.
    _load_script(trackcmp_url);
  }
  if (typeof window._form_callback !== 'undefined') window._form_callback(id);
};
window._show_error = function(id, message, html) {
  var form = document.getElementById('_form_' + id + '_'), err = document.createElement('div'), button = form.querySelector('button'), old_error = form.querySelector('._form_error');
  if (old_error) old_error.parentNode.removeChild(old_error);
  err.innerHTML = message;
  err.className = '_error-inner _form_error _no_arrow';
  var wrapper = document.createElement('div');
  wrapper.className = '_form-inner';
  wrapper.appendChild(err);
  button.parentNode.insertBefore(wrapper, button);
  document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
  if (html) {
    var div = document.createElement('div');
    div.className = '_error-html';
    div.innerHTML = html;
    err.appendChild(div);
  }
};
window._load_script = function(url, callback) {
    var head = document.querySelector('head'), script = document.createElement('script'), r = false;
    script.type = 'text/javascript';
    script.charset = 'utf-8';
    script.src = url;
    if (callback) {
      script.onload = script.onreadystatechange = function() {
      if (!r && (!this.readyState || this.readyState == 'complete')) {
        r = true;
        callback();
        }
      };
    }
    head.appendChild(script);
};
(function() {
  if (window.location.search.search("excludeform") !== -1) return false;
  var getCookie = function(name) {
    var match = document.cookie.match(new RegExp('(^|; )' + name + '=([^;]+)'));
    return match ? match[2] : null;
  }
  var setCookie = function(name, value) {
    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000 * 60 * 60 * 24 * 365;
    now.setTime(expireTime);
    document.cookie = name + '=' + value + '; expires=' + now + ';path=/';
  }
      var addEvent = function(element, event, func) {
    if (element.addEventListener) {
      element.addEventListener(event, func);
    } else {
      var oldFunc = element['on' + event];
      element['on' + event] = function() {
        oldFunc.apply(this, arguments);
        func.apply(this, arguments);
      };
    }
  }
  var _removed = false;
  var form_to_submit = document.getElementById('_form_4_');
  var allInputs = form_to_submit.querySelectorAll('input, select, textarea'), tooltips = [], submitted = false;

  var getUrlParam = function(name) {
    var regexStr = '[\?&]' + name + '=([^&#]*)';
    var results = new RegExp(regexStr, 'i').exec(window.location.href);
    return results != undefined ? decodeURIComponent(results[1]) : false;
  };

  for (var i = 0; i < allInputs.length; i++) {
    var regexStr = "field\\[(\\d+)\\]";
    var results = new RegExp(regexStr).exec(allInputs[i].name);
    if (results != undefined) {
      allInputs[i].dataset.name = window.cfields[results[1]];
    } else {
      allInputs[i].dataset.name = allInputs[i].name;
    }
    var fieldVal = getUrlParam(allInputs[i].dataset.name);

    if (fieldVal) {
      if (allInputs[i].type == "radio" || allInputs[i].type == "checkbox") {
        if (allInputs[i].value == fieldVal) {
          allInputs[i].checked = true;
        }
      } else {
        allInputs[i].value = fieldVal;
      }
    }
  }

  var remove_tooltips = function() {
    for (var i = 0; i < tooltips.length; i++) {
      tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
    }
      tooltips = [];
  };
  var remove_tooltip = function(elem) {
    for (var i = 0; i < tooltips.length; i++) {
      if (tooltips[i].elem === elem) {
        tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
        tooltips.splice(i, 1);
        return;
      }
    }
  };
  var create_tooltip = function(elem, text) {
    var tooltip = document.createElement('div'), arrow = document.createElement('div'), inner = document.createElement('div'), new_tooltip = {};
    if (elem.type != 'radio' && elem.type != 'checkbox') {
      tooltip.className = '_error';
      arrow.className = '_error-arrow';
      inner.className = '_error-inner';
      inner.innerHTML = text;
      tooltip.appendChild(arrow);
      tooltip.appendChild(inner);
      elem.parentNode.appendChild(tooltip);
    } else {
      tooltip.className = '_error-inner _no_arrow';
      tooltip.innerHTML = text;
      elem.parentNode.insertBefore(tooltip, elem);
      new_tooltip.no_arrow = true;
    }
    new_tooltip.tip = tooltip;
    new_tooltip.elem = elem;
    tooltips.push(new_tooltip);
    return new_tooltip;
  };
  var resize_tooltip = function(tooltip) {
    var rect = tooltip.elem.getBoundingClientRect();
    var doc = document.documentElement, scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0));
    if (scrollPosition < 40) {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
    } else {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
    }
  };
  var resize_tooltips = function() {
    if (_removed) return;
    for (var i = 0; i < tooltips.length; i++) {
      if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
    }
  };
  var validate_field = function(elem, remove) {
    var tooltip = null, value = elem.value, no_error = true;
    remove ? remove_tooltip(elem) : false;
    if (elem.type != 'checkbox') elem.className = elem.className.replace(/ ?_has_error ?/g, '');
    if (elem.getAttribute('required') !== null) {
      if (elem.type == 'radio' || (elem.type == 'checkbox' && /any/.test(elem.className))) {
        var elems = form_to_submit.elements[elem.name];
        if (!(elems instanceof NodeList || elems instanceof HTMLCollection) || elems.length <= 1) {
          no_error = elem.checked;
        }
        else {
          no_error = false;
          for (var i = 0; i < elems.length; i++) {
            if (elems[i].checked) no_error = true;
          }
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (elem.type =='checkbox') {
        var elems = form_to_submit.elements[elem.name], found = false, err = [];
        no_error = true;
        for (var i = 0; i < elems.length; i++) {
          if (elems[i].getAttribute('required') === null) continue;
          if (!found && elems[i] !== elem) return true;
          found = true;
          elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
          if (!elems[i].checked) {
            no_error = false;
            elems[i].className = elems[i].className + ' _has_error';
            err.push("Checking %s is required".replace("%s", elems[i].value));
          }
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, err.join('<br/>'));
        }
      } else if (elem.tagName == 'SELECT') {
        var selected = true;
        if (elem.multiple) {
          selected = false;
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected) {
              selected = true;
              break;
            }
          }
        } else {
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected && !elem.options[i].value) {
              selected = false;
            }
          }
        }
        if (!selected) {
          elem.className = elem.className + ' _has_error';
          no_error = false;
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (value === undefined || value === null || value === '') {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "This field is required.");
      }
    }
    if (no_error && elem.name == 'email') {
      if (!value.match(/^[\+_a-z0-9-'&=]+(\.[\+_a-z0-9-']+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid email address.");
      }
    }
//WMF-14_2 | Fix Bug require datetimePicker
/*
    if (no_error && /date_field_pika/.test(elem.className)) {
      if (!value.match(/^\d\d\/\d\d\/\d\d\d\d$/)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid date.");
      }
    }
*/
    tooltip ? resize_tooltip(tooltip) : false;
    return no_error;
  };
  var needs_validate = function(el) {
    return el.name == 'email' || el.getAttribute('required') !== null;
  };
  var validate_form = function(e) {
    var err = form_to_submit.querySelector('._form_error'), no_error = true;
    if (!submitted) {
      submitted = true;
      for (var i = 0, len = allInputs.length; i < len; i++) {
        var input = allInputs[i];
        if (needs_validate(input)) {
          if (input.type == 'text') {
            addEvent(input, 'blur', function() {
              this.value = this.value.trim();
              validate_field(this, true);
            });
            addEvent(input, 'input', function() {
              validate_field(this, true);
            });
          } else if (input.type == 'radio' || input.type == 'checkbox') {
            (function(el) {
              var radios = form_to_submit.elements[el.name];
              for (var i = 0; i < radios.length; i++) {
                addEvent(radios[i], 'click', function() {
                  validate_field(el, true);
                });
              }
            })(input);
          } else if (input.tagName == 'SELECT') {
            addEvent(input, 'change', function() {
              validate_field(this, true);
            });
          }
        }
      }
    }
    remove_tooltips();
    for (var i = 0, len = allInputs.length; i < len; i++) {
      var elem = allInputs[i];
      if (needs_validate(elem)) {
        if (elem.tagName.toLowerCase() !== "select") {
          elem.value = elem.value.trim();
        }
        validate_field(elem) ? true : no_error = false;
      }
    }
    if (!no_error && e) {
      e.preventDefault();
    }
    resize_tooltips();
    return no_error;
  };
  addEvent(window, 'resize', resize_tooltips);
  addEvent(window, 'scroll', resize_tooltips);
  window._old_serialize = null;
  if (typeof serialize !== 'undefined') window._old_serialize = window.serialize;
  _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/serialize.min.js", function() {
    window._form_serialize = window.serialize;
    if (window._old_serialize) window.serialize = window._old_serialize;
  });
  _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/moment.min.js", function() {
    _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/pikaday.js", function() {
      var dates = form_to_submit.querySelectorAll('.date_field_pika');
      for (var i = 0; i < dates.length; i++) {
        (function(date) {
          var val = picker = null;
            picker = new Pikaday({ field: date, yearRange: 100, onSelect: function(d) { date.value = moment(d).format('DD/MM/YYYY'); } });
        })(dates[i]);
      }
    });
  });
  var form_submit4 = function(e) {
    e.preventDefault();
    if ( document.getElementById("honeypot_4").value ) { return false; } // honeypot field. If the field has a value it's a spam bot. 
    if (validate_form()) {
        console.log('send form');
      // use this trick to get the submit button & disable it using plain javascript
      document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
      document.getElementById('_form_4_').disabled = true;
      var serialized = _form_serialize(document.getElementById('_form_4_'));
      var err = form_to_submit.querySelector('._form_error');
      err ? err.parentNode.removeChild(err) : false;
      _load_script('https://wemakefootballers.activehosted.com/proc.php?' + serialized + '&jsonp=true');
    }
    console.log(validate_form());
    return false;
  };
  addEvent(form_to_submit, 'submit', form_submit4);
})();
</script>
    <?php
	return ob_get_clean();
}
add_shortcode('active-campaign-main-trial-form', 'ac_main_trial_form');

// active campaign form shortcode - used inside .content-coachform at home page
function ac_form_4() {
	ob_start();
	?> 
<style>.acform-alt input[type=text], .acform-alt select, .acform-alt textarea {display: block;
  width: 100% !important;
  padding: 0 10px;
  height: inherit;
  line-height: 1;
  font-size: 16px;
  border: 1px solid #c5c5c5 !important;
  border-style: inset;
  border-radius: 5px;
  height: 42px;
  font-weight: 400;
  box-shadow: inset 0 2px 3px rgba(0,0,0,0.1);}
  .acform-alt [type=radio] {
  -webkit-appearance: radio;
  -moz-appearance: radio;
  appearance: radio;}
  .acform-alt [type=checkbox] {
  -webkit-appearance: checkbox;
  -moz-appearance: checkbox;
  appearance: checkbox;}
  .acform-alt .select-wrap { position:relative; }
  .acform-alt .select-wrap::after {
      content: "";
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      width: 40px;
      z-index: 2;
      background: url(/wp-content/themes/wmf/assets/img/expand-button.png) center no-repeat;
          background-size: auto auto;
      background-size: 13px;
      pointer-events: none;}
  .acform-alt [type=submit]  {
      border-radius: 50px;
      color: #fff !important;
      transition: all 0 ease-in-out 0s;
      -webkit-transition: all 0 ease-in-out 0s;
      padding-right: 30px;
      position: relative;
      font-size: 16px !important;
      width: 100% !important;
      height: 52px !important;
      max-width: 330px !important;
      margin: 20px auto;
      float: none;
      display: block;
      clear: both;
      background: #389811 url(https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/tick-icon.png) no-repeat 97% center;
      background-size: 24px;
      border: 0;
      line-height: 0;
  }</style>
  <form method="POST" action="https://wemakefootballers.activehosted.com/proc.php" id="_form_4_" class="acform-alt _form _form_4 _inline-form  _dark" novalidate>
    <input type="hidden" name="u" value="4" /><input type="hidden" name="f" value="4" /><input type="hidden" name="s" /><input type="hidden" name="c" value="0" /><input type="hidden" name="m" value="0" /><input type="hidden" name="act" value="sub" /><input type="hidden" name="v" value="2" />
    <div style="display:none;">
      <label>Keep this field blank</label>
      <input type="text" name="honeypot" id="honeypot_4" />
    </div>
    <div class="_form-content">
        <div class="_form_element _field67 _full_width col-md-16" >
          <div class="_field-wrapper select-wrap">
            
            <?php 
                // tiny start
                global $wpdb;
                $rs_academy = $wpdb->get_results("SELECT `option_value` FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'", OBJECT);
            ?>
            <select name="field[67]" class="wuc-select-form">
            <?php if(empty($rs_academy)) { ?>
                <option value="Beckenham" >Beckenham</option>
                <option value="Carshalton" >Carshalton</option>
                <option value="Carshalton South" >Carshalton South</option>
                <option value="Cheshire" >Cheshire</option>
                <option value="Chiswick" >Chiswick</option>
                <option value="Coulsdon South" >Coulsdon South</option>
                <option value="Finchley" >Finchley</option>
                <option value="Hounslow" >Hounslow</option>
                <option value="Isleworth" >Isleworth</option>
                <option value="Kingston" >Kingston</option>
                <option value="Milton Keynes" >Milton Keynes</option>
                <option value="Richmond" >Richmond</option>
                <option value="Southall" >Southall</option>
                <option value="Sunbury" >Sunbury</option>
                <option value="Teddington" >Teddington</option>
                <option value="Twickenham" >Twickenham</option>
                <option value="WMF Girls Class" >WMF Girls Class</option>
            <?php } else { 

                $accademy_names_2 = $wpdb->get_results("SELECT `acc_name` FROM `wp_accadamy` ORDER  BY `acc_name`");

                foreach($accademy_names_2 as $ac_names_2){ ?>
                    <option value="<?php echo $ac_names_2->acc_name; ?>" ><?php echo $ac_names_2->acc_name; ?></option>
              <?php   }

                //$list_academy = explode(',', $rs_academy[0]->option_value); natcasesort($list_academy); ?>
                <!-- <?php //foreach ($list_academy as $item): ?>
                    <option value="<?php //echo $item; ?>" ><?php //echo $item; ?></option>
                <?php //endforeach; ?> -->
                <?php } // tiny end ?>
            </select>

          </div>
        </div>
        <div class="_form_element _x41580899 _full_width col-md-16" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper">
            <input type="text" name="fullname" placeholder="Parent/Guardian Name*" required class="wuc-fullname-form"/>
          </div>
        </div>
        <div class="_form_element _x22114740 _full_width col-md-16" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper">
            <input type="text" name="email" placeholder="Parent/Guardian email*" required class="wuc-email-form"/>
          </div>
        </div>
        <div class="_form_element _x62414488 _full_width col-md-16" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper">
            <input type="text" name="phone" placeholder="Parent/Guardian Phone Number*" required class="wuc-phone-form"/>
          </div>
        </div>
        <div class="_form_element _field62 _full_width col-md-8" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper">
            <input type="text" name="field[62]" value="" placeholder="Child&#039;s Full Name*" class="wuc-child-form" required/>
          </div>
        </div>
        <div class="_form_element _field63 _full_width col-md-8" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper dob">
            <input type="text" class="date_field wuc-date-form" data-tiny="block" data-field="date" name="field[74]" value="" placeholder="Child&#039;s D.O.B*" required />
            <div id="dtBox99"></div>
          </div>
        </div>
        <div class="_form_element _field64 _full_width col-md-16" >
          <label class="_form-label">
          </label>
          <div class="_field-wrapper">
            <textarea name="field[64]" placeholder="Child Medical Information"  class="wuc-information-form" style="padding-top: 12px;"></textarea>
          </div>
        </div>
            <div class="_form_element _x64534333 _full_width _clear" >
              <div class="_button-wrapper _full_width text-center" style="padding-top: 10px;">
                <button id="_form_4_submit" class="_submit" type="submit">
                  BOOK A FREE TRAINING SESSION
                </button>
              </div>
              <div class="_html-code" style="padding-bottom: 15px;font-size: 14px;">
                <p>
                  For more information about our privacy practices, please read our <a href="http://wemakefootballers.com/privacy-policy/">Privacy Policy</a>.
                </p>
                <p>
                  By clicking below, you agree that we may process your information in accordance with these terms.
                </div>
              </div>
              <div class="_clear-element">
              </div>
            </div>
            <div class="_form-thank-you" style="display:none;">
            </div>
          </form>
          <script>window.cfields = {"67":"select_an_academy","62":"childs_name","74":"childs_dob2","64":"medical_information_for_child","65":"do_you_have_any_siblings_or_friends_you_would_like_to_book_a_free_trial_for_too"};
window._show_thank_you = function(id, message, trackcmp_url) {
  var form = document.getElementById('_form_' + id + '_'), thank_you = form.querySelector('._form-thank-you');
  form.querySelector('._form-content').style.display = 'none';
  thank_you.innerHTML = message;
  thank_you.style.display = 'block';
  if (typeof(trackcmp_url) != 'undefined' && trackcmp_url) {
    // Site tracking URL to use after inline form submission.
    _load_script(trackcmp_url);
  }
  if (typeof window._form_callback !== 'undefined') window._form_callback(id);
};
window._show_error = function(id, message, html) {
  var form = document.getElementById('_form_' + id + '_'), err = document.createElement('div'), button = form.querySelector('button'), old_error = form.querySelector('._form_error');
  if (old_error) old_error.parentNode.removeChild(old_error);
  err.innerHTML = message;
  err.className = '_error-inner _form_error _no_arrow';
  var wrapper = document.createElement('div');
  wrapper.className = '_form-inner';
  wrapper.appendChild(err);
  button.parentNode.insertBefore(wrapper, button);
  document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
  if (html) {
    var div = document.createElement('div');
    div.className = '_error-html';
    div.innerHTML = html;
    err.appendChild(div);
  }
};
window._load_script = function(url, callback) {
    var head = document.querySelector('head'), script = document.createElement('script'), r = false;
    script.type = 'text/javascript';
    script.charset = 'utf-8';
    script.src = url;
    if (callback) {
      script.onload = script.onreadystatechange = function() {
      if (!r && (!this.readyState || this.readyState == 'complete')) {
        r = true;
        callback();
        }
      };
    }
    head.appendChild(script);
};
(function() {
  if (window.location.search.search("excludeform") !== -1) return false;
  var getCookie = function(name) {
    var match = document.cookie.match(new RegExp('(^|; )' + name + '=([^;]+)'));
    return match ? match[2] : null;
  }
  var setCookie = function(name, value) {
    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000 * 60 * 60 * 24 * 365;
    now.setTime(expireTime);
    document.cookie = name + '=' + value + '; expires=' + now + ';path=/';
  }
      var addEvent = function(element, event, func) {
    if (element.addEventListener) {
      element.addEventListener(event, func);
    } else {
      var oldFunc = element['on' + event];
      element['on' + event] = function() {
        oldFunc.apply(this, arguments);
        func.apply(this, arguments);
      };
    }
  }
  var _removed = false;
  var form_to_submit = document.getElementById('_form_4_');
  var allInputs = form_to_submit.querySelectorAll('input, select, textarea'), tooltips = [], submitted = false;

  var getUrlParam = function(name) {
    var regexStr = '[\?&]' + name + '=([^&#]*)';
    var results = new RegExp(regexStr, 'i').exec(window.location.href);
    return results != undefined ? decodeURIComponent(results[1]) : false;
  };

  for (var i = 0; i < allInputs.length; i++) {
    var regexStr = "field\\[(\\d+)\\]";
    var results = new RegExp(regexStr).exec(allInputs[i].name);
    if (results != undefined) {
      allInputs[i].dataset.name = window.cfields[results[1]];
    } else {
      allInputs[i].dataset.name = allInputs[i].name;
    }
    var fieldVal = getUrlParam(allInputs[i].dataset.name);

    if (fieldVal) {
      if (allInputs[i].type == "radio" || allInputs[i].type == "checkbox") {
        if (allInputs[i].value == fieldVal) {
          allInputs[i].checked = true;
        }
      } else {
        allInputs[i].value = fieldVal;
      }
    }
  }

  var remove_tooltips = function() {
    for (var i = 0; i < tooltips.length; i++) {
      tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
    }
      tooltips = [];
  };
  var remove_tooltip = function(elem) {
    for (var i = 0; i < tooltips.length; i++) {
      if (tooltips[i].elem === elem) {
        tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
        tooltips.splice(i, 1);
        return;
      }
    }
  };
  var create_tooltip = function(elem, text) {
    var tooltip = document.createElement('div'), arrow = document.createElement('div'), inner = document.createElement('div'), new_tooltip = {};
    if (elem.type != 'radio' && elem.type != 'checkbox') {
      tooltip.className = '_error';
      arrow.className = '_error-arrow';
      inner.className = '_error-inner';
      inner.innerHTML = text;
      tooltip.appendChild(arrow);
      tooltip.appendChild(inner);
      elem.parentNode.appendChild(tooltip);
    } else {
      tooltip.className = '_error-inner _no_arrow';
      tooltip.innerHTML = text;
      elem.parentNode.insertBefore(tooltip, elem);
      new_tooltip.no_arrow = true;
    }
    new_tooltip.tip = tooltip;
    new_tooltip.elem = elem;
    tooltips.push(new_tooltip);
    return new_tooltip;
  };
  var resize_tooltip = function(tooltip) {
    var rect = tooltip.elem.getBoundingClientRect();
    var doc = document.documentElement, scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0));
    if (scrollPosition < 40) {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
    } else {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
    }
  };
  var resize_tooltips = function() {
    if (_removed) return;
    for (var i = 0; i < tooltips.length; i++) {
      if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
    }
  };
  var validate_field = function(elem, remove) {
    var tooltip = null, value = elem.value, no_error = true;
    remove ? remove_tooltip(elem) : false;
    if (elem.type != 'checkbox') elem.className = elem.className.replace(/ ?_has_error ?/g, '');
    if (elem.getAttribute('required') !== null) {
      if (elem.type == 'radio' || (elem.type == 'checkbox' && /any/.test(elem.className))) {
        var elems = form_to_submit.elements[elem.name];
        if (!(elems instanceof NodeList || elems instanceof HTMLCollection) || elems.length <= 1) {
          no_error = elem.checked;
        }
        else {
          no_error = false;
          for (var i = 0; i < elems.length; i++) {
            if (elems[i].checked) no_error = true;
          }
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (elem.type =='checkbox') {
        var elems = form_to_submit.elements[elem.name], found = false, err = [];
        no_error = true;
        for (var i = 0; i < elems.length; i++) {
          if (elems[i].getAttribute('required') === null) continue;
          if (!found && elems[i] !== elem) return true;
          found = true;
          elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
          if (!elems[i].checked) {
            no_error = false;
            elems[i].className = elems[i].className + ' _has_error';
            err.push("Checking %s is required".replace("%s", elems[i].value));
          }
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, err.join('<br/>'));
        }
      } else if (elem.tagName == 'SELECT') {
        var selected = true;
        if (elem.multiple) {
          selected = false;
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected) {
              selected = true;
              break;
            }
          }
        } else {
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected && !elem.options[i].value) {
              selected = false;
            }
          }
        }
        if (!selected) {
          elem.className = elem.className + ' _has_error';
          no_error = false;
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (value === undefined || value === null || value === '') {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "This field is required.");
      }
    }
    if (no_error && elem.name == 'email') {
      if (!value.match(/^[\+_a-z0-9-'&=]+(\.[\+_a-z0-9-']+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid email address.");
      }
    }
    if (no_error && /date_field_pika/.test(elem.className)) {
      if (!value.match(/^\d\d\/\d\d\/\d\d\d\d$/)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid date.");
      }
    }
    tooltip ? resize_tooltip(tooltip) : false;
    return no_error;
  };
  var needs_validate = function(el) {
    return el.name == 'email' || el.getAttribute('required') !== null;
  };
  var validate_form = function(e) {
    var err = form_to_submit.querySelector('._form_error'), no_error = true;
    if (!submitted) {
      submitted = true;
      for (var i = 0, len = allInputs.length; i < len; i++) {
        var input = allInputs[i];
        if (needs_validate(input)) {
          if (input.type == 'text') {
            addEvent(input, 'blur', function() {
              this.value = this.value.trim();
              validate_field(this, true);
            });
            addEvent(input, 'input', function() {
              validate_field(this, true);
            });
          } else if (input.type == 'radio' || input.type == 'checkbox') {
            (function(el) {
              var radios = form_to_submit.elements[el.name];
              for (var i = 0; i < radios.length; i++) {
                addEvent(radios[i], 'click', function() {
                  validate_field(el, true);
                });
              }
            })(input);
          } else if (input.tagName == 'SELECT') {
            addEvent(input, 'change', function() {
              validate_field(this, true);
            });
          }
        }
      }
    }
    remove_tooltips();
    for (var i = 0, len = allInputs.length; i < len; i++) {
      var elem = allInputs[i];
      if (needs_validate(elem)) {
        if (elem.tagName.toLowerCase() !== "select") {
          elem.value = elem.value.trim();
        }
        validate_field(elem) ? true : no_error = false;
      }
    }
    if (!no_error && e) {
      e.preventDefault();
    }
    resize_tooltips();
    return no_error;
  };
  addEvent(window, 'resize', resize_tooltips);
  addEvent(window, 'scroll', resize_tooltips);
  window._old_serialize = null;
  if (typeof serialize !== 'undefined') window._old_serialize = window.serialize;
  _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/serialize.min.js", function() {
    window._form_serialize = window.serialize;
    if (window._old_serialize) window.serialize = window._old_serialize;
  });
  _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/moment.min.js", function() {
    _load_script("/wp-content/themes/wmf/assets/js/fontend/tmp/pikaday.js", function() {
      var dates = form_to_submit.querySelectorAll('.date_field_pika');
      for (var i = 0; i < dates.length; i++) {
        (function(date) {
          var val = picker = null;
            picker = new Pikaday({ field: date, yearRange: 100, onSelect: function(d) { date.value = moment(d).format('DD/MM/YYYY'); } });
        })(dates[i]);
      }
    });
  });
  var form_submit = function(e) {
    e.preventDefault();
    if ( document.getElementById("honeypot_4").value ) { return false; } // honeypot field. If the field has a value it's a spam bot. 
    if (validate_form()) {
      // use this trick to get the submit button & disable it using plain javascript
      document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
      var serialized = _form_serialize(document.getElementById('_form_4_'));
      var err = form_to_submit.querySelector('._form_error');
      err ? err.parentNode.removeChild(err) : false;
	  /* */
	  $(function() {
			var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
			var select = $('.wuc-select-form').val();
			var fullname = $('.wuc-fullname-form').val();
			var email = $('.wuc-email-form').val();
			var phone = $('.wuc-phone-form').val();
			var child = $('.wuc-child-form').val();
			var wuc_date = $('.wuc-date-form').val();
			var information = $('.wuc-information-form').val();
			var data = {
				'action': 'send_email',
				'select': select,
				'fullname': fullname,
				'email': email,
				'phone': phone,
				'child': child,
				'wuc_date': wuc_date,
				'information': information,
				'security': '<?php echo wp_create_nonce("filter_posts"); ?>'
			};
			$.post(ajaxurl, data, function(response) {
				console.log('send email successfully');
			});
		});
	  /* */
      _load_script('https://wemakefootballers.activehosted.com/proc.php?' + serialized + '&jsonp=true');
    }
	
	
    return false;
  };
  addEvent(form_to_submit, 'submit', form_submit);
})();
</script>
<?php
return ob_get_clean();
}
add_shortcode('active-campaign-form-4', 'ac_form_4');

// -- add css 
if ( ! function_exists( 'add_script_style' ) ) {
    function add_script_style() {
        wp_register_style( 'tn-font-awesome', get_stylesheet_directory_uri().'/assets/css/fontend/font-awesome.min.css' );
        wp_enqueue_style( 'tn-font-awesome' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_script_style', 10 );



?>