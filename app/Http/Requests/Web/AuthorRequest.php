<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AuthorRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $aboutRules = $request->about ? ['between:20, 255'] : [];
        return [
            'name' => ['required', 'between:4, 55'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:10240'],
            'about' => ['nullable', 'between:20, 255']
        ];
    }
}