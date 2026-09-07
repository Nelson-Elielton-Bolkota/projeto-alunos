<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlunoRequest; 

class AlunoController extends Controller
{
    /**
     * Exibe a listagem de todos os alunos.
     */
    public function index()
    {
        $alunos = Aluno::all(); 
        return view('alunos.index', compact('alunos')); 
    }

    public function create()
    {
        return view('alunos.create'); 
    }

    
    public function store(StoreAlunoRequest $request) 
{
    
    Aluno::create($request->validated());

    return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso!');
}

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id); // Busca pelo ID ou retorna erro 404 [1]
        return view('alunos.show', compact('aluno'));
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }
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

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete(); // Remove do PostgreSQL [1, 3]

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno removido com sucesso!');
    }
}