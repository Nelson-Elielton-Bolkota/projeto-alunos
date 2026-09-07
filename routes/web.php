<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return 'Página Sobre: Informações sobre o sistema.';
});

Route::get('/alunos', function () {
    return 'Página de Alunos: Listagem geral de estudantes.';
});

Route::get('/contato', function () {
    return 'Página de Contato: Fale conosco.';
});
//atv2
Route::get('/produto/{id}', function ($id) {
    return "Exibindo detalhes do Produto com ID: " . $id;
});

Route::get('/categoria/{id}', function ($id) {
    return "Exibindo produtos da Categoria com ID: " . $id;
});

Route::get('/usuario/{id}', function ($id) {
    return "Perfil do Usuário com ID: " . $id;
});
// ATV 4: Rotas de recurso para o CRUD de Alunos
Route::resource('alunos', AlunoController::class);

