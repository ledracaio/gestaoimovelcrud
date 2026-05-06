@extends('layouts.app')

@section('content')

    <h2>Novo Contrato</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('contratos.store') }}">
                @csrf

                <!-- Cliente -->
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-select" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Imóvel -->
                <div class="mb-3">
                    <label class="form-label">Imóvel</label>
                    <select name="imovel_id" class="form-select" required>
                        <option value="">Selecione um imóvel</option>
                        @foreach($imoveis as $imovel)
                            <option value="{{ $imovel->id }}">
                                {{ $imovel->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Datas -->
                <div class="mb-3">
                    <label class="form-label">Data de Início</label>
                    <input type="date" name="data_inicio" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data de Fim</label>
                    <input type="date" name="data_fim" class="form-control">
                </div>

                <!-- Botões -->
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>

                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                    Voltar
                </a>

            </form>

        </div>
    </div>

@endsection
