@extends('admin.main')

@section('title',"tickets")

@section("custom-style")
    <style>
        #example1 tr {
            direction: ltr;
            text-align: center;
            font-family: "Nunito", sans-serif;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">
@endsection


@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>تیکت ها</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تیکت</li>
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
                        <h6 class="card-title">تیکت ها</h6>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
{{--                                    <th>دسته بندی</th>--}}
                                    <th>موضوع</th>
                                    <th>کاربر</th>
                                    <th>وضعیت</th>
{{--                                    <th>اهمیت</th>--}}
                                    <th>آخرین آپدیت</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                @if(!empty($tickets))
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
{{--                                            <td>{{$ticket->category->name ?? 'دسته بندی پاک شده'}}</td>--}}
                                            <td>{{$ticket->title}}</td>
                                            <td>{{($ticket->user)?$ticket->user->name:"کاربر پاک شده"}}</td>
                                            <td><span class="badge badge-{{$ticket->status_color}}">{{$ticket->status}}</span></td>
{{--                                            <td><span class="badge badge-{{$ticket->priority_color}}">{{$ticket->priority_text}}</span></td>--}}
                                            <td>{{$ticket->updated_at}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm"
                                                       data-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" type="button" href="{{route("tickets.show",$ticket->id)}}">پاسخ به تیکت</a>
                                                        <form action="{{ route('ticket.close',$ticket->id) }}" method="post">
                                                            @csrf
                                                            <button class="dropdown-item" type="submit">بستن تیکت</button>
                                                        </form>
                                                        <form action="{{ route('tickets.destroy',$ticket->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="dropdown-item" type="submit">حذف تیکت</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                                <tfoot>
                                <tr>
                                    {{--                                    <th>دسته بندی</th>--}}
                                    <th>موضوع</th>
                                    <th>کاربر</th>
                                    <th>وضعیت</th>
                                    {{--                                    <th>اهمیت</th>--}}
                                    <th>آخرین آپدیت</th>
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
