@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm border-danger">
        <div class="card-body">
            <p>{{ $text }}</p>

            <p><strong>{{ $tipo->nome }}</strong></p>

            <form method="POST" action="{{ route('tipos.destroy', $tipo) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Excluir</button>
                <a href="{{ route('tipos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
