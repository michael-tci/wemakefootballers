<?php
// ucwords(strtolower($bar))

// function wmf_wp_title( $title, $sep = '|' ) {
//   if ( is_feed() ) {
//     return $title;
//   }

//   global $page, $paged;

//   $title .= $title == '' ? 'Homepage' : '';

//   // Add the blog name
//   // $title .= get_bloginfo( 'name', 'display' );

//   // Add the blog description for the home/front page.
//   $site_description = get_bloginfo( 'description', 'display' );

//   if (!$site_description) $site_description = ' | We Make Footballers';

//   // if ( $site_description && ( is_home() || is_front_page() ) ) {
//     $title .= " $sep $site_description";
//   // }

//   // Add a page number if necessary:
//   // if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
//   //   $title .= " $sep " . sprintf( __( '%s Page', '_s' ), max( $paged, $page ) );
//   // }

//   return $title;
// }
// add_filter( 'wp_title', 'wmf_wp_title', 10, 2 );

// add_filter( 'wp_title', 'filter_wp_title' );
// function filter_wp_title( $title ) {
//   global $page, $paged;

//   if ( is_feed() )
//     return $title;

//   $site_description = get_bloginfo( 'description' );

//   $filtered_title = $title . get_bloginfo( 'name' );
//   $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
//   $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

//   $filtered_title = strtolower($title);
//   $filtered_title = ucwords($title);
//   $filtered_title =  str_replace('Wmf', 'WMF', $title);

//   return $filtered_title;
// }

// add_filter('wp_title', 'wmf_captitle', 10, 3);
// if( !function_exists('wmf_captitle') ) {
//   function wmf_captitle($title) {
//     $title = strtolower($title);
//     $title = ucwords($title);
//     $title =  str_replace('Wmf', 'WMF', $title);
//     return 'hehe';
//   }
// }
