<?php
/**
 * The Sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    esc_html_e( 'Please add a widgets to Main Widget Area', 'towy' );
}

if ( function_exists( 'fw_ext_sidebars_show' ) ) {
	if ( fw_ext_sidebars_show( 'blue' ) ) {
		echo fw_ext_sidebars_show( 'blue' );
	} else {
		dynamic_sidebar( 'sidebar-main' );
	}
} else {
	dynamic_sidebar( 'sidebar-main' );
}