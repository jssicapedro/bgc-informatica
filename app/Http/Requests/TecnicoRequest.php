<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnicoRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telemovel' => 'required|regex:/^[0-9]{9}$/',
            'especialidade' => 'required',
            'morada' => 'string'
        ];
    }

    public function messages()
{
    return [
        'telemovel.regex' => 'O número de telemóvel deve ter exatamente 9 dígitos, sem espaços.',
    ];
}
}
