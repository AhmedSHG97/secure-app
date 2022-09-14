<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'towy' ),
		'set'   => 'rt-icons-2',
	),
	'icon_style' => array(
		'type'    => 'image-picker',
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Style', 'towy' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'towy' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'towy' ),
		'choices' => array(
			'default_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'black'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'highlight'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
		),

		'blank' => false, // (optional) if true, images can be deselected
	),
	'icon_position'            => array(
		'type'    => 'select',
		'value'   => 'icon_center',
		'label'   => esc_html__( 'Heading tag', 'towy' ),
		'desc'    => esc_html__( 'Select a tag for your ', 'towy' ),
		'choices' => array(
			'icon_center' => esc_html__( 'Center icon', 'towy' ),
			'icon_left' => esc_html__( 'Left icon', 'towy' ),
			'icon_right' => esc_html__( 'Right icon', 'towy' ),
		),
	),
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'towy' ),
		'desc'  => esc_html__( 'Title near icon', 'towy' ),
	),
	'text'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Text', 'towy' ),
		'desc'  => esc_html__( 'Text near title', 'towy' ),
	),
	'bg_icon'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Background Icon', 'towy' ),
		'desc'         => esc_html__( 'Make icon as background', 'towy' ),
		'value'         => ' ',
		'right-choice' => array(
			'value' => 'bg_icon',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
		'left-choice'  => array(
			'value' => ' ',
			'label' => esc_html__( 'No', 'towy' ),
		),
	),
);