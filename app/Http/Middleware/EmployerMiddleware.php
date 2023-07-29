<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            if (Auth::user()->role == 'employer' || Auth::user()->role == 'admin') {

                return $next($request);

            } else {

                return back()->with('warning', 'Access Denied, You are not an Employer!');

            }

        } else {

            return redirect('/login')->with('warning', 'Please login!');
        }
    }
}
