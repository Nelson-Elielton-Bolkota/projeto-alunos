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
}