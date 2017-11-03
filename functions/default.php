<?php
/* ===========================================================
	DEFAULT CONFIG SETTINGS
=========================================================== */
	/*
		Add this to remove wordpress top bar on frontend of site.
	 */
	/*add_filter('show_admin_bar', '__return_false');*/

	add_theme_support('automatic-feed-links');
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('widgets');
	remove_action('wp_head', 'wp_generator');
	/*
		Add these to make your site WooCommerce compatible.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

/* ===========================================================
	STYLE / SCRIPT QUEUE
=========================================================== */
	
	function ecomm_scripts_styles() {
		/*
			Enqueue Scripts

			wp_enqueue_script('script-name', get_template_directory_uri() . '/js/script-name.js', array('jquery'), null, true);

			Enqueue Stylesheet
			wp_enqueue_style('style-name', get_template_directory_uri() . '/style-name.css', false, null);
		*/

		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );
	}
	add_action('wp_enqueue_scripts', 'ecomm_scripts_styles');

/* ===========================================================
	IMAGE SIZES
=========================================================== */
	
	add_image_size('slide-image', 2000, 670, false );

/* ===========================================================
	NAV MENUS
=========================================================== */

function register_my_navigation_menus() {
	register_nav_menus(
		array(
			'primary-navigation' => __( 'Primary Navigation' ),
			'shop-navigation' => __( 'Shop Navigation' )
		)
	);
}
add_action( 'init', 'register_my_navigation_menus' );
