<?php
/* ===========================================================
	FRONTPAGE - BANNER
=========================================================== */

function add_frontpage_banner_section() {

	$id = get_option( 'page_on_front' );
	$banners = get_field( 'frontpage_banner', $id );

	if( !empty( $banners ) ) :

		$count = 0;

		$html = '<style>';
		foreach( $banners as $banner ) :

			$count++;
			$html .= '#slide-' . $count . ' { background-image: url( "' . $banner['banner_image']['sizes']['banner-image'] . '" ); }';

		endforeach;
		$html .= '</style>';

		$count = 0;

		$html .= '<section class="front-page-banner">';
		foreach( $banners as $banner ) :

			$count++;

			$html .= '<article id="slide-' . $count . '" class="slide">';
			$html .= '<div class="content">' . $banner['banner_content'] . '</div>';
			$html .= '</article>';

		endforeach;
		$html .= '</section>';

		echo $html;

	else :

		return;

	endif;

}

add_action( 'frontpage_banner', 'add_frontpage_banner_section' );

/* ===========================================================
	FRONTPAGE - CATEGORIES
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