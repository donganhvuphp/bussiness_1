import {COMMON} from "../../common/common.js";

const PRODUCT_DETAIL = (function () {
    let modules = {};

    modules.handleQuantity = function () {
        let quantity = $("input[name='quantity']");
        let quantityCurrent = $(document).find('.quantity-current b');
        if(parseInt(quantity.val()) > parseInt(quantityCurrent.text())) {
            quantity.val(quantityCurrent.text());
        } else if (parseInt(quantity.val()) < 1) {
            quantity.val(1)
        }
    };

    return modules;
})(window.jQuery, window, document);

$(document).ready(function () {
    $(document).on('click', '.size-area .size', function () {
        let quantity = $(this).data('quantity');
        $(this).parent('.size-area').find('.active').removeClass('active');
        $(this).addClass('active');
        $(document).find('.quantity-current b').text(quantity);
    });

    $(document).on('click', '.quantity .qtybtn', function () {
        PRODUCT_DETAIL.handleQuantity();
    });

    $(document).on('change', "input[name='quantity']", function () {
        PRODUCT_DETAIL.handleQuantity();
    });
});
