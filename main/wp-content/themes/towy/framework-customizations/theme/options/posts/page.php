<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array();
$options['page-options-section'] = array(
	'title'   => esc_html__( 'Featured Additional Options', 'towy' ),
	'type'    => 'box',
	'context' => 'normal',
	'options' => array(
        'slider_shortcode' => array(
            'type'    => 'text',
            'value'   => '',
            'label'   => esc_html__( 'Page Slider', 'towy' ),
            'desc'    => esc_html__( 'Insert slider shortcode for this page', 'towy' ),
        ),
	),
);