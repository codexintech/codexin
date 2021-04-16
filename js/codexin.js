// For Responsive Menu

var cButton= document.querySelector('.c-menu__close');
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


jQuery(document).ready(function($){
	// Check if element exists
	$.fn.cxExists = function() {
		return this.length > 0;
	};
	
	$(window).on('load', function() {
		$('body').addClass('document-loaded');
	});
  
  
  	var $screen_height = $( window ).height();
	var mastHeight = $('header.header').outerHeight();
	var footr_height = $('footer#footer').outerHeight();
	var page_title = $('#page_title').outerHeight();
	if( ! page_title ){
		page_title = 0 ;
	}
	var $match_height =  $screen_height - ( mastHeight + footr_height + page_title );
	console.log( $screen_height );
	console.log( mastHeight );
	console.log( footr_height );
	console.log( page_title );
	$('.match-height').css('min-height', $match_height);
	$('.products-area-wrapper').css('min-height', $match_height); // product empty page
	

	$('#page_title').css('margin-top', mastHeight);
	$('#showcase').css('margin-top', mastHeight);
	$(window).on('load resize ', function() {

		$screen_height = $( window ).height();
		var mastHeight = $('header.header').outerHeight();
		var footr_height = $('footer#footer').outerHeight();

		$('#page_title').css('margin-top', mastHeight);
		$('#showcase').css('margin-top', mastHeight);

		$match_height = $screen_height - ( mastHeight + footr_height );

		$('.match-height').css('min-height', $match_height);
		$('.products-area-wrapper').css('min-height', $match_height); // product empty page

	});

  
  
  
  
  
  
	var options = {
	    // vertical offset in px before element is first unpinned
	    offset : 120,
	}
	// $("header.header").headroom();
	var myElement = document.querySelector("header.header");
	// construct an instance of Headroom, passing the element
	var headroom  = new Headroom(myElement,options);
	// initialise
	headroom.init();
	// console.log('Changed ');



	var mastHeight = $('header.header').outerHeight();
	$('#page_title').css('margin-top', mastHeight); 
	// $('#showcase').css('margin-top', mastHeight); 
	$(window).on('load resize ', function () {
		var mastHeight = $('header.header').outerHeight();
		$('#page_title').css('margin-top', mastHeight); 
		$('#showcase').css('margin-top', mastHeight); 

	});

	// var header_selector = $('header.header');
	// var header_height = header_selector.outerHeight();
	// $(window).scroll(function() {
	// 	var scroll = $(window).scrollTop();
	// 	if (scroll >= header_height + 200) {
	// 		header_selector.addClass('fixed-head');
	// 		// console.log(header_height);
	// 	} else {
	// 		header_selector.removeClass('fixed-head');
	// 	}
	// });
    
	// activating wow (animation on scroll) 
	// new WOW().init(); 


	// activating superfish menu
	$(".sf-menu").superfish({

	  delay:       0,                            // one second delay on mouseout
	  //animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
	  animation: {opacity: 'show', height: 'show'},
	  animationOut: {opacity: 'hide'},
	  speed:       'fast',                          // faster animation speed
	  autoArrows:  false,
	  disableHI: true, 

	});

  $('#main_menu .sub-menu').hover(function() {
      var menu = $(this);
      // var child_menu = $('.site-nav ul.sub-menu .sub-menu');
      var child_menu = $(this).find('ul');
      if( $(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width() ){
          $(child_menu).css({"left": "inherit", "right": "100%"});
         }        
  });
  
  	// Mobile menu sub-menu actions

	var nav = $("#mobile-menu");
	// adds toggle button to li items that have children
	nav.find('li a').each(function() {
		if ($(this).next().length > 0) {
			$(this).parent('li').addClass('has-child').append('<a class="drawer-toggle" href="#"><i class="fa fa-angle-down"></i></a>');
		}
	});

	// expands the dropdown menu on each click 
	nav.find('li .drawer-toggle').on('click', function(e) {
		e.preventDefault();
		$(this).parent('li').children('ul').stop(true, true).slideToggle(250);
		$(this).parent('li').toggleClass('open');
	});


	$('.sidebar-widget p:empty').remove();

	//Parallax

	$(".mpopup, .img-gallery").click(function(){
		$("html").addClass("pop-triggered");
	});

	/************************************************************
		Sticky Header
	*************************************************************/



    /*--------------------------------------------------------------
    smooth scrolling
    ---------------------------------------------------------------- */
	/*
	$("ul#main_menu li a").on('click', function() {
		// $('#header_top').height();
		var headerHeight = $('#header_top').outerHeight();
		$("ul#main_menu li").removeClass('current-menu-item');

		$(this).parent().addClass('current-menu-item');
		var top = ($($(this).attr('href')).offset() || { "top": NaN }).top;
		if (!isNaN(top)) {
		   $('html, body').stop().animate({
				scrollTop: top - headerHeight 
			}, 800, 'easeOutCubic');
		}
		return false;
	});
*/

	// jQuery(document).ready(function(){
	// 	// Add smooth scrolling to all links
	// 	jQuery("ul.mainNav a").on('click', function(event) {

	// 	// Make sure this.hash has a value before overriding default behavior
	// 	if (this.hash !== "") {
	// 		// Prevent default anchor click behavior
	// 		// event.preventDefault();

	// 		// Store hash
	// 		var hash = this.hash;

	// 		// Using jQuery's animate() method to add smooth page scroll
	// 		// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	// 		jQuery('html, body').animate({
	// 				scrollTop: jQuery(hash).offset().top
	// 			}, 800, function(){

	// 			// Add hash (#) to URL when done scrolling (default click behavior)
	// 			window.location.hash = hash;
	// 		});
	// 	} // End if
	// });
	// });


	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();    
	    if (scroll >= 100) {
	        $('#header_top').addClass("header-deep-background");
	    }else{
	        $('#header_top').removeClass("header-deep-background");
	    }
	});

    /*--------------------------------------------------------------
    scrollUp button (Go to top) at the right bottom corner of window
    ---------------------------------------------------------------- */

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });

    $("#toTop").on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    }); //scrollup finished

    // page loader
    $('.cx-pageloader').delay(300).fadeOut('fast');


	
	$('body').on('click','.test-class',function(event) {

			event.preventDefault();
			// console.log(fd);
			var data = {
				action: 'test_action',
				cx_nonce: cx_script.ajx_nonce
			}

			jQuery.ajax({
				type: 'POST',
				url: cx_script.ajax_url,
				data: data,
				// contentType: false,
				// processData: false,
				beforeSend: function() {
					// $("#ajaxify").html('<p style="font-size:20px;line-height:1.5em;font-weight:bold;">Please Wait. Processing your data...</p>');
				},
				success: function(response){
					console.log(response);
				},
				error: function(){
					alert("Error Loading Data...");
				},
				complete: function() {
					// var $myNewElement = $("#ajaxify");
					// $('html, body').animate({
					// 	scrollTop: $myNewElement.offset().top
					// }, 'slow');
				}
			});


	});






});
	



