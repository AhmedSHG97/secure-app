<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<?php
if ( isset( $data['slides'] ) ):
	$top_corner_logo_src = $data['settings']['extra']['corner_image']['data']['icon'];
	$top_corner_text = $data['settings']['extra']['corner_text'];
	?>
	<section class="intro_section page_mainslider ds">
		<div class="flexslider"
             data-speed="<?php echo esc_attr( ( (int) fw_get_db_customizer_option( 'slide_speed' ) ) * 1000 ) ?>">
			<ul class="slides">
				<?php foreach ( $data['slides'] as $id => $slide ):
				$slide_background = isset( $slide['extra']['slide_background'] ) ? $slide['extra']['slide_background'] : false;
				$slide_align      = isset( $slide['extra']['slide_align'] ) ? $slide['extra']['slide_align'] : false;
				$slide_layers     = isset( $slide['extra']['slide_layers'] ) ? $slide['extra']['slide_layers'] : false;

				$slide_button           = isset( $slide['extra']['slide_button'] ) ? $slide['extra']['slide_button'] : false;
				$slide_button_text      = isset( $slide['extra']['slide_button_text'] ) ? $slide['extra']['slide_button_text'] : false;
				$slide_button_animation = isset( $slide['extra']['slide_button_animation'] ) ? $slide['extra']['slide_button_animation'] : false;
				$slide_button_link      = isset( $slide['extra']['slide_button_link'] ) ? $slide['extra']['slide_button_link'] : false;
				?>
				<li class="<?php echo esc_attr( $slide_background ); ?> <?php echo esc_attr( $slide_align ); ?>">
					<img src="<?php echo esc_attr( $slide['src'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ) ?>">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="slide_description_wrapper">
									<?php if ( $top_corner_logo_src || $top_corner_text ) : ?>
										<div class="top-corner">
											<?php if ( $top_corner_logo_src ): ?>
												<a href="/" class="logo">
													<img src="<?php echo esc_attr( $top_corner_logo_src ); ?>" alt="<?php esc_attr_e( 'Logo', 'towy' ); ?>">
												</a>
											<?php endif; ?>

											<?php if ( $top_corner_text ): ?>
												<div class="ds ms">
													<span
														class="grey"><?php echo wp_kses_post( $top_corner_text ); ?></span>
												</div>
											<?php endif; ?>
										</div> <!-- eof .top-corner -->
									<?php endif; ?>
									<?php if ( $slide_layers || $slide_button ) : ?>
									<div class="slide_description">
										<?php
										foreach ( $slide_layers as $layer ):
										?>
										<div class="intro-layer"
										     data-animation="<?php echo esc_attr( $layer['layer_animation'] ); ?>">
											<<?php echo esc_html( $layer['layer_tag'] ); ?>
											class="<?php echo esc_attr( ( $layer['layer_tag'] == 'p' ) ? 'small' : '' ); ?> <?php echo esc_attr( $layer['layer_text_color'] ); ?> <?php echo esc_attr( $layer['layer_text_weight'] ); ?> <?php echo esc_attr( $layer['layer_text_transform'] ); ?>
											">
											<?php echo wp_kses_post( $layer['layer_text'] ) ?>
										</<?php echo esc_html( $layer['layer_tag'] ); ?>>
									</div>
								<?php
								endforeach;
								if ( $slide_button == 'scroll' ) :
									?>
									<div class="intro-layer scroll-icon"
									     data-animation="<?php echo esc_attr( $slide_button_animation ); ?>">
										<a href="<?php echo esc_url( $slide_button_link ); ?>"
										   class="<?php echo esc_attr( $slide_button ); ?>"><i class="toyicon-mouse grey"></i><?php echo esc_html( $slide_button_text ); ?></a>
									</div>
									<?php else: ?>
									<div class="intro-layer"
									     data-animation="<?php echo esc_attr( $slide_button_animation ); ?>">
										<a href="<?php echo esc_url( $slide_button_link ); ?>"
										   class="<?php echo esc_attr( $slide_button ); ?>"><?php echo esc_html( $slide_button_text ); ?></a>
									</div>
									<?php
								endif;
								?>

								</div> <!-- eof .slide_description -->
								<?php endif; ?>
							</div> <!-- eof .slide_description_wrapper -->
						</div> <!-- eof .col-* -->
					</div><!-- eof .row -->
				</div><!-- eof .container -->
			</li>
		<?php endforeach; ?>
		</ul>
		</div> <!-- eof flexslider -->
	</section> <!-- eof intro_section -->
<?php endif; ?>