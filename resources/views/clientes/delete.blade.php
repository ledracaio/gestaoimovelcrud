@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>

<div class="card shadow-sm border-danger">
    <div class="card-body">

        <p>{{ $text }}</p>

        <p><strong>{{ $cliente->nome }}</strong></p>

        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger">Excluir</button>

            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </form>

    </div>
</div>
@endsection
