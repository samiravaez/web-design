<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();
//        $cats = Category::all();

        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(ProductRequest $request)
    {
        $product = Product::create($request->except('_token', '_method', 'image'));
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $product->image = "$profileImage";
            $product->save();

        }
        return redirect('admin/products/list')->with('status', 'محصول با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::select('id', 'cat_id', 'name', 'description', 'image', 'price', 'discount_value', 'discount_type', 'preview_link')
            ->paginate($this->paginationNum);
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_product = Product::select('id', 'cat_id', 'name', 'description', 'image', 'price', 'discount_type', 'discount_value', 'preview_link')
            ->where('id', $id)->first();
        $cats = Category::all();
        return view('admin.product.create', compact('edit_product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->except('_token', '_method', 'image'));

        //save product image
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $product->image = "$profileImage";
            $product->save();

        }
        return redirect('admin/products/list')->with('status', 'محصول با موفقیت به روز رسانی شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('admin/products/list')->with('status', 'محصول با موفقیت حذف شد.');
    }

    public function indexCats($id)
    {
        $category = Category::find($id);
        $categories = $category->children()->get();
        return ($categories);
    }
}
