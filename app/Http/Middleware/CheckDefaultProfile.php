<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDefaultProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $profile = $request->route('profile');


        if ($profile != session('default_profile_id')) {
            return redirect()->route('profiles.index')->with('error', 'Unauthorized: You can only access your default profile.');
        }

        return $next($request);
    }
}
