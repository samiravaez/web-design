@extends('admin.main')

@section('title',"Voucher")

@section("custom-style")
    <link rel="stylesheet" href="{{ asset("vendors/select2/css/select2.min.css") }}" type="text/css">
    <style>
        input.form-control {
            direction: ltr;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{asset("vendors/datepicker/daterangepicker.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("vendors/datepicker/persianDatepicker-default.css")}}" />
{{--    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}

@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>{{(isset($edit_voucher))?"ویرایش کوپن":"افزودن کوپن"}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">کوپن ها</li>
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
                        <h6 class="card-title">{{(isset($edit_voucher))?"ویرایش کوپن ".$edit_voucher->name:"ایجاد کوپن"}}</h6>
                        <form class="needs-validation"
                              action="{{(isset($edit_voucher))?route("voucher.update",$edit_voucher->id):route("voucher.store")}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @isset($edit_voucher)
                                @method("patch")
                            @endisset
                            <div class="form-row mb-3">
                                <div class="col-md-3 mb-3">
                                    <label for="name">نام</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="نام کوپن"
                                           value="{{isset($edit_voucher)?$edit_voucher->name:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="code">کد کوپن</label>
                                        <input type="number" name="code" class="form-control" id="code" required="required"
                                               placeholder="کد کوپن" value="{{isset($edit_voucher)?$edit_voucher->code:''}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label for="description">توضیحات</label>
                                        <textarea class="form-control" name="description" id="description"
                                                  placeholder="توضیحات">{{isset($edit_voucher)?$edit_voucher->description:''}}</textarea>
                                    </div>

                            <div class="col-md-6 mb-3">
                                <label for="times_used">تعداد دفعات استفاده شده</label>
                                <input type="number" name="times_used" id="times_used" class="form-control"
                                       value="{{isset($edit_voucher)?$edit_voucher->times_used:0}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="times_used">حداکثر دفعات قابل استفاده</label>
                                <input type="number" name="max_uses" id="max_uses" class="form-control"
                                       placeholder="حداکثر دفعات قابل استفاده" value="{{isset($edit_voucher)?$edit_voucher->max_uses:''}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="times_used">حداکثر دفعات قابل استفاده برای هر کاربر</label>
                                <input type="number" name="max_uses_user" id="max_uses_user" class="form-control"
                                       placeholder="حداکثر دفعات قابل استفاده برای هر کاربر" value="{{isset($edit_voucher)?$edit_voucher->max_uses_user:''}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>
                                <div class="col-md-6 mb-3">
                                    <label for="min_price">حداقل خرید </label>
                                    <input type="number" name="min_price" id="min_price" class="form-control"
                                           placeholder=" حداقل خرید (به تومان)" value="{{isset($edit_voucher)?$edit_voucher->min_price:''}}">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="max_price">حداکثر خرید</label>
                                    <input type="number" name="max_price" id="max_price" class="form-control"
                                           placeholder="حداکثر خرید (به تومان)" value="{{isset($edit_voucher)?$edit_voucher->max_price:''}}">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>


                                <div class="col-md-3 mb-3">
                                   <p>نوع تخفیف:</p>
{{--                                    <label for="constant">مقدار ثابت</label>--}}
                                    <input type="radio" name="discount_type"  id="constant"
                                           value="0" {{isset($edit_voucher)?($edit_voucher->discount_type == 0 ? "checked" : "") :''}}
                                    onclick="constantOrPercent()"> تومان
{{--                                    <label for="percent">درصد</label>--}}
                                    <input type="radio" name="discount_type"  id="percent"
                                           value="1" {{isset($edit_voucher)?($edit_voucher->discount_type == 1 ? "checked" : "") :''}}
                                    onclick="constantOrPercent()"> درصد

                                </div>

                                <div class="col-md-6 mb-3" style="display: none" id="constant_discount">
                                    <label for="constant_discount">میزان تخفیف (به تومان)</label>
                                    <input type="text" name="discount_value" class="form-control"
                                           placeholder="میزان تخفیف (به تومان)" value="{{isset($edit_voucher)?$edit_voucher->discount_value:''}}">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>

                            <div class="col-md-6 mb-3" style="display: none" id="percent_discount">
                                <label for="percent_discount">میزان تخفیف (به درصد)</label>
                                <input type="number" name="discount_value" class="form-control"
                                       placeholder="میزان تخفیف (به درصد)" value="{{isset($edit_voucher)?$edit_voucher->discount_value:''}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>

                                <div class="col-md-6 mb-3">
                                    <label for="valid_users">کاربران مجاز</label>
                                    <select multiple=multiple name="users[]" id="valid_users" class="form-control" >
{{--                                        <option value=""></option>--}}
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"
                                    {{ isset($edit_voucher) && in_array($user->id, $edit_voucher->users()->pluck('id')->toArray()) ? 'selected' : '' }}
                                            >{{$user->first_name.$user->last_name}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="valid_products">محصولات مجاز</label>
                                    <select multiple=multiple name="products[]" id="valid_products" class="form-control">
{{--                                   <option value=""></option>--}}
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                                    {{ isset($edit_voucher) && in_array($product->id, $edit_voucher->products()->pluck('id')->toArray()) ? 'selected' : '' }}
                                            >{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="invalid_users">کاربران غیر مجاز</label>
                                    <select multiple=multiple name="invalid_users[]" id="invalid_users" >
{{--                                        <option value=""></option>--}}
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"
                                                    {{ isset($edit_voucher) && isset($edit_voucher->invalid_users) ? (in_array($user->id, $edit_voucher->invalid_users) ? 'selected' : '') : null }}
                                            >{{$user->first_name.$user->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="invalid_products">محصولات غیر مجاز</label>
                                    <select multiple=multiple name="invalid_products[]" id="invalid_products" class="form-control">
{{--                                        <option value=""></option>--}}
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                                    {{ isset($edit_voucher) && isset($edit_voucher->invalid_products) ? (in_array($product->id, $edit_voucher->invalid_products) ? 'selected' :'') :null  }}
                                            >{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div class="col-md-6 mb-3">
                                <label for="starts_at">تاریخ شروع اعتبار</label>
                                <input type="text" name="starts_at" class="form-control" id="starts_at"
                                       placeholder="تاریخ شروع اعتبار"
                                       autocomplete="off"
                                       value="{{isset($edit_voucher)?$edit_voucher->starts_at_fa:''}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="expires_at">تاریخ پایان اعتبار</label>
                                <input type="text" name="expires_at" class="form-control" id="expires_at"
                                       placeholder="تاریخ پایان اعتبار"
                                       autocomplete="off"
                                       value="{{isset($edit_voucher)?$edit_voucher->expires_at_fa:''}}">
                                <div class="valid-feedback">
                                    صحیح است!
                                </div>
                            </div>


                            <div class="col-12 mb-3">
                                <button class="btn btn-primary float-left" name="updateServiceData" id="submit-all"
                                        type="submit">
                                    {{(isset($edit_voucher))?"ویرایش کوپن":"افزودن کوپن"}}
                                </button>
                            </div>
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
    @include("admin.flash")

    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
{{--    <script src="{{ asset('vendors/datepicker/jquery.min.js') }}"></script>--}}
    <script src="{{ asset('vendors/datepicker/persianDatepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2-user-product-load.js') }}"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}


    <script>
        var config = {
            routes: {
                load_users: "{{ route('voucher.user.select') }}",
                load_products: "{{ route('voucher.product.select') }}"
            }
        };
    </script>
    <script>
        $("#starts_at, #expires_at").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



    </script>


    <script>
        function constantOrPercent() {
            if (document.getElementById('constant').checked) {
                document.getElementById('constant_discount').style.display = 'block';
                document.getElementById('percent_discount').style.display = 'none';
            } else if(document.getElementById('percent').checked) {
                document.getElementById('percent_discount').style.display = 'block';
                document.getElementById('constant_discount').style.display = 'none';
            }

        }

       constantOrPercent()
    </script>
@endsection
