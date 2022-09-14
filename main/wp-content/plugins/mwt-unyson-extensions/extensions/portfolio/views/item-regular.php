<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - regular item layout
 */
?>
<div class="widget_portfolio-item-regular vertical-item gallery-item content-absolute text-center cs">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			if ( function_exists('towy_post_thumbnail') ) {
				towy_post_thumbnail();
			} else {
				the_post_thumbnail();
			}
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
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h4 class="item-meta">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
	</div>
</div>