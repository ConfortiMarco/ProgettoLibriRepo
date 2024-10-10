<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'birthday' => 'nullable|date',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'devi compilare name',
            'name.string' => 'devi compilare name come stringa',
            'name.max' => 'max 255',
            'birthday.date' => 'devi compilare date come data',
        ];
    }
}
