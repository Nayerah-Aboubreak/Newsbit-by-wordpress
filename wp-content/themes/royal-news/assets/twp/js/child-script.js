/**
 * Custom js for theme
 */

(function ($) {
    $(document).ready(function () {
        $(".mainbanner-jumbotron-new").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: false,
            nextArrow: '<i class="twp-icon slide-icon slide-next ion-ios-arrow-right alt-bgcolor"></i>',
            prevArrow: '<i class="twp-icon slide-icon slide-prev ion-ios-arrow-left alt-bgcolor"></i>'
        });

    });

})(jQuery);