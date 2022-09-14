<?php
/**
 * The template part for selected topline
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$phone   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'meta_phone' ) : false;
$email   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'mata_mail' ) : false;
$address   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'meta_address' ) : false;
$hours   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'meta_hours' ) : false;




?>
<section class="page_topline topline-1 topline_transparent container_px_120">
	<div class="container-fluid ">
		<div class="row">
			<div class="col-xs-12 col-sm-4 text-center text-md-left">
				<ul class="top-includes list1 no-bullets without-border">
					<?php
						if( !empty($phone) ) {
					?>
					<li>
						<span class="icon-inline">
							<span class="icon-styled">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</span>
							<span>
							<?php
								echo esc_attr($phone);
							?>
							</span>
						</span>
					</li>
					<?php
						}
					?>

					<?php
					if( !empty($email) ) {
						?>
						<li>
						<span class="icon-inline">
							<span class="icon-styled">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
							<span>
							<?php
							echo esc_attr($email);
							?>
							</span>
						</span>
						</li>
						<?php
					}
					?>


				</ul>




			</div>
			<div class="col-xs-12 col-sm-4 text-center text-md-center">
				<?php
				$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
				if ( ! empty( $social_icons ) ) : ?>



					<?php
					//get icons-social shortcode to render icons in team member item
					$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
					if ( ! empty( $shortcodes_extension ) ) {
						echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
					}
					?>

				<?php endif; //social icons ?>
			</div>
			<div class="col-xs-12 col-sm-4 text-center text-md-right">
				<ul class="top-includes list1 no-bullets without-border">
					<?php
					if( !empty($hours) ) {
						?>
						<li>
						<span class="icon-inline">
							<span class="icon-styled">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
							</span>
							<span>
							<?php
							echo esc_attr($hours);
							?>
							</span>
						</span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</section>