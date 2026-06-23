@extends('layouts.app')

@section('content')

    <div class="page-header mb-4">
        <div>
            <h1 class="page-title">
                Dashboard
            </h1>

            <div class="page-subtitle">
                Visão geral do sistema imobiliário
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">
            <div class="content-card text-center h-100">

                <i class="bi bi-people-fill display-5 text-primary"></i>

                <h2 class="fw-bold mt-3">
                    {{ $clientes }}
                </h2>

                <div class="text-muted">
                    Clientes
                </div>

            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="content-card text-center h-100">

                <i class="bi bi-house-door-fill display-5 text-success"></i>

                <h2 class="fw-bold mt-3">
                    {{ $imoveis }}
                </h2>

                <div class="text-muted">
                    Imóveis
                </div>

            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="content-card text-center h-100">

                <i class="bi bi-file-earmark-text-fill display-5 text-warning"></i>

                <h2 class="fw-bold mt-3">
                    {{ $contratos }}
                </h2>

                <div class="text-muted">
                    Contratos
                </div>

            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="content-card text-center h-100">

                <i class="bi bi-tags-fill display-5 text-danger"></i>

                <h2 class="fw-bold mt-3">
                    {{ $tipos }}
                </h2>

                <div class="text-muted">
                    Tipos de Imóvel
                </div>

            </div>
        </div>

    </div>

    <div class="content-card mb-4">

        <h4 class="mb-4">
            <i class="bi bi-lightning-charge-fill me-2"></i>
            Ações Rápidas
        </h4>

        <div class="row g-3">

            <div class="col-md-3">
                <a href="{{ route('clientes.create') }}"
                   class="btn btn-primary w-100">

                    <i class="bi bi-person-plus-fill me-2"></i>

                    Novo Cliente

                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('imoveis.create') }}"
                   class="btn btn-success w-100">

                    <i class="bi bi-house-add-fill me-2"></i>

                    Novo Imóvel

                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('contratos.create') }}"
                   class="btn btn-warning text-white w-100">

                    <i class="bi bi-file-earmark-plus-fill me-2"></i>

                    Novo Contrato

                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('tipos.create') }}"
                   class="btn btn-danger w-100">

                    <i class="bi bi-tag-fill me-2"></i>

                    Novo Tipo

                </a>
            </div>

        </div>

    </div>

    <div class="content-card">

        <h4 class="mb-4">
            <i class="bi bi-clock-history me-2"></i>
            Últimos Contratos
        </h4>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Imóvel</th>
                    <th>Início</th>
                </tr>
                </thead>

                <tbody>

                @forelse($ultimosContratos as $contrato)

                    <tr>

                        <td>
                            #{{ $contrato->id }}
                        </td>

                        <td>
                            {{ $contrato->cliente->nome ?? '-' }}
                        </td>

                        <td>
                            {{ $contrato->imovel->titulo ?? '-' }}
                        </td>

                        <td>
                            {{ $contrato->data_inicio->format('d/m/Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Nenhum contrato encontrado.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
