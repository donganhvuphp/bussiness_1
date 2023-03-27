import {COMMON} from "../../common/common.js";

const PROFILE = (function () {
    let modules = {};

    modules.update = function (e) {
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
            beforeSend: function () {
                COMMON.clearValidate('#update-profile');
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                } else if (res.failed) {
                    toastr.error(res.message);
                }
            },
            error: function (res) {
                COMMON.showValidateMessage('#update-profile', res, false);
            }
        });
    };

    return modules;
})(window.jQuery, window, document);

$(document).ready(function () {
    $(`#update-profile`).on('submit', PROFILE.update);

    $(`#image-upload`).change(function (data) {
        COMMON.previewImage(data, '#image-preview');
    });
});
