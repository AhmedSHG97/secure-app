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
	if ( ! empty ( $params['icons'] ) ) : ?>
		<ul class="widget-icons-list no-bullets no-top-border no-bottom-border">
			<?php foreach ( $params['icons'] as $icon ): ?>
				<li>
					<?php if ( $icon['icon_class'] ): ?>
						<div class="media-left">
							<i class="<?php echo esc_attr( $icon['icon_class'] ); ?> highlight fontsize_18"></i>
						</div>
					<?php endif; //icon	?>
					<?php if ( $icon['icon_title'] ): ?>
						<div class="media-body">
							<span class="grey">
								<?php echo wp_kses_post( $icon['icon_title'] ); ?>
							</span>
						</div>
					<?php endif; //icon title ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; //icons ?>
	<?php echo wp_kses_post( $after_widget );
}