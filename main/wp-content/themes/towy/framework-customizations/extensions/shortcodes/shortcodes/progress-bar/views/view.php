<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$percent          = $atts['percent'];
$background_class = $atts['background_class'];
?>
<div class="progress">
	<div class="progress-bar <?php echo esc_attr( $background_class ); ?>" role="progressbar"
	     data-transitiongoal="<?php echo esc_attr( $percent ); ?>" aria-valuenow="<?php echo esc_attr( $percent ); ?>"
	     aria-valuemin="0" aria-valuemax="100">
		<span><?php echo esc_attr( $percent ); ?>%</span>
	</div>
</div>