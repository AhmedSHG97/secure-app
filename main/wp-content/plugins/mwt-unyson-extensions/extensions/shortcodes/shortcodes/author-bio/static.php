<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script(
	'fw-shortcode-theme-author-bio-nousewheel',
	MWT_EXTENSIONS_PLUGIN_PATH . 'extensions/shortcodes/shortcodes/author-bio/static/jquery.mousewheel.min.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);

wp_enqueue_script(
	'fw-shortcode-theme-author-bio',
	MWT_EXTENSIONS_PLUGIN_PATH . 'extensions/shortcodes/shortcodes/author-bio/static/scripts.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);