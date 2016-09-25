/* START CUSTOM JQUERY =================================================================== */
(function($) {
"use strict";

$(document).ready(function() {

/*----------------------------------*/
/*		    Navigation
/*----------------------------------*/

	function mainNavInit() {

		$("#mt-main-nav li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(200);
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});

		if($('#mt-main-nav').hasClass('underlined')) {
			$('.sf-menu > li > a').append('<i class="underline"></i>');
		}

	}

	mainNavInit();



	function responsiveNavInit() {

		$(document).ready(function() {
			var current_width = $(window).width();
			if(current_width > 991) {
				jQuery('.sf-menu-mobile').css('display', 'none');
			}
		});
		$(window).resize(function() {
			var current_width = $(window).width();
			if(current_width > 991) {
				jQuery('.sf-menu-mobile').css('display', 'none');
			}
		});

		var mobileNav = $('.navigation-wrapper');
		$('.mt-mobile-nav-trigger').click(function() {
			mobileNav.find('.sf-menu-mobile').slideToggle(400);
			return false;
		});

	}

	responsiveNavInit();

/*----------------------------------*/
/*		 Fixed header
/*----------------------------------*/

	function fixedHeaderInit() {

		if($('body').hasClass('fixed-header')) {
			var headerHeight = $('.header-wrapper').height();
			$('.content-wrapper').css('padding-top',headerHeight);

			// Adding smaller class after refreshing the page
			if($(document).scrollTop() > 1) {
				$('.header-wrapper').addClass('with-shadow');
			}

			// Navigation height change
			$(window).scroll(function() {
				if($(document).scrollTop() > 1) {
					$('.header-wrapper').addClass('with-shadow');
				} else {
					$('.header-wrapper').removeClass('with-shadow');
				}
			});

		}

	}

	function recalcFixedHeader() {
		var current_width = $(window).width();
		if(current_width > 991) {
			fixedHeaderInit();
		}
	}

	recalcFixedHeader();

	$(window).resize(function() {
		recalcFixedHeader();
	});	

/*----------------------------------*/
/*		  Lightbox plugin
/*----------------------------------*/

	function lightboxInit() {

		// add 'lightbox-photo' class for flickr widget
		$('.flickr_badge_image').each(function() {
			$(this).find('img').addClass('img-rounded');
		});

		// adding lightbox support for default WP gallery shortcode
		$('.gallery dl dt.gallery-icon a').addClass("image-lightbox");

		// add lightbox to image
		$("a.image-lightbox").attr('rel','prettyPhoto');
		$(".image-lightbox[rel^='prettyPhoto']").prettyPhoto();

		// add lightbox to gallery
		$(".mt_gallery_item a[rel^='prettyPhoto']").prettyPhoto();

	}

	lightboxInit();

/*----------------------------------*/
/*		     Carousel
/*----------------------------------*/

	function carouselInit() {
		if($().owlCarousel) {

			// testimonial carousel
			$('.testimonial-carousel').each(function() {
				$('.owl-testimonial').owlCarousel({
					autoPlay: 8000,
					stopOnHover : true,
					paginationSpeed: 1000,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					singleItem: true,
					autoHeight: true
				});
			});

			// portfolio carousel
			$('.portfolio-carousel').each(function() {
				$('.owl-portfolio.columns4').owlCarousel({
					slideSpeed: 400,
					rewindSpeed: 800,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 4,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,2]
				});

				$('.owl-portfolio.columns3').owlCarousel({
					slideSpeed: 400,
					rewindSpeed: 800,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 3,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,2]
				});
			});

			// team carousel
			$('.team-carousel').each(function() {
				$('.owl-team.columns4').owlCarousel({
					slideSpeed: 400,
					rewindSpeed: 800,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 4,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,2]
				});

				$('.owl-team.columns3').owlCarousel({
					slideSpeed: 400,
					rewindSpeed: 800,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 3,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,2]
				});
			});

			// clients carousel
			$('.clients-carousel').each(function() {

				$('.owl-clients.columns6').owlCarousel({
					paginationSpeed: 1200,
					autoPlay: 4000,
					rewindSpeed: 2000,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 6,
					itemsDesktop: [1199,5],
					itemsDesktopSmall: [979,4],
					itemsTablet: [768,3],
					itemsMobile: [479,2]
				});

				$('.owl-clients.columns5').owlCarousel({
					paginationSpeed: 1200,
					autoPlay: 4000,
					rewindSpeed: 2000,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 5,
					itemsDesktop: [1199,4],
					itemsDesktopSmall: [979,3],
					itemsTablet: [768,3],
					itemsMobile: [479,2]
				});

				$('.owl-clients.columns4').owlCarousel({
					paginationSpeed: 1200,
					autoPlay: 4000,
					rewindSpeed: 2000,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 4,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,3],
					itemsTablet: [768,3]
				});

				$('.owl-clients.columns3').owlCarousel({
					paginationSpeed: 1200,
					autoPlay: 4000,
					rewindSpeed: 2000,
					navigation: false,
					navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
					items: 3,
					itemsDesktop: [1199,3],
					itemsDesktopSmall: [979,2],
					itemsTablet: [768,2]
				});
			});

		}
	}

	carouselInit();
	
