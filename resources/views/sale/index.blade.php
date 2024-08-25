@extends('layouts.app')

@section('content')
    @include('alerts._alerts')

    <a href={{ route('sales.create') }} class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i> Adicionar novo</a>
    <div>
        <table class="table">
            <thead>
                <th>Código</th>
                <th>Quantidade de Produtos</th>
                <th>Total</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->total_products }}
                        </td>
                        <td>
                            {{ $item->total_price }}
                        </td>
                        <td>
                            <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                <a class="dropdown-item" href="">
                                    <i class="bi bi-eye"></i> Detalhes
                                </a>

                                <a class="dropdown-item" href="">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <a class="dropdown-item text-danger" href="">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
