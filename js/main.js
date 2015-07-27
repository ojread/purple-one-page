(function ($) {

	// The navbar and WP admin bar need to push content down.
	var navbarHeight = $('#navbar').height();
	var topOffset = navbarHeight;
	if ($('body').hasClass('admin-bar')) {
		topOffset += 32;
	}
	//console.log(topOffset);


	/*$('body').css('margin-top', topOffset);
	$('body').css('margin-top', 50);*/



	// Any section can be full screen.

	var fullScreenSections = [];

	function addFullScreenSection(selector, minHeight) {
		fullScreenSections.push({
			element: $(selector),
			minHeight: minHeight
		});
	}

	function resizeFullScreenSections() {
		var newHeight = $(window).height();
		newHeight -= topOffset;

		//for (var i = 0; i < fullScreenSections.length; i++) {
		//	section = fullScreenSections[i];

			/*if (newHeight < section.minHeight) {
				newHeight = section.minHeight;
			}*/

		//	section.element.height(newHeight);
		//}

		$('.fullScreenHeight').height(newHeight);

	}

	// On load.
	//resizeFullScreenSections();

	// On window resize.
	/*$(window).resize(function () {
		resizeFullScreenSections();
	});*/



	// Smooth scrolling when nav links are clicked.
	//$("#navbar ul li a[href^='#']").on('click', function(e) {
	// Apply to all # links.
	$("a[href*='#']").on('click', function(e) {
		// Store target hash
		var hash = this.hash;

		// Is the target element on the current page?
		if ($(hash).length) {
			// Prevent default anchor click behavior
			e.preventDefault();

			// Animate scroll.
			$('html, body').animate({
				scrollTop: $(hash).offset().top //- topOffset
			}, 300, function(){
				// When done, add hash to url
				window.location.hash = hash;
			});
		}
		// Otherwise allow the browser to follow the link.
	});

	// Bootstrap scrollspy highlights nav links as you scroll.
	$('body').scrollspy({
		target: '#navbar-main',
		offset: topOffset	// Offset for accuracy.
	});




	// Slider class
	function Slider(container) {
		this.container = container;
		this.current = -1;

		this.slides = this.container.children('.section-bg-img');
		this.slideCount = this.slides.length
		this.slides.hide();

		this.next();

		var that = this;
		setInterval(function () {
			that.next();
		}, 5000);
	}

	Slider.prototype.next = function () {
		this.slides.fadeOut();
		this.current ++;
		if (this.current >= this.slideCount) {
			this.current = 0;
		}
		$(this.slides[this.current]).fadeIn();
	};

	$('.section-bg').each(function () {
		var bg = $(this);
		var images = bg.children('.section-bg-img');
		if (images.length > 1) {
			new Slider(bg);
		}
	});


})(jQuery);
