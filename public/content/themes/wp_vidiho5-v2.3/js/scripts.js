jQuery(window).on("load", function() {
	"use strict";

	/* -----------------------------------------
	 FlexSlider Init
	 ----------------------------------------- */


	var homeSlider = jQuery('.home-slider');
	if ( homeSlider.length ) {
		homeSlider.flexslider({
			prevText: '',
			nextText: '',
			animation: ThemeOption.slider_effect,
			direction: ThemeOption.slider_direction,
			slideshow: Boolean(ThemeOption.slider_autoslide),
			slideshowSpeed: Number(ThemeOption.slider_speed),
			animationSpeed: Number(ThemeOption.slider_duration),
			controlNav: false,
			directionNav: false,
			start: function(slider) {
				slider.removeClass('loading');
			},
			after: function( slider ){
				var currentSlide = slider.slides.eq(slider.currentSlide);
				currentSlide.siblings().each(function() {
					var src = jQuery(this).find('iframe').attr('src');
					jQuery(this).find('iframe').attr('src',src);
				});
			}
		});
	}

	var navSlider = jQuery('.secondary-slider');
	if ( navSlider.length ) {
		navSlider.flexslider({
			slideshow: Boolean(ThemeOption.slider_autoslide),
			controlNav: false,
			prevText: '',
			nextText: '',
			sync: '.home-slider'
		});
	}

	jQuery(".widget_ci-items > .row > div[class^='col']").matchHeight();
});

jQuery(document).ready(function($) {
	"use strict";


	/* -----------------------------------------
	 Responsive Menus Init with mmenu
	 ----------------------------------------- */
	var mainNav = $("#navigation"),
			mobileNav = $("#mobilemenu");
	mainNav.clone().removeAttr('id').removeClass().appendTo(mobileNav);
	mobileNav.find('li').removeAttr('id');

	mobileNav.mmenu({
		offCanvas: {
			position: 'top',
			zposition: 'front'
		}
	});

	/* -----------------------------------------
	 Main Navigation Init
	 ----------------------------------------- */
	$('#navigation').superfish({
		delay:       300,
		animation:   { opacity:'show', height:'show' },
		speed:       'fast',
		dropShadows: false
	});

	/* -----------------------------------------
	 Responsive Videos with fitVids
	 ----------------------------------------- */
	$('.main').fitVids();

	/* -----------------------------------------
	 Lightbox
	 ----------------------------------------- */
	$(".zoom").each(function() {
		$(this).iLightBox();
	});

	$(".lbx").iLightBox();

});