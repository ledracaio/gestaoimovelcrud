@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('tipos.update', $tipo) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        value="{{ $tipo->nome }}"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>

                <a href="{{ route('tipos.index') }}" class="btn btn-secondary">
                    Voltar
                </a>

            </form>

        </div>
    </div>

@endsection
