<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
**/



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