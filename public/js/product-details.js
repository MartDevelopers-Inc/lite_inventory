

$(function() {
	"use strict";


// slider

$(document).ready(function(){


    $('.product-image-slider').slick({
       dots: true,
       arrows: true,
       infinite: true,
       speed: 300,
       slidesToShow: 1,
       slidesToScroll: 1,
       autoplay: true,
       prevArrow: "<button type='button' class='slick-prev pull-left'><i class='bi bi-chevron-left'></i></button>",
       nextArrow: "<button type='button' class='slick-next pull-right'><i class='bi bi-chevron-right'></i></button>",
      
     });


   });



   
    

});
