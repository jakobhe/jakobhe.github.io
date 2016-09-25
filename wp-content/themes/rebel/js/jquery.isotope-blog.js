(function($) {
	"use strict";

	$(document).ready(function() {

		var blogContainer = $('.mt-blog.grid');
		blogContainer.imagesLoaded( function() {
			blogContainer.isotope({
				itemSelector: '.hentry',
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});
		});

	});

})(jQuery);