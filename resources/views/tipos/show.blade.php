@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $tipo->nome }}</p>

            <a href="{{ route('tipos.index') }}" class="btn btn-secondary mt-3">
                Voltar
            </a>
        </div>
    </div>
@endsection
