<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'towy' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'towy' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'towy' )
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'towy' ),
		'desc'  => esc_html__( 'Where should your button link to', 'towy' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'towy' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'towy' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'towy' ),
		),
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'towy' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'towy' ),
		'type'    => 'select',
		'choices' => array(
			'theme_button'         => esc_html__( 'Default', 'towy' ),
			'theme_button color1'  => esc_html__( 'Color1', 'towy' ),
			'theme_button color2'  => esc_html__( 'Color2', 'towy' ),
			'theme_button inverse' => esc_html__( 'Inverse', 'towy' ),
			'simple_link'          => esc_html__( 'Just link', 'towy' ),

		)
	),
	'wide_button' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Wide button', 'towy' ),
		'desc'  => esc_html__( 'Switch to create wider button', 'towy' ),
	),
);