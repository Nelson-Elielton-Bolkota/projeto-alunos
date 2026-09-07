<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3|max:255', 
            'curso' => 'required|string|max:255',     
        ];
    }
    public function messages(): array
{
    return [
        'nome.required' => 'O preenchimento do campo Nome é obrigatório.',
        'nome.min' => 'O nome do aluno deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O nome do aluno não pode ultrapassar 255 caracteres.',
        'curso.required' => 'Por favor, informe o curso do aluno.',
        'curso.max' => 'O nome do curso não pode ultrapassar 255 caracteres.',
    ];
}
}