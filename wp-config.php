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
define('DB_NAME', 'gromusic');

/** MySQL database username */
define('DB_USER', 'gromusic_user');

/** MySQL database password */
define('DB_PASSWORD', 'pAbYz8ZGsALVhl3D');

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
define('AUTH_KEY',         'K9!_rmR}FcpCT<52,X<$zq(FhO0-c>Adi8Dl2C&3cDi?7XG^F%}9T3{+xtq/EFO<');
define('SECURE_AUTH_KEY',  'YN[*FHtszP@lDwKy~;){>C&IeQgAJCvm+(>#)UA:{*P|kZ`Xcg*/FLIrWPtg>~-x');
define('LOGGED_IN_KEY',    ';0sxX`7p$cO?Uw{pCk0aZg+F_Ro*pr%]x&(}E`MU|7ke}3F8^pt*U]F/MBn&f27;');
define('NONCE_KEY',        'QckGTdhW7Xgny}mKUl7GqtPKc4z{*kyz&30O`rXazTiZDO`iMNnE ysw4dZ(TgG%');
define('AUTH_SALT',        'E?AES%$;U&G^b_jy8,Z0Lm86k5}y~!4PP6vgV3q+tbRp$iCV(|wpqD!24|Yogwos');
define('SECURE_AUTH_SALT', 'z3&!Mg<7VBO]:dix5KyUAvu[Yd-y:nHV6<%OZX:wFAR7MSu`n%,=$Kps:Rz0Tt@U');
define('LOGGED_IN_SALT',   'UC .T$;>gDmS0!^4+M=V9e#F2oG8rGL|qGCP%nLg4<3pLn*6kJ<`kA2P4X,5FV{h');
define('NONCE_SALT',       'RW#J!UveZ Q[~wEWDIvIJ8-b-0N`E@..!WY:,-GqugTwSu7+22>oDa_%/X3LcTZF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gromusicwp_';

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
