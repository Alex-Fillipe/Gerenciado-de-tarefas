<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TarefaController;

/**
 * Adicione e modifique rotas conforme necessário
 */

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
    Route::get('/tarefas/buscar', [TarefaController::class, 'buscar'])->name('tarefas.buscar');
    Route::get('tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
    Route::put('tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
    Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
    Route::post('tarefas/{id}/concluida', [TarefaController::class, 'concluir'])->name('tarefas.concluida');
});

 
Auth::routes();  

Route::get('/home', [HomeController::class, 'index'])->name('home');
