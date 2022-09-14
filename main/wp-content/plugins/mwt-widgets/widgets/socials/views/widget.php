<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( defined( 'FW' ) ) {
	/**
	 * @var string $before_widget
	 * @var string $after_widget
	 * @var array $params
	 */
	$unique_id = uniqid();
	echo wp_kses_post( $before_widget );
	if ( !empty ( $params['title'] ) ) {
		echo wp_kses_post( $before_title . $params['title'] . $after_title );
	}
	if ( ! empty ( $params['social_icons'] ) ) : ?>
		<ul class="widget-socials no-bullets no-top-border no-bottom-border">
			<?php foreach ( $params['social_icons'] as $icon ): ?>
				<li>
					<?php if ( ! empty ( $icon['icon_class'] ) && ! empty ( $icon['icon_link'] )  ): ?>
						<a href="<?php echo esc_url( $icon['icon_link'] ); ?>" target="_blank">
							<i class="<?php echo esc_attr( $icon['icon_class'] ); ?> fontsize_16"></i>
						</a>
					<?php endif; //icon	?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; //icons ?>
	<?php echo wp_kses_post( $after_widget );
}