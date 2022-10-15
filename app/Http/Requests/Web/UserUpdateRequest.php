<?php

namespace App\Http\Requests\Web;

use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $passwordRules = [];
        if (!empty(request('password'))) {
            $passwordRules = ['confirmed', 'min:8', new PasswordRule];
        }
        $emailRequires = [];
        if (Auth::user()->register_via == 'web') {
            $emailRequires = ['required', 'email', 'unique:users,email,' . Auth::id()];
        }
        return [
            'user_name' => ['required', 'max:60', 'min:8'],
            'email' => $emailRequires,
            'password' => $passwordRules,
            'about' => ['min:20', 'max:250'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:10240']
        ];
    }
}