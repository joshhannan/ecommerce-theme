/* ===========================================================
	IP CUSTOM GALLERY SHORTCODE
=========================================================== */



(function($) {

	function initGallery( sync1, sync2 ) {
		sync1.owlCarousel({
			items: 1,
			dots: false,
			nav: false,
			autoHeight: true,
			navText: ['', '']
		});

		sync2.owlCarousel({
			items : 3,
			margin: 16,
			responsive : {
				0 : {
					items: 3,
					margin: 16,
					dots: true
				},
				769 : {
					items: 4,
					margin: 16,
					dots: true
				},
				1200 : {
					items: 5,
					margin: 16,
					dots: true
				}
			}
		});

		sync2.on("click", ".owl-item", function(event) {
			event.preventDefault();
			var number = $(this).find('.image').data('id');
			sync1.trigger( 'to.owl.carousel', [number, 1, true] );
		});

		console.log('loaded');
	}

	$.fn.ip_gallery = function( options ) {
		var settings = $.extend({
			default: ''
		}, options );
		if( $('.ip-gallery').length ) {
			$(this).each(function() {

				var object = $(this);
				var sync1 = object.find(".hero-slider");
				var sync2 = object.find(".thumbnail-slider");

				sync1.on('initialized.owl.carousel', function(event) {
					object.find('.loading').addClass('hidden');
					object.removeClass('gallery-loading');
				});

				var loaded_image = object.find('#image-0 img');
				loaded_image.addClass('test');
				
				loaded_image.imagesLoaded( function() {
					initGallery( sync1, sync2 );
				});

			});
		} else {
			console.log('No Galleries.');
			return;
		}
		return this;
	}; //  END IP GALLERY FUNCTION

}(jQuery));