@extends('admin.main')

@section('title',"categories")


@section("custom-style")
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">

@endsection

@section('content')
    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>{{(isset($edit_cat))?"ویرایش دسته بندی":"دسته بندی"}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">دسته بندی ها</li>
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
                                <h4>لیست دسته بندی ها</h4>

                                <hr>
                                <br><br>
                                <table id="example1" class="table table-striped" width="100%">

                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>توضیحات</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    @if(!empty($cats))
                                        @foreach($cats as $cat)

                                            <?php $dash = ''; ?>
                                            <tr>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->description }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm"
                                                       data-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" type="button"
                                                           href="{{route("category.edit",$cat->id)}}">ویرایش</a>
                                                        <form method="post"
                                                              action="{{route("category.destroy",$cat->id)}}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button class="dropdown-item" type="submit">حذف</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if(count($cat->children))
                                                @include('admin.category.subCategoryShow',['children' => $cat->children])
                                            @endif
                                        @endforeach
                                    @endif
                                </table>
                                {{--                                    <tfoot>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th>نام</th>--}}
                                {{--                                        <th>نامک</th>--}}
                                {{--                                        <th>گزینه ها</th>--}}
                                {{--                                    </tr>--}}
                                {{--                                    </tfoot>--}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-4 float-right">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{(isset($edit_cat))?"ویرایش دسته بندی":"افزودن دسته بندی"}}</h6>
                            <form class="needs-validation" method="post"
                                  action="{{(isset($edit_cat))?route("category.update",$edit_cat->id):route("category.store")}}">
                                @csrf
                                @isset($edit_cat)
                                    <input type="hidden" name="_method" value="PUT">
                                @endisset
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nameCat">نام</label>
                                        <input type="text" class="form-control" autocomplete="off" autofocus
                                               id="nameCat" name="name" placeholder="نام دسته بندی" required
                                               value="{{(isset($edit_cat))?$edit_cat->name:''}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="slugCat">نامک</label>
                                        <input type="text" class="form-control" autocomplete="off" id="slugCat"
                                               name="slug" placeholder="نامک دسته بندی"
                                               value="{{(isset($edit_cat))?$edit_cat->slug:''}}">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="parent_id">دسته ی والد</label>
                                        <select type="text" name="parent_id" class="form-control" id="parent_id"
                                                required="required"
                                        >
                                            <option value="">بدون والد</option>
                                            @if($cats)
                                                @foreach($cats as $cat)
                                                    <?php $dash = ''; ?>
                                                    <option value="{{$cat->id}}" {{(isset($edit_cat) && $edit_cat->id == $cat->parent_id)?"selected":''}}>{{$cat->name}}</option>
                                                    @if(count($cat->children))
                                                        @include('admin.category.subCategoryList-option',['children' => $cat->children])
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="description">توضیحات</label>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                                  placeholder="توضیحات">{{isset($edit_cat)?$edit_cat->description:''}}</textarea>

                                    </div>
                                </div>

                                <button class="btn btn-primary" name="categoriesAddButton" type="submit">ذخیره
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("custom-script")
    <script src="{{asset("vendors/dataTable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/js/examples/datatable.js")}}"></script>


    @include("admin.flash")

@endsection
