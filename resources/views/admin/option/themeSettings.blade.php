@extends("admin.main")

@section("title","Theme Settings")

@section("custom-style")
    @include("admin.files.uploadModalCss")
    <style>
        input, textarea {
            direction: ltr;
            font-family: "Nunito", sans-serif;
        }
    </style>
@endsection

@section('content')
    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>تنظیمات قالب</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>تنظیمات عمومی سایت</h5></div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route("settings.themeSettings.index")}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="site_name">عنوان سایت</label>
                                    <input type="text" name="option[site_name]" class="form-control" id="site_name"
                                           autocomplete="off" value="{{$option['site_name'] ?? null}}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <h6 class="card-title">بخش هدر</h6>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="site_header_one">متن هدر 1</label>
                                            <textarea type="text" name="option[site_header_one]" class="form-control"
                                                      id="site_header_one"
                                                      autocomplete="off">{{$option['site_header_one'] ?? null}}</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="site_header_two">متن هدر 2</label>
                                            <textarea type="text" name="option[site_header_two]" class="form-control"
                                                      id="site_header_two"
                                                      autocomplete="off">{{$option['site_header_two'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">بخش اول</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_title_one">عنوان</label>
                                            <input type="text" name="option[site_section_title_one]"
                                                   class="form-control"
                                                   id="site_section_title_one"
                                                   autocomplete="off" value="{{$option['site_section_title_one'] ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_text_one">متن</label>
                                            <textarea type="text" name="option[site_section_text_one]"
                                                      class="form-control"
                                                      id="site_section_text_one" autocomplete="off"
                                            >{{$option['site_section_text_one']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">بخش دوم</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_title_two">عنوان</label>
                                            <input type="text" name="option[site_section_title_two]"
                                                   class="form-control"
                                                   id="site_section_title_two"
                                                   autocomplete="off" value="{{$option['site_section_title_two'] ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_text_two">متن</label>
                                            <textarea type="text" name="option[site_section_text_two]"
                                                      class="form-control"
                                                      id="site_section_text_two" autocomplete="off"
                                            >{{$option['site_section_text_two'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">بخش سوم</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_title_three">متن</label>
                                            <textarea type="text" name="option[site_section_title_three]"
                                                      class="form-control"
                                                      id="site_section_title_three"
                                                      autocomplete="off">{{$option['site_section_title_three'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">بخش چهارم</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_title_four">عنوان</label>
                                            <input type="text" name="option[site_section_title_four]"
                                                   class="form-control"
                                                   id="site_section_title_four"
                                                   autocomplete="off" value="{{$option['site_section_title_four'] ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_section_text_four">متن</label>
                                            <textarea type="text" name="option[site_section_text_four]"
                                                      class="form-control"
                                                      id="site_section_text_four" autocomplete="off"
                                            >{{$option['site_section_text_four'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">بخش فوتر</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6 mb-3">
                                            <label for="site_footer_text">متن</label>
                                            <textarea type="text" name="option[site_footer_text]" class="form-control"
                                                      id="site_footer_text" autocomplete="off"
                                            >{{$option['site_footer_text'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">اطلاعات تماس با ما</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_footer_email">ایمیل</label>
                                            <input type="text" name="option[site_footer_email]" class="form-control"
                                                   id="site_footer_email"
                                                   autocomplete="off" value="{{$option['site_footer_email'] ?? null}}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="site_footer_skype">اسکایپ</label>
                                            <input type="text" name="option[site_footer_skype]" class="form-control"
                                                   id="site_footer_skype"
                                                   autocomplete="off" value="{{$option['site_footer_skype'] ?? null}}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="site_footer_phoneNumber">شماره تماس</label>
                                            <input type="text" name="option[site_footer_phoneNumber]"
                                                   class="form-control"
                                                   id="site_footer_phoneNumber"
                                                   autocomplete="off" value="{{$option['site_footer_phoneNumber'] ?? null}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <h6 class="card-title">متن های بخش پرداخت</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_pay_header">سربرگ</label>
                                            <input type="text" name="option[site_pay_header]" class="form-control"
                                                   id="site_pay_header"
                                                   autocomplete="off" value="{{$option['site_pay_header'] ?? null}}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="site_pay_items">موارد در بخش پرداخت (با کاما , جدا شود)</label>
                                            <textarea type="text" name="option[site_pay_items]" class="form-control"
                                                   id="site_pay_items" autocomplete="off">{{$option['site_pay_items'] ?? null}}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="site_footer_phoneNumber">متن مورد پرداخت</label>
                                            <input type="text" name="option[site_pay_method_one_name]"
                                                   class="form-control"
                                                   id="site_pay_method_one_name"
                                                   autocomplete="off" value="{{$option['site_pay_method_one_name'] ?? null}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="col-md-6 mb-3 p-0">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">لوگوی سایت</label>
                                            <input type="hidden" class="tbt-hide single-file" name="option[site_logo_image]"
                                                   value="{{(isset($option['site_logo_image']) && !is_null($option['site_logo_image']))?$option['site_logo_image']->id:''}}">
                                            <div id="mainImage"
                                                 style="{{(isset($option['site_logo_image']) && !is_null($option['site_logo_image']))?"":'display:none'}}">
                                                <div class="galleryImage">
                                                    <span id="deleteImage" aria-hidden="true">×</span>
                                                    @if((isset($option['site_logo_image']) && !is_null($option['site_logo_image'])))
                                                        {!! $option['site_logo_image']->preview !!}
                                                    @else
                                                        <img src="">
                                                    @endif
                                                </div>
                                            </div>
                                            <a class="btn btn-primary text-white" data-toggle="modal"
                                               data-target="#imageUpload"
                                               data-type="image">
                                                قرار دادن به‌عنوان تصویر شاخص
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="site_panel_bottom">بخش پایین پنل ها</label>
                                            <textarea type="text" name="option[site_panel_bottom]" class="form-control"
                                                      id="site_panel_bottom"
                                                      autocomplete="off">{{$option['site_panel_bottom'] ?? null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-primary float-left" name="updatePostData" id="submit-all"
                                        type="submit">
                                    ثبت
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->

    @include("admin.files.uploadModal")

@endsection


@section('custom-script')
    @include("admin.files.uploadModalJs")
    @include("admin.flash")
@endsection
