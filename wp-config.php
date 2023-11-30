<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'apsp_roncegno_db' );

/** Database username */
define( 'DB_USER', 'apsp_roncegno_user' );

/** Database password */
define( 'DB_PASSWORD', 'd9518i#ub%3x2YIs#!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',}HVj~0+/55poJ/bZ)Ha%nI6B$Z{N1jbdc5Y6;%)lv5>a1Ie)TKgT}k0J)@H+Fi#' );
define( 'SECURE_AUTH_KEY',  'XH{Wy~gz((fRAY{R+)IoeR*;C.&pB7{8rvml`JXS4ig<kSc:Xr^,}`CjuamT7Na{' );
define( 'LOGGED_IN_KEY',    '&(V?0XH/*HSnH>J&rJJ5j@9a;e@Ee,HO%AF{Ga~b_lffa4R`<KRIb0S=lG#-|:-7' );
define( 'NONCE_KEY',        '2{[iT%msc_n>zf:{9S!K9nsA5mC,R(1,TGZ@Yvl8=n|gkvE-0<6ffV@3$1{R}a#c' );
define( 'AUTH_SALT',        '&E:G6z$R8eV0`q2zML=<9LUMtKpCgHd^=ZU(O+::UEvy*%tzy]bb[ct,+)D!aG#d' );
define( 'SECURE_AUTH_SALT', 'H{uY#NBa;s|eZ+w^ucZ6A; {;oCIdVUICxsd0P[;M/hYQHHVM{|!jEoAu=l.m+F#' );
define( 'LOGGED_IN_SALT',   'W10xC`v>+SFV$~c+r-cV/RE5~K|5(d(G]`G5i$~`B /X6Z!kJ*E;OF-01R#@LY.I' );
define( 'NONCE_SALT',       '|:TZ.CFcsoj$I {S:;*a:6-29([j63.lgk0)t}/hdY7z8~8EV^Q$c=c]aX-sM7@J' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
