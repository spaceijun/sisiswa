<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Redirect berdasarkan role user
                if ($user->hasRole('superadmin')) {
                    return redirect('/admin/dashboard');
                } elseif ($user->hasRole('guru')) {
                    return redirect('/guru/dashboard');
                } elseif ($user->hasRole('siswa')) {
                    return redirect('/siswa/dashboard');
                } elseif ($user->hasRole('orangtua')) {
                    return redirect('/orangtua/dashboard');
                }

                // Default redirect jika tidak ada role yang cocok
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
