<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserLogin
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
        // nếu user đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->confirmed == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }
}
