<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = 'moderator')
    {
        $allowed = false;

        $uperRoles = match ($role) {
            'moderator' => ['moderator', 'admin', 'supervisor'],
            'admin' => ['admin', 'supervisor'],
            'supervisor' => ['supervisor'],
        };
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find(Auth::guard('admin')->id());
            if (in_array($admin->role, $uperRoles)) {
                $allowed = true;
            }
        }
        if (!$allowed) {
            return redirect('/');
        }
        return $next($request);
    }
}