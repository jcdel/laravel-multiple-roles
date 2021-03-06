<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Student
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('admin.index');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('teacher.index');
        }

        if (Auth::user()->role == 3) {
            return $next($request);
        }
    }
}
