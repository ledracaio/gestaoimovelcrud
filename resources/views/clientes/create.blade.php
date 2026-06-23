@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Novo Cliente</h1>
            <div class="page-subtitle">
                Cadastre um novo cliente no sistema
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('clientes.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill me-2"></i>Nome
                </label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-telephone-fill me-2"></i>Telefone
                </label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-envelope-fill me-2"></i>Email
                </label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="add_another" id="add_another" {{ session('add_another') ? 'checked' : '' }}>
                    <label class="form-check-label" for="add_another">
                        Adicionar outro após salvar
                    </label>
                </div>
            </div>

            <button class="btn btn-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                Salvar
            </button>

            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
