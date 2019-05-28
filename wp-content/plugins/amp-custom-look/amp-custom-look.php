<?php
/**
 * Plugin Name: Amp Custom Look
 * Description: Adds a custom look to you amp template.
 * Plugin URI: https://github.com/automattic/amp-wp
 * Author: Suraj Air
 * Author URI: http://happydoodles.in
 * Version: 0.1.0
 * Text Domain: amp
 * Domain Path: /languages/
 * License: GPLv2 or later
 */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'flush_rewrite_rules' );


//change the default template file for the amp page
function acl_set_custom_template( $file, $type, $post ) {
    $file = dirname( __FILE__ ) . '/templates/'.$type.'.php';
    return $file;
}
add_filter( 'amp_post_template_file', 'acl_set_custom_template', 10, 3 );
add_filter( 'amp_page_template_file', 'acl_set_custom_template', 10, 3 );


add_action( 'amp_init', 'portfolio_amp_add_review_cpt' );
function portfolio_amp_add_review_cpt() {
    add_post_type_support( 'portfolio', AMP_QUERY_VAR );
}


function acl_get_featured_image_src($post_id, $size = 'large'){
	$featured_image_url = 'http://placehold.it/150x150';
    if(has_post_thumbnail($post)){
      	$feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post), $size);
     	$featured_image_url = $feat_image[0];
    }
    return $featured_image_url;
}

function acl_get_post_data($post_id){
	$post = get_post($post_id);
	$post_data = array();
	$post_data['title'] = $post_id->post_title;
	$post_data['featured_image_src'] = acl_get_featured_image_src($post_id);
	return $post_data;
}

function acl_get_related_posts(){
	$post = get_post(); // returns global post instance
	$related_posts = array();
	$related_args = array(
	  'post_type' => 'post',
	  'posts_per_page' => 5
	);
	$related = new WP_Query( $related_args );
	while($related->have_posts()): 
		$related->the_post();
		$related_posts[] = acl_get_post_data(get_the_ID());
	endwhile;
	wp_reset_postdata();
}

// add related posts
function acl_add_related_posts( $data ) {
    $data[ 'related_posts' ] = acl_get_related_posts();
    return $data;
}
add_filter( 'amp_post_template_data', 'acl_add_related_posts' );


function acl_amp_add_custom_actions() {
    add_filter( 'the_content', 'acl_amp_add_adsense_to_content' );
}
add_action( 'pre_amp_render_post', 'acl_amp_add_custom_actions' );

function acl_amp_add_adsense_to_content( $content ) {
	global $post;
	$libxml_previous_state = libxml_use_internal_errors( true );
    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    libxml_use_internal_errors( $libxml_previous_state );

    $ad_slots = array(2, 6);
    $output = '';
    $images = $dom->getElementsByTagName('img');
 
    foreach ( $images as $node ) {
    	if($node->getAttribute('width') !== '' && $node->getAttribute('height') !== ''){
    		continue;
    	}
    	$src = $node->getAttribute('src');
        if (strpos($src, 'http') === false) {
            $src = site_url() . '/' . $src;
        }    
    	list($width, $height) = getimagesize($src);
    	$node->setAttribute('width', $width);
    	$node->setAttribute('height', $height);
	}
	foreach ( $dom->childNodes as $node ) {
		$output .= trim($dom->saveHTML( $node ));
	}
	return $output;
}