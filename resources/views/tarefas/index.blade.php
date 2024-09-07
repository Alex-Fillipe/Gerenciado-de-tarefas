@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Tarefas</h1>

        <div class="card">
            <div class="card-header">
                Tarefas
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif

                <input type="text" id="search" placeholder="Buscar Tarefas" class="form-control mb-3">
             
                <ul class="list-group" id="tarefas-list">
                    @foreach ($tarefas as $tarefa)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $tarefa->titulo }}</strong> - {{ $tarefa->status }}
                            </div>
                            <div>
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-{{ $tarefa->id }}">
                                    Visualizar
                                </button>

                                <form action="{{ route('tarefas.concluida', $tarefa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Concluir</button>
                                </form>

                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </div>
                        </li>

                         <!-- Modal -->
                         <div class="modal fade" id="modal-{{ $tarefa->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $tarefa->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel-{{ $tarefa->id }}">Detalhes da Tarefa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('imagens/tarefa.png') }}" alt="Imagem da Tarefa" class="img-fluid" style="max-width: 100px;">
                                    </div>
                                        <p><strong>Título:</strong> {{ $tarefa->titulo }}</p>
                                        <p><strong>Descrição:</strong> {!! $tarefa->descricao !!}</p>
                                        <p>
                                        <strong>Status:</strong> 
                                        <span class="badge 
                                            @if($tarefa->status == 'pendente')
                                                badge-warning
                                            @elseif($tarefa->status == 'concluída')
                                                badge-primary
                                            @endif
                                        "> {{ $tarefa->status }}
                                        </span>
                                    </p>
                                        <p><strong>Criado: <i class="fas fa-calendar-edit"></i></strong> {{ \Carbon\Carbon::parse($tarefa->created_at)->format('d/m/Y H:i:s') }}</p>
                                        <p><strong>Atualizado: <i class="fas fa-calendar-edit"></i></strong> {{ \Carbon\Carbon::parse($tarefa->updated_at)->format('d/m/Y H:i:s') }}</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        
            $('#search').on('input', function() {
                let query = $(this).val();

                $.ajax({
                    url: '{{ route('tarefas.buscar') }}',
                    type: 'GET',
                    data: { search: query },
                    success: function(data) {
                        
                        $('#tarefas-list').empty(); 
                        data.forEach(function(tarefa) {
 
                let listItem = `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>${tarefa.titulo}</strong> - ${tarefa.status}
                        </div>
                        <div>
                            <a href="/tarefas/${tarefa.id}/edit" class="btn btn-warning btn-sm">Editar</a>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-${tarefa.id}">
                                Visualizar
                            </button>

                            <form action="/tarefas/${tarefa.id}/concluida" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Concluir</button>
                            </form>

                            <form action="/tarefas/${tarefa.id}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </li>
                `;

  
                $('#tarefas-list').append(listItem);

                        
                            let modal = `
                                <div class="modal fade" id="modal-${tarefa.id}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-${tarefa.id}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel-${tarefa.id}">Detalhes da Tarefa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <img src="{{ asset('imagens/tarefa.png') }}" alt="Imagem da Tarefa" class="img-fluid" style="max-width: 100px;">
                                                </div>
                                                <p><strong>Título:</strong> ${tarefa.titulo}</p>
                                                <p><strong>Descrição:</strong> ${tarefa.descricao}</p>
                                                <p>
                                                    <strong>Status:</strong>
                                                    <span class="badge ${tarefa.status === 'pendente' ? 'badge-warning' : 'badge-primary'}"> ${tarefa.status}
                                                    </span>
                                                </p>
                                                <p><strong>Criado: <i class="fas fa-calendar-edit"></i></strong> ${new Date(tarefa.created_at).toLocaleString()}</p>
                                                <p><strong>Atualizado: <i class="fas fa-calendar-edit"></i></strong> ${new Date(tarefa.updated_at).toLocaleString()}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;                        
                            $('#tarefas-list').append(modal);
                        });
                    }
                });
            });
        });
    </script>
@endsection
