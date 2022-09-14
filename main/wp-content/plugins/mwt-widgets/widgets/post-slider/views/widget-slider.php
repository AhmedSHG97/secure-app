<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $args
 * @var string $show_navigation
 * @var string $autoplay
 * @var string $unique_id
 * @var array $posts
 * @var array $title
 */

if ( $posts->have_posts() ) :
	?>
	<?php echo wp_kses_post( $args['before_widget'] ); ?>
	<?php if ( $title ) {
	echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
} ?>
	<div
		class="owl-post-slider owl-post-slider<?php echo esc_attr( $unique_id ) ?> owl-carousel"
		data-dots="<?php echo esc_attr( $show_navigation ) ? 'true' : 'false' ?>"
		data-autoplay="<?php echo esc_attr( $autoplay ) ? 'true' : 'false' ?>"
        data-speed="<?php echo esc_attr( ( (int) fw_get_db_customizer_option( 'slide_speed' ) ) * 1000 ) ?>"
		data-uniqid="<?php echo esc_attr( $unique_id ); ?>"
		data-loop="1"
		data-margin="0"
		data-responsive-xs="1"
		data-responsive-sm="1"
		data-responsive-md="1"
		data-responsive-lg="1"
	>
		<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<div class="post-slider-item">
				<div class="post-slider-image">
					<span class="post-slider-overlay"></span>
					<?php the_post_thumbnail( 'mwt-full-width' ); ?>
				</div>
				<div class="post-slider-content">
					<div class="text-center display_table">
						<div class="display_table_cell">
							<h2 class="post-slider-title"><a
									href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							</h2>
						</div>
					</div>
				</div>
			</div><!-- .item -->
		<?php endwhile; ?>
	</div>
	<?php echo wp_kses_post( $args['after_widget'] ); ?>
	<?php
	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();
endif;