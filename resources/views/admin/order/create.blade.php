@extends('admin.main')

@section('title',"Service")

@section("custom-style")
    <style>
        input.form-control {
            direction: ltr;
            text-align: center;
        }
    </style>
@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>{{(isset($edit_order))?"ویرایش سفارش":"افزودن سفارش"}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">سفارش ها</li>
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
                        <h6 class="card-title">{{(isset($edit_order))?"ویرایش سفارش ".$edit_order->name:"ایجاد سفارش"}}</h6>
                        <form class="needs-validation"
                              action="{{(isset($edit_order))?route("orders.update",$edit_order->id):route("orders.store")}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @isset($edit_order)
                                @method("put")
                            @endisset
                            <div class="form-row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="name">نام</label>
                                    <input type="text" name="serviceName" disabled class="form-control" id="name" autocomplete="off"
                                           placeholder="نام کامل سفارش"
                                           value="{{isset($edit_order)?optional($edit_order->service)->name:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="name">نام کاربر</label>
                                    <input type="text" name="user[name]" disabled class="form-control" id="name" autocomplete="off"
                                           placeholder="نام کامل سفارش"
                                           value="{{isset($edit_order)?optional($edit_order->user)->name:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="name">ایمیل کاربر</label>
                                    <input type="text" name="user[email]" disabled class="form-control" id="name" autocomplete="off"
                                           placeholder="نام کامل سفارش"
                                           value="{{isset($edit_order)?optional($edit_order->user)->email:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="rate">لینک</label>
                                    <input type="text" name="link" class="form-control" id="rate" autocomplete="off"
                                           value="{{isset($edit_order)?$edit_order->link:''}}"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="min">تعداد</label>
                                    <input type="text" name="qty" class="form-control" id="min"
                                           value="{{isset($edit_order)?$edit_order->qty:''}}">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="max">charge</label>
                                    <input type="text" name="charge" class="form-control" id="max"
                                           value="{{isset($edit_order)?$edit_order->charge:''}}">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="refile">وضعیت</label>
                                    <select class="form-control" id="refile" name="status">
                                        <option value="pending" selected>pending</option>
                                        <option value="completed" >completed</option>
                                        <option value="processing" >processing</option>
                                        <option value="canceled" >canceled</option>
                                        <option value="partial" >partial</option>
                                        <option value="in-progress" >in process</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="avg">باقی مانده</label>
                                    <input type="text" name="remaining" class="form-control text-center" id="avg"
                                           dir="ltr"
                                           value="{{isset($edit_order)?$edit_order->remaining:''}}"
                                           style='font-family: "Nunito", sans-serif'>
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="avg">مبلغ پرداخت شده</label>
                                    <input disabled type="text" name="cost_payed" class="form-control text-center" id="avg"
                                           dir="ltr"
                                           value="{{isset($edit_order)?$edit_order->cost_payed:''}}"
                                           style='font-family: "Nunito", sans-serif'>
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-primary float-left" name="updateServiceData" id="submit-all"
                                        type="submit">
                                    {{(isset($edit_order))?"ویرایش سفارش":"افزودن سفارش"}}
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
    @include("admin.flash")
@endsection
