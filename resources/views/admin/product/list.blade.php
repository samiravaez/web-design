@extends('admin.main')

@section('title',"محصولات")

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
            <h4>لیست محصولات</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">محصولات</li>
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
                        <h6 class="card-title">محصولات</h6>
                        <p class="card-title"><a href="{{route('product.create')}}">ایجاد محصول</a></p>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">نام محصول</th>
                                    <th>دسته</th>
                                    <th>توضیحات</th>
                                    <th>قیمت (به تومان)</th>
                                    <th>قیمت با اعمال کد تخفیف (به تومان)</th>
                                    <th>لینک پیش نمایش</th>
                                    <th>تصویر محصول</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{isset($product->category->name)?
                          $product->category->name:''}}
                                        </td>
                                        <td>{{$product->description}}</td>
                                        {{--                                        @if($product->refile)--}}
                                        {{--                                            <td><span class="badge badge-success">No Refill</span></td>--}}
                                        {{--                                        @else--}}
                                        {{--                                            <td><span class="badge badge-warning">Refill</span></td>--}}
                                        {{--                                        @endif--}}
                                        <td>{{$product->price}}</td>
                                        @if($product->discount_type == 0)
                                            <td dir="ltr">{{($product->price - $product->discount_value) > 0 ? $product->price - $product->discount_value
                                             : 0}}</td>
                                        @elseif($product->discount_type == 1)
                                            <td dir="ltr">{{($product->price * $product->discount_value) > 0 ? $product->price * $product->discount_value
                                             : 0}}</td>
                                        @else
                                            <td>کد تخفیفی برای این محصول وجود ندارد.</td>
                                        @endif
                                        <td dir="ltr">{{$product->preview_link}}</td>

                                        <td dir="ltr">@if($product->image)<img src="/images/{{ $product->image }}"
                                                                               width="200px">
                                            @endif</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="{{route("product.edit",$product->id)}}">ویرایش محصول</a>
                                                    <form method="post"
                                                          action="{{route("product.destroy",$product->id)}}">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="dropdown-item" type="submit">حذف محصول</button>
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
