<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Sistema' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4>Gestão de Imóveis</h4>
        <hr>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('clientes.index') }}">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('imoveis.index') }}">Imóveis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('contratos.index') }}">Contratos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('tipos.index') }}">Tipos</a>
            </li>
        </ul>
    </div>

    <!-- CONTEÚDO -->
    <div class="p-4 w-100 bg-light">
        @yield('content')
    </div>

</div>
</body>
</html>
