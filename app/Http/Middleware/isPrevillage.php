<?php

namespace App\Http\Middleware;

use App\Models\Previllage;
use App\Models\School;
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
        $school = School::where('slug', $request->route('slug'))->select('id')->first();
        if (!$school) return redirect()->route('user.show', Auth::id())->with('error', 'School not found');
        $previllage = Previllage::where('user_id', Auth::id())->where('school_id', $school->id)->first();

        if ($previllage || (Auth::check() && Auth::user()->role == 'admin')) {
            return $next($request);
        }

        return redirect()->route('user.show', Auth::id());
    }
}
