jQuery(function ($) {

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

        var countvalue = parseInt(count.text());

        if (countvalue > 1) {
            count.text(countvalue - 1)
        }

    });

    var countplus = $(".counter-plus");
    countplus.click(function () {

        var count = $(this).closest('.counter-block').find('.count');

        var countvalue = parseInt(count.text());


        count.text(countvalue + 1)


    });

    var propertyObj = $('.property-action-change');
    propertyObj.click(function () {


        var changePropertyId = $(this).attr('id');



        var inputObj = $(this).closest('.row').find('.col-lg-6 .property-input');

        var changePropertyName = inputObj.val();
        //
        // alert(changePropertyName);
        // alert(changePropertyId);


        $.post(
            '/admin/category',
            {
                prop_id : changePropertyId,
                new_prop_name : changePropertyName

            }
        );


    });


    var propertyCatalogObj = $('.property-value-action-change');
    propertyCatalogObj.click(function () {


        var id = $(this).attr('id');



        var inputObj = $(this).closest('.row').find('.col-lg-6 .property-input');



        var changePropertyValue = inputObj.val();
        //
        // alert(changePropertyValue);
        // alert(id);
        //

        $.post(
            '/admin/productchange',
            {
                propRecordId : id,
                propValue : changePropertyValue

            }
        );
        inputObj.addClass('post');

    });

    var newPropertyCatalogObj = $('.property-value-action-insert');
    newPropertyCatalogObj.click(function () {

        var propertyId = $(this).attr('id');

        var inputObj = $(this).closest('.row').find('.col-lg-6 .property-input');

        var productIdObj = $(this).closest('.col-lg-2').find('.product-id');

        var productId = productIdObj.attr('id');

        var PropertyValue = inputObj.val();

        // alert(PropertyValue);
        // alert(propertyId);
        // alert(test);


        $.post(
            '/admin/productchange',
            {
                propId : propertyId,
                newPropValue : PropertyValue,
                productId : productId

            }
        );
        inputObj.addClass('post');

    });

})