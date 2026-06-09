@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Editar Cliente</h1>
            <div class="page-subtitle">
                Atualize as informações do cliente
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('clientes.update', $cliente) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill me-2"></i>Nome
                </label>
                <input type="text" name="nome" class="form-control"
                       value="{{ $cliente->nome }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-telephone-fill me-2"></i>Telefone
                </label>
                <input type="text" name="telefone" class="form-control"
                       value="{{ $cliente->telefone }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-envelope-fill me-2"></i>Email
                </label>
                <input type="email" name="email" class="form-control"
                       value="{{ $cliente->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy-fill me-2"></i>
                Atualizar
            </button>

            <a href="{{ route('clientes.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
