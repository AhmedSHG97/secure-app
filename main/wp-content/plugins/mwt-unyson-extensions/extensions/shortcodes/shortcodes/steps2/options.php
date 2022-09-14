<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'item_layout'       => array(
		'label'   => esc_html__( 'Layout of steps', 'towy' ),
		'type'    => 'select',
		'choices' => array(
			'layout-1'  => esc_html__( 'Layout 1', 'towy' ),
			'layout-2'  => esc_html__( 'Layout 2', 'towy' ),

		)
	),
	'steps'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Steps', 'towy' ),
		'box-options' => array(
			'step_title'=> array(
				'type'  => 'text',
				'label' => esc_html__( 'Step Title', 'towy' ),
				'desc'  => esc_html__( 'This can be left blank', 'towy' )
			),
			'step_text' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Step Text', 'towy' ),
			),
			'step_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Step Image', 'towy' ),
				'images_only' => true,
			),
			'number_color'       => array(
				'label'   => esc_html__( 'Number Color', 'towy' ),
				'type'    => 'select',
				'choices' => array(
					'color1'  => esc_html__( 'Main color 1', 'towy' ),
					'color2'  => esc_html__( 'Main color 2', 'towy' ),
					'color3'  => esc_html__( 'Main color 3', 'towy' ),
					'color4'  => esc_html__( 'Main color 4', 'towy' ),
					'greyColor'  => esc_html__( 'Grey Color', 'towy' ),
				)
			),
			'step_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Custom class', 'towy' ),
				'desc'  => esc_html__( 'Add step custom css class', 'towy' ),
			),
		),
		'template'    => '{{- step_title }}',
		'limit'           => 4, // limit the number of boxes that can be added
	)
);