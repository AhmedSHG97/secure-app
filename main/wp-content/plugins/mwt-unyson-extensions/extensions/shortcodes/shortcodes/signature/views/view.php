<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$image  = isset( $atts['image'] ) ? $atts['image'] : false;
$image_url =  isset( $atts['url'] ) ? $atts['url'] : '';


?>
<?php if ($atts['layout'] == 'right') :?>
	<div class="fw-theme-signature">
		<div class="text-part">
			<?php if (!empty($atts['title'])): ?>
				<h4 class="section_header"><?php echo wp_kses_post($atts['title']); ?></h4>
			<?php endif; ?>
			<div class="desc <?php echo wp_kses_post($atts['sub_title_color'])?>"><?php echo wp_kses_post($atts['sub_title']); ?></div>
		</div>
		<div class="img-part">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
		</div>
	</div>
<?php else: ?>
	<div class="fw-theme-signature type-2">
		<div class="img-part">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
		</div>
		<div class="text-part">
			<?php if (!empty($atts['title'])): ?>
				<h4 class="section_header"><?php echo wp_kses_post($atts['title']); ?></h4>
			<?php endif; ?>
			<div class="desc <?php echo wp_kses_post($atts['sub_title_color'])?>"><?php echo wp_kses_post($atts['sub_title']); ?></div>
		</div>
	</div>
<?php endif;?>