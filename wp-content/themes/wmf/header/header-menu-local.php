<?php
if ( has_nav_menu( 'primaryLocation' ) ) {
  $gssMenus = new Walker_Nav_Menu;
  if ( class_exists('gssCore') ) {
    $gssCore = new gssCore();
    $gssMenus = $gssCore->helper('menus', 'menusHelper');
  }
  wp_nav_menu( array(
    'theme_location' => 'primaryLocation',
    'menu' => 'primary-menu',
    'walker' => $gssMenus
    )
  );
}
