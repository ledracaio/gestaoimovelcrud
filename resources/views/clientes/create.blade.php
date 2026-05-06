@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('clientes.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Voltar</a>
</form>


@endsection
