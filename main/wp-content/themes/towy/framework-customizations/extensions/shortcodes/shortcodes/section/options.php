<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'section_name' => array(
		'label' => esc_html__( 'Section Name', 'towy' ),
		'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'towy' ),
		'help'  => esc_html__( 'Use this option to name your sections. It will help you go through the structure a lot easier.', 'towy' ),
		'type'  => 'text',
	),
	'is_fullwidth'     => array(
		'label' => esc_html__( 'Full Width', 'towy' ),
		'type'  => 'switch',
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => 'ls',
		'label'   => esc_html__( 'Background Color', 'towy' ),
		'desc'    => esc_html__( 'Select background color', 'towy' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'towy' ),
		'choices' => array(
			'ls'             => esc_html__( 'Light', 'towy' ),
			'ls ms'          => esc_html__( 'Light Grey', 'towy' ),
			'ds'             => esc_html__( 'Dark Grey', 'towy' ),
			'ds ms'          => esc_html__( 'Dark', 'towy' ),
			'cs'             => esc_html__( 'Main color', 'towy' ),
		),
	),
    'custom_background_color' => array(
        'type'         => 'multi-picker',
        'label'        => false,
        'desc'         => false,
        'picker'       => array(
            'use_custom_color' => array(
                'type'    => 'switch',
                'value'   => 'left-choice',
                'label'   => esc_html__( 'Use Custom Color', 'towy' ),
                'desc'    => esc_html__( 'Specify background color directly', 'towy' ),
                'help'    => esc_html__( '"Background Color" setting still affects colors for text, links and other elements in the section.', 'towy' ),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'towy' ),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'towy' ),
                ),
            ),

        ),
        'choices'       => array(
            'yes'       => array(
                'custom_color_picker' => array(
                    'type'  => 'color-picker',
                    'value' => '#FFFFFF',
                    'label'   => esc_html__( 'Custom Color', 'towy' ),
                ),
            ),
        ),
        'show_borders' => false,
    ),
	'top_padding'      => array(
		'type'    => 'select',
		'value'   => 'section_padding_top_50',
		'label'   => esc_html__( 'Top padding', 'towy' ),
		'desc'    => esc_html__( 'Choose top padding value', 'towy' ),
		'choices' => array(
			'section_padding_top_0'   => esc_html__( '0', 'towy' ),
			'section_padding_top_5'   => esc_html__( '5 px', 'towy' ),
			'section_padding_top_15'  => esc_html__( '15 px', 'towy' ),
			'section_padding_top_25'  => esc_html__( '25 px', 'towy' ),
			'section_padding_top_30'  => esc_html__( '30 px', 'towy' ),
			'section_padding_top_40'  => esc_html__( '40 px', 'towy' ),
			'section_padding_top_50'  => esc_html__( '50 px', 'towy' ),
			'section_padding_top_65'  => esc_html__( '65 px', 'towy' ),
			'section_padding_top_75'  => esc_html__( '75 px', 'towy' ),
			'section_padding_top_100' => esc_html__( '100 px', 'towy' ),
			'section_padding_top_120' => esc_html__( '120 px', 'towy' ),
			'section_padding_top_130' => esc_html__( '130 px', 'towy' ),
			'section_padding_top_140' => esc_html__( '140 px', 'towy' ),
			'section_padding_top_145' => esc_html__( '145 px', 'towy' ),
			'section_padding_top_150' => esc_html__( '150 px', 'towy' ),
			'section_padding_top_155' => esc_html__( '155 px', 'towy' ),
			'section_padding_top_160' => esc_html__( '160 px', 'towy' ),
			'section_padding_top_215' => esc_html__( '215 px', 'towy' ),
		),
	),
	'bottom_padding'   => array(
		'type'    => 'select',
		'value'   => 'section_padding_bottom_50',
		'label'   => esc_html__( 'Bottom padding', 'towy' ),
		'desc'    => esc_html__( 'Choose bottom padding value', 'towy' ),
		'choices' => array(
			'section_padding_bottom_0'   => esc_html__( '0', 'towy' ),
			'section_padding_bottom_5'   => esc_html__( '5 px', 'towy' ),
			'section_padding_bottom_15'  => esc_html__( '15 px', 'towy' ),
			'section_padding_bottom_25'  => esc_html__( '25 px', 'towy' ),
			'section_padding_bottom_30'  => esc_html__( '30 px', 'towy' ),
			'section_padding_bottom_40'  => esc_html__( '40 px', 'towy' ),
			'section_padding_bottom_50'  => esc_html__( '50 px', 'towy' ),
			'section_padding_bottom_65'  => esc_html__( '65 px', 'towy' ),
			'section_padding_bottom_75'  => esc_html__( '75 px', 'towy' ),
			'section_padding_bottom_100' => esc_html__( '100 px', 'towy' ),
			'section_padding_bottom_120' => esc_html__( '120 px', 'towy' ),
			'section_padding_bottom_130' => esc_html__( '130 px', 'towy' ),
			'section_padding_bottom_140' => esc_html__( '140 px', 'towy' ),
			'section_padding_bottom_145' => esc_html__( '145 px', 'towy' ),
			'section_padding_bottom_150' => esc_html__( '150 px', 'towy' ),
			'section_padding_bottom_155' => esc_html__( '155 px', 'towy' ),
			'section_padding_bottom_160' => esc_html__( '160 px', 'towy' ),
			'section_padding_bottom_215' => esc_html__( '215 px', 'towy' ),
		),
	),
	'columns_padding'  => array(
		'type'    => 'select',
		'value'   => 'columns_padding_15',
		'label'   => esc_html__( 'Column paddings', 'towy' ),
		'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'towy' ),
		'choices' => array(
			'columns_padding_0'  => esc_html__( '0', 'towy' ),
			'columns_padding_1'  => esc_html__( '1 px', 'towy' ),
			'columns_padding_2'  => esc_html__( '2 px', 'towy' ),
			'columns_padding_5'  => esc_html__( '5 px', 'towy' ),
			'columns_padding_15' => esc_html__( '15 px - default', 'towy' ),
			'columns_padding_25' => esc_html__( '25 px', 'towy' ),
		),
	),
	'background_image' => array(
		'label'   => esc_html__( 'Background Image', 'towy' ),
		'desc'    => esc_html__( 'Please select the background image', 'towy' ),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'background_cover' => array(
		'label' => esc_html__( 'Background Cover', 'towy' ),
		'type'  => 'switch',
	),
	'parallax'         => array(
		'label' => esc_html__( 'Parallax', 'towy' ),
		'type'  => 'switch',
	),
	'section_overlay'         => array(
		'label' => esc_html__( 'Section overlay', 'towy' ),
		'type'  => 'switch',
	),
	'section_mobile_overlay'         => array(
		'label' => esc_html__( 'Section mobile overlay', 'towy' ),
		'type'  => 'switch',
	),
	'is_flex'         => array(
		'label' => esc_html__( 'Flex section', 'towy' ),
		'desc'  => esc_html__( 'Make colums height 100% on wide screens', 'towy' ),
		'type'  => 'switch',
	),

	'cargo_hook'         => array(
		'label' => esc_html__( 'Use cargo hook image', 'towy' ),
		'type'  => 'switch',
	),

	'section_id' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('ID attribute', 'towy'),
		'desc'  => esc_html__('Add ID attribute to section. Useful for single page menu', 'towy'),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'towy'),
		'desc'  => esc_html__('Add custom class for section', 'towy'),
		'type'  => 'text',
	)

);
