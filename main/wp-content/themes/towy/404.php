<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>
	<div id="content" class="col-md-7 col-md-push-6 text-center not_found_wrapper">
		<p class="not_found highlight">
			<?php esc_html_e( '404', 'towy' ); ?>
			<span class="oops grey"><?php esc_html_e( 'Ooops!', 'towy' ); ?></span>
		</p>
		<h2><?php esc_html_e( 'Sorry, page not found!', 'towy' ); ?></h2>

		<p>
			<a href="<?php echo get_home_url(); ?>" class="theme_button color1">
				<?php esc_html_e( 'BACK TO HOME', 'towy' ); ?>
			</a>
		</p>

	</div><!--eof #content -->

<?php
get_footer();