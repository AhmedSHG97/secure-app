<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Towy functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

$wpTheme = wp_get_theme();
define('TOWY_THEME_VERSION', $wpTheme->get( 'Version' ));
define('TOWY_THEME_URI', get_parent_theme_file_uri() );
define('TOWY_THEME_PATH', get_parent_theme_file_path() );

// You may request this 'REMOTE_DEMO_ID' value from this theme author to get a colorized demo content.
// See the Theme support service contacts information.19985673
define( 'TOWY_REMOTE_DEMO_ID', '');
define( 'TOWY_REMOTE_DEMO_VERSION', '1.3.0');

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once get_template_directory() . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once dirname( __FILE__ ) . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
}

add_action( 'tgmpa_register', 'towy_action_register_required_plugins' );


if ( ! function_exists( 'towy_action_register_required_plugins' ) ):
	/** @internal */
	function towy_action_register_required_plugins() {
		$plugins = array (
			array (
				'name'                  => esc_html__( 'Unyson', 'towy' ),
				'slug'                  => 'unyson',
				'required'              => true,
			),
			array (
				'name'                  => esc_html__( 'MailChimp', 'towy' ),
				'slug'                  => 'mailchimp-for-wp',
				'required'              => true,
			),
			array (
				'name'                  => esc_html__( 'RVM - Responsive Vector Maps', 'towy' ),
				'slug'                  => 'responsive-vector-maps',
				'required'              => true,
			),
			array (
				'name'                  => esc_html__( 'MWTemplates Theme Addons', 'towy' ),
				'slug'                  => 'mwt-addons',
				'source'                => esc_url( 'http://webdesign-finder.com/remote-demo-content/towy/plugins/mwt-addons.zip' ),
				'required'              => true,
				'version'               => '1.1',
			),
			array(
				'name'     				=> esc_html__( 'Instagram Feed', 'towy' ),
				'slug'     				=> 'instagram-feed',
				'required'              => true,
			),
			array(
				'name'     				=> esc_html__( 'User custom avatar', 'towy' ),
				'slug'     				=> 'wp-user-avatar',
				'required'              => true,
			),
			array(
				'name'     				=> esc_html__( 'AccessPress Social Counter', 'towy' ),
				'slug'     				=> 'accesspress-social-counter',
				'required'              => true
			),
			array(
				'name'     				=> esc_html__( 'Snazzy Maps', 'towy' ),
				'slug'     				=> 'snazzy-maps',
				'required'              => true,
			),
			array(
				'name'     				=> esc_html__( 'Widget CSS Classes', 'towy' ),
				'slug'     				=> 'widget-css-classes',
				'required'              => true,
			),
			array (
				'name'                  => esc_html__('Envato Market', 'towy'),
				'slug'                  => 'envato-market',
				'source'                => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
				'required'              => true, // please do not turn to false!
			),
            array(
                'name'     				=> esc_html__( 'Sass Compiler', 'towy' ),
                'slug'     				=> 'wp-scss',
                'required'              => true,
            ),
			array(
				'name'                  => esc_html__( 'Slider Revolution', 'towy' ),
				'slug'                  => 'rev-slider',
				'source'                => esc_url( 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/revslider.zip' ),
				'required'              => false,
			),
            array(
                'name'     				=> esc_html__( 'WooCommerce', 'towy' ),
                'slug'     				=> 'woocommerce',
                'required'              => true,
            ),
            array(
                'name'     				=> esc_html__( 'Classic Editor', 'towy' ),
                'slug'     				=> 'classic-editor',
                'required'              => true,
            ),
            array (
                'name'             => 'MWTemplates Theme Widgets',
                'slug'             => 'mwt-widgets',
				'source'           => esc_url( 'http://webdesign-finder.com/remote-demo-content/towy/plugins/mwt-widgets.zip'),
                'required'         => true,
                'version'          => '1.1',
            ),
			array (
                'name'             => 'MWTemplates Unyson Extensions',
                'slug'             => 'mwt-unyson-extensions',
				'source'           => esc_url( 'http://webdesign-finder.com/remote-demo-content/towy/plugins/mwt-unyson-extensions.zip'),
                'required'         => true,
                'version'          => '1.1',
            ),
		);
		$config = array(
			'domain'       => 'towy',
			'dismissable'  => false,
			'is_automatic' => false
		);
		tgmpa( $plugins, $config );
	}
endif;