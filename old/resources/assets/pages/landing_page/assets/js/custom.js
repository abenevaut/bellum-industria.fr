/* ============================================================
 * Plugin Core Init
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
 
'use strict';

$(document).ready(function() {

    $('#start_tour').click(function() {
        $("#notifications").velocity("scroll", {
            duration: 800
        });
    })
    var slider = new Swiper('#reviews-1', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',

        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        speed:1000,
        loop:true,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false,
        grabCursor: true,
          // Responsive breakpoints
          breakpoints: {
            // when window width is <= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is <= 480px
            480: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is <= 640px
            640: {
              slidesPerView: 3,
              spaceBetween: 30
            }
          }
    });

    var slider = new Swiper('#reviews-2', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',

        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        speed:1000,
        loop:true,
        grabCursor: true,
        autoplay: 3500,
        autoplayDisableOnInteraction: false,
          // Responsive breakpoints
          breakpoints: {
            // when window width is <= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is <= 480px
            480: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is <= 640px
            640: {
              slidesPerView: 3,
              spaceBetween: 30
            }
        }
    });


	$("#btnLicenseTrigger").popover({
	    html: true, 
	    trigger: 'focus',
		content: function() {
	          return $('#license').html();
	        }
	});

	$(document).on("click",".license-selector",function(e){
		e.preventDefault();

		if($(this).data("type") == "regular"){
			$(".regularls").show()
			$(".extendedls").hide()
		}
		else{
			$(".regularls").hide()
			$(".extendedls").show()
		}
		$('#btnLicenseTrigger').popover('hide')
	});


	$("#btnLive").on("click",function(e){
		e.preventDefault();
		 $('html,body').animate({
        	scrollTop: $("#sectionLayout").offset().top},
        '700');
		});
    // $('.preview-selector').on("click",function () {
    //     var url = $(this).data("url");
    //     window.location = url;
    // });
});