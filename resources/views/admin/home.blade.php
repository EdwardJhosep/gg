<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .nav a:hover {
            background-color: #575757;
        }
        .menu-icon {
            display: none;
            cursor: pointer;
            font-size: 24px;
        }
        .nav-links {
            display: flex;
            flex-direction: row;
        }
        .nav-links.active {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            background-color: #333;
            z-index: 1000;
        }
        .nav-links a {
            padding: 10px;
            width: 100%;
            text-align: left;
        }
        .close-menu {
            display: none;
            cursor: pointer;
            color: white;
            padding: 14px 20px;
            position: absolute;
            right: 20px;
            top: 10px;
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .menu-icon {
                display: block;
            }
            .close-menu {
                display: block;
            }
        }
        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .stat-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Permitir que las tarjetas se ajusten */
            margin-bottom: 20px;
        }
        .stat-card {
            background: #007BFF;
            color: white;
            border-radius: 8px;
            padding: 20px;
            flex: 1 1 30%; /* Permitir que se ajusten adecuadamente */
            margin: 10px; /* Espacio entre tarjetas */
            text-align: center;
        }
        .chart-container {
            display: flex; 
            justify-content: space-between;
            flex-wrap: wrap; 
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            flex: 1 1 calc(45% - 20px); /* Dos gráficos en pantallas pequeñas */
            min-width: 300px; /* Tamaño mínimo para gráficos */
            overflow: hidden;
        }
        canvas {
            width: 100% !important; 
            height: auto !important; 
        }
        @media (max-width: 768px) {
            .stat-card {
                flex: 1 1 100%; /* Ocupa el ancho completo en pantallas pequeñas */
                margin: 10px 0; /* Espacio vertical entre tarjetas */
            }
            .card {
                flex: 1 1 100%; /* Cada gráfico ocupa el ancho completo */
            }
        }
    </style>
</head>
<body>

@if(session('token'))
<script>
        var token = "{{ session('token') }}";
</script>
@else
<script>
        window.location.href = "/login"; 
</script>
@endif

<div class="header">
    <h1>Dashboard - Admin</h1>
</div>
<div class="nav">
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="nav-links" id="navLinks">
        <div class="close-menu" onclick="toggleMenu()">
            <i class="fas fa-times"></i>
        </div>
        <a href="{{ route('admin.home') }}">Inicio</a>
        <a href="{{ route('admin.productos') }}">Productos</a>
        <a href="{{ route('admin.empleados') }}">Empleados</a>
        <a href="{{ route('admin.ventas') }}">Ventas</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Salir</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

<div class="container">
    <!-- Contenedores de estadísticas -->
    <div class="stat-container">
        <div class="stat-card">
            <h2>Total Ventas</h2>
            <p>{{ $ventas->count() }}</p>
        </div>
        <div class="stat-card">
            <h2>Total Empleados</h2>
            <p>{{ $empleados->count() }}</p>
        </div>
        <div class="stat-card">
            <h2>Total Productos</h2>
            <p>{{ $productos->count() }}</p>
        </div>
        <div class="stat-card">
            <h2>Total Ganancias</h2>
            <h1>Ganancia Neto: S/{{ number_format($totalConfirmadas, 2) }}</h1>
            </div>
    </div>

    <div class="chart-container">
        <div class="card">
            <h2>Estadísticas Generales</h2>
            <canvas id="generalStatsChart" width="400" height="200"></canvas>
        </div>

        <div class="card">
            <h2>Productos</h2>
            <canvas id="productsChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    // Gráfico de estadísticas generales
    const generalStatsCtx = document.getElementById('generalStatsChart').getContext('2d');
    const generalStatsChart = new Chart(generalStatsCtx, {
        type: 'bar',
        data: {
            labels: ['Total Productos', 'Total Empleados', 'Total Ventas'],
            datasets: [{
                label: 'Estadísticas Generales',
                data: [{{ $productos->count() }}, {{ $empleados->count() }}, {{ $ventas->count() }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Gráfico de productos
    const productsCtx = document.getElementById('productsChart').getContext('2d');
    const productsChart = new Chart(productsCtx, {
        type: 'pie',
        data: {
            labels: @json($productos->pluck('nombre')),
            datasets: [{
                label: 'Productos',
                data: @json($productos->pluck('stock')),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        }
    });
</script>
</body>
</html>
