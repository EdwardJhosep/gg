<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hilo Rojo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1512011700723-ef555cc7f0b2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTc3MTF8MHwxfGFsbHwxfHx8fHx8fHwxNjU2MTY1NTYx&ixlib=rb-1.2.1&q=80&w=1080'); /* Fondo atractivo */
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            backdrop-filter: blur(10px); /* Difuminar el fondo del contenedor */
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco con opacidad */
            border-radius: 20px; /* Bordes más redondeados */
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3); /* Sombra más difusa */
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: #d9534f; /* Color atractivo para el título */
            font-size: 24px; /* Tamaño de fuente más grande */
        }

        .btn-primary {
            background-color: #d9534f; /* Color personalizado para el botón */
            border-color: #d9534f;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transiciones suaves */
        }

        .btn-primary:hover {
            background-color: #c9302c; /* Color al pasar el mouse */
            border-color: #c9302c;
            transform: translateY(-2px); /* Efecto de elevación */
        }

        footer {
            background-color: rgba(52, 58, 64, 0.8); /* Fondo semitransparente */
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            padding: 15px 0;
            text-align: center;
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }

        /* Estilos para el navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            border-bottom: 2px solid #d9534f; /* Línea inferior color de la tienda */
        }

        .nav-link {
            color: #d9534f; /* Color de los enlaces de navegación */
            font-weight: 500;
        }

        .nav-link:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }

        /* Estilo del texto informativo */
        .info-text {
            text-align: center;
            margin: 20px 0;
            font-weight: 400;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2 style="color: #d9534f;">Hilo Rojo</h2> <!-- Color atractivo para la marca -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav">
                    <a href="{{ route('inicio') }}" class="nav-link active">Inicio</a>
                    <a href="{{ route('productos') }}" class="nav-link">Compra de Productos</a>
                    <a href="{{ route('nosotros') }}" class="nav-link">Acerca de Nosotros</a>
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="login-container">
            <h2 class="login-title">Iniciar Sesión</h2>
            <p class="info-text">Por favor ingrese sus credenciales para acceder.</p>
            <form action="{{ route('loginAdmin') }}" method="POST">
                @csrf
                <p style="text-align: center; margin: 0; color: #d9534f; text-transform: lowercase;">inicio de sesión solo para administradores</p>
                
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required value="{{ old('dni') }}">
                    @error('dni')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Recordarme</label>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Hilo Rojo. <a href="#" class="footer-link">Desarrollado por Luis Miguel Espinoza Laveriano</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
