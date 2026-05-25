@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>

            </form>

        </div>
    </div>

@endsection
