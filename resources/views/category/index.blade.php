@extends('layouts.app')

@section('content')
    @include('alerts._alerts')

    <a href={{ route('categories.create') }} class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i> Adicionar novo</a>
    <div>
        <table class="table">
            <thead>
                <th>Icone</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            icone
                        </td>
                        <td>
                            {{ $item->code }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>
                            <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{ route('categories.show', ['category' => $item]) }}">
                                    <i class="bi bi-eye"></i> Detalhes
                                </a>

                                <a class="dropdown-item" href="{{ route('categories.edit', ['category' => $item]) }}">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('categories.destroy', ['category' => $item]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
