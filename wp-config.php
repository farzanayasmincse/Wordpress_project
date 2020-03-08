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
define('DB_NAME', 'wp');

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
define('AUTH_KEY',         'I/])G:<+j^*2s<HBYdDCr@DJEGrp ZM.`])l|G#SmQ8cJ:UX{4u>,:w*|j!@qkyX');
define('SECURE_AUTH_KEY',  'b]0|8X3V=uup+23N2PBtY`!e(?ZRP-=SNL[J7HQb6s=cx9-DLXt)5>0Y-<rFCkYZ');
define('LOGGED_IN_KEY',    'VuH5o*J6Hqi4Vliq<={eMfi,r^.p&p5n.WL%6WwC|UFI01-$nzybK!rruuD?|t41');
define('NONCE_KEY',        'vUG9b,<@pHtaDU;=^:~))Ly4ply|={Hg_o:u%RP F=4__gniS%ip>/m1}VVKUO`d');
define('AUTH_SALT',        'BIu9-t@(p<KMZs^vw~4tP/`C-tr^6_)EflwwnR/#-IY&$tGi*zG ^E 9b#-j75n}');
define('SECURE_AUTH_SALT', 'V3zqBE?eRa;lA]@YuCT.>g3@EP3=@X9M,8QrrD.#;GZ;SCB[A54OY:da4b]{>(;z');
define('LOGGED_IN_SALT',   '[nnCBJmAy?[-vEh5uwGPxD7l_Q,p23ItA2U):j&Mbd2_zM@ZY)X8Zga?a!Bt>.5X');
define('NONCE_SALT',       '9F9/6/!JD:FZOgU7AlFlAmP[,hPMeSCskT[t%L:>2}U6FSfuA98v2#s-d8[$6 `.');

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
