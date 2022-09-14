<?php
/**
 * The template for displaying content video
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;
//single item layout
if(is_singular()) :

$column_classes = towy_get_columns_classes();

//light or dark version
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$main_section_class = ( $version !== 'light' ) ? 'ds' : 'ls';

$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : true;
$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : true;
?>
<section class="<?php echo esc_attr( $main_section_class ); ?>  ms video-entry-thumbnail">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php towy_post_thumbnail(); ?>
			</div>
		</div>
	</div>
</section>
<section class="<?php echo esc_attr( $main_section_class ); ?> page_content section_padding_top_50 section_padding_bottom_75 columns_padding_25">
	<div class="container">
		<div class="row">
			<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class('vertical-item content-padding with_border'); ?>>

			<div class="item-content entry-content top-zebra-border">
				<header class="entry-header content-justify">
					<h4 class="entry-title"><?php the_title(); ?></h4>
					<div class="entry-author">
						<?php
						if ( 'post' == get_post_type() ) {
							towy_posted_by();
						}
						?>
					</div>
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
	<?php towy_list_authors(); ?>
<?php
//eof single page layout
//blog feed layout
else:

	$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : true;
	$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : true;

	$post_layout = 'post-layout-standard';
	if (function_exists( 'fw_get_db_post_option' )) {
		$post_layout = fw_get_db_post_option( $post->ID, 'post-layout', 'post-layout-standard' );
	}
	//standard feed layout (image at the top or not image at all if option is standard or has no post thumbnail)
	//	if ($post_layout == 'post-layout-standard' || ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ) :
	$small_layout = ( $post_layout == 'post-layout-standard' || !$show_post_thumbnail ) ? false : true;
		if ($small_layout) : //additional markup for small layout post
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('format-small-image'); ?>>
		<div class="side-item content-padding with_border">
			<div class="row">
				<?php towy_post_thumbnail( $small_layout ); ?>
				<div class="col-md-6">

	<?php else : //standard layout markup ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('vertical-item content-padding with_border'); ?>>
	<?php
		towy_post_thumbnail();
	endif; //small_format check
	?>
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

			<?php if ( is_search() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content">
					<?php
						//hidding "more link" in content
						the_content(  esc_html__( 'More...', 'towy' )  );
					?>
					<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'towy' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>

					<div class="entry-meta">
						<?php
						if ( 'post' == get_post_type() ) {
							towy_posted_on();
						}
						?>
					</div><!-- .entry-meta -->

				</div><!-- .entry-content -->
			<?php endif; //is_search ?>
		</div><!-- eof .item-content -->
		<?php if ($small_layout) : //additional markup for small format post ?>
				</div><!-- eof .col-md-6 -->
			</div><!-- eof .row -->
		</div><!-- eof .side-item -->
		<?php endif; //small_format ?>
	</article><!-- #post-## -->
<?php endif;  //is singular ?>