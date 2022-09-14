<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if( is_active_sidebar('sidebar-footer-1') || is_active_sidebar('sidebar-footer-2') || is_active_sidebar('sidebar-footer-3') || is_active_sidebar('sidebar-footer-4') ) :?>
<footer class="ds page_footer section_padding_top_50 section_padding_bottom_50">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
			</div>
		</div>

	</div>
</footer><!-- .page_footer -->
<?php endif; ?>