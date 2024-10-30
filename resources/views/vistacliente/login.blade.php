<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        footer {
            background-color: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        /* Estilo para enlaces olvidé mi contraseña */
        .text-muted {
            color: #6c757d !important;
        }

        .text-muted:hover {
            color: #0056b3 !important;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2>Hilo Rojo</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav">
                <a href="{{ route('inicio') }}" class="nav-link active text-dark">Inicio</a>
                    <a href="{{ route('productos') }}" class="nav-link text-dark">Compra de Productos</a>
                    <a href="{{ route('nosotros') }}" class="nav-link text-dark">Acerca de Nosotros</a>
                    <a href="{{ route('login') }}" class="nav-link text-dark">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="login-container">
            <h2 class="login-title">Iniciar Sesión</h2>
            <form action="{{ route('loginAdmin') }}" method="POST">
            @csrf
            <p style="text-align: center; margin: 0; color: red; text-transform: lowercase;">inicio de sesión solo para administradores</p>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Recordarme</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
    <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. <a href="#" class="footer-link">Desarrollado por Luis Miguel Espinoza laveriano</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para mostrar el año actual en el footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
