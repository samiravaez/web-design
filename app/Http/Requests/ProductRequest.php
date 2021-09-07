<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|max:255|unique:categories,name,'. $this->id,
            'cat_id' => 'nullable|exists:categories,id',
            'price' => 'max:30|required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'nullable|max:255',
        ];
    }
}
