@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Editar Tipo de Imóvel</h1>
            <div class="page-subtitle">
                Atualize as informações do tipo
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('tipos.update', $tipo) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-tags-fill me-2"></i>
                    Nome
                </label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ $tipo->nome }}"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy-fill me-2"></i>
                Atualizar
            </button>

            <a href="{{ route('tipos.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

@endsection
