<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmployee extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'avilability'=>['required','string'],
            'phone'=>['required','string'],
            'gender'=>['required','string'],
            'address'=>['required','string'],
            'dob'=>['required'],
            'region'=>['required','string'],
            'patch'=>['required','string'],
            'file'=>['required','string'],
            'link'=>['required','string'],
            'profile'=>['required','string'],
            'about'=>['required','string']
        ];
    }
}
