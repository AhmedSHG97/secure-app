<?php
/*
Plugin Name: Modern Web Templates Unyson Extensions
Description: Additional extensions for Unyson plugin
Version:     1.1
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/

/**
 * @internal
 */
//shortcodes to plugin

define('MWT_EXTENSIONS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

if ( ! function_exists( '_filter_mwt_unyson_additional_shortcodes' ) ) :
	/**
	 * @internal
	 */
	function _filter_mwt_unyson_additional_shortcodes($locations) {
		$locations[ dirname(__FILE__) . '/extensions' ]
			=
			plugin_dir_url( __FILE__ ) . 'extensions';

		return $locations;
	}
endif; //_filter_mwt_unyson_additional_shortcodes
add_filter('fw_extensions_locations', '_filter_mwt_unyson_additional_shortcodes');