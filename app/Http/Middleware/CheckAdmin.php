<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if(!empty(auth()->guard('admin')->id()))
        {
            $data = Admin::query()->where('id',auth()->guard('admin')->id())->first();

            if (!$data->id  && $data->role != 'W')
            {
                return redirect()->intended('admin')->with('status', 'You do not have access to admin side');
            }
            return $next($request);
        }
        else
        {
            if($request->segment(1) === 'accounts')
            {
                return redirect()->intended('accounts')->with('status', 'Please Login to access admin area');
            }else{

                return redirect()->intended('admin')->with('status', 'Please Login to access accounts area');
            }

        }


    }
}
