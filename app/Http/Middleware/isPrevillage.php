<?php

namespace App\Http\Middleware;

use App\Models\Previllage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPrevillage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $previlage = Previllage::where('user_id', Auth::id())->where('school_id', $request->route('id'))->first();

        if ($previlage || (Auth::check() && Auth::user()->role == 'admin')) {
            return $next($request);
        }

        return redirect()->route('landing-page');
    }
}
