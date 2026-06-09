@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Editar Contrato</h1>
            <div class="page-subtitle">
                Atualize as informações do contrato
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('contratos.update', $contrato) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill me-2"></i>
                    Cliente
                </label>

                <select name="cliente_id" class="form-select">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ $contrato->cliente_id == $cliente->id ? 'selected' : '' }}>
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

                <select name="imovel_id" class="form-select">
                    @foreach($imoveis as $imovel)
                        <option value="{{ $imovel->id }}"
                            {{ $contrato->imovel_id == $imovel->id ? 'selected' : '' }}>
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

                <input
                    type="date"
                    name="data_inicio"
                    class="form-control"
                    value="{{ substr($contrato->data_inicio, 0, 10) }}"
                >
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-calendar-check-fill me-2"></i>
                    Data de Fim
                </label>

                <input
                    type="date"
                    name="data_fim"
                    class="form-control"
                    value="{{ substr($contrato->data_fim, 0, 10) }}"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy-fill me-2"></i>
                Atualizar
            </button>

            <a href="{{ route('contratos.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
