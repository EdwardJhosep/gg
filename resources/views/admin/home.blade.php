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
            flex-direction: column; /* Colocar links en columna */
            position: absolute;
            top: 50px; /* Altura del header */
            left: 0;
            right: 0;
            background-color: #333;
            z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
        }
        .nav-links a {
            padding: 10px;
            width: 100%; /* Para que ocupen toda la pantalla en móviles */
            text-align: left; /* Alinear texto a la izquierda en móviles */
        }
        .close-menu {
            display: none; /* Ocultar por defecto */
            cursor: pointer;
            color: white;
            padding: 14px 20px;
            position: absolute;
            right: 20px;
            top: 10px;
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none; /* Ocultar links en móvil por defecto */
            }
            .menu-icon {
                display: block; /* Mostrar icono del menú */
            }
            .close-menu {
                display: block; /* Mostrar el icono de cerrar en móvil */
            }
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            flex: 1 1 300px;
            min-width: 300px;
        }
    </style>
</head>
<body>
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
        </div>
    </div>
    <div class="container">
        <div class="card">
            <h2>Estadísticas Generales</h2>
            <p>Total de Productos: 120</p>
            <p>Total de Empleados: 25</p>
            <p>Total de Ventas: 300</p>
        </div>
        <div class="card">
            <h2>Ventas Mensuales</h2>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
        <div class="card">
            <h2>Productos Populares</h2>
            <div class="chart-container">
                <canvas id="popularProductsChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Función para abrir y cerrar el menú
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        // Ejemplo de creación de gráficos (deberás adaptarlo según tus necesidades)
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Ventas',
                    data: [30, 50, 70, 40, 60, 80],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const popularProductsCtx = document.getElementById('popularProductsChart').getContext('2d');
        const popularProductsChart = new Chart(popularProductsCtx, {
            type: 'pie',
            data: {
                labels: ['Producto A', 'Producto B', 'Producto C', 'Producto D'],
                datasets: [{
                    label: 'Productos Populares',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Productos Populares'
                    }
                }
            }
        });
    </script>
</body>
</html>
