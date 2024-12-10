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
            'tecnico_id' => 'required|exists:tecnicos,id',
            'servico_id' => 'array|max:3', // Limita a 3 serviços
            'servico_id.*' => 'integer|exists:servicos,id',
            'descricaoProblema' => 'required|string|max:1000',
            'estado' => 'required|in:em processamento,em reparação,completo',
            'dataEntrega' => 'nullable|date', // Apenas aceita datas válidas se for enviada
            'previsaoEntrega' => 'nullable|date',
            'encomenda' => 'nullable|string|in:sim,nao',
            'encomenda_id' => 'nullable|exists:encomendas,id', // Validação para encomenda_id
            'horas_trabalho' => 'nullable|array', // Horas de trabalho é um array, caso contrário, será omitido
            'horas_trabalho.*' => 'nullable|numeric|min:0', // Cada hora de trabalho deve ser numérica e maior ou igual a 0
            'totalPagar' => 'numeric|min:0',
        ];

        // Requer técnico e equipamento apenas na criação
        if ($this->isMethod('post')) {
            $rules['equipamento_id'] = 'required|exists:equipamentos,id';
            $rules['tecnico_id'] = 'required|exists:tecnicos,id';
        }

        if ($this->isMethod('put')) {
            $rules['encomenda'] = 'required|exists:encomendas,id';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'equipamento_id.required' => 'O equipamento é obrigatório.',
            'equipamento_id.exists' => 'O equipamento selecionado não existe.',
            'servico_id.required' => 'Pelo menos um serviço precisa ser selecionado.',
            'servico_id.max' => 'Você pode selecionar no máximo 3 serviços.',
            'servico_id.*.exists' => 'Um ou mais serviços selecionados não existem.',
            'tecnico_id.required' => 'O técnico responsável é obrigatório.',
            'tecnico_id.exists' => 'O técnico selecionado não existe.',
            'descricaoProblema.required' => 'A descrição do problema é obrigatória.',
            'descricaoProblema.max' => 'A descrição do problema não pode ter mais de 1000 caracteres.',
            'horas_trabalho.*.numeric' => 'As horas de trabalho devem ser numéricas.',
            'horas_trabalho.*.min' => 'As horas de trabalho não podem ser negativas.',
        ];
    }
}
