@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Novo Contrato</h1>
            <div class="page-subtitle">
                Cadastre um novo contrato no sistema
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('contratos.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill me-2"></i>
                    Cliente
                </label>

                <select name="cliente_id" class="form-select" required>
                    <option value="">Selecione um cliente</option>

                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-house-door-fill me-2"></i>
                    Imóvel
                </label>

                <select name="imovel_id" class="form-select" required>
                    <option value="">Selecione um imóvel</option>

                    @foreach($imoveis as $imovel)
                        <option value="{{ $imovel->id }}">
                            {{ $imovel->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-calendar-event-fill me-2"></i>
                    Data de Início
                </label>

                <input type="date"
                       name="data_inicio"
                       class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-calendar-check-fill me-2"></i>
                    Data de Fim
                </label>

                <input type="date"
                       name="data_fim"
                       class="form-control">
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="add_another" id="add_another" {{ session('add_another') ? 'checked' : '' }}>
                    <label class="form-check-label" for="add_another">
                        Adicionar outro após salvar
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                Salvar
            </button>

            <a href="{{ route('contratos.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
