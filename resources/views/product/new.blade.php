@extends('layouts.app')

@section('content')
    <form action="{{  route('products.store') }}" method="POST">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <label>Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="valor" class="form-control" placeholder="Valor">
            <label>Valor</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="quantidade" class="form-control" placeholder="Quantidade">
            <label>Quantidade</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="categoria">
                @foreach ($categories as $category)
                    <option value="{{ $category->code }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label>Categoria</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input name="foto" class="form-control" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
