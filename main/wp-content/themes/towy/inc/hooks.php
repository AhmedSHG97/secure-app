<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'towy_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function towy_action_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'towy', get_template_directory() . '/languages' );

		add_editor_style( array( 'css/main.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		set_post_thumbnail_size( 775, 517, true );
		add_image_size( 'towy-full-width', 1170, 780, true );
		add_image_size( 'towy-small-width', 600, 795, true );
		add_image_size( 'towy-square', 600, 600, true );
		add_image_size( 'towy-rectangular', 1170, 600, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'towy_filter_content_width', 891 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );

        // Declare WooCommerce support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

	} //towy_action_setup()

endif;
add_action( 'after_setup_theme', 'towy_action_setup' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'towy_filter_body_classes' ) ) :
	function towy_filter_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}

		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}

		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
			     || empty( $current_position )
			     || is_page_template( 'page-templates/full-width.php' )
			     || is_attachment()
			) {
				$classes[] = 'full-width';
			}
		} else {
			$classes[] = 'full-width';
		}

		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if (defined( 'FW' ) && fw_get_db_post_option( get_the_ID(), 'slider_shortcode', false )) {
			$classes[] = 'with-slider';
		}

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}

		return $classes;
	} //towy_filter_body_classes()
endif;
add_filter( 'body_class', 'towy_filter_body_classes' );

//changing default comment form
if ( ! function_exists( 'towy_filter_towy_contact_form_fields' ) ) :
	function towy_filter_towy_contact_form_fields( $fields ) {
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$html_req      = ( $req ? " required='required'" : '' );
		$html5         = 'html5';
		$fields        = array(
			'author'        => '<div class="col-sm-4"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'towy' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Full Name', 'towy' ) . '"></p></div>',
			'email'         => '<div class="col-sm-4"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'towy' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Email Address', 'towy' ) . '"/></p></div>',
			'phone'        => '<div class="col-sm-4"><p class="comment-form-phone">' . '<label for="phone">' . esc_html__( 'Phone Number', 'towy' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="phone" class="form-control" name="phone" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Phone Number', 'towy' ) . '"></p></div>',
			'comment_field' => '<div class="col-sm-12"><p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'towy' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="8"  aria-required="true" required="required"  placeholder="' . esc_html__( 'Comment', 'towy' ) . '"></textarea></p></div>',
		);

		return $fields;
	} //towy_filter_towy_contact_form_fields()

endif;
add_filter( 'comment_form_default_fields', 'towy_filter_towy_contact_form_fields' );


//changing gallery thumbnail size for entry-thumbnail display
if ( ! function_exists( 'towy_filter_fw_shortcode_atts_gallery' ) ) :
	function towy_filter_fw_shortcode_atts_gallery( $out, $pairs, $atts ) {
		$out['size'] = 'post-thumbnail';
		return $out;
	} //towy_filter_fw_shortcode_atts_gallery()
endif;

if ( ! function_exists( 'towy_shortcode_atts_gallery_trigger' ) ) :
	function towy_shortcode_atts_gallery_trigger( $add_filter = true ) {
		if ( $add_filter ) {
			add_filter( 'shortcode_atts_gallery', 'towy_filter_fw_shortcode_atts_gallery', 10, 3 );
		} else {
			false;
		}
	} //towy_shortcode_atts_gallery_trigger()
endif;

//changing events slug
if ( ! function_exists( 'towy_filter_fw_ext_events_post_slug' ) ) :
	function towy_filter_fw_ext_events_post_slug( $slug ) {
		return 'event';
	} //towy_filter_fw_ext_events_post_slug()
endif;
add_filter( 'fw_ext_events_post_slug', 'towy_filter_fw_ext_events_post_slug' );

if ( ! function_exists( 'towy_filter_fw_ext_events_taxonomy_slug' ) ) :
	function towy_filter_fw_ext_events_taxonomy_slug( $slug ) {
		return 'events';
	} //towy_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'towy_filter_fw_ext_events_taxonomy_slug' );

