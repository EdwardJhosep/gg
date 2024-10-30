<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
            padding: 20px;
        }
        .employee-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            padding: 20px;
            position: relative;
        }
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .add-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 30px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .modal-content {
            background: white;
            margin: 100px auto;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
@if(session('token'))
<script>
        // Si el token existe, se puede usar en el backend sin mostrarlo al usuario.
        // Puedes usarlo en el siguiente script o en tu lógica del lado del servidor.
        var token = "{{ session('token') }}";
    </script>@else
    <script>
        window.location.href = "/login"; // Cambia la ruta según tu aplicación
    </script>
@endif
    <div class="header">
        <h1>Empleados</h1>
    </div>
    <div class="nav">
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="nav-links" id="navLinks">
        <div class="close-menu" onclick="toggleMenu()">
            <i class="fas fa-times"></i>
        </div>
        <!-- Formulario para cerrar sesión -->

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
    @foreach($empleados as $item)
        @if($item->tipo !== 'Administrador') <!-- Verifica que el tipo no sea 'Administrador' -->
            <div class="employee-card">
                <h2>Empleado: {{ $item->dni }}</h2>
                <p>Nombre: {{ $item->datos_reniec['nombres'] ?? 'No disponible' }}</p>
                <p>Apellido: {{ $item->datos_reniec['apellidoPaterno'] ?? 'No disponible' }} {{ $item->datos_reniec['apellidoMaterno'] ?? '' }}</p>
                <p>Tipo: {{ $item->tipo }}</p>
                @if(isset($item->datos_reniec['error']))
                    <p>Error al obtener datos de la API: {{ $item->datos_reniec['error'] }}</p>
                @endif
                <form action="{{ route('empleados.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        @endif
    @endforeach
</div>

    <button class="add-button" onclick="document.getElementById('addEmployeeModal').style.display='block'">
        <i class="fas fa-plus"></i>
    </button>

    <!-- Modal para agregar empleado -->
<!-- Modal para agregar empleado -->
<div id="addEmployeeModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Agregar Empleado</h2>
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" id="dni" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="Cajero">Cajero</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" onclick="document.getElementById('addEmployeeModal').style.display='none'">Cerrar</button>
        </form>
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
