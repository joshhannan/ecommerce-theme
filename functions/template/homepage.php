<?php
/* ===========================================================
	DEFAULT CONFIG SETTINGS
=========================================================== */

function add_categories_section() {
	/*
		Category Loop
	 */
	$args = array(
		'taxonomy' => 'product_cat',
		'hide_empty' => 0
	);
	$categories = get_categories( $args );

	foreach( $categories as $category ) :
		echo '<h1>' . $category->name . '</h1>';
		$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true ); 
		$image = wp_get_attachment_url( $thumbnail_id );
		if( $image ) :

			echo $image;
		else :
			echo 'placeholder image';
		endif;
	endforeach;

}

add_action( 'categories', 'add_categories_section' );