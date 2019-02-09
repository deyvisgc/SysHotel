<?php

namespace sisHotel\Http\Middleware;

use Closure;

class adminMiddleware
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
        switch (auth()->User()->rol_idrol){

            case '1':

                break;

            case '2':
                return redirect()->to('/admin');
                break;


        }
        return $next($request);

    }

}
