'use strict';
$(document).ready(function () {

    var doc = $(document);

    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

    doc.on('click', '.toastr-examples a.btn-success', function () {
        toastr.success('با موفقیت انجام شد');
        return false;
    });

    doc.on('click', '.toastr-examples a.btn-danger', function () {
        toastr.error('اشتباهی پیش آمده است');
        return false;
    });

    doc.on('click', '.toastr-examples a.btn-info', function () {
        toastr.info('در اینجا یک اطلاعیه میبینید');
        return false;
    });

    doc.on('click', '.toastr-examples a.btn-warning', function () {
        toastr.warning('شما مجاز به استفاده نیستید');
        return false;
    });

});