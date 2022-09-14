<?php

namespace App\Http\Requests\Admin\Luck;

use Illuminate\Foundation\Http\FormRequest;

class CreateLuckRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:lucks,code',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'code is required'
        ];
    }
}
