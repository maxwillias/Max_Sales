@extends('layouts.app')

@section('content')
    <div class="form-floating mb-3">
        <input disabled type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $item->name }}">
        <label>Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="number" name="valor" class="form-control" placeholder="Valor" value="{{ $item->price }}">
        <label>Valor</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="number" name="quantidade" class="form-control" placeholder="Quantidade" value="{{ $item->quantity }}">
        <label>Quantidade</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" name="categoria" disabled>
            <option selected value="{{ $item->category()->first()->code }}">{{ $item->category()->first()->name }}</option>
        </select>
        <label for="floatingSelect">Categoria</label>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input disabled name="foto" class="form-control" type="file">
    </div>
@endsection
