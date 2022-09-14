<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'towy' ),
	),
	'title_tag'  => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'towy' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'towy' ),
			'h3' => esc_html__( 'H3', 'towy' ),
			'h4' => esc_html__( 'H4', 'towy' ),
		)
	),
	'content'    => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'towy' ),
		'desc'          => esc_html__( 'Enter desired item content', 'towy' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'towy' ),
		'choices' => array(
			''                                => esc_html__( 'Default (no border or background)', 'towy' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'towy' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'towy' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'towy' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'towy' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'towy' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'towy' ),
			'full-padding with_border'        => esc_html__( 'Bordered with Padding', 'towy' ),
			'full-padding with_background'    => esc_html__( 'Muted Background with Padding', 'towy' ),
			'full-padding ls ms'              => esc_html__( 'Grey background with Padding', 'towy' ),
			'full-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'towy' ),
			'full-padding ds ms'              => esc_html__( 'Dark background with Padding', 'towy' ),
			'full-padding cs'                 => esc_html__( 'Main color background with Padding', 'towy' ),
		)
	),
	'link'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'towy' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'towy' ),
	),
	'item_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'towy' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'towy' ),
		'help'        => esc_html__( 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type', 'towy' ),
		'images_only' => true,
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Text Alignment', 'towy' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'towy' ),
			'text-center' => esc_html__( 'Center', 'towy' ),
			'text-right'  => esc_html__( 'Right', 'towy' ),
		)
	),
	'icons'      => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'towy' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'towy' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'towy' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);