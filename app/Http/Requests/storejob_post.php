<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storejob_post extends FormRequest
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
            'type'=>['required','string'],
            'no_opening'=>['required','integer'],
            'working_days'=>['required','integer'],
            'position'=>['required','string'],
            'category'=>['required','string'],
            'description'=>['required','string'],
            'starting_date'=>['required'],
            'ending_date'=>['required'],
            'to_do'=>['required','string'],
            'experience'=>['required'],
            'requirement'=>['required','string'],
            'status'=>['required','string']
        ];
    }
}
