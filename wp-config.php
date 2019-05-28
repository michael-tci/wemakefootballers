<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


define('DB_NAME', 'wemakefootballers');

/** MySQL database username */
define('DB_USER', 'wemakefootballers');

/** MySQL database password */
define('DB_PASSWORD', 'Ycj12Pz4');

/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!p;PE`LW FBJeKM.}-a6T$.!QF^st&n>m=MP/+2wZ7$S2MtI--El2Wuy}Zy`g(z?');
define('SECURE_AUTH_KEY',  'SKVdC#PP4Y$joUE~Y3c(VFWilO:2AmJKnH,^AS{-*&a,mV9_M;%7{R,f|^]Tp`#G');
define('LOGGED_IN_KEY',    'j/5$p;F#7`6_&eFSV!Q~<*;D1xXqIzN7W$A(-=*O6ooq[%mhmq_F+VWYpo0?+vfU');
define('NONCE_KEY',        'g%ct65rS`y%IljRpx2tee:_>Z$f,d-/bllT|}>0-%HpxCZ7x7Kg%uCH}~vfGph=h');
define('AUTH_SALT',        '*>9R&Nq7c2cz!+oP$thsrq8)/V_5w8L^$rhbc_S/(`C*VI}b]^B1G0X3]:W#-S1/');
define('SECURE_AUTH_SALT', ':4Yh%#>$]e&WY*4oN9^nG*vKAN(^N3{Ya]Zf)#VjR`Dzg#-+m,zus~no$ <&r*JT');
define('LOGGED_IN_SALT',   ' YeVv&h4[mWyZQBRSqf0FJO!^KQd?LO81>_J?0_E@`^UND2#a=!7PC+^7qcus<:a');
define('NONCE_SALT',       'w:w:mYW_r?!sAC|SDU@P2Nw`4:xn<vjm|+]G2 u()>`c78Z%I/cX&HlGI-~5h:%>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true  );
define( 'WP_DEBUG_DISPLAY', true  );
define( 'WP_DEBUG_LOG', true  );
define( 'WP_MEMORY_LIMIT', '1024M' );
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

define ('WPCF7_LOAD_JS', false );

/* That's all, stop editing! Happy blogging. */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.wemakefootballers.com');
define('PATH_CURRENT_SITE', '/');
define('WP_CONTENT_URL', 'http://' .DOMAIN_CURRENT_SITE. '/wp-content'); 
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* install plugin without ftp/ssh/sftp */
define('FS_METHOD', 'direct');
