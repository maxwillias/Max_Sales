@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-7">
            <div class="form-floating mb-3">
                <select class="form-select" name="produtos">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <label>Produto</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-floating mb-3">
                <input type="number" name="quantidade" class="form-control" placeholder="Quantidade">
                <label>Quantidade</label>
            </div>
        </div>
        <div class="col-2 mt-2">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
    <div class="mt-3">
        <table class="table">
            <thead>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
