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
        'name'          => __( 'Footer Logo', 'wmf' ), /* Primary Sidebar for Everywhere else */
        'id'            => 'footerlogo',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    
}
add_action( 'widgets_init', 'footer_sidebar_widgets_init' );
// add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


add_action('wp_ajax_get_academy_list', 'get_academy_list');
add_action('wp_ajax_nopriv_get_academy_list', 'get_academy_list');

function get_academy_list(){

    global $wpdb;

        if( isset($_POST['get_postcode_value']) ):

            $keyword = $_POST['get_postcode_value']; 

            $get_result = $wpdb->get_results("SELECT `name`,`academy_link`,`acc_address`,`academy_distance`,`academy_email`,`academy_contact`,`training_time`,`training_link`,`weekly_training_price` FROM `wp_accadamy` WHERE `name`LIKE'%$keyword%' OR `post_code`LIKE'%$keyword%'");
            

            ?>
            <div class="academy_outer">
                <div class="inner_academy_outer"></div>
                    <?php foreach ($get_result as $key => $value) { ?>
                    <div class="outer-of-acadmy">
                        <div class="left_sec">
                            <div class="img-left-sec">
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/08/woodcote-high-school.jpg">
                            </div>
                            <ul class="detail-ul">
                                <?php if($value->acc_address): ?><li><?php echo $value->acc_address; ?></li><?php endif; ?>
                                <?php if($value->academy_email): ?><li><?php echo $value->academy_email; ?></li><?php endif; ?>
                                <?php if($value->academy_contact):?><li><?php  echo $value->academy_contact; ?></li><?php endif; ?>
                            </ul>
                        </div>
                        <div class="right_sec">
                            <h4><?php echo $value->name; ?> <span class="academy_dis"><?php if($value->academy_distance): echo '( '.$value->academy_distance.' )'; endif; ?></span></h4>
                            
                            <h4 class="weekly-training">Weekly Training</h4>
                            <span class="weelly_price"><?php if($value->weekly_training_price): echo $value->weekly_training_price; endif; ?></span>
                            <span class="traning_time"><?php if($value->training_time): echo $value->training_time; endif; ?></span>
                            <div class="btn btn-primary">
                                <a class="book-session-link" href="javascript:void(0);">Book Free Session</a>
                            </div>
                            <div class="book-freetrial-btn">
                                <a class="book-session-link" href="<?php echo $value->academy_link; ?>">Visit <?php echo $value->name; ?> Website</a>
                            </div>
                        </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        endif;
    die;

}

add_action('wp_ajax_current_search', 'current_search');
add_action('wp_ajax_nopriv_current_search', 'current_search');

function current_search(){
    global $wpdb;

        if(!empty($_POST['current_key'])) :
            $current_key= $_POST["current_key"];
            $get_current_key = $wpdb->get_results("SELECT * FROM wp_accadamy WHERE name like '%$current_key%' OR post_code like '%$current_key%'  ORDER BY name LIMIT 0,6");
            if(!empty($get_current_key)){ 
        ?>  
                <ul>
                    <?php foreach ($get_current_key as $key => $current_value) { ?>
                        <li>
                            <a href="javascript:void(0);" ><?php echo $current_value->name;?><span>, <?php echo $current_value->post_code; ?></span></a>                        
                        </li>
                    <?php } ?>
                </ul>               
        <?php } else {
                    echo 'No nearest class found.';
                }
        endif;
    die;
}