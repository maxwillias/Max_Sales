@extends('layouts.app')

@section('content')
    <form action="{{  route('products.update', ['product' => $item]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $item->name }}">
            <label>Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="valor" class="form-control" placeholder="Valor" value="{{ $item->price }}">
            <label>Valor</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="quantidade" class="form-control" placeholder="Quantidade" value="{{ $item->quantity }}">
            <label>Quantidade</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="categoria" value="{{ $item->category }}">
                @foreach ($categories as $category)
                    @if ($category->code === $item->category()->first()->code)
                        <option selected value="{{ $category->code }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->code }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            <label for="floatingSelect">Categoria</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input name="foto" class="form-control" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
