<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Website1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $arrayWebId=[1,2,3,4];
        $website_session = session('website_id');
        if(!in_array($website_session, $arrayWebId)){

            return redirect('dashboard');

        }

        return $next($request);
    }
}
