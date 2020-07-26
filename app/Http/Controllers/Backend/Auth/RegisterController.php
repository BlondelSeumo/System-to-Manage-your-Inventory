<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';
    protected $redirectAccounts = 'accounts/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showAdminRegistrationForm(Request $request)
    {
//        dd($request->segment(1));

        return view('backend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'company_id' => Auth::guard('admin')->user()->company_id,
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function adminregister(Request $request)
    {

        $this->validator($request->all())->validate();

        $request['company_id'] = Auth::guard('admin')->user()->company_id;
        $user = $this->create($request->all());

//        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);
        if($request->segment(1) == 'admin')
        {
            return $this->registered($request, $user)
                ?: redirect($this->redirectTo);
        }else{
            return $this->registered($request, $user)
                ?: redirect($this->redirectAccounts);
        }

    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
