@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Detalhes do Imóvel</h1>
            <div class="page-subtitle">
                Informações cadastradas
            </div>
        </div>
    </div>

    <div class="content-card">

        <h4 class="fw-bold mb-4">
            <i class="bi bi-house-door-fill me-2"></i>
            {{ $imovel->titulo }}
        </h4>

        <div class="mb-3">
            <strong>Endereço</strong><br>
            <span class="text-secondary">
            {{ $imovel->endereco }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Cidade</strong><br>
            <span class="text-secondary">
            {{ $imovel->cidade }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Valor</strong><br>
            <span class="text-secondary">
            R$ {{ number_format($imovel->valor, 2, ',', '.') }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Status</strong><br>
            <span class="text-secondary">
            {{ $imovel->status }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Tipo</strong><br>
            <span class="text-secondary">
            {{ $imovel->tipo->nome ?? 'Não definido' }}
        </span>
        </div>

        <a href="{{ route('imoveis.index') }}"
           class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

@endsection
