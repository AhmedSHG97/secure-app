<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="icons-list">
	<ul class="list1 no-bullets <?php echo esc_attr($atts['border']) ?>">
		<?php foreach ( $atts['icons'] as $icon ): ?>
			<li>
				<?php
				//get teaser shortcode to render teasers inside a row
				echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
				?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>