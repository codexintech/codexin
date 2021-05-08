/*--------------------
	Mobile Menu
-------------------- */
var cButton = document.querySelector('.c-menu__close');
if (cButton) {
	var slideLeft = new Menu({
		wrapper: '#o-wrapper',
		type: 'slide-left',
		menuOpenerClass: '.c-button',
		maskId: '#c-mask'
	});
}

var slideLeftBtn = document.querySelector('#c-button--slide-left');
if (slideLeftBtn) {
	slideLeftBtn.addEventListener('click', function(e) {
		e.preventDefault;
		slideLeft.open();
	});
}

jQuery(document).ready(function($) {
	// Check if element exists
	$.fn.cxExists = function() {
		return this.length > 0;
	};

	$(window).on('load', function() {
		$('body').addClass('document-loaded');
	});

	/*--------------------
		Sticky Menu
	-------------------- */
	var navContainer = document.querySelector('.intelligent-header');
	var headroom = new Headroom(navContainer);
	headroom.init();

	$(window).on('scroll', function() {
		var height = $(window).scrollTop();

		if (height < 100) {
			$('.intelligent-header').removeClass('scrolling-up');
		} else {
			$('.intelligent-header').addClass('scrolling-up');
		}
	});

	/*--------------------
		Element Spacings
	-------------------- */
	var intHeight = $('.intelligent-header').outerHeight();
	$('.intelligent-header-space').height(intHeight);

	$(window).on('load resize', function() {
		var intHeight = $('.intelligent-header').outerHeight();
		$('.intelligent-header-space').height(intHeight);
	});

	/*--------------------
		Carousel
	-------------------- */
	// if ($('.testimonial-container').cxExists()) {
	// 	var swiper = new Swiper('.testimonial-container', {
	// 		loop: true,
	// 		spaceBetween: 50,
	// 		slidesPerView: 1,
	// 		speed: 1000,
	// 		parallax: true,

	// 		autoplay: {
	// 			delay: 7000
	// 		},

	// 		pagination: {
	// 			el: '.swiper-pagination',
	// 			clickable: true
	// 		},

	// 		navigation: {
	// 			nextEl: '.swiper-arrow.next',
	// 			prevEl: '.swiper-arrow.prev'
	// 		}
	// 	});

	// 	var sliderHeight = $('.swiper-wrapper').innerHeight();
	// 	$('.swiper-slide').height(sliderHeight);
	// }


	/*--------------------
		Main Menu
	-------------------- */
	$('.sf-menu').superfish({
		delay: 0,
		animation: { opacity: 'show' },
		animationOut: { opacity: 'hide' },
		speed: 'fast',
		autoArrows: false,
		disableHI: true
	});

	$('#main_menu .sub-menu').hover(function() {
		var menu = $(this);
		// var child_menu = $('.site-nav ul.sub-menu .sub-menu');
		var child_menu = $(this).find('ul');
		if ($(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width()) {
			$(child_menu).css({ left: 'inherit', right: '100%' });
		}
	});

	/*--------------------
		Mobile Sub Menu
	-------------------- */
	var nav = $('#mobile-menu');
	// adds toggle button to li items that have children
	nav.find('li a').each(function() {
		if ($(this).next().length > 0) {
			$(this)
				.parent('li')
				.addClass('has-child')
				.append('<a class="drawer-toggle" href="#"><i class="fa fa-angle-down"></i></a>');
		}
	});

	// expands the dropdown menu on each click
	nav.find('li .drawer-toggle').on('click', function(e) {
		e.preventDefault();
		$(this).parent('li').children('ul').stop(true, true).slideToggle(250);
		$(this).parent('li').toggleClass('open');
	});

	$('.sidebar-widget p:empty').remove();

	/*--------------------
		Scroll to top
	-------------------- */
	$(window).on('scroll', function() {
		if ($(window).scrollTop() > 200) {
			$('#toTop').fadeIn();
		} else {
			$('#toTop').fadeOut();
		}
	});

	$('#toTop').on('click', function() {
		$('html,body').animate(
			{
				scrollTop: 0
			},
			500
		);
	});

	/*--------------------
		Page Loader
	-------------------- */
	$('.cx-pageloader').delay(300).fadeOut('fast');

});
