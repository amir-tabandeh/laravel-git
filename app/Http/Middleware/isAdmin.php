<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->isAdmin($role))// if is true
            {
                return $next($request);
            }
            else
            {
                return redirect ('/register');
            }

        }
        else
         {
            return redirect('login');
        }

    }
}
