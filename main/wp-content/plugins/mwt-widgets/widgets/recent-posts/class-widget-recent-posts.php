<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'MWT_Widget_Recent_Posts' ) ) {
	return;
}

class MWT_Widget_Recent_Posts extends WP_Widget_Recent_Posts {

	/**
	 * @internal
	 */

	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/default-widgets.php */
		$title    = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$category = isset( $instance['category'] ) ? $instance['category'] : '';

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$show_date  = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
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
		$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/recent-posts/views/widget-regular.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			esc_html_e( 'View not found', 'mwt' );
		}

		ob_end_flush();
	}

	public function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['category']   = $new_instance['category'];
		$instance['number']     = (int) $new_instance['number'];
		$instance['show_date']  = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

		return $instance;
	}


	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$category   = isset( $instance['category'] ) ? $instance['category'] : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date  = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

		?>

		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'mwt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/></p>

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

		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'mwt' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number"
			       value="<?php echo absint( $number ); ?>" size="3"/></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?>
		          id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"
		          name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>"/>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'mwt' ); ?></label>
		</p>

		<?php
	}
}