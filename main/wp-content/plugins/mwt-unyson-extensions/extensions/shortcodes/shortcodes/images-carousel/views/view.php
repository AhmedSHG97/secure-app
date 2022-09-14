<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$items         = $atts['items'];
$loop          = $atts['loop'];
$dots          = $atts['dots'];
$center        = $atts['center'];
$autoplay      = $atts['autoplay'];
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin        = $atts['margin'];

?>
<div class="owl-carousel"
     data-items="<?php echo esc_attr( $responsive_lg ); ?>"
     data-loop="<?php echo esc_attr( $loop ); ?>"
     data-nav="false"
     data-dots="<?php echo esc_attr( $dots ); ?>"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-speed="<?php echo esc_attr( ( (int) fw_get_db_customizer_option( 'slide_speed' ) ) * 1000 ) ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="<?php echo esc_attr( $margin ); ?>"
>
	<?php
	if ( ! empty( $items ) ) :
		foreach ( $items as $item ) :
			?>
			<div>
				<?php if ( $item['url'] ): ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>">
					<?php endif;
					echo wp_get_attachment_image( $item['image']['attachment_id'], 'towy-square', false, array( 'title' => $item['title'] ) );
					?>
					<!--<img src="<?php echo esc_url( $item['image']['url'] ); ?>"
					     alt="<?php echo esc_attr( $item['title'] ); ?>">-->
					<?php if ( $item['url'] ): ?>
				</a>
			<?php endif; ?>
			</div>
		<?php
		endforeach;
	endif; ?>
</div>
