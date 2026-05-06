@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm border-danger">
        <div class="card-body">
            <p>{{ $text }}</p>

            <p><strong>{{ $imovel->titulo }}</strong></p>

            <form method="POST" action="{{ route('imoveis.destroy', $imovel) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Excluir</button>
                <a href="{{ route('imoveis.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
