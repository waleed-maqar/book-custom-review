<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function store($provider)
    {
        // dd($provider);
        $user = Socialite::with($provider)->stateless()->user();
        $user_name = $user->name;
        $email = $user->email;
        $password = bcrypt($user->id);
        $newUser = User::firstOrCreate(['email' => $email], [
            "user_name" => $user_name,
            'email' => $email,
            'password' => $password,
            'register_via' => $provider,
        ]);
        if ($newUser->id == 1) {
            $newUser->makeAdmin('supervisor');
        }
        Auth::login($newUser);
        return redirect(route('user.edit', $newUser->id));
    }
}