<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        $sessionId = $request->session()->get('idAdmin');
        $sessionId = is_numeric($sessionId) && $sessionId > 0;
        if ($sessionId) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
