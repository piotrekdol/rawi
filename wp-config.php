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
define( 'DB_NAME', 'rawi' );

/** Database username */
define( 'DB_USER', 'pio_rawi' );

/** Database password */
define( 'DB_PASSWORD', 'piorawi123' );

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
define( 'AUTH_KEY',         'MLiW6TnVx!J5MKvcqAtduE+gY0%o>^r$@eq0Ro-%/c~VS{U.=Z(tXt_bi0?2Oz;Q' );
define( 'SECURE_AUTH_KEY',  'j7VxugbXdq^Qtc(ck2MEv7Fz^{aCKO{tmwK0QMi4blx4a-1kq%~E;u9abz)fw4(0' );
define( 'LOGGED_IN_KEY',    'BYgOe3rk?@uYN6H;CljL6HA(1;p^cr?C5>N18?KwjRv]z?v!pZy5VJr==O!iQs1T' );
define( 'NONCE_KEY',        'BUW~MMWB%:oQf^Z^f2<7[mWo.6- TfA(F/~P2<M{hB(YVza`M1E8{a [/Q+II3j4' );
define( 'AUTH_SALT',        'U5u@%ud|-5?M/B~!A)cBp([%3JgQCikawt9Q-;E^zNIIT2_Wp83oC}? FAfM4t*V' );
define( 'SECURE_AUTH_SALT', 'pOm(t}LK0/_$D<:/U9rM;%H>=Fg,?L98rMNzw|Q#o4A?a+BnGc6n&wT8;+~XGns0' );
define( 'LOGGED_IN_SALT',   '?AuFoK^!*[Pi&CmgCEc4QkmfwwZ*y%/[Sk4FD@hEOt[,.5rzWKuC17(9$SJi`g!c' );
define( 'NONCE_SALT',       '~_zM~XBsIBukT(yc7rt8mK;^5_q[w@:6HM3Xy3Wb)r~N+3XG&WiV%DaF39rwW3|W' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
