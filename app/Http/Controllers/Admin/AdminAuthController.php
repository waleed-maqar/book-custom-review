<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->only('login', 'loginForm');
        $this->middleware('auth:admin')->only('logout');
    }
    public function loginForm()
    {
        return view('Admin.Auth.Login');
    }

    public function login(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        $request->validate([
            'email' => Auth::check() ? '' : 'required',
            'password' => 'required'
        ]);
        $admin = Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => ($request->password),
        ]);
        if (!$admin) {
            return back()->withErrors(['Wrong entry' => 'Wrong email or password']);
        }
        $user = User::where('email', $email)->first();
        Auth::loginUsingId($user->id);
        return redirect(route('dashboard'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.form'));
    }
}