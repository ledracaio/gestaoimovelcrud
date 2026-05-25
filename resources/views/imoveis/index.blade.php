@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <a href="{{ route('imoveis.create') }}" class="btn btn-primary mb-3">
        Novo Imóvel
    </a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Cidade</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($imoveis as $imovel)
            <tr>
                <td>{{ $imovel->id }}</td>
                <td>{{ $imovel->titulo }}</td>
                <td>{{ $imovel->cidade }}</td>
                <td>R$ {{ $imovel->valor }}</td>
                <td>{{ $imovel->tipo->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('imoveis.show', $imovel) }}" class="btn btn-info btn-sm">
                        Ver
                    </a>
                    <a href="{{ route('imoveis.edit', $imovel) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <a href="{{ route('imoveis.delete', $imovel) }}" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
