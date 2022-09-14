<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

	<header id="header" class="page_header ds floating_logo nav-narrow header_transparent container_px_120">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="header_left_logo">
						<?php get_template_part( 'template-parts/header/header-logo' ); ?>
					</div><!-- eof .header_left_logo -->
				</div><!-- eof col-* -->
				<div class="col-md-9 text-right">
					<nav class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array (
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
					</nav>
					<span class="toggle_menu"><span></span></span>


				</div><!--	eof .col-sm-* -->
			</div><!--	eof .row-->
		</div> <!--	eof .container-->
	</header><!-- eof .page_header -->
