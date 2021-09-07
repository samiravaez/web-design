<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Familiarity_type;
use App\Models\Website_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
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
        $familiarity_types = Familiarity_type::all();
        $website_types = Website_type::all();
        return view('admin.users.create', compact('familiarity_types', 'website_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(UserRequest $request)
    {
        $user = User::create($request->except('_token', '_method'));
        return redirect('admin/users/list')->with('status', 'کاربر با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::select('id', 'first_name', 'last_name', 'mobile_number', 'website_type_id'
            , 'familiarity_type_id', 'email', 'is_admin', 'email_verified_at', 'password', 'created_at')
            ->paginate(10);

        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familiarity_types = Familiarity_type::all();
        $website_types = Website_type::all();
        $edit_user = User::select('id', 'first_name', 'last_name', 'mobile_number', 'website_type_id'
            , 'familiarity_type_id', 'email', 'is_admin', 'email_verified_at', 'password', 'created_at')
            ->where('id', $id)->first();

        return view('admin.users.create', compact('edit_user', 'website_types', 'familiarity_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        $user = User::find($id);
        $data = $request->validated();
        $user->update($data);
        if ($request->password) {
            $user->password = $request->password;
        }

        return redirect('admin/users/list')->with('status', 'اطلاعات کاربر با موفقیت به روز رسانی شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin/users/list')->with('status', 'کاربر با موفقیت حذف شد.');
    }


}
