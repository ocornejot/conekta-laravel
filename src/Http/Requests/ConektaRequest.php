<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ConektaRequest extends FormRequest
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
            'private_key' => 'required|min:20',
            'public_key' => 'required|min:20',
        ];
    }
}
