<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Choose Image', 'towy' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'towy' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => __( 'Width', 'towy' ),
				'desc'  => __( 'Set image width', 'towy' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => __( 'Height', 'towy' ),
				'desc'  => __( 'Set image height', 'towy' ),
				'value' => 200
			)
		)
	),
	'shadow'  => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Shodow Image', 'towy' ),
		'desc'         => esc_html__( 'Add shadow image', 'towy' ),
		'right-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'towy' ),
		),
		'left-choice' => array(
			'value' => 'shadow-image',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => __( 'Image Link', 'towy' ),
				'desc'  => __( 'Where should your image link to?', 'towy' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => __( 'Open Link in New Window', 'towy' ),
				'desc'         => __( 'Select here if you want to open the linked page in a new window', 'towy' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => __( 'Yes', 'towy' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => __( 'No', 'towy' ),
				),
			),
		)
	)
);

