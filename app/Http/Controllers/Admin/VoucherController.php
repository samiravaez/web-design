<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Database\Seeders\VoucherSeeder;
use Illuminate\Http\Request;
use App\Http\Requests\VoucherRequest;
use Morilog\Jalali\Jalalian;

class VoucherController extends Controller
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
        $users = User::select('id','first_name','last_name')->get();
        $products = Product::select('id','name')->get();
        return view('admin.voucher.create',compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherRequest $request)
    {
        $voucher = Voucher::create($request->except('_token','_method','starts_at',
            'expires_at'));
//

        $eDate = $request->expires_at ? Jalalian::fromFormat('Y-m-d', $request->expires_at)->toCarbon() : null;
        $sDate = $request->starts_at ? Jalalian::fromFormat('Y-m-d', $request->starts_at)->toCarbon() : null;

        $voucher->expires_at = $eDate;
        $voucher->starts_at = $sDate;
        $voucher->users()->sync($request->users);
        $voucher->products()->sync($request->products);
        $voucher->save();

        return redirect('admin/vouchers/list')->with('status', 'کوپن با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $vouchers = Voucher::select('id','code','name','description','times_used','max_uses',
            'max_uses_user','discount_value','discount_type','min_price','max_price',
            'invalid_users','invalid_products','starts_at','expires_at')
            ->paginate(10);

        return view('admin.voucher.list',compact('vouchers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_voucher = Voucher::select('id','code','name','description','times_used','max_uses','max_uses_user',
            'discount_type','discount_value','min_price','max_price',
            'invalid_users','invalid_products','starts_at','expires_at')
            ->where('id',$id)->first();
        $users = User::select('id','first_name','last_name')->get();
        $products = Product::select('id','name')->get();

        return view('admin.voucher.create',compact('edit_voucher','users','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherRequest $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->update($request->except('_token','_method','starts_at',
            'expires_at'));

        $eDate = $request->expires_at ? Jalalian::fromFormat('Y-m-d', $request->expires_at)->toCarbon() : null;
        $sDate = $request->starts_at ? Jalalian::fromFormat('Y-m-d', $request->starts_at)->toCarbon() : null;

        $voucher->expires_at = $eDate;
        $voucher->starts_at = $sDate;
        $voucher->users()->sync($request->users);
        $voucher->products()->sync($request->products);
        $voucher->save();

        return redirect('admin/vouchers/list')->with('status', 'کوپن با موفقیت به روز رسانی شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voucher::find($id)->delete();
        return redirect('admin/vouchers/list')->with('status', 'کوپن با موفقیت حذف شد.');
    }

    public function getUsersSelect(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $users = User::orderby('last_name','asc')->select('id','first_name','last_name')->limit(5)->get();
        }else{
            $users = User::orderby('last_name','asc')->select('id','first_name','last_name')->where('first_name', 'like', '%' .$search . '%')
                ->orWhere('last_name', 'like', '%' .$search . '%')
                ->limit(5)->get();
        }

        $response = array();
        foreach($users as $user){
            $response[] = array(
                "id"=>$user->id,
                "text"=>$user->first_name.' '.$user->last_name
            );
        }

        return response()->json($response);
    }

    public function getProductsSelect(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $products = Product::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
            $products = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($products as $product){
            $response[] = array(
                "id"=>$product->id,
                "text"=>$product->name
            );
        }

        return response()->json($response);
    }


}
