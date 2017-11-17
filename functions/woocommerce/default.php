<?php
	function ecomm_theme_wrapper_start() {
		global $post;
		echo '<section class="woo-content ip-block" role="main"><div class="container">';
	}
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	add_action('woocommerce_before_main_content', 'ecomm_theme_wrapper_start', 10);

	function ecomm_theme_wrapper_end() {
		echo '</div><!--/container--></section><!--/woo-content-->';
	}
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action( 'woocommerce_after_main_content', 'ecomm_theme_wrapper_end', 10 );