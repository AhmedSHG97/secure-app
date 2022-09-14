<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget posts - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding with_border text-center">
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content top-zebra-border">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php the_excerpt(); ?>
		<?php mwt_posted_on() ?>
		<?php mwt_posted_by() ?>
	</div>
</div><!-- eof vertical-item -->
