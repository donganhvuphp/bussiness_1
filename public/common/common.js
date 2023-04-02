const COMMON = (function () {
    let modules = {};

    modules.confirmDelete = function (handle) {
        swal({
            title: "Bạn có chắc chắn muốn xóa không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Hủy bỏ",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(confirm) {
            if (confirm) {
                handle();
            }
        });
    };

    modules.notifySuccess = function (content) {
        swal("Thành công!", content, "success");
    };

    modules.previewImage = function (previewIn, previewOut) {
        let imageFile = previewIn.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(imageFile);
        reader.onload = function (evt) {
            $(previewOut).attr('src', evt.target.result);
            $(previewOut).hide();
            $(previewOut).fadeIn(650);
        }
    };

    modules.loading = function (isLoading, delay = 0) {
        if (isLoading) {
            $('.loading').removeClass('d-none')
        } else {
            setTimeout(() => $('.loading').addClass('d-none'), delay);
        }
    };

    modules.scrollToError = function (errorSelector = '.errors') {
        const selector = $(`${errorSelector}[style!="display: none;"]`);
        const stickyBarHeight = $('form .position-sticky.sticky-bar').first().height() || 100;
        const sidebarHeight = $('#sidebar-mobile').height();
        if (
            selector.length > 0
        ) {
            $("html, body").animate(
                {
                    scrollTop: selector.first().parent().offset().top - (stickyBarHeight + sidebarHeight),
                },
                1500,
                null,
                () => {
                    selector.first().parent().find('input').trigger('focus');
                }
            );
        }
    };

    modules.clearValidate = function (form) {
        $(form).find('.border-error').removeClass('border-error');
        $(form).find('.error-message').text('').hide();
    };

    modules.debounce = function (func, wait) {
        let debounceTimer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), wait);
        }
    };

    modules.showValidateMessage = function (parent, response, scroll = true) {
        $(parent).find('.error-message').text('').hide();

        if ('status' in response && response.status === 422) {
            $.each(response.responseJSON.errors, function (nameOld, message) {
                let name = nameOld.replace('.', '_');
                $(parent).find(`.error_${name}`).text(message).show();
                $(parent).find(`input[name="${name}"], textarea[name="${name}"]`).addClass('border-error');
                $(parent).find(`select[name="${name}"]`).next().find('.select2-selection').addClass('border-error');
            });
            if (scroll) {
                modules.scrollToError();
            }
        } else {
            toastr.error('Đã có một lỗi xảy ra.');
        }
    };

    modules.escapeHtml = function (unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    };

    modules.trimSpaces = function (string) {
        if (string) {
            return $.trim(string)
        }

        return string;
    };

    return modules;
})();

export { COMMON }
