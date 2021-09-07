<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'code' => 'required|max:255|unique:vouchers,code,'. $this->id,
            'name' => 'required|max:255|unique:vouchers,name,'. $this->id,
            'description' => 'nullable|max:255',
            'times_used' => 'nullable|numeric',
            'max_uses' => 'nullable|numeric',
            'max_uses_user' => 'nullable|numeric',
            'discount_value' => 'nullable',
            'discount_type' => 'nullable',
            'min_price' => 'nullable|max:255',
            'max_price' => 'nullable|max:255',
            'invalid_users' => 'nullable',
            'invalid_products' => 'nullable',
            'starts_at' => 'nullable',
            'expires_at' => 'nullable',
        ];
    }
}
