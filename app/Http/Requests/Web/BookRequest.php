<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book.title' => ['required', 'between:4,100', 'string'],
            'book.about' => ['required', 'min:50'],
            'book.image' => ['image', 'mimes:jpeg,jpg,png', 'max:10240'],
            'book.author_id' => ['required', 'exists:authors,id'],
            'book.categories' => ['array', 'min:1'],
            'book.categories.*' => ['exists:sub_categories,id'],
            'scales' => ['required', 'array', 'between:3,7'],
            'scales.*.scale' => ['required', 'string', 'max:20'],
            'scales.*.explain' => ['nullable', 'between:15,100'],
        ];
    }
}