/**
*
* -----------------------------------------------------------------------------
*
* Template : batiment – Building Construction and Renovation WordPress Theme 
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
    "use strict";
    
      if ($('.menu-sticky').length){
          // sticky menu
          var header = $('.menu-sticky');
          var win = $(window);
          win.on('scroll', function() {
             var scroll = win.scrollTop();
             if (scroll < 150) {
                 header.removeClass("sticky");
             } else {
                 header.addClass("sticky");
             }
          });        
      }

        if ($('.menu3sticky').length){
          // sticky menu
          var header = $('.menu3sticky');
          var win = $(window);
          win.on('scroll', function() {
             var scroll = win.scrollTop();
             if (scroll < 700) {
                 header.removeClass("sticky");
             } else {
                 header.addClass("sticky");
             }
          });        
      }
    


    if ($('.page-template-page-single-php .nav').length) {
	    $('.nav').onePageNav({
	        currentClass: 'active',
	        changeHash: false,
	        scrollSpeed: 750,
	        scrollThreshold: 0.5,
	        offsetHeight: 100,
	        filter: '',
	        easing: 'swing',
	        begin: function() {
	            //I get fired when the animation is starting
	        },
	        end: function() {
	            //I get fired when the animation is ending
	        },
	        scrollChange: function($currentListItem) {
	            //I get fired when you enter a section and I pass the list item of the section
	        }
	    });  
	}


    if( jQuery('html').attr('dir') == 'rtl' ){
        jQuery(document).ready(function() {
            function bs_fix_vc_full_width_row(){
                var $elements = jQuery('[data-vc-full-width="true"]');
                jQuery.each($elements, function () {
                    var $el = jQuery(this);
                    $el.css('right', $el.css('left')).css('left', '');
                });
            }
            // Fixes rows in RTL
            jQuery(document).on('vc-full-width-row', function () {
                bs_fix_vc_full_width_row();
            });
            // Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
            bs_fix_vc_full_width_row();
        });
    }

    
    // Canvas Menu Js
    $( ".nav-link-container > a" ).off("click").on("click", function(event){
        event.preventDefault();
        $(".nav-link-container").toggleClass("nav-inactive-menu-link-container");
        $(".sidenav").toggleClass("nav-active-menu-container");

    });
    
    $(".nav-close-menu-li > button").on('click', function(event){
        $(".sidenav").toggleClass("nav-active-menu-container");
        $(".content").toggleClass("inactive-body");
    });


    // image loaded portfolio init
    $('.grid').imagesLoaded(function() {
        $('.portfolio-filter').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });
    });
            
    // portfolio Filter
    $('.portfolio-filter button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

    $(".rs-banner .cd-words-wrapper p:first-child").addClass("is-visible");

    // collapse hidden
    $(function(){ 
         var navMain = $(".navbar-collapse"); // avoid dependency on #id
         // "a:not([data-toggle])" - to avoid issues caused
         // when you have dropdown inside navbar
         navMain.on("click", "a:not([data-toggle])", null, function () {
             navMain.collapse('hide');
         });

     });


  	// video 
  	if ($('.player').length) {
  		$(".player").YTPlayer();
  	}
    
    // Portfolio Single Carousel
    if ($('.portfolio-carousel').length) {
        $('.portfolio-carousel').owlCarousel({
            loop: true,
            nav:true,
            autoHeight:true,
            items:1
        })
    }
        
    // magnificPopup init
    $('.image-popup').magnificPopup({
        type: 'image',
        callbacks: {
            beforeOpen: function() {
               this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure animated zoomInDown');
            }
        },
        gallery: {
            enabled: true
        }
    });


    //woocommerce quantity style
    if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
            var num = this,
                  match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if ( ! match ) {
                  return 0;
            }
            return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
        }
    }
    
    // Quantity "plus" and "minus" buttons
    $( document.body ).on( 'click', '.plus, .minus', function() {
        var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {
            if ( max && ( currentVal >= max ) ) {
                $qty.val( max );
            } else {
                $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        } else {
            if ( min && ( currentVal <= min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        }
        // Trigger change event
        $qty.trigger( 'change' );
    });    
    // Get a quote popup

    $('.popup-quote').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#qname',
        removalDelay: 500, //delay removal by X to allow out-animation
        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#qname';
                }
            }
        }
    });
	
	
	 // team init
    $(".team-carousel").each(function() {
        var options = $(this).data('carousel-options');
        $(this).owlCarousel(options); 
    });

    // portfolio
    $(".portfolio-carousel-slider").each(function() {
        var options = $(this).data('carousel-options');
        $(this).owlCarousel(options); 
    });
	
	 
   // partner init

    $(".partner-carousel").each(function() {
        var options = $(this).data('carousel-options');
        $(this).owlCarousel(options); 
    });


    // testimonial init   
    $('.testi-carousel').slick({
		centerMode: true,
		centerPadding: '0px',
		slidesToShow: 3,
		focusOnSelect: true,
		responsive: [
		{
		  breakpoint: 768,
		  settings: {
		    arrows: false,
		    centerMode: true,
		    centerPadding: '0px',
		    slidesToShow: 3
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
		    arrows: false,
		    centerMode: true,
		    centerPadding: '0px',
		    slidesToShow: 1
		  }
		}
		]
    });
		
    
    $(".testi-item  a.tab").on('click', function(e){
          e.preventDefault();
          slideIndex = $(this).index();
          $( '.testi-carousel' ).slickGoTo( parseInt(slideIndex) );
    }); 

    // blog init
     $(".blog-carousel").each(function() {
            var options = $(this).data('carousel-options');
            $(this).owlCarousel(options);
    });

    $(function(){ 
        $( "ul.children" ).addClass( "sub-menu" );
    });    
     //Videos popup jQuery activation code
    $('.popup-videos').magnificPopup({
        disableOn: 10,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    }); 
  //preloader
    $(window).on( 'load', function() {
        $("#loading").delay(1000).fadeOut(500);
        $("#loading-center").on( 'click', function() {
        $("#loading").fadeOut(500);
        })

    if($(window).width() < 992) {
		$('.rs-menu').css('height', '0');
		$('.rs-menu').css('opacity', '0');
		$('.rs-menu').css('z-index', '-1');
		$('.rs-menu-toggle').on( 'click', function(){
				$('.rs-menu').css('opacity', '1');
				$('.rs-menu').css('z-index', '1');
			});
	    }
    })
		
    // Counter Up  
    $('.rs-counter').counterUp({
        delay: 20,
        time: 1500
    });
	
    // scrollTop init
	var win=$(window);
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });	

    $(".skew-style2, .skew-style3").prepend('<div class="sppb-row-overlay"></div>');
    $(".skew-style2, .skew-style3").append('<div class="vc_clearfix"></div>');
    
    $(".skew-style-curve").prepend('<div class="sppb-row-overlay"></div>');

    $(function(){ 
        $( ".sidenav ul.children" ).addClass( "sub-menu" );
    });

    $(".sidenav .menu li").on('click', function() {
        $(this).children("ul.sub-menu").slideToggle();
    })
    
    $(".sticky_search").click(function(){
        $(".sticky_form").slideToggle();
    });
    
    // Last Word init
    $(".blog-style").html(function(){
      var text= $(this).text().trim().split(" ");
      var last = text.pop();
      return text.join(" ") + (text.length > 0 ? " <span class='date_style'>" + last + "</span>" : last);
    }); 
	
	//Feature Left
	$('#feature-left').owlCarousel({
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		items: 1,
		mouseDrag: true,
		dotsContainer: '#item-thumb',
	});
	

})(jQuery);