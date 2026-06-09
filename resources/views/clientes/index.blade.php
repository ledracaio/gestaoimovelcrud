@extends('layouts.app')

@section('content')
    <div class="page-header mb-4">
        <div>
            <h1 class="page-title">
                {{ $title }}
            </h1>

            <div class="page-subtitle">
                {{ $subtitle }}
            </div>
        </div>
    </div>

    <a href="{{ route('clientes.create') }}"
       class="btn btn-primary mb-3">
        <i class="bi bi-person-plus-fill"></i>
        Novo Cliente
    </a>
    <div class="card-modern">
        <table class="table table-modern table-hover align-middle mb-0">
        <thead>
        <tr>
            <th>
                <a href="{{ route('clientes.index', [
        'sort' => 'id',
        'direction' => request('sort') == 'id' && request('direction', 'asc') == 'asc'
            ? 'desc'
            : 'asc',
        'per_page' => request('per_page')
    ]) }}"
                   class="text-decoration-none text-dark fw-semibold">

                    ID

                    @if(request('sort', 'id') == 'id')
                        <i class="bi bi-caret-{{ request('direction', 'asc') == 'asc' ? 'up' : 'down' }}-fill"></i>
                    @endif

                </a>
            </th>

            <th>
                <a href="{{ route('clientes.index', [
        'sort' => 'nome',
        'direction' => request('sort') == 'nome' && request('direction') == 'asc'
            ? 'desc'
            : 'asc',
        'per_page' => request('per_page')
    ]) }}"
                   class="text-decoration-none text-dark">

                    Nome

                    @if(request('sort') == 'nome')
                        <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                    @endif

                </a>
            </th>

            <th>
                Ações
            </th>
        </tr>
        </thead>

        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>
                    <div class="d-flex gap-2">

                        <a href="{{ route('clientes.show', $cliente) }}"
                           class="btn btn-outline-primary btn-sm"
                           title="Visualizar">
                            <i class="bi bi-eye-fill"></i> Ver
                        </a>

                        <a href="{{ route('clientes.edit', $cliente) }}"
                           class="btn btn-outline-warning btn-sm"
                           title="Editar">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>

                        <a href="{{ route('clientes.delete', $cliente) }}"
                           class="btn btn-outline-danger btn-sm"
                           title="Excluir">
                            <i class="bi bi-trash-fill"></i> Deletar
                        </a>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3 mt-4">

        <div class="d-flex align-items-center gap-3">

            <small class="text-muted">
                Mostrando {{ $clientes->firstItem() ?? 0 }}
                a {{ $clientes->lastItem() ?? 0 }}
                de {{ $clientes->total() }} clientes
            </small>

            <form method="GET" class="d-flex align-items-center gap-2">

                <label class="small text-muted mb-0">
                    Exibir
                </label>

                <select name="per_page"
                        class="form-select form-select-sm form-select-modern"
                        onchange="this.form.submit()">

                    <option value="2" {{ request('per_page') == 2 ? 'selected' : '' }}>2</option>
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page',10) == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>

                </select>
                <label class="small text-muted mb-0"> registros</label>

            </form>

        </div>

        <div>
            {{ $clientes->onEachSide(1)->links() }}
        </div>

    </div>
@endsection
