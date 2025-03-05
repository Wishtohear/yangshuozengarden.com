jQuery(function($) {
    // Main slider
    $('#carouselExampleInterval').owlCarousel({
        items: 1,
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: false,
        dots: true
    });

    // Thumbs slider
    var carousel_thumbs = $('#carousel-thumbs').owlCarousel({
        items: 4,
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });

    // Sync the main slider and the thumbs slider
    $('#carouselExampleInterval').on('changed.owl.carousel', function(event) {
        var index = event.item.index;
        carousel_thumbs.trigger('to.owl.carousel', [index, 300, true]);
    });

    $('#carousel-thumbs').on('click', '.owl-item', function(e) {
        e.preventDefault();
        var index = $(this).index();
        $('#carouselExampleInterval').trigger('to.owl.carousel', [index, 300, true]);
    });

    // Custom navigation
    $('button#prev').click(function() {
        $('#carouselExampleInterval').trigger('prev.owl.carousel');
    });

    $('button#next').click(function() {
        $('#carouselExampleInterval').trigger('next.owl.carousel');
    });
});
