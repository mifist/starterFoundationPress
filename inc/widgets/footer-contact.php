<?php
// add_action( 'widgets_init', 'ICFooterContactWidget');

class ICFooterContactWidget extends \WP_Widget {
	protected $connect;
	function __construct() {
		$this->connect = new WPGraphQLConnect();
		parent::__construct(
			'footer_contact_widget',
			__( 'Widget for Footer Contacts', IC_TEXTDOMAIN ),
			[ 'description' => __( 'Widget to display CF7 in the single house pages sidebar.', IC_TEXTDOMAIN ) ]
		);
	}

	// Widget Backend
	public function form( $instance ) {
		// Check all fields
		$wh_title       = isset( $instance['wh_title'] ) ? $instance['wh_title'] : __( '', IC_TEXTDOMAIN );
		$wh_sub_title   = isset( $instance['wh_sub_title'] ) ? $instance['wh_sub_title'] : __( '', IC_TEXTDOMAIN );
		$wh_description = isset( $instance['wh_description'] ) ? $instance['wh_description'] : __( '', IC_TEXTDOMAIN );
		// Widget admin form ?>
		<br>
		<label for="<?php echo $this->get_field_id( 'wh_title' ); ?>">
			<?php _e( 'Title for Widget:', IC_TEXTDOMAIN ); ?></label><br>
		<input class="widefat" id="<?php echo $this->get_field_id( 'wh_title' ); ?>"wpml_language
			   name="<?php echo $this->get_field_name( 'wh_title' ); ?>" type="text"
			   value="<?php echo esc_attr( $wh_title ); ?>" />
		<br><br>
		<label for="<?php echo $this->get_field_id( 'wh_sub_title' ); ?>">
			<?php _e( 'Sub Title for Widget:', IC_TEXTDOMAIN ); ?></label><br>
		<input class="widefat" id="<?php echo $this->get_field_id( 'wh_sub_title' ); ?>"
			   name="<?php echo $this->get_field_name( 'wh_sub_title' ); ?>" type="text"
			   value="<?php echo esc_attr( $wh_sub_title ); ?>" />
		<br><br>
		<label for="<?php echo $this->get_field_id( 'wh_description' ); ?>">
			<?php _e( 'Description for Widget:', IC_TEXTDOMAIN ); ?></label><br>
		<textarea class="widefat" name="<?php echo $this->get_field_name( 'wh_description' ); ?>"
				  id="<?php echo $this->get_field_id( 'wh_description' ); ?>"
				  cols="30" rows="10"><?php echo esc_attr( $wh_description ); ?></textarea>
		<br><br>

		<?
	}
	public function widget( $args, $instance ) {
		$wh_image = apply_filters( 'widget_image', $instance['wh_image'], $instance  );
		$wh_title = apply_filters( 'widget_name', $instance['wh_title'], $instance  );
		$wh_sub_title = apply_filters( 'widget_title', $instance['wh_sub_title'], $instance  );
		$wh_description = apply_filters( 'widget_text', $instance['wh_description'], $instance  );
		echo $args['before_widget'];
		echo $wh_image ? '<img class="widget-img" src="'.$wh_image.'" alt="'.$wh_title.'">' : '';
		echo $wh_title ? $args['before_title'] . $wh_title . $args['after_title'] : '';
		echo $wh_sub_title ? '<h4 class="widget-sub-title">'.$wh_sub_title.'</h4>' : '';
		?>
		<div class="single-cf7-widget-body">
			<?php echo $wh_description; ?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance                    = [];
		$instance['wh_title']        = $new_instance['wh_title'];
		$instance['wh_left_column']  = $new_instance['wh_left_column'];
		$instance['wh_right_column'] = $new_instance['wh_right_column'];

		// WMPL
		/**
		 * register strings for translation
		 */
		do_action( 'wpml_register_single_string', 'Widgets', 'IC Widget - title', $instance['wh_title'] );
		do_action( 'wpml_register_single_string', 'Widgets', 'IC Widget - Left Column', $instance['wh_left_column'] );
		do_action( 'wpml_register_single_string', 'Widgets', 'IC Widget - Right Column', $instance['wh_right_column'] );
		// do_action( 'wpml_register_single_string', 'Widgets', 'Widget for CF7 - description',
		// $instance['wh_description'] );
		// WMPL

		return $instance;
	}

}
