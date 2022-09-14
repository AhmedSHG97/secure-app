<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'table'      => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_type' => array(
		'type'    => 'select',
		'value'   => 'table',
		'label'   => esc_html__( 'Tabular table style', 'towy' ),
		'choices' => array(
			'table'                => esc_html__( 'Bootstrap Default', 'towy' ),
			'table table-striped'  => esc_html__( 'Bootstrap Striped', 'towy' ),
			'table table-bordered' => esc_html__( 'Bootstrap Bordered', 'towy' ),
			'table_template grey'  => esc_html__( 'Theme style', 'towy' ),

		),
	),
);