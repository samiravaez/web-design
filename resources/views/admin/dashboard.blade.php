@extends('admin.main')

@section('title',"dashboard")

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>CRM سیستم</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">اطلاعات کلی</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-7">
                <div class="card bg-secondary-gradient">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-7">
{{--                                <h6 class="card-title mb-3">خوش برگشتی {{auth()->user()->name}}!</h6>--}}
                                <p>با چک کردن قسمت های مختلف بیشتر با سایت آشنا شو لورم ایپسوم متن ساختگی با تولید سادگی
                                    نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                                <ul class="mb-3">
                                    <li>این قسمت ها را مشاهده کنید</li>
                                    <li>مخاطبان خود را اضافه کنید</li>
                                </ul>
                                <a href="#" class="btn bg-white">بیشتر بدانید</a>
                            </div>
                            <div class="col-md-5">
                                <img src="assets/media/svg/undraw_onboarding_o8mv.svg" alt="..." class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <h6 class="card-title">فروش کلی </h6>
                            <div>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <span class="dropdown-menu dropdown-menu-left">
                                            <a href="#" class="dropdown-item">گزارش</a>
                                            <a href="#" class="dropdown-item">دانلود</a>
                                            <a href="#" class="dropdown-item">بستن</a>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-3 font-weight-bold">469,453</h2>
                        <div class="progress mb-3" style="height: 10px">
                            <div class="progress-bar w-25 bg-secondary-gradient" role="progressbar"></div>
                            <div class="progress-bar w-50 bg-info-gradient" role="progressbar"></div>
                            <div class="progress-bar w-25 bg-warning-gradient" role="progressbar"></div>
                            <div class="progress-bar w-25 bg-success-gradient" role="progressbar"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="mb-0">
                                    <span class="fa fa-circle text-danger mr-1"></span>
                                    پزشکی
                                </p>
                                <h5 class="mt-2 mb-0">25%</h5>
                            </div>
                            <div class="col">
                                <p class="mb-0">
                                    <span class="fa fa-circle text-info mr-1"></span>
                                    بهداشتی
                                </p>
                                <h5 class="mt-2 mb-0">50%</h5>
                            </div>
                            <div class="col">
                                <p class="mb-0">
                                    <span class="fa fa-circle text-warning mr-1"></span>
                                    مو و پوست
                                </p>
                                <h5 class="mt-2 mb-0">15%</h5>
                            </div>
                            <div class="col">
                                <p class="mb-0">
                                    <span class="fa fa-circle text-success mr-1"></span>
                                    دیگر
                                </p>
                                <h5 class="mt-2 mb-0">20%</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-title mb-3">مخاطبان</h6>
                                        <div class="d-flex d-sm-block d-lg-flex align-items-end">
                                            <h2 class="mb-0 mr-2 font-weight-bold">{{$report[0]}}</h2>
                                            <p class="small text-muted mb-0 line-height-20">
                                                <span class="text-success">+ 5%</span>از هفته قبل
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="avatar avatar-lg">
                                            <div class="avatar-title bg-success-bright text-success rounded-circle">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-title mb-3">محصولات</h6>
                                        <div class="d-flex d-sm-block d-lg-flex align-items-end">
                                            <h2 class="mb-0 mr-2 font-weight-bold">{{$report[1]}}</h2>
                                            <p class="small text-muted mb-0 line-height-20">
                                                <span class="text-danger">- 2%</span>از هفته قبل
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="avatar avatar-lg">
                                            <div class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-title mb-3">تماس با خریدار</h6>
                                        <div class="d-flex d-sm-block d-lg-flex align-items-end">
                                            <h2 class="mb-0 mr-2 font-weight-bold">900</h2>
                                            <p class="small text-muted mb-0 line-height-20">
                                                <span class="text-success">+ 9%</span>از هفته قبل
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="avatar avatar-lg">
                                            <div class="avatar-title bg-info-bright text-info rounded-circle">
                                                <i class="fa fa-money"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <h6 class="card-title">فروش این ماه</h6>
                                    <div>
                                        <a href="#" class="mr-3">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <span class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">گزارش</a>
                                                    <a href="#" class="dropdown-item">دانلود</a>
                                                    <a href="#" class="dropdown-item">بستن</a>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <h6 class="card-title">وضعیت کاربران</h6>
                                    <div>
                                        <a href="#" class="mr-3">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <span class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">گزارش</a>
                                                    <a href="#" class="dropdown-item">دانلود</a>
                                                    <a href="#" class="dropdown-item">بستن</a>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="contacts-statuses"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center justify-content">
                                    <div>
                                        <h5 class="mb-2">میانگین فروش</h5>
                                        <small class="text-success mb-1">
                                            <i class="fa fa-caret-up mr-1"></i> 10% از ماه قبل
                                        </small>
                                        <h1 class="mb-0 font-weight-bold">216</h1>
                                    </div>
                                    <div class="ml-5">
                                        <span class="bar-3">2,5,9,6,5,2,4,3,7,5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-md-flex align-items-start justify-content-between">
                                    <h6 class="card-title">آخرین درآمدها</h6>
                                    <div class="reportrange btn btn-outline-light btn-sm mt-3 mt-md-0">
                                        <i class="ti-calendar mr-2"></i>
                                        <span class="text"></span>
                                        <i class="ti-angle-down ml-2"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>تاریخ</th>
                                                    <th class="text-center">واحد فروش</th>
                                                    <th class="text-center">درآمد خالص</th>
                                                    <th class="text-center">مالیات</th>
                                                    <th class="text-center">ارزش افزوده</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>03/15/1398</td>
                                                    <td class="text-center">1,050</td>
                                                    <td class="text-success text-center">+ 32,580.00</td>
                                                    <td class="text-danger text-center">- 3,023.10</td>
                                                    <td class="text-right text-center">28,670.90</td>
                                                    <td class="text-right">
                                                        <a href="#" data-toggle="tooltip" title="جزییات">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03/14/1398</td>
                                                    <td class="text-center">780</td>
                                                    <td class="text-success text-center">+ 30,065.10</td>
                                                    <td class="text-danger text-center">- 2,780.00</td>
                                                    <td class="text-right text-center">26,930.40</td>
                                                    <td class="text-right">
                                                        <a href="#" data-toggle="tooltip" title="جزییات">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03/13/1398</td>
                                                    <td class="text-center">1.980</td>
                                                    <td class="text-success text-center">+ 30,065.10</td>
                                                    <td class="text-danger text-center">- 2,780.00</td>
                                                    <td class="text-right text-center">26,930.40</td>
                                                    <td class="text-right">
                                                        <a href="#" data-toggle="tooltip" title="جزییات">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03/12/1398</td>
                                                    <td class="text-center">300</td>
                                                    <td class="text-success text-center">+ 30,065.10</td>
                                                    <td class="text-danger text-center">- 2,780.00</td>
                                                    <td class="text-right text-center">26,930.40</td>
                                                    <td class="text-right">
                                                        <a href="#" data-toggle="tooltip" title="جزییات">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03/11/1398</td>
                                                    <td class="text-center">940</td>
                                                    <td class="text-success text-center">+ 30,065.10</td>
                                                    <td class="text-danger text-center">- 2,780.00</td>
                                                    <td class="text-right text-center">26,930.40</td>
                                                    <td class="text-right">
                                                        <a href="#" data-toggle="tooltip" title="جزییات">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="icon-block icon-block-floating mr-3 icon-block-lg icon-block-outline-success text-success">
                                                        <i class="fa fa-bar-chart"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="text-uppercase font-size-11">درآمد خالص</h6>
                                                        <h4 class="mb-0 font-weight-bold">1.958,104</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="icon-block icon-block-floating mr-3 icon-block-lg icon-block-outline-danger  text-danger">
                                                        <i class="fa fa-hand-lizard-o"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="text-uppercase font-size-11">مالیات</h6>
                                                        <h4 class="mb-0 font-weight-bold">234,769</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="icon-block icon-block-floating mr-3 icon-block-lg icon-block-outline-warning text-warning">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="text-uppercase font-size-11">ارزش افزوده</h6>
                                                        <h4 class="mb-0 font-weight-bold">1.608,469</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title d-flex justify-content-between">
                                    <span>توزیع درآمد</span>
                                    <span class="dropdown">
                                            <a class="btn btn-outline-light btn-sm dropdown-toggle" href="#"
                                               data-toggle="dropdown">آمریکا</a>
                                            <span class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">ایران</a>
                                                <a href="#" class="dropdown-item">آلمان</a>
                                                <a href="#" class="dropdown-item">فرانسه</a>
                                                <a href="#" class="dropdown-item">ایتالیا</a>
                                            </span>
                                        </span>
                                </h6>
                                <div id="vmap_usa_en" style="height: 300px"></div>
                                <div class="table-responsive mt-5">
                                    <table class="table table-borderless table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-40">وضعیت</th>
                                            <th class="wd-25 text-center">سفارشات</th>
                                            <th class="wd-35 text-center">درآمد</th>
                                            <th class="wd-35"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>کالیفرنیا</td>
                                            <td class="text-center">12,201</td>
                                            <td class="text-center text-success">150,200.80</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>تگزاس</td>
                                            <td class="text-center">11,950</td>
                                            <td class="text-center text-success">138,910.20</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>وومینگ</td>
                                            <td class="text-center">11,198</td>
                                            <td class="text-center text-danger">132,050.00</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>فلوریدا</td>
                                            <td class="text-center">9,885</td>
                                            <td class="text-center text-success">127,762.10</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>نیویورک</td>
                                            <td class="text-center">21,198</td>
                                            <td class="text-center text-danger">432,410.00</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>مانتانا</td>
                                            <td class="text-center">2,885</td>
                                            <td class="text-center text-success">7,100.00</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>آرکازاس</td>
                                            <td class="text-center">1,298</td>
                                            <td class="text-center text-success">2,310.50</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>کنساس</td>
                                            <td class="text-center">5,900</td>
                                            <td class="text-center text-danger">97,500.00</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>کلورادو</td>
                                            <td class="text-center">15,900</td>
                                            <td class="text-center text-danger">397,371.32</td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="tooltip" title="جزییات">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title">کارهای روزانه</h6>
                                    <div>
                                        <a href="#" class="mr-3">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <span class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">گزارش</a>
                                                    <a href="#" class="dropdown-item">دانلود</a>
                                                    <a href="#" class="dropdown-item">بستن</a>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck1">صحبت با کاربران جدید
                                        <span class="text-muted">13 فروردین 1399</span>
                                    </label>
                                </div>
                                <div
                                    class="custom-control custom-checkbox-success custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck2">کاربران قدیمی به زودی حذف میشوند
                                        <span class="text-muted">20 فروردین 1399</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck3">واگذاری
                                        تکمیل شده
                                        <span class="text-muted">13 فروردین 1399</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck4">نظرات خریدار
                                        <span class="text-muted">10 فروردین 1398</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck5">حذف بک آپ های قبلی
                                        <span class="text-muted">13 فروردین 1399</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox custom-checkbox-success todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck6">صحبت با کاربران جدید
                                        <span class="text-muted">27 فروردین 1399</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck7">کاربران قدیمی به زودی حذف میشوند
                                        <span class="text-muted">13 فروردین 1399</span>
                                    </label>
                                </div>
                                <form class="mt-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               aria-label="Example text with button addon"
                                               placeholder="کار جدید" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="button-addon1">افزودن
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">کاربر واگذاری شده به من</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                                        <div>
                                            <figure class="avatar avatar-state-success m-r-15">
                                                <img src="assets/media/image/user/man_avatar5.jpg"
                                                     class="rounded-circle" alt="image">
                                            </figure>
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">وحید موحد</h6>
                                            <small class="text-muted">مهندس</small>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="badge badge-danger mr-2 d-sm-inline d-none">رد شده</span>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">مشاهده</a>
                                                    <a href="#" class="dropdown-item">ارسال پیام</a>
                                                    <a href="#" class="dropdown-item">واگذاری </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                                        <div>
                                            <figure class="avatar avatar-state-success m-r-15">
                                                <img src="assets/media/image/user/women_avatar3.jpg"
                                                     class="rounded-circle" alt="image">
                                            </figure>
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">شادی بخش</h6>
                                            <small class="text-muted">مشاور منابع انسانی</small>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="badge badge-success mr-2 d-sm-inline d-none">تکمیل شده</span>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">مشاهده</a>
                                                    <a href="#" class="dropdown-item">ارسال پیام</a>
                                                    <a href="#" class="dropdown-item">واگذاری </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                                        <div>
                                            <figure class="avatar avatar-state-success m-r-15">
                                                <span class="avatar-title bg-secondary rounded-circle">م</span>
                                            </figure>
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">ملانی محب</h6>
                                            <small class="text-muted">مشاور</small>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="badge badge-warning mr-2 d-sm-inline d-none">در انتظار</span>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">مشاهده</a>
                                                    <a href="#" class="dropdown-item">ارسال پیام</a>
                                                    <a href="#" class="dropdown-item">واگذاری </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                                        <div>
                                            <figure class="avatar avatar-state-success m-r-15">
                                                <img src="assets/media/image/user/women_avatar1.jpg"
                                                     class="rounded-circle" alt="image">
                                            </figure>
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">سمانه محمدی</h6>
                                            <small class="text-muted">مهندس</small>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="badge badge-danger mr-2 d-sm-inline d-none">رد شده</span>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="#" class="dropdown-item">مشاهده</a>
                                                    <a href="#" class="dropdown-item">ارسال پیام</a>
                                                    <a href="#" class="dropdown-item">واگذاری </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="mt-3 text-center">
                                    <a href="#">
                                        دیدن همه
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end::page content -->





@endsection

@section("custom-script")
    <!-- Dashboard scripts -->
    <script src="{{asset("assets/js/examples/dashboard.js")}}"></script>
@endsection
