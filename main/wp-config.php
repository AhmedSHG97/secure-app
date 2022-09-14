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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bennebostaxi_ds' );

/** Database username */
define( 'DB_USER', 'bennebostaxi_ds' );

/** Database password */
define( 'DB_PASSWORD', 'ybP-DS5!ms_[' );

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
define( 'AUTH_KEY',         'W|]&y@TPiMz}DZ?Un57xI|UC~4cw2$bGav(TjKP>9#2@+ZNZ$k `{SY*M`.fXEo+' );
define( 'SECURE_AUTH_KEY',  'dPlo$}JSOQ,N~t!9sIQSnQjsVB}LA!3MU,eS%_Z`6@t9ocC0}!S.bLSI>7(=pyy2' );
define( 'LOGGED_IN_KEY',    'Z?ad/9F=oHYA=.aVcIt&|o[6M{Olyyn]/q(~y_:lV3Vb7JiA8f]ws [OH?p@b&tr' );
define( 'NONCE_KEY',        's$|2!+_MZde%S}&r PU,PKRT^2[-.mhNocIPRBI}4+OGp;^& 3I9:R139#EtHhM[' );
define( 'AUTH_SALT',        ':Cz&CTbHt4>Z{uz/nWB]-v}pQ5[DzC,TZEAVa?uI#pOZ&E@5 $k|RuKH~TGiCrf,' );
define( 'SECURE_AUTH_SALT', '.oMYB37>6=}mwO#N1t(FU1A;oB4FOK:VOEC+1lt-3|#{VLQPi&H(]/$1DeH5}lK0' );
define( 'LOGGED_IN_SALT',   ':~4]y41XY<^gKO*D({*IREDIJ(3(eqCOZfg?Q/c3}./xPOH&#ory(-8?/;uOTwcz' );
define( 'NONCE_SALT',       'R8_.U%AKU!?|^fTAH%$=rMy*1d1*E&!x`;!,2XT<,p)nx/q(/Gm @eTu*Y}wZsRW' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
