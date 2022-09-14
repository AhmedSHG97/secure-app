<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till main content section
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; //is_singular && pings_open ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if( function_exists( 'wp_body_open' ) ) :
	wp_body_open();
endif;
//page preloader
$preloader_enabled = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_enabled' ) : true;
$preloader_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_image' ) : false;
$topline = towy_get_option( 'topline', false );


if ( $preloader_enabled ) : ?>
	<!-- page preloader -->
	<div class="preloader">
		<div class="preloader_image pulse"<?php echo esc_html( $preloader_image ) ? ' style="background-image: url(' . esc_url( $preloader_image['url'] ) . ')"' : '' ?>></div>
	</div>
<?php endif; //preloader_enabled ?>

<!-- search modal -->
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'towy' ); ?>">
		<span aria-hidden="true">
			<i class="rt-icon2-cross2"></i>
		</span>
	</button>
	<div class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
</div>
<?php if (defined('FW')) : ?>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<?php FW_Flash_Messages::_print_frontend(); ?>
		</div>
	</div><!-- eof .modal -->
<?php endif; ?>

<!-- wrappers for visual page editor and boxed version of template -->
<?php
//wide or boxed layout
$layout            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'layout' ) : array();
$canvas_class      = "";
$box_wrapper_class = "";
if ( ! empty ( $layout['boxed'] ) ) {
	$canvas_class          = 'boxed';
	$box_wrapper_class     = 'container';
	$body_background_image = $layout['boxed_options']['body_background_image'];
	$body_cover            = $layout['boxed_options']['body_cover'];
	if ( $body_cover ) {
		$canvas_class .= ' parallax';
	}
}

//light or dark version
$version            = 'light';
$main_section_class = ( $version !== 'light' ) ? 'ds' : 'ls';
?>
<div id="canvas" class="<?php echo esc_attr( $canvas_class ); ?>"<?php echo ( ! empty( $body_background_image ) ) ? ' style="background-image:url(' . esc_url( $body_background_image['url'] ) . ');"' : ''; ?>>
	<div id="box_wrapper" class="<?php echo esc_attr( $box_wrapper_class ); ?>">
		<!-- template sections -->
		<?php

		if(towy_get_predefined_template_part( 'header' )==='header-4' || towy_get_predefined_template_part( 'header' )==='header-1' || towy_get_predefined_template_part( 'header' )==='header-3' || towy_get_predefined_template_part( 'header' )==='header-5'){
			echo '<div class="home-4">';
		}

		if( !empty($topline)){
			$topline = towy_get_predefined_template_part( 'topline' );
			get_template_part( 'template-parts/topline/' . esc_attr( $topline ) );
		}



		$header = towy_get_predefined_template_part( 'header' );
		get_template_part( 'template-parts/header/' . esc_attr( $header ) );
		if(towy_get_predefined_template_part( 'header' )==='header-4' || towy_get_predefined_template_part( 'header' )==='header-1' || towy_get_predefined_template_part( 'header' )==='header-3' || towy_get_predefined_template_part( 'header' )==='header-5'){
			echo '</div>';
		}

		if ( ! is_front_page() &  ! isset($_GET[ 'home_demo' ])) {
			$breadcrumbs = towy_get_predefined_template_part( 'breadcrumbs' );
			get_template_part( 'template-parts/breadcrumbs/' . esc_attr( $breadcrumbs ) );
		}

		do_action( 'towy_slider' );

		if ( ! is_page_template( 'page-templates/full-width.php' )
			//not opening section if is single post with video format
			&& ! ( is_singular()
			&& ( get_post_format( get_queried_object_id() ) == 'video' ) )
		) : ?>
		<section class="<?php echo esc_attr( $main_section_class ); ?> page_content section_padding_top_130 section_padding_bottom_120 columns_padding_25">
			<div class="container">
				<div class="row">
					<?php if ( is_home() ) { ?>
						<div class="before-content-area col-xs-12">
							<?php dynamic_sidebar( 'before-blog-sidebar' ); ?>
						</div>
					<?php } ?>
<?php endif; //!full-width ?>