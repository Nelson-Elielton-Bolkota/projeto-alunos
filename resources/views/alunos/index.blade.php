@extends('layouts/app')

@section('titulo', 'Lista de Alunos')

@section('conteudo')
    <h2>Listagem de Alunos</h2>

    @php
        // Simulando dados que futuramente virão do banco de dados PostgreSQL
        $alunos = ['Ana Silva', 'Bruno Costa', 'Carlos Souza'];
    @endphp

    @if(empty($alunos))
        <p class="alert">Nenhum aluno cadastrado no sistema.</p>
    @else
        <ul>
            @foreach($alunos as $aluno)
                <li>{{ $aluno }}</li>
            @endforeach
        </ul>
    @endif
@stop
