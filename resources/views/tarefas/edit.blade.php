@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tarefa <img src="{{ asset('imagens/tarefa.png') }}" alt="Imagem da Tarefa" class="img-fluid" style="max-width: 100px;"></h1>
    
    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo', $tarefa->titulo) }}" required>
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3">{{ old('descricao', $tarefa->descricao) }}</textarea>
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="pendente" {{ old('status', $tarefa->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ old('status', $tarefa->status) == 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prioridade">Prioridade:</label>
            <select class="form-control" name="prioridade" id="prioridade">
                <option value="baixa" {{ old('prioridade', $tarefa->prioridade) == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ old('prioridade', $tarefa->prioridade) == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ old('prioridade', $tarefa->prioridade) == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
            @error('prioridade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar para a lista de tarefas</a>
    </form>
</div>
@endsection
