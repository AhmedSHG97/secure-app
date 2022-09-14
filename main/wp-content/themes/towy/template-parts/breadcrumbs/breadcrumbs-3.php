<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$breadcrumbs_bg = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_customizer_option( 'breadcrumbs_bg' ) : '';
if ( is_array( $breadcrumbs_bg ) ) { $breadcrumbs_bg = $breadcrumbs_bg[ 'url' ]; }
?>
<section class="page_breadcrumbs cs section_padding_top_25 section_padding_bottom_25 gradient"
         style="background-image: url('<?php echo esc_url( $breadcrumbs_bg ); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2 class="grey small">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
				</h2>
			<?php
				if ( function_exists( 'fw_ext_breadcrumbs' ) ) {
					fw_ext_breadcrumbs();
				}
			?>
			</div><!-- eof .col-* -->
		</div><!-- eof .row -->
	</div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->