<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RmaRequest extends FormRequest
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
            'equipamento_id' => 'required|exists:equipamentos,id',
            'servicos_data' => 'required|string',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'descricaoProblema' => 'required|string|max:1000',
            'servicos_horas' => 'required|numeric|min:0',
        ];
    }
}
