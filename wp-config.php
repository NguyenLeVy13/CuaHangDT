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
define( 'DB_NAME', 'mywordpress' );

/** Database username */
define( 'DB_USER', 'Vy' );

/** Database password */
define( 'DB_PASSWORD', 'vy13092002' );

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
define( 'AUTH_KEY',         'AFtL`gID*[Vf4**7nAGUY+zv@FksyF ~W0;j7CMnOQ3~kO&0,(!mqIf:_uRO,pF+' );
define( 'SECURE_AUTH_KEY',  'm4Zs^M2)7?OrAmk!YKVI4NHEs|K_x.[l9O+^UM>c]Q6NE,gx0*5jPi#>Rxvfo`Lg' );
define( 'LOGGED_IN_KEY',    'z#Zz<Wj9Hfm1Q`8RSX(De29aDwCqa`|o#HF9?zTl[~uRY;8K[,>{]QPL?eYtfvoR' );
define( 'NONCE_KEY',        'ao8t6j#><ABkzjX}W,ySc>l&mG9aU|Sz4lRwyKSB8clHL/oBDB)=T1#<PpYaL@N-' );
define( 'AUTH_SALT',        'vSU0^J9aYO*x+Non6R$m#)O4p3cqB+tI.8p9Y]n$R?N&z(qEFKTs!f<nnvt7h}PG' );
define( 'SECURE_AUTH_SALT', ')z2+FTbv_?cUrU_szoW@q0/9ztm_Uen$&7nZe{(`9ONM~.<Ksu$9w3MlPdAAoK9>' );
define( 'LOGGED_IN_SALT',   'T;2rue<s4BAWm&mV.qp~Aa*lzHLieZ_UWg.O.}pCeLcC,65^VX&<B%&H<9F?k?p:' );
define( 'NONCE_SALT',       'rK3,YLIPsMH;o5lj/Yo/xSE.0;W+,4~B](8 ~J;<6-w8w0TvH{bQ`+Doh@BU.n{[' );

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
