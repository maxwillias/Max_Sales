@extends('layouts.app')

@section('content')
    <div class="form-floating mb-3">
        <input disabled type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $item->name }}">
        <label>Nome</label>
    </div>
    <div class="form-floating">
        <textarea disabled class="form-control" placeholder="Descrição" name="descricao">{{ $item->description }}</textarea>
        <label>Descrição</label>
    </div>
    <div class="mb-3">
        <label class="form-label">Icone</label>
        <input disabled name="icone" class="form-control" type="file">
    </div>
@endsection
