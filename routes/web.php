<?php

use Illuminate\Support\Facades\Route;

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