<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="page_header_side page_header_side_special header_side_right ds">

	<div class="scrollbar-macosx">
		<div class="side_header_inner">
			<p class="text-right mb-0 close-wrapper"><a href="javascript:void(0)">&#215;</a></p>
			<div class="header-side-menu">
				<nav class="mainmenu_side_wrapper">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'sf-menu-side',
						'container'      => 'ul'
					) ); ?>
				</nav>
			</div>
		</div>
	</div>
</div><!-- .page_header_side -->