<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
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
            'categoria_id' => 'required|exists:categoria,id',
            'NomeServico' => 'required|in:' . implode(',', \App\Models\Servico::NOMESERVICO), // Validação para garantir que o valor seja um dos valores do enum
            'custo' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:255',
        ];
    }
}
