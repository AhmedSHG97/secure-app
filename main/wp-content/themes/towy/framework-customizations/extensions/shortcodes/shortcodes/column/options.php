<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$color_palette  = towy_set_color_palette();
$options = array(
	'unique_id'              => array(
		'type'   => 'unique',
		'length' => 7
	),
	'column_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment in column', 'towy' ),
		'desc'    => esc_html__( 'Select text alignment inside your column', 'towy' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'towy' ),
			'text-left'   => esc_html__( 'Left', 'towy' ),
			'text-center' => esc_html__( 'Center', 'towy' ),
			'text-right'  => esc_html__( 'Right', 'towy' ),
		),
	),
	'column_padding'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column padding', 'towy' ),
		'desc'    => esc_html__( 'Select optional internal column paddings', 'towy' ),
		'choices' => array(
			''           => esc_html__( 'No padding', 'towy' ),
			'padding_10' => esc_html__( '10px', 'towy' ),
			'padding_20' => esc_html__( '20px', 'towy' ),
			'padding_30' => esc_html__( '30px', 'towy' ),
			'padding_40' => esc_html__( '40px', 'towy' ),
			'padding_65' => esc_html__( '65px', 'towy' ),

		),
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'towy' ),
		'desc'    => esc_html__( 'Select background color', 'towy' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'towy' ),
		'choices' => array(
			''               => esc_html__( 'Transparent (No Background)', 'towy' ),
			'ds'             => esc_html__( 'Dark', 'towy' ),
			'cs'             => esc_html__( 'Main color', 'towy' ),
		),
	),
	'overlay_select' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'overlay' => array(
				'type'         => 'select',
				'value'        => ' ',
				'label'        => esc_html__( 'Column overlay', 'towy' ),
				'desc'         => esc_html__( 'Enable column overlay', 'towy' ),
				'choices'       => array(
					' '         => esc_html__( 'None', 'towy' ),
					'color_overlay'  => esc_html__( 'Color Overlay', 'towy' ),
				),
			),
		),
		'choices' => array(
			'color_overlay'   => array(
				'color' => array(
					'label'    => esc_html__( 'Overlay Color', 'towy' ),
					'desc'     => esc_html__( 'Select overlay color', 'towy' ),
					'type'     => 'rgba-color-picker',
					'value'    => '',
					// palette colors array
					'palettes' => $color_palette,
				),
			),
		),
	),
    'background_gap'         => array(
        'label'        => esc_html__( 'Background covers columns gap', 'towy' ),
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
	'column_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'towy' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'towy' ),
		'choices' => array(
			''               => esc_html__( 'None', 'towy' ),
			'slideDown'      => esc_html__( 'slideDown', 'towy' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'towy' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'towy' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'towy' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'towy' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'towy' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'towy' ),
			'slideRight'     => esc_html__( 'slideRight', 'towy' ),
			'slideUp'        => esc_html__( 'slideUp', 'towy' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'towy' ),
			'expandUp'       => esc_html__( 'expandUp', 'towy' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'towy' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'towy' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'towy' ),
			'hatch'          => esc_html__( 'hatch', 'towy' ),
			'tossing'        => esc_html__( 'tossing', 'towy' ),
			'pulse'          => esc_html__( 'pulse', 'towy' ),
			'floating'       => esc_html__( 'floating', 'towy' ),
			'bounce'         => esc_html__( 'bounce', 'towy' ),
			'pullUp'         => esc_html__( 'pullUp', 'towy' ),
			'pullDown'       => esc_html__( 'pullDown', 'towy' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'towy' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'towy' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'towy' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'towy' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'towy' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'towy' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'towy' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'towy' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'towy' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'towy' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'towy' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'towy' ),
		),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'towy'),
		'desc'  => esc_html__('Add custom class for section', 'towy'),
		'type'  => 'text',
	)
);
