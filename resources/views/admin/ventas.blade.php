<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
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
            padding: 20px;
        }
        .sales-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Ventas</h1>
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
        <div class="sales-card">
            <h2>Venta 1</h2>
            <p>Descripción de la venta 1.</p>
        </div>
        <div class="sales-card">
            <h2>Venta 2</h2>
            <p>Descripción de la venta 2.</p>
        </div>
        <div class="sales-card">
            <h2>Venta 3</h2>
            <p>Descripción de la venta 3.</p>
        </div>
    </div>

    <script>
        // Función para abrir y cerrar el menú
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
