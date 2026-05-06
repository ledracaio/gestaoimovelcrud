@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm border-danger">
        <div class="card-body">
            <p>{{ $text }}</p>

            <p>
                <strong>
                    Cliente: {{ $contrato->cliente->nome ?? '-' }} <br>
                    Imóvel: {{ $contrato->imovel->titulo ?? '-' }}
                </strong>
            </p>

            <form method="POST" action="{{ route('contratos.destroy', $contrato->id) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Excluir</button>
                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
