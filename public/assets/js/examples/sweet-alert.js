'use strict';
$(document).ready(function () {
    $('.sweet-basic').on('click', function () {
        swal('سلام دنیا!');
    });
    $('.sweet-success').on('click', function () {
        swal("عالی!", "شما روی دکمه کلیک کردید!", "success");
    });
    $('.sweet-warning').on('click', function () {
        swal("عالی!", "شما روی دکمه کلیک کردید!", "warning");
    });
    $('.sweet-error').on('click', function () {
        swal("عالی!", "شما روی دکمه کلیک کردید!", "error");
    });
    $('.sweet-info').on('click', function () {
        swal("عالی!", "شما روی دکمه کلیک کردید!", "info");
    });

    $('.sweet-multiple').on('click', function () {
        swal({
            title: "مطمئن هستید؟",
            text: "در صورت پاک کردن فایل نمیتوانید به آن دسترسی داشته باشید",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("اوه! فایل حذف شد!", {
                        icon: "success",
                    });
                } else {
                    swal("فایل شما هنوز وجود دارد !", {
                        icon: "error",
                    });
                }
            });
    });
    $('.sweet-prompt').on('click', function () {
        swal("چیزی تایپ کنید:", {
            content: "input",
        })
            .then((value) => {
                swal(`شما تایپ کردید: ${value}`);
            });
    });
    $('.sweet-ajax').on('click', function () {
        swal({
            text: 'یک فیلم جستجو کنید مانند Lalaland".',
            content: "input",
            button: {
                text: "جستجو",
                closeModal: false,
            },
        })
            .then(name => {
                if (!name) throw null;
                return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
            })
            .then(results => {
                return results.json();
            })
            .then(json => {
                const movie = json.results[0];
                if (!movie) {
                    return swal("پیدا نشد :(");
                }
                const name = movie.trackName;
                const imageURL = movie.artworkUrl100;
                swal({
                    title: "نتیجه:",
                    text: name,
                    icon: imageURL,
                });
            })
            .catch(err => {
                if (err) {
                    swal("اوه نه!", "درخواست انجام نشد!", "error");
                } else {
                    swal.stopLoading();
                    swal.close();
                }
            });
    });
});