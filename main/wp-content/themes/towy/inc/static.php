<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'towy-icon-fonts',
	get_template_directory_uri() . '/css/fonts.css',
	array(),
    TOWY_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'towy-admin_bar',
		get_template_directory_uri() . '/css/admin-frontend.css',
		array(),
        TOWY_THEME_VERSION
	);
	wp_enqueue_style( 'towy-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'towy-font',
	towy_google_font_url(),
	array(),
    TOWY_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'towy-keyboard-image-navigation',
		get_template_directory_uri() . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
        TOWY_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'towy-modernizr',
	get_template_directory_uri() . '/js/vendor/modernizr-custom.js',
	false,
	'3.6.0',
	false
);

//plugins theme script
//replacing one compressed script with uncompressed versions - new theme requirements
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar', get_template_directory_uri() . '/js/vendor/bootstrap-progressbar.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'jflickrfeed', get_template_directory_uri() . '/js/vendor/jflickrfeed.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'appear', get_template_directory_uri() . '/js/vendor/jquery.appear.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/vendor/jquery.cookie.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/vendor/jquery.countdown.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'countTo', get_template_directory_uri() . '/js/vendor/jquery.countTo.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/vendor/jquery.easing.1.3.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'easypiechart', get_template_directory_uri() . '/js/vendor/jquery.easypiechart.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'elevateZoom', get_template_directory_uri() . '/js/vendor/jquery.elevateZoom-3.0.8.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/js/vendor/jquery.hoverIntent.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'localscroll', get_template_directory_uri() . '/js/vendor/jquery.localscroll-min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/vendor/jquery.parallax-1.1.3.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'plugin', get_template_directory_uri() . '/js/vendor/jquery.plugin.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/vendor/jquery.prettyPhoto.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'scrollbar', get_template_directory_uri() . '/js/vendor/jquery.scrollbar.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/js/vendor/jquery.scrollTo-min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'totop', get_template_directory_uri() . '/js/vendor/jquery.ui.totop.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'ui', get_template_directory_uri() . '/js/vendor/jquery-ui.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'price-slider', get_template_directory_uri() . '/js/vendor/price-slider.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/vendor/respond.min.js', array( 'jquery' ), TOWY_THEME_VERSION, true );
wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/vendor/superfish.js', array( 'jquery' ), TOWY_THEME_VERSION, true );

//custom plugins theme script
wp_enqueue_script(
	'towy-plugins',
	get_template_directory_uri() . '/js/plugins.js',
	array( 'jquery' ),
    TOWY_THEME_VERSION,
	true
);

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
    wp_dequeue_script( 'prettyPhoto-init' );
    wp_deregister_style( 'woocommerce_prettyPhoto_css' );

    // Add Theme Woo Styles and Scripts
    wp_enqueue_style(
        'towy-woo',
        TOWY_THEME_URI . '/css/woo.css',
        array(),
        TOWY_THEME_VERSION
    );

    wp_enqueue_script(
        'towy-woo',
        TOWY_THEME_URI . '/js/woo.js',
        array( 'jquery' ),
        TOWY_THEME_VERSION,
        true
    );
endif; //WooCommerce

//main theme script
wp_enqueue_script(
	'towy-main',
	get_template_directory_uri() . '/js/main.js',
	array( 'jquery' ),
    TOWY_THEME_VERSION,
	true
);

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'fontawesome-css' );
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'towy-accesspress',
		get_template_directory_uri() . '/css/accesspress.css',
		array(),
        TOWY_THEME_VERSION
	);
endif; //AccessPress

// Add Theme stylesheet.
wp_enqueue_style( 'towy-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'bootstrap',
	get_template_directory_uri() . '/css/bootstrap.min.css',
	array(),
    TOWY_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'towy-animations',
	get_template_directory_uri() . '/css/animations.css',
	array(),
    TOWY_THEME_VERSION
);

// Add Theme Style
wp_enqueue_style(
	'towy-main',
	get_template_directory_uri() . '/css/main.css',
	array(),
    TOWY_THEME_VERSION
);
wp_add_inline_style( 'towy-main', towy_add_font_styles_in_head() );