@extends('admin.main')

@section('title',"users")

@section("custom-style")
    @include("admin.files.uploadModalCss")
@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>{{(isset($edit_user))?"ویرایش کاربر":"لیست کاربران"}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">کاربران</li>
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
                    <div class="card-body">
                        <h6 class="card-title">{{(isset($edit_user))?"ویرایش کاربر ".$edit_user->first_name:"ایجاد کاربر"}}</h6>
                        <form class="needs-validation" action="{{(isset($edit_user))?route("user.update",$edit_user->id):route("user.store")}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @isset($edit_user)
                                <input type="hidden" name="_method" value="PATCH">
                            @endisset
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">نام</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" autocomplete="off"
                                           placeholder="نام" value="{{isset($edit_user)?$edit_user->first_name:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" autocomplete="off"
                                           placeholder="نام خانوادگی" value="{{isset($edit_user)?$edit_user->last_name:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">ایمیل</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                           placeholder="ایمیل" value="{{isset($edit_user)?$edit_user->email:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_number">شماره_موبایل</label>
                                    <input type="text" name="mobile_number" class="form-control" id="mobile_number"
                                           placeholder="شماره موبایل" value="{{isset($edit_user)?$edit_user->mobile_number:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="رمز عبور" autocomplete="new-password">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="website_type_id">نوع سایت درخواستی</label>
                                    <select type="text" name="website_type_id" class="form-control" id="website_type_id"
                                          autocomplete="off">
                                        <option value="">نوع سایت درخواستی</option>
                                        @foreach($website_types as $web)
                                            <option value="{{$web->id}}"
                                            {{(isset($edit_user) && $edit_user->website_type_id == $web->id)?"selected":''}}>{{ $web->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="familiarity_type_id">نحوه ی آشنایی با ما</label>
                                    <select type="text" name="familiarity_type_id" class="form-control" id="familiarity_type_id"
                                            autocomplete="off">
                                        <option value="">نحوه ی آشنایی با ما</option>
                                        @foreach($familiarity_types as $fam)
                                            <option value="{{$fam->id}}"
                                                    {{(isset($edit_user) && $edit_user->familiarity_type_id == $fam->id)?"selected":''}}>{{ $fam->name }}</option>
                                        @endforeach
                                    </select>
                                        <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="roleSelect">نقش کاربری</label>
                                    <select class="form-control" id="roleSelect" name="user_type"
                                    required="required">
                                        <option value="" >نقش کاربری</option>
                                        <option value=0 {{(isset($edit_user) && $edit_user->is_admin == 0)?"selected":''}}>کاربر</option>
                                        <option value=1 {{(isset($edit_user) && $edit_user->is_admin == 1)?"selected":''}}>ادمین</option>

                                    </select>
                                </div>
                            </div>

{{--                            <div class="col-md-6 mb-3">--}}
{{--                                <label for="credit">موجودی</label>--}}
{{--                                <input type="text" name="credit" class="form-control" id="credit" autocomplete="off"--}}
{{--                                       placeholder="موجودی" value="{{isset($edit_user)?$edit_user->credit():''}}"--}}
{{--                                       required="required">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    صحیح است!--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6 mb-3 p-0">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleFormControlSelect2">تصویر پروفایل</label>--}}
{{--                                    <input type="hidden" class="tbt-hide single-file" name="user_photo"--}}
{{--                                           value="{{(isset($edit_user->profile_photo) && $edit_user->profile_photo)?$edit_user->profile_photo['id']:''}}">--}}
{{--                                    <div id="mainImage" style="{{(isset($edit_user) && $edit_user->profile_photo)?"":'display:none'}}">--}}
{{--                                        <div class="galleryImage">--}}
{{--                                            <span id="deleteImage" aria-hidden="true">×</span>--}}
{{--                                            <img src="{{(isset($edit_user->profile_photo) && $edit_user->profile_photo)?$edit_user->profile_photo['url']:''}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <a class="btn btn-primary text-white" data-toggle="modal"--}}
{{--                                       data-target="#imageUpload"--}}
{{--                                       data-type="image">--}}
{{--                                        قرار دادن به‌عنوان تصویر شاخص--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3">
                                <button class="btn btn-primary float-right" name="updatePostData" id="submit-all"
                                        type="submit">
                                    {{(isset($edit_user))?"ویرایش کاربر":"افزودن کاربر"}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->


{{--    @include("admin.files.uploadModal")--}}


@endsection



@section('custom-script')
{{--    @include("admin.files.uploadModalJs")--}}
    @include("admin.flash")
@endsection
