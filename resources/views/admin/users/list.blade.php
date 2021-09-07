@extends('admin.main')

@section('title',"users")

@section("custom-style")
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">
    <style>
        tr {
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
            <h4>لیست کاربران</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
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
                        <h6 class="card-title">کاربران</h6>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>شماره موبایل</th>
                                    <th>نوع سایت درخواستی</th>
                                    <th>نحوه ی آشنایی با ما</th>
                                    <th>سطح دسترسی</th>
                                    <th>تاریخ عضویت</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile_number}}</td>
                                        <td>{{isset($user->website_type->name)? $user->website_type->name:''}}</td>
                                        <td>{{isset($user->familiarity_type->name)? $user->familiarity_type->name:''}}</td>
                                        <td>@if($user->is_admin)
                                                ادمین
                                            @else
                                                کاربر
                                            @endif
                                        </td>
                                        <td>{{$user->created_at_fa}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="{{route("user.edit",$user->id)}}">ویرایش کاربر</a>
                                                    <form method="post" action="{{route("user.destroy",$user->id)}}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button class="dropdown-item" type="submit">حذف کاربر</button>
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
                                {{--                                    <th>ایمیل</th>--}}
                                {{--                                    <th>سطح دسترسی</th>--}}
                                {{--                                    <th>تاریخ عضویت</th>--}}
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
