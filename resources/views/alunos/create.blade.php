@extends('layouts/app')

@section('titulo', 'Cadastrar Aluno')

@section('conteudo')
    <h2>Cadastrar Novo Aluno</h2>

    <!-- Exibição de erros de validação -->
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de cadastro -->
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf <!-- Diretiva obrigatória do Laravel para proteção contra CSRF -->
        
        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; font-weight: bold; margin-bottom: 5px;">Nome do Aluno:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="curso" style="display: block; font-weight: bold; margin-bottom: 5px;">Curso:</label>
            <input type="text" name="curso" id="curso" value="{{ old('curso') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
            Salvar Aluno
        </button>
    </form>
@stop
