<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$logo_image_breadcrumbs = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'logo_image_breadcrumbs' ) : '';
$logo_text              = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'logo_text' ) : get_option( 'blogname' );
$breadcrumbs_bg         = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'breadcrumbs_bg' ) : '';
if ( is_array( $breadcrumbs_bg ) ) { $breadcrumbs_bg = $breadcrumbs_bg[ 'url' ]; }
?>
<section class="page_breadcrumbs cs parallax section_padding_40 section_overlay"
         style="background-image: url('<?php echo esc_url( $breadcrumbs_bg ); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php
				if ( $logo_image_breadcrumbs ) : ?>
					<div class="breadcrumbs_logo">
						<img src="<?php echo esc_attr( $logo_image_breadcrumbs['url'] ); ?>"
						     alt="<?php echo esc_attr( $logo_text ); ?>">
					</div>
				<?php endif; //logo_image_breadcrumbs ?>
				<h2 class="bold">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
				</h2>
			</div>
		</div>
	</div>
</section>