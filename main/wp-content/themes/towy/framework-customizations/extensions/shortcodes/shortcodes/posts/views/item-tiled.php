<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

?>

<div <?php post_class( "vertical-item content-padding with_border " ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
        <div class="item-media-wrap">
            <div class="item-media">
				<?php
				the_post_thumbnail( 'towy-rectangular' );
				?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
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
		<?php
		the_excerpt();
		?>
		<?php
		if($atts['show_meta']==true):

			?>
			<?php towy_posted_on() ?>
			<?php towy_posted_by() ?>
		<?php

		endif;?>
    </div>
</div><!-- eof vertical-item -->
