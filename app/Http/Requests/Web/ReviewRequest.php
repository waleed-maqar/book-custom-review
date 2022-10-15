<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review.title' => ['nullable', 'max:24'],
            'review.review' => ['required', 'min:20'],
            'scales.*' => ['required', 'numeric', 'min:0', 'max:5']
        ];
    }
}