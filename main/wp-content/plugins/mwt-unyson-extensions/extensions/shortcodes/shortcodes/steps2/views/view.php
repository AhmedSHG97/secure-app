<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['steps'] ) {
	return;
}
$layout='';
if(count($atts['steps'])===4){
	$layout='layout-4';
}elseif(count($atts['steps'])===3){
	$layout='layout-3';
}
?>

<?php
$layout_item= (!empty($atts['item_layout'])) ? $atts['item_layout'] : '';
switch ($layout_item){
	case ('layout-1') :
		?>
		<div class="fw-theme-steps steps-2 <?php echo esc_attr($layout);?>">

			<?php foreach ( $atts['steps'] as $step ) : ?>
				<div class="fw-theme-step-wrap">
					<div class="fw-step-left-part">
						<?php
						if ( ! empty( $step['step_title'] ) ): ?>
							<h2 class="step-title <?php echo esc_attr( $step['number_color'] ); ?>"><?php echo wp_kses_post( $step['step_title'] ); ?></h2>
						<?php endif; ?>
					</div>
					<div class="fw-step-center-part">
						<?php
						$attachment_id = ! empty($step['step_image']['attachment_id']) ? $step['step_image']['attachment_id'] : '';
						echo wp_get_attachment_image( $attachment_id, $size = 'towy-square', $icon = false, $attr ='' ); ?>
					</div>
					<div class="fw-step-right-part">
						<?php if ( ! empty( $step['step_text'] ) ): ?>
							<p class="step-text"><?php echo wp_kses_post( $step['step_text'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php break;?>
	<?php
	case ('layout-2') :
		?>
		<div class="fw-theme-steps steps-2 layout_item2 <?php echo esc_attr($layout);?>">

			<?php foreach ( $atts['steps'] as $step ) : ?>
				<div class="fw-theme-step-wrap">
					<div class="fw-step-left-part">
						<?php
						if ( ! empty( $step['step_title'] ) ): ?>
							<h2 class="step-title <?php echo esc_attr( $step['number_color'] ); ?>"><?php echo wp_kses_post( $step['step_title'] ); ?></h2>
						<?php endif; ?>
					</div>
					<div class="fw-step-center-part">
						<?php
						$attachment_id = ! empty($step['step_image']['attachment_id']) ? $step['step_image']['attachment_id'] : '';
						echo wp_get_attachment_image( $attachment_id, $size = 'towy-square', $icon = false, $attr ='' ); ?>
					</div>
					<div class="fw-step-right-part">
						<?php if ( ! empty( $step['step_text'] ) ): ?>
							<p class="step-text"><?php echo wp_kses_post( $step['step_text'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php break;?>
<?php
}

?>
