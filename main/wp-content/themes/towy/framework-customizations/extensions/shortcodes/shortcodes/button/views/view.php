<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$wide_button = ( ! empty( $atts['wide_button'] ) ? 'wide_button' : '' )
?>
<a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $atts['color'] . ' ' . $wide_button ); ?>">
	<span><?php echo esc_html( $atts['label'] ); ?></span>
</a>