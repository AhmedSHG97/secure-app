<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'towy' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'towy' ),
	),

	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'towy' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'towy' ),
		'choices' => array(
			'progress-bar-success' => esc_html__( 'Success', 'towy' ),
			'progress-bar-info'    => esc_html__( 'Info', 'towy' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'towy' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'towy' ),

		),
	),
);