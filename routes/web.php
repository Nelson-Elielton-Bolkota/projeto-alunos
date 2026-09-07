<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController; // Importação essencial para o CRUD
use Illuminate\Support\Facades\Route;

// Rota Raiz - Ajustada para a página inicial estilizada do Tema 4
Route::get('/', function () {
    return view('home'); 
});

// ================= TEMA 1: ROTAS SIMPLES E PARAMETRIZADAS =================
Route::get('/sobre', function () {
    return 'Página Sobre: Informações sobre o sistema.';
});

Route::get('/contato', function () {
    return 'Página de Contato: Fale conosco.';
});

Route::get('/produto/{id}', function ($id) {
    return "Exibindo detalhes do Produto com ID: " . $id;
});

Route::get('/categoria/{id}', function ($id) {
    return "Exibindo produtos da Categoria com ID: " . $id;
});

Route::get('/usuario/{id}', function ($id) {
    return "Perfil do Usuário com ID: " . $id;
});

// ================= TEMA 9: RELACIONAMENTO (CURSOS) =================
Route::get('/cursos/{id}/alunos', [AlunoController::class, 'alunosPorCurso'])->name('cursos.alunos');

// ================= TEMAS 2, 7 & 8: CRUD DE ALUNOS =================
Route::resource('alunos', AlunoController::class);

// ================= BREEZE (DASHBOARD & PROFILE) =================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ================= TEMA 11: MIDDLEWARES DE SEGURANÇA =================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Área Restrita - Bem-vindo ao Painel do Administrador!';
    });
});

Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/professor', function () {
        return 'Área Restrita - Bem-vindo ao Painel do Professor!';
    });
});