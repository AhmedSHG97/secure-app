<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(

	'teaser_columns_width'   => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Column width for teasers row', 'towy' ),
		'value'   => 'col-sm-4',
		'desc'    => esc_html__( 'Choose teaser width inside teasers row', 'towy' ),
		'choices' => array(
			'col-md-12' => esc_html__( '1/1', 'towy' ),
			'col-md-6'  => esc_html__( '1/2', 'towy' ),
			'col-md-4'  => esc_html__( '1/3', 'towy' ),
			'col-md-3'  => esc_html__( '1/4', 'towy' ),
		),
	),
	'teaser_columns_padding' => array(
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
	'teasers'                => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Teasers in row', 'towy' ),
		'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'towy' ),
		'desc'          => esc_html__( 'Create your tabs', 'towy' ),
		'template'      => '{{=title}}',
		'popup-options' => $teaser->get_options(),

	),

);