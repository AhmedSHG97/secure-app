<?php

namespace App\Http\Requests\Admin\Luck;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLuckRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:lucks,code,'.$this->luck->id,
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'code is required'
        ];
    }
}