//wrapping in a span categories and archives items count
if ( !function_exists('towy_filter_add_span_to_arhcive_widget_count') ) :
	function towy_filter_add_span_to_arhcive_widget_count( $links ) {
		//for categories widget
		$links = str_replace( '</a> (', '</a> <span class="highlight">(', $links );
		//for archive widget
		$links = str_replace( '&nbsp;(', '</a> <span class="highlight">(', $links );
		$links = preg_replace( '/([0-9]+)\)/', '$1)</span>', $links );

		return $links;
	} //towy_filter_add_span_to_arhcive_widget_count()
endif;

//categories
add_filter( 'wp_list_categories', 'towy_filter_add_span_to_arhcive_widget_count' );
//arhcive
add_filter( 'get_archives_link', 'towy_filter_add_span_to_arhcive_widget_count' );


if ( !function_exists( 'towy_filter_monster_widget_text' ) ) :
	function towy_filter_monster_widget_text( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing" class="form-control"', $text );

		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'towy_filter_monster_widget_text' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'towy_filter_post_classes' ) ) :
	function towy_filter_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //towy_filter_post_classes()
endif;
add_filter( 'post_class', 'towy_filter_post_classes' );


/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'towy_filter_password_form' ) ) :
	function towy_filter_password_form( $html ) {
		$label = esc_html__( 'Password', 'towy' );
		$html  = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . esc_html( $label ) . '"', $html );
		$html  = str_replace( 'input type="submit"', 'input class="theme_button" type="submit"', $html );

		return $html;
	} //towy_filter_password_form()
endif;
add_filter( 'the_password_form', 'towy_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'towy_filter_gallery_post_style_owl') ) :
	function towy_filter_gallery_post_style_owl( $gallery_html ) {
		if ( $gallery_html && ! is_admin() ) {
			$gallery_html = str_replace( 'gallery ', 'isotope_container ', $gallery_html );
			//if page is current
		}

		return $gallery_html;
	} //towy_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'towy_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in towy_categorized_blog.
 * @internal
 */
if ( !function_exists( 'towy_action_category_transient_flusher' ) ) :
	function towy_action_category_transient_flusher() {
		delete_transient( 'towy_category_count' );
	} //towy_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'towy_action_category_transient_flusher' );
add_action( 'save_post', 'towy_action_category_transient_flusher' );


/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'towy_action_widgets_init' ) ) :
	function towy_action_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Widget Area', 'towy' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );



		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'towy' ),
			'id'            => 'sidebar-footer-1',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'towy' ),
			'id'            => 'sidebar-footer-2',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'towy' ),
			'id'            => 'sidebar-footer-3',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 4', 'towy' ),
			'id'            => 'sidebar-footer-4',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Before Blog Widget Area', 'towy' ),
			'id'            => 'before-blog-sidebar',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'towy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	} //towy_action_widgets_init()
endif;
add_action( 'widgets_init', 'towy_action_widgets_init' );

