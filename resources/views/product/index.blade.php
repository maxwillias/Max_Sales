@extends('layouts.app')

@section('content')
    @include('alerts._alerts')

    <a href={{ route('products.create') }} class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i> Adicionar novo</a>
    <div>
        <table class="table">
            <thead>
                <th>Foto</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            image
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                        <td>
                            categoria
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{ route('products.show', ['product' => $item]) }}">
                                    <i class="bi bi-eye"></i> Detalhes
                                </a>

                                <a class="dropdown-item" href="{{ route('products.edit', ['product' => $item]) }}">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('products.destroy', ['product' => $item]) }}" method="POST">
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
