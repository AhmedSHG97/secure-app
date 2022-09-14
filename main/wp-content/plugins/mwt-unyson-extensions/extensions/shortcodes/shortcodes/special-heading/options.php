<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'towy' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'towy' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'towy' ),
			'text-center' => esc_html__( 'Center', 'towy' ),
			'text-right'  => esc_html__( 'Right', 'towy' ),
		),
	),
	'numbered_header'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Numbered header', 'towy' ),
		'desc'         => esc_html__( 'Auto add number to section header', 'towy' ),
		'right-choice' => array(
			'value' => 'numbered-header',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
		'left-choice'  => array(
			'value' => ' ',
			'label' => esc_html__( 'No', 'towy' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'towy' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'towy' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'towy' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'towy' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'towy' ),
					'h2' => esc_html__( 'H2 tag', 'towy' ),
					'h4' => esc_html__( 'H4 tag', 'towy' ),
					'h5' => esc_html__( 'H5 tag', 'towy' ),
					'p'  => esc_html__( 'P tag', 'towy' ),

				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'towy' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'towy' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'towy' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'towy' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'towy' ),
					'highlight'  => esc_html__( 'First theme main color', 'towy' ),
					'highlight2' => esc_html__( 'Second theme main color', 'towy' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'towy' ),
					'black'      => esc_html__( 'Dark theme color', 'towy' ),
					'lightfont'      => esc_html__( 'Light grey theme color', 'towy' ),

				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text weight', 'towy' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'towy' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'towy' ),
					'bold' => esc_html__( 'Bold', 'towy' ),
					'regular' => esc_html__( 'Regular', 'towy' ),
					'thin' => esc_html__( 'Thin', 'towy' ),

				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'towy' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'towy' ),
				'choices' => array(
					''                => esc_html__( 'None', 'towy' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'towy' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'towy' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'towy' ),

				),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
