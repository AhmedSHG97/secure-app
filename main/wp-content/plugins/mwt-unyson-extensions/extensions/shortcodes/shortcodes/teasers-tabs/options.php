<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'towy' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'towy' ),
		'desc'          => esc_html__( 'Create your tabs', 'towy' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'towy' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'towy' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'towy' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'towy' ),
					'col-sm-6'  => esc_html__( '1/2', 'towy' ),
					'col-sm-4'  => esc_html__( '1/3', 'towy' ),
					'col-sm-3'  => esc_html__( '1/4', 'towy' ),
				),
			),
			'tab_columns_padding' => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'towy' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'towy' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'towy' ),
					'columns_padding_1'  => esc_html__( '1 px', 'towy' ),
					'columns_padding_2'  => esc_html__( '2 px', 'towy' ),
					'columns_padding_5'  => esc_html__( '5 px', 'towy' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'towy' ),
					'columns_padding_25' => esc_html__( '25 px', 'towy' ),
				),
			),
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'towy' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'towy' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'towy' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
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