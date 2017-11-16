jQuery(function($) {

/*==============================================
	RESPONSIVE
==============================================*/

	var window_width = $(window).outerWidth( true );
	$(window).resize(function() {
		window_width = $(window).outerWidth( true );
	});

/*==============================================
	MOBILE NAVIGATION
==============================================*/

	$('.mobile-menu-toggle').click(function() {
		$(this).toggleClass('open');
		$('.primary-navigation').toggleClass('open');
	});

	$('.mobile-search-toggle').click(function() {
		$(this).toggleClass('open');
		$('.search').toggleClass('open');
	});

	$('.primary-navigation > ul > li.menu-item-has-children').each(function() {
		$(this).prepend( '<span class="toggle"></span>' );
	});

	$('.primary-navigation .menu-item-has-children .toggle').click(function() {
		if( $(this).hasClass('open') ) {

			$('.sub-menu').removeClass('open');
		 	$(this).removeClass('open');

		} else {

			$('.primary-navigation .menu-item-has-children .toggle').removeClass('open');
			$('.sub-menu').removeClass('open');

			$(this).addClass('open');
			$(this).siblings('.sub-menu').addClass('open');

		}
	});

/*==============================================
	HOME
==============================================*/

	$('.ip-front-page-banner .ip-slides').owlCarousel({
		items: 1,
		nav: true,
		dots: true,
		loop: true,
		autoHeight: true,
		autoplay: true,
		autoplayTimeout: 8000,
		autoplayHoverPause: false,
	});

	if( window_width > 768 ) {
		var slides = $('.promo-slider .ip-slide').length;
		var timer = $('.promo-slider').data('timer')*1000;
		if( slides > 1 ) {
			$('.promo-slider').owlCarousel({
				items: 1,
				animateIn: 'flipInX',
				animateOut: 'flipOutX',
				autoplay: true,
				autoplayTimeout: timer,
				loop: true
			});
		}
	}

/*==============================================
	CONTENT
==============================================*/

	/*
		wraps each select element for styling
	 */
	$('select').not('.product-categories-dropdown-list select,.woocommerce-billing-fields select, .woocommerce-shipping-fields select, .woocommerce-address-fields select, .comment-form-rating select, #wc_checkout_add_ons select').each(function() {
		var select_id = $(this).attr('id');
		$(this).wrap('<div class="select-wrapper"></div>');
	});

	/*
		wraps iframes with ip-video for youtube
		responsive video styling.  If incorporating other iframes,
		may need to designate class for youtube.
	 */
	$('.ip-body').find('iframe').not('#gform_ajax_frame_2, #gform_ajax_frame_7, .ip-video iframe').wrap('<div class="ip-video"></div>');

	$('.ip-body img').not('.ip-image img, .product img, .ip-gallery img, .woocommerce-cart .product-thumbnail img').each(function() {
		var classes = $(this).attr('class');
		var image_width = $(this).attr('width');
		var image_height = $(this).attr('height');
		$(this).css({
			maxWidth: image_width+'px',
			maxHeight: image_height+'px'
		});
		$(this).wrap('<div class="ip-image '+classes+'"></div>');
		$(this).removeAttr('class').removeAttr('width').removeAttr('height');
	});

/*==============================================
	BLOG
==============================================*/

	$('.blog-category-dropdown select').on('change', function() {
		var url = $(this).val();
		window.location.href = url;
	});

/*==============================================
	GALLERY INIT
==============================================*/
	
	$('.ip-gallery').ip_gallery();
	
});