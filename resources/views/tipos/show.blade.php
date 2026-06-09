@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Detalhes do Tipo</h1>
            <div class="page-subtitle">
                Informações cadastradas
            </div>
        </div>
    </div>

    <div class="content-card">

        <h4 class="fw-bold mb-4">
            <i class="bi bi-tags-fill me-2"></i>
            {{ $tipo->nome }}
        </h4>

        <div class="mb-3">
            <strong>Nome</strong><br>
            <span class="text-secondary">
            {{ $tipo->nome }}
        </span>
        </div>

        <a href="{{ route('tipos.index') }}"
           class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

@endsection
