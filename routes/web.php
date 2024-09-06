<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;


/**
 * Adicione e modifique rotas conforme necessário
 */

 Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
 Route::get('tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
 Route::post('tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
 Route::get('tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
 Route::put('tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
 Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
 Route::post('tarefas/{id}/concluida', [TarefaController::class, 'concluir'])->name('tarefas.concluida');