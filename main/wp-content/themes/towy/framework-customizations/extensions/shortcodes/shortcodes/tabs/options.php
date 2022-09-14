<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'towy' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'towy' ),
		'desc'          => esc_html__( 'Create your tabs', 'towy' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'towy' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'towy' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'towy' ),
				'image'       => esc_html__( 'Featured image for your tab', 'towy' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'towy' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'towy' ),
				'set'   => 'rt-icons-2',
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'towy' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'towy' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top color border', 'towy' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'towy' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'towy' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);