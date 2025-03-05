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
define( 'DB_NAME', 'yszcxy_com' );

/** Database username */
define( 'DB_USER', 'yszcxy_com' );

/** Database password */
define( 'DB_PASSWORD', 'Dbiyr6D8fd' );

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
define( 'AUTH_KEY',         'tq/B%Z!XQ4yP~|v^Z#t)*%>*`m~{IBT4G3/?Z6Z0b/,-c([}[,}[~JPE1v/{8:W1' );
define( 'SECURE_AUTH_KEY',  'bPL#E/@ZYOcw1:Q/q)zY[0axUu_Ne7q$dtjQ7urO#^78vn3IkdFYb={!8^<PCb]s' );
define( 'LOGGED_IN_KEY',    '?te07/0&*Q#;c-:uu#6j13%Z9RbN2>W<SaQ`pw`UW zFU]F|?%IqU4^E 5lT]0q&' );
define( 'NONCE_KEY',        'H`e%Iiomq`.1XXG+1O~#ZOAh-I%IL<g$~bnILUi2on4L)r/[dPEFWU?B26ayniF!' );
define( 'AUTH_SALT',        '(KR}Jzz|yEYigdvNYfqz1v3LI/C53xp,2n#fI`(h>8/}~L{zC)(#Ky3tp^E-4lBy' );
define( 'SECURE_AUTH_SALT', 'j-5 8ycCdNpFV2hh$p|.hX#5^s6t{64M&oE0/R0%kFp)2d=~0m0acQIYz&k#/McK' );
define( 'LOGGED_IN_SALT',   'vO8qw)wEd5bX=|6wBq@%*QW11TKlttUpG|TBY`,^S811Ek*A.iOz/vx(_* vQjo3' );
define( 'NONCE_SALT',       'Dpnld3vWVU8a3Rp3^>?N`2}y:v0^Y(t*FX}R=bN5a[S0KTV<w=U_wkX)~wo@qNN}' );

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
