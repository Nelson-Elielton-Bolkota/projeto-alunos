<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return "Listagem geral de Alunos (index)";
    }

    public function create()
    {
        return "Formulário para cadastrar novo Aluno (create)";
    }

    public function store(Request $request)
    {
        return "Salvar os dados do novo Aluno no banco (store)";
    }

    public function show(string $id)
    {
        return "Exibir detalhes do Aluno com ID: " . $id . " (show)";
    }

    public function edit(string $id)
    {
        return "Formulário de edição do Aluno com ID: " . $id . " (edit)";
    }

    public function update(Request $request, string $id)
    {
        return "Atualizar dados do Aluno com ID: " . $id . " (update)";
    }

    public function destroy(string $id)
    {
        return "Excluir o Aluno com ID: " . $id . " (destroy)";
    }
}
