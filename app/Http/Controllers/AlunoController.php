<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlunoRequest; 
use App\Models\Curso;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('create', Aluno::class); // Verifica se o usuário pode criar Alunos
        return view('alunos.create');
    }
    
    public function store(StoreAlunoRequest $request)
    {
        Gate::authorize('create', Aluno::class); // Protege o envio de novos dados
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
        Gate::authorize('update', $aluno); // Verifica se o usuário logado pode editar este aluno específico
        
        return view('alunos.edit', compact('aluno'));
    }
    
    public function update(StoreAlunoRequest $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);
        Gate::authorize('update', $aluno); // Protege a atualização do registro
        $aluno->update($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Dados do aluno atualizados com sucesso!');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        Gate::authorize('delete', $aluno); // Verifica se pode deletar o registro no PostgreSQL
        $aluno->delete();

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno removido com sucesso!');
    }
    public function alunosPorCurso(string $id)
    {
        
        $curso = Curso::with('alunos')->findOrFail($id);
        
        return view('cursos.alunos', compact('curso'));
    }
}