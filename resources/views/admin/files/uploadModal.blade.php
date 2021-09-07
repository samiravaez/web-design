<div class="modal fade bd-example-modal-lg" id="imageUpload" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">افزودن تصویر</h5>
                <input type="hidden" id="mainImage" value="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3 border-0">
                    <li><a id="tabone" class="btn btn-light btn-square mr-2 active show text-white"
                           data-toggle="tab" href="#tab1">بارگذاری پرونده‌ها</a></li>
                    <li><a id="tabTwo" class="btn btn-light btn-square text-white" data-toggle="tab" href="#tab2">کتابخانه
                            پرونده‌های چندرسانه‌ای</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active show">
                        <form id="uploadImage-dropzone" action="{{route("admin.ajaxUploadImage")}}" class="dropzone"
                              style="display: flex;align-items: center;justify-content: center;min-height:27rem">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div id="galleryContent" class="galleryContent" style="display: flex;flex-wrap: wrap;height: 23.7rem;overflow-y: scroll;overflow-x: hidden;">

                        </div>
                        <button id="addImage" class="btn btn-primary mt-3 float-right" data-dismiss="modal">افزودن
                            تصویر
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


