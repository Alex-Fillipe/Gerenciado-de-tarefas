@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Tarefa <img src="{{ asset('imagens/tarefa.png') }}" alt="Imagem da Tarefa" class="img-fluid" style="max-width: 100px;"></h1>

    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ old('status') == 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prioridade">Prioridade:</label>
            <select class="form-control" id="prioridade" name="prioridade">
                <option value="baixa" {{ old('prioridade') == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ old('prioridade') == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ old('prioridade') == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
            @error('prioridade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar para a lista de tarefas</a>
    </form>
</div>
@endsection
