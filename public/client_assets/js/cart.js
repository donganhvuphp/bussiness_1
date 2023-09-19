const CART = (function () {
    let modules = {};

    /**
     * @param quantity
     * @param size = name in table storehouse
     */
    modules.addCart = function (id, attr) {
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: attr,
            url: `/cart/add-cart/${id}`,
        })
    }

    return modules;
})();

export { CART }
