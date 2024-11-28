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
define( 'DB_NAME', 'akhraz' );

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
define( 'AUTH_KEY',         '(%Zr3OVB6B#M7z-J!de@V!%Lwc%U@kb{<XGAWwpg]{4_ny0i^x1sd*~<LzH0!O>a' );
define( 'SECURE_AUTH_KEY',  'R,rs+.gIfz):wv3.y%07)En6L+GHw?-?]vpugFR;ceQ]]7i:(+e |Zfy*#<dz0Hz' );
define( 'LOGGED_IN_KEY',    'bx3w1s#~0nsP%jZkje.Sct[[(J2.si|}+Id`act5ENow}V}ExAUDo?iOjHw!mD4r' );
define( 'NONCE_KEY',        'whvZbhbXeMLQV>NKx)#9/c9=1re:+IR<T0*[6VD^7)Um.{7:(v/?>mm#Ot#dAfn.' );
define( 'AUTH_SALT',        '1fv8/;%$>_3a6ilg`ne7: `&:5$)026COJzLXfjr9oKkNd5soJ}ZPgyTIu+!`OzP' );
define( 'SECURE_AUTH_SALT', '5*n0[^1w|k4NBmb?X!u0GX$`Xe>&r0dl4=|SqW9RNv#~Y&:m5jMRBbvr2dmdCXB<' );
define( 'LOGGED_IN_SALT',   'F|2G+~CY]$fg1Loz_i< !PsFMJHZ}dAc*L)3qpOOOLXqiUcS(j:2`HdHY:VY*-d$' );
define( 'NONCE_SALT',       '17<y<.cr)?!nhGwi1sh,iW|Dc!gu>)SB{]m,ZT+e n.5=TMZoR8WI>,!_nV2xU7>' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
