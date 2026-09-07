@extends('layouts/app')

@section('titulo', 'Alunos do Curso')

@section('conteudo')
    <h2>Curso: {{ $curso->nome }}</h2>
    <h3>Lista de Alunos Matriculados:</h3>

    @if($curso->alunos->isEmpty())
        <p class="alert">Nenhum aluno matriculado neste curso ainda.</p>
    @else
        <ul>
            @foreach($curso->alunos as $aluno)
                <li>
                    <strong>{{ $aluno->nome }}</strong> (ID: {{ $aluno->id }})
                </li>
            @endforeach
        </ul>
    @endif

    <p><a href="{{ route('alunos.index') }}">Voltar para a listagem geral</a></p>
@stop