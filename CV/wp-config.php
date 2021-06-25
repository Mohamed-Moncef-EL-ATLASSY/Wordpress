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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cv-wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'irU|(:F9O$<TcpV&i~w0lk,6oIa5$Fcy)OolA&71 ykV2<Y==$o#<_fAUeD6/b$H' );
define( 'SECURE_AUTH_KEY',  'H@SXk9`r[yV%aCr4c!$D}308OkCBup!+6OAZ7g@$^r$6[@P_5;4x{_S-*vq;VfC&' );
define( 'LOGGED_IN_KEY',    'aq~AXp<]#3.x>yn(YcF<J!5,7`!OG<2rk/OR7kMhI+|#DO]m18!^W0Df/YP0L{km' );
define( 'NONCE_KEY',        ' nhA}ER~N`V`gx$*!ph!ZwzxCEd=jXV16=3lqQUcw8cc.`Vww?V1&<QwLWj[4T@1' );
define( 'AUTH_SALT',        'wwp|q+!!nzSXC[O~Q@NUaQ3J 8)zo.0o5_+>aM{F]<W-Y}{Sek[IF.7N`dKw6Ojd' );
define( 'SECURE_AUTH_SALT', 'lARwEWw)MUM1Z4uLJWkMn0*I0e|Xu2QC8!MV8cNzx}jNjEUeRM}C;?eS{ ?Dq,R]' );
define( 'LOGGED_IN_SALT',   'Y+g_CRSDDpzV=q(Ia 75,71-6gta|MHeR,Gnu+u0l1Pugob_(nr[D@`U:^I.#5Ux' );
define( 'NONCE_SALT',       '{/fG6wc<Ea,sf /eFukV~lE&gGTSU.uYp8ItAgHm<7A1,n:^_72dk&Ogl`QXdLDY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
// define( 'WP_DEBUG', false );

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
