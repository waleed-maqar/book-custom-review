<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
        if ($request->has('add_main_cat')) {
            return [
                'name_en' => ['required', 'between:4,100'],
                'name_ar' => ['required', 'between:4,100'],
            ];
        } else {
            return [
                'category_id' => ['required', 'exists:categories,id'],
                'sub_cat.1.*' => ['required'],
                'sub_cat.*.en' => ['between:4,55'],
                'sub_cat.*.ar' => ['between:4,55']
            ];
        }
    }
}