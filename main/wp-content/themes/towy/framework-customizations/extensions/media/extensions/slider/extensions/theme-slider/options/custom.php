<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slide_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slide background', 'towy' ),
		'desc'        => esc_html__( 'Select slide background color', 'towy' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'towy' ),
			'ls ms' => esc_html__( 'Light Muted', 'towy' ),
			'ds'    => esc_html__( 'Dark', 'towy' ),
			'ds ms' => esc_html__( 'Dark Muted', 'towy' ),
			'cs'    => esc_html__( 'Color', 'towy' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'towy' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'towy' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'towy' ),
			'text-center' => esc_html__( 'Center', 'towy' ),
			'text-right'  => esc_html__( 'Right', 'towy' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'towy' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'towy' ),
		'box-options' => array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'towy' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'towy' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'towy' ),
					'h2' => esc_html__( 'H2 tag', 'towy' ),
					'h4' => esc_html__( 'H4 tag', 'towy' ),
					'p'  => esc_html__( 'P tag', 'towy' ),

				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'towy' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'towy' ),
				'choices' => array(
					''               => esc_html__( 'Default', 'towy' ),
					'slideDown'      => esc_html__( 'slideDown', 'towy' ),
					'scaleAppear'    => esc_html__( 'scaleAppear', 'towy' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'towy' ),
					'fadeInUp'       => esc_html__( 'fadeInUp', 'towy' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'towy' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'towy' ),
					'fadeIn'         => esc_html__( 'fadeIn', 'towy' ),
					'slideRight'     => esc_html__( 'slideRight', 'towy' ),
					'slideUp'        => esc_html__( 'slideUp', 'towy' ),
					'slideLeft'      => esc_html__( 'slideLeft', 'towy' ),
					'expandUp'       => esc_html__( 'expandUp', 'towy' ),
					'slideExpandUp'  => esc_html__( 'slideExpandUp', 'towy' ),
					'expandOpen'     => esc_html__( 'expandOpen', 'towy' ),
					'bigEntrance'    => esc_html__( 'bigEntrance', 'towy' ),
					'hatch'          => esc_html__( 'hatch', 'towy' ),
					'tossing'        => esc_html__( 'tossing', 'towy' ),
					'pulse'          => esc_html__( 'pulse', 'towy' ),
					'floating'       => esc_html__( 'floating', 'towy' ),
					'bounce'         => esc_html__( 'bounce', 'towy' ),
					'pullUp'         => esc_html__( 'pullUp', 'towy' ),
					'pullDown'       => esc_html__( 'pullDown', 'towy' ),
					'stretchLeft'    => esc_html__( 'stretchLeft', 'towy' ),
					'stretchRight'   => esc_html__( 'stretchRight', 'towy' ),
					'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'towy' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'towy' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'towy' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'towy' ),
					'slideInDown'    => esc_html__( 'slideInDown', 'towy' ),
					'slideInLeft'    => esc_html__( 'slideInLeft', 'towy' ),
					'slideInRight'   => esc_html__( 'slideInRight', 'towy' ),
					'moveFromLeft'   => esc_html__( 'moveFromLeft', 'towy' ),
					'moveFromRight'  => esc_html__( 'moveFromRight', 'towy' ),
					'moveFromBottom' => esc_html__( 'moveFromBottom', 'towy' ),
				),
			),
			'layer_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'towy' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'towy' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'towy' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'towy' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'towy' ),
					'highlight'  => esc_html__( 'First theme main color', 'towy' ),
					'highlight2' => esc_html__( 'Second theme main color', 'towy' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'towy' ),
					'black'      => esc_html__( 'Dark theme color', 'towy' ),

				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'towy' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'towy' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'towy' ),
					'bold' => esc_html__( 'Bold', 'towy' ),
					'thin' => esc_html__( 'Thin', 'towy' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'towy' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'towy' ),
				'choices' => array(
					''                => esc_html__( 'None', 'towy' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'towy' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'towy' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'towy' ),

				),
			),
		),
		'template'    => esc_html__( 'Slider Layer', 'towy' ),

		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'towy' ),
//		'sortable' => true,
	),
	'slide_button'     => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Slide button', 'towy' ),
		'desc'        => esc_html__( 'Select slide button. Leave empty if no button needed', 'towy' ),
		'choices'     => array(
			''                     => esc_html__( 'None', 'towy' ),
			'theme_button'         => esc_html__( 'Regular button', 'towy' ),
			'theme_button color1'  => esc_html__( 'Color button', 'towy' ),
			'theme_button color2'  => esc_html__( 'Color2 button', 'towy' ),
			'theme_button inverse' => esc_html__( 'Inverse button', 'towy' ),
			'scroll' => esc_html__( 'Scroll button', 'towy' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),

	'slide_button_text'      => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slide button text', 'towy' ),
		'desc'  => esc_html__( 'Text in button', 'towy' ),
	),
	'slide_button_link'      => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slide button link', 'towy' ),
		'desc'  => esc_html__( 'Paste a link', 'towy' ),
	),
	'slide_button_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeIn',
		'label'   => esc_html__( 'Button animation type', 'towy' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'towy' ),
		'choices' => array(
			''               => esc_html__( 'Default', 'towy' ),
			'slideDown'      => esc_html__( 'slideDown', 'towy' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'towy' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'towy' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'towy' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'towy' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'towy' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'towy' ),
			'slideRight'     => esc_html__( 'slideRight', 'towy' ),
			'slideUp'        => esc_html__( 'slideUp', 'towy' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'towy' ),
			'expandUp'       => esc_html__( 'expandUp', 'towy' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'towy' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'towy' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'towy' ),
			'hatch'          => esc_html__( 'hatch', 'towy' ),
			'tossing'        => esc_html__( 'tossing', 'towy' ),
			'pulse'          => esc_html__( 'pulse', 'towy' ),
			'floating'       => esc_html__( 'floating', 'towy' ),
			'bounce'         => esc_html__( 'bounce', 'towy' ),
			'pullUp'         => esc_html__( 'pullUp', 'towy' ),
			'pullDown'       => esc_html__( 'pullDown', 'towy' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'towy' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'towy' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'towy' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'towy' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'towy' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'towy' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'towy' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'towy' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'towy' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'towy' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'towy' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'towy' ),
		),
	),
);