if ( ! function_exists( 'towy_kses_list' ) ) :
	/**
	 * Initiates allowed tags array for wp_kses functions
	 */
	function towy_kses_list() {

		$allowed_atts = array(
			'align'       => true,
			'aria-hidden' => true,
			'class'       => true,
			'clear'       => true,
			'dir'         => true,
			'id'          => true,
			'lang'        => true,
			'name'        => true,
			'style'       => true,
			'title'       => true,
			'xml:lang'    => true,
			'data-locations'    => true,
			'data-map-type'    => true,
			'data-map-pin'    => true,
			'draggable'    => true,
		);

		$kses_list = array(
			'address'    => $allowed_atts,
			'a'          => array(
				                'href'         => true,
				                'rel'          => true,
				                'rev'          => true,
				                'target'       => true,
				                'data-content' => true,
			                ) + $allowed_atts,
			'abbr'       => $allowed_atts,
			'acronym'    => $allowed_atts,
			'area'       => array(
				                'alt'    => true,
				                'coords' => true,
				                'href'   => true,
				                'nohref' => true,
				                'shape'  => true,
				                'target' => true,
			                ) + $allowed_atts,
			'aside'      => $allowed_atts,
			'b'          => $allowed_atts,
			'bdo'        => $allowed_atts,
			'big'        => $allowed_atts,
			'blockquote' => array(
				                'cite' => true,
			                ) + $allowed_atts,
			'br'         => $allowed_atts,
			'cite'       => $allowed_atts,
			'code'       => $allowed_atts,
			'del'        => array(
				                'datetime' => true,
			                ) + $allowed_atts,
			'dd'         => $allowed_atts,
			'dfn'        => $allowed_atts,
			'details'    => array(
				                'open' => true,
			                ) + $allowed_atts,
			'div'        => $allowed_atts,
			'dl'         => $allowed_atts,
			'dt'         => $allowed_atts,
			'em'         => $allowed_atts,
			'h1'         => $allowed_atts,
			'h2'         => $allowed_atts,
			'h3'         => $allowed_atts,
			'h4'         => $allowed_atts,
			'h5'         => $allowed_atts,
			'h6'         => $allowed_atts,
			'hr'         => array(
				                'noshade' => true,
				                'size'    => true,
				                'width'   => true,
			                ) + $allowed_atts,
			'i'          => $allowed_atts,
			'iframe'  => array(
				             'width' => true,
				             'height' => true,
				             'src' => true,
			             ) +$allowed_atts,
			'img'        => array(
				                'alt'      => true,
				                'border'   => true,
				                'height'   => true,
				                'hspace'   => true,
				                'longdesc' => true,
				                'vspace'   => true,
				                'src'      => true,
				                'usemap'   => true,
				                'width'    => true,
			                ) + $allowed_atts,
			'ins'        => array(
				                'datetime' => true,
				                'cite'     => true,
			                ) + $allowed_atts,
			'kbd'        => $allowed_atts,
			'li'         => array(
				                'value' => true,
			                ) + $allowed_atts,
			'map'        => $allowed_atts,
			'mark'       => $allowed_atts,
			'p'          => $allowed_atts,
			'pre'        => array(
				                'width' => true,
			                ) + $allowed_atts,
			'q'          => array(
				                'cite' => true,
			                ) + $allowed_atts,
			's'          => $allowed_atts,
			'samp'       => $allowed_atts,
			'span'       => $allowed_atts,
			'small'      => $allowed_atts,
			'strike'     => $allowed_atts,
			'strong'     => $allowed_atts,
			'sub'        => $allowed_atts,
			'summary'    => $allowed_atts,
			'sup'        => $allowed_atts,
			'time'       => array(
				                'datetime' => true,
			                ) + $allowed_atts,
			'tt'         => $allowed_atts,
			'u'          => $allowed_atts,
			'ul'         => array(
				                'type' => true,
			                ) + $allowed_atts,
			'ol'         => array(
				                'start'    => true,
				                'type'     => true,
				                'reversed' => true,
			                ) + $allowed_atts,
			'label'      => array(
				                'for'         => true,
				                'type'        => true,
				                'style'        => true,
				                'value'       => true,
				                'required'    => true,
				                'placeholder' => true,
			                ) + $allowed_atts,
			'form'      => array(
				               'action'                 => true,
				               'method'                 => true,
				               'data-fw-ext-forms-type' => true,
				               'data-fw-form-id' => true,
			               ) + $allowed_atts,
			'input'      => array(
				                'for'         => true,
				                'type'        => true,
				                'value'       => true,
				                'required'    => true,
				                'placeholder' => true,
				                'data-constraint' => true,
			                ) + $allowed_atts,
			'textarea'   => array(
				                'for'         => true,
				                'type'        => true,
				                'value'       => true,
				                'required'    => true,
				                'placeholder' => true,
			                ) + $allowed_atts,
            'select'     => $allowed_atts,
            'option'     => array(
                                'value'       => true,
                                'disabled'    => true,
                            ) + $allowed_atts,
			'var'        => $allowed_atts,
		);

		return $kses_list;
	}
endif;

/**
 * Processing google fonts customizer options
 */

