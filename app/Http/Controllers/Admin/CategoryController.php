<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->except('_token','_method'));
        return redirect('admin/categories/list')->with('status', 'دسته بندی با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cats = Category::whereNull('parent_id')
//            ->with('childrenCategories')
            ->get();
////        $categories = Category::select('id','parent_id','name','description')
//            ->with(['Category'])
//            ->get();
        return view('admin.category.list',compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_cat = Category::select('id','parent_id','name','slug','description')
            ->where('id',$id)->first();
        $cats =  Category::whereNull('parent_id')
            ->get();
        return view('admin.category.list',compact('edit_cat', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->except('_token','_method'));
        return redirect('admin/categories/list')->with('status', 'دسته با موفقیت به روز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('admin/categories/list')->with('status', 'دسته با موفقیت حذف شد.');
    }
}
