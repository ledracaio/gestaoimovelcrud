@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">
        Novo Contrato
    </a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Imóvel</th>
            <th>Período</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contratos as $contrato)
            <tr>
                <td>{{ $contrato->id }}</td>
                <td>{{ $contrato->cliente->nome ?? '—' }}</td>
                <td>{{ $contrato->imovel->titulo ?? '—' }}</td>
                <td>
                    {{ $contrato->data_inicio->format('d/m/Y') }} até {{ $contrato->data_fim->format('d/m/Y') }}
                </td>
                <td>
                    <a href="{{ route('contratos.show', $contrato->id) }}"
                       class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <a href="{{ route('contratos.delete', $contrato->id) }}"
                       class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