if ( ! function_exists( 'towy_action_process_google_fonts' ) ) :
	function towy_action_process_google_fonts() {
		$google_fonts        = fw_get_google_fonts();
		$include_from_google = array();

		$font_body     = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );

		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}

		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}

		$google_fonts_links = towy_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'towy_google_fonts_link', $google_fonts_links );
	} //towy_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'towy_action_process_google_fonts', 999, 2 );

if ( ! function_exists( 'towy_get_remote_fonts' ) ) :
	function towy_get_remote_fonts( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "<link href='http://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}

		$html = substr( $html, 0, - 1 );
		$html .= "' rel='stylesheet' type='text/css'>";

		return $html;
	} //towy_get_remote_fonts()
endif;

//admin dashboard styles and scripts
if ( ! function_exists( 'towy_action_load_custom_wp_admin_style' ) ) :
	function towy_action_load_custom_wp_admin_style() {
		wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
		wp_enqueue_style( 'custom_wp_admin_css' );

		wp_register_style( 'custom_wp_admin_fonts', get_template_directory_uri() . '/css/fonts.css', false, '1.0.0' );
		wp_enqueue_style( 'custom_wp_admin_fonts' );

		wp_enqueue_script(
			'towy-dashboard-widget-script',
			get_template_directory_uri() . '/js/dashboard-widget-script.js',
			array( 'jquery' ),
			'1.0',
			false
		);
	} //towy_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'towy_action_load_custom_wp_admin_style' );


// removing woo styles
// Remove each style one by one
if ( !function_exists('towy_filter_towy_dequeue_styles')) :
    function towy_filter_towy_dequeue_styles( $enqueue_styles ) {
        unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
        unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
        unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
        return $enqueue_styles;
    } //towy_filter_towy_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


//if Unyson installed - managing main slider and contact form scripts, sidebars
if ( defined( 'FW' ) ):
	//display main slider
	if ( ! function_exists( 'towy_action_slider' ) ):

		function towy_action_slider() {

            if( is_search() ) { return; }

            if ( function_exists( 'fw_get_db_post_option' ) ) { ?>

                <section class="page_mainslider"><?php

                    echo do_shortcode( fw_get_db_post_option( get_the_ID(), 'slider_shortcode', false ) ); ?>

                </section><?php
            }
		}

		add_action( 'towy_slider', 'towy_action_slider' );

	endif;

	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'towy_action_display_form_errors' ) ):
		function towy_action_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'towy-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'towy-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'towy_action_display_form_errors' );


	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'towy_filter_disable_sliders' ) ) :
		function towy_filter_disable_sliders( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}

			return $sliders;
		}
	endif;

	add_filter( 'fw_ext_slider_activated', 'towy_filter_disable_sliders' );

	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'towy_slider_population_method_custom_options' ) ) :
		function towy_slider_population_method_custom_options( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);

			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'towy_slider_population_method_custom_options' );


	//theme icon fonts
	if ( ! function_exists( 'towy_filter_custom_packs_list' ) ) :
		function towy_filter_custom_packs_list($current_packs) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array('towy_icons', 'font-awesome');
		}
	endif;
	add_filter('fw:option_type:icon-v2:filter_packs', 'towy_filter_custom_packs_list');

	if ( ! function_exists( 'towy_filter_add_my_icon_pack' ) ) :
		function towy_filter_add_my_icon_pack($default_packs) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
				'towy_icons' => array(
					'name'             => 'towy_icons', // same as key
					'title'            => esc_html__( 'Towy Icons', 'towy' ),
					'css_class_prefix' => 'rt-icon2',
					'css_file'         => get_template_directory() . '/css/fonts.css',
					'css_file_uri'     => get_template_directory_uri() . '/css/fonts.css',
				)
			);
		}
	endif;
	add_filter('fw:option_type:icon-v2:packs', 'towy_filter_add_my_icon_pack');

    //adding custom sidebar for shop page if WooCommerce active
    if ( class_exists( 'WooCommerce' ) ) :
        if ( !function_exists( 'towy_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
            function towy_filter_fw_ext_sidebars_add_conditional_tag($conditional_tags) {
                $conditional_tags['is_archive_page_slug'] = array(
                    'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
                    'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
                    'name' => esc_html__('Products Type - Shop', 'towy'), // conditional tag title
                    'conditional_tag' => array(
                        'callback' => 'is_shop', // existing callback
                        'params' => array('products') //parameters for callback
                    )
                );

                return $conditional_tags;
            }
        endif;
        add_filter('fw_ext_sidebars_conditional_tags', 'towy_filter_fw_ext_sidebars_add_conditional_tag' );

    endif; //WooCommerce

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'towy_filter_mce_theme_format_insert_button' ) ) :
	function towy_filter_mce_theme_format_insert_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} //towy_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'towy_filter_mce_theme_format_insert_button' );
