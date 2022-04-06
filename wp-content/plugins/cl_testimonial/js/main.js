jQuery(function($) {
	/*-------------------------------------
       Slick Slider jQuery activation code
       -------------------------------------*/
    jQuery('.testimonial-slide').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 3,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    jQuery('.testimonial-slide2').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 3,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    jQuery('.testimonial-slide3').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 1,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    jQuery('.testimonial-slide4').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 2,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    jQuery('.testimonial-slide5').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 1,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    jQuery('.testimonial-slide7').slick({
       centerMode: true,
		  	centerPadding: '0',
		  	slidesToShow: 2,
		  	arrows: true,
		  	dots: true,
		  	responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        dots: false,
		        centerMode: true,
		        centerPadding: '0',
		        slidesToShow: 1
		      }
		    }
		  ]
    });

    // testimonial init

    jQuery('.testi-carousel').slick({

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
		        dots: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1

              }

            }

          ]

        });

    jQuery(".testi-item  a.tab").on('click', function(e){
      e.preventDefault();
      slideIndex = $(this).index();
      jQuery( '.testi-carousel' ).slickGoTo( parseInt(slideIndex) );
    });



    /*----------------------------
    Testimonial js active
    ------------------------------ */

     jQuery('.testimonials').slick({
       slidesToShow: 1,
       slidesToScroll: 1,
       arrows: false,
       fade: true,
       asNavFor: '.testimonials-nav'
     });
     jQuery('.testimonials-nav').slick({
       slidesToShow: 3,
       slidesToScroll: 1,
       asNavFor: '.testimonials',
       dots: true,
       focusOnSelect: true,
       centerMode:true,
       centerPadding: '0',
     });
});