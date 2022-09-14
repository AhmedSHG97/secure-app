<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );

$options = array(
	'icons' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Icons in list', 'towy' ),
		'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'towy' ),
		'desc'          => esc_html__( 'Create your tabs', 'towy' ),
		'template'      => '{{=title}}',
		'popup-options' => $icon->get_options(),
	),
	'border'          => array(
		'type'         => 'switch',
		'value'        => 'with-border',
		'label'        => esc_html__( 'Item Border', 'towy' ),
		'left-choice'  => array(
			'value' => 'without-border',
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'with-border',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
);