<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin.home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLoginForm(Request $request)
    {

        return view('backend/auth/adminLogin');
    }

    public function authenticate(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password ]))
        {

            return redirect()->intended('admin/home');
        }
        else
        {
//            dd('Invalid Login Credentials !');
            $request->session()->flash('alert-danger','Invalid Login Credentials !');
            return redirect()->intended('admin');
        }
    }

    public function accounts(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password ]))
        {

            return redirect()->intended('accounts/home');
        }
        else
        {
//            dd('Invalid Login Credentials !');
            $request->session()->flash('alert-danger','Invalid Login Credentials !');
            return redirect()->intended('accounts');
        }
    }


    public function getLogout(Request $request)
    {

        auth()->guard('admin')->logout();

        if($request->segment(1)=='admin')
        {
            return redirect()->intended('admin');
        }else{
            return redirect()->intended('accounts');
        }

    }
}
