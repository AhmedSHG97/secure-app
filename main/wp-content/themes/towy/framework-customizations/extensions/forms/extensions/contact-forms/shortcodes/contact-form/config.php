<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'towy' ),
	'description' => esc_html__( 'Build contact forms', 'towy' ),
	'tab'         => esc_html__( 'Content Elements', 'towy' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);