<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'years' => array(
		'type'  => 'addable-box',
		'value' => array(),
		'label' => esc_html__('Item', 'towy'),
		'desc'  => esc_html__('Add new Bio breakpoint', 'towy'),
		'box-options' => array(
			'year' => array( 'type' => 'text' ),
			'text' => array( 'type' => 'textarea' ),
		),
		'template' => '{{- year }}', // box title
		'limit' => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__('Add', 'towy'),
		'sortable' => true,
	),
	'word' => array(
		'label' => esc_html__( 'Progress Bar Background Word', 'towy' ),
		'desc'  => esc_html__( 'This word will be visible as a background for years progress bar', 'towy' ),
		'type'  => 'text',
		'value' => esc_html__('', 'towy' ),
	)
);