/*----------------------------------*/
/*		 Tooltips and popovers
/*----------------------------------*/

	function tooltipsInit() {

		// social tooltips in content and footer
		$('.content .socialtooltip, .footer .socialtooltip, .footer-bottom .socialtooltip').tooltip({container: 'body'});

		// social tooltips in header
		$('.header-socials .socialtooltip').tooltip({placement: 'bottom', container: 'body'});

		// tooltip shortcode
		$(".tooltip-shortcode").tooltip({container: 'body'});

		// popover shortcode
		$(".popover-shortcode").popover({container: 'body'});

	}

	tooltipsInit();


	function tooltipBlock() {
		$('.mt-tooltip').each( function() {
			// find actual items and add tooltip-block class to their parent
			$(this).find('> .alert').parent().addClass('tooltip-block');
			$(this).find('> .mt-accordion').parent().addClass('tooltip-block');
			$(this).find('> .mt-toggle').parent().addClass('tooltip-block');
			$(this).find('> .panel-group').parent().addClass('tooltip-block');
			$(this).find('> .panel').parent().addClass('tooltip-block');
			$(this).find('> .pt-column').parent().addClass('tooltip-block');
			$(this).find('> .service-wrapper').parent().addClass('tooltip-block');
			$(this).find('> .progress-wrapper').parent().addClass('tooltip-block');
			$(this).find('> .jumbotron').parent().addClass('tooltip-block');
			$(this).find('> .well').parent().addClass('tooltip-block');
			$(this).find('> .tabs-nav').parent().addClass('tooltip-block');
			$(this).find('> .piechart-wrapper').parent().addClass('tooltip-block');
			$(this).find('> .gallery-overlay').parent().addClass('tooltip-block');
			$(this).find('> img.aligncenter').parent().addClass('tooltip-block');
		});
	}
	tooltipBlock();

/*----------------------------------*/
/*		 Toggle and accordions
/*----------------------------------*/

	function toggleInit() {
		$('.mt-toggle-title').each( function() {
			var toggle = $(this).parent();
			$(this).click(function() {
				toggle.find('.mt-toggle-inner').slideToggle(200);
				toggle.toggleClass('active');
				return false;
			});
		});
	}
	toggleInit();
	

	function accordionInit() {
		if($().accordion) {
			$('.mt-accordion').accordion({
				header: 'h3',
				heightStyle: 'content',
				animate: 200
			});
		}
	}
	accordionInit();

/*----------------------------------*/
/*	    Pie charts, counts, animations
/*----------------------------------*/

	$(window).load(function() {

		// piechart
		function pieChartInit() {
			$('.piechart-wrapper').each( function() {
				$(this).appear(function() {
					$(this).find('.piechart').easyPieChart({
						scaleColor: false,
						lineCap: 'round',
						animate: { duration: 1200, enabled: true },
						onStep: function(from, to, percent) {
							$(this.el).find('.number').text(Math.round(percent));
						}
					});
				},{accX: 0, accY: 0});
			});
		}
		pieChartInit();

		// countTo plugin
		function countToInit() {
			$('.milestone-wrapper').each(function() {
				$(this).appear(function() {
					var $endNum = parseInt($(this).find('.milestone-number').text());
					$(this).find('.milestone-number').countTo({
						from: 0,
						to: $endNum,
						speed: 1500,
						refreshInterval: 30
					});
				},{accX: 0, accY: 0});
			});
		}
		countToInit();

		// css animations init
		function cssAnimInit() {
			$('.mt-animated').each( function() {
				var animationType = $(this).attr('data-anim-type');
				$(this).appear(function() {
					$(this).addClass('animated').addClass(animationType);
				},{accX: 0, accY: 0});
			});	
		}
		cssAnimInit();

		// progress bars
		function progressInit() {
			$('.skill-bar-wrapper').each(function() {
				$('.skill-bar-wrapper').appear(function() {
					var sklw = $(this).find('.skill-bar span').attr('data-width');
					$(this).find('.skill-bar span').animate({'width': sklw + '%'}, 2000, 'easeOutExpo');
				});
			});
		}
		progressInit();

	});

/*----------------------------------*/
/*		       General
/*----------------------------------*/

	function generalScriptsInit() {

		// media responsive
		$('video').attr('width','100%');
		$('video').attr('height','100%');
		$('audio').attr('width','100%');
		$('audio').attr('height','100%');
		$('.content-wrapper').fitVids();

		// top top plugin
		$().UItoTop({ easingType: 'easeOutExpo' });

		// add proper classes to comment form
		$('#commentform').addClass('row');
		$('p.comment-notes, p.comment-form-comment, p.form-allowed-tags, p.form-submit, p.logged-in-as').addClass('col-md-12');
		$('p.comment-form-author, p.comment-form-email, p.comment-form-url').addClass('col-md-4');
		$('a.comment-reply-link').prepend('<i class="glyphicon glyphicon-share-alt"></i>');
		

		// add class for custom lists
		$('div.list-unstyled').find('> ul').addClass('list-unstyled');
		$('div.list-inline').find('> ul').addClass('list-inline');

		// add proper classes to table
		$('.mt-table').find('> table').addClass('table');
		$('.mt-table.table-striped').find('> table').addClass('table').addClass('table-striped');
		$('.mt-table.table-bordered').find('> table').addClass('table').addClass('table-bordered');
		$('.mt-table.table-hover').find('> table').addClass('table').addClass('table-hover');
		$('.mt-table.table-condensed').find('> table').addClass('table').addClass('table-condensed');

		// parallax section
		if($().parallax) {
			$('.mt-section.parallax-yes').each(function() {
				var parallaxSpeed;
				$(this).attr('data-parallax-speed') ? parallaxSpeed = $(this).attr('data-parallax-speed') : parallaxSpeed = 0.2;
				$(this).parallax("50%", parallaxSpeed); 
			});
		}
		
	}
	generalScriptsInit();


/* END CUSTOM JQUERY =================================================================== */

});

})(jQuery);