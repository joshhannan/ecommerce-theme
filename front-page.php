<?php
	get_header();
?>
<main>
	<section class="banner">
<?php
	do_action( 'frontpage_banner' );
?>
	</section><!--/banner-->
	<section class="categories">

<?php
	/*
		Product Loop
	 */
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	if( $the_query->have_posts() ) :
		while( $the_query->have_posts() ) : the_post();
			the_title();
		endwhile;
	endif;

	do_action( 'categories' );
?>
	</section><!--/categories-->
	<section class="callout">
<?php
	do_action( 'callout' );
?>
	</section><!--/callout-->
	<section class="featured-products">
<?php
	do_action( 'featured_products' );
?>
	</section><!--/featured-products-->
</main>
<?php
	get_footer();
?>