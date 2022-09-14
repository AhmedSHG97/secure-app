<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<header class="page_header header_darkgrey header_logo_center">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="logo_wrapper">
					<?php
					get_template_part( 'template-parts/header/header-logo' );
					?>
				</div>
				<!-- header toggler -->
				<span class="toggle_menu"><span></span></span>
				<nav class="mainmenu_wrapper primary-navigation">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'sf-menu nav-menu nav',
						'container'      => 'ul'
					) ); ?>
				</nav>
			</div>
		</div>
	</div>
</header>