<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AuthenticateSHS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if(Auth::guard($guard)->guest())
        {
            if($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->route('signin');
            }
        }
        return $next($request);

    }
}
