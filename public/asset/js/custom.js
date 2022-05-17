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
// $(document).ready(function () {

$('.addToCart').click(function (e) {
    e.preventDefault();

    var product_id = $(this).closest('#product_data').find('.prod_id').val();
    //    alert(product_id);
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
            window.location.reload();
            alert(response.status);

        }
    });
});
// })

/**
 * quantity button
 */

// $(document).ready(function () {

$('.increment').click(function (e) {
    e.preventDefault();

    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    // alert(inc_value);
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;

    if (value < 10) {
        value++;

        // $('.qty-input').val(value);
        $(this).closest('.product_data').find('.qty-input').val(value);

    }
});

$('.decrement').click(function (e) {
    // Stop acting like a button
    e.preventDefault();

    var dec_value = $(this).closest('.product_data').find('.qty-input').val();

    var value = parseInt(dec_value, 10);

    value = isNaN(value) ? 0 : value;

    if (value > 1) {
        value--;

        $(this).closest('.product_data').find('.qty-input').val(value);

    }

});

/**
 * delete product
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

/**
 * update product quantity
 */
$('.updateQuantity').click(function (e) {
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var qty = $(this).closest('.product_data').find('.qty-input').val();
    var rowId = $(this).closest('.product_data').find('.rowId').val();
    console.log(rowId);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: `/update-cart/${rowId}`,
        data: {
            // 'product_id': product_id,
            'qty': qty
        },
        success: function (response) {
            alert(response.status);
            window.location.reload();
        }
    });
});


$('.book').click(function (e) {
    e.preventDefault();
    var name = $('.name').val();
    var email = $('.email').val();
    var phone = $('.phone').val();
    var guest = $('.guest').val();
    var time = $('.time').val();
    var date = $('.date').val();
    var message = $('.message').val();



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/table_book",
        data: {
            'name': name,
            'email': email,
            'phone': phone,
            'guest': guest,
            'time': time,
            'date': date,
            'message': message
        },
        success: function (response) {
            alert(response.status);
            // window.location.reload();
        }
    });
});


// });