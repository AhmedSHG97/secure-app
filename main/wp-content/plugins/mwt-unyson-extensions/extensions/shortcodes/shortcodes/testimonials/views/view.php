<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

switch ( $atts['testimonials_group']['testimonials_layout'] ):
	//flexslider layout
	case 'flexslider':
		?>
		<?php if ( ! empty( $atts['title'] ) ): ?>
		<h3 class="fw-testimonials-title text-center"><?php echo esc_html( $atts['title'] ); ?></h3>
	<?php endif; ?>
		<div class="flexslider testimonials-slider"
             data-speed="<?php echo esc_attr( ( (int) fw_get_db_customizer_option( 'slide_speed' ) ) * 1000 ) ?>">
			<ul class="slides">
				<?php
				$testimonials = $atts['testimonials_group']['flexslider']['testimonials'];
				foreach ( $testimonials as $testimonial ): ?>
					<li>
						<blockquote class="blockquote-big"><?php

                            if ( ! empty( $testimonial['author_avatar']['url'] ) ) { ?>
                                <img src="<?php echo esc_attr( $testimonial['author_avatar']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/><?php
                            } else { ?>
                                <div class="quote_symbols"></div><?php
                            }

                            echo esc_html( $testimonial['content'] ); ?>
							<div class="blockqoute-meta">
								<span class="highlight author-name"><?php echo esc_html( $testimonial['author_name'] ); ?></span></div>
					<div
						class="author-job"><?php echo esc_html( $testimonial['author_job'] || $testimonial['site_name'] ) ? '' : ''; ?>
						<?php echo esc_html( $testimonial['author_job'] ); ?>
						<?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
						<?php if ( $testimonial['site_url'] ) : ?>
						<a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
							<?php endif; //site_url
							?>
							<?php echo esc_html( $testimonial['site_name'] ); ?>
							<?php if ( $testimonial['site_url'] ) : ?>
						</a></div>
							<?php endif; //site_url ?>
							</div>
						</blockquote>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
		break; //eof big flexslider layout

	//single layout
	case 'single_testimonial':
		?>
		<div class="fw-testimonial-single">
			<?php if ( ! empty( $atts['title'] ) ): ?>
				<h3 class="fw-testimonials-title text-center"><?php echo esc_html( $atts['title'] ); ?></h3>
			<?php endif; ?>
			<?php
			$testimonial = $atts['testimonials_group']['single_testimonial'];
			?>
			<blockquote class="blockquote"><?php

				if ( ! empty( $testimonial['author_avatar']['url'] ) ) { ?>
                    <img src="<?php echo esc_attr( $testimonial['author_avatar']['url'] ); ?>"
                         alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/><?php
                } else { ?>
                    <div class="quote_symbols"></div><?php
                }

                echo esc_html( $testimonial['content'] ); ?>
				<div class="blockqoute-meta">
					<span class="highlight author-name"><?php echo esc_html( $testimonial['author_name'] ); ?></span></div>
					<div
						class="author-job"><?php echo esc_html( $testimonial['author_job'] || $testimonial['site_name'] ) ? '' : ''; ?>
					<?php echo esc_html( $testimonial['author_job'] ); ?>
					<?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
					<?php if ( $testimonial['site_url'] ) : ?>
					<a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
						<?php endif; //site_url
						?>
						<?php echo esc_html( $testimonial['site_name'] ); ?>
						<?php if ( $testimonial['site_url'] ) : ?>
					</a></div>
				<?php endif; //site_url
				?>
				</div>
			</blockquote>
		</div>
		<?php
		break; //eof single layout
endswitch;

