@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>

<a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">
    Novo Cliente
</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>
                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>
                <a href="{{ route('clientes.delete', $cliente) }}" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
