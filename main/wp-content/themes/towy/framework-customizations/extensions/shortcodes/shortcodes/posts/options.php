<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'towy' ),
		'desc'       => esc_html__( 'Number of posts to display', 'towy' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'towy' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'towy' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'towy' ),
			'1'  => esc_html__( '1px', 'towy' ),
			'2'  => esc_html__( '2px', 'towy' ),
			'10' => esc_html__( '10px', 'towy' ),
			'30' => esc_html__( '30px', 'towy' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Post Layout', 'towy' ),
		'desc'    => esc_html__( 'Choose post layout', 'towy' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'towy' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'towy' ),
			'tiled'  => esc_html__( 'Tiled (special layout)', 'towy' ),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'towy' ),
		'desc'    => esc_html__( 'Choose Item layout', 'towy' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Regular (just image)', 'towy' ),
			'item-title'    => esc_html__( 'Image with title', 'towy' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'towy' ),
		)
	),
	'show_meta'  => array(
		'type'         => 'switch',
		'value'        => true,
		'label'        => esc_html__( 'Show Meta', 'towy' ),
		'desc'         => esc_html__( 'Hide or show meta', 'towy' ),
		'right-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'towy' ),
		),
		'left-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'towy' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'towy' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'towy' ),
			'2' => esc_html__( '2', 'towy' ),
			'3' => esc_html__( '3', 'towy' ),
			'4' => esc_html__( '4', 'towy' ),
			'6' => esc_html__( '6', 'towy' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'towy' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'towy' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'towy' ),
			'2' => esc_html__( '2', 'towy' ),
			'3' => esc_html__( '3', 'towy' ),
			'4' => esc_html__( '4', 'towy' ),
			'6' => esc_html__( '6', 'towy' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'towy' ),
		'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'towy' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'towy' ),
			'2' => esc_html__( '2', 'towy' ),
			'3' => esc_html__( '3', 'towy' ),
			'4' => esc_html__( '4', 'towy' ),
			'6' => esc_html__( '6', 'towy' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'towy' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'towy' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'towy' ),
			'2' => esc_html__( '2', 'towy' ),
			'3' => esc_html__( '3', 'towy' ),
			'4' => esc_html__( '4', 'towy' ),
			'6' => esc_html__( '6', 'towy' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'towy' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'towy' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
	'grayscale_img'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Gray images', 'towy' ),
		'desc'         => esc_html__( 'Make images greyscale?', 'towy' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'towy' ),
		),
		'right-choice' => array(
			'value' => 'grayscale-img',
			'label' => esc_html__( 'Yes', 'towy' ),
		),
	),
);