@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>

        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">
            Voltar
        </a>

    </div>
</div>
@endsection
