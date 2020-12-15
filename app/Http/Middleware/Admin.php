<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        //Middleware jika user langsung ke url update
        if(Auth::user()->role == 'user'){
            abort(403,'You do not have permission to access this webpage');
        }

        return $next($request);
    }

}
