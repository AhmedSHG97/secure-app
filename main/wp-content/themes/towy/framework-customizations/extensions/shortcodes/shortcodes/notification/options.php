<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'towy' ),
		'desc'  => esc_html__( 'Notification message', 'towy' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'towy' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'towy' ),
		'desc'    => esc_html__( 'Notification type', 'towy' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'towy' ),
			'info'    => esc_html__( 'Information', 'towy' ),
			'warning' => esc_html__( 'Alert', 'towy' ),
			'danger'  => esc_html__( 'Error', 'towy' ),
		)
	),
);