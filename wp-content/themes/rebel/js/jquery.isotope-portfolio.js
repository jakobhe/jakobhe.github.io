(function($) {
	"use strict";

	$(document).ready(function() {

		function portfolioGridInit() {

			var containerGrid = $('.portfolio-filterable.grid');
			containerGrid.imagesLoaded( function() {
				containerGrid.isotope({
					itemSelector: '.portfolio-item-wrapper',
					masonry: {
						columnWidth: '.grid-sizer'
					}
				});
			});

			// filter items when filter link is clicked
			$('.portfolio-filters li').on('click', function() {
				// remove class no-transition when filter item is clicked
				$('.portfolio-filterable.grid').removeClass('no-transition');
				$('.portfolio-filters li').removeClass('current');
					$(this).addClass('current');
						var selector = $(this).find('a').attr('data-filter');
						containerGrid.isotope({ filter: selector });
					return false;
			});

		}

		portfolioGridInit();


		function portfolioStandardInit() {

			var containerStandard = $('.portfolio-filterable.standard');
			containerStandard.imagesLoaded( function() {
				containerStandard.isotope({
					itemSelector: '.portfolio-item-wrapper',
					masonry: {
						columnWidth: '.grid-sizer'
					}
				});
			});

			// filter items when filter link is clicked
			$('.portfolio-filters li').click(function(){
			// remove class no-transition when filter item is clicked
			$('.portfolio-filterable.standard').removeClass('no-transition');
			$('.portfolio-filters li').removeClass('current');
				$(this).addClass('current');
					var selector = $(this).find('a').attr('data-filter');
					containerStandard.isotope({ filter: selector });
				return false;
			});

		}

		portfolioStandardInit();

	});

})(jQuery);