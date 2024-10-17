<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmesFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','min:2','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo "Nome" é obrigatorio',
            'name.min' => 'O campo "Nome" deve ter pelo menos :min caracteres',
            'name.max' => 'O campo "Nome" deve ter no maximo 255 caracteres',
        ];
    }
}
