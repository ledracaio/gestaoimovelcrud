@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $contrato->id }}</p>

            <p><strong>Cliente:</strong>
                {{ $contrato->cliente->nome ?? '—' }}
            </p>

            <p><strong>Imóvel:</strong>
                {{ $contrato->imovel->titulo ?? '—' }}
            </p>

            <p><strong>Início:</strong> {{ $contrato->data_inicio }}</p>
            <p><strong>Fim:</strong> {{ $contrato->data_fim }}</p>

            <a href="{{ route('contratos.index') }}" class="btn btn-secondary mt-3">
                Voltar
            </a>
        </div>
    </div>
@endsection
