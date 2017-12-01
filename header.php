<!DOCTYPE html>
<!--[if lte IE 6]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8 lte-ie7 lte-ie6"> <![endif]-->
<!--[if lte IE 7]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8 lte-ie7"> <![endif]-->
<!--[if lte IE 8]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8"> <![endif]-->
<!--[if lte IE 9]>     <html <?php language_attributes(); ?> class="no-js lte-ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<section class="top">
			<div class="container">
				Topbar.  Site Name.  Since 1492.
				<div class="right">
<?php
	if ( is_user_logged_in() ) :
?>
 					<a class="account header-icon" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><span><?php _e('My Account','woothemes'); ?></span></a>
 <?php
 	else :
?>
 					<a class="account header-icon" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><span><?php _e('Login / Register','woothemes'); ?></span></a>
<?php
	endif;
?>
					<a class="checkout" href="<?php echo get_permalink( get_option('woocommerce_checkout_page_id') ); ?>">Checkout</a>
				</div><!--/right-->
			</div><!--/container-->
		</section><!--/topbar-->
		<section class="main">
			<div class="container">
				<a class="logo" href="<?php echo get_bloginfo('url'); ?>"><img style="max-width: 300px;" src="http://placehold.it/600x300" /></a><!--/logo-->
<?php
	$args = array(
		'theme_location' => 'primary-navigation',
		'container' => 'nav',
		'container_class' => 'nav primary-navigation'
	);
	wp_nav_menu( $args );
?>
			</div><!--/container-->
		</section><!--/main-->
	</header>