// Callback function to filter the MCE settings
if ( ! function_exists( 'towy_filter_mce_theme_format_add_styles' ) ) :
	function towy_filter_mce_theme_format_add_styles( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Excerpt', 'towy' ),
				'block'   => 'p',
				'classes' => 'entry-excerpt',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Paragraph with dropcap', 'towy' ),
				'block'   => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Main theme color', 'towy' ),
				'inline'  => 'span',
				'classes' => 'highlight',
				'wrapper' => false,
			),

		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	} //towy_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'towy_filter_mce_theme_format_add_styles', 1 );

if ( ! function_exists( 'towy_include_file_from_child' ) ) :
	/**
	 * Include a file first from child if exist else from parent
	 */
	function towy_include_file_from_child( $file ) {
		if ( file_exists( get_stylesheet_directory() . $file ) ) {
			return get_stylesheet_directory_uri() . $file;
		} else {
			return get_template_directory_uri() . $file;
		}
	}
endif;

// Highlight widget title first word
if ( ! function_exists( 'towy_widget_title_first_word' ) ) :
	function towy_widget_title_first_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title, 2 );
			// Cut the title to 2 parts
			if (count($title_parts) > 1 ) {
				// Throw first word inside a span
				$title = '<span class="first-word">' . $title_parts[0] . '</span>';

				// Add the remaining words if any
				if ( isset( $title_parts[1] ) ) {
					$title .= ' ' . $title_parts[1];
				}
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'towy_widget_title_first_word' );
endif;

// Highlight widget title last word
if ( ! function_exists( 'towy_widget_title_last_word' ) ) :
	function towy_widget_title_last_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title);
			if (count($title_parts) > 1 ) {
				$title_parts[count($title_parts)-1] = '<span class="last-word">'.($title_parts[count($title_parts)-1]).'</span>';
				$title = implode(' ', $title_parts);
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'towy_widget_title_last_word' );
endif;


/**
 * Add  excerpt length 15 words
 */
if ( ! function_exists( 'towy_custom_excerpt_length' ) ) :
function towy_custom_excerpt_length( $length ) {
	if ($post_type = 'fw-portfolio') {
		return 20;
	} else {
		return 15;
	}
}
add_filter( 'excerpt_length', 'towy_custom_excerpt_length', 999 );
endif;

/**
 * Remove excerpt dots [...]
 */
if ( ! function_exists( 'towy_excerpt_more' ) ) :
	function towy_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'towy_excerpt_more');
endif;

