<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( $atts['title'] || $atts['text'] ) :
	?>
	<div class="media small-teaser shortcode-icon">
		<?php if ( $atts['icon'] ): ?>
			<div class="media-left">
				<div class="icon-wrap">
					<i class="<?php echo esc_attr( $atts['icon'] . ' ' . $atts['icon_style'] ); ?> fontsize_18"></i>
				</div>
			</div>
		<?php endif; //icon
		?>
		<div class="media-body">
		<span class="title">
			<?php echo wp_kses_post( $atts['title'] ); ?>
		</span>
		<span class="text">
			<?php echo wp_kses_post( $atts['text'] ); ?>
		</span>
		</div>
	</div>
	<?php
//only icon
else:
	?>
	<span class="theme-icon <?php echo esc_attr( $atts['bg_icon']); ?> <?php echo esc_attr( $atts['icon_position']); ?>">
	<i class="<?php echo esc_attr( $atts['icon'] . ' ' . $atts['icon_style'] ); ?>"></i>
</span>
	<?php
endif;