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
            <h4>لیست سفارشات</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> سفارشات</li>
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
                        <h6 class="card-title">سفارشات</h6>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">ردیف</th>
                                    <th>دسته بندی</th>
                                    <th>نام سرویس</th>
                                    <th>کاربر</th>
                                    <th>تعداد</th>
                                    <th>وضعیت</th>
                                    <th>مبلغ پرداخت شده</th>
                                    <th>تعداد باقی مانده</th>
                                    <th>زمان سفارش</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{($order->service)?$order->service->category->name:"بدون دسته بندی"}}</td>
                                        <td>{{($order->service)?$order->service->name:"سرویس پاک شده"}}</td>
                                        <td>{{$order->user->email}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td><div class="badge badge-{{$order->status_color}}">{{$order->status}}</div></td>
                                        <td>{{$order->cost_payed}}</td>
                                        <td>{{$order->remaining ?? 0}}</td>
                                        <td dir="ltr">{{$order->created_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="{{route("orders.edit",$order->id)}}">ویرایش سفارش</a>
                                                    <form method="post"
                                                          action="{{route("orders.destroy",$order->id)}}">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="dropdown-item" type="submit">حذف سفارش</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">ردیف</th>
                                    <th>دسته بندی</th>
                                    <th>نام سرویس</th>
                                    <th>کاربر</th>
                                    <th>تعداد</th>
                                    <th>وضعیت</th>
                                    <th>مبلغ پرداخت شده</th>
                                    <th>تعداد باقی مانده</th>
                                    <th>زمان سفارش</th>
                                    <th>گزینه ها</th>
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
