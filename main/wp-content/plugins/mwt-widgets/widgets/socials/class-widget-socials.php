<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ( defined( 'FW' ) ) && ! ( class_exists( 'MWT_Widget_Socials' ) ) ) :

	class MWT_Widget_Socials extends WP_Widget {

		/**
		 * Widget constructor.
		 */
		private $options;
		private $prefix;

		function __construct() {

			$widget_ops = array(
				'classname'   => 'widget_socials',
				'description' => esc_html__( 'Add socials links', 'mwt' ),
			);

			parent::__construct( false, esc_html__( 'Theme - Socials', 'mwt' ), $widget_ops );

			//Create our options by using Unyson option types
			$this->options = array(
				'title'        => array(
					'type'  => 'text',
					'label' => esc_html__( 'Widget Title', 'mwt' ),
				),
				'social_icons' => array(
					'type'          => 'addable-popup',
					'label'         => esc_html__( 'Icons in list', 'mwt' ),
					'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'mwt' ),
					'desc'          => esc_html__( 'Create your tabs', 'mwt' ),
					'template'      => '{{=icon_title}}',
					'popup-options' => array(
						'icon_title'      => array(
							'label' => esc_html__( 'Social Title', 'mwt' ),
							'desc'  => esc_html__( 'Enter the title', 'mwt' ),
							'type'  => 'text',
							'value' => esc_html__( '', 'mwt' ),
						),
						'icon_class' => array(
							'type'  => 'icon',
							'value' => '',
							'label' => esc_html__( 'Social Icon', 'mwt' )
						),
						'icon_link'  => array(
							'type'  => 'text',
							'value' => '',
							'label' => esc_html__( 'Social URL', 'mwt' ),
						),
					),
				),
			);
			$this->prefix  = 'widget_socials';
		}

		function widget( $args, $instance ) {
			extract( wp_parse_args( $args ) );

			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$instance = $params;

			$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/socials/views/widget.php';

			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
                esc_html_e( 'View not found', 'mwt' );
			}
		}

		function update( $new_instance, $old_instance ) {
			return fw_get_options_values_from_input(
				$this->options,
				FW_Request::POST( fw_html_attr_name_to_array_multi_key( $this->get_field_name( $this->prefix ) ), array() )
			);
		}

		function form( $values ) {

			$prefix = $this->get_field_id( $this->prefix ); // Get unique prefix, preventing duplicated key
			$id     = 'fw-widget-options-' . $prefix;

			// Print our options
			echo '<div class="fw-force-xs fw-theme-admin-widget-wrap fw-framework-widget-options-widget" data-fw-widget-id="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '">';

			echo fw()->backend->render_options( $this->options, $values, array(
				'id_prefix'   => $prefix . '-',
				'name_prefix' => $this->get_field_name( $this->prefix ),
			) );
			echo '</div>';

			return $values;
		}
	}

endif;