//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */
if ( ! function_exists( 'towy_filter_theme_fw_ext_backups_demos' ) ) :
	function towy_filter_theme_fw_ext_backups_demos( $demos ) {

		$demo_version_suffix = '-v' . TOWY_REMOTE_DEMO_VERSION;  // result: '-v1.0.0'

		// this 'demo-id' should be inserted to remote config
		// result: 'towy-demo-v1.0.0'
		$demo_id = 'towy-demo' . $demo_version_suffix;

		$demos_array = array(
			$demo_id  => array(
				'title'        => esc_html__( 'Towy Demo (Blurred)', 'towy' ),
				'screenshot'   => 'http://webdesign-finder.com/remote-demo-content/towy/demo/screenshot.png',
				'preview_link' => 'http://webdesign-finder.com/towy/',
			),
		);

		// You may request this demo id from this theme author to get a colorized demo content. See the author contacts information.
		$secret_demo_id = TOWY_REMOTE_DEMO_ID; // as example: '12345678'

		// this 'demo-id' should be inserted to remote config
		// result: 'towy-demo-colorized-12345678-v1.0.0'
		$demo_id = 'towy-demo-colorized-' . $secret_demo_id . $demo_version_suffix;

		if ( $secret_demo_id ) {
			$demos_array[$demo_id] = array(
				'title'         => esc_html__('Towy Demo (Colorized)', 'towy'),
				'screenshot'    => 'http://webdesign-finder.com/remote-demo-content/towy/demo/screenshot.png',
				'preview_link'  => 'http://webdesign-finder.com/towy/',
			);
		}

		// Demo Variants
		foreach ( array( 'taxi', 'car-engines', 'carwash', 'electro-car', 'locksmith' ) as $demo_variant ) {

			$demos_array[ 'towy-' . $demo_variant . '-demo' . $demo_version_suffix ] = array(
				'title' => esc_html__( ucwords( $demo_variant, " \t\r\n\f\v-" ) . ' Demo (Blurred)', 'towy' ),
				'screenshot' => 'http://webdesign-finder.com/remote-demo-content/towy/demo/screenshot-' . $demo_variant . '.png',
				'preview_link' => 'http://webdesign-finder.com/towy/',
			);

			if ( $secret_demo_id ) {
				$demos_array[ 'towy-' . $demo_variant . '-demo-colorized-' . $secret_demo_id . $demo_version_suffix ] = array(
					'title' => esc_html__( ucwords( $demo_variant, " \t\r\n\f\v-" ) . ' Demo (Colorized)', 'towy' ),
					'screenshot' => 'http://webdesign-finder.com/remote-demo-content/towy/demo/screenshot-' . $demo_variant . '.png',
					'preview_link' => 'http://webdesign-finder.com/towy/',
				);
			}
		}

		// remote demo URL
		$download_url = 'http://webdesign-finder.com/remote-demo-content/towy/';

		foreach ( $demos_array as $id => $data ) {
			$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
				'url'     => $download_url,
				'file_id' => $id,
			) );
			$demo->set_title( $data['title'] );
			$demo->set_screenshot( $data['screenshot'] );
			$demo->set_preview_link( $data['preview_link'] );

			$demos[ $demo->get_id() ] = $demo;

			unset( $demo );
		}

		return $demos;

	} //towy_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'towy_filter_theme_fw_ext_backups_demos' );

// protocols for Skype
add_filter( 'kses_allowed_protocols', function ( $protocols ) {
    $protocols[] = 'skype';
    $protocols[] = 'callto';
    $protocols[] = 'tell';
    return $protocols;
} );

if ( !function_exists( 'towy_action_flush_rewrite_rules' ) ) :
    function towy_action_flush_rewrite_rules() {
        flush_rewrite_rules();
        if ( class_exists( 'Wp_Scss' ) && function_exists( 'wp_scss_compile' ) ) {
            wp_scss_compile();
        }
    }
endif;
add_action( 'fw:ext:backups:tasks:finish:id:demo-content-install', 'towy_action_flush_rewrite_rules' );



if (!function_exists('towy_action_shortcode_column_dynamic_css')):

	/**
	 * @internal
	 * @param array $data
	 */
	function towy_action_shortcode_column_dynamic_css($data) {
		$shortcode = 'column';
		$atts = shortcode_parse_atts( $data['atts_string'] );
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
		$final_styles='';

		/* Set column id */
		if ( ! empty( $atts['column_id'] ) ) {
			$column_id = $atts['column_id'];
		} else {
			$column_id = 'column-'. $atts['unique_id'];
		}


		if ( ! empty( $atts['overlay_select']['overlay'] ) ) {
			$final_styles .= '#'. $column_id . '.fw-column .column-overlay { 
					background-color:' . $atts['overlay_select']['color_overlay']['color']  . '; 
				}';
		}


		wp_add_inline_style(
			'towy-main',
			$final_styles
		);
	}
	add_action(
		'fw_ext_shortcodes_enqueue_static:column',
		'towy_action_shortcode_column_dynamic_css'
	);

endif;