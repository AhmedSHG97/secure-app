<?php
/*
Plugin Name: Modern Web Templates theme widgets
Description: Additional widgets for theme
Version:     1.1
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/
define('MWT_WIDGETS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


if (!function_exists( 'mwt_widgets_dirname_to_classname' ) ) {
	function mwt_widgets_dirname_to_classname( $dirname ) {
		$class_name = explode( '-', $dirname );
		$class_name = array_map( 'ucfirst', $class_name );
		$class_name = implode( '_', $class_name );

		return $class_name;
	}
}

add_action( 'widgets_init', 'mwt_action_widgets_init' );
if (!function_exists( 'mwt_action_widgets_init' ) ) {
	function mwt_action_widgets_init() {
		$dirs = array(
            'banner',
            'icons-list',
            'popular',
            'portfolio',
            'posts',
            'post-slider',
            'post-tabs',
            'recent',
            'recent-posts',
            'socials',
            'twitter',
		);

		//require_once  plugin_dir_path( __FILE__ ) . '/mod-post-likes.php';

		foreach ( $dirs as $dir ) {

			$dirname = $dir;

			if ( isset( $included_widgets[ $dirname ] ) ) {
				// this happens when a widget in child theme wants to overwrite the widget from parent theme
				continue;
			} else {
				$included_widgets[ $dirname ] = true;
			}

		//	$path_to_widget_class = $dir . '/class-widget-' . $dirname;

			//checking that file exists in provided dirs
			$full_path_to_widget_class = MWT_WIDGETS_PLUGIN_PATH . '/widgets/'. $dirname . '/class-widget-' . $dirname . '.php';
			if ( file_exists( $full_path_to_widget_class ) ) {
				require_once $full_path_to_widget_class;

				$widget_class = 'MWT_Widget_' . mwt_widgets_dirname_to_classname( $dirname );
				if ( class_exists( $widget_class ) ) {
					register_widget( $widget_class );
				}
			}
		}
	}
}


//widgets template tags

if ( ! function_exists( 'mwt_posted_on' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
    function mwt_posted_on() {
        // Set up and print post meta information.
        printf( '<span class="greylinks entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
            esc_url( get_permalink() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );
    }

endif; //mwt_posted_on

if ( ! function_exists( 'mwt_posted_by' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
    function mwt_posted_by() {
        if ( is_sticky() && is_home() && ! is_paged() ) {
            echo '<span class="featured-post"><i class="rt-icon2-clip highlight"></i>' . esc_html__( ' Sticky: ', 'mwt' ) . '</span>';
        }
        // Get the author name; wrap it in a link.
        printf(
        /* translators: %s: post author */
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'. '%1$s' . get_the_author() . '</a></span>',
            esc_html_x( 'by ', 'Used before post author name.', 'mwt' )
        );
    }

endif; //mwt_posted_by
