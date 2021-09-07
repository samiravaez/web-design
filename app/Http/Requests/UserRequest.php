<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules =  [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|regex:/(09)[0-9]{9}/',
            'website_type_id' => 'string',
            'familiarity_type_id' => 'string',
            'email' => 'required', 'string|email|max:255|unique:users,email,'. $this->id,
        ];

        return$rules;
    }
}
