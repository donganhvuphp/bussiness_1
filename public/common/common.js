const COMMON = (function () {
    let module = {};

    module.previewImage = function (previewIn, previewOut) {
        let imageFile = previewIn.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(imageFile);
        reader.onload = function (evt) {
            $(previewOut).attr('src', evt.target.result);
            $(previewOut).hide();
            $(previewOut).fadeIn(650);
        }
    };

    return module
})();

export { COMMON }
