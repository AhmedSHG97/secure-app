<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );
$button_array = array(
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show teaser button', 'towy' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'towy' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'towy' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);

$teaser_center_array = array(
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'towy' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon',
			'label' => esc_html__( 'Choose an Icon', 'towy' ),
			'set'   => 'rt-icons-2',
		),
		'icon_size'  => array(
			'type'    => 'select',
			'value'   => 'size_normal',
			'label'   => esc_html__( 'Icon Size', 'towy' ),
			'choices' => array(
				'size_small'  => esc_html__( 'Small', 'towy' ),
				'size_normal' => esc_html__( 'Normal', 'towy' ),
				'size_big'    => esc_html__( 'Big', 'towy' ),
			)
		),

		'icon_style' => array(
			'type'    => 'image-picker',
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'towy' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'towy' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'towy' ),
			'choices' => array(
				''                            => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_00.png',
				'default_icon'                => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_01.png',
				'black'                       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_02.png',
				'highlight'                   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_03.png',
				'border_icon'                 => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_04.png',
				'black border_icon'           => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_05.png',
				'highlight border_icon'       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_06.png',
				'main_bg_color'               => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_07.png',
				'dark_bg_color'               => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_08.png',
				'border_icon round'           => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_09.png',
				'black border_icon round'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_10.png',
				'highlight border_icon round' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_11.png',
				'main_bg_color round'         => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_12.png',
				'dark_bg_color round'         => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_13.png',
			),

			'blank' => false, // (optional) if true, images can be deselected
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'towy' ),
	'image'       => esc_html__( 'Image for your teaser.', 'towy' ),
	'help'        => esc_html__( 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type', 'towy' ),
	'images_only' => true,
);

$counter_options = array(
    'type'    => 'group',
    'options' => array(

        'number'                  => array(
            'type'  => 'text',
            'value' => 10,
            'label' => esc_html__( 'Count To Number', 'towy' ),
            'desc'  => esc_html__( 'Choose value to count to', 'towy' ),
        ),
        'counter_additional_text' => array(
            'type'  => 'text',
            'value' => '',
            'label' => esc_html__( 'Add some text after counter', 'towy' ),
            'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'towy' ),
        ),
        'speed'                   => array(
            'type'       => 'slider',
            'value'      => 1000,
            'properties' => array(
                'min'  => 500,
                'max'  => 5000,
                'step' => 100,
            ),
            'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'towy' ),
            'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'towy' ),
        ),
    ),
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'icon'         => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Choose an Icon', 'towy' ),
		'set'   => 'rt-icons-2',
	),
);

$option_teaser_icon_counter = array(
	'icon_options'    => $icon_options,
	'counter_options' => $counter_options,
);

$option_teaser_image_counter = array(
    'teaser_image' => $image_options,
	'counter_options' => $counter_options,
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'towy' ),
	),
    'media_layout'        => array(
        'label'   => esc_html__( 'Post Layout', 'towy' ),
        'desc'    => esc_html__( 'Choose post layout', 'towy' ),
        'value'   => '',
        'type'    => 'select',
        'choices' => array(
            '' => esc_html__( 'Layout 1', 'towy' ),
            'layout-2'  => esc_html__( 'Layout 2', 'towy' ),
        )
    ),
	'link'         => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Teaser link', 'towy' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'towy' ),
	),
	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'towy' ),
				'choices' => array(
					'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_top.png',
					'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_left.png',
					'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_right.png',
					'image_top'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_top.png',
					'image_left'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_left.png',
					'image_right'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_right.png',
					'icon_image_bg' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_image_bg.png',
					'counter'       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_counter.png',
					'image_counter' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_counter.png',
				),
				'blank'   => false, // (optional) if true, images can be deselected
			),

		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array, $button_array ),
			'icon_left'     => $option_teaser_icon,
			'icon_right'    => $option_teaser_icon,
			'image_top'     => array_merge( $option_teaser_image, $teaser_center_array, $button_array ),
			'image_left'    => $option_teaser_image,
			'image_right'   => $option_teaser_image,
			'icon_image_bg' => $option_teaser_square,
			'counter'       => $option_teaser_icon_counter,
			'image_counter' => $option_teaser_image_counter
		),
		'show_borders' => true,
	),
    'media_link' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Clickable Icon/Image', 'towy' ),
        'desc'  => esc_html__( 'Works only, if "Teaser link" is not blank', 'towy' ),
        'left-choice'  => array(
            'value' => '',
            'label' => esc_html__( 'No', 'towy' ),
        ),
        'right-choice' => array(
            'value' => 'button',
            'label' => esc_html__( 'Yes', 'towy' ),
        ),
    ),
	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'towy' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'towy' ),
			'with_padding with_border'     => esc_html__( 'Bordered', 'towy' ),
			'small_padding bordertop'     => esc_html__( 'Bordered Top', 'towy' ),
			'small_padding bordertop borderbottom'     => esc_html__( 'Bordered Top and Bottom', 'towy' ),
			'with_padding with_background' => esc_html__( 'Muted Background', 'towy' ),
			'with_padding ls ms'           => esc_html__( 'Grey background', 'towy' ),
			'with_padding ls'           => esc_html__( 'Light background', 'towy' ),
			'with_padding ds'              => esc_html__( 'Dark background', 'towy' ),
			'with_padding ds ms'           => esc_html__( 'Darkgrey background', 'towy' ),
			'with_padding cs'              => esc_html__( 'Main color background', 'towy' ),
		)
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Teaser text', 'towy' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'towy' ),
	),

	'title_tag' => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'towy' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'towy' ),
			'h3' => esc_html__( 'H3', 'towy' ),
			'h4' => esc_html__( 'H4', 'towy' ),
		)
	),
);