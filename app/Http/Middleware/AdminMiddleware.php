<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::guest() && Auth::user()->role==2) {
            return $next($request);
        }

        return redirect('home')->with('status', 'Sorry !You do not have Authority to Aceess');
    }
}
