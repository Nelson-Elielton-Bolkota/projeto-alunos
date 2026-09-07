<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Exibe a listagem de todos os alunos.
     */
    public function index()
    {
        $alunos = Aluno::all(); // Busca todos os alunos no PostgreSQL [1, 3]
        return view('alunos.index', compact('alunos')); // Passa a lista para a view [2]
    }

    /**
     * Mostra o formulário para criar um novo aluno.
     */
    public function create()
    {
        return view('alunos.create'); // Retorna a view do formulário [2]
    }

    /**
     * Salva o novo aluno no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação básica direta (será refinada no Tema 8)
        $request->validate([
            'nome' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
        ]);

        // Grava no PostgreSQL através do Eloquent Model [1, 3]
        Aluno::create([
            'nome' => $request->nome,
            'curso' => $request->curso,
        ]);

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Exibe as informações de um aluno específico.
     */
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id); // Busca pelo ID ou retorna erro 404 [1]
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Mostra o formulário para editar os dados de um aluno.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Atualiza os dados do aluno no banco de dados.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update([
            'nome' => $request->nome,
            'curso' => $request->curso,
        ]);

        return redirect()->route('alunos.index')->with('sucesso', 'Dados do aluno atualizados com sucesso!');
    }

    /**
     * Remove o aluno do banco de dados.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete(); // Remove do PostgreSQL [1, 3]

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno removido com sucesso!');
    }
}