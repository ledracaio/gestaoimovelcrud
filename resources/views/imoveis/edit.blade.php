@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('imoveis.update', $imovel) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="{{ $imovel->titulo }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" value="{{ $imovel->endereco }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" value="{{ $imovel->cidade }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor</label>
                    <input type="number" name="valor" class="form-control" value="{{ $imovel->valor }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Ativo" {{ $imovel->status == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="Inativo" {{ $imovel->status == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select name="tipo_imovel_id" class="form-control">
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ $imovel->tipo_imovel_id == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('imoveis.index') }}" class="btn btn-secondary">Voltar</a>

            </form>

        </div>
    </div>

@endsection
