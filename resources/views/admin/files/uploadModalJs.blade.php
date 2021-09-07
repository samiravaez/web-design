<script src="{{asset("vendors/dropzone/dropzone.js")}}"></script>
<script>
$('#imageUpload').on('show.bs.modal', function (e) {
    $.ajax({
        url:"{{route("admin.ajaxGetImage")}}",
        type:'get',
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        },
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
            $('#galleryContent').html(data.html);
        }
    });
});
$("#addImage").click(function(e) {
    e.preventDefault();
    var radios = $('.imageClass:checked');
    $('.single-file').val(radios.val());
    var label = $("label[for='" + radios.attr('id') + "']").find("img");
    var mainImage = $("#mainImage");
    mainImage.find("img").attr("src",label.attr('src'));
    mainImage.show();
    $('#imageUpload').modal('toggle');
});
Dropzone.autoDiscover = false;
new Dropzone("#uploadImage-dropzone", {
    dictDefaultMessage: "فایل ها را برای ارسال اینجا بکشید",
    dictFallbackMessage: "مرورگر شما از کشیدن و رها سازی برای ارسال فایل پشتیبانی نمی کند.",
    dictFallbackText: "لطفا از فرم زیر برای ارسال فایل های خود مانند گذشته استفاده کنید.",
    dictInvalidFileType: "شما مجاز به ارسال این نوع فایل نیستید.",
    dictCancelUpload: "لغو ارسال",
    dictUploadCanceled: "ارسال لغو شد.",
    dictCancelUploadConfirmation: "آیا از لغو این ارسال اطمینان دارید؟",
    dictRemoveFile: "حذف فایل",
    dictRemoveFileConfirmation: "آیا از حذف این فایل اطمینان دارید؟",
    dictMaxFilesExceeded: "شما نمی توانید فایل دیگری ارسال کنید.",
    success: function (file, done) {
        $('#tabone').removeClass('show');
        $('#tabone').removeClass('active');
        $('#tabTwo').addClass('show');
        $('#tabTwo').addClass('active');
        $('#tab1').removeClass('show');
        $('#tab1').removeClass('active');
        $('#tab2').addClass('show');
        $('#tab2').addClass('active');
        $('#galleryContent').append(done.html);
    }
});
</script>
