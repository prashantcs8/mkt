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
define('DB_NAME', 'mkt');

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
define('AUTH_KEY',         'B0`bgo{,fFM>,h{o[*H%el$us>5:F`J`DrMsy53(BSS)%Mfv*!R*9QnMz]7EN(uy');
define('SECURE_AUTH_KEY',  'k)zWh,n8:m`N&CO )/?09*Si=Ey2^1#9wT=}(}F8@=1WTzjD^R?!,W y%l)@e<Ji');
define('LOGGED_IN_KEY',    '#(%4zlRW- *oEddR/f:K?AtCI%?Ow4c{,]5O!v{3}X#pa[[qRuTekIYPyo_|x*B{');
define('NONCE_KEY',        'P0eK0quYA%PVQ.(x71%5agPUS<,`BcDAQ^`U3?u~if,FR@YY5n4=;XKy1W.wlEl*');
define('AUTH_SALT',        '.EZ:-)cWepO|/AttVAVfF3{wUVo%ACkj+ZTjFxP,d,M?Yce}(oO$^N<y0j`2x du');
define('SECURE_AUTH_SALT', '{C4+u@%D]=&3}DeNK[|oNk=;RuM/5hUL&i3X6j@s%#&R GI=d}g!VUCpk|WBnqv]');
define('LOGGED_IN_SALT',   '0Ja~6c7}6>2SpwXEJPK3Sl=7dYbg?xQm~WFW+ RXu>1[5d=r.]>| KE5RXO$&bBo');
define('NONCE_SALT',       '/nD26KzU/CQ0zH&Cc+puHGq~7Mm5? p<o>KblobV>GGfy,y6@w&KkH!4?h7xKbE_');

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
