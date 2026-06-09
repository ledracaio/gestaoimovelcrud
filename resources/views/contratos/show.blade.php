@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Detalhes do Contrato</h1>
            <div class="page-subtitle">
                Informações do contrato
            </div>
        </div>
    </div>

    <div class="content-card">

        <h4 class="fw-bold mb-4">
            <i class="bi bi-file-earmark-text-fill me-2"></i>
            Contrato #{{ $contrato->id }}
        </h4>

        <div class="mb-3">
            <strong>Cliente</strong><br>
            <span class="text-secondary">
            {{ $contrato->cliente->nome ?? '—' }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Imóvel</strong><br>
            <span class="text-secondary">
            {{ $contrato->imovel->titulo ?? '—' }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Data de Início</strong><br>
            <span class="text-secondary">
            {{ $contrato->data_inicio }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Data de Fim</strong><br>
            <span class="text-secondary">
            {{ $contrato->data_fim }}
        </span>
        </div>

        <a href="{{ route('contratos.index') }}"
           class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

@endsection
