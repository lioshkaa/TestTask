<?php

namespace App\Http\Middleware;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class admin_panel
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = auth()->user();
        if (isset($auth)) {
            if (auth()->user()->role_id === 1) {
                return $next($request);
            } elseif (auth()->user()->role_id === 3) {
               return redirect('/client');
            } else {
                return redirect('/user');
            }
        }

    }
}
