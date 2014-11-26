<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dna_pain');

/** MySQL database username */
define('DB_USER', 'ac_dev');

/** MySQL database password */
define('DB_PASSWORD', 'ac_dev14');

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
define('AUTH_KEY',         'f{<OL|+#Zh5t-wB|~p0$0ypbJW./-R,i0K)7^+wP1F/>zCN146B-~K]M*H7[x-ZP');
define('SECURE_AUTH_KEY',  '/7V+c<oS`}E2smpu8bi++@1~>^p)L6,i|slrCFc6flCZC8+TBVUTEEPph~+tYpgN');
define('LOGGED_IN_KEY',    'hzc9xJz{RM~B2d*cw+h&njtXQF`>rXV*8MEC.ynVjiii:]x}r~52Oy,V`*Aud~aD');
define('NONCE_KEY',        'O* hh-t]C+:V}0ta?}@oB*]SdZX7:uxf^7_09<$!hOsD+n48P-IgO=Lwe-I,E8+D');
define('AUTH_SALT',        '!81|ERo%bc{fhm}@WY34X0V5Ofh|._}9D~Hk1~%Jx~=5o_~.05qYc{v;_@Fz|hfz');
define('SECURE_AUTH_SALT', '#=Q]z`Xm5F%%_l )(u*|NE?fuC{$ mT@I!6kwzMAmokBig ?V?CGt`WK%uhi|cM!');
define('LOGGED_IN_SALT',   '^12BLuJ3k</DG/x@Hy*H^1f-YQ|jHxi5mo.eCT-#9nAE8GP^^+O<p1ZE!]BNjW~P');
define('NONCE_SALT',       'LW+.bVP8q 7.6 |w<sv|+-pM[[]kh>#bSUG9%E{~v_!O+9A$PH%qj/~cxS?^+gp4');

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

define('WP_ENV', 'development');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
