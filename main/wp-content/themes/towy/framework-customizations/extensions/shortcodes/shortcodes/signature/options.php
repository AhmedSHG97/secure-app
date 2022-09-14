<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'towy' ),
		'desc'  => esc_html__( 'This can be left blank', 'towy' )
	),
	'sub_title'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Subtitle', 'towy' ),
	),
    'sub_title_color' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Color of subtitle', 'towy' ),
        'desc'         => esc_html__( 'Choose the color of subtitle', 'towy' ),
        'value' => 'true',
        'left-choice'  => array(
            'value' => '',
            'label' => esc_html__( 'Grey', 'towy' ),
        ),
        'right-choice' => array(
            'value' => 'highlight',
            'label' => esc_html__( 'Color', 'towy' ),
        ),
    ),
	'image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Image', 'towy' ),
		'image'       => esc_html__( 'Signature Image', 'towy' ),
		'images_only' => true,
	),
    'layout'   => array(
        'label'   => esc_html__( 'Image side', 'towy' ),
        'desc'    => esc_html__( 'Choose image side', 'towy' ),
        'value'   => 'right',
        'type'    => 'select',
        'choices' => array(
            ''  => esc_html__( 'Left', 'towy' ),
            'right'    => esc_html__( 'Right', 'towy' ),
        )
    ),
);