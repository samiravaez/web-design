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
        return view('welcome');
    }

    public function home()
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
        if($request->code === $token->code and $token->isValid())
        {
           $token->used = 1;
           $token->save();
           $user->mobile_verified = 1;
           $user->save();
            Auth::login($user);
            return redirect('/home');
        }

        if($request->code === $token->code and !$token->isValid())
            return redirect()->back()->withErrors(['کد وارد شده منقضی شده است','expired'=>'5']);

        return redirect()->back()->withErrors(['کد وارد شده صحیح نیست']);

    }

    public function codeSend(Request $request)
    {
        $token = Token::create([
            'user_id' => session('user_id')
        ]);
        $user = User::find(session('user_id'));
        if($user->mobile_verified==0)
        {

            if ($token->sendCode()) {
                session()->put("token_id", $token->id);
                session()->put("user_id", $user->id);
                session()->put("remember", $request->get('remember'));

                return redirect()->back()->withSuccess('کد تایید مجددا ارسال شد.');
            }
        }
    }
}
