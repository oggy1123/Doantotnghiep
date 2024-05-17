
$( document ).ready(function() {
    $('#banner_image').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: false, 
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 3000, 
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>'
   });

   $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
// detail_slider
    // $('.detail__for').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: '.detail__nav',
    //     draggable: false
    // });

    // $('.detail__nav').slick({
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     asNavFor: '.detail__for',
    //     dots: false,
    //     // nextArrow: $('.next-slide'),
    //     // prevArrow: false,
    //     focusOnSelect: true,
    //     infinite: true,
    //     vertical: true,
    // });
          

   // hover
   
    $("#category").mouseenter(function() {
         $('#dropdown-category').addClass('d-block');
    });

    $("#dropdown-category").mouseleave(function() {
        $('#dropdown-category').removeClass('d-block');
    });

});
function loadPage(isLoad = false) {
    if (isLoad) {
        $('.loader').removeClass('loader-hidden');
    } else {
        $('.loader').addClass('loader-hidden');
    }
}