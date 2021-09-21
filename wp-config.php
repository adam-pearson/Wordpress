<?php

/** Enable W3 Total Cache */

define( 'WP_CACHE', true ); // Added by W3 Total Cache




/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * MySQL settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', "adampear_wordpress_reflection" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'sEF9>}8G~-ey~xdSclMo#e6%R}Q`N$6M7*Yn#wy/9[T;H(w`-&yI&xYRv(}l/-``' );

define( 'SECURE_AUTH_KEY',  'nJja~F{o@DfoU+=U-Q?u2XO}=6v>k+^$3a}f9(&<I) @![YFIU`j..tt(XQRt6Aw' );

define( 'LOGGED_IN_KEY',    'z-MNH&]]_(4I;7!D;g@HNLtCX-v-SRYDv[Sp6BRIS; ;wvV9Jw~za-A5Ge-ns{},' );

define( 'NONCE_KEY',        '%>v!K?/]:EZr/8&O;eMHrl~%_sb YnV>DEn@s0N&5F,?qR%ehfj]]Ln$Ix&t.m3:' );

define( 'AUTH_SALT',        '/cDmsCyQs[Ef|Ncc<9wLT{n>FXUKu4x?uIz~@OT<~06Vos^JYLK.3ED4GMW]duwX' );

define( 'SECURE_AUTH_SALT', 'WTl66iAXCa<64,}vAx Us+c]v-jd6GRsr@riN>1tNu/Rx8}1=WuRaU!qP>]Osbit' );

define( 'LOGGED_IN_SALT',   'ZK8QWz&NQRk`?,jp]1c@uYsB|tH7`trtYS#=9:YpW<e,3-B0I.;_L{8[t@k6gV<N' );

define( 'NONCE_SALT',       'clpr|bMr;4|D7]aoVNgGzex~Z!pmQl7/qZDTMD`M}aojH=:VSH~|5|Lu)F5Kw0-Q' );


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


define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

