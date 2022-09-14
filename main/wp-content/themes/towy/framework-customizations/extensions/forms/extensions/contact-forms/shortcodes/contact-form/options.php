<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'towy' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'towy' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'towy' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'towy' ),
								'desc'    => esc_html__( 'Select background color', 'towy' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'towy' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'towy' ),
									'with_padding ls'               => esc_html__( 'Light', 'towy' ),
									'with_padding ds'               => esc_html__( 'Dark', 'towy' ),
									'with_padding cs'               => esc_html__( 'Main color', 'towy' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'towy' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'towy' ),
								'choices' => array(
									'columns_padding_15' => esc_html__( '15 px - default', 'towy' ),
									'columns_padding_0'  => esc_html__( '0', 'towy' ),
									'columns_padding_1'  => esc_html__( '1 px', 'towy' ),
									'columns_padding_2'  => esc_html__( '2 px', 'towy' ),
									'columns_padding_5'  => esc_html__( '5 px', 'towy' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'towy' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'towy' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'towy' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'towy' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'towy' ),
												'value' => esc_html__( 'Contact Form', 'towy' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'towy' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'towy' ),
												'value' => esc_html__( 'Send', 'towy' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'towy' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'towy' ),
												'value' => esc_html__( 'Clear', 'towy' ),
											),
											'button_color'          => array(
												'type'         => 'switch',
												'value'        => 'color1',
												'label'        => esc_html__( 'Button color', 'towy' ),
												'left-choice'  => array(
													'value' => 'color1',
													'label' => esc_html__( 'Color', 'towy' ),
												),
												'right-choice' => array(
													'value' => 'color2',
													'label' => esc_html__( 'Dark', 'towy' ),
												),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'towy' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'towy' ),
												'value' => esc_html__( 'Message sent!', 'towy' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'towy' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'towy' ),
										'value' => esc_html__( 'Oops something went wrong.', 'towy' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'towy' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);