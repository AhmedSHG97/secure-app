<?php
/**
 * Requires the WP-SCSS plugin to be installed and activated.
 */


if ( ! function_exists( 'towy_get_theme_colors_defaults' ) ) :
	/**
	 * Return default values for uninitialized theme mods.
	 * https://make.wordpress.org/themes/tag/theme-mods-api/
	 */

	function towy_get_theme_colors_defaults() {
		$defaults = array(
			'color_1' => '#ffc326',
			'color_2' => '#e23751',
			'color_3' => '#ff9402',
		);
		return apply_filters( 'towy_theme_colors_defaults', $defaults );
	}
endif;

/* towy_set_color_palette */
if ( !function_exists( 'towy_set_color_palette' ) ) {
	function towy_set_color_palette() {
		$color_palette = towy_get_theme_colors_defaults();
		$array = array();
		foreach($color_palette as $val) {
			$array[] = $val;
		}
		return $array;
	}
} //towy_set_color_palette


if ( (!class_exists('Wp_Scss')) ) {
	return;
} else {
	/* Always recompile in the customizer */
	if ( is_customize_preview() && ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {
		define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
	}

	/* towy_scss_set_variables */
	if ( !function_exists( 'towy_scss_set_variables' ) ) :
		function towy_scss_set_variables() {
			/* Colors */
			$accent_color_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_1' ) : '';
			$accent_color_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_2' ) : '';
			$accent_color_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_3' ) : '';

			/* Variables */
			$variables = array(

				/* Theme color scheme */
				'mainColor'             =>  $accent_color_1,
				'mainColor2'            =>  $accent_color_2,
				'mainColor3'            =>  $accent_color_3
			);

			return $variables;
		}
	endif; //towy_scss_set_variables
	add_filter( 'wp_scss_variables', 'towy_scss_set_variables' );
}