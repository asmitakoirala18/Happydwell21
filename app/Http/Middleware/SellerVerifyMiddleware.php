<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $seller = Auth::guard('seller')->user()->seller_verify;
        if ($seller == 0) {
            return redirect()->route('selle-not-verify');
        }

        return $next($request);
    }
}
