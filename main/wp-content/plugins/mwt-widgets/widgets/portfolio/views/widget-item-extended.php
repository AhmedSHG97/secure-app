<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding with_background text-center">
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<div class="links-wrap">
					<a class="p-view prettyPhoto "
					   data-gal="prettyPhoto[gal-<?php echo esc_attr( $unique_id ); ?>]"
					   href="<?php echo esc_attr( $full_image_src ); ?>"></a>
					<a class="p-link" href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="theme_buttons small_buttons">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
		</div>
		<p>
			<?php echo the_excerpt(); ?>
		</p>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="theme_button wide_button inverse">
				<?php esc_html_e( 'Learn More', 'mwt' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof vertical-item -->
