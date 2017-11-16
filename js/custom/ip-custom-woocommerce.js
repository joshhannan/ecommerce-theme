/* ===========================================================
	IP CUSTOM WOOCOMMERCE SCRIPTS
=========================================================== */

jQuery(function($) {

/* ===========================================================
	WOOCOMMERCE - VARIATION CHANGE CALLBACK
	- this callback fires after a valid combination
	of a variation is selected
=========================================================== */

	var dp_table = $('.dynamic-pricing-table'),
		dp_rows = $('.dp-row'),
		dp_rows_all = $('.dp-row.all');

	$(".variations_form").on("woocommerce_variation_select_change", function () {
		// clear dynamic pricing table when variation is changed
		dp_table.removeClass('active');
		dp_rows.removeClass('active');
	});

	$(".single_variation_wrap").on("show_variation", function (event, variation) {
		// display the selected variations pricing table
		var var_id = variation.variation_id,
			var_dp_rows = $('.dp-row.' + var_id);

		if (var_dp_rows.length > 0) {
			dp_table.addClass('active');
			var_dp_rows.addClass('active');
		}
	});

/* ===========================================================
	SOCIAL SHARE - SINGLE TEMPLATE
=========================================================== */

	if( $('body').hasClass('single-product') ) {
		$('.social-share').share_it({
			buttons: [
				{
					button_type: 'facebook',
					button_html: '<span class="icon">&#xf09a;</span>'

				},{
					button_type: 'twitter',
					button_html: '<span class="icon">&#xf099;</span>'
				},{
					button_type: 'google_plusone_share',
					button_html: '<span class="icon">&#xf0d5;</span>'
				},{
					button_type: 'linkedin',
					button_html: '<span class="icon">&#xf0e1;</span>'
				}
			]
		});
	
	}

/* ===========================================================
	CATEGORY DROPDOWN
=========================================================== */

	$('.product-categories-dropdown-list select').on('change', function() {
		var url = $(this).val();
		window.location.href = url;
	});

/* ===========================================================
	MINICART
=========================================================== */

	$('.cart-toggle').on('click', function() {
		if( !$('.widget_shopping_cart_content:empty').length ) {
			console.log( 'not empty' );
			if( $(this).hasClass('open') ) {
				$(this).removeClass('open');
				$('.widget_shopping_cart_content').removeClass('open');
			} else {
				$(this).addClass('open');
				$('.widget_shopping_cart_content').addClass('open');
			}
		} else {
			console.log( 'empty' );

			$.ajax({
				type: 'POST',
				url:  ajax_call.ajaxurl,
				data: {
					action: 'load_woo_cart'
				},
				error: function(data) {
					console.log('fail');
				},
				success: function(data) {
					console.log('success!');
					console.log(data);
				},
				complete: function() {
					console.log('complete');
					/*$( '.widget_shopping_cart_content' ).append( data );*/
				}
			});
		}
	});

});