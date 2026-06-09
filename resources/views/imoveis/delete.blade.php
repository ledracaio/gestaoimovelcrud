@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title text-danger">
                Excluir Imóvel
            </h1>

            <div class="page-subtitle">
                Esta ação não poderá ser desfeita
            </div>
        </div>
    </div>

    <div class="content-card border border-danger">

        <div class="text-center">

            <i class="bi bi-exclamation-triangle-fill text-danger"
               style="font-size:4rem;"></i>

            <h4 class="mt-3">
                Tem certeza que deseja excluir este imóvel?
            </h4>

            <p class="text-secondary">
                {{ $imovel->titulo }}
            </p>

            <form method="POST"
                  action="{{ route('imoveis.destroy', $imovel) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    <i class="bi bi-trash-fill me-2"></i>
                    Excluir
                </button>

                <a href="{{ route('imoveis.index') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>
                    Cancelar
                </a>

            </form>

        </div>

    </div>

@endsection
