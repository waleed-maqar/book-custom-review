<?php

namespace App\Http\Requests\Web;

use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
        return [
            'user_name' => ['required', 'max:60', 'min:8'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8', new PasswordRule],
            'about' => ['min:20', 'max:250'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:10240']
        ];
    }
}