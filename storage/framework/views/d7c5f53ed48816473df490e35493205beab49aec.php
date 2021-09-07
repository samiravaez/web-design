<link rel="stylesheet" href="<?php echo e(asset("vendors/dropzone/dropzone.css")); ?>">
<style>
    #mainImage img {
        width: 100%;
        height: 150px;
        margin-bottom: 15px;
        border-radius: 5px;
        object-fit: cover;
    }

    .gallery #mainImage {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }

    .gallery #mainImage img {
        width: 130px;
        height: auto;
        margin-bottom: 0px;
        border-radius: 5px;
        object-fit: contain;
    }

    .galleryImage {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .galleryImage span {
        position: absolute;
        font-size: 25px;
        background-color: #fff;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        cursor: pointer;
    }

    input[type=radio], input[type=checkbox] {
        display: none;
    }

    label .app-file-list:hover {
        border: 1px solid #004deb;
        cursor: pointer;
    }

    label {
        width: 100%;
    }

    input[type=radio]:checked + label .app-file-list, input[type=checkbox]:checked + label .app-file-list {
        border: 1px solid #004deb;
    }

    .dropzone {
        border-width: 1px;
        border-color: #004deb;
    }
</style>
<?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/files/uploadModalCss.blade.php ENDPATH**/ ?>