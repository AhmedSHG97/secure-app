<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_image = '';
$section_id = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . '); background-position: center center; background-repeat: no-repeat;';
}
if ( ! empty( $atts['section_id'] ) ) {
	$section_id = $atts['section_id'];
}

$section_extra_classes = '';
$section_extra_classes .= ( isset( $atts['background_color'] ) && $atts['background_color'] ) ? ' ' . $atts['background_color'] : '';
$section_extra_classes .= ( isset( $atts['top_padding'] ) && $atts['top_padding'] ) ? ' ' . $atts['top_padding'] : '';
$section_extra_classes .= ( isset( $atts['bottom_padding'] ) && $atts['bottom_padding'] ) ? ' ' . $atts['bottom_padding'] : '';
$section_extra_classes .= ( isset( $atts['columns_padding'] ) && $atts['columns_padding'] ) ? ' ' . $atts['columns_padding'] : '';
$section_extra_classes .= ( isset( $atts['parallax'] ) && $atts['parallax'] ) ? ' parallax' : '';
$section_extra_classes .= ( isset( $atts['section_overlay'] ) && $atts['section_overlay'] ) ? ' section_overlay' : '';
$section_extra_classes .= ( isset( $atts['section_mobile_overlay'] ) && $atts['section_mobile_overlay'] ) ? ' section_mobile_overlay section_overlay' : '';
$section_extra_classes .= ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? ' fullwidth-section' : '';
$section_extra_classes .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$section_extra_classes .= ( isset( $atts['is_flex'] ) && $atts['is_flex'] ) ? ' section_flex' : '';
$section_extra_classes .= ( isset( $atts['cargo_hook'] ) && $atts['cargo_hook'] ) ? ' сargo-hook' : '';

/* Add section custom class */
if( $atts['custom_class'] ) {
	$section_extra_classes .= ' '. $atts['custom_class'];
}

$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'container-fluid' : 'container';

// Custom Background Color
$use_custom_color = false;
$custom_color = '';
if ( ! empty( $atts[ 'custom_background_color' ] ) ) {
    $custom_color = $atts[ 'custom_background_color' ];
    if ( 'yes' == $custom_color[ 'use_custom_color' ] ) {
        $custom_color = $custom_color[ 'yes' ];
        if ( '' != $custom_color = $custom_color[ 'custom_color_picker' ] ) {
            $use_custom_color = true;
            $custom_color = 'background-color: ' . $custom_color . ';';
        } else {
            $custom_color = '';
        }
    } else {
        $custom_color = '';
    }
}

?>
<section class="fw-main-row <?php echo esc_attr( $section_extra_classes ) ?>" style="<?php echo esc_attr( $bg_image ); ?><?php echo esc_attr( $custom_color ); ?>" <?php echo ( !empty( $section_id )  ) ? ' id="' . esc_attr( $section_id ) . '"' : '' ;?>>
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<div class="row">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
</section>
