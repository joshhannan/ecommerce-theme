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