<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */
?>
<div class="wrap-forms topmargin_10">
	<div class="row">
		<div class="col-sm-12">
			<input class="theme_button wide_button <?php echo esc_attr( $extra_data['button_color'] ) ?>" type="submit"
			       value="<?php echo esc_attr( $submit_button_text ) ?>"/>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
				<input class="theme_button wide_button" type="reset"
				       value="<?php echo esc_attr( $extra_data['reset_button_text'] ); ?>"/>
			<?php endif; ?>
		</div>
	</div>
</div>