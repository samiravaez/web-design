@extends('admin.main')

@section('title',"کوپن ها")

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
            <h4>لیست کوپن ها</h4>
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
                        <h6 class="card-title">کوپن ها</h6>
                        <p class="card-title"><a href="{{route('voucher.create')}}">ایجاد کوپن</a></p>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered" style="width: auto">
                                <thead>
                                <tr>
                                    <th class="text-center">نام کوپن</th>
                                    <th>کد</th>
                                    <th>توضیحات</th>
                                    <th>تعداد دفعات استفاده شده</th>
                                    <th>حداکثر دفعات قابل استفاده</th>
                                    <th>حداکثر دفعات قابل استفاده برای هر کاربر</th>
                                    <th>حداقل خرید</th>
                                    <th>حداکثر خرید</th>
                                    <th>مقدار تخفیف</th>
                                    <th>تاریخ شروع اعتبار</th>
                                    <th>تاریخ پایان اعتبار</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vouchers as $voucher)
                                    <tr>
                                        <td>{{$voucher->name}}</td>
                                       <td>{{$voucher->code}}</td>
                                        <td>{{$voucher->description}}</td>

                                        <td>{{$voucher->times_used}}</td>

                                         <td>{{$voucher->max_uses}}</td>
                                        <td>{{$voucher->max_uses_user}}</td>

                                        <td>{{$voucher->min_price}}</td>
                                        <td>{{$voucher->max_price}}</td>
                                            <td dir="ltr">

                                                {{($voucher->discount_value)}}
                                                @if($voucher->discount_type == 0)
                                                    تومان
                                                @elseif($voucher->discount_type == 1)
                                                     %
                                                @endif

                                            </td>

                                        <td dir="ltr">{{$voucher->starts_at_fa}}</td>
                                        <td dir="ltr">{{$voucher->expires_at_fa}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="{{route("voucher.edit",$voucher->id)}}">ویرایش کوپن</a>
                                                    <form method="post"
                                                          action="{{route("voucher.destroy",$voucher->id)}}">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="dropdown-item" type="submit">حذف کوپن</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>نام</th>--}}
{{--                                    <th>دسته بندی</th>--}}
{{--                                    <th>قیمت (به ازای 1000)</th>--}}
{{--                                    <th>کمترین/بیشترین</th>--}}
{{--                                    <th>Refill</th>--}}
{{--                                    <th>زمان میانگین</th>--}}
{{--                                    <th>زمان انتشار</th>--}}
{{--                                    <th>زمان بروز رسانی</th>--}}
{{--                                    <th>گزینه ها</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
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
