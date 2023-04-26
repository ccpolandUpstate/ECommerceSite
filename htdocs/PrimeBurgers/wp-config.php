<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'I#5ysb|xKNO6Fkn>Ti $,R{^lQc<&YeANQ]&gp]RC+}WqiGWs~Bb%]0P:JP1-6^[' );
define( 'SECURE_AUTH_KEY',  'nE$jCHMK[,bGLJD-wG)0202h;sMnwKI2mp?RF*L@|1H`lI8&Alp._da}EwYyR)B&' );
define( 'LOGGED_IN_KEY',    'H.r/7N>e}+ylrfE!9v}dm<r:7[pS0[m^5l_H.#twbH0p:y~a|nC[qwkuF!NHK.!|' );
define( 'NONCE_KEY',        '$gRlTOg&0-.Zv=6dh8uj&aLe,{Vu|`Sw?>9;fF7i/4~G|/;Yjb7~Q9IX33Xi4KhQ' );
define( 'AUTH_SALT',        'ZnBRSaC>r%(d^9?;`_=<W@LH0hK/&J5!_~ys p:|~M79,VJkXM[bs,!Kae*(VN!#' );
define( 'SECURE_AUTH_SALT', 'vPY 3*}{r&/g:GX5]L*rBu<[Wy:Mtas5R%!}DkGwzVrV+AZCNitO#-w+fud55`Q)' );
define( 'LOGGED_IN_SALT',   '0nMJ5 6=-HuysP @UeS*y0-Vc=M@m6D#rW`@O;CV,O!ED6ykN-?d;B6g]>bN&Z~c' );
define( 'NONCE_SALT',       'O+o{}A>:F1}xp$)rH!psBa<,~xVYn-]lLQ2QVSqAtF;KC9AXzM;32a}SMk[lkRft' );

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
