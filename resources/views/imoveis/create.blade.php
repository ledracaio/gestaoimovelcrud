@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('imoveis.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" placeholder="Endereço" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor</label>
                    <input type="number" name="valor" class="form-control" placeholder="Valor" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de Imóvel</label>
                    <select name="tipo_imovel_id" class="form-select" required>
                        <option value="">Selecione</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('imoveis.index') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection
