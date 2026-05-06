@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <a href="{{ route('tipos.create') }}" class="btn btn-primary mb-3">
        Novo Tipo
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
        @foreach($tipos as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->nome }}</td>
                <td>
                    <a href="{{ route('tipos.show', $tipo) }}" class="btn btn-info btn-sm">
                        Ver
                    </a>
                    <a href="{{ route('tipos.delete', $tipo) }}" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
