<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
       $user_count = User::where('is_admin',0)->count();
       $product_count = Product::count();
       $report = [$user_count,$product_count];
       return(view('admin.dashboard',compact('report')));
    }

//    public function login()
//    {
//        return(view('admin.auth.login'));
//    }
}
