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
            position: relative;
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
        .table-container {
            overflow-x: auto; /* Permitir desplazamiento horizontal */
            margin: 20px 0; /* Margen para la tabla */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px; /* Espacio entre las tablas */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .confirm-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .confirm-button:hover {
            background-color: #218838;
        }
        .table-title {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0 10px; /* Espacio alrededor del título */
            text-align: left; /* Alinear a la izquierda */
        }
        .alert-success-custom {
    background-color: #28a745; /* Color de fondo verde */
    color: white; /* Color del texto */
    border-color: #28a745; /* Color del borde */
}

.alert-danger-custom {
    background-color: #dc3545; /* Color de fondo rojo */
    color: white; /* Color del texto */
    border-color: #dc3545; /* Color del borde */
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
        window.location.href = "/login"; // Cambia la ruta según tu aplicación
    </script>
@endif
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
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Salir</a>
            <form id="logout-form" action="{{ route('empleado.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success-custom alert-dismissible fade show" role="alert">
        <strong>Éxito!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger-custom alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="container">
        <!-- Tabla de ventas pendientes -->
        <div class="table-title">Ventas Pendientes</div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                         <th>DNI</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                        @if($venta->estado === 'pendiente') 
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $venta->product->imagen) }}" alt="{{ $venta->product->nombre }}" width="50">
                                </td>
                                <td>{{ $venta->product->nombre }}</td>
                                <td>${{ number_format($venta->total, 2) }}</td>
                                <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                                <td>{{ $venta->cantidad}}</td>
                                <td>{{ $venta->dni }}</td>
                                <td>{{ $venta->estado }}</td>
                                <td>
                                    <form action="{{ route('confirmar_venta', $venta->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="confirm-button">Confirmar Venta</button>
                                    </form>
                                    <!-- ELIMINAR -->
                                     <form action="{{ route('eliminar_venta', $venta->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="confirm-button">Eliminar Venta</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabla de ventas confirmadas -->
        <div class="table-title">Ventas Confirmadas</div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                        @if($venta->estado === 'confirmado') 
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $venta->product->imagen) }}" alt="{{ $venta->product->nombre }}" width="50">
                                </td>
                                <td>{{ $venta->product->nombre }}</td>
                                <td>${{ number_format($venta->total, 2) }}</td>
                                <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                                <td>{{ $venta->estado }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- Scripts de Bootstrap (jQuery y Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para abrir y cerrar el menú
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
