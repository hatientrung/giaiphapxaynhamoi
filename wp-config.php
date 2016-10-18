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
define('DB_NAME', 'master_01');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Wcl$JV$3!*OqZ~%Ckaf DRlV2&.LB<6a7.SD_6 ~gf60zs_g$bW>O|_`mDBOsp>u');
define('SECURE_AUTH_KEY',  '!7E8Y;@3RrV<lS|&W.5o19Dq+WX^LxuZ}!cFQ3@vpi:ywO=KtxY%r805|nF0Q0jo');
define('LOGGED_IN_KEY',    '2?}mVT_leNSBs|rTH;UDNsg|Aoh&.5Ep;UDUDR/Q@U$WQHs_ ;N{>IX%>FrQ46xp');
define('NONCE_KEY',        '4y.,@|@nc5}u56B&VNtYm:z,-! #-s%^c,):i3O$:/ec*5DfZbT,z.):UxkFD1IB');
define('AUTH_SALT',        '*JM|RHvi@.jOzA(vTaYp@CBEpTr)|EQCj0P*>p=P]H?ARas/r5}+8Obt ;p!1L+2');
define('SECURE_AUTH_SALT', '65@%kn<B?tcCzY`?(Fl!5Bj`*Iz~N?G7? ~KQmE!LmZIH9&F.5YY_qVxZ`f>?Xu*');
define('LOGGED_IN_SALT',   'Mt#37XjzhgJRb(3krJzUJTn3GE9X&kKD)L [2 |Z:phX.RK#rX<cHefml&1F7B%.');
define('NONCE_SALT',       '=:c%~&o_xGSTQ0U-cJw(OWZ/PDaS7YT%E+f3nO;U<8iO9:C~h$^*7UWjLQC$e)>w');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
