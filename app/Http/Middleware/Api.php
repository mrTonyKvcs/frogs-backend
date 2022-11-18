<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!isset($_SERVER['HTTP_X_HARDIK'])) {
            return HttpResponse::json(array('error' => 'Please set custom header'));
        }

        if ($_SERVER['HTTP_X_HARDIK'] != config('api.FRONTEND_API_KEY')) {
            return HttpResponse::json(array('error'=>'wrong custom header'));
        }

        return $next($request);
    }
}
