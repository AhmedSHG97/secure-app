<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'towy' ),
		'desc'  => esc_html__( 'Option Team Slider Title', 'towy' ),
		'type'  => 'text',
	),
	'layout'  => array(
		'type'         => 'switch',
		'value'        => true,
		'label'        => esc_html__( 'Image Side', 'towy' ),
		'desc'         => esc_html__( 'left or right', 'towy' ),
		'right-choice'  => array(
			'value' => 'left-image',
			'label' => esc_html__( 'Left Image', 'towy' ),
		),
		'left-choice' => array(
			'value' => 'right-image',
			'label' => esc_html__( 'Right Image', 'towy' ),
		),
	),
	'team_member'      => array(
		'type'        => 'addable-popup',
		'value'       => '',
		'label'       => esc_html__( 'Team Member', 'towy' ),
		'popup-options' => array(
			'team_name'=> array(
				'type'  => 'text',
				'label' => esc_html__( 'Team Member Name', 'towy' ),
				'desc'  => esc_html__( 'This team member name', 'towy' )
			),
			'team_position'=> array(
				'type'  => 'text',
				'label' => esc_html__( 'Team Member Position', 'towy' ),
				'desc'  => esc_html__( 'This team member position', 'towy' )
			),
			'team_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Team Member Image', 'towy' ),
				'images_only' => true,
			),
		),
		'template'    => '{{- team_name }}',
		'sortable' => true,
	),
	'slider_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Autoplay', 'towy' ),
		'value' => 'true',
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
	'slider_speed' => array(
		'type'  => 'text',
		'value' => esc_html__( '3000', 'towy' ),
		'label' => esc_html__( 'Speed', 'towy' ),
		'desc'  => esc_html__( 'Please input here value in milliseconds.', 'towy' ),
	),
);