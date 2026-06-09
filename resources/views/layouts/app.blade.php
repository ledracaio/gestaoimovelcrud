<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} | ImobSystem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        :root{
            --primary:#2563eb;
            --primary-dark:#1d4ed8;
            --sidebar:#0f172a;
            --sidebar-hover:#1e293b;
            --bg:#f8fafc;
            --card:#ffffff;
            --text:#0f172a;
            --border:#e2e8f0;
        }

        *{
            font-family:'Inter',sans-serif;
        }

        body{
            margin:0;
            background:var(--bg);
            color:var(--text);
        }

        .sidebar{
            width:270px;
            min-height:100vh;
            background:var(--sidebar);
            position:fixed;
            left:0;
            top:0;
            padding:24px;
            box-shadow:4px 0 20px rgba(0,0,0,.15);
        }

        .logo{
            color:white;
            font-size:1.5rem;
            font-weight:800;
            margin-bottom:30px;
        }

        .logo i{
            color:#60a5fa;
        }

        .menu-link{
            display:flex;
            align-items:center;
            gap:12px;
            color:#cbd5e1;
            text-decoration:none;
            padding:14px 16px;
            border-radius:14px;
            margin-bottom:8px;
            transition:.2s;
            font-weight:500;
        }

        .menu-link:hover{
            background:var(--sidebar-hover);
            color:white;
            transform:translateX(4px);
        }

        .menu-link i{
            font-size:1.1rem;
        }

        .main{
            margin-left:270px;
            min-height:100vh;
        }

        .topbar{
            background:white;
            height:80px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 30px;
            border-bottom:1px solid var(--border);
        }

        .topbar-title{
            font-size:1.4rem;
            font-weight:700;
        }

        .content{
            padding:30px;
        }

        .page-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .page-title{
            font-size:2rem;
            font-weight:800;
            margin:0;
        }

        .page-subtitle{
            color:#64748b;
        }

        .card-modern{
            background:var(--card);
            border:none;
            border-radius:22px;
            box-shadow:0 8px 25px rgba(15,23,42,.06);
            overflow:hidden;
        }

        .table{
            margin-bottom:0;
        }

        .table thead{
            background:#f8fafc;
        }

        .table thead th{
            border:none;
            padding:18px;
            font-weight:700;
        }

        .table tbody td{
            padding:18px;
            vertical-align:middle;
        }

        .btn{
            border-radius:12px;
            font-weight:600;
        }

        .btn-primary{
            background:var(--primary);
            border:none;
        }

        .btn-primary:hover{
            background:var(--primary-dark);
        }

        .btn-sm{
            border-radius:10px;
        }

        .pagination{
            margin-bottom:0;
        }

        .page-link{
            border-radius:10px !important;
            margin:0 2px;
            border:none;
        }

        .alert{
            border:none;
            border-radius:16px;
        }

        .content-card{
            background:white;
            border-radius:22px;
            padding:25px;
            box-shadow:0 8px 25px rgba(15,23,42,.05);
        }

        .form-select-modern{
            width:90px;
            border-radius:12px;
            border:1px solid #e5e7eb;
            box-shadow:0 2px 8px rgba(0,0,0,.05);
            transition:.2s;
        }

        .form-select-modern:focus{
            box-shadow:0 0 0 .2rem rgba(13,110,253,.15);
            border-color:#86b7fe;
        }

        .card-modern{
            background:#fff;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(0,0,0,.06);
        }

        .table-modern thead th{
            background:#f1f1f1;
            color:#64748b;
            font-size:.85rem;
            text-transform:uppercase;
            letter-spacing:.05em;
            border-bottom:1px solid #e2e8f0;
        }

    </style>

    <script>
        setTimeout(function() {
            document.querySelectorAll('.auto-hide').forEach(el => {
                el.style.transition = "opacity .5s";
                el.style.opacity = "0";
                setTimeout(() => el.remove(), 500);
            });
        }, 5000);
    </script>

</head>

<body>

<aside class="sidebar">

    <div class="d-flex align-items-center mb-4 logo">
        <i class="bi bi-buildings-fill fs-3 me-2"></i>
        <span class="fw-bold fs-5">
        ImobSystem
    </span>
    </div>

    <a class="menu-link" href="{{ route('home') }}">
        <i class="bi bi-grid-fill"></i>
        Dashboard
    </a>


    <a class="menu-link" href="{{ route('clientes.index') }}">
        <i class="bi bi-people-fill"></i>
        Clientes
    </a>

    <a class="menu-link" href="{{ route('imoveis.index') }}">
        <i class="bi bi-house-door-fill"></i>
        Imóveis
    </a>

    <a class="menu-link" href="{{ route('contratos.index') }}">
        <i class="bi bi-file-earmark-text-fill"></i>
        Contratos
    </a>

    <a class="menu-link" href="{{ route('tipos.index') }}">
        <i class="bi bi-tags-fill"></i>
        Tipos
    </a>

</aside>

<main class="main">

    <div class="topbar">
        <div class="topbar-title">
            Sistema de Gestão Imobiliária
        </div>

        <div class="text-secondary">
            <i class="bi bi-person-circle"></i>
            Administrador
        </div>
    </div>

    <div class="content">

        @yield('content')

        @if(session('success'))
            <div class="alert alert-success auto-hide mt-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger auto-hide mt-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

    </div>

</main>

</body>
</html>
