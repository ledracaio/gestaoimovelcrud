@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Detalhes do Cliente</h1>
            <div class="page-subtitle">
                Informações cadastradas
            </div>
        </div>
    </div>

    <div class="content-card">

        <div class="mb-4">
            <h4 class="fw-bold">
                <i class="bi bi-person-circle me-2"></i>
                {{ $cliente->nome }}
            </h4>
        </div>

        <div class="mb-3">
            <strong>Telefone</strong><br>
            <span class="text-secondary">
            {{ $cliente->telefone }}
        </span>
        </div>

        <div class="mb-3">
            <strong>Email</strong><br>
            <span class="text-secondary">
            {{ $cliente->email }}
        </span>
        </div>

        <a href="{{ route('clientes.index') }}"
           class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

@endsection
