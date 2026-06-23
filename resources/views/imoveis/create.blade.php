@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Novo Imóvel</h1>
            <div class="page-subtitle">
                Cadastre um novo imóvel no sistema
            </div>
        </div>
    </div>

    <div class="content-card">

        <form method="POST" action="{{ route('imoveis.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-house-fill me-2"></i>
                    Título
                </label>

                <input type="text"
                       name="titulo"
                       class="form-control"
                       placeholder="Título"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Endereço
                </label>

                <input type="text"
                       name="endereco"
                       class="form-control"
                       placeholder="Endereço"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-buildings-fill me-2"></i>
                    Cidade
                </label>

                <input type="text"
                       name="cidade"
                       class="form-control"
                       placeholder="Cidade"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-cash-stack me-2"></i>
                    Valor
                </label>

                <input type="number"
                       name="valor"
                       class="form-control"
                       placeholder="Valor"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Status
                </label>

                <select name="status" class="form-select" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-tags-fill me-2"></i>
                    Tipo de Imóvel
                </label>

                <div class="input-group">
                    <select name="tipo_imovel_id" id="tipo_imovel_id" class="form-select" required>
                        <option value="">Selecione</option>

                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">
                                {{ $tipo->nome }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNovoTipo">
                        <i class="bi bi-plus-lg"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="add_another" id="add_another" {{ session('add_another') ? 'checked' : '' }}>
                    <label class="form-check-label" for="add_another">
                        Adicionar outro após salvar
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                Salvar
            </button>

            <a href="{{ route('imoveis.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Voltar
            </a>

        </form>

    </div>

    <!-- Modal Novo Tipo -->
    <div class="modal fade" id="modalNovoTipo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Novo Tipo de Imóvel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome do Tipo</label>
                        <input type="text" id="novo_tipo_nome" class="form-control" placeholder="Ex: Galpão, Cobertura">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnSalvarTipo" class="btn btn-primary">Salvar e Selecionar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btnSalvarTipo').addEventListener('click', function() {
            const nome = document.getElementById('novo_tipo_nome').value;
            if (!nome) return alert('Por favor, digite o nome do tipo.');

            fetch('{{ route('tipos.api.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ nome: nome })
            })
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('tipo_imovel_id');
                    const option = new Option(data.nome, data.id, true, true);
                    select.add(option);

                    // Fechar modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('modalNovoTipo'));
                    modal.hide();
                    document.getElementById('novo_tipo_nome').value = '';
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Ocorreu um erro ao salvar o tipo.');
                });
        });
    </script>
@endsection
