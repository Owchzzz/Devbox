<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'I0-eDNn..gb[Sddp;C6VLOb G$>U#22|c!$Mz&/7aBXr.#+M^@Q,~=#W:.f-3CWp');
define('SECURE_AUTH_KEY',  '*E@+OVJ|y,>Uf(-Kv=*8b**#:e`(sfq-uWNN#Mo!z-k=OajS6&-PCiTc/>]+HjKj');
define('LOGGED_IN_KEY',    'B|ST/`fMa|,GC!<waPXaF,iS[DLs2(./!%Vf0p|}!%}U*56)T#3[{Agoecg|j9=Y');
define('NONCE_KEY',        'oqrkdmc_k H?n*8h,sKGm@|Vu:olG?cOUYdhJ:c6Sa|4Xx2!b*|7R`?Zf+:]JoB7');
define('AUTH_SALT',        's|bv;p+ 78-tdL[`,%z#oQXMc@7>8l#, +_1;[M`TMzV?|zi;ZBylrt61xEVaz@5');
define('SECURE_AUTH_SALT', 'wz;wv8[)#}/}72ID<29&gSS8TfTCWp$;-!_rF+.f:?}}N+Z|J.O((;%|uE*Csx^q');
define('LOGGED_IN_SALT',   'FM9zsFCUNE-Z=HXB4/ZNYg859|*nQrX!a]jZ2ap$-r*(&==AbI,2uU0nk8k7Txnm');
define('NONCE_SALT',       'e:+ q tK O/uPBL!=>Z8^_ D#(q6zG{&Hh?}G=OyaoOAU?1ZL*mXj#]A`.`3|8kf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
