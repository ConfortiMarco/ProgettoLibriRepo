<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'pages' => 'nullable|integer',
            'author' => 'required|integer',
            'category' => 'required|integer',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'titolo richiesto',
            'title.string' => 'titolo string richiesto',
            'description.string' => 'descrizione string richiesto',
            'pages.integer' => 'pagina deve essere numero ',
            'author.required' => 'id richiesto',
            'author.integer' => 'id numero richiesto',
            'category.required' => 'id richiesto',
            'category.integer' => 'id numero richiesto',
            'cover.image' => 'image richiesto',
            'cover.mimes' => 'image richiesto di tipo jpeg, png, jpg o gif',
        ];
    }
}
