<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$teaser_type   = isset( $atts['teaser_types']['teaser_type'] ) ? $atts['teaser_types']['teaser_type'] : false;
$teaser_image  = isset( $atts['teaser_types'][ $teaser_type ]['teaser_image'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_image'] : false;
$icon          = isset( $atts['teaser_types'][ $teaser_type ]['icon'] ) ? $atts['teaser_types'][ $teaser_type ]['icon'] : false;
$icon_size     = isset( $atts['teaser_types'][ $teaser_type ]['icon_size'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_size'] : 'size_small';
$icon_style    = isset( $atts['teaser_types'][ $teaser_type ]['icon_style'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_style'] : false;
$teaser_center = isset( $atts['teaser_types'][ $teaser_type ]['teaser_center'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_center'] : false;
$layout = !empty( $atts['media_layout'] ) ? $atts['media_layout'] : '';
//for counter teaser
$number                  = isset( $atts['teaser_types'][ $teaser_type ]['number'] ) ? ( int ) $atts['teaser_types'][ $teaser_type ]['number'] : false;
$counter_additional_text = isset( $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] ) ? $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] : false;
$speed                   = isset( $atts['teaser_types'][ $teaser_type ]['speed'] ) ? $atts['teaser_types'][ $teaser_type ]['speed'] : false;

//common teaser properties for all teaser types
$title        = $atts['title'];
$teaser_style = $atts['teaser_style'];
$title_tag    = $atts['title_tag'];
$link         = $atts['link'];
$content      = $atts['content'];

$show_button = isset($atts['teaser_types'][ $teaser_type ]['button']['show_button']) ? $atts['teaser_types'][ $teaser_type ]['button']['show_button'] : '';
$button_label = isset( $atts['teaser_types'][ $teaser_type ]['button']['show_button'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button']['label'] : false;
$button_class = isset( $atts['teaser_types'][ $teaser_type ]['button']['button']['color'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button']['color'] : 'theme_button';
$wide_button = isset( $atts['teaser_types'][ $teaser_type ]['button']['button']['wide_button'] ) ? $atts['teaser_types'][ $teaser_type ]['button']['button']['wide_button'] : false;
$button_class .= $wide_button ? ' ' . 'wide_button' : '';

$media_link = isset($atts['media_link']) ? $atts['media_link'] : false;
$media_link = $media_link && $link;

//available teaser layouts:
//icon_left
//icon_right
//image_top
//image_left
//image_right
//counter
//icon_image_bg
//icon_top - default
$class_image = '';
if (!empty($content)) :
	$class_image = 'big-image';
endif; //$content
switch ( $teaser_type ) :

	case 'icon_image_bg': ?>

		<div class="vertical-item square_teaser <?php echo esc_attr( ( $teaser_image ) ? 'content-absolute' : 'no-image' ); ?>">

			<?php if ( $teaser_image ) : ?>
				<div class="item-media">
                    <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
					<img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    <?php if ( $media_link ) { ?></a><?php } ?>
				</div>
			<?php endif; //teaser_image ?>
			<div class="item-content">
				<?php if ( $title ): ?>
					<h4>
						<?php if ( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php endif; //$link ?>

							<?php echo esc_html( $title ); ?>

							<?php if ( $link ): ?>
						</a>
					<?php endif; //$link ?>
					</h4>
				<?php endif; //$title ?>

				<?php if ( $content ) : ?>
					<p>
						<?php echo wp_kses_post( $content ); ?>
					</p>
				<?php endif; //$content ?>
			</div><!-- eof .item-content -->
			<?php if ( $icon ): ?>
				<div class="teaser_icon <?php echo esc_attr( $icon_size ); ?>">
					<i class="<?php echo esc_attr( $icon ); ?>"></i>
				</div>
			<?php endif; //icon ?>
		</div>

		<?php
		break; //icon_image_bg

	case 'image_top':
		?>
	<div class="teaser <?php echo esc_attr( $teaser_center . ' ' . $teaser_style ); ?>">
		<?php if ( $teaser_image ) : ?>
		<div class="teaser_image">
            <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
			<img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
            <?php if ( $media_link ) { ?></a><?php } ?>
		</div>
	<?php endif; //teaser_image 
		?>
		<?php if ( $title ): ?>
		<<?php echo esc_html( $title_tag ); //h3 ?>>
		<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php endif; //$link ?>
		<?php echo esc_html( $title ); ?>
		<?php if ( $link ): ?>
			</a>
		<?php endif; //$link ?>
		</<?php echo esc_html( $title_tag ); //h3 ?>>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<p>
			<?php echo wp_kses_post( $content ); ?>
		</p>
	<?php endif; //$content 
		?>
		<?php if ( $show_button =='button' ) : ?>
		<?php if ( $button_label && $link ) : ?>
		<a href="<?php echo esc_url( $link ); ?>"
		   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
	<?php endif; ?>
	<?php endif; ?>
		</div>

		<?php
		break; //image_top


	//left image layout
	case 'image_left':
		?>
		<div class="teaser <?php echo esc_attr( $layout ); ?> media <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( $teaser_image ) : ?>
				<div class="media-left <?php echo esc_html( $class_image );?>">
					<div class="teaser_image">
                        <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
						<img src="<?php echo esc_url( $teaser_image['url'] ); ?>"
						     alt="<?php echo esc_attr( $title ); ?>">
                        <?php if ( $media_link ) { ?></a><?php } ?>
					</div>
				</div>
			<?php endif; //teaser_image 
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>
				<p>
					<?php echo wp_kses_post( $content ); ?>
				</p>
			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //image_left

	//right image layout
	case 'image_right':
		?>
		<div class="teaser media text-right <?php echo esc_attr( $teaser_style ); ?>">

			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<p>
					<?php echo wp_kses_post( $content ); ?>
				</p>
			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		<?php if ( $teaser_image ) : ?>
		<div class="media-right">
			<div class="teaser_image <?php echo esc_html( $class_image );?>">
                <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
				<img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                <?php if ( $media_link ) { ?></a><?php } ?>
			</div>
		</div>
	<?php endif; //teaser_image 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //image_right


	//left icon layout
	case 'icon_left':
		?>
		<div class="teaser media <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( $icon_style && $icon ) : ?>
				<div class="media-left media-middle">
					<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style ); ?>">
                        <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
                        <?php if ( $media_link ) { ?></a><?php } ?>
					</div>
				</div>
			<?php endif; //$icon_style check 
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>
				<p>
					<?php echo wp_kses_post( $content ); ?>
				</p>
			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //icon_left

	//right icon layout
	case 'icon_right':
		?>
		<div class="teaser media text-right <?php echo esc_attr( $teaser_style ); ?>">

			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_html( $title_tag ); //h3 ?> class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</<?php echo esc_html( $title_tag ); //h3 ?>>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<p>
					<?php echo wp_kses_post( $content ); ?>
				</p>
			<?php endif; //$content 
			?>
			<?php if ( $button_label && $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>"
				   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- eof .media-body -->
		<?php if ( $icon_style && $icon ) : ?>
		<div class="media-right media-middle <?php echo esc_html( $class_image );?>">
			<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style ); ?>">
                <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
				<i class="<?php echo esc_attr( $icon ); ?>"></i>
                <?php if ( $media_link ) { ?></a><?php } ?>
			</div>
		</div>
	<?php endif; //icon_style 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //icon_right

	case 'counter' :

		?>
		<div class="teaser text-center <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( $icon_style && $icon ) : ?>
				<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style ); ?>">
                    <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
					<i class="<?php echo esc_attr( $icon ); ?>"></i>
                    <?php if ( $media_link ) { ?></a><?php } ?>
				</div>
			<?php endif; //icon_style 
			?>
			<?php if ( $counter_additional_text ) : ?>
				<h3 class="counter-wrap">
					<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
					      data-speed="<?php echo esc_attr( $speed ); ?>">0</span><span
						class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
				</h3>
			<?php else : //no counter adds ?>
				<h3 class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
				    data-speed="<?php echo esc_attr( $speed ); ?>">
					0
				</h3>
			<?php endif; //$counter_additional_text 
			?>

			<?php if ( $title ) : ?>
				<p>
					<?php echo esc_html( $title ); ?>
				</p>
			<?php endif; //$name 
			?>
		</div>
		<?php
		break; //count

	case 'image_counter' :

		?>
		<div class="teaser text-center <?php echo esc_attr( $teaser_style ); ?>">
            <?php if ( $teaser_image ) : ?>
                <div class="teaser_image">
                    <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
                    <img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    <?php if ( $media_link ) { ?></a><?php } ?>
                </div>
            <?php endif; //teaser_image
			?>
			<?php if ( $counter_additional_text ) : ?>
				<h3 class="counter-wrap">
					<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
					      data-speed="<?php echo esc_attr( $speed ); ?>">0</span><span
						class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
				</h3>
			<?php else : //no counter adds ?>
				<h3 class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
				    data-speed="<?php echo esc_attr( $speed ); ?>">
					0
				</h3>
			<?php endif; //$counter_additional_text
			?>

			<?php if ( $title ) : ?>
				<p>
					<?php echo esc_html( $title ); ?>
				</p>
			<?php endif; //$name
			?>
		</div>
		<?php
		break; //image count

	//default layout - icon_top
	default:
		?>
	<div class="teaser <?php echo esc_attr( $teaser_center . ' ' . $teaser_style ); ?>">
		<?php if ( $icon_style && $icon ) : ?>
		<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style ); ?>">
            <?php if ( $media_link ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
			<i class="<?php echo esc_attr( $icon ); ?>"></i>
            <?php if ( $media_link ) { ?></a><?php } ?>
		</div>
	<?php endif; //icon_style 
		?>
		<?php if ( $title ): ?>
		<<?php echo esc_html( $title_tag ); //h3 ?>>
		<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php endif; //$link ?>

		<?php echo esc_html( $title ); ?>

		<?php if ( $link ): ?>
			</a>
		<?php endif; //$link ?>
		</<?php echo esc_html( $title_tag ); //h3 ?>>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<p>
			<?php echo wp_kses_post( $content ); ?>
		</p>
	<?php endif; //$content 
		?>
		<?php if ( $button_label && $link ) : ?>
		<a href="<?php echo esc_url( $link ); ?>"
		   class="<?php echo esc_attr( $button_class ); ?>"><?php echo esc_html( $button_label ); ?></a>
	<?php endif; ?>
		</div>
	<?php endswitch; ?>