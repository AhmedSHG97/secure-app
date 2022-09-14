<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_template_part( 'template-parts/header/header-103' );
?>

	<header id="header" class="page_header header-5 floating_logo ls container_px_120">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-xs-12">
					<div class="header_left_logo">
						<?php get_template_part( 'template-parts/header/header-logo' ); ?>
					</div><!-- eof .header_left_logo -->
				</div><!-- eof col-* -->
				<div class="col-md-6 text-center">
					<nav class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array (
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
					</nav>
					<span class="toggle_menu"><span></span></span>


				</div><!--	eof .col-sm-* -->
				<div class="col-md-3 text-right visible-md visible-lg">
					<ul class="top-includes list1 no-bullets without-border">
						<li>
							<div class="dropdown widget_search">
								<a class="dropdown-toggle " href="#" id="headerSearchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-search"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right ls" aria-labelledby="headerSearchDropdown">
									<?php get_search_form(); ?>
								</div>
							</div>
						</li>

						<?php
						if(function_exists('mwt_login_form')):
							?>
							<li class="dropdown-account">
								<div class="dropdown">
									<a class="dropdown-toggle" href="#" role="button" id="dropdown-account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-user" aria-hidden="true"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-account">
										<?php

										mwt_login_form();

										?>
									</div>
								</div>
							</li>
						<?php endif; ?>
						<li>
						 <span class="toggle_menu toggle_menu_side toggle_menu_side toggle_menu_side_special header-slide">
						</span>
						</li>
					</ul>
				</div>
			</div><!--	eof .row-->
		</div> <!--	eof .container-->
	</header><!-- eof .page_header -->
