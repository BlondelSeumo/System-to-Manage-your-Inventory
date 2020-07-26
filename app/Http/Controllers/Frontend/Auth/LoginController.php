<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 12/6/17
 * Time: 11:44 PM
 */

namespace App\Http\Controllers\Frontend\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers, Authenticatable;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function authenticate(Request $request)
    {

//        dd($request);

        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->guard('user')->attempt(['email' => $email, 'password' => $password ]))
        {
            return redirect()->intended('/');
        }
        else
        {
            return redirect()->intended('user.login')->with('status', 'Invalid Login Credentials !');
        }
    }

    public function postLogin()
    {

    }


    public function getLogout()
    {
        auth()->guard('user')->logout();
        return redirect('/');
    }

}