// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function () {
    $('select').niceSelect();
});

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

/**
 * add to cart ajax
 */
$(document).ready(function () {

    $('.addToCart').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('#product_data').find('.prod_id').val();
        //alert(product_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id
            },
            success: function (response) {
                alert(response.status);

            }
        });
    });
})

/**
 * quantity button
 */

$(document).ready(function () {

    $('.increment').click(function (e) {
        e.preventDefault();


        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);


            
        // var inc_value = $(this).closest('.product_data').find('#quantity').val();
        // var value = parseInt(inc_value, 10);

        // value = isNaN(quantity) ? 0 : quantity;

        // if (value < 10) {
        //     value++;

        //     $(this).closest('.product_data').find('#quantity').val(value);

        // }
    });

    $('.decrement').click(function (e) {
        // Stop acting like a button
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('#quantity').val();

        var value = parseInt(dec_value, 10);

        value = isNaN(quantity) ? 0 : quantity;

        if (value > 1) {
            value--;

            $(this).closest('.product_data').find('#quantity').val(value);
        }
    });

    /**
     * delete
     */
    $('.delete-cart').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        //alert(product_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart",
            data: {
                'product_id': product_id
            },
            success: function (response) {
                window.location.reload();
                alert(response.status);

            }
        });
    });
});