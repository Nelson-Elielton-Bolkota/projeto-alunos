@extends('layouts/app')

@section('titulo', 'Lista de Alunos')

@section('conteudo')
    <h2>Listagem de Alunos</h2>

    @if(session('sucesso'))
        <div style="color: green; font-weight: bold; margin-bottom: 15px;">
            {{ session('sucesso') }}
        </div>
    @endif

    @if($alunos->isEmpty())
        <p class="alert">Nenhum aluno cadastrado no sistema.</p>
    @else
        <ul>
            @foreach($alunos as $aluno)
                <li>
                    <strong>{{ $aluno->nome }}</strong> - {{ $aluno->curso }}
                    <a href="{{ route('alunos.show', $aluno->id) }}">Visualizar</a>
                </li>
            @endforeach
        </ul>
    @endif
@stop