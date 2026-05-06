@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Título:</strong> {{ $imovel->titulo }}</p>
            <p><strong>Endereço:</strong> {{ $imovel->endereco }}</p>
            <p><strong>Cidade:</strong> {{ $imovel->cidade }}</p>
            <p><strong>Valor:</strong> R$ {{ $imovel->valor }}</p>
            <p><strong>Status:</strong> {{ $imovel->status }}</p>
            <p><strong>Tipo:</strong> {{ $imovel->tipo->nome ?? 'Não definido' }}</p>

            <a href="{{ route('imoveis.index') }}" class="btn btn-secondary mt-3">
                Voltar
            </a>
        </div>
    </div>
@endsection
