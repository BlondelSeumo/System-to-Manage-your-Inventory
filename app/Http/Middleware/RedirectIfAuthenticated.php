<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
//        }
//
//        return $next($request);
//    }

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     *
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Redirects a user if they are logged in, and attempt to access pages that aren't for authenticated users
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            return redirect()->back();
        }

        // handle backend authentication redirects
        if ($this->auth->check() & $request->segment(1) === 'admin') {
            return redirect()->route('admin/home');
        }

//        dd($request->segment(1));
//        dd($request->root());
        // handle accounts authentication redirects
        if ($this->auth->check() & $request->segment(1) === 'accounts') {
            return redirect()->route('accounts/home');
        }

        return $next($request);
    }
}
