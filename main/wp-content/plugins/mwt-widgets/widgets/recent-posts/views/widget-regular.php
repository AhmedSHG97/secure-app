<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $args
 * @var string $show_media
 * @var string $show_date
 * @var array $title
 */

if ( $posts->have_posts() ) :

	?>
	<?php echo wp_kses_post( $args['before_widget'] ); ?>
	<?php if ( $title ) {
	echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
} ?>

	<ul class="theme-rp-list">
		<?php while ( $posts->have_posts() ) :
			$posts->the_post(); ?>
			<li class="theme-rp-item">
				<div class="theme-rp-inner">
						<h4><a class="theme-rp-title"
						   href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
					<div class="theme-rp-content">
						<?php the_excerpt(); ?>
					</div><!-- .recent-posts__content -->
					<div class="theme-rp-meta content-justify">
						<?php
						if ( $show_date ) : ?>
							<span class="theme-rp-date"><?php echo get_the_date(); ?></span>
						<?php endif; ?>
						<?php mwt_posted_by() ?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>

	<?php echo wp_kses_post( $args['after_widget'] ); ?>
	<?php
	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();
endif;