@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Novo Imóvel</h1>
            <div class="page-subtitle">
                Cadastre um novo imóvel no sistema
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('imoveis.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-house-fill me-2"></i>
                    Título
                </label>

                <input type="text"
                       name="titulo"
                       class="form-control"
                       placeholder="Título"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Endereço
                </label>

                <input type="text"
                       name="endereco"
                       class="form-control"
                       placeholder="Endereço"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-buildings-fill me-2"></i>
                    Cidade
                </label>

                <input type="text"
                       name="cidade"
                       class="form-control"
                       placeholder="Cidade"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-cash-stack me-2"></i>
                    Valor
                </label>

                <input type="number"
                       name="valor"
                       class="form-control"
                       placeholder="Valor"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Status
                </label>

                <select name="status" class="form-select" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-tags-fill me-2"></i>
                    Tipo de Imóvel
                </label>

                <select name="tipo_imovel_id" class="form-select" required>
                    <option value="">Selecione</option>

                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">
                            {{ $tipo->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                Salvar
            </button>

            <a href="{{ route('imoveis.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
