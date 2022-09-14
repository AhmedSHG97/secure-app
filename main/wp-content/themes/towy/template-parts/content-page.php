<?php
/**
 * The template used for displaying page content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( is_search() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_border' ); ?>>
    <div class="item-content entry-content top-zebra-border">

        <header class="entry-header content-justify">
			<?php
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			?>
            <div class="entry-author">
				<?php
				if ( 'post' == get_post_type() ) {
					towy_posted_by();
				}
				?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
    </div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() || ! is_singular() ) : ?>
		<header class="entry-header">
			<?php
			// Page thumbnail and title.
			towy_post_thumbnail();
			if ( ! is_singular() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}

			?>
		</header><!-- .entry-header -->
		<?php
	endif; //has_post_thumbnail
	?>
	<?php if ( is_search() ) : ?>
		<?php if ( get_the_excerpt() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php endif; ?>
	<?php else : ?>
		<div class="entry-content">
			<?php
			//hidding "more link" in content
			the_content(); ?>
            <div class="clearfix"></div><?php

			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'towy' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
<?php endif; ?>
