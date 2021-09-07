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
            <h4>{{(isset($edit_cat))?"ویرایش کامنت":"لیست کامنت ها"}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">کامنت ها</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(!isset($edit_cat))
                    <div class="col-md-8 float-left">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>توضیحات</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    @if(!empty($comments))
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->name }}</td>
                                                <td>{{ $comment->description }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-sm"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" type="button"
                                                               href="{{route("comments.edit",$comment->id)}}">ویرایش</a>
                                                            <form method="post"
                                                                  action="{{route("comments.destroy",$comment->id)}}">
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
                                        <th>نام</th>
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
                                  action="{{(isset($edit_cat))?route("comments.update",$edit_cat->id):route("comments.store")}}">
                                @csrf
                                @isset($edit_cat)
                                    <input type="hidden" name="_method" value="PUT">
                                @endisset
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nameCat">نام</label>
                                        <input type="text" class="form-control" autocomplete="off" autofocus
                                               id="nameCat" name="name" placeholder="نام شخص" required
                                               value="{{(isset($edit_cat))?$edit_cat->name:null}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="slugCat">متن نظر</label>
                                        <input type="text" class="form-control" autocomplete="off" id="slugCat"
                                               name="description" placeholder="متن نظر" required
                                               value="{{(isset($edit_cat))?$edit_cat->description:null}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="col-md-6 mb-3 p-0">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">لوگوی نظر</label>
                                                <input type="hidden" class="tbt-hide single-file"
                                                       name="file_id"
                                                       value="{{ isset($edit_cat)? $edit_cat->file_id:null }}">
                                                <div id="mainImage"
                                                     style="{{(isset($option['site_logo_image']) && !is_null($option['site_logo_image']))?"":'display:none'}}">
                                                    <div class="galleryImage">
                                                        <span id="deleteImage" aria-hidden="true">×</span>
                                                        @if(isset($edit_cat))
                                                            {!! $edit_cat->file->preview !!}
                                                        @else
                                                            <img src="" alt="empty">
                                                        @endif
                                                    </div>
                                                </div>
                                                <a class="btn btn-primary text-white" data-toggle="modal"
                                                   data-target="#imageUpload"
                                                   data-type="image">
                                                    قرار دادن به‌عنوان تصویر شاخص
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="categoriesAddButton" type="submit">افزودن دسته
                                    بندی
                                </button>
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
