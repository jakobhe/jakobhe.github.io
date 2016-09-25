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
define('DB_NAME', 'whoneedslaw-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '1+QC8A/v:yx=fVI1l<N(LqJ%^u#HAfkxWC<,oAq__UxY=E^4gm}mG(8:SH?DvyBl');
define('SECURE_AUTH_KEY',  'naSs^ml0?#!<Ixw*<Ye~NL&8LE@cV.Lon<z5=h&^z`wGE9v2Ap:/Q{ETA6-uHeb?');
define('LOGGED_IN_KEY',    '}<5ahC9 k<m+T}f:>GVc^ce2m OmD%tPa*TCKXb@dE M+}%./EY;V1Y~7YzzWiz:');
define('NONCE_KEY',        '<#`6;8]r^W>:igA<vs$CqkfPP0p ^s5gZ%:b-?w[}>/f?:lJq[Ef;TP=X-L2aO;Z');
define('AUTH_SALT',        'y7L3n$Edh]qBNYTu^myB|A/-0?u3A[<l$=a1I2u(CBf?J@A?2;zyEmy6pI3dd#lT');
define('SECURE_AUTH_SALT', 'UVRZu6)f{`<e/3)zN>/}$WyICFBqZPSZY_b1T&*X`r^(P7xAnx#3>#0xT*^=N1@+');
define('LOGGED_IN_SALT',   '2iC..Ux&!RRqZJ>eKLo3xcIo|jmGU?z)!#Ya!MiPOWQ`+$[gkTv|x>^GNdsWf[*+');
define('NONCE_SALT',       '(0Z@/N+~Nwe+k6O14=v>mK-CJEjx&$Ir?0=O4n=6^xfv8yNhij9k`|I]V?5^*~E3');

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
