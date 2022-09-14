<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Signature', 'towy' ),
	'description' => esc_html__( 'Add a signature', 'towy' ),
	'tab'         => esc_html__( 'Content Elements', 'towy' )
);