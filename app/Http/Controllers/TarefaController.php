<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {

        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }
    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,concluída',
        ]);

        Tarefa::create($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,concluída',
        ]);

        $tarefa = Tarefa::findOrFail($id);

        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('danger', 'Tarefa excluída com sucesso!');
    }

    public function concluir($id)
    {

        $tarefa = Tarefa::findOrFail($id);


        if ($tarefa->status == 'concluída') {
            return redirect()->route('tarefas.index')->with('warning', 'A tarefa já está concluída!');
        }
        $tarefa->update(['status' => 'concluída']);
        return redirect()->route('tarefas.index')->with('success', 'Tarefa marcada como concluída!');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('search');
        $tarefas = Tarefa::where('titulo', 'like', "%{$query}%")->get();

        return response()->json($tarefas);
    }
}
