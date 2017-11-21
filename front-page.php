<?php
	get_header();
?>
<main>
<?php
	do_action( 'frontpage_banner' );

	do_action( 'categories' );

	do_action( 'callout' );

	do_action( 'featured_products' );
?>
</main>
<?php
	get_footer();
?>