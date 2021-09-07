@extends('admin.main')

@section('title',"Comments")

@section("custom-style")
    @include("admin.files.uploadModalCss")
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">
@endsection

@section('content')
    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>صفحه term</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">صفحات</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('terms.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">عنوان صفحه</label>
                                        <input type="text" class="form-control" autocomplete="off" autofocus
                                               id="title" name="title" placeholder="عنوان صفحه" required
                                               value="{{ $term_title->value ?? null }}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-4">
                                        <button class="btn btn-info" type="submit">ثبت</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if(!isset($edit_cat))
                    <div class="col-md-8 float-left">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>توضیحات</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    @if(!empty($termItems))
                                        @foreach($termItems as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ Str::words($item->description,5) }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-sm"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" type="button"
                                                               href="{{route("terms.item.edit",$item->id)}}">ویرایش</a>
                                                            <form method="post"
                                                                  action="{{route("terms.item.delete",$item->id)}}">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="delete">
                                                                <button class="dropdown-item" type="submit">حذف</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tfoot>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>توضیحات</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-4 float-right">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">افزودن نظر</h6>
                            <form class="needs-validation" method="post"
                                  action="{{(isset($term_item))?route("terms.item.update",$term_item->id):route("terms.item.store")}}">
                                @csrf
                                @isset($term_item)
                                    <input type="hidden" name="_method" value="PUT">
                                @endisset
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="title_item">عنوان</label>
                                        <input type="text" class="form-control" autocomplete="off"
                                               id="title_item" name="title" placeholder="عنوان" required
                                               value="{{(isset($term_item))?$term_item->title:null}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="description">توضیحات</label>
                                        <textarea type="text" class="form-control" autocomplete="off" id="description"
                                                  name="description" placeholder="توضیحات" required>{{(isset($term_item))?$term_item->description:null}}</textarea>
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">ثبت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("admin.files.uploadModal")
@endsection

@section("custom-script")
    <script src="{{asset("vendors/dataTable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/js/examples/datatable.js")}}"></script>

    @include("admin.files.uploadModalJs")
    @include("admin.flash")
@endsection
