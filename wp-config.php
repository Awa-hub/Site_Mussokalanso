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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mussokalanso' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'hx+>!-DgtB~P14W7o-[87eB$sary&b`4o6633ym6?Y8]/hRLBUUd@0+++FBO}-S,' );
define( 'SECURE_AUTH_KEY',  'N)BAoi&q_{Xey>AW6<0TLRfcF:4_lPHl9B[r_W=Gw`]e>?cfN~]o<P0![^`wKK9/' );
define( 'LOGGED_IN_KEY',    'TLy[dsWW@DCzBaIjGaW]qoR16VxhEsqg<gWDmIE{2Ti.edL%w]XMTZLgYbJPc9(I' );
define( 'NONCE_KEY',        'Q nQikAU@*}]Bt=>%Z *$!`&FmZ`e{|.JmQ>dW[QpQsSO;Tx.K(8+c8-8h~]0TRB' );
define( 'AUTH_SALT',        '1EAyr3w<l8pJFXn[_MP[;<Ln{.8]U;sX]/GfUZf_:~ZfL_6LF];a^iVLN6Ai4db#' );
define( 'SECURE_AUTH_SALT', 'TV9!~ByZzY@%4QwbNX+0WKvcNC4%$?PmsV[$Ml:o&{XUWcntuc^M-,;ad=Xr/i%`' );
define( 'LOGGED_IN_SALT',   '>;r#Bt?=h)4vf*+#+gO9F+l=zy~zMk7-GEMF@x2[:QS:}k2<*.t!5rgEysg>a6G}' );
define( 'NONCE_SALT',       'n,H{j9kF@J*(0k5d{ibQ?Ah^/tE%K87%7ic]S79[Waz>}h_8QL0 azUGLTUI^19#' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
