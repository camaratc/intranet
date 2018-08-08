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
/**   The name of the database for WordPress */
define('DB_NAME', 'intranet');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'b7bfd5a1ea6d08451686f262fbe52ad501d23487');
define('SECURE_AUTH_KEY',  'bf18ba9d46233e3985554670149849053e103a78');
define('LOGGED_IN_KEY',    '2f97093306cf2f510acb9054b7628e3de2c1dab8');
define('NONCE_KEY',        '05ec2d225f20da54efc89ec5a461982691f9d0f8');
define('AUTH_SALT',        '11e6f5064c1b63f2263a5d30e1d3193960d70050');
define('SECURE_AUTH_SALT', '9147a3b528b3391d38397e559bed85954574970e');
define('LOGGED_IN_SALT',   '58f80be98681c06852c804983000403427b7868d');
define('NONCE_SALT',       '1c880964485ed8f25090275cc0529d361c49ac5f');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Editado manualmente ==============================

error_reporting(E_ALL);
ini_set('display_errors', 1);

// require_once "db.php";
// $db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
