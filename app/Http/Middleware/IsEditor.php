<?php

namespace App\Http\Middleware;

use App\Model\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && User::hasEditorRole(Auth::user()->role)) {
            return $next($request);
        } else {
            return redirect(RouteServiceProvider::HOME);
        }

    }
}
