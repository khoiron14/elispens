<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = $request->user()->role;

        switch ($userRole) {
            case User::ADMIN:
                $userRole = 'admin';
                break;
            case User::LECTURER:
                $userRole = 'lecturer';
                break;
            case User::STUDENT:
                $userRole = 'student';
                break;
            default:
                abort(403);
        }

        if (!in_array($userRole, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
