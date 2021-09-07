<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return(view('admin.auth.login'));
    }

    public function code()
    {
        return(view('auth.code'));
    }

    public function checkCode(Request $request)
    {
        $token_id = session('token_id');
        $user = User::find(session('user_id'));
        $token = Token::find($token_id);
        if($request->code === $token->code)
        {
           $token->used = 1;
            Auth::login($user);
           return redirect('/');
        }



    }
}
