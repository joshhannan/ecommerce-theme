	<footer>
		<div class="logo"><img width="300" height="150" src="http://placehold.it/600x300" /></div><!--/logo-->
<?php
	$args = array(
		'theme_location' => 'footer-navigation-1',
		'container' => 'nav',
		'container_class' => 'nav footer-navigation-1'
	);
	wp_nav_menu( $args );
	$args = array(
		'theme_location' => 'footer-navigation-2',
		'container' => 'nav',
		'container_class' => 'nav footer-navigation-2'
	);
	wp_nav_menu( $args );
?>
		<div class="newsletter">
			
		</div><!--/newsletter-->
	</footer>
</body>
</html>
<?php
	wp_footer();
?>