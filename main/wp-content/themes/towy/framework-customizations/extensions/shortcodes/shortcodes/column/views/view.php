<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$class = 'fw-column';
$class .= ' ' . fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );
$class .= ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? ' to_animate' : '';
$class .= ( ! empty( $atts['column_align'] ) ) ? ' ' . $atts['column_align'] : '';

$data_animation = ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? 'data-animation="' . esc_attr( $atts['column_animation'] ) . '"' : '';

/* Add section custom class */
if( $atts['custom_class'] ) {
	$class .= ' '. $atts['custom_class'];
}

if ( ! empty( $atts['column_id'] ) ) {
	$column_id = $atts['column_id'];
} else {
	$column_id = 'column-'. $atts['unique_id'];
}

$inner_class = 'fw-column-inner';
$inner_class .= ( ! empty( $atts['column_padding'] ) ) ? ' ' . $atts['column_padding'] : '';

$background_gap = ( ! empty( $atts['background_gap'] ) ) ? $atts['background_gap'] : 'no';
if ( 'yes' == $background_gap ) {
    $inner_class .= (!empty($atts['background_color'])) ? ' has-bg-color ' . $atts['background_color'] : '';
} else {
    $class .= ( ! empty( $atts['background_color'] ) ) ? ' has-bg-color ' . $atts['background_color'] : '';
}

?>
<div <?php echo ( !empty( $column_id )  ) ? ' id="' . esc_attr( $column_id ) . '"' : '' ;?> class="fw-column <?php echo esc_attr( $class ); ?>" <?php echo wp_kses_post( $data_animation ); ?>>

	<div class="column-overlay"></div>

	<div class="<?php echo esc_attr( $inner_class ); ?>"><?php

	    echo do_shortcode( $content ); ?>
    </div>
</div>
