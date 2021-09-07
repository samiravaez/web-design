@extends('admin.main')

@section('title',"users")

@section("custom-style")
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">
    <style>
        tr{
            text-align: center;
        }
        td {
            text-align: center;
            direction: ltr;
            font-family: "Nunito", sans-serif;
        }
    </style>
@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>لیست پرداخت ها</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">لیست پرداخت ها</li>
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
                        <h6 class="card-title">لیست پرداخت ها</h6>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">نام کاربر</th>
                                    <th>شماره تراکنش پی پال</th>
                                    <th>مقدار</th>
                                    <th>اسم پرداخت کننده</th>
                                    <th>ایمیل پرداخت کننده</th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->user->name}}</td>
                                        <td>{{$service->order_paypal_id}}</td>
                                        <td>{{$service->amount}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->email}}</td>
                                        <td>{{$service->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">نام کاربر</th>
                                    <th>شماره تراکنش پی پال</th>
                                    <th>مقدار</th>
                                    <th>اسم پرداخت کننده</th>
                                    <th>ایمیل پرداخت کننده</th>
                                    <th>تاریخ</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->





@endsection

@section("custom-script")
    <script src="{{asset("vendors/dataTable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/js/examples/datatable.js")}}"></script>

    @include("admin.flash")
@endsection
