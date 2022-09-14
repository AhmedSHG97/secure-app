<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'MWT_Widget_Post_Slider' ) ) {
	return;
}

/**
 * MWT_Widget_Post_Slider widget class.0
 */
class MWT_Widget_Post_Slider extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_theme_post_slider',
			'description' => esc_html__( "Your site&#8217;s Posts organized in Slider.", 'mwt' )
		);
		parent::__construct( 'recent-post-slider', esc_html__( 'Theme - Post Slider', 'mwt' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$unique_id = uniqid();

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$show_navigation = isset( $instance['show_navigation'] ) ? $instance['show_navigation'] : false;
		$autoplay        = isset( $instance['autoplay'] ) ? $instance['autoplay'] : false;


		/**
		 * Filter the arguments for the Recent Post widget.
		 *
		 * @see WP_Query::get_post()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$posts = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'category_name'       => $category,
			'ignore_sticky_posts' => true
		) ) );

		//including widget view
		$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/post-slider/views/widget-slider.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			esc_html_e( 'View not found', 'mwt' );
		}

		ob_end_flush();
	}

	public function update( $new_instance, $old_instance ) {
		$instance                    = $old_instance;
		$instance['title']           = strip_tags( $new_instance['title'] );
		$instance['number']          = (int) $new_instance['number'];
		$instance['category']        = $new_instance['category'];
		$instance['show_navigation'] = isset( $new_instance['show_navigation'] ) ? (bool) $new_instance['show_navigation'] : false;
		$instance['autoplay']        = isset( $new_instance['autoplay'] ) ? (bool) $new_instance['autoplay'] : false;

		return $instance;
	}

	public function form( $instance ) {
		$title           = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number          = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$show_navigation = isset( $instance['show_navigation'] ) ? (bool) $instance['show_navigation'] : false;
		$autoplay        = isset( $instance['autoplay'] ) ? (bool) $instance['autoplay'] : false;

		?>
		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'mwt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/></p>

		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'mwt' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number"
			       value="<?php echo absint( $number ); ?>" size="3"/></p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category', 'mwt' ); ?></label>
			<?php wp_dropdown_categories( array(
				'show_option_all' => esc_html__( 'All Categories', 'mwt' ),
				'hide_empty'      => 0,
				'selected'        => $category,
				'name'            => $this->get_field_name( 'category' ),
				'id'              => $this->get_field_id( 'category' ),
				'value_field'     => 'slug'
			) ); ?>
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_navigation ); ?>
		          id="<?php echo esc_attr( $this->get_field_id( 'show_navigation' ) ); ?>"
		          name="<?php echo esc_attr( $this->get_field_name( 'show_navigation' ) ); ?>"/>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_navigation' ) ); ?>"><?php esc_html_e( 'Show navigation dots?', 'mwt' ); ?></label>
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked( $autoplay ); ?>
		          id="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>"
		          name="<?php echo esc_attr( $this->get_field_name( 'autoplay' ) ); ?>"/>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>"><?php esc_html_e( 'Auto play', 'mwt' ); ?></label>
		</p>

		<?php
	}
}