@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('contratos.update', $contrato) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-control">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $contrato->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imóvel</label>
                    <select name="imovel_id" class="form-control">
                        @foreach($imoveis as $imovel)
                            <option value="{{ $imovel->id }}" {{ $contrato->imovel_id == $imovel->id ? 'selected' : '' }}>
                                {{ $imovel->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data Início</label>
                    <input type="date" name="data_inicio" class="form-control" value="{{ substr($contrato->data_inicio,0,10) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data Fim</label>
                    <input type="date" name="data_fim" class="form-control" value="{{ substr($contrato->data_fim,0,10) }}">
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Voltar</a>

            </form>

        </div>
    </div>

@endsection
