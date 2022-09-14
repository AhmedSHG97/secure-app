<?php
/**
 * The default template for displaying quote content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : true;
$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : true;

//single item layout
if ( is_singular() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('vertical-item content-padding with_border'); ?>>
		<div class="item-content entry-content top-zebra-border text-center">
			<header class="entry-header">
				<h4 class="entry-title"><?php the_title(); ?></h4>
			</header><!-- .entry-header -->

			<!-- .item cats -->
			<?php if ( $post_categories == 'yes' ) : ?>
				<div class="item-cats">
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && towy_categorized_blog() ) : ?>
						<span
							class="categories-links theme_buttons small_buttons color1"><?php echo get_the_category_list( esc_html_x( ' ', 'Used between list items, there is a space after the comma.', 'towy' ) ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<!-- .item cats -->

			<?php
				the_content( esc_html__( 'More...', 'towy' ) );
			?>

			<!-- .item tags -->
			<?php if ( $post_tags == 'yes' ) : ?>
				<?php the_tags( '<footer class="entry-meta"><span class="tag-links categories-links theme_buttons small_buttons color1">', ' ', '</span></footer>' ); ?>
			<?php endif; ?>
			<!-- .item tags -->
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'towy' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
<?php
//eof single page layout
//blog feed layout
else:
	$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
	$additional_post_class = ( $post_thumbnail ) ? 'ds bg_teaser after_cover darkgrey_bg' : '';
	?>
	<article
		id="post-<?php the_ID(); ?>" <?php post_class( 'ds vertical-item content-padding ' . $additional_post_class ); ?>>
		<?php
		echo empty ( $post_thumbnail ) ? '<div class="bg_overlay"></div>' : '';
		echo wp_kses_post ( $post_thumbnail );
		?>
		<div class="item-content entry-content text-center">
			<header class="entry-header">
				<?php
					the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				?>
			</header><!-- .entry-header -->
			<?php
			//hidding "more link" in content
			the_content( esc_html__( 'More...', 'towy' ) );
			?>
			<?php if ( is_search() ) : ?>
				<div class="entry-summary">
					<?php
					the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
					the_excerpt();
					?>
				</div><!-- .entry-summary -->
			<?php endif; //is_search ?>
		</div><!-- eof .item-content -->
	</article><!-- #post-## -->
<?php endif;  //is singular