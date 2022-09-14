<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

/* color defaults */
$defaults = towy_get_theme_colors_defaults();

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$meta_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$meta_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}

if ( ( ! class_exists( 'Wp_Scss' ) ) ) {
    $color_section = array();
} else {
    $color_section = array(
        'colors_panel' => array(
            'title' => esc_html__('Theme Colors', 'towy'),
            'options' => array(
                'accent_color_1' => array(
                    'label' => esc_html__('Accent Color 1', 'towy'),
                    'desc' => esc_html__('Set accent color 1', 'towy'),
                    'type' => 'color-picker',
                    'value' => $defaults['color_1']
                ),
                'accent_color_2' => array(
                    'label' => esc_html__('Accent Color 2', 'towy'),
                    'desc' => esc_html__('Set accent color 2', 'towy'),
                    'type' => 'color-picker',
                    'value' => $defaults['color_2']
                ),
                'accent_color_3' => array(
                    'label' => esc_html__('Accent Color 2', 'towy'),
                    'desc' => esc_html__('Set accent color 2', 'towy'),
                    'type' => 'color-picker',
                    'value' => $defaults['color_3']
                ),
            ),
        ),
    );
}

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'towy' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Main logo image that appears in header', 'towy' ),
				'desc'        => esc_html__( 'Select your logo', 'towy' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'towy' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' =>  esc_html__( 'Towy', 'towy' ),
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'towy' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'towy' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'towy' ),
			),
			'logo_subtext'              => array(
				'type'  => 'text',
				'value' => esc_html__( 'Towy', 'towy' ),
				'attr'  => array( 'class' => 'logo_subtext-class', 'data-logo_subtext' => 'logo_subtext' ),
				'label' => esc_html__( 'Logo Tagline', 'towy' ),
				'desc'  => esc_html__( 'Text that appears near logo text', 'towy' ),
			),
		),
	),
	'theme_meta'    => array(
		'title'   => esc_html__( 'Theme Meta', 'towy' ),
		'options' => array(
			'meta_phone'              => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Phone Number', 'towy' ),
			),
			'mata_mail'              => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Mail', 'towy' ),
			),
			'meta_address'              => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Address', 'towy' ),
			),
			'meta_hours'              => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Open hours', 'towy' ),
			),
			$meta_social_icons,
		),
	),
    $color_section,
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'towy' ),
		'options' => array(
			'post_categories'         => array(
				'label'        => esc_html__( 'Post Categories', 'towy' ),
				'desc'         => esc_html__( 'Show post categories?', 'towy' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'towy' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'towy' )
				),
				'value'        => 'no',
			),
			'post_tags'         => array(
				'label'        => esc_html__( 'Post Tags', 'towy' ),
				'desc'         => esc_html__( 'Show post tags?', 'towy' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'towy' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'towy' )
				),
				'value'        => 'yes',
			),
		)
	),
	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'towy' ),
		'options' => array(
			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__( 'Template Header', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers', 'towy' ),
				'help'    => esc_html__( 'You can select one of predefined theme headers', 'towy' ),
				'choices' => array(
					'1' => get_template_directory_uri() . '/img/theme-options/header1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/header2.png',
					'3' => get_template_directory_uri() . '/img/theme-options/header3.png',
					'4' => get_template_directory_uri() . '/img/theme-options/header4.png',
					'5' => get_template_directory_uri() . '/img/theme-options/header5.png',
					'21' => get_template_directory_uri() . '/img/theme-options/header21.png',
					'22' => get_template_directory_uri() . '/img/theme-options/header22.png',
					'23' => get_template_directory_uri() . '/img/theme-options/header23.png',
					'24' => get_template_directory_uri() . '/img/theme-options/header24.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'topline'		=>array(
				'type'  => 'select',
				'value' => '',
				'label' => __('Topline Type', 'towy'),
				'desc'  => __('Select one of predefined theme topline', 'towy'),
				'help'  => __('You can select one of predefined theme topline', 'towy'),
				'choices' => array(
					'' => __('None', 'towy'),
					'1' => array(
						'text' => __('Topline 1', 'towy'),
					),
					'2' => array(
						'text' => __('Topline 2', 'towy'),
					),
				),
			),
		),
	),
	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'towy' ),
		'options' => array(

			'footer' => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'footer-thumbnail',
					'data-foo' => 'footer',
				),
				'label'   => esc_html__( 'Page footer', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined page footers.', 'towy' ),
				'help'    => esc_html__( 'You can select one of predefined theme footers', 'towy' ),
				'choices' => array(
					'1' => get_template_directory_uri() . '/img/theme-options/footer1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/footer2.png',
					'3' => get_template_directory_uri() . '/img/theme-options/footer3.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

		),
	),
	'copyrights'      => array(
		'title'   => esc_html__( 'Theme Copyrights', 'towy' ),
		'options' => array(

			'copyrights'      => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'copyrights-thumbnail',
					'data-foo' => 'copyrights',
				),
				'label'   => esc_html__( 'Page copyrights', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined page copyrights.', 'towy' ),
				'help'    => esc_html__( 'You can select one of predefined theme copyrights', 'towy' ),
				'choices' => array(
					'1' => get_template_directory_uri() . '/img/theme-options/copyrights1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/copyrights2.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => esc_html__('24/7 Towy - Towing Services ', 'towy' ) . '<i class="fa fa-heart highlight"></i>' . esc_html__(' All Rights Reserved &copy; 2017', 'towy' ),
				'label' => esc_html__( 'Copyrights text', 'towy' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'towy' ),
			)

		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'towy' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'towy' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'towy' ),
								'desc'         => esc_html__( 'Enable custom body font', 'towy' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'towy' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'towy' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'towy' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'towy' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'towy' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'towy' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'towy' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'towy' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'towy' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'towy' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'towy' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'towy' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'towy' ),
								),
							),
						),
					),
				),
			),

		),
	),

    'miscellaneous_panel'    => array(
        'title'   => esc_html__( 'Miscellaneous', 'towy' ),
        'wp-customizer-args' => array(
            'priority' => 899,
        ),
        'options' => array(
            'preloader_panel' => array(
                'title' => esc_html__( 'Theme Preloader', 'towy' ),

                'options' => array(
                    'preloader_enabled' => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Preloader', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),

                    'preloader_image' => array(
                        'type'        => 'upload',
                        'value'       => '',
                        'label'       => esc_html__( 'Custom preloader image', 'towy' ),
                        'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'towy' ),
                        'images_only' => true,
                    ),


                ),
            ),
            'share_buttons'   => array(
                'title' => esc_html__( 'Theme Share Buttons', 'towy' ),

                'options' => array(
                    'share_facebook'    => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Facebook Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_twitter'     => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Twitter Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_google_plus' => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Google+ Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_pinterest'   => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Pinterest Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_linkedin'    => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable LinkedIn Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_tumblr'      => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Tumblr Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),
                    'share_reddit'      => array(
                        'type'         => 'switch',
                        'value'        => '1',
                        'label'        => esc_html__( 'Enable Reddit Share Button', 'towy' ),
                        'left-choice'  => array(
                            'value' => '1',
                            'label' => esc_html__( 'Enabled', 'towy' ),
                        ),
                        'right-choice' => array(
                            'value' => '0',
                            'label' => esc_html__( 'Disabled', 'towy' ),
                        ),
                    ),

                ),
            ),
            'sliding_section'    => array(
                'title'   => esc_html__( 'Sliding Speed', 'towy' ),
                'options' => array(

                    'slide_speed' => array(
                        'type'  => 'text',
                        'value' => '5',
                        'label' => esc_html__( 'Global Sliding Speed', 'towy' ),
                        'desc'  => esc_html__( 'Applied to all sliders, carousels, testimonials', 'towy' )
                            . '<br>' . esc_html__( '( in seconds )', 'towy' ),
                    )
                )
            ),
            'breadcrumbs_section'    => array(
                'title'   => esc_html__( 'Page Title', 'towy' ),
                'options' => array(

                    'breadcrumbs_bg' => array(
                        'type'        => 'upload',
                        'value'       => '',
                        'label'       => esc_html__( 'Custom background for page title section', 'towy' ),
                        'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'towy' ),
                        'images_only' => true,
                    ),
                )
            ),
        ),
    ),

);