<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms' );

/** Database username */
define( 'DB_USER', 'cms' );

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
define( 'AUTH_KEY',         'WY,w[_)lV^ O..PB>I%(K$85ELo~iKM+at7:k|;47fO:0LZg-Bg;o1E9S,3D@pO]' );
define( 'SECURE_AUTH_KEY',  'buJ*i(N4P0 URJBjsic3simbb}1b#pEIz/ZW4bt/giN:KG,|-#WF?V.g+qKSHl6)' );
define( 'LOGGED_IN_KEY',    '<>E>QO<3LtiR)+<>A7Snj];/@Peqe?B0<.dDU<NjC]>vO<DteeJ*aT#ArCT.`PxY' );
define( 'NONCE_KEY',        '%~j*/+@ptEhXg%(r:Uc.,}0s.J^6!2y$hOMt%~MuxsM?>!g{|r*@=E1hs.V[pA(b' );
define( 'AUTH_SALT',        '(rTZ?BJ8MAu*S} GL2YS&`-xNTrVtAl>S<Z+f6typ3>;h*%wtFd[*%ea@/(+tG1/' );
define( 'SECURE_AUTH_SALT', '0iQ!|Zw?#@aC)Z6H)2Jw~]ep|hoAwD/p!C:E ;NUku,5g*oa{$%9@E20TLRO!0rw' );
define( 'LOGGED_IN_SALT',   'z;q_Z=7^yuy?z-2~V9!z*~wm_83ARu74xb*R-fTA*$|K`g&l@q+4Z[6}<+%~[`mx' );
define( 'NONCE_SALT',       '/J`S=N];XX>I-hh<:(L8geK{!&b4tNVp4el+o6y&<Yvz`G>T/WXSD]`=;4hx`?!J' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
