jQuery(function ($) {

    var mainBanner = $('.bd-example .carousel-item:first');
    mainBanner.addClass('active');

    var carouselBanner = $('.brand-slider .carousel-item:first');
    carouselBanner.addClass('active');

    var test = $('.small-image');
    test.click(function () {

        var smimgs = $(this).siblings();

        smimgs.removeClass('active');

        $(this).addClass('active');

        var imge = $(this).children('.modal-small-image');

        var imgsrc = imge.attr('src');

        var modalimage = $(this).closest('.modal-image-container').find('.modal-image');


        modalimage.attr('src', imgsrc);
        // price.text('300');
        // alert(price);
    });

    var countminus = $(".counter-minus");
    countminus.click(function () {

        var count = $(this).closest('.counter-block').find('.count');

        var priceObj = $(this).closest('.catalog-item-common').find('.catalog-price');

        var baseprice = parseInt( priceObj.attr('id'));

        // alert(baseprice);

        var countvalue = parseInt(count.text());

        var nowprice = parseInt( priceObj.text());

        if (countvalue > 1) {
            count.text(countvalue - 1)
            priceObj.text(nowprice - baseprice + ' руб.');
        }

    });

    var countplus = $(".counter-plus");
    countplus.click(function () {

        var count = $(this).closest('.counter-block').find('.count');

        var priceObj = $(this).closest('.catalog-item-common').find('.catalog-price');

        var baseprice = parseInt( priceObj.attr('id'));

        var nowprice = parseInt( priceObj.text());

        //alert(price);

        var countvalue = parseInt(count.text());


        count.text(countvalue + 1)
        priceObj.text(nowprice + baseprice + ' руб.');

    })

})