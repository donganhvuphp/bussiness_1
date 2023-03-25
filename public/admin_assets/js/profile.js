import {COMMON} from "../../common/common.js";

const PROFILE = (function () {
    let module = {};

    module.update = function (e) {
        e.preventDefault();
        const form = $(this);
        const formData = new FormData(form.get(0));
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (res) {
            },
            error: function (res) {
            }
        });
    };

    return module
})();

$(document).ready(function () {
    $(`#update-profile`).on('submit', PROFILE.update);

    $(`#image-upload`).change(function (data) {
        COMMON.previewImage(data, '#image-preview');
    });
});
