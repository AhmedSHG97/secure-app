<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */



$autoplay = isset( $atts['slider_autoplay'] ) ? $atts['slider_autoplay'] : true;
$slider_speed = isset( $atts['slider_speed'] ) ? $atts['slider_speed'] : '3000';
$layout=(!empty($atts['layout'])) ? $atts['layout'] : '';
?>
<div class="shortcode-team-slider <?php echo esc_attr($layout)?> slider">
	<h3 class="slider-title"><?php echo wp_kses_post( $atts['title'] ); ?></h3>
	<div class="overlay"></div>
	<div class="content">
		<div class="flexslider team-slider"  data-slideshow="<?php echo esc_attr( $autoplay ); ?>" data-slideshowspeed="<?php echo esc_attr( $slider_speed ); ?>">
			<ul class="slides">
				<?php
				if ( ! empty( $atts['team_member'] ) ) :
				 foreach ( $atts['team_member'] as $member ): ?>
					<?php
					$full_image_src = ($member['team_image']['url']) ? $member['team_image']['url'] : '' ;
					$unique_id = uniqid();
					?>
					<li id="slide-<?php echo esc_attr( $unique_id ); ?>">
						<span class="overlay"></span>
						<img src="<?php echo esc_url( $full_image_src ); ?>" alt="tir">
					</li>
				<?php endforeach;
				endif; ?>

			</ul>
		</div>
		<div class="flexslider-controls">
			<ul class="flex-control-nav-1">
				<?php
				if ( ! empty( $atts['team_member'] ) ) :
					foreach ( $atts['team_member'] as $member ) : ?>
						<?php
						$full_image_src = ($member['team_image']['url']) ? $member['team_image']['url'] : '' ;
						?>
						<li class="menu__item">
							<div class="team-slides-navigation">

								<?php echo esc_attr( $member['team_name'] );?>
								<span class="position"><?php echo esc_attr( $member['team_position'] );?></span>
							</div>
						</li>
					<?php
					endforeach;
				endif; ?>
			</ul>
		</div>
	</div><!-- eof .content -->
</div><!-- eof .shortcode-team-slider -->