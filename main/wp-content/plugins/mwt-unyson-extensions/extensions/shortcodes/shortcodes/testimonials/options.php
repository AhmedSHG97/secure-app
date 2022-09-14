<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'              => array(
		'label' => esc_html__( 'Title', 'towy' ),
		'desc'  => esc_html__( 'Optional Testimonials Title', 'towy' ),
		'type'  => 'text',
	),
	'testimonials_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'testimonials_layout' => array(
				'type'    => 'select',
				'value'   => 'flexslider',
				'label'   => esc_html__( 'Testimonials Layout', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined testimonials layout', 'towy' ),
				'choices' => array(
					'flexslider'         => esc_html__( 'Big FlexSlider Carousel', 'towy' ),
					'single_testimonial' => esc_html__( 'Single Testimonial', 'towy' ),
				),
			),
		),
		'choices' => array(
			'flexslider'         => array(
				'testimonials' => array(
					'label'         => esc_html__( 'Testimonials', 'towy' ),
					'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'towy' ),
					'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'towy' ),
					'type'          => 'addable-popup',
					'template'      => '{{=author_name}}',
					'popup-options' => array(
						'content'       => array(
							'label' => esc_html__( 'Quote', 'towy' ),
							'desc'  => esc_html__( 'Enter the testimonial here', 'towy' ),
							'type'  => 'textarea',
						),
						'author_avatar' => array(
							'label' => esc_html__( 'Image', 'towy' ),
							'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'towy' ),
							'type'  => 'upload',
						),
						'author_name'   => array(
							'label' => esc_html__( 'Name', 'towy' ),
							'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'towy' ),
							'type'  => 'text'
						),
						'author_job'    => array(
							'label' => esc_html__( 'Position', 'towy' ),
							'desc'  => esc_html__( 'Can be used for a job description', 'towy' ),
							'type'  => 'text'
						),
						'site_name'     => array(
							'label' => esc_html__( 'Website Name', 'towy' ),
							'desc'  => esc_html__( 'Linktext for the above Link', 'towy' ),
							'type'  => 'text'
						),
						'site_url'      => array(
							'label' => esc_html__( 'Website Link', 'towy' ),
							'desc'  => esc_html__( 'Link to the Persons website', 'towy' ),
							'type'  => 'text'
						)
					)
				),
			),
			'single_testimonial' => array(
				'content'       => array(
					'label' => esc_html__( 'Quote', 'towy' ),
					'desc'  => esc_html__( 'Enter the testimonial here', 'towy' ),
					'type'  => 'textarea',
				),
				'author_avatar' => array(
					'label' => esc_html__( 'Image', 'towy' ),
					'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'towy' ),
					'type'  => 'upload',
				),
				'author_name'   => array(
					'label' => esc_html__( 'Name', 'towy' ),
					'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'towy' ),
					'type'  => 'text'
				),
				'author_job'    => array(
					'label' => esc_html__( 'Position', 'towy' ),
					'desc'  => esc_html__( 'Can be used for a job description', 'towy' ),
					'type'  => 'text'
				),
				'site_name'     => array(
					'label' => esc_html__( 'Website Name', 'towy' ),
					'desc'  => esc_html__( 'Linktext for the above Link', 'towy' ),
					'type'  => 'text'
				),
				'site_url'      => array(
					'label' => esc_html__( 'Website Link', 'towy' ),
					'desc'  => esc_html__( 'Link to the Persons website', 'towy' ),
					'type'  => 'text'
				)
			),
		),
	),
);