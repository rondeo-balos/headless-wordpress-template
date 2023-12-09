<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'headless' );

/** Database username */
define( 'DB_USER', 'username' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '!hZ>zo>.,f4edln3IvuXr=IM%<aKj{M>wQfhv>{@`LVm|ZQJKhpq>S]Z6l@a}|W-' );
define( 'SECURE_AUTH_KEY',  '`,YX;8H*xuM|Vu7[HO])^G2W}!g^gU5:xNOu-e~S6uKG,|T4WhQkuxM*!~rR9Q _' );
define( 'LOGGED_IN_KEY',    'v1pi Q:Rbb+R:RP=p>LmlbdR1Vv)D*@UcV8]wg),N^%6POFrQKI#^ov,ifYHUy8H' );
define( 'NONCE_KEY',        'wmn,ONL#j$R6RFe7]:2%lG`:OG~7dTB 58~|dM*ph~X[O,.,#GqU>Vs}Lwnh4%5s' );
define( 'AUTH_SALT',        '1,C9L 00rf5|#G3rlruXAvnUs3 ,W&:PH^Iv;No/`W*Sb=%y(w^IK9C*7p-lPA!A' );
define( 'SECURE_AUTH_SALT', '(Dm?b%[ecwmc].`6OqXI965OT3z`vkqPdA;M-j$2w{f4L!mC_q%||.RGxEbD+j0x' );
define( 'LOGGED_IN_SALT',   '&fgmk}U/]vX;.DHDAw7 L0G~1&E.;uOf:zsap0p&7rq;!(6*kceQ8ep._a?K{q53' );
define( 'NONCE_SALT',       '&,|O-P0yLucDgVb1 6?vcT>WF3eojfQ:^L1zkZoMh@~BX.s$JwB_ScRTnZ5VV-%~' );

define('JWT_AUTH_SECRET_KEY', '`,YX;8H*xuM|Vu7[HO])^G2W}!g^gU5:xNOu-e~S6uKG,|T4WhQkuxM*!~rR9Q _');
define('JWT_AUTH_CORS_ENABLE', true);
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hd_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
