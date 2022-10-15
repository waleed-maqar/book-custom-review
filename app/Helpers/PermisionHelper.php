<?php

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

if (!function_exists('owner_redirect')) {
    function owner_redirect($id, $redirect = true)
    {
        if (Auth::check() && Auth::id() == $id) {
            return true;
        } elseif (!$redirect) {
            return false;
        }
        header('location:/login');
        exit();
    }
}
//