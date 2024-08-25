@extends('layouts.app')

@section('content')
    <form action="{{  route('categories.store') }}" method="POST">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <label>Nome</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Descrição" name="descricao"></textarea>
            <label>Descrição</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Icone</label>
            <input name="icone" class="form-control" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
