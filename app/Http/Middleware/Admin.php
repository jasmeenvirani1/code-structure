<?php

namespace App\Http\Middleware;

use Closure;

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

        if (!$request->session()->exists('UserSession')) {
            return redirect('login');
        } else {
            $role = session()->get('UserSession.role_id');
            if ($role != '0') {
                return redirect('/');
            }
        }


        return $next($request);
    }
}
