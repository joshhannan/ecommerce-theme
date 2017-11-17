<?php
class SidebarWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Sidebar Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
		echo 'output';
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function myplugin_register_widgets() {
	register_widget( 'SidebarWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );