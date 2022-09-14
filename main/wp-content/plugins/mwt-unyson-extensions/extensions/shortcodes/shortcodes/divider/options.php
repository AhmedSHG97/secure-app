<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'towy' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'towy' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'towy' ),
					'zebra'  => esc_html__( 'Zebra', 'towy' ),
					'space' => esc_html__( 'Whitespace', 'towy' ),
				)
			)
		),
		'choices'     => array(
			'zebra' => array(
				'divider_align' => array(
					'type'    => 'select',
					'value'   => 'divider_center',
					'label'   => esc_html__( 'Divider alignment', 'towy' ),
					'desc'    => esc_html__( 'Select divider alignment', 'towy' ),
					'choices' => array(
						'divider_left'   => esc_html__( 'Left', 'towy' ),
						'divider_center' => esc_html__( 'Center', 'towy' ),
						'divider_right'  => esc_html__( 'Right', 'towy' ),
					),
				),
			),
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'towy' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'towy' ),
					'type'  => 'text',
					'value' => '50'
				)
			),
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'towy' ),
		'button'        => esc_html__( 'Settings', 'towy' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Large', 'towy' ),
						'desc'         => esc_html__( 'Display on large screen?', 'towy' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'towy' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'towy' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Desktop', 'towy' ),
						'desc'         => esc_html__( 'Display on desktop?', 'towy' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'towy' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'towy' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Tablet', 'towy' ),
						'desc'         => esc_html__( 'Display on tablet?', 'towy' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'towy' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'towy' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Small devices', 'towy' ),
						'desc'         => esc_html__( 'Display on small devices?', 'towy' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'towy' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'towy' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
