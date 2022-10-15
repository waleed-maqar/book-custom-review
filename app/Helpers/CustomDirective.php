<?php

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

Blade::if('admin_with_role', function ($role) {
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
    return $allowed;
});
//
Blade::if('owner', function ($id) {
    if (Auth::check() && Auth::id() == $id) {
        return true;
    }
    return false;
});
Blade::if('isAdmin', function () {
    if (!Auth::check()) {
        return false;
    } elseif (Auth::user()->is_admin) {
        return true;
    }
    return